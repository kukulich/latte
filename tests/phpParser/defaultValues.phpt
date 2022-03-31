<?php

// Default parameter values

declare(strict_types=1);

use Tester\Assert;

require __DIR__ . '/../bootstrap.php';

$test = <<<'XX'
	function (
	    $b = null,
	    $c = 'foo',
	    $d = A::B,
	    $f = +1,
	    $g = -1.0,
	    $h = array(),
	    $i = [],
	    $j = ['foo'],
	    $k = ['foo', 'bar' => 'baz'],
	    $l = new Foo,
	) { return null; }
	XX;

$node = parseCode($test);

Assert::same(
	loadContent(__FILE__, __COMPILER_HALT_OFFSET__),
	exportNode($node),
);

__halt_compiler();
Latte\Compiler\Nodes\Php\Expression\ArrayNode
   items: array (1)
   |  0 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Expression\ClosureNode
   |  |  |  byRef: false
   |  |  |  params: array (10)
   |  |  |  |  0 => Latte\Compiler\Nodes\Php\ParameterNode
   |  |  |  |  |  type: null
   |  |  |  |  |  var: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  |  |  name: 'b'
   |  |  |  |  |  |  startLine: 2
   |  |  |  |  |  |  endLine: null
   |  |  |  |  |  default: Latte\Compiler\Nodes\Php\Expression\ConstantFetchNode
   |  |  |  |  |  |  name: Latte\Compiler\Nodes\Php\NameNode
   |  |  |  |  |  |  |  parts: array (1)
   |  |  |  |  |  |  |  |  0 => 'null'
   |  |  |  |  |  |  |  startLine: 2
   |  |  |  |  |  |  |  endLine: null
   |  |  |  |  |  |  startLine: 2
   |  |  |  |  |  |  endLine: null
   |  |  |  |  |  byRef: false
   |  |  |  |  |  variadic: false
   |  |  |  |  |  startLine: 2
   |  |  |  |  |  flags: 0
   |  |  |  |  |  endLine: null
   |  |  |  |  1 => Latte\Compiler\Nodes\Php\ParameterNode
   |  |  |  |  |  type: null
   |  |  |  |  |  var: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  |  |  name: 'c'
   |  |  |  |  |  |  startLine: 3
   |  |  |  |  |  |  endLine: null
   |  |  |  |  |  default: Latte\Compiler\Nodes\Php\Scalar\StringNode
   |  |  |  |  |  |  value: 'foo'
   |  |  |  |  |  |  startLine: 3
   |  |  |  |  |  |  endLine: null
   |  |  |  |  |  byRef: false
   |  |  |  |  |  variadic: false
   |  |  |  |  |  startLine: 3
   |  |  |  |  |  flags: 0
   |  |  |  |  |  endLine: null
   |  |  |  |  2 => Latte\Compiler\Nodes\Php\ParameterNode
   |  |  |  |  |  type: null
   |  |  |  |  |  var: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  |  |  name: 'd'
   |  |  |  |  |  |  startLine: 4
   |  |  |  |  |  |  endLine: null
   |  |  |  |  |  default: Latte\Compiler\Nodes\Php\Expression\ClassConstantFetchNode
   |  |  |  |  |  |  class: Latte\Compiler\Nodes\Php\NameNode
   |  |  |  |  |  |  |  parts: array (1)
   |  |  |  |  |  |  |  |  0 => 'A'
   |  |  |  |  |  |  |  startLine: 4
   |  |  |  |  |  |  |  endLine: null
   |  |  |  |  |  |  name: Latte\Compiler\Nodes\Php\IdentifierNode
   |  |  |  |  |  |  |  name: 'B'
   |  |  |  |  |  |  |  startLine: 4
   |  |  |  |  |  |  |  endLine: null
   |  |  |  |  |  |  startLine: 4
   |  |  |  |  |  |  endLine: null
   |  |  |  |  |  byRef: false
   |  |  |  |  |  variadic: false
   |  |  |  |  |  startLine: 4
   |  |  |  |  |  flags: 0
   |  |  |  |  |  endLine: null
   |  |  |  |  3 => Latte\Compiler\Nodes\Php\ParameterNode
   |  |  |  |  |  type: null
   |  |  |  |  |  var: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  |  |  name: 'f'
   |  |  |  |  |  |  startLine: 5
   |  |  |  |  |  |  endLine: null
   |  |  |  |  |  default: Latte\Compiler\Nodes\Php\Expression\UnaryOpNode
   |  |  |  |  |  |  expr: Latte\Compiler\Nodes\Php\Scalar\IntegerNode
   |  |  |  |  |  |  |  value: 1
   |  |  |  |  |  |  |  kind: 10
   |  |  |  |  |  |  |  startLine: 5
   |  |  |  |  |  |  |  endLine: null
   |  |  |  |  |  |  operator: '+'
   |  |  |  |  |  |  startLine: 5
   |  |  |  |  |  |  endLine: null
   |  |  |  |  |  byRef: false
   |  |  |  |  |  variadic: false
   |  |  |  |  |  startLine: 5
   |  |  |  |  |  flags: 0
   |  |  |  |  |  endLine: null
   |  |  |  |  4 => Latte\Compiler\Nodes\Php\ParameterNode
   |  |  |  |  |  type: null
   |  |  |  |  |  var: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  |  |  name: 'g'
   |  |  |  |  |  |  startLine: 6
   |  |  |  |  |  |  endLine: null
   |  |  |  |  |  default: Latte\Compiler\Nodes\Php\Expression\UnaryOpNode
   |  |  |  |  |  |  expr: Latte\Compiler\Nodes\Php\Scalar\FloatNode
   |  |  |  |  |  |  |  value: 1.0
   |  |  |  |  |  |  |  startLine: 6
   |  |  |  |  |  |  |  endLine: null
   |  |  |  |  |  |  operator: '-'
   |  |  |  |  |  |  startLine: 6
   |  |  |  |  |  |  endLine: null
   |  |  |  |  |  byRef: false
   |  |  |  |  |  variadic: false
   |  |  |  |  |  startLine: 6
   |  |  |  |  |  flags: 0
   |  |  |  |  |  endLine: null
   |  |  |  |  5 => Latte\Compiler\Nodes\Php\ParameterNode
   |  |  |  |  |  type: null
   |  |  |  |  |  var: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  |  |  name: 'h'
   |  |  |  |  |  |  startLine: 7
   |  |  |  |  |  |  endLine: null
   |  |  |  |  |  default: Latte\Compiler\Nodes\Php\Expression\ArrayNode
   |  |  |  |  |  |  items: array (0)
   |  |  |  |  |  |  startLine: null
   |  |  |  |  |  |  endLine: null
   |  |  |  |  |  byRef: false
   |  |  |  |  |  variadic: false
   |  |  |  |  |  startLine: 7
   |  |  |  |  |  flags: 0
   |  |  |  |  |  endLine: null
   |  |  |  |  6 => Latte\Compiler\Nodes\Php\ParameterNode
   |  |  |  |  |  type: null
   |  |  |  |  |  var: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  |  |  name: 'i'
   |  |  |  |  |  |  startLine: 8
   |  |  |  |  |  |  endLine: null
   |  |  |  |  |  default: Latte\Compiler\Nodes\Php\Expression\ArrayNode
   |  |  |  |  |  |  items: array (0)
   |  |  |  |  |  |  startLine: null
   |  |  |  |  |  |  endLine: null
   |  |  |  |  |  byRef: false
   |  |  |  |  |  variadic: false
   |  |  |  |  |  startLine: 8
   |  |  |  |  |  flags: 0
   |  |  |  |  |  endLine: null
   |  |  |  |  7 => Latte\Compiler\Nodes\Php\ParameterNode
   |  |  |  |  |  type: null
   |  |  |  |  |  var: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  |  |  name: 'j'
   |  |  |  |  |  |  startLine: 9
   |  |  |  |  |  |  endLine: null
   |  |  |  |  |  default: Latte\Compiler\Nodes\Php\Expression\ArrayNode
   |  |  |  |  |  |  items: array (1)
   |  |  |  |  |  |  |  0 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  |  |  |  |  |  |  value: Latte\Compiler\Nodes\Php\Scalar\StringNode
   |  |  |  |  |  |  |  |  |  value: 'foo'
   |  |  |  |  |  |  |  |  |  startLine: 9
   |  |  |  |  |  |  |  |  |  endLine: null
   |  |  |  |  |  |  |  |  key: null
   |  |  |  |  |  |  |  |  byRef: false
   |  |  |  |  |  |  |  |  startLine: 9
   |  |  |  |  |  |  |  |  unpack: false
   |  |  |  |  |  |  |  |  endLine: null
   |  |  |  |  |  |  startLine: null
   |  |  |  |  |  |  endLine: null
   |  |  |  |  |  byRef: false
   |  |  |  |  |  variadic: false
   |  |  |  |  |  startLine: 9
   |  |  |  |  |  flags: 0
   |  |  |  |  |  endLine: null
   |  |  |  |  8 => Latte\Compiler\Nodes\Php\ParameterNode
   |  |  |  |  |  type: null
   |  |  |  |  |  var: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  |  |  name: 'k'
   |  |  |  |  |  |  startLine: 10
   |  |  |  |  |  |  endLine: null
   |  |  |  |  |  default: Latte\Compiler\Nodes\Php\Expression\ArrayNode
   |  |  |  |  |  |  items: array (2)
   |  |  |  |  |  |  |  0 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  |  |  |  |  |  |  value: Latte\Compiler\Nodes\Php\Scalar\StringNode
   |  |  |  |  |  |  |  |  |  value: 'foo'
   |  |  |  |  |  |  |  |  |  startLine: 10
   |  |  |  |  |  |  |  |  |  endLine: null
   |  |  |  |  |  |  |  |  key: null
   |  |  |  |  |  |  |  |  byRef: false
   |  |  |  |  |  |  |  |  startLine: 10
   |  |  |  |  |  |  |  |  unpack: false
   |  |  |  |  |  |  |  |  endLine: null
   |  |  |  |  |  |  |  1 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  |  |  |  |  |  |  value: Latte\Compiler\Nodes\Php\Scalar\StringNode
   |  |  |  |  |  |  |  |  |  value: 'baz'
   |  |  |  |  |  |  |  |  |  startLine: 10
   |  |  |  |  |  |  |  |  |  endLine: null
   |  |  |  |  |  |  |  |  key: Latte\Compiler\Nodes\Php\Scalar\StringNode
   |  |  |  |  |  |  |  |  |  value: 'bar'
   |  |  |  |  |  |  |  |  |  startLine: 10
   |  |  |  |  |  |  |  |  |  endLine: null
   |  |  |  |  |  |  |  |  byRef: false
   |  |  |  |  |  |  |  |  startLine: 10
   |  |  |  |  |  |  |  |  unpack: false
   |  |  |  |  |  |  |  |  endLine: null
   |  |  |  |  |  |  startLine: null
   |  |  |  |  |  |  endLine: null
   |  |  |  |  |  byRef: false
   |  |  |  |  |  variadic: false
   |  |  |  |  |  startLine: 10
   |  |  |  |  |  flags: 0
   |  |  |  |  |  endLine: null
   |  |  |  |  9 => Latte\Compiler\Nodes\Php\ParameterNode
   |  |  |  |  |  type: null
   |  |  |  |  |  var: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  |  |  name: 'l'
   |  |  |  |  |  |  startLine: 11
   |  |  |  |  |  |  endLine: null
   |  |  |  |  |  default: Latte\Compiler\Nodes\Php\Expression\NewNode
   |  |  |  |  |  |  class: Latte\Compiler\Nodes\Php\NameNode
   |  |  |  |  |  |  |  parts: array (1)
   |  |  |  |  |  |  |  |  0 => 'Foo'
   |  |  |  |  |  |  |  startLine: 11
   |  |  |  |  |  |  |  endLine: null
   |  |  |  |  |  |  args: array (0)
   |  |  |  |  |  |  startLine: 11
   |  |  |  |  |  |  endLine: null
   |  |  |  |  |  byRef: false
   |  |  |  |  |  variadic: false
   |  |  |  |  |  startLine: 11
   |  |  |  |  |  flags: 0
   |  |  |  |  |  endLine: null
   |  |  |  uses: array (0)
   |  |  |  returnType: null
   |  |  |  expr: Latte\Compiler\Nodes\Php\Expression\ConstantFetchNode
   |  |  |  |  name: Latte\Compiler\Nodes\Php\NameNode
   |  |  |  |  |  parts: array (1)
   |  |  |  |  |  |  0 => 'null'
   |  |  |  |  |  startLine: 12
   |  |  |  |  |  endLine: null
   |  |  |  |  startLine: 12
   |  |  |  |  endLine: null
   |  |  |  startLine: 1
   |  |  |  endLine: null
   |  |  key: null
   |  |  byRef: false
   |  |  startLine: 1
   |  |  unpack: false
   |  |  endLine: null
   startLine: null
   endLine: null
