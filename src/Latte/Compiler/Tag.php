<?php

/**
 * This file is part of the Latte (https://latte.nette.org)
 * Copyright (c) 2008 David Grudl (https://davidgrudl.com)
 */

declare(strict_types=1);

namespace Latte\Compiler;

use Latte\CompileException;
use Latte\Extension;
use Latte\Strict;


/**
 * Latte tag or n:attribute.
 */
final class Tag
{
	use Strict;

	public const
		PrefixInner = 'inner',
		PrefixTag = 'tag',
		PrefixNone = 'none';

	public Extension $macro;
	public ?bool $replaced = null;
	public MacroTokens $tokenizer;
	public ?string $openingCode = null;
	public ?string $closingCode = null;
	public ?string $attrCode = null;
	public ?string $content = null;
	public string $innerContent = '';
	public \stdClass $data;

	/** @var array{string, mixed} [contentType, context] */
	public ?array $context = null;

	/** @var array{string, bool}|null */
	public ?array $saved = null;


	public function __construct(
		public /*readonly*/ string $name,
		public /*readonly*/ string $args,
		public /*readonly*/ string $modifiers = '',
		public /*readonly*/ bool $void = false,
		public /*readonly*/ bool $closing = false,
		public /*readonly*/ int $location = 0,
		public /*readonly*/ ?HtmlNode $htmlElement = null,
		public /*readonly*/ ?self $parent = null,
		public /*readonly*/ ?string $prefix = null,
		public /*readonly*/ ?int $startLine = null,
	) {
		$this->data = new \stdClass;
		$this->setArgs($args);
	}


	public function isNAttribute(): bool
	{
		return $this->prefix !== null;
	}


	public function setArgs(string $args): void
	{
		$this->args = $args;
		$this->tokenizer = new MacroTokens($args);
	}


	public function getNotation(): string
	{
		return $this->isNAttribute()
			? TemplateLexer::NPrefix . ($this->prefix === self::PrefixNone ? '' : $this->prefix . '-') . $this->name
			: '{' . $this->name . '}';
	}


	/**
	 * @param  string[]  $names
	 */
	public function closest(array $names, ?callable $condition = null): ?self
	{
		$tag = $this->parent;
		while ($tag && (
			!in_array($tag->name, $names, true)
			|| ($condition && !$condition($tag))
		)) {
			$tag = $tag->parent;
		}

		return $tag;
	}


	/**
	 * @param  string[]  $parents
	 * @throws CompileException
	 */
	public function validate(string|bool|null $arguments, array $parents = [], bool $modifiers = false): void
	{
		if ($parents && (!$this->parent || !in_array($this->parent->name, $parents, true))) {
			throw new CompileException('Tag ' . $this->getNotation() . ' is unexpected here.', $this->startLine);

		} elseif ($this->modifiers !== '' && !$modifiers) {
			throw new CompileException('Filters are not allowed in ' . $this->getNotation(), $this->startLine);

		} elseif ($arguments && $this->args === '') {
			$label = is_string($arguments) ? $arguments : 'arguments';
			throw new CompileException('Missing ' . $label . ' in ' . $this->getNotation(), $this->startLine);

		} elseif ($arguments === false && $this->args !== '') {
			throw new CompileException('Arguments are not allowed in ' . $this->getNotation(), $this->startLine);
		}
	}
}
