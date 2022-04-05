<?php

/**
 * This file is part of the Latte (https://latte.nette.org)
 * Copyright (c) 2008 David Grudl (https://davidgrudl.com)
 */

declare(strict_types=1);

namespace Latte\Essential\Nodes;

use Latte\Compiler\Nodes\AreaNode;
use Latte\Compiler\Nodes\FragmentNode;
use Latte\Compiler\Nodes\NopNode;
use Latte\Compiler\Nodes\StatementNode;
use Latte\Compiler\Nodes\TextNode;
use Latte\Compiler\PrintContext;
use Latte\Compiler\Tag;
use Latte\Helpers;


/**
 * {translate} ... {/translate}
 */
class TranslateNode extends StatementNode
{
	public AreaNode $content;
	public ?string $filter;


	/** @return \Generator<int, ?array, array{AreaNode, ?Tag}, static|NopNode> */
	public static function create(Tag $tag): \Generator
	{
		$tag->outputMode = $tag::OutputKeepIndentation;
		$tag->extractModifier();

		$node = new static;
		$node->filter = $tag->modifiers;

		if ($tag->void) {
			return new NopNode;
		}

		[$node->content] = yield;
		return $node;
	}


	public function print(PrintContext $context): string
	{
		$filter = $this->filter;
		if (Helpers::removeFilter($filter, 'noescape')) {
			$context->checkFilterIsAllowed('noescape');
		} else {
			$filter .= '|escape';
		}

		if (
			$this->content instanceof FragmentNode
			&& count($this->content->children) === 1
			&& $this->content->children[0] instanceof TextNode
		) {
			return $context->format(
				<<<'XX'
					$ʟ_fi = new LR\FilterInfo(%dump);
					echo %modifyContent($this->filters->filterContent('translate', $ʟ_fi, %dump)) %line;
					XX,
				$filter,
				implode('', $context->getEscapingContext()),
				$this->content->children[0]->content,
				$this->startLine,
			);

		} else {
			return $context->format(
				<<<'XX'
					ob_start(fn() => ''); try {
						%raw
					} finally {
						$ʟ_tmp = ob_get_clean();
					}
					$ʟ_fi = new LR\FilterInfo(%dump);
					echo %modifyContent($this->filters->filterContent('translate', $ʟ_fi, $ʟ_tmp)) %line;
					XX,
				$filter,
				$this->content,
				implode('', $context->getEscapingContext()),
				$this->startLine,
			);
		}
	}


	public function &getIterator(): \Generator
	{
		yield $this->content;
	}
}
