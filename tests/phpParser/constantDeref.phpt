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
   |  |  |  var: Latte\Compiler\Nodes\Php\Scalar\StringNode
   |  |  |  |  value: 'abc'
   |  |  |  |  startLine: 1
   |  |  |  |  endLine: null
   |  |  |  index: Latte\Compiler\Nodes\Php\Scalar\IntegerNode
   |  |  |  |  value: 2
   |  |  |  |  kind: 10
   |  |  |  |  startLine: 1
   |  |  |  |  endLine: null
   |  |  |  startLine: 1
   |  |  |  endLine: null
   |  |  key: null
   |  |  byRef: false
   |  |  startLine: 1
   |  |  unpack: false
   |  |  endLine: null
   |  1 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Expression\ArrayAccessNode
   |  |  |  var: Latte\Compiler\Nodes\Php\Expression\ArrayAccessNode
   |  |  |  |  var: Latte\Compiler\Nodes\Php\Expression\ArrayAccessNode
   |  |  |  |  |  var: Latte\Compiler\Nodes\Php\Scalar\StringNode
   |  |  |  |  |  |  value: 'abc'
   |  |  |  |  |  |  startLine: 2
   |  |  |  |  |  |  endLine: null
   |  |  |  |  |  index: Latte\Compiler\Nodes\Php\Scalar\IntegerNode
   |  |  |  |  |  |  value: 2
   |  |  |  |  |  |  kind: 10
   |  |  |  |  |  |  startLine: 2
   |  |  |  |  |  |  endLine: null
   |  |  |  |  |  startLine: 2
   |  |  |  |  |  endLine: null
   |  |  |  |  index: Latte\Compiler\Nodes\Php\Scalar\IntegerNode
   |  |  |  |  |  value: 0
   |  |  |  |  |  kind: 10
   |  |  |  |  |  startLine: 2
   |  |  |  |  |  endLine: null
   |  |  |  |  startLine: 2
   |  |  |  |  endLine: null
   |  |  |  index: Latte\Compiler\Nodes\Php\Scalar\IntegerNode
   |  |  |  |  value: 0
   |  |  |  |  kind: 10
   |  |  |  |  startLine: 2
   |  |  |  |  endLine: null
   |  |  |  startLine: 2
   |  |  |  endLine: null
   |  |  key: null
   |  |  byRef: false
   |  |  startLine: 2
   |  |  unpack: false
   |  |  endLine: null
   |  2 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Expression\ArrayAccessNode
   |  |  |  var: Latte\Compiler\Nodes\Php\Expression\ArrayNode
   |  |  |  |  items: array (3)
   |  |  |  |  |  0 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  |  |  |  |  value: Latte\Compiler\Nodes\Php\Scalar\IntegerNode
   |  |  |  |  |  |  |  value: 1
   |  |  |  |  |  |  |  kind: 10
   |  |  |  |  |  |  |  startLine: 4
   |  |  |  |  |  |  |  endLine: null
   |  |  |  |  |  |  key: null
   |  |  |  |  |  |  byRef: false
   |  |  |  |  |  |  startLine: 4
   |  |  |  |  |  |  unpack: false
   |  |  |  |  |  |  endLine: null
   |  |  |  |  |  1 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  |  |  |  |  value: Latte\Compiler\Nodes\Php\Scalar\IntegerNode
   |  |  |  |  |  |  |  value: 2
   |  |  |  |  |  |  |  kind: 10
   |  |  |  |  |  |  |  startLine: 4
   |  |  |  |  |  |  |  endLine: null
   |  |  |  |  |  |  key: null
   |  |  |  |  |  |  byRef: false
   |  |  |  |  |  |  startLine: 4
   |  |  |  |  |  |  unpack: false
   |  |  |  |  |  |  endLine: null
   |  |  |  |  |  2 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  |  |  |  |  value: Latte\Compiler\Nodes\Php\Scalar\IntegerNode
   |  |  |  |  |  |  |  value: 3
   |  |  |  |  |  |  |  kind: 10
   |  |  |  |  |  |  |  startLine: 4
   |  |  |  |  |  |  |  endLine: null
   |  |  |  |  |  |  key: null
   |  |  |  |  |  |  byRef: false
   |  |  |  |  |  |  startLine: 4
   |  |  |  |  |  |  unpack: false
   |  |  |  |  |  |  endLine: null
   |  |  |  |  startLine: null
   |  |  |  |  endLine: null
   |  |  |  index: Latte\Compiler\Nodes\Php\Scalar\IntegerNode
   |  |  |  |  value: 2
   |  |  |  |  kind: 10
   |  |  |  |  startLine: 4
   |  |  |  |  endLine: null
   |  |  |  startLine: 4
   |  |  |  endLine: null
   |  |  key: null
   |  |  byRef: false
   |  |  startLine: 4
   |  |  unpack: false
   |  |  endLine: null
   |  3 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Expression\ArrayAccessNode
   |  |  |  var: Latte\Compiler\Nodes\Php\Expression\ArrayAccessNode
   |  |  |  |  var: Latte\Compiler\Nodes\Php\Expression\ArrayAccessNode
   |  |  |  |  |  var: Latte\Compiler\Nodes\Php\Expression\ArrayNode
   |  |  |  |  |  |  items: array (3)
   |  |  |  |  |  |  |  0 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  |  |  |  |  |  |  value: Latte\Compiler\Nodes\Php\Scalar\IntegerNode
   |  |  |  |  |  |  |  |  |  value: 1
   |  |  |  |  |  |  |  |  |  kind: 10
   |  |  |  |  |  |  |  |  |  startLine: 5
   |  |  |  |  |  |  |  |  |  endLine: null
   |  |  |  |  |  |  |  |  key: null
   |  |  |  |  |  |  |  |  byRef: false
   |  |  |  |  |  |  |  |  startLine: 5
   |  |  |  |  |  |  |  |  unpack: false
   |  |  |  |  |  |  |  |  endLine: null
   |  |  |  |  |  |  |  1 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  |  |  |  |  |  |  value: Latte\Compiler\Nodes\Php\Scalar\IntegerNode
   |  |  |  |  |  |  |  |  |  value: 2
   |  |  |  |  |  |  |  |  |  kind: 10
   |  |  |  |  |  |  |  |  |  startLine: 5
   |  |  |  |  |  |  |  |  |  endLine: null
   |  |  |  |  |  |  |  |  key: null
   |  |  |  |  |  |  |  |  byRef: false
   |  |  |  |  |  |  |  |  startLine: 5
   |  |  |  |  |  |  |  |  unpack: false
   |  |  |  |  |  |  |  |  endLine: null
   |  |  |  |  |  |  |  2 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  |  |  |  |  |  |  value: Latte\Compiler\Nodes\Php\Scalar\IntegerNode
   |  |  |  |  |  |  |  |  |  value: 3
   |  |  |  |  |  |  |  |  |  kind: 10
   |  |  |  |  |  |  |  |  |  startLine: 5
   |  |  |  |  |  |  |  |  |  endLine: null
   |  |  |  |  |  |  |  |  key: null
   |  |  |  |  |  |  |  |  byRef: false
   |  |  |  |  |  |  |  |  startLine: 5
   |  |  |  |  |  |  |  |  unpack: false
   |  |  |  |  |  |  |  |  endLine: null
   |  |  |  |  |  |  startLine: null
   |  |  |  |  |  |  endLine: null
   |  |  |  |  |  index: Latte\Compiler\Nodes\Php\Scalar\IntegerNode
   |  |  |  |  |  |  value: 2
   |  |  |  |  |  |  kind: 10
   |  |  |  |  |  |  startLine: 5
   |  |  |  |  |  |  endLine: null
   |  |  |  |  |  startLine: 5
   |  |  |  |  |  endLine: null
   |  |  |  |  index: Latte\Compiler\Nodes\Php\Scalar\IntegerNode
   |  |  |  |  |  value: 0
   |  |  |  |  |  kind: 10
   |  |  |  |  |  startLine: 5
   |  |  |  |  |  endLine: null
   |  |  |  |  startLine: 5
   |  |  |  |  endLine: null
   |  |  |  index: Latte\Compiler\Nodes\Php\Scalar\IntegerNode
   |  |  |  |  value: 0
   |  |  |  |  kind: 10
   |  |  |  |  startLine: 5
   |  |  |  |  endLine: null
   |  |  |  startLine: 5
   |  |  |  endLine: null
   |  |  key: null
   |  |  byRef: false
   |  |  startLine: 5
   |  |  unpack: false
   |  |  endLine: null
   |  4 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Expression\ArrayAccessNode
   |  |  |  var: Latte\Compiler\Nodes\Php\Expression\ArrayNode
   |  |  |  |  items: array (3)
   |  |  |  |  |  0 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  |  |  |  |  value: Latte\Compiler\Nodes\Php\Scalar\IntegerNode
   |  |  |  |  |  |  |  value: 1
   |  |  |  |  |  |  |  kind: 10
   |  |  |  |  |  |  |  startLine: 7
   |  |  |  |  |  |  |  endLine: null
   |  |  |  |  |  |  key: null
   |  |  |  |  |  |  byRef: false
   |  |  |  |  |  |  startLine: 7
   |  |  |  |  |  |  unpack: false
   |  |  |  |  |  |  endLine: null
   |  |  |  |  |  1 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  |  |  |  |  value: Latte\Compiler\Nodes\Php\Scalar\IntegerNode
   |  |  |  |  |  |  |  value: 2
   |  |  |  |  |  |  |  kind: 10
   |  |  |  |  |  |  |  startLine: 7
   |  |  |  |  |  |  |  endLine: null
   |  |  |  |  |  |  key: null
   |  |  |  |  |  |  byRef: false
   |  |  |  |  |  |  startLine: 7
   |  |  |  |  |  |  unpack: false
   |  |  |  |  |  |  endLine: null
   |  |  |  |  |  2 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  |  |  |  |  value: Latte\Compiler\Nodes\Php\Scalar\IntegerNode
   |  |  |  |  |  |  |  value: 3
   |  |  |  |  |  |  |  kind: 10
   |  |  |  |  |  |  |  startLine: 7
   |  |  |  |  |  |  |  endLine: null
   |  |  |  |  |  |  key: null
   |  |  |  |  |  |  byRef: false
   |  |  |  |  |  |  startLine: 7
   |  |  |  |  |  |  unpack: false
   |  |  |  |  |  |  endLine: null
   |  |  |  |  startLine: null
   |  |  |  |  endLine: null
   |  |  |  index: Latte\Compiler\Nodes\Php\Scalar\IntegerNode
   |  |  |  |  value: 2
   |  |  |  |  kind: 10
   |  |  |  |  startLine: 7
   |  |  |  |  endLine: null
   |  |  |  startLine: 7
   |  |  |  endLine: null
   |  |  key: null
   |  |  byRef: false
   |  |  startLine: 7
   |  |  unpack: false
   |  |  endLine: null
   |  5 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Expression\ArrayAccessNode
   |  |  |  var: Latte\Compiler\Nodes\Php\Expression\ArrayAccessNode
   |  |  |  |  var: Latte\Compiler\Nodes\Php\Expression\ArrayAccessNode
   |  |  |  |  |  var: Latte\Compiler\Nodes\Php\Expression\ArrayNode
   |  |  |  |  |  |  items: array (3)
   |  |  |  |  |  |  |  0 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  |  |  |  |  |  |  value: Latte\Compiler\Nodes\Php\Scalar\IntegerNode
   |  |  |  |  |  |  |  |  |  value: 1
   |  |  |  |  |  |  |  |  |  kind: 10
   |  |  |  |  |  |  |  |  |  startLine: 8
   |  |  |  |  |  |  |  |  |  endLine: null
   |  |  |  |  |  |  |  |  key: null
   |  |  |  |  |  |  |  |  byRef: false
   |  |  |  |  |  |  |  |  startLine: 8
   |  |  |  |  |  |  |  |  unpack: false
   |  |  |  |  |  |  |  |  endLine: null
   |  |  |  |  |  |  |  1 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  |  |  |  |  |  |  value: Latte\Compiler\Nodes\Php\Scalar\IntegerNode
   |  |  |  |  |  |  |  |  |  value: 2
   |  |  |  |  |  |  |  |  |  kind: 10
   |  |  |  |  |  |  |  |  |  startLine: 8
   |  |  |  |  |  |  |  |  |  endLine: null
   |  |  |  |  |  |  |  |  key: null
   |  |  |  |  |  |  |  |  byRef: false
   |  |  |  |  |  |  |  |  startLine: 8
   |  |  |  |  |  |  |  |  unpack: false
   |  |  |  |  |  |  |  |  endLine: null
   |  |  |  |  |  |  |  2 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  |  |  |  |  |  |  value: Latte\Compiler\Nodes\Php\Scalar\IntegerNode
   |  |  |  |  |  |  |  |  |  value: 3
   |  |  |  |  |  |  |  |  |  kind: 10
   |  |  |  |  |  |  |  |  |  startLine: 8
   |  |  |  |  |  |  |  |  |  endLine: null
   |  |  |  |  |  |  |  |  key: null
   |  |  |  |  |  |  |  |  byRef: false
   |  |  |  |  |  |  |  |  startLine: 8
   |  |  |  |  |  |  |  |  unpack: false
   |  |  |  |  |  |  |  |  endLine: null
   |  |  |  |  |  |  startLine: null
   |  |  |  |  |  |  endLine: null
   |  |  |  |  |  index: Latte\Compiler\Nodes\Php\Scalar\IntegerNode
   |  |  |  |  |  |  value: 2
   |  |  |  |  |  |  kind: 10
   |  |  |  |  |  |  startLine: 8
   |  |  |  |  |  |  endLine: null
   |  |  |  |  |  startLine: 8
   |  |  |  |  |  endLine: null
   |  |  |  |  index: Latte\Compiler\Nodes\Php\Scalar\IntegerNode
   |  |  |  |  |  value: 0
   |  |  |  |  |  kind: 10
   |  |  |  |  |  startLine: 8
   |  |  |  |  |  endLine: null
   |  |  |  |  startLine: 8
   |  |  |  |  endLine: null
   |  |  |  index: Latte\Compiler\Nodes\Php\Scalar\IntegerNode
   |  |  |  |  value: 0
   |  |  |  |  kind: 10
   |  |  |  |  startLine: 8
   |  |  |  |  endLine: null
   |  |  |  startLine: 8
   |  |  |  endLine: null
   |  |  key: null
   |  |  byRef: false
   |  |  startLine: 8
   |  |  unpack: false
   |  |  endLine: null
   |  6 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Expression\ArrayAccessNode
   |  |  |  var: Latte\Compiler\Nodes\Php\Expression\ConstantFetchNode
   |  |  |  |  name: Latte\Compiler\Nodes\Php\NameNode
   |  |  |  |  |  parts: array (1)
   |  |  |  |  |  |  0 => 'FOO'
   |  |  |  |  |  startLine: 10
   |  |  |  |  |  endLine: null
   |  |  |  |  startLine: 10
   |  |  |  |  endLine: null
   |  |  |  index: Latte\Compiler\Nodes\Php\Scalar\IntegerNode
   |  |  |  |  value: 0
   |  |  |  |  kind: 10
   |  |  |  |  startLine: 10
   |  |  |  |  endLine: null
   |  |  |  startLine: 10
   |  |  |  endLine: null
   |  |  key: null
   |  |  byRef: false
   |  |  startLine: 10
   |  |  unpack: false
   |  |  endLine: null
   |  7 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Expression\ArrayAccessNode
   |  |  |  var: Latte\Compiler\Nodes\Php\Expression\ConstantFetchNode
   |  |  |  |  name: Latte\Compiler\Nodes\Php\NameNode
   |  |  |  |  |  parts: array (1)
   |  |  |  |  |  |  0 => 'foo'
   |  |  |  |  |  startLine: 11
   |  |  |  |  |  endLine: null
   |  |  |  |  startLine: 11
   |  |  |  |  endLine: null
   |  |  |  index: Latte\Compiler\Nodes\Php\Scalar\IntegerNode
   |  |  |  |  value: 0
   |  |  |  |  kind: 10
   |  |  |  |  startLine: 11
   |  |  |  |  endLine: null
   |  |  |  startLine: 11
   |  |  |  endLine: null
   |  |  key: null
   |  |  byRef: false
   |  |  startLine: 11
   |  |  unpack: false
   |  |  endLine: null
   |  8 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Expression\ArrayAccessNode
   |  |  |  var: Latte\Compiler\Nodes\Php\Expression\ConstantFetchNode
   |  |  |  |  name: Latte\Compiler\Nodes\Php\NameNode
   |  |  |  |  |  parts: array (2)
   |  |  |  |  |  |  0 => 'x'
   |  |  |  |  |  |  1 => 'foo'
   |  |  |  |  |  startLine: 12
   |  |  |  |  |  endLine: null
   |  |  |  |  startLine: 12
   |  |  |  |  endLine: null
   |  |  |  index: Latte\Compiler\Nodes\Php\Scalar\IntegerNode
   |  |  |  |  value: 0
   |  |  |  |  kind: 10
   |  |  |  |  startLine: 12
   |  |  |  |  endLine: null
   |  |  |  startLine: 12
   |  |  |  endLine: null
   |  |  key: null
   |  |  byRef: false
   |  |  startLine: 12
   |  |  unpack: false
   |  |  endLine: null
   |  9 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Expression\ArrayAccessNode
   |  |  |  var: Latte\Compiler\Nodes\Php\Expression\ClassConstantFetchNode
   |  |  |  |  class: Latte\Compiler\Nodes\Php\NameNode
   |  |  |  |  |  parts: array (1)
   |  |  |  |  |  |  0 => 'Foo'
   |  |  |  |  |  startLine: 13
   |  |  |  |  |  endLine: null
   |  |  |  |  name: Latte\Compiler\Nodes\Php\IdentifierNode
   |  |  |  |  |  name: 'BAR'
   |  |  |  |  |  startLine: 13
   |  |  |  |  |  endLine: null
   |  |  |  |  startLine: 13
   |  |  |  |  endLine: null
   |  |  |  index: Latte\Compiler\Nodes\Php\Scalar\IntegerNode
   |  |  |  |  value: 1
   |  |  |  |  kind: 10
   |  |  |  |  startLine: 13
   |  |  |  |  endLine: null
   |  |  |  startLine: 13
   |  |  |  endLine: null
   |  |  key: null
   |  |  byRef: false
   |  |  startLine: 13
   |  |  unpack: false
   |  |  endLine: null
   |  10 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Expression\ArrayAccessNode
   |  |  |  var: Latte\Compiler\Nodes\Php\Expression\ArrayAccessNode
   |  |  |  |  var: Latte\Compiler\Nodes\Php\Expression\ArrayAccessNode
   |  |  |  |  |  var: Latte\Compiler\Nodes\Php\Expression\ClassConstantFetchNode
   |  |  |  |  |  |  class: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  |  |  |  name: 'foo'
   |  |  |  |  |  |  |  startLine: 14
   |  |  |  |  |  |  |  endLine: null
   |  |  |  |  |  |  name: Latte\Compiler\Nodes\Php\IdentifierNode
   |  |  |  |  |  |  |  name: 'BAR'
   |  |  |  |  |  |  |  startLine: 14
   |  |  |  |  |  |  |  endLine: null
   |  |  |  |  |  |  startLine: 14
   |  |  |  |  |  |  endLine: null
   |  |  |  |  |  index: Latte\Compiler\Nodes\Php\Scalar\IntegerNode
   |  |  |  |  |  |  value: 2
   |  |  |  |  |  |  kind: 10
   |  |  |  |  |  |  startLine: 14
   |  |  |  |  |  |  endLine: null
   |  |  |  |  |  startLine: 14
   |  |  |  |  |  endLine: null
   |  |  |  |  index: Latte\Compiler\Nodes\Php\Scalar\IntegerNode
   |  |  |  |  |  value: 1
   |  |  |  |  |  kind: 10
   |  |  |  |  |  startLine: 14
   |  |  |  |  |  endLine: null
   |  |  |  |  startLine: 14
   |  |  |  |  endLine: null
   |  |  |  index: Latte\Compiler\Nodes\Php\Scalar\IntegerNode
   |  |  |  |  value: 0
   |  |  |  |  kind: 10
   |  |  |  |  startLine: 14
   |  |  |  |  endLine: null
   |  |  |  startLine: 14
   |  |  |  endLine: null
   |  |  key: null
   |  |  byRef: false
   |  |  startLine: 14
   |  |  unpack: false
   |  |  endLine: null
   startLine: null
   endLine: null
