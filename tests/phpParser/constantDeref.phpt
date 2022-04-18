<?php

// Array/string dereferencing

declare(strict_types=1);

use Tester\Assert;

require __DIR__ . '/../bootstrap.php';

$test = <<<'XX'
	"abc"[2],
	"abc"[2][0][0],

	[1, 2, 3][2],
	[1, 2, 3][2][0][0],

	array(1, 2, 3)[2],
	array(1, 2, 3)[2][0][0],

	FOO[0],
	foo[0],
	x\foo[0],
	Foo::BAR[1],
	$foo::BAR[2][1][0],
	XX;

$node = parseCode($test);

Assert::same(
	loadContent(__FILE__, __COMPILER_HALT_OFFSET__),
	exportNode($node),
);

__halt_compiler();
Latte\Compiler\Nodes\Php\Expression\ArrayNode
   items: array (11)
   |  0 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Expression\ArrayAccessNode
   |  |  |  expr: Latte\Compiler\Nodes\Php\Scalar\StringNode
   |  |  |  |  value: 'abc'
   |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  line: 1
   |  |  |  |  |  column: 1
   |  |  |  |  |  offset: 0
   |  |  |  index: Latte\Compiler\Nodes\Php\Scalar\IntegerNode
   |  |  |  |  value: 2
   |  |  |  |  kind: 10
   |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  line: 1
   |  |  |  |  |  column: 7
   |  |  |  |  |  offset: 6
   |  |  |  position: Latte\Compiler\Position
   |  |  |  |  line: 1
   |  |  |  |  column: 1
   |  |  |  |  offset: 0
   |  |  key: null
   |  |  byRef: false
   |  |  position: Latte\Compiler\Position
   |  |  |  line: 1
   |  |  |  column: 1
   |  |  |  offset: 0
   |  |  unpack: false
   |  1 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Expression\ArrayAccessNode
   |  |  |  expr: Latte\Compiler\Nodes\Php\Expression\ArrayAccessNode
   |  |  |  |  expr: Latte\Compiler\Nodes\Php\Expression\ArrayAccessNode
   |  |  |  |  |  expr: Latte\Compiler\Nodes\Php\Scalar\StringNode
   |  |  |  |  |  |  value: 'abc'
   |  |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  |  line: 2
   |  |  |  |  |  |  |  column: 1
   |  |  |  |  |  |  |  offset: 10
   |  |  |  |  |  index: Latte\Compiler\Nodes\Php\Scalar\IntegerNode
   |  |  |  |  |  |  value: 2
   |  |  |  |  |  |  kind: 10
   |  |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  |  line: 2
   |  |  |  |  |  |  |  column: 7
   |  |  |  |  |  |  |  offset: 16
   |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  line: 2
   |  |  |  |  |  |  column: 1
   |  |  |  |  |  |  offset: 10
   |  |  |  |  index: Latte\Compiler\Nodes\Php\Scalar\IntegerNode
   |  |  |  |  |  value: 0
   |  |  |  |  |  kind: 10
   |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  line: 2
   |  |  |  |  |  |  column: 10
   |  |  |  |  |  |  offset: 19
   |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  line: 2
   |  |  |  |  |  column: 1
   |  |  |  |  |  offset: 10
   |  |  |  index: Latte\Compiler\Nodes\Php\Scalar\IntegerNode
   |  |  |  |  value: 0
   |  |  |  |  kind: 10
   |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  line: 2
   |  |  |  |  |  column: 13
   |  |  |  |  |  offset: 22
   |  |  |  position: Latte\Compiler\Position
   |  |  |  |  line: 2
   |  |  |  |  column: 1
   |  |  |  |  offset: 10
   |  |  key: null
   |  |  byRef: false
   |  |  position: Latte\Compiler\Position
   |  |  |  line: 2
   |  |  |  column: 1
   |  |  |  offset: 10
   |  |  unpack: false
   |  2 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Expression\ArrayAccessNode
   |  |  |  expr: Latte\Compiler\Nodes\Php\Expression\ArrayNode
   |  |  |  |  items: array (3)
   |  |  |  |  |  0 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  |  |  |  |  value: Latte\Compiler\Nodes\Php\Scalar\IntegerNode
   |  |  |  |  |  |  |  value: 1
   |  |  |  |  |  |  |  kind: 10
   |  |  |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  |  |  line: 4
   |  |  |  |  |  |  |  |  column: 2
   |  |  |  |  |  |  |  |  offset: 28
   |  |  |  |  |  |  key: null
   |  |  |  |  |  |  byRef: false
   |  |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  |  line: 4
   |  |  |  |  |  |  |  column: 2
   |  |  |  |  |  |  |  offset: 28
   |  |  |  |  |  |  unpack: false
   |  |  |  |  |  1 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  |  |  |  |  value: Latte\Compiler\Nodes\Php\Scalar\IntegerNode
   |  |  |  |  |  |  |  value: 2
   |  |  |  |  |  |  |  kind: 10
   |  |  |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  |  |  line: 4
   |  |  |  |  |  |  |  |  column: 5
   |  |  |  |  |  |  |  |  offset: 31
   |  |  |  |  |  |  key: null
   |  |  |  |  |  |  byRef: false
   |  |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  |  line: 4
   |  |  |  |  |  |  |  column: 5
   |  |  |  |  |  |  |  offset: 31
   |  |  |  |  |  |  unpack: false
   |  |  |  |  |  2 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  |  |  |  |  value: Latte\Compiler\Nodes\Php\Scalar\IntegerNode
   |  |  |  |  |  |  |  value: 3
   |  |  |  |  |  |  |  kind: 10
   |  |  |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  |  |  line: 4
   |  |  |  |  |  |  |  |  column: 8
   |  |  |  |  |  |  |  |  offset: 34
   |  |  |  |  |  |  key: null
   |  |  |  |  |  |  byRef: false
   |  |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  |  line: 4
   |  |  |  |  |  |  |  column: 8
   |  |  |  |  |  |  |  offset: 34
   |  |  |  |  |  |  unpack: false
   |  |  |  |  position: null
   |  |  |  index: Latte\Compiler\Nodes\Php\Scalar\IntegerNode
   |  |  |  |  value: 2
   |  |  |  |  kind: 10
   |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  line: 4
   |  |  |  |  |  column: 11
   |  |  |  |  |  offset: 37
   |  |  |  position: Latte\Compiler\Position
   |  |  |  |  line: 4
   |  |  |  |  column: 1
   |  |  |  |  offset: 27
   |  |  key: null
   |  |  byRef: false
   |  |  position: Latte\Compiler\Position
   |  |  |  line: 4
   |  |  |  column: 1
   |  |  |  offset: 27
   |  |  unpack: false
   |  3 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Expression\ArrayAccessNode
   |  |  |  expr: Latte\Compiler\Nodes\Php\Expression\ArrayAccessNode
   |  |  |  |  expr: Latte\Compiler\Nodes\Php\Expression\ArrayAccessNode
   |  |  |  |  |  expr: Latte\Compiler\Nodes\Php\Expression\ArrayNode
   |  |  |  |  |  |  items: array (3)
   |  |  |  |  |  |  |  0 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  |  |  |  |  |  |  value: Latte\Compiler\Nodes\Php\Scalar\IntegerNode
   |  |  |  |  |  |  |  |  |  value: 1
   |  |  |  |  |  |  |  |  |  kind: 10
   |  |  |  |  |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  |  |  |  |  line: 5
   |  |  |  |  |  |  |  |  |  |  column: 2
   |  |  |  |  |  |  |  |  |  |  offset: 42
   |  |  |  |  |  |  |  |  key: null
   |  |  |  |  |  |  |  |  byRef: false
   |  |  |  |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  |  |  |  line: 5
   |  |  |  |  |  |  |  |  |  column: 2
   |  |  |  |  |  |  |  |  |  offset: 42
   |  |  |  |  |  |  |  |  unpack: false
   |  |  |  |  |  |  |  1 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  |  |  |  |  |  |  value: Latte\Compiler\Nodes\Php\Scalar\IntegerNode
   |  |  |  |  |  |  |  |  |  value: 2
   |  |  |  |  |  |  |  |  |  kind: 10
   |  |  |  |  |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  |  |  |  |  line: 5
   |  |  |  |  |  |  |  |  |  |  column: 5
   |  |  |  |  |  |  |  |  |  |  offset: 45
   |  |  |  |  |  |  |  |  key: null
   |  |  |  |  |  |  |  |  byRef: false
   |  |  |  |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  |  |  |  line: 5
   |  |  |  |  |  |  |  |  |  column: 5
   |  |  |  |  |  |  |  |  |  offset: 45
   |  |  |  |  |  |  |  |  unpack: false
   |  |  |  |  |  |  |  2 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  |  |  |  |  |  |  value: Latte\Compiler\Nodes\Php\Scalar\IntegerNode
   |  |  |  |  |  |  |  |  |  value: 3
   |  |  |  |  |  |  |  |  |  kind: 10
   |  |  |  |  |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  |  |  |  |  line: 5
   |  |  |  |  |  |  |  |  |  |  column: 8
   |  |  |  |  |  |  |  |  |  |  offset: 48
   |  |  |  |  |  |  |  |  key: null
   |  |  |  |  |  |  |  |  byRef: false
   |  |  |  |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  |  |  |  line: 5
   |  |  |  |  |  |  |  |  |  column: 8
   |  |  |  |  |  |  |  |  |  offset: 48
   |  |  |  |  |  |  |  |  unpack: false
   |  |  |  |  |  |  position: null
   |  |  |  |  |  index: Latte\Compiler\Nodes\Php\Scalar\IntegerNode
   |  |  |  |  |  |  value: 2
   |  |  |  |  |  |  kind: 10
   |  |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  |  line: 5
   |  |  |  |  |  |  |  column: 11
   |  |  |  |  |  |  |  offset: 51
   |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  line: 5
   |  |  |  |  |  |  column: 1
   |  |  |  |  |  |  offset: 41
   |  |  |  |  index: Latte\Compiler\Nodes\Php\Scalar\IntegerNode
   |  |  |  |  |  value: 0
   |  |  |  |  |  kind: 10
   |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  line: 5
   |  |  |  |  |  |  column: 14
   |  |  |  |  |  |  offset: 54
   |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  line: 5
   |  |  |  |  |  column: 1
   |  |  |  |  |  offset: 41
   |  |  |  index: Latte\Compiler\Nodes\Php\Scalar\IntegerNode
   |  |  |  |  value: 0
   |  |  |  |  kind: 10
   |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  line: 5
   |  |  |  |  |  column: 17
   |  |  |  |  |  offset: 57
   |  |  |  position: Latte\Compiler\Position
   |  |  |  |  line: 5
   |  |  |  |  column: 1
   |  |  |  |  offset: 41
   |  |  key: null
   |  |  byRef: false
   |  |  position: Latte\Compiler\Position
   |  |  |  line: 5
   |  |  |  column: 1
   |  |  |  offset: 41
   |  |  unpack: false
   |  4 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Expression\ArrayAccessNode
   |  |  |  expr: Latte\Compiler\Nodes\Php\Expression\ArrayNode
   |  |  |  |  items: array (3)
   |  |  |  |  |  0 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  |  |  |  |  value: Latte\Compiler\Nodes\Php\Scalar\IntegerNode
   |  |  |  |  |  |  |  value: 1
   |  |  |  |  |  |  |  kind: 10
   |  |  |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  |  |  line: 7
   |  |  |  |  |  |  |  |  column: 7
   |  |  |  |  |  |  |  |  offset: 68
   |  |  |  |  |  |  key: null
   |  |  |  |  |  |  byRef: false
   |  |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  |  line: 7
   |  |  |  |  |  |  |  column: 7
   |  |  |  |  |  |  |  offset: 68
   |  |  |  |  |  |  unpack: false
   |  |  |  |  |  1 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  |  |  |  |  value: Latte\Compiler\Nodes\Php\Scalar\IntegerNode
   |  |  |  |  |  |  |  value: 2
   |  |  |  |  |  |  |  kind: 10
   |  |  |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  |  |  line: 7
   |  |  |  |  |  |  |  |  column: 10
   |  |  |  |  |  |  |  |  offset: 71
   |  |  |  |  |  |  key: null
   |  |  |  |  |  |  byRef: false
   |  |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  |  line: 7
   |  |  |  |  |  |  |  column: 10
   |  |  |  |  |  |  |  offset: 71
   |  |  |  |  |  |  unpack: false
   |  |  |  |  |  2 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  |  |  |  |  value: Latte\Compiler\Nodes\Php\Scalar\IntegerNode
   |  |  |  |  |  |  |  value: 3
   |  |  |  |  |  |  |  kind: 10
   |  |  |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  |  |  line: 7
   |  |  |  |  |  |  |  |  column: 13
   |  |  |  |  |  |  |  |  offset: 74
   |  |  |  |  |  |  key: null
   |  |  |  |  |  |  byRef: false
   |  |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  |  line: 7
   |  |  |  |  |  |  |  column: 13
   |  |  |  |  |  |  |  offset: 74
   |  |  |  |  |  |  unpack: false
   |  |  |  |  position: null
   |  |  |  index: Latte\Compiler\Nodes\Php\Scalar\IntegerNode
   |  |  |  |  value: 2
   |  |  |  |  kind: 10
   |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  line: 7
   |  |  |  |  |  column: 16
   |  |  |  |  |  offset: 77
   |  |  |  position: Latte\Compiler\Position
   |  |  |  |  line: 7
   |  |  |  |  column: 1
   |  |  |  |  offset: 62
   |  |  key: null
   |  |  byRef: false
   |  |  position: Latte\Compiler\Position
   |  |  |  line: 7
   |  |  |  column: 1
   |  |  |  offset: 62
   |  |  unpack: false
   |  5 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Expression\ArrayAccessNode
   |  |  |  expr: Latte\Compiler\Nodes\Php\Expression\ArrayAccessNode
   |  |  |  |  expr: Latte\Compiler\Nodes\Php\Expression\ArrayAccessNode
   |  |  |  |  |  expr: Latte\Compiler\Nodes\Php\Expression\ArrayNode
   |  |  |  |  |  |  items: array (3)
   |  |  |  |  |  |  |  0 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  |  |  |  |  |  |  value: Latte\Compiler\Nodes\Php\Scalar\IntegerNode
   |  |  |  |  |  |  |  |  |  value: 1
   |  |  |  |  |  |  |  |  |  kind: 10
   |  |  |  |  |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  |  |  |  |  line: 8
   |  |  |  |  |  |  |  |  |  |  column: 7
   |  |  |  |  |  |  |  |  |  |  offset: 87
   |  |  |  |  |  |  |  |  key: null
   |  |  |  |  |  |  |  |  byRef: false
   |  |  |  |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  |  |  |  line: 8
   |  |  |  |  |  |  |  |  |  column: 7
   |  |  |  |  |  |  |  |  |  offset: 87
   |  |  |  |  |  |  |  |  unpack: false
   |  |  |  |  |  |  |  1 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  |  |  |  |  |  |  value: Latte\Compiler\Nodes\Php\Scalar\IntegerNode
   |  |  |  |  |  |  |  |  |  value: 2
   |  |  |  |  |  |  |  |  |  kind: 10
   |  |  |  |  |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  |  |  |  |  line: 8
   |  |  |  |  |  |  |  |  |  |  column: 10
   |  |  |  |  |  |  |  |  |  |  offset: 90
   |  |  |  |  |  |  |  |  key: null
   |  |  |  |  |  |  |  |  byRef: false
   |  |  |  |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  |  |  |  line: 8
   |  |  |  |  |  |  |  |  |  column: 10
   |  |  |  |  |  |  |  |  |  offset: 90
   |  |  |  |  |  |  |  |  unpack: false
   |  |  |  |  |  |  |  2 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  |  |  |  |  |  |  value: Latte\Compiler\Nodes\Php\Scalar\IntegerNode
   |  |  |  |  |  |  |  |  |  value: 3
   |  |  |  |  |  |  |  |  |  kind: 10
   |  |  |  |  |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  |  |  |  |  line: 8
   |  |  |  |  |  |  |  |  |  |  column: 13
   |  |  |  |  |  |  |  |  |  |  offset: 93
   |  |  |  |  |  |  |  |  key: null
   |  |  |  |  |  |  |  |  byRef: false
   |  |  |  |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  |  |  |  line: 8
   |  |  |  |  |  |  |  |  |  column: 13
   |  |  |  |  |  |  |  |  |  offset: 93
   |  |  |  |  |  |  |  |  unpack: false
   |  |  |  |  |  |  position: null
   |  |  |  |  |  index: Latte\Compiler\Nodes\Php\Scalar\IntegerNode
   |  |  |  |  |  |  value: 2
   |  |  |  |  |  |  kind: 10
   |  |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  |  line: 8
   |  |  |  |  |  |  |  column: 16
   |  |  |  |  |  |  |  offset: 96
   |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  line: 8
   |  |  |  |  |  |  column: 1
   |  |  |  |  |  |  offset: 81
   |  |  |  |  index: Latte\Compiler\Nodes\Php\Scalar\IntegerNode
   |  |  |  |  |  value: 0
   |  |  |  |  |  kind: 10
   |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  line: 8
   |  |  |  |  |  |  column: 19
   |  |  |  |  |  |  offset: 99
   |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  line: 8
   |  |  |  |  |  column: 1
   |  |  |  |  |  offset: 81
   |  |  |  index: Latte\Compiler\Nodes\Php\Scalar\IntegerNode
   |  |  |  |  value: 0
   |  |  |  |  kind: 10
   |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  line: 8
   |  |  |  |  |  column: 22
   |  |  |  |  |  offset: 102
   |  |  |  position: Latte\Compiler\Position
   |  |  |  |  line: 8
   |  |  |  |  column: 1
   |  |  |  |  offset: 81
   |  |  key: null
   |  |  byRef: false
   |  |  position: Latte\Compiler\Position
   |  |  |  line: 8
   |  |  |  column: 1
   |  |  |  offset: 81
   |  |  unpack: false
   |  6 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Expression\ArrayAccessNode
   |  |  |  expr: Latte\Compiler\Nodes\Php\Expression\ConstantFetchNode
   |  |  |  |  name: Latte\Compiler\Nodes\Php\NameNode
   |  |  |  |  |  parts: array (1)
   |  |  |  |  |  |  0 => 'FOO'
   |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  line: 10
   |  |  |  |  |  |  column: 1
   |  |  |  |  |  |  offset: 107
   |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  line: 10
   |  |  |  |  |  column: 1
   |  |  |  |  |  offset: 107
   |  |  |  index: Latte\Compiler\Nodes\Php\Scalar\IntegerNode
   |  |  |  |  value: 0
   |  |  |  |  kind: 10
   |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  line: 10
   |  |  |  |  |  column: 5
   |  |  |  |  |  offset: 111
   |  |  |  position: Latte\Compiler\Position
   |  |  |  |  line: 10
   |  |  |  |  column: 1
   |  |  |  |  offset: 107
   |  |  key: null
   |  |  byRef: false
   |  |  position: Latte\Compiler\Position
   |  |  |  line: 10
   |  |  |  column: 1
   |  |  |  offset: 107
   |  |  unpack: false
   |  7 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Expression\ArrayAccessNode
   |  |  |  expr: Latte\Compiler\Nodes\Php\Expression\ConstantFetchNode
   |  |  |  |  name: Latte\Compiler\Nodes\Php\NameNode
   |  |  |  |  |  parts: array (1)
   |  |  |  |  |  |  0 => 'foo'
   |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  line: 11
   |  |  |  |  |  |  column: 1
   |  |  |  |  |  |  offset: 115
   |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  line: 11
   |  |  |  |  |  column: 1
   |  |  |  |  |  offset: 115
   |  |  |  index: Latte\Compiler\Nodes\Php\Scalar\IntegerNode
   |  |  |  |  value: 0
   |  |  |  |  kind: 10
   |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  line: 11
   |  |  |  |  |  column: 5
   |  |  |  |  |  offset: 119
   |  |  |  position: Latte\Compiler\Position
   |  |  |  |  line: 11
   |  |  |  |  column: 1
   |  |  |  |  offset: 115
   |  |  key: null
   |  |  byRef: false
   |  |  position: Latte\Compiler\Position
   |  |  |  line: 11
   |  |  |  column: 1
   |  |  |  offset: 115
   |  |  unpack: false
   |  8 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Expression\ArrayAccessNode
   |  |  |  expr: Latte\Compiler\Nodes\Php\Expression\ConstantFetchNode
   |  |  |  |  name: Latte\Compiler\Nodes\Php\NameNode
   |  |  |  |  |  parts: array (2)
   |  |  |  |  |  |  0 => 'x'
   |  |  |  |  |  |  1 => 'foo'
   |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  line: 12
   |  |  |  |  |  |  column: 1
   |  |  |  |  |  |  offset: 123
   |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  line: 12
   |  |  |  |  |  column: 1
   |  |  |  |  |  offset: 123
   |  |  |  index: Latte\Compiler\Nodes\Php\Scalar\IntegerNode
   |  |  |  |  value: 0
   |  |  |  |  kind: 10
   |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  line: 12
   |  |  |  |  |  column: 7
   |  |  |  |  |  offset: 129
   |  |  |  position: Latte\Compiler\Position
   |  |  |  |  line: 12
   |  |  |  |  column: 1
   |  |  |  |  offset: 123
   |  |  key: null
   |  |  byRef: false
   |  |  position: Latte\Compiler\Position
   |  |  |  line: 12
   |  |  |  column: 1
   |  |  |  offset: 123
   |  |  unpack: false
   |  9 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Expression\ArrayAccessNode
   |  |  |  expr: Latte\Compiler\Nodes\Php\Expression\ClassConstantFetchNode
   |  |  |  |  class: Latte\Compiler\Nodes\Php\NameNode
   |  |  |  |  |  parts: array (1)
   |  |  |  |  |  |  0 => 'Foo'
   |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  line: 13
   |  |  |  |  |  |  column: 1
   |  |  |  |  |  |  offset: 133
   |  |  |  |  name: Latte\Compiler\Nodes\Php\IdentifierNode
   |  |  |  |  |  name: 'BAR'
   |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  line: 13
   |  |  |  |  |  |  column: 6
   |  |  |  |  |  |  offset: 138
   |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  line: 13
   |  |  |  |  |  column: 1
   |  |  |  |  |  offset: 133
   |  |  |  index: Latte\Compiler\Nodes\Php\Scalar\IntegerNode
   |  |  |  |  value: 1
   |  |  |  |  kind: 10
   |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  line: 13
   |  |  |  |  |  column: 10
   |  |  |  |  |  offset: 142
   |  |  |  position: Latte\Compiler\Position
   |  |  |  |  line: 13
   |  |  |  |  column: 1
   |  |  |  |  offset: 133
   |  |  key: null
   |  |  byRef: false
   |  |  position: Latte\Compiler\Position
   |  |  |  line: 13
   |  |  |  column: 1
   |  |  |  offset: 133
   |  |  unpack: false
   |  10 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Expression\ArrayAccessNode
   |  |  |  expr: Latte\Compiler\Nodes\Php\Expression\ArrayAccessNode
   |  |  |  |  expr: Latte\Compiler\Nodes\Php\Expression\ArrayAccessNode
   |  |  |  |  |  expr: Latte\Compiler\Nodes\Php\Expression\ClassConstantFetchNode
   |  |  |  |  |  |  class: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  |  |  |  name: 'foo'
   |  |  |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  |  |  line: 14
   |  |  |  |  |  |  |  |  column: 1
   |  |  |  |  |  |  |  |  offset: 146
   |  |  |  |  |  |  name: Latte\Compiler\Nodes\Php\IdentifierNode
   |  |  |  |  |  |  |  name: 'BAR'
   |  |  |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  |  |  line: 14
   |  |  |  |  |  |  |  |  column: 7
   |  |  |  |  |  |  |  |  offset: 152
   |  |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  |  line: 14
   |  |  |  |  |  |  |  column: 1
   |  |  |  |  |  |  |  offset: 146
   |  |  |  |  |  index: Latte\Compiler\Nodes\Php\Scalar\IntegerNode
   |  |  |  |  |  |  value: 2
   |  |  |  |  |  |  kind: 10
   |  |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  |  line: 14
   |  |  |  |  |  |  |  column: 11
   |  |  |  |  |  |  |  offset: 156
   |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  line: 14
   |  |  |  |  |  |  column: 1
   |  |  |  |  |  |  offset: 146
   |  |  |  |  index: Latte\Compiler\Nodes\Php\Scalar\IntegerNode
   |  |  |  |  |  value: 1
   |  |  |  |  |  kind: 10
   |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  line: 14
   |  |  |  |  |  |  column: 14
   |  |  |  |  |  |  offset: 159
   |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  line: 14
   |  |  |  |  |  column: 1
   |  |  |  |  |  offset: 146
   |  |  |  index: Latte\Compiler\Nodes\Php\Scalar\IntegerNode
   |  |  |  |  value: 0
   |  |  |  |  kind: 10
   |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  line: 14
   |  |  |  |  |  column: 17
   |  |  |  |  |  offset: 162
   |  |  |  position: Latte\Compiler\Position
   |  |  |  |  line: 14
   |  |  |  |  column: 1
   |  |  |  |  offset: 146
   |  |  key: null
   |  |  byRef: false
   |  |  position: Latte\Compiler\Position
   |  |  |  line: 14
   |  |  |  column: 1
   |  |  |  offset: 146
   |  |  unpack: false
   position: null
