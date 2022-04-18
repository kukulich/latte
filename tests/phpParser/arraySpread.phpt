<?php

// Spread array

declare(strict_types=1);

use Tester\Assert;

require __DIR__ . '/../bootstrap.php';

$test = <<<'XX'
	$array = [1, 2, 3],

	[...[]],
	[...[1, 2, 3]],
	[...$array],
	[...getArr()],
	[...arrGen()],
	[...new ArrayIterator(['a', 'b', 'c'])],
	[0, ...$array, ...getArr(), 6, 7, 8, 9, 10, ...arrGen()],
	[0, ...$array, ...$array, 'end'],
	[(expand) [1, 2, 3]],
	XX;

$node = parseCode($test);

Assert::same(
	loadContent(__FILE__, __COMPILER_HALT_OFFSET__),
	exportNode($node),
);

__halt_compiler();
Latte\Compiler\Nodes\Php\Expression\ArrayNode
   items: array (10)
   |  0 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Expression\AssignNode
   |  |  |  var: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  name: 'array'
   |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  line: 1
   |  |  |  |  |  column: 1
   |  |  |  |  |  offset: 0
   |  |  |  expr: Latte\Compiler\Nodes\Php\Expression\ArrayNode
   |  |  |  |  items: array (3)
   |  |  |  |  |  0 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  |  |  |  |  value: Latte\Compiler\Nodes\Php\Scalar\IntegerNode
   |  |  |  |  |  |  |  value: 1
   |  |  |  |  |  |  |  kind: 10
   |  |  |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  |  |  line: 1
   |  |  |  |  |  |  |  |  column: 11
   |  |  |  |  |  |  |  |  offset: 10
   |  |  |  |  |  |  key: null
   |  |  |  |  |  |  byRef: false
   |  |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  |  line: 1
   |  |  |  |  |  |  |  column: 11
   |  |  |  |  |  |  |  offset: 10
   |  |  |  |  |  |  unpack: false
   |  |  |  |  |  1 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  |  |  |  |  value: Latte\Compiler\Nodes\Php\Scalar\IntegerNode
   |  |  |  |  |  |  |  value: 2
   |  |  |  |  |  |  |  kind: 10
   |  |  |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  |  |  line: 1
   |  |  |  |  |  |  |  |  column: 14
   |  |  |  |  |  |  |  |  offset: 13
   |  |  |  |  |  |  key: null
   |  |  |  |  |  |  byRef: false
   |  |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  |  line: 1
   |  |  |  |  |  |  |  column: 14
   |  |  |  |  |  |  |  offset: 13
   |  |  |  |  |  |  unpack: false
   |  |  |  |  |  2 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  |  |  |  |  value: Latte\Compiler\Nodes\Php\Scalar\IntegerNode
   |  |  |  |  |  |  |  value: 3
   |  |  |  |  |  |  |  kind: 10
   |  |  |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  |  |  line: 1
   |  |  |  |  |  |  |  |  column: 17
   |  |  |  |  |  |  |  |  offset: 16
   |  |  |  |  |  |  key: null
   |  |  |  |  |  |  byRef: false
   |  |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  |  line: 1
   |  |  |  |  |  |  |  column: 17
   |  |  |  |  |  |  |  offset: 16
   |  |  |  |  |  |  unpack: false
   |  |  |  |  position: null
   |  |  |  byRef: false
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
   |  |  value: Latte\Compiler\Nodes\Php\Expression\ArrayNode
   |  |  |  items: array (1)
   |  |  |  |  0 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  |  |  |  value: Latte\Compiler\Nodes\Php\Expression\ArrayNode
   |  |  |  |  |  |  items: array (0)
   |  |  |  |  |  |  position: null
   |  |  |  |  |  key: null
   |  |  |  |  |  byRef: false
   |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  line: 3
   |  |  |  |  |  |  column: 2
   |  |  |  |  |  |  offset: 22
   |  |  |  |  |  unpack: true
   |  |  |  position: null
   |  |  key: null
   |  |  byRef: false
   |  |  position: Latte\Compiler\Position
   |  |  |  line: 3
   |  |  |  column: 1
   |  |  |  offset: 21
   |  |  unpack: false
   |  2 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Expression\ArrayNode
   |  |  |  items: array (1)
   |  |  |  |  0 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  |  |  |  value: Latte\Compiler\Nodes\Php\Expression\ArrayNode
   |  |  |  |  |  |  items: array (3)
   |  |  |  |  |  |  |  0 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  |  |  |  |  |  |  value: Latte\Compiler\Nodes\Php\Scalar\IntegerNode
   |  |  |  |  |  |  |  |  |  value: 1
   |  |  |  |  |  |  |  |  |  kind: 10
   |  |  |  |  |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  |  |  |  |  line: 4
   |  |  |  |  |  |  |  |  |  |  column: 6
   |  |  |  |  |  |  |  |  |  |  offset: 35
   |  |  |  |  |  |  |  |  key: null
   |  |  |  |  |  |  |  |  byRef: false
   |  |  |  |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  |  |  |  line: 4
   |  |  |  |  |  |  |  |  |  column: 6
   |  |  |  |  |  |  |  |  |  offset: 35
   |  |  |  |  |  |  |  |  unpack: false
   |  |  |  |  |  |  |  1 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  |  |  |  |  |  |  value: Latte\Compiler\Nodes\Php\Scalar\IntegerNode
   |  |  |  |  |  |  |  |  |  value: 2
   |  |  |  |  |  |  |  |  |  kind: 10
   |  |  |  |  |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  |  |  |  |  line: 4
   |  |  |  |  |  |  |  |  |  |  column: 9
   |  |  |  |  |  |  |  |  |  |  offset: 38
   |  |  |  |  |  |  |  |  key: null
   |  |  |  |  |  |  |  |  byRef: false
   |  |  |  |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  |  |  |  line: 4
   |  |  |  |  |  |  |  |  |  column: 9
   |  |  |  |  |  |  |  |  |  offset: 38
   |  |  |  |  |  |  |  |  unpack: false
   |  |  |  |  |  |  |  2 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  |  |  |  |  |  |  value: Latte\Compiler\Nodes\Php\Scalar\IntegerNode
   |  |  |  |  |  |  |  |  |  value: 3
   |  |  |  |  |  |  |  |  |  kind: 10
   |  |  |  |  |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  |  |  |  |  line: 4
   |  |  |  |  |  |  |  |  |  |  column: 12
   |  |  |  |  |  |  |  |  |  |  offset: 41
   |  |  |  |  |  |  |  |  key: null
   |  |  |  |  |  |  |  |  byRef: false
   |  |  |  |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  |  |  |  line: 4
   |  |  |  |  |  |  |  |  |  column: 12
   |  |  |  |  |  |  |  |  |  offset: 41
   |  |  |  |  |  |  |  |  unpack: false
   |  |  |  |  |  |  position: null
   |  |  |  |  |  key: null
   |  |  |  |  |  byRef: false
   |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  line: 4
   |  |  |  |  |  |  column: 2
   |  |  |  |  |  |  offset: 31
   |  |  |  |  |  unpack: true
   |  |  |  position: null
   |  |  key: null
   |  |  byRef: false
   |  |  position: Latte\Compiler\Position
   |  |  |  line: 4
   |  |  |  column: 1
   |  |  |  offset: 30
   |  |  unpack: false
   |  3 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Expression\ArrayNode
   |  |  |  items: array (1)
   |  |  |  |  0 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  |  |  |  value: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  |  |  name: 'array'
   |  |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  |  line: 5
   |  |  |  |  |  |  |  column: 5
   |  |  |  |  |  |  |  offset: 50
   |  |  |  |  |  key: null
   |  |  |  |  |  byRef: false
   |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  line: 5
   |  |  |  |  |  |  column: 2
   |  |  |  |  |  |  offset: 47
   |  |  |  |  |  unpack: true
   |  |  |  position: null
   |  |  key: null
   |  |  byRef: false
   |  |  position: Latte\Compiler\Position
   |  |  |  line: 5
   |  |  |  column: 1
   |  |  |  offset: 46
   |  |  unpack: false
   |  4 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Expression\ArrayNode
   |  |  |  items: array (1)
   |  |  |  |  0 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  |  |  |  value: Latte\Compiler\Nodes\Php\Expression\FunctionCallNode
   |  |  |  |  |  |  name: Latte\Compiler\Nodes\Php\NameNode
   |  |  |  |  |  |  |  parts: array (1)
   |  |  |  |  |  |  |  |  0 => 'getArr'
   |  |  |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  |  |  line: 6
   |  |  |  |  |  |  |  |  column: 5
   |  |  |  |  |  |  |  |  offset: 63
   |  |  |  |  |  |  args: array (0)
   |  |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  |  line: 6
   |  |  |  |  |  |  |  column: 5
   |  |  |  |  |  |  |  offset: 63
   |  |  |  |  |  key: null
   |  |  |  |  |  byRef: false
   |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  line: 6
   |  |  |  |  |  |  column: 2
   |  |  |  |  |  |  offset: 60
   |  |  |  |  |  unpack: true
   |  |  |  position: null
   |  |  key: null
   |  |  byRef: false
   |  |  position: Latte\Compiler\Position
   |  |  |  line: 6
   |  |  |  column: 1
   |  |  |  offset: 59
   |  |  unpack: false
   |  5 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Expression\ArrayNode
   |  |  |  items: array (1)
   |  |  |  |  0 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  |  |  |  value: Latte\Compiler\Nodes\Php\Expression\FunctionCallNode
   |  |  |  |  |  |  name: Latte\Compiler\Nodes\Php\NameNode
   |  |  |  |  |  |  |  parts: array (1)
   |  |  |  |  |  |  |  |  0 => 'arrGen'
   |  |  |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  |  |  line: 7
   |  |  |  |  |  |  |  |  column: 5
   |  |  |  |  |  |  |  |  offset: 78
   |  |  |  |  |  |  args: array (0)
   |  |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  |  line: 7
   |  |  |  |  |  |  |  column: 5
   |  |  |  |  |  |  |  offset: 78
   |  |  |  |  |  key: null
   |  |  |  |  |  byRef: false
   |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  line: 7
   |  |  |  |  |  |  column: 2
   |  |  |  |  |  |  offset: 75
   |  |  |  |  |  unpack: true
   |  |  |  position: null
   |  |  key: null
   |  |  byRef: false
   |  |  position: Latte\Compiler\Position
   |  |  |  line: 7
   |  |  |  column: 1
   |  |  |  offset: 74
   |  |  unpack: false
   |  6 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Expression\ArrayNode
   |  |  |  items: array (1)
   |  |  |  |  0 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  |  |  |  value: Latte\Compiler\Nodes\Php\Expression\NewNode
   |  |  |  |  |  |  class: Latte\Compiler\Nodes\Php\NameNode
   |  |  |  |  |  |  |  parts: array (1)
   |  |  |  |  |  |  |  |  0 => 'ArrayIterator'
   |  |  |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  |  |  line: 8
   |  |  |  |  |  |  |  |  column: 9
   |  |  |  |  |  |  |  |  offset: 97
   |  |  |  |  |  |  args: array (1)
   |  |  |  |  |  |  |  0 => Latte\Compiler\Nodes\Php\ArgumentNode
   |  |  |  |  |  |  |  |  value: Latte\Compiler\Nodes\Php\Expression\ArrayNode
   |  |  |  |  |  |  |  |  |  items: array (3)
   |  |  |  |  |  |  |  |  |  |  0 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  |  |  |  |  |  |  |  |  |  value: Latte\Compiler\Nodes\Php\Scalar\StringNode
   |  |  |  |  |  |  |  |  |  |  |  |  value: 'a'
   |  |  |  |  |  |  |  |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  |  |  |  |  |  |  |  line: 8
   |  |  |  |  |  |  |  |  |  |  |  |  |  column: 24
   |  |  |  |  |  |  |  |  |  |  |  |  |  offset: 112
   |  |  |  |  |  |  |  |  |  |  |  key: null
   |  |  |  |  |  |  |  |  |  |  |  byRef: false
   |  |  |  |  |  |  |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  |  |  |  |  |  |  line: 8
   |  |  |  |  |  |  |  |  |  |  |  |  column: 24
   |  |  |  |  |  |  |  |  |  |  |  |  offset: 112
   |  |  |  |  |  |  |  |  |  |  |  unpack: false
   |  |  |  |  |  |  |  |  |  |  1 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  |  |  |  |  |  |  |  |  |  value: Latte\Compiler\Nodes\Php\Scalar\StringNode
   |  |  |  |  |  |  |  |  |  |  |  |  value: 'b'
   |  |  |  |  |  |  |  |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  |  |  |  |  |  |  |  line: 8
   |  |  |  |  |  |  |  |  |  |  |  |  |  column: 29
   |  |  |  |  |  |  |  |  |  |  |  |  |  offset: 117
   |  |  |  |  |  |  |  |  |  |  |  key: null
   |  |  |  |  |  |  |  |  |  |  |  byRef: false
   |  |  |  |  |  |  |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  |  |  |  |  |  |  line: 8
   |  |  |  |  |  |  |  |  |  |  |  |  column: 29
   |  |  |  |  |  |  |  |  |  |  |  |  offset: 117
   |  |  |  |  |  |  |  |  |  |  |  unpack: false
   |  |  |  |  |  |  |  |  |  |  2 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  |  |  |  |  |  |  |  |  |  value: Latte\Compiler\Nodes\Php\Scalar\StringNode
   |  |  |  |  |  |  |  |  |  |  |  |  value: 'c'
   |  |  |  |  |  |  |  |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  |  |  |  |  |  |  |  line: 8
   |  |  |  |  |  |  |  |  |  |  |  |  |  column: 34
   |  |  |  |  |  |  |  |  |  |  |  |  |  offset: 122
   |  |  |  |  |  |  |  |  |  |  |  key: null
   |  |  |  |  |  |  |  |  |  |  |  byRef: false
   |  |  |  |  |  |  |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  |  |  |  |  |  |  line: 8
   |  |  |  |  |  |  |  |  |  |  |  |  column: 34
   |  |  |  |  |  |  |  |  |  |  |  |  offset: 122
   |  |  |  |  |  |  |  |  |  |  |  unpack: false
   |  |  |  |  |  |  |  |  |  position: null
   |  |  |  |  |  |  |  |  byRef: false
   |  |  |  |  |  |  |  |  unpack: false
   |  |  |  |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  |  |  |  line: 8
   |  |  |  |  |  |  |  |  |  column: 23
   |  |  |  |  |  |  |  |  |  offset: 111
   |  |  |  |  |  |  |  |  name: null
   |  |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  |  line: 8
   |  |  |  |  |  |  |  column: 5
   |  |  |  |  |  |  |  offset: 93
   |  |  |  |  |  key: null
   |  |  |  |  |  byRef: false
   |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  line: 8
   |  |  |  |  |  |  column: 2
   |  |  |  |  |  |  offset: 90
   |  |  |  |  |  unpack: true
   |  |  |  position: null
   |  |  key: null
   |  |  byRef: false
   |  |  position: Latte\Compiler\Position
   |  |  |  line: 8
   |  |  |  column: 1
   |  |  |  offset: 89
   |  |  unpack: false
   |  7 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Expression\ArrayNode
   |  |  |  items: array (9)
   |  |  |  |  0 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  |  |  |  value: Latte\Compiler\Nodes\Php\Scalar\IntegerNode
   |  |  |  |  |  |  value: 0
   |  |  |  |  |  |  kind: 10
   |  |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  |  line: 9
   |  |  |  |  |  |  |  column: 2
   |  |  |  |  |  |  |  offset: 131
   |  |  |  |  |  key: null
   |  |  |  |  |  byRef: false
   |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  line: 9
   |  |  |  |  |  |  column: 2
   |  |  |  |  |  |  offset: 131
   |  |  |  |  |  unpack: false
   |  |  |  |  1 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  |  |  |  value: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  |  |  name: 'array'
   |  |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  |  line: 9
   |  |  |  |  |  |  |  column: 8
   |  |  |  |  |  |  |  offset: 137
   |  |  |  |  |  key: null
   |  |  |  |  |  byRef: false
   |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  line: 9
   |  |  |  |  |  |  column: 5
   |  |  |  |  |  |  offset: 134
   |  |  |  |  |  unpack: true
   |  |  |  |  2 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  |  |  |  value: Latte\Compiler\Nodes\Php\Expression\FunctionCallNode
   |  |  |  |  |  |  name: Latte\Compiler\Nodes\Php\NameNode
   |  |  |  |  |  |  |  parts: array (1)
   |  |  |  |  |  |  |  |  0 => 'getArr'
   |  |  |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  |  |  line: 9
   |  |  |  |  |  |  |  |  column: 19
   |  |  |  |  |  |  |  |  offset: 148
   |  |  |  |  |  |  args: array (0)
   |  |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  |  line: 9
   |  |  |  |  |  |  |  column: 19
   |  |  |  |  |  |  |  offset: 148
   |  |  |  |  |  key: null
   |  |  |  |  |  byRef: false
   |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  line: 9
   |  |  |  |  |  |  column: 16
   |  |  |  |  |  |  offset: 145
   |  |  |  |  |  unpack: true
   |  |  |  |  3 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  |  |  |  value: Latte\Compiler\Nodes\Php\Scalar\IntegerNode
   |  |  |  |  |  |  value: 6
   |  |  |  |  |  |  kind: 10
   |  |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  |  line: 9
   |  |  |  |  |  |  |  column: 29
   |  |  |  |  |  |  |  offset: 158
   |  |  |  |  |  key: null
   |  |  |  |  |  byRef: false
   |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  line: 9
   |  |  |  |  |  |  column: 29
   |  |  |  |  |  |  offset: 158
   |  |  |  |  |  unpack: false
   |  |  |  |  4 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  |  |  |  value: Latte\Compiler\Nodes\Php\Scalar\IntegerNode
   |  |  |  |  |  |  value: 7
   |  |  |  |  |  |  kind: 10
   |  |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  |  line: 9
   |  |  |  |  |  |  |  column: 32
   |  |  |  |  |  |  |  offset: 161
   |  |  |  |  |  key: null
   |  |  |  |  |  byRef: false
   |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  line: 9
   |  |  |  |  |  |  column: 32
   |  |  |  |  |  |  offset: 161
   |  |  |  |  |  unpack: false
   |  |  |  |  5 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  |  |  |  value: Latte\Compiler\Nodes\Php\Scalar\IntegerNode
   |  |  |  |  |  |  value: 8
   |  |  |  |  |  |  kind: 10
   |  |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  |  line: 9
   |  |  |  |  |  |  |  column: 35
   |  |  |  |  |  |  |  offset: 164
   |  |  |  |  |  key: null
   |  |  |  |  |  byRef: false
   |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  line: 9
   |  |  |  |  |  |  column: 35
   |  |  |  |  |  |  offset: 164
   |  |  |  |  |  unpack: false
   |  |  |  |  6 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  |  |  |  value: Latte\Compiler\Nodes\Php\Scalar\IntegerNode
   |  |  |  |  |  |  value: 9
   |  |  |  |  |  |  kind: 10
   |  |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  |  line: 9
   |  |  |  |  |  |  |  column: 38
   |  |  |  |  |  |  |  offset: 167
   |  |  |  |  |  key: null
   |  |  |  |  |  byRef: false
   |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  line: 9
   |  |  |  |  |  |  column: 38
   |  |  |  |  |  |  offset: 167
   |  |  |  |  |  unpack: false
   |  |  |  |  7 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  |  |  |  value: Latte\Compiler\Nodes\Php\Scalar\IntegerNode
   |  |  |  |  |  |  value: 10
   |  |  |  |  |  |  kind: 10
   |  |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  |  line: 9
   |  |  |  |  |  |  |  column: 41
   |  |  |  |  |  |  |  offset: 170
   |  |  |  |  |  key: null
   |  |  |  |  |  byRef: false
   |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  line: 9
   |  |  |  |  |  |  column: 41
   |  |  |  |  |  |  offset: 170
   |  |  |  |  |  unpack: false
   |  |  |  |  8 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  |  |  |  value: Latte\Compiler\Nodes\Php\Expression\FunctionCallNode
   |  |  |  |  |  |  name: Latte\Compiler\Nodes\Php\NameNode
   |  |  |  |  |  |  |  parts: array (1)
   |  |  |  |  |  |  |  |  0 => 'arrGen'
   |  |  |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  |  |  line: 9
   |  |  |  |  |  |  |  |  column: 48
   |  |  |  |  |  |  |  |  offset: 177
   |  |  |  |  |  |  args: array (0)
   |  |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  |  line: 9
   |  |  |  |  |  |  |  column: 48
   |  |  |  |  |  |  |  offset: 177
   |  |  |  |  |  key: null
   |  |  |  |  |  byRef: false
   |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  line: 9
   |  |  |  |  |  |  column: 45
   |  |  |  |  |  |  offset: 174
   |  |  |  |  |  unpack: true
   |  |  |  position: null
   |  |  key: null
   |  |  byRef: false
   |  |  position: Latte\Compiler\Position
   |  |  |  line: 9
   |  |  |  column: 1
   |  |  |  offset: 130
   |  |  unpack: false
   |  8 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Expression\ArrayNode
   |  |  |  items: array (4)
   |  |  |  |  0 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  |  |  |  value: Latte\Compiler\Nodes\Php\Scalar\IntegerNode
   |  |  |  |  |  |  value: 0
   |  |  |  |  |  |  kind: 10
   |  |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  |  line: 10
   |  |  |  |  |  |  |  column: 2
   |  |  |  |  |  |  |  offset: 189
   |  |  |  |  |  key: null
   |  |  |  |  |  byRef: false
   |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  line: 10
   |  |  |  |  |  |  column: 2
   |  |  |  |  |  |  offset: 189
   |  |  |  |  |  unpack: false
   |  |  |  |  1 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  |  |  |  value: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  |  |  name: 'array'
   |  |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  |  line: 10
   |  |  |  |  |  |  |  column: 8
   |  |  |  |  |  |  |  offset: 195
   |  |  |  |  |  key: null
   |  |  |  |  |  byRef: false
   |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  line: 10
   |  |  |  |  |  |  column: 5
   |  |  |  |  |  |  offset: 192
   |  |  |  |  |  unpack: true
   |  |  |  |  2 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  |  |  |  value: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  |  |  name: 'array'
   |  |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  |  line: 10
   |  |  |  |  |  |  |  column: 19
   |  |  |  |  |  |  |  offset: 206
   |  |  |  |  |  key: null
   |  |  |  |  |  byRef: false
   |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  line: 10
   |  |  |  |  |  |  column: 16
   |  |  |  |  |  |  offset: 203
   |  |  |  |  |  unpack: true
   |  |  |  |  3 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  |  |  |  value: Latte\Compiler\Nodes\Php\Scalar\StringNode
   |  |  |  |  |  |  value: 'end'
   |  |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  |  line: 10
   |  |  |  |  |  |  |  column: 27
   |  |  |  |  |  |  |  offset: 214
   |  |  |  |  |  key: null
   |  |  |  |  |  byRef: false
   |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  line: 10
   |  |  |  |  |  |  column: 27
   |  |  |  |  |  |  offset: 214
   |  |  |  |  |  unpack: false
   |  |  |  position: null
   |  |  key: null
   |  |  byRef: false
   |  |  position: Latte\Compiler\Position
   |  |  |  line: 10
   |  |  |  column: 1
   |  |  |  offset: 188
   |  |  unpack: false
   |  9 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Expression\ArrayNode
   |  |  |  items: array (1)
   |  |  |  |  0 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  |  |  |  value: Latte\Compiler\Nodes\Php\Expression\ArrayNode
   |  |  |  |  |  |  items: array (3)
   |  |  |  |  |  |  |  0 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  |  |  |  |  |  |  value: Latte\Compiler\Nodes\Php\Scalar\IntegerNode
   |  |  |  |  |  |  |  |  |  value: 1
   |  |  |  |  |  |  |  |  |  kind: 10
   |  |  |  |  |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  |  |  |  |  line: 11
   |  |  |  |  |  |  |  |  |  |  column: 12
   |  |  |  |  |  |  |  |  |  |  offset: 233
   |  |  |  |  |  |  |  |  key: null
   |  |  |  |  |  |  |  |  byRef: false
   |  |  |  |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  |  |  |  line: 11
   |  |  |  |  |  |  |  |  |  column: 12
   |  |  |  |  |  |  |  |  |  offset: 233
   |  |  |  |  |  |  |  |  unpack: false
   |  |  |  |  |  |  |  1 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  |  |  |  |  |  |  value: Latte\Compiler\Nodes\Php\Scalar\IntegerNode
   |  |  |  |  |  |  |  |  |  value: 2
   |  |  |  |  |  |  |  |  |  kind: 10
   |  |  |  |  |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  |  |  |  |  line: 11
   |  |  |  |  |  |  |  |  |  |  column: 15
   |  |  |  |  |  |  |  |  |  |  offset: 236
   |  |  |  |  |  |  |  |  key: null
   |  |  |  |  |  |  |  |  byRef: false
   |  |  |  |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  |  |  |  line: 11
   |  |  |  |  |  |  |  |  |  column: 15
   |  |  |  |  |  |  |  |  |  offset: 236
   |  |  |  |  |  |  |  |  unpack: false
   |  |  |  |  |  |  |  2 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  |  |  |  |  |  |  value: Latte\Compiler\Nodes\Php\Scalar\IntegerNode
   |  |  |  |  |  |  |  |  |  value: 3
   |  |  |  |  |  |  |  |  |  kind: 10
   |  |  |  |  |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  |  |  |  |  line: 11
   |  |  |  |  |  |  |  |  |  |  column: 18
   |  |  |  |  |  |  |  |  |  |  offset: 239
   |  |  |  |  |  |  |  |  key: null
   |  |  |  |  |  |  |  |  byRef: false
   |  |  |  |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  |  |  |  line: 11
   |  |  |  |  |  |  |  |  |  column: 18
   |  |  |  |  |  |  |  |  |  offset: 239
   |  |  |  |  |  |  |  |  unpack: false
   |  |  |  |  |  |  position: null
   |  |  |  |  |  key: null
   |  |  |  |  |  byRef: false
   |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  line: 11
   |  |  |  |  |  |  column: 2
   |  |  |  |  |  |  offset: 223
   |  |  |  |  |  unpack: true
   |  |  |  position: null
   |  |  key: null
   |  |  byRef: false
   |  |  position: Latte\Compiler\Position
   |  |  |  line: 11
   |  |  |  column: 1
   |  |  |  offset: 222
   |  |  unpack: false
   position: null
