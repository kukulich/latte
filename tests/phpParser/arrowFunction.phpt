<?php

// Arrow Functions

declare(strict_types=1);

use Tester\Assert;

require __DIR__ . '/../bootstrap.php';

$test = <<<'XX'
	fn(bool $a) => $a,
	fn($x = 42) => $x,
	fn&($x) => $x,
	fn($x, ...$rest) => $rest,
	fn(): int => $x,

	fn($a, $b) => $a and $b,
	fn($a, $b) => $a && $b,
	XX;

$node = parseCode($test);

Assert::same(
	loadContent(__FILE__, __COMPILER_HALT_OFFSET__),
	exportNode($node),
);

__halt_compiler();
Latte\Compiler\Nodes\Php\Expression\ArrayNode
   items: array (7)
   |  0 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Expression\ClosureNode
   |  |  |  byRef: false
   |  |  |  params: array (1)
   |  |  |  |  0 => Latte\Compiler\Nodes\Php\ParameterNode
   |  |  |  |  |  type: Latte\Compiler\Nodes\Php\IdentifierNode
   |  |  |  |  |  |  name: 'bool'
   |  |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  |  line: 1
   |  |  |  |  |  |  |  column: 4
   |  |  |  |  |  |  |  offset: 3
   |  |  |  |  |  var: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  |  |  name: 'a'
   |  |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  |  line: 1
   |  |  |  |  |  |  |  column: 9
   |  |  |  |  |  |  |  offset: 8
   |  |  |  |  |  default: null
   |  |  |  |  |  byRef: false
   |  |  |  |  |  variadic: false
   |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  line: 1
   |  |  |  |  |  |  column: 4
   |  |  |  |  |  |  offset: 3
   |  |  |  |  |  flags: 0
   |  |  |  uses: array (0)
   |  |  |  returnType: null
   |  |  |  expr: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  name: 'a'
   |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  line: 1
   |  |  |  |  |  column: 16
   |  |  |  |  |  offset: 15
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
   |  |  value: Latte\Compiler\Nodes\Php\Expression\ClosureNode
   |  |  |  byRef: false
   |  |  |  params: array (1)
   |  |  |  |  0 => Latte\Compiler\Nodes\Php\ParameterNode
   |  |  |  |  |  type: null
   |  |  |  |  |  var: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  |  |  name: 'x'
   |  |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  |  line: 2
   |  |  |  |  |  |  |  column: 4
   |  |  |  |  |  |  |  offset: 22
   |  |  |  |  |  default: Latte\Compiler\Nodes\Php\Scalar\IntegerNode
   |  |  |  |  |  |  value: 42
   |  |  |  |  |  |  kind: 10
   |  |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  |  line: 2
   |  |  |  |  |  |  |  column: 9
   |  |  |  |  |  |  |  offset: 27
   |  |  |  |  |  byRef: false
   |  |  |  |  |  variadic: false
   |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  line: 2
   |  |  |  |  |  |  column: 4
   |  |  |  |  |  |  offset: 22
   |  |  |  |  |  flags: 0
   |  |  |  uses: array (0)
   |  |  |  returnType: null
   |  |  |  expr: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  name: 'x'
   |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  line: 2
   |  |  |  |  |  column: 16
   |  |  |  |  |  offset: 34
   |  |  |  position: Latte\Compiler\Position
   |  |  |  |  line: 2
   |  |  |  |  column: 1
   |  |  |  |  offset: 19
   |  |  key: null
   |  |  byRef: false
   |  |  position: Latte\Compiler\Position
   |  |  |  line: 2
   |  |  |  column: 1
   |  |  |  offset: 19
   |  |  unpack: false
   |  2 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Expression\ClosureNode
   |  |  |  byRef: true
   |  |  |  params: array (1)
   |  |  |  |  0 => Latte\Compiler\Nodes\Php\ParameterNode
   |  |  |  |  |  type: null
   |  |  |  |  |  var: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  |  |  name: 'x'
   |  |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  |  line: 3
   |  |  |  |  |  |  |  column: 5
   |  |  |  |  |  |  |  offset: 42
   |  |  |  |  |  default: null
   |  |  |  |  |  byRef: false
   |  |  |  |  |  variadic: false
   |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  line: 3
   |  |  |  |  |  |  column: 5
   |  |  |  |  |  |  offset: 42
   |  |  |  |  |  flags: 0
   |  |  |  uses: array (0)
   |  |  |  returnType: null
   |  |  |  expr: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  name: 'x'
   |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  line: 3
   |  |  |  |  |  column: 12
   |  |  |  |  |  offset: 49
   |  |  |  position: Latte\Compiler\Position
   |  |  |  |  line: 3
   |  |  |  |  column: 1
   |  |  |  |  offset: 38
   |  |  key: null
   |  |  byRef: false
   |  |  position: Latte\Compiler\Position
   |  |  |  line: 3
   |  |  |  column: 1
   |  |  |  offset: 38
   |  |  unpack: false
   |  3 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Expression\ClosureNode
   |  |  |  byRef: false
   |  |  |  params: array (2)
   |  |  |  |  0 => Latte\Compiler\Nodes\Php\ParameterNode
   |  |  |  |  |  type: null
   |  |  |  |  |  var: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  |  |  name: 'x'
   |  |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  |  line: 4
   |  |  |  |  |  |  |  column: 4
   |  |  |  |  |  |  |  offset: 56
   |  |  |  |  |  default: null
   |  |  |  |  |  byRef: false
   |  |  |  |  |  variadic: false
   |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  line: 4
   |  |  |  |  |  |  column: 4
   |  |  |  |  |  |  offset: 56
   |  |  |  |  |  flags: 0
   |  |  |  |  1 => Latte\Compiler\Nodes\Php\ParameterNode
   |  |  |  |  |  type: null
   |  |  |  |  |  var: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  |  |  name: 'rest'
   |  |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  |  line: 4
   |  |  |  |  |  |  |  column: 11
   |  |  |  |  |  |  |  offset: 63
   |  |  |  |  |  default: null
   |  |  |  |  |  byRef: false
   |  |  |  |  |  variadic: true
   |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  line: 4
   |  |  |  |  |  |  column: 8
   |  |  |  |  |  |  offset: 60
   |  |  |  |  |  flags: 0
   |  |  |  uses: array (0)
   |  |  |  returnType: null
   |  |  |  expr: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  name: 'rest'
   |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  line: 4
   |  |  |  |  |  column: 21
   |  |  |  |  |  offset: 73
   |  |  |  position: Latte\Compiler\Position
   |  |  |  |  line: 4
   |  |  |  |  column: 1
   |  |  |  |  offset: 53
   |  |  key: null
   |  |  byRef: false
   |  |  position: Latte\Compiler\Position
   |  |  |  line: 4
   |  |  |  column: 1
   |  |  |  offset: 53
   |  |  unpack: false
   |  4 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Expression\ClosureNode
   |  |  |  byRef: false
   |  |  |  params: array (0)
   |  |  |  uses: array (0)
   |  |  |  returnType: Latte\Compiler\Nodes\Php\IdentifierNode
   |  |  |  |  name: 'int'
   |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  line: 5
   |  |  |  |  |  column: 7
   |  |  |  |  |  offset: 86
   |  |  |  expr: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  name: 'x'
   |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  line: 5
   |  |  |  |  |  column: 14
   |  |  |  |  |  offset: 93
   |  |  |  position: Latte\Compiler\Position
   |  |  |  |  line: 5
   |  |  |  |  column: 1
   |  |  |  |  offset: 80
   |  |  key: null
   |  |  byRef: false
   |  |  position: Latte\Compiler\Position
   |  |  |  line: 5
   |  |  |  column: 1
   |  |  |  offset: 80
   |  |  unpack: false
   |  5 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Expression\BinaryOpNode
   |  |  |  left: Latte\Compiler\Nodes\Php\Expression\ClosureNode
   |  |  |  |  byRef: false
   |  |  |  |  params: array (2)
   |  |  |  |  |  0 => Latte\Compiler\Nodes\Php\ParameterNode
   |  |  |  |  |  |  type: null
   |  |  |  |  |  |  var: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  |  |  |  name: 'a'
   |  |  |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  |  |  line: 7
   |  |  |  |  |  |  |  |  column: 4
   |  |  |  |  |  |  |  |  offset: 101
   |  |  |  |  |  |  default: null
   |  |  |  |  |  |  byRef: false
   |  |  |  |  |  |  variadic: false
   |  |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  |  line: 7
   |  |  |  |  |  |  |  column: 4
   |  |  |  |  |  |  |  offset: 101
   |  |  |  |  |  |  flags: 0
   |  |  |  |  |  1 => Latte\Compiler\Nodes\Php\ParameterNode
   |  |  |  |  |  |  type: null
   |  |  |  |  |  |  var: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  |  |  |  name: 'b'
   |  |  |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  |  |  line: 7
   |  |  |  |  |  |  |  |  column: 8
   |  |  |  |  |  |  |  |  offset: 105
   |  |  |  |  |  |  default: null
   |  |  |  |  |  |  byRef: false
   |  |  |  |  |  |  variadic: false
   |  |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  |  line: 7
   |  |  |  |  |  |  |  column: 8
   |  |  |  |  |  |  |  offset: 105
   |  |  |  |  |  |  flags: 0
   |  |  |  |  uses: array (0)
   |  |  |  |  returnType: null
   |  |  |  |  expr: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  |  name: 'a'
   |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  line: 7
   |  |  |  |  |  |  column: 15
   |  |  |  |  |  |  offset: 112
   |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  line: 7
   |  |  |  |  |  column: 1
   |  |  |  |  |  offset: 98
   |  |  |  operator: 'and'
   |  |  |  right: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  name: 'b'
   |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  line: 7
   |  |  |  |  |  column: 22
   |  |  |  |  |  offset: 119
   |  |  |  position: Latte\Compiler\Position
   |  |  |  |  line: 7
   |  |  |  |  column: 1
   |  |  |  |  offset: 98
   |  |  key: null
   |  |  byRef: false
   |  |  position: Latte\Compiler\Position
   |  |  |  line: 7
   |  |  |  column: 1
   |  |  |  offset: 98
   |  |  unpack: false
   |  6 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Expression\ClosureNode
   |  |  |  byRef: false
   |  |  |  params: array (2)
   |  |  |  |  0 => Latte\Compiler\Nodes\Php\ParameterNode
   |  |  |  |  |  type: null
   |  |  |  |  |  var: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  |  |  name: 'a'
   |  |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  |  line: 8
   |  |  |  |  |  |  |  column: 4
   |  |  |  |  |  |  |  offset: 126
   |  |  |  |  |  default: null
   |  |  |  |  |  byRef: false
   |  |  |  |  |  variadic: false
   |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  line: 8
   |  |  |  |  |  |  column: 4
   |  |  |  |  |  |  offset: 126
   |  |  |  |  |  flags: 0
   |  |  |  |  1 => Latte\Compiler\Nodes\Php\ParameterNode
   |  |  |  |  |  type: null
   |  |  |  |  |  var: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  |  |  name: 'b'
   |  |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  |  line: 8
   |  |  |  |  |  |  |  column: 8
   |  |  |  |  |  |  |  offset: 130
   |  |  |  |  |  default: null
   |  |  |  |  |  byRef: false
   |  |  |  |  |  variadic: false
   |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  line: 8
   |  |  |  |  |  |  column: 8
   |  |  |  |  |  |  offset: 130
   |  |  |  |  |  flags: 0
   |  |  |  uses: array (0)
   |  |  |  returnType: null
   |  |  |  expr: Latte\Compiler\Nodes\Php\Expression\BinaryOpNode
   |  |  |  |  left: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  |  name: 'a'
   |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  line: 8
   |  |  |  |  |  |  column: 15
   |  |  |  |  |  |  offset: 137
   |  |  |  |  operator: '&&'
   |  |  |  |  right: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  |  name: 'b'
   |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  line: 8
   |  |  |  |  |  |  column: 21
   |  |  |  |  |  |  offset: 143
   |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  line: 8
   |  |  |  |  |  column: 15
   |  |  |  |  |  offset: 137
   |  |  |  position: Latte\Compiler\Position
   |  |  |  |  line: 8
   |  |  |  |  column: 1
   |  |  |  |  offset: 123
   |  |  key: null
   |  |  byRef: false
   |  |  position: Latte\Compiler\Position
   |  |  |  line: 8
   |  |  |  column: 1
   |  |  |  offset: 123
   |  |  unpack: false
   position: null
