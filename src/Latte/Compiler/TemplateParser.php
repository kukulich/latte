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
use Latte\Runtime\Template;
use Latte\SecurityViolationException;
use Latte\Strict;


final class TemplateParser
{
	use Strict;

	public const
		LocationHead = 1,
		LocationText = 2,
		LocationTag = 3;

	/** @var Block[][] */
	public array $blocks = [[]];
	public int $blockLayer = Template::LayerTop;
	public int $location = self::LocationHead;

	/** @var array<string, callable(Tag, self): (Node|\Generator|void)> */
	private array $tagParsers = [];

	/** @var array<string, callable(Tag, self): (Node|\Generator|void)> */
	private array $attrParsers = [];

	private TemplateParserHtml $html;
	private ?TokenStream $stream = null;
	private ?TemplateLexer $lexer = null;
	private ?Policy $policy = null;
	private string $contentType = Context::Html;
	private int $counter = 0;
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
		$this->lexer = $lexer;
		$this->html = new TemplateParserHtml($this, $this->attrParsers);
		$this->stream = new TokenStream($lexer->tokenize($template, $this->contentType));

		$headLength = 0;
		$node = new Nodes\TemplateNode;
		$node->main = $this->parseFragment([$this->html, 'inTextResolve'], $headLength);
		$node->head = new FragmentNode(array_splice($node->main->children, 0, $headLength));
		if (!$this->stream->peek()->isEnd()) {
			$this->stream->throwUnexpectedException();
		}

		return $node;
	}


	public function parseFragment(callable $resolver, &$headLength = null): FragmentNode
	{
		$res = new FragmentNode;
		$save = [$this->lastResolver, $this->tag];
		$this->lastResolver = $resolver;
		try {
			while (!$this->stream->peek()->isEnd()) {
				if ($node = $resolver()) {
					$res->append($node);
					if (
						$this->location === self::LocationHead
						&& !$node instanceof Nodes\TextNode
						&& !$node instanceof Nodes\NopNode
					) {
						$headLength = count($res->children);
					}
				} else {
					break;
				}
			}

			return $res;
		} finally {
			[$this->lastResolver, $this->tag] = $save;
		}
	}


	public function inTextResolve(): ?Node
	{
		$token = $this->stream->peek();
		return match ($token->type) {
			LegacyToken::TEXT => $this->parseText(),
			LegacyToken::MACRO_TAG => $this->parseLatteStatement(),
			LegacyToken::COMMENT => $this->parseLatteComment(),
			default => null,
		};
	}


	public function parseText(): Nodes\TextNode
	{
		$token = $this->stream->consume(LegacyToken::TEXT);
		if ($this->location === self::LocationHead && trim($token->text) !== '') {
			$this->location = self::LocationText;
		}
		return new Nodes\TextNode($token->text, $token->position);
	}


	public function parseLatteComment(): Node
	{
		$token = $this->stream->consume(LegacyToken::COMMENT);
		if ($token->indentation === null && $token->newline) {
			return new Nodes\TextNode("\n", $token->position);
		}
		return new Nodes\NopNode;
	}


	public function parseLatteStatement(): ?Node
	{
		$token = $this->stream->peek();
		if ($token->closing
			|| (isset($this->tag->data->filters) && in_array($token->name, $this->tag->data->filters, true))
		) {
			return null; // go back to previous parseLatteStatement()
		}

		$token = $endToken = $this->stream->consume(LegacyToken::MACRO_TAG);
		$startTag = $this->pushTag($this->createTag($token));

		$parser = $this->getTagParser($startTag->name, $token->position);
		$res = $parser($startTag, $this);
		if ($res instanceof \Generator) {
			if (!$res->valid() && !$startTag->void) {
				throw new \LogicException("Incorrect behavior of {{$startTag->name}} parser, yield call is expected (on line {$startTag->position->line})");
			}

			if ($startTag->void) {
				$res->send([new FragmentNode, $startTag]);
			} else {
				while ($res->valid()) {
					$startTag->data->filters = $res->current() ?: null;
					$content = $this->parseFragment($this->lastResolver);

					if ($startTag->outputMode === $startTag::OutputKeepIndentation && $token->newline) {
						array_unshift($content->children, new Nodes\TextNode("\n", $startTag->position));
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
				throw new \LogicException("Incorrect behavior of {{$startTag->name}} parser, more yield calls than expected (on line {$startTag->position->line})");
			}

			$node = $res->getReturn();

		} elseif ($startTag->void) {
			throw new CompileException('Unexpected /} in tag ' . substr($startTag->getNotation(true), 0, -1) . '/}', $startTag->position);

		} else {
			$node = $res;
		}

		if (!$node instanceof Node) {
			throw new \LogicException("Incorrect behavior of {{$startTag->name}} parser, unexpected returned value (on line {$startTag->position->line})");
		}

		$outputMode = $node instanceof Nodes\StatementNode ? $startTag->outputMode : null;
		if ($outputMode !== $startTag::OutputNone && $this->location === self::LocationHead) {
			$this->location = self::LocationText;
		}

		$this->popTag();

		$node->position = $token->position;
		$replaced = $outputMode === $startTag::OutputKeepIndentation || $outputMode === null;
		$res = new FragmentNode;
		if ($token->indentation && ($replaced || !$token->newline)) {
			$res->append(new Nodes\TextNode($token->indentation, $token->position));
		}

		$res->append($node);

		if ($endToken?->newline && ($replaced || $endToken?->indentation === null)) {
			$res->append(new Nodes\TextNode("\n", $endToken->position));
		}

		return $res;
	}


	private function createTag(LegacyToken $token): Tag
	{
		return new Tag(
			position: $token->position,
			closing: $token->closing,
			name: $token->name,
			args: $token->value,
			void: $token->empty,
			location: $this->location,
			htmlElement: $this->html->getElement(),
		);
	}


	/** @return callable(Tag, self): (Node|\Generator|void) */
	private function getTagParser(string $name, Position $pos): callable
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
			throw new CompileException("Unexpected tag {{$name}}$hint", $pos);
		} elseif (!$this->isTagAllowed($name)) {
			throw new SecurityViolationException("Tag {{$name}} is not allowed.");
		}

		return $this->tagParsers[$name];
	}


	private function checkEndTag(Tag $start, ?Tag $end): void
	{
		if (!$end) {
			if ($start->name !== 'syntax' && ($start->name !== 'block' || $this->tag->parent)) { // TODO: hardcoded
				$this->stream->throwUnexpectedException(expected: ["{/$start->name}"]);
			}

		} elseif (
			($end->name !== $start->name && $end->name !== '')
			|| !$end->closing
			|| $end->void
			|| $end->modifiers
			|| ($end->args !== '' && $start->args !== '' && !str_starts_with($start->args . ' ', $end->args . ' '))
		) {
			$tag = $end->getNotation($end->args !== '');
			throw new CompileException("Unexpected $tag, expecting {/$start->name}", $end->position);
		}
	}


	public function checkBlockIsUnique(Block $block): void
	{
		$name = $block->name;
		if (!preg_match('#^[a-z]#iD', $name)) {
			throw new CompileException(ucfirst($block->tag->name) . " name must start with letter a-z, '{$name}' given.", $block->tag->position);
		}

		if ($block->layer === Template::LayerSnippet
			? isset($this->blocks[$block->layer][$name])
			: (isset($this->blocks[Template::LayerLocal][$name]) || isset($this->blocks[$this->blockLayer][$name]))
		) {
			throw new CompileException("Cannot redeclare {$block->tag->name} '{$name}'", $block->tag->position);
		}

		$this->blocks[$block->layer][$name] = $block;
	}


	public function setPolicy(?Policy $policy): static
	{
		$this->policy = $policy;
		return $this;
	}


	public function setContentType(string $type): static
	{
		$this->contentType = $type;
		$this->lexer?->setContentType($type);
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


	public function getLexer(): TemplateLexer
	{
		return $this->lexer;
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


	public function generateId(): int
	{
		return $this->counter++;
	}


	public function isTagAllowed(string $name): bool
	{
		return !$this->policy || $this->policy->isTagAllowed($name);
	}
}
