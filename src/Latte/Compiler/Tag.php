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
	public string $name;
	public bool $empty = false;
	public string $args;
	public string $modifiers;
	public bool $closing = false;
	public ?bool $replaced = null;
	public MacroTokens $tokenizer;
	public ?Tag $parentNode = null;
	public ?string $openingCode = null;
	public ?string $closingCode = null;
	public ?string $attrCode = null;
	public ?string $content = null;
	public string $innerContent = '';
	public \stdClass $data;

	/** closest HTML node */
	public ?HtmlNode $htmlNode = null;

	/** @var array{string, mixed} [contentType, context] */
	public ?array $context = null;

	/** indicates n:attribute macro and type of prefix (PREFIX_INNER, PREFIX_TAG, PREFIX_NONE) */
	public ?string $prefix = null;

	/** position of start tag in source template */
	public ?int $startLine = null;

	/** position of end tag in source template */
	public ?int $endLine = null;

	/** @var array{string, bool}|null */
	public ?array $saved = null;


	public function __construct(
		Extension $macro,
		string $name,
		string $args = '',
		string $modifiers = '',
		?self $parentNode = null,
		?HtmlNode $htmlNode = null,
		?string $prefix = null,
	) {
		$this->macro = $macro;
		$this->name = $name;
		$this->modifiers = $modifiers;
		$this->parentNode = $parentNode;
		$this->htmlNode = $htmlNode;
		$this->prefix = $prefix;
		$this->data = new \stdClass;
		$this->setArgs($args);
	}


	public function setArgs(string $args): void
	{
		$this->args = $args;
		$this->tokenizer = new MacroTokens($args);
	}


	public function getNotation(): string
	{
		return $this->prefix
			? TemplateLexer::NPrefix . ($this->prefix === self::PrefixNone ? '' : $this->prefix . '-') . $this->name
			: '{' . $this->name . '}';
	}


	/**
	 * @param  string[]  $names
	 */
	public function closest(array $names, ?callable $condition = null): ?self
	{
		$tag = $this->parentNode;
		while ($tag && (
			!in_array($tag->name, $names, true)
			|| ($condition && !$condition($tag))
		)) {
			$tag = $tag->parentNode;
		}

		return $tag;
	}


	/**
	 * @param  string[]  $parents
	 * @throws CompileException
	 */
	public function validate(string|bool|null $arguments, array $parents = [], bool $modifiers = false): void
	{
		$position = $this->startLine ? new Position($this->startLine, 0) : null;
		if ($parents && (!$this->parentNode || !in_array($this->parentNode->name, $parents, true))) {
			throw new CompileException('Tag ' . $this->getNotation() . ' is unexpected here.', $position);

		} elseif ($this->modifiers !== '' && !$modifiers) {
			throw new CompileException('Filters are not allowed in ' . $this->getNotation(), $position);

		} elseif ($arguments && $this->args === '') {
			$label = is_string($arguments) ? $arguments : 'arguments';
			throw new CompileException('Missing ' . $label . ' in ' . $this->getNotation(), $position);

		} elseif ($arguments === false && $this->args !== '') {
			throw new CompileException('Arguments are not allowed in ' . $this->getNotation(), $position);
		}
	}
}
