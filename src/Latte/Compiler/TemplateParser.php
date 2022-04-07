<?php

/**
 * This file is part of the Latte (https://latte.nette.org)
 * Copyright (c) 2008 David Grudl (https://davidgrudl.com)
 */

declare(strict_types=1);

namespace Latte\Compiler;

use Latte\CompileException;
use Latte\Compiler\Nodes\FragmentNode;
use Latte\Context;
use Latte\Helpers;
use Latte\Policy;
use Latte\SecurityViolationException;
use Latte\Strict;


final class TemplateParser
{
	use Strict;

	public const
		LocationHead = 1,
		LocationText = 2,
		LocationTag = 3;

	public int $location = self::LocationHead;

	/** @var array<string, callable(Tag, self): (Node|\Generator|void)> */
	private array $tagParsers = [];

	/** @var array<string, callable(Tag, self): (Node|\Generator|void)> */
	private array $attrParsers = [];

	private TemplateParserHtml $html;
	private ?TokenStream $stream = null;
	private ?Policy $policy = null;
	private string $contentType = Context::Html;
	private ?Tag $tag = null;
	private $lastResolver;


	/** @param  array<string, callable(Tag, self): (Node|\Generator|void)>  $parsers */
	public function addTags(array $parsers): static
	{
		foreach ($parsers as $name => $parser) {
			if (str_starts_with($name, 'n:')) {
				$this->attrParsers[substr($name, 2)] = $parser;
			} else {
				$this->tagParsers[$name] = $parser;
				if (Helpers::toReflection($parser)->isGenerator()) {
					$this->attrParsers[$name] = $parser;
					$this->attrParsers[Tag::PrefixInner . '-' . $name] = $parser;
					$this->attrParsers[Tag::PrefixTag . '-' . $name] = $parser;
				}
			}
		}

		return $this;
	}


	/**
	 * Parses tokens to nodes.
	 * @throws CompileException
	 */
	public function parse(string $template, TemplateLexer $lexer): Nodes\TemplateNode
	{
		$this->html = new TemplateParserHtml($this, $this->attrParsers);
		$this->stream = new TokenStream($lexer->tokenize($template, $this->contentType));

		$node = new Nodes\TemplateNode;
		$node->main = $this->parseFragment([$this->html, 'inTextResolve']);
		if ($this->stream->current()) {
			$this->stream->throwUnexpectedException();
		}

		return $node;
	}


	public function parseFragment(callable $resolver): FragmentNode
	{
		$res = new FragmentNode;
		$prev = $this->lastResolver;
		$this->lastResolver = $resolver;
		while ($this->stream->current()) {
			if ($node = $resolver()) {
				$res->append($node);
			} else {
				break;
			}
		}

		$this->lastResolver = $prev;
		return $res;
	}


	public function inTextResolve(): ?Node
	{
		$token = $this->stream->current();
		return match ($token->type) {
			LegacyToken::TEXT => $this->parseText(),
			LegacyToken::COMMENT => $this->parseLatteComment(),
			LegacyToken::MACRO_TAG => $this->parseLatteStatement(),
			default => null,
		};
	}


	private function parseText(): Nodes\TextNode
	{
		$token = $this->stream->consume(LegacyToken::TEXT);
		if ($this->location === self::LocationHead && trim($token->text) !== '') {
			$this->location = self::LocationText;
		}
		return new Nodes\TextNode($token->text, $token->line);
	}


	private function parseLatteComment(): Node
	{
		$token = $this->stream->consume(LegacyToken::COMMENT);
		if ($token->indentation === null && $token->newline) {
			return new Nodes\TextNode("\n", $token->line);
		}
		return new Nodes\NopNode;
	}


	private function parseLatteStatement(): ?Node
	{
		$token = $this->stream->current();
		if ($token->closing
			|| (isset($this->tag->data->filters) && in_array($token->name, $this->tag->data->filters, true))
		) {
			return null; // go back to previous parseLatteStatement()
		}

		$token = $endToken = $this->stream->consume(LegacyToken::MACRO_TAG);
		$startTag = $this->pushTag($this->createTag($token));

		$parser = $this->getTagParser($startTag->name, $token->line);
		$res = $parser($startTag, $this);
		if ($res instanceof \Generator) {
			if (!$res->valid() && !$startTag->void) {
				throw new \LogicException("Incorrect behavior of {{$startTag->name}} parser, yield call is expected (on line $startTag->startLine)");
			}

			if ($startTag->void) {
				$res->send([new FragmentNode, $startTag]);
			} else {
				while ($res->valid()) {
					$startTag->data->filters = $res->current() ?: null;
					$content = $this->parseFragment($this->lastResolver);

					if ($startTag->outputMode === $startTag::OutputKeepIndentation && $token->newline) {
						array_unshift($content->children, new Nodes\TextNode("\n", $startTag->startLine));
					}

					$endToken = $this->stream->tryConsume(LegacyToken::MACRO_TAG);
					if (!$endToken) {
						$this->checkEndTag($startTag, null);
						$res->send([$content, null]);
						break;
					}

					$tag = $this->createTag($endToken);
					if ($tag->closing) {
						$this->checkEndTag($startTag, $tag);
						$res->send([$content, $tag]);
						break;
					} else {
						$this->pushTag($tag);
						$res->send([$content, $tag]);
						$this->popTag();
					}
				}
			}

			if ($res->valid()) {
				throw new \LogicException("Incorrect behavior of {{$startTag->name}} parser, more yield calls than expected (on line $startTag->startLine)");
			}

			$node = $res->getReturn();

		} elseif ($startTag->void) {
			throw new CompileException('Unexpected /} in tag ' . substr($startTag->getNotation(true), 0, -1) . '/}', $startTag->startLine);

		} else {
			$node = $res;
		}

		if (!$node instanceof Node) {
			throw new \LogicException("Incorrect behavior of {{$startTag->name}} parser, unexpected returned value (on line $startTag->startLine)");
		}

		$outputMode = $node instanceof Nodes\StatementNode ? $startTag->outputMode : null;
		if ($outputMode !== $startTag::OutputNone && $this->location === self::LocationHead) {
			$this->location = self::LocationText;
		}

		$this->popTag();

		$node->startLine = $token->line;
		$node->endLine = ($endToken ?? $token)->line;
		$replaced = $outputMode === $startTag::OutputKeepIndentation || $outputMode === null;
		$res = new FragmentNode;
		if ($token->indentation && ($replaced || !$token->newline)) {
			$res->append(new Nodes\TextNode($token->indentation, $token->line));
		}

		$res->append($node);

		if ($endToken?->newline && ($replaced || $endToken?->indentation === null)) {
			$res->append(new Nodes\TextNode("\n", $endToken->line));
		}

		return $res;
	}


	private function createTag(LegacyToken $token): Tag
	{
		$modifiers = $token->modifiers;

		if (strpbrk($token->name, '=~%^&_')) {
			if (!Helpers::removeFilter($modifiers, 'noescape')) {
				$modifiers .= '|escape';
			} elseif ($this->policy && !$this->policy->isFilterAllowed('noescape')) {
				throw new SecurityViolationException('Filter |noescape is not allowed.');
			}

			if (
				$token->name === '='
				&& $this->html->getElement()
				&& ($prev = $this->stream->peek(-1))
				&& $this->contentType === Context::Html
				&& strcasecmp($this->html->getElement()->name, 'script') === 0
				&& preg_match('#["\']$#D', $prev->text)
			) {
				throw new CompileException("Do not place {$token->text} inside quotes in JavaScript.", $token->line);
			}
		}

		return new Tag($token->name, $token->value, $modifiers, $token->empty, $token->closing, $this->location, $this->html->getElement(), startLine: $token->line);
	}


	/** @return callable(Tag, self): (Node|\Generator|void) */
	private function getTagParser(string $name, int $line): callable
	{
		if (!isset($this->tagParsers[$name])) {
			$hint = ($t = Helpers::getSuggestion(array_keys($this->tagParsers), $name))
				? ", did you mean {{$t}}?"
				: '';
			if ($this->contentType === Context::Html
				&& in_array($this->html->getElement()?->name, ['script', 'style'], true)
			) {
				$hint .= ' (in JavaScript or CSS, try to put a space after bracket or use n:syntax=off)';
			}
			throw new CompileException("Unexpected tag {{$name}}$hint", $line);
		} elseif (!$this->isTagAllowed($name)) {
			throw new SecurityViolationException("Tag {{$name}} is not allowed.");
		}

		return $this->tagParsers[$name];
	}


	private function checkEndTag(Tag $start, ?Tag $end): void
	{
		if (!$end
			|| ($end->name !== $start->name && $end->name !== '')
			|| !$end->closing
			|| $end->modifiers
			|| ($end->args !== '' && $start->args !== '' && !str_starts_with($start->args . ' ', $end->args . ' '))
		) {
			$tag = $end?->getNotation($end->args !== '') ?? 'end';
			throw new CompileException("Unexpected $tag, expecting {/$start->name}", ($end ?? $start)->startLine);
		}
	}


	public function setPolicy(?Policy $policy): static
	{
		$this->policy = $policy;
		return $this;
	}


	public function setContentType(string $type): static
	{
		$this->contentType = $type;
		return $this;
	}


	public function getContentType(): string
	{
		return $this->contentType;
	}


	/** @internal */
	public function getStream(): TokenStream
	{
		return $this->stream;
	}


	public function getTag(): ?Tag
	{
		return $this->tag;
	}


	public function pushTag(Tag $tag): Tag
	{
		$tag->parent = $this->tag;
		$this->tag = $tag;
		return $tag;
	}


	public function popTag(): void
	{
		$this->tag = $this->tag->parent;
	}


	public function isTagAllowed(string $name): bool
	{
		return !$this->policy || $this->policy->isTagAllowed($name);
	}
}
