<?php

// Literals

declare(strict_types=1);

use Tester\Assert;

require __DIR__ . '/../bootstrap.php';

$test = <<<'XX'
	true,
	false,
	null,

	True,
	False,
	Null,

	TRUE,
	FALSE,
	NULL,
	XX;

$node = parseCode($test);

Assert::same(
	loadContent(__FILE__, __COMPILER_HALT_OFFSET__),
	exportNode($node),
);

__halt_compiler();
Latte\Compiler\Nodes\Php\Expression\ArrayNode
   items: array (9)
   |  0 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Scalar\BooleanNode
   |  |  |  value: true
   |  |  |  position: 1:1 (offset 0)
   |  |  key: null
   |  |  byRef: false
   |  |  position: 1:1 (offset 0)
   |  |  unpack: false
   |  1 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Scalar\BooleanNode
   |  |  |  value: false
   |  |  |  position: 2:1 (offset 6)
   |  |  key: null
   |  |  byRef: false
   |  |  position: 2:1 (offset 6)
   |  |  unpack: false
   |  2 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Scalar\NullNode
   |  |  |  position: 3:1 (offset 13)
   |  |  key: null
   |  |  byRef: false
   |  |  position: 3:1 (offset 13)
   |  |  unpack: false
   |  3 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Scalar\BooleanNode
   |  |  |  value: true
   |  |  |  position: 5:1 (offset 20)
   |  |  key: null
   |  |  byRef: false
   |  |  position: 5:1 (offset 20)
   |  |  unpack: false
   |  4 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Scalar\BooleanNode
   |  |  |  value: false
   |  |  |  position: 6:1 (offset 26)
   |  |  key: null
   |  |  byRef: false
   |  |  position: 6:1 (offset 26)
   |  |  unpack: false
   |  5 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Scalar\NullNode
   |  |  |  position: 7:1 (offset 33)
   |  |  key: null
   |  |  byRef: false
   |  |  position: 7:1 (offset 33)
   |  |  unpack: false
   |  6 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Scalar\BooleanNode
   |  |  |  value: true
   |  |  |  position: 9:1 (offset 40)
   |  |  key: null
   |  |  byRef: false
   |  |  position: 9:1 (offset 40)
   |  |  unpack: false
   |  7 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Scalar\BooleanNode
   |  |  |  value: false
   |  |  |  position: 10:1 (offset 46)
   |  |  key: null
   |  |  byRef: false
   |  |  position: 10:1 (offset 46)
   |  |  unpack: false
   |  8 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Scalar\NullNode
   |  |  |  position: 11:1 (offset 53)
   |  |  key: null
   |  |  byRef: false
   |  |  position: 11:1 (offset 53)
   |  |  unpack: false
   position: null
