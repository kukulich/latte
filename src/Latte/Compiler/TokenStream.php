<?php

/**
 * This file is part of the Latte (https://latte.nette.org)
 * Copyright (c) 2008 David Grudl (https://davidgrudl.com)
 */

declare(strict_types=1);

namespace Latte\Compiler;

use Latte\CompileException;
use Latte\Strict;


/**
 * TokenStream loads tokens from $source iterator on-demand, and places them in a buffer to provide access
 * to any previous token by index.
 */
final class TokenStream
{
	use Strict;

	/** @var Token[] */
	private array $tokens = [];
	private int $index = 0;
	private bool $end = false;
	private \Fiber $source;


	public function __construct(\Fiber $source)
	{
		$this->source = $source;
	}


	/**
	 * Tells whether the token at current position is of given kind.
	 */
	public function is(int|string ...$kind): bool
	{
		return $this->peek()->is(...$kind);
	}


	/**
	 * Gets the token at $offset from the current position.
	 */
	public function peek(int $offset = 0): ?Token
	{
		$pos = $this->index + $offset;
		while (!$this->end && $pos >= 0 && !isset($this->tokens[$pos])) {
			if ($this->source->isTerminated()) {
				$this->end = true;
				break;
			} elseif ($this->tokens) {
				$this->tokens[] = $this->source->resume();
			} else {
				$this->tokens[] = $this->source->start();
			}
		}

		return $this->tokens[$pos] ?? null;
	}


	/**
	 * Consumes the current token (if is of given kind) or throws exception on end.
	 * @throws CompileException
	 */
	public function consume(int|string ...$kind): Token
	{
		$token = $this->peek();
		if ($kind && !$token->is(...$kind)) {
			$kind = array_map(fn($item) => is_string($item) ? "'$item'" : Token::NAMES[$item], $kind);
			$this->throwUnexpectedException($kind);
		} elseif (!$token->isEnd()) {
			$this->index++;
		}
		return $token;
	}


	/**
	 * Consumes the current token of given kind or returns null.
	 */
	public function tryConsume(int|string ...$kind): ?Token
	{
		$token = $this->peek();
		if (!$token->is(...$kind)) {
			return null;
		} elseif (!$token->isEnd()) {
			$this->index++;
		}
		return $token;
	}


	/**
	 * Sets the input cursor to the position.
	 */
	public function seek(int $index): void
	{
		if ($index >= count($this->tokens) || $index < 0) {
			throw new \InvalidArgumentException('The position is out of range.');
		}
		$this->index = $index;
	}


	/**
	 * Returns the cursor position.
	 */
	public function getIndex(): int
	{
		return $this->index;
	}


	/**
	 * @throws CompileException
	 * @return never
	 */
	public function throwUnexpectedException(array $expected = [], $addendum = ''): void
	{
		$s = null;
		$i = 0;
		do {
			$token = $this->peek($i++);
			if ($token->isEnd()) {
				break;
			}
			$s .= $token->text;
			if (strlen($s) > 5) {
				break;
			}
		} while (true);

		$expected = array_map(fn($item) => is_int($item) ? Token::NAMES[$item] : $item, $expected);

		throw new CompileException(
			'Unexpected '
			. ($s === null
				? 'end'
				: "'" . trim($s, "\n") . "'")
			. ($expected && count($expected) < 5
				? ', expecting ' . implode(', ', $expected)
				: '')
			. $addendum,
			$this->peek()->position,
		);
	}
}
