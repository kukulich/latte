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
   |  |  |  |  startLine: 1
   |  |  |  |  endLine: null
   |  |  |  expr: Latte\Compiler\Nodes\Php\Expression\ArrayNode
   |  |  |  |  items: array (3)
   |  |  |  |  |  0 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  |  |  |  |  value: Latte\Compiler\Nodes\Php\Scalar\IntegerNode
   |  |  |  |  |  |  |  value: 1
   |  |  |  |  |  |  |  kind: 10
   |  |  |  |  |  |  |  startLine: 1
   |  |  |  |  |  |  |  endLine: null
   |  |  |  |  |  |  key: null
   |  |  |  |  |  |  byRef: false
   |  |  |  |  |  |  startLine: 1
   |  |  |  |  |  |  unpack: false
   |  |  |  |  |  |  endLine: null
   |  |  |  |  |  1 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  |  |  |  |  value: Latte\Compiler\Nodes\Php\Scalar\IntegerNode
   |  |  |  |  |  |  |  value: 2
   |  |  |  |  |  |  |  kind: 10
   |  |  |  |  |  |  |  startLine: 1
   |  |  |  |  |  |  |  endLine: null
   |  |  |  |  |  |  key: null
   |  |  |  |  |  |  byRef: false
   |  |  |  |  |  |  startLine: 1
   |  |  |  |  |  |  unpack: false
   |  |  |  |  |  |  endLine: null
   |  |  |  |  |  2 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  |  |  |  |  value: Latte\Compiler\Nodes\Php\Scalar\IntegerNode
   |  |  |  |  |  |  |  value: 3
   |  |  |  |  |  |  |  kind: 10
   |  |  |  |  |  |  |  startLine: 1
   |  |  |  |  |  |  |  endLine: null
   |  |  |  |  |  |  key: null
   |  |  |  |  |  |  byRef: false
   |  |  |  |  |  |  startLine: 1
   |  |  |  |  |  |  unpack: false
   |  |  |  |  |  |  endLine: null
   |  |  |  |  startLine: null
   |  |  |  |  endLine: null
   |  |  |  byRef: false
   |  |  |  startLine: 1
   |  |  |  endLine: null
   |  |  key: null
   |  |  byRef: false
   |  |  startLine: 1
   |  |  unpack: false
   |  |  endLine: null
   |  1 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Expression\ArrayNode
   |  |  |  items: array (1)
   |  |  |  |  0 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  |  |  |  value: Latte\Compiler\Nodes\Php\Expression\ArrayNode
   |  |  |  |  |  |  items: array (0)
   |  |  |  |  |  |  startLine: null
   |  |  |  |  |  |  endLine: null
   |  |  |  |  |  key: null
   |  |  |  |  |  byRef: false
   |  |  |  |  |  startLine: 3
   |  |  |  |  |  unpack: true
   |  |  |  |  |  endLine: null
   |  |  |  startLine: null
   |  |  |  endLine: null
   |  |  key: null
   |  |  byRef: false
   |  |  startLine: 3
   |  |  unpack: false
   |  |  endLine: null
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
   |  |  |  |  |  |  |  |  |  startLine: 4
   |  |  |  |  |  |  |  |  |  endLine: null
   |  |  |  |  |  |  |  |  key: null
   |  |  |  |  |  |  |  |  byRef: false
   |  |  |  |  |  |  |  |  startLine: 4
   |  |  |  |  |  |  |  |  unpack: false
   |  |  |  |  |  |  |  |  endLine: null
   |  |  |  |  |  |  |  1 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  |  |  |  |  |  |  value: Latte\Compiler\Nodes\Php\Scalar\IntegerNode
   |  |  |  |  |  |  |  |  |  value: 2
   |  |  |  |  |  |  |  |  |  kind: 10
   |  |  |  |  |  |  |  |  |  startLine: 4
   |  |  |  |  |  |  |  |  |  endLine: null
   |  |  |  |  |  |  |  |  key: null
   |  |  |  |  |  |  |  |  byRef: false
   |  |  |  |  |  |  |  |  startLine: 4
   |  |  |  |  |  |  |  |  unpack: false
   |  |  |  |  |  |  |  |  endLine: null
   |  |  |  |  |  |  |  2 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  |  |  |  |  |  |  value: Latte\Compiler\Nodes\Php\Scalar\IntegerNode
   |  |  |  |  |  |  |  |  |  value: 3
   |  |  |  |  |  |  |  |  |  kind: 10
   |  |  |  |  |  |  |  |  |  startLine: 4
   |  |  |  |  |  |  |  |  |  endLine: null
   |  |  |  |  |  |  |  |  key: null
   |  |  |  |  |  |  |  |  byRef: false
   |  |  |  |  |  |  |  |  startLine: 4
   |  |  |  |  |  |  |  |  unpack: false
   |  |  |  |  |  |  |  |  endLine: null
   |  |  |  |  |  |  startLine: null
   |  |  |  |  |  |  endLine: null
   |  |  |  |  |  key: null
   |  |  |  |  |  byRef: false
   |  |  |  |  |  startLine: 4
   |  |  |  |  |  unpack: true
   |  |  |  |  |  endLine: null
   |  |  |  startLine: null
   |  |  |  endLine: null
   |  |  key: null
   |  |  byRef: false
   |  |  startLine: 4
   |  |  unpack: false
   |  |  endLine: null
   |  3 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Expression\ArrayNode
   |  |  |  items: array (1)
   |  |  |  |  0 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  |  |  |  value: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  |  |  name: 'array'
   |  |  |  |  |  |  startLine: 5
   |  |  |  |  |  |  endLine: null
   |  |  |  |  |  key: null
   |  |  |  |  |  byRef: false
   |  |  |  |  |  startLine: 5
   |  |  |  |  |  unpack: true
   |  |  |  |  |  endLine: null
   |  |  |  startLine: null
   |  |  |  endLine: null
   |  |  key: null
   |  |  byRef: false
   |  |  startLine: 5
   |  |  unpack: false
   |  |  endLine: null
   |  4 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Expression\ArrayNode
   |  |  |  items: array (1)
   |  |  |  |  0 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  |  |  |  value: Latte\Compiler\Nodes\Php\Expression\FunctionCallNode
   |  |  |  |  |  |  name: Latte\Compiler\Nodes\Php\NameNode
   |  |  |  |  |  |  |  parts: array (1)
   |  |  |  |  |  |  |  |  0 => 'getArr'
   |  |  |  |  |  |  |  startLine: 6
   |  |  |  |  |  |  |  endLine: null
   |  |  |  |  |  |  args: array (0)
   |  |  |  |  |  |  startLine: 6
   |  |  |  |  |  |  endLine: null
   |  |  |  |  |  key: null
   |  |  |  |  |  byRef: false
   |  |  |  |  |  startLine: 6
   |  |  |  |  |  unpack: true
   |  |  |  |  |  endLine: null
   |  |  |  startLine: null
   |  |  |  endLine: null
   |  |  key: null
   |  |  byRef: false
   |  |  startLine: 6
   |  |  unpack: false
   |  |  endLine: null
   |  5 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Expression\ArrayNode
   |  |  |  items: array (1)
   |  |  |  |  0 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  |  |  |  value: Latte\Compiler\Nodes\Php\Expression\FunctionCallNode
   |  |  |  |  |  |  name: Latte\Compiler\Nodes\Php\NameNode
   |  |  |  |  |  |  |  parts: array (1)
   |  |  |  |  |  |  |  |  0 => 'arrGen'
   |  |  |  |  |  |  |  startLine: 7
   |  |  |  |  |  |  |  endLine: null
   |  |  |  |  |  |  args: array (0)
   |  |  |  |  |  |  startLine: 7
   |  |  |  |  |  |  endLine: null
   |  |  |  |  |  key: null
   |  |  |  |  |  byRef: false
   |  |  |  |  |  startLine: 7
   |  |  |  |  |  unpack: true
   |  |  |  |  |  endLine: null
   |  |  |  startLine: null
   |  |  |  endLine: null
   |  |  key: null
   |  |  byRef: false
   |  |  startLine: 7
   |  |  unpack: false
   |  |  endLine: null
   |  6 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Expression\ArrayNode
   |  |  |  items: array (1)
   |  |  |  |  0 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  |  |  |  value: Latte\Compiler\Nodes\Php\Expression\NewNode
   |  |  |  |  |  |  class: Latte\Compiler\Nodes\Php\NameNode
   |  |  |  |  |  |  |  parts: array (1)
   |  |  |  |  |  |  |  |  0 => 'ArrayIterator'
   |  |  |  |  |  |  |  startLine: 8
   |  |  |  |  |  |  |  endLine: null
   |  |  |  |  |  |  args: array (1)
   |  |  |  |  |  |  |  0 => Latte\Compiler\Nodes\Php\ArgumentNode
   |  |  |  |  |  |  |  |  value: Latte\Compiler\Nodes\Php\Expression\ArrayNode
   |  |  |  |  |  |  |  |  |  items: array (3)
   |  |  |  |  |  |  |  |  |  |  0 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  |  |  |  |  |  |  |  |  |  value: Latte\Compiler\Nodes\Php\Scalar\StringNode
   |  |  |  |  |  |  |  |  |  |  |  |  value: 'a'
   |  |  |  |  |  |  |  |  |  |  |  |  startLine: 8
   |  |  |  |  |  |  |  |  |  |  |  |  endLine: null
   |  |  |  |  |  |  |  |  |  |  |  key: null
   |  |  |  |  |  |  |  |  |  |  |  byRef: false
   |  |  |  |  |  |  |  |  |  |  |  startLine: 8
   |  |  |  |  |  |  |  |  |  |  |  unpack: false
   |  |  |  |  |  |  |  |  |  |  |  endLine: null
   |  |  |  |  |  |  |  |  |  |  1 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  |  |  |  |  |  |  |  |  |  value: Latte\Compiler\Nodes\Php\Scalar\StringNode
   |  |  |  |  |  |  |  |  |  |  |  |  value: 'b'
   |  |  |  |  |  |  |  |  |  |  |  |  startLine: 8
   |  |  |  |  |  |  |  |  |  |  |  |  endLine: null
   |  |  |  |  |  |  |  |  |  |  |  key: null
   |  |  |  |  |  |  |  |  |  |  |  byRef: false
   |  |  |  |  |  |  |  |  |  |  |  startLine: 8
   |  |  |  |  |  |  |  |  |  |  |  unpack: false
   |  |  |  |  |  |  |  |  |  |  |  endLine: null
   |  |  |  |  |  |  |  |  |  |  2 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  |  |  |  |  |  |  |  |  |  value: Latte\Compiler\Nodes\Php\Scalar\StringNode
   |  |  |  |  |  |  |  |  |  |  |  |  value: 'c'
   |  |  |  |  |  |  |  |  |  |  |  |  startLine: 8
   |  |  |  |  |  |  |  |  |  |  |  |  endLine: null
   |  |  |  |  |  |  |  |  |  |  |  key: null
   |  |  |  |  |  |  |  |  |  |  |  byRef: false
   |  |  |  |  |  |  |  |  |  |  |  startLine: 8
   |  |  |  |  |  |  |  |  |  |  |  unpack: false
   |  |  |  |  |  |  |  |  |  |  |  endLine: null
   |  |  |  |  |  |  |  |  |  startLine: null
   |  |  |  |  |  |  |  |  |  endLine: null
   |  |  |  |  |  |  |  |  byRef: false
   |  |  |  |  |  |  |  |  unpack: false
   |  |  |  |  |  |  |  |  startLine: 8
   |  |  |  |  |  |  |  |  name: null
   |  |  |  |  |  |  |  |  endLine: null
   |  |  |  |  |  |  startLine: 8
   |  |  |  |  |  |  endLine: null
   |  |  |  |  |  key: null
   |  |  |  |  |  byRef: false
   |  |  |  |  |  startLine: 8
   |  |  |  |  |  unpack: true
   |  |  |  |  |  endLine: null
   |  |  |  startLine: null
   |  |  |  endLine: null
   |  |  key: null
   |  |  byRef: false
   |  |  startLine: 8
   |  |  unpack: false
   |  |  endLine: null
   |  7 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Expression\ArrayNode
   |  |  |  items: array (9)
   |  |  |  |  0 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  |  |  |  value: Latte\Compiler\Nodes\Php\Scalar\IntegerNode
   |  |  |  |  |  |  value: 0
   |  |  |  |  |  |  kind: 10
   |  |  |  |  |  |  startLine: 9
   |  |  |  |  |  |  endLine: null
   |  |  |  |  |  key: null
   |  |  |  |  |  byRef: false
   |  |  |  |  |  startLine: 9
   |  |  |  |  |  unpack: false
   |  |  |  |  |  endLine: null
   |  |  |  |  1 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  |  |  |  value: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  |  |  name: 'array'
   |  |  |  |  |  |  startLine: 9
   |  |  |  |  |  |  endLine: null
   |  |  |  |  |  key: null
   |  |  |  |  |  byRef: false
   |  |  |  |  |  startLine: 9
   |  |  |  |  |  unpack: true
   |  |  |  |  |  endLine: null
   |  |  |  |  2 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  |  |  |  value: Latte\Compiler\Nodes\Php\Expression\FunctionCallNode
   |  |  |  |  |  |  name: Latte\Compiler\Nodes\Php\NameNode
   |  |  |  |  |  |  |  parts: array (1)
   |  |  |  |  |  |  |  |  0 => 'getArr'
   |  |  |  |  |  |  |  startLine: 9
   |  |  |  |  |  |  |  endLine: null
   |  |  |  |  |  |  args: array (0)
   |  |  |  |  |  |  startLine: 9
   |  |  |  |  |  |  endLine: null
   |  |  |  |  |  key: null
   |  |  |  |  |  byRef: false
   |  |  |  |  |  startLine: 9
   |  |  |  |  |  unpack: true
   |  |  |  |  |  endLine: null
   |  |  |  |  3 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  |  |  |  value: Latte\Compiler\Nodes\Php\Scalar\IntegerNode
   |  |  |  |  |  |  value: 6
   |  |  |  |  |  |  kind: 10
   |  |  |  |  |  |  startLine: 9
   |  |  |  |  |  |  endLine: null
   |  |  |  |  |  key: null
   |  |  |  |  |  byRef: false
   |  |  |  |  |  startLine: 9
   |  |  |  |  |  unpack: false
   |  |  |  |  |  endLine: null
   |  |  |  |  4 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  |  |  |  value: Latte\Compiler\Nodes\Php\Scalar\IntegerNode
   |  |  |  |  |  |  value: 7
   |  |  |  |  |  |  kind: 10
   |  |  |  |  |  |  startLine: 9
   |  |  |  |  |  |  endLine: null
   |  |  |  |  |  key: null
   |  |  |  |  |  byRef: false
   |  |  |  |  |  startLine: 9
   |  |  |  |  |  unpack: false
   |  |  |  |  |  endLine: null
   |  |  |  |  5 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  |  |  |  value: Latte\Compiler\Nodes\Php\Scalar\IntegerNode
   |  |  |  |  |  |  value: 8
   |  |  |  |  |  |  kind: 10
   |  |  |  |  |  |  startLine: 9
   |  |  |  |  |  |  endLine: null
   |  |  |  |  |  key: null
   |  |  |  |  |  byRef: false
   |  |  |  |  |  startLine: 9
   |  |  |  |  |  unpack: false
   |  |  |  |  |  endLine: null
   |  |  |  |  6 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  |  |  |  value: Latte\Compiler\Nodes\Php\Scalar\IntegerNode
   |  |  |  |  |  |  value: 9
   |  |  |  |  |  |  kind: 10
   |  |  |  |  |  |  startLine: 9
   |  |  |  |  |  |  endLine: null
   |  |  |  |  |  key: null
   |  |  |  |  |  byRef: false
   |  |  |  |  |  startLine: 9
   |  |  |  |  |  unpack: false
   |  |  |  |  |  endLine: null
   |  |  |  |  7 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  |  |  |  value: Latte\Compiler\Nodes\Php\Scalar\IntegerNode
   |  |  |  |  |  |  value: 10
   |  |  |  |  |  |  kind: 10
   |  |  |  |  |  |  startLine: 9
   |  |  |  |  |  |  endLine: null
   |  |  |  |  |  key: null
   |  |  |  |  |  byRef: false
   |  |  |  |  |  startLine: 9
   |  |  |  |  |  unpack: false
   |  |  |  |  |  endLine: null
   |  |  |  |  8 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  |  |  |  value: Latte\Compiler\Nodes\Php\Expression\FunctionCallNode
   |  |  |  |  |  |  name: Latte\Compiler\Nodes\Php\NameNode
   |  |  |  |  |  |  |  parts: array (1)
   |  |  |  |  |  |  |  |  0 => 'arrGen'
   |  |  |  |  |  |  |  startLine: 9
   |  |  |  |  |  |  |  endLine: null
   |  |  |  |  |  |  args: array (0)
   |  |  |  |  |  |  startLine: 9
   |  |  |  |  |  |  endLine: null
   |  |  |  |  |  key: null
   |  |  |  |  |  byRef: false
   |  |  |  |  |  startLine: 9
   |  |  |  |  |  unpack: true
   |  |  |  |  |  endLine: null
   |  |  |  startLine: null
   |  |  |  endLine: null
   |  |  key: null
   |  |  byRef: false
   |  |  startLine: 9
   |  |  unpack: false
   |  |  endLine: null
   |  8 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Expression\ArrayNode
   |  |  |  items: array (4)
   |  |  |  |  0 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  |  |  |  value: Latte\Compiler\Nodes\Php\Scalar\IntegerNode
   |  |  |  |  |  |  value: 0
   |  |  |  |  |  |  kind: 10
   |  |  |  |  |  |  startLine: 10
   |  |  |  |  |  |  endLine: null
   |  |  |  |  |  key: null
   |  |  |  |  |  byRef: false
   |  |  |  |  |  startLine: 10
   |  |  |  |  |  unpack: false
   |  |  |  |  |  endLine: null
   |  |  |  |  1 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  |  |  |  value: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  |  |  name: 'array'
   |  |  |  |  |  |  startLine: 10
   |  |  |  |  |  |  endLine: null
   |  |  |  |  |  key: null
   |  |  |  |  |  byRef: false
   |  |  |  |  |  startLine: 10
   |  |  |  |  |  unpack: true
   |  |  |  |  |  endLine: null
   |  |  |  |  2 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  |  |  |  value: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  |  |  name: 'array'
   |  |  |  |  |  |  startLine: 10
   |  |  |  |  |  |  endLine: null
   |  |  |  |  |  key: null
   |  |  |  |  |  byRef: false
   |  |  |  |  |  startLine: 10
   |  |  |  |  |  unpack: true
   |  |  |  |  |  endLine: null
   |  |  |  |  3 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  |  |  |  value: Latte\Compiler\Nodes\Php\Scalar\StringNode
   |  |  |  |  |  |  value: 'end'
   |  |  |  |  |  |  startLine: 10
   |  |  |  |  |  |  endLine: null
   |  |  |  |  |  key: null
   |  |  |  |  |  byRef: false
   |  |  |  |  |  startLine: 10
   |  |  |  |  |  unpack: false
   |  |  |  |  |  endLine: null
   |  |  |  startLine: null
   |  |  |  endLine: null
   |  |  key: null
   |  |  byRef: false
   |  |  startLine: 10
   |  |  unpack: false
   |  |  endLine: null
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
   |  |  |  |  |  |  |  |  |  startLine: 11
   |  |  |  |  |  |  |  |  |  endLine: null
   |  |  |  |  |  |  |  |  key: null
   |  |  |  |  |  |  |  |  byRef: false
   |  |  |  |  |  |  |  |  startLine: 11
   |  |  |  |  |  |  |  |  unpack: false
   |  |  |  |  |  |  |  |  endLine: null
   |  |  |  |  |  |  |  1 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  |  |  |  |  |  |  value: Latte\Compiler\Nodes\Php\Scalar\IntegerNode
   |  |  |  |  |  |  |  |  |  value: 2
   |  |  |  |  |  |  |  |  |  kind: 10
   |  |  |  |  |  |  |  |  |  startLine: 11
   |  |  |  |  |  |  |  |  |  endLine: null
   |  |  |  |  |  |  |  |  key: null
   |  |  |  |  |  |  |  |  byRef: false
   |  |  |  |  |  |  |  |  startLine: 11
   |  |  |  |  |  |  |  |  unpack: false
   |  |  |  |  |  |  |  |  endLine: null
   |  |  |  |  |  |  |  2 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  |  |  |  |  |  |  value: Latte\Compiler\Nodes\Php\Scalar\IntegerNode
   |  |  |  |  |  |  |  |  |  value: 3
   |  |  |  |  |  |  |  |  |  kind: 10
   |  |  |  |  |  |  |  |  |  startLine: 11
   |  |  |  |  |  |  |  |  |  endLine: null
   |  |  |  |  |  |  |  |  key: null
   |  |  |  |  |  |  |  |  byRef: false
   |  |  |  |  |  |  |  |  startLine: 11
   |  |  |  |  |  |  |  |  unpack: false
   |  |  |  |  |  |  |  |  endLine: null
   |  |  |  |  |  |  startLine: null
   |  |  |  |  |  |  endLine: null
   |  |  |  |  |  key: null
   |  |  |  |  |  byRef: false
   |  |  |  |  |  startLine: 11
   |  |  |  |  |  unpack: true
   |  |  |  |  |  endLine: null
   |  |  |  startLine: null
   |  |  |  endLine: null
   |  |  key: null
   |  |  byRef: false
   |  |  startLine: 11
   |  |  unpack: false
   |  |  endLine: null
   startLine: null
   endLine: null
