<?php

/**
 * This file is part of the Latte (https://latte.nette.org)
 * Copyright (c) 2008 David Grudl (https://davidgrudl.com)
 */

declare(strict_types=1);

namespace Latte\Compiler;

use Latte\CompileException;
use Latte\Context;
use Latte\RegexpException;
use Latte\Strict;


final class TemplateLexer
{
	use Strict;

	/** HTML tag name for Latte needs (actually is [a-zA-Z][^\s/>]*) */
	public const ReTagName = '[a-zA-Z][a-zA-Z0-9:_.-]*';

	/** special HTML attribute prefix */
	public const NPrefix = 'n:';

	/** HTML attribute name/value (\p{C} means \x00-\x1F except space) */
	private const ReHtmlName = '[^\p{C} "\'<>=`/{}]+';
	private const ReHtmlValue = '[^\p{C} "\'<>=`{}]+';
	private const StateEnd = 'end';

	/** @var array<string, array{string, string}> */
	public array $syntaxes = [
		'latte' => ['\{(?![\s\'"{}])', '\}'], // {...}
		'double' => ['\{\{(?![\s\'"{}])', '\}\}'], // {{...}}
		'off' => ['\{(?=/syntax\})', '\}'], // {/syntax}
	];

	/** @var string[] */
	private array $delimiters;
	private TagLexer $tagLexer;
	private string $input;
	private Position $position;
	private array $states;
	private bool $xmlMode;


	/** @return \Generator<Token> */
	public function tokenize(string $template, string $contentType = Context::Html): \Generator
	{
		$this->position = new Position(1, 1, 0);
		$this->input = $this->normalize($template);
		$this->states = [];
		$this->setContentType($contentType);
		$this->setSyntax(null);
		$this->tagLexer = new TagLexer;

		do {
			$state = $this->states[0];
			yield from $this->{$state['name']}(...$state['args']);
		} while ($this->states[0]['name'] !== self::StateEnd);

		if ($this->position->offset < strlen($this->input)) {
			throw new CompileException("Unexpected '" . substr($this->input, $this->position->offset, 10) . "'", $this->position);
		}

		yield new Token(Token::End, '', $this->position);
	}


	private function statePlain(): \Generator
	{
		$m = yield from $this->match('~
			(?<Text>.+?)??
			(?<Indentation>(?<=\n|^)[ \t]+)?
			(
				(?<Latte_TagOpen>' . $this->delimiters[0] . '(?!\*))|      # {tag
				(?<Latte_CommentOpen>' . $this->delimiters[0] . '\*)|      # {* comment
				$
			)
		~xsiAuD');

		if (isset($m['Latte_TagOpen'])) {
			$this->pushState('stateLatteTag');
		} elseif (isset($m['Latte_CommentOpen'])) {
			$this->pushState('stateLatteComment');
		} else {
			$this->setState(self::StateEnd);
		}
	}


	private function stateLatteTag(): \Generator
	{
		$this->popState();
		yield from $this->match('~
			(?<Slash>/)?
			(?<Latte_Name> = | _(?!_) | [a-z]\w*+(?:[.:-]\w+)*+(?!::|\(|\\\\))?   # name, /name, but not function( or class:: or namespace\
		~xsiAu');

		yield from $this->tagLexer->tokenizePartially($this->input, $this->position);

		yield from $this->match('~
			(?<Slash>/)?
			(?<Latte_TagClose>' . $this->delimiters[1] . ')
			(?<Newline>[ \t]*\n)?
		~xsiAu');
	}


	private function stateLatteComment(): \Generator
	{
		$this->popState();
		yield from $this->match('~
			(?<Text>.+?)??
			(?<Latte_CommentClose>\*' . $this->delimiters[1] . ')
			(?<Newline>[ \t]*\n{1,2})?
		~xsiAu');
	}


	private function stateHtmlText(): \Generator
	{
		$m = yield from $this->match('~(?J)
			(?<Text>.+?)??
			(
				(?<Indentation>(?<=\n|^)[ \t]+)?(?<Html_TagOpen><)(?<Slash>/)?(?<Html_Name>' . self::ReTagName . ')|  # <tag </tag
				(?<Html_CommentOpen><!--(?!>|->))|                                                      # <!-- comment
				(?<Html_BogusOpen><[/?!])|                                                              # <!doctype <?xml or error
				(?<Indentation>(?<=\n|^)[ \t]+)?(?<Latte_TagOpen>' . $this->delimiters[0] . '(?!\*))|   # {tag
				(?<Indentation>(?<=\n|^)[ \t]+)?(?<Latte_CommentOpen>' . $this->delimiters[0] . '\*)|   # {* comment
				$
			)
		~xsiAuD');

		if (isset($m['Html_TagOpen'])) {
			$tagName = isset($m['Slash']) ? null : strtolower($m['Html_Name']);
			$this->setState('stateHtmlTag', $tagName);
		} elseif (isset($m['Html_CommentOpen'])) {
			$this->setState('stateHtmlComment');
		} elseif (isset($m['Html_BogusOpen'])) {
			$this->setState('stateHtmlBogus');
		} elseif (isset($m['Latte_TagOpen'])) {
			$this->pushState('stateLatteTag');
		} elseif (isset($m['Latte_CommentOpen'])) {
			$this->pushState('stateLatteComment');
		} else {
			$this->setState(self::StateEnd);
		}
	}


	private function stateHtmlTag(?string $tagName = null, ?string $attrName = null): \Generator
	{
		$m = yield from $this->match('~
			(?<Whitespace>\s+)|                                        # whitespace
			(?<Equals>=)|
			(?<Quote>["\'])|
			(?<Slash>/)?(?<Html_TagClose>>)(?<Newline>[ \t]*\n)?|      # > />
			(?<Html_Name>' . self::ReHtmlName . ')|                    # HTML attribute name/value
			(?<Latte_TagOpen>' . $this->delimiters[0] . '(?!\*))|      # {tag
			(?<Latte_CommentOpen>' . $this->delimiters[0] . '\*)       # {* comment
		~xsiAu');

		if (isset($m['Html_Name'])) {
			$this->states[0]['args'][1] = $m['Html_Name'];
		} elseif (isset($m['Equals'])) {
			yield from $this->match('~
				(?<Whitespace>\s+)?                                    # whitespace
				(?<Html_Name>' . self::ReHtmlValue . ')                # HTML attribute name/value
			~xsiAu');
		} elseif (isset($m['Whitespace'])) {
		} elseif (isset($m['Quote'])) {
			$this->pushState(str_starts_with($attrName, self::NPrefix)
				? 'stateHtmlQuotedNAttrValue'
				: 'stateHtmlQuotedValue', $m['Quote']);
		} elseif (
			isset($m['Html_TagClose'])
			&& !$this->xmlMode
			&& !isset($m['Slash'])
			&& in_array($tagName, ['script', 'style'], true)
		) {
			$this->setState('stateHtmlRCData', $tagName);
		} elseif (isset($m['Html_TagClose'])) {
			$this->setState('stateHtmlText');
		} elseif (isset($m['Latte_TagOpen'])) {
			$this->pushState('stateLatteTag');
		} elseif (isset($m['Latte_CommentOpen'])) {
			$this->pushState('stateLatteComment');
		} else {
			$this->setState(self::StateEnd);
		}
	}


	private function stateHtmlQuotedValue(string $quote): \Generator
	{
		$m = yield from $this->match('~
			(?<Text>.+?)??(
				(?<Quote>' . $quote . ')|
				(?<Latte_TagOpen>' . $this->delimiters[0] . '(?!\*))|      # {tag
				(?<Latte_CommentOpen>' . $this->delimiters[0] . '\*)       # {* comment
			)
		~xsiAu');

		if (isset($m['Quote'])) {
			$this->popState();
		} elseif (isset($m['Latte_TagOpen'])) {
			$this->pushState('stateLatteTag');
		} elseif (isset($m['Latte_CommentOpen'])) {
			$this->pushState('stateLatteComment');
		} else {
			$this->setState(self::StateEnd);
		}
	}


	private function stateHtmlQuotedNAttrValue(string $quote): \Generator
	{
		$m = yield from $this->match('~
			(?<Text>.+?)??(?<Quote>' . $quote . ')|
		~xsiAu');

		if (isset($m['Quote'])) {
			$this->popState();
		} else {
			$this->setState(self::StateEnd);
		}
	}


	private function stateHtmlRCData(string $tagName): \Generator
	{
		$m = yield from $this->match('~
			(?<Text>.+?)??
			(?<Indentation>(?<=\n|^)[ \t]+)?
			(
				(?<Html_TagOpen><)(?<Slash>/)(?<Html_Name>' . preg_quote($tagName, '~') . ')|  # </tag
				(?<Latte_TagOpen>' . $this->delimiters[0] . '(?!\*))|                          # {tag
				(?<Latte_CommentOpen>' . $this->delimiters[0] . '\*)|                          # {* comment
				$
			)
		~xsiAu');

		if (isset($m['Html_TagOpen'])) {
			$this->setState('stateHtmlTag');
		} elseif (isset($m['Latte_TagOpen'])) {
			$this->pushState('stateLatteTag');
		} elseif (isset($m['Latte_CommentOpen'])) {
			$this->pushState('stateLatteComment');
		} else {
			$this->setState(self::StateEnd);
		}
	}


	private function stateHtmlComment(): \Generator
	{
		$m = yield from $this->match('~(?J)
			(?<Text>.+?)??
			(
				(?<Html_CommentClose>-->)|                                                              # -->
				(?<Indentation>(?<=\n|^)[ \t]+)?(?<Latte_TagOpen>' . $this->delimiters[0] . '(?!\*))|   # {tag
				(?<Indentation>(?<=\n|^)[ \t]+)?(?<Latte_CommentOpen>' . $this->delimiters[0] . '\*)    # {* comment
			)
		~xsiAu');

		if (isset($m['Html_CommentClose'])) {
			$this->setState('stateHtmlText');
		} elseif (isset($m['Latte_TagOpen'])) {
			$this->pushState('stateLatteTag');
		} elseif (isset($m['Latte_CommentOpen'])) {
			$this->pushState('stateLatteComment');
		} else {
			$this->setState(self::StateEnd);
		}
	}


	private function stateHtmlBogus(): \Generator
	{
		$m = yield from $this->match('~
			(?<Text>.+?)??(
				(?<Html_TagClose>>)|                                       # >
				(?<Latte_TagOpen>' . $this->delimiters[0] . '(?!\*))|      # {tag
				(?<Latte_CommentOpen>' . $this->delimiters[0] . '\*)       # {* comment
			)
		~xsiAu');

		if (isset($m['Html_TagClose'])) {
			$this->setState('stateHtmlText');
		} elseif (isset($m['Latte_TagOpen'])) {
			$this->pushState('stateLatteTag');
		} elseif (isset($m['Latte_CommentOpen'])) {
			$this->pushState('stateLatteComment');
		} else {
			$this->setState(self::StateEnd);
		}
	}


	/**
	 * Matches next token.
	 */
	private function match(string $re): \Generator
	{
		if (!preg_match($re, $this->input, $matches, PREG_UNMATCHED_AS_NULL, $this->position->offset)) {
			if (preg_last_error()) {
				throw new RegexpException;
			}

			return [];
		}

		foreach ($matches as $k => $v) {
			if ($v !== null && !\is_int($k)) {
				yield new Token(\constant(Token::class . '::' . $k), $v, $this->position);
				$this->position = $this->position->advance($v);
			}
		}

		return $matches;
	}


	public function setContentType(string $type): static
	{
		if ($type === Context::Html || $type === Context::Xml) {
			$this->setState('stateHtmlText');
			$this->xmlMode = $type === Context::Xml;
		} else {
			$this->setState('statePlain');
		}

		return $this;
	}


	private function setState(string $state, ...$args): void
	{
		$this->states[0] = ['name' => $state, 'args' => $args];
	}


	private function pushState(string $state, ...$args): void
	{
		array_unshift($this->states, null);
		$this->setState($state, ...$args);
	}


	private function popState(): void
	{
		array_shift($this->states);
	}


	/**
	 * Changes macro tag delimiters.
	 */
	public function setSyntax(?string $type): static
	{
		$type ??= 'latte';
		if (!isset($this->syntaxes[$type])) {
			throw new \InvalidArgumentException("Unknown syntax '$type'");
		}

		$this->setDelimiters($this->syntaxes[$type][0], $this->syntaxes[$type][1]);
		return $this;
	}


	/**
	 * Changes macro tag delimiters (as regular expression).
	 */
	public function setDelimiters(string $left, string $right): static
	{
		$this->delimiters = [$left, $right];
		return $this;
	}


	private function normalize(string $str): string
	{
		if (str_starts_with($str, "\u{FEFF}")) { // BOM
			$str = substr($str, 3);
		}

		$str = str_replace("\r\n", "\n", $str);

		if (!preg_match('##u', $str)) {
			preg_match('#(?:[\x00-\x7F]|[\xC0-\xDF][\x80-\xBF]|[\xE0-\xEF][\x80-\xBF]{2}|[\xF0-\xF7][\x80-\xBF]{3})*+#A', $str, $m);
			throw new CompileException('Template is not valid UTF-8 stream.', $this->position->advance($m[0]));

		} elseif (preg_match('#(.*?)([\x00-\x08\x0B\x0C\x0E-\x1F\x7F])#s', $str, $m)) {
			throw new CompileException('Template contains control character \x' . dechex(ord($m[2])), $this->position->advance($m[1]));
		}
		return $str;
	}
}
