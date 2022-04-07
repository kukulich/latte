<?php

declare(strict_types=1);

namespace Latte\Compiler;

use Latte\Strict;


abstract class Node
{
	use Strict;

	public ?int $startLine = null;
	public ?int $endLine = null;


	abstract public function print(PrintContext $context): string;
}
