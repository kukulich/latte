<?php

// Match

declare(strict_types=1);

use Tester\Assert;

require __DIR__ . '/../bootstrap.php';

$test = <<<'XX'
	match (1) {
	    0 => 'Foo',
	    1 => 'Bar',
	},

	match (1) {
	    /* list of conditions */
	    0, 1 => 'Foo',
	},

	match ($operator) {
	    BinaryOperator::ADD => $lhs + $rhs,
	},

	match ($char) {
	    1 => '1',
	    default => 'default'
	},

	match (1) {
	    0, 1, => 'Foo',
	    default, => 'Bar',
	},
	XX;

$node = parseCode($test);

Assert::same(
	loadContent(__FILE__, __COMPILER_HALT_OFFSET__),
	exportNode($node),
);

__halt_compiler();
Latte\Compiler\Nodes\Php\Expression\ArrayNode
   items: array (5)
   |  0 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Expression\MatchNode
   |  |  |  cond: Latte\Compiler\Nodes\Php\Scalar\IntegerNode
   |  |  |  |  value: 1
   |  |  |  |  kind: 10
   |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  line: 1
   |  |  |  |  |  column: 8
   |  |  |  |  |  offset: 7
   |  |  |  arms: array (2)
   |  |  |  |  0 => Latte\Compiler\Nodes\Php\MatchArmNode
   |  |  |  |  |  conds: array (1)
   |  |  |  |  |  |  0 => Latte\Compiler\Nodes\Php\Scalar\IntegerNode
   |  |  |  |  |  |  |  value: 0
   |  |  |  |  |  |  |  kind: 10
   |  |  |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  |  |  line: 2
   |  |  |  |  |  |  |  |  column: 5
   |  |  |  |  |  |  |  |  offset: 16
   |  |  |  |  |  body: Latte\Compiler\Nodes\Php\Scalar\StringNode
   |  |  |  |  |  |  value: 'Foo'
   |  |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  |  line: 2
   |  |  |  |  |  |  |  column: 10
   |  |  |  |  |  |  |  offset: 21
   |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  line: 2
   |  |  |  |  |  |  column: 5
   |  |  |  |  |  |  offset: 16
   |  |  |  |  1 => Latte\Compiler\Nodes\Php\MatchArmNode
   |  |  |  |  |  conds: array (1)
   |  |  |  |  |  |  0 => Latte\Compiler\Nodes\Php\Scalar\IntegerNode
   |  |  |  |  |  |  |  value: 1
   |  |  |  |  |  |  |  kind: 10
   |  |  |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  |  |  line: 3
   |  |  |  |  |  |  |  |  column: 5
   |  |  |  |  |  |  |  |  offset: 32
   |  |  |  |  |  body: Latte\Compiler\Nodes\Php\Scalar\StringNode
   |  |  |  |  |  |  value: 'Bar'
   |  |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  |  line: 3
   |  |  |  |  |  |  |  column: 10
   |  |  |  |  |  |  |  offset: 37
   |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  line: 3
   |  |  |  |  |  |  column: 5
   |  |  |  |  |  |  offset: 32
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
   |  |  value: Latte\Compiler\Nodes\Php\Expression\MatchNode
   |  |  |  cond: Latte\Compiler\Nodes\Php\Scalar\IntegerNode
   |  |  |  |  value: 1
   |  |  |  |  kind: 10
   |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  line: 6
   |  |  |  |  |  column: 8
   |  |  |  |  |  offset: 55
   |  |  |  arms: array (1)
   |  |  |  |  0 => Latte\Compiler\Nodes\Php\MatchArmNode
   |  |  |  |  |  conds: array (2)
   |  |  |  |  |  |  0 => Latte\Compiler\Nodes\Php\Scalar\IntegerNode
   |  |  |  |  |  |  |  value: 0
   |  |  |  |  |  |  |  kind: 10
   |  |  |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  |  |  line: 8
   |  |  |  |  |  |  |  |  column: 5
   |  |  |  |  |  |  |  |  offset: 93
   |  |  |  |  |  |  1 => Latte\Compiler\Nodes\Php\Scalar\IntegerNode
   |  |  |  |  |  |  |  value: 1
   |  |  |  |  |  |  |  kind: 10
   |  |  |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  |  |  line: 8
   |  |  |  |  |  |  |  |  column: 8
   |  |  |  |  |  |  |  |  offset: 96
   |  |  |  |  |  body: Latte\Compiler\Nodes\Php\Scalar\StringNode
   |  |  |  |  |  |  value: 'Foo'
   |  |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  |  line: 8
   |  |  |  |  |  |  |  column: 13
   |  |  |  |  |  |  |  offset: 101
   |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  line: 8
   |  |  |  |  |  |  column: 5
   |  |  |  |  |  |  offset: 93
   |  |  |  position: Latte\Compiler\Position
   |  |  |  |  line: 6
   |  |  |  |  column: 1
   |  |  |  |  offset: 48
   |  |  key: null
   |  |  byRef: false
   |  |  position: Latte\Compiler\Position
   |  |  |  line: 6
   |  |  |  column: 1
   |  |  |  offset: 48
   |  |  unpack: false
   |  2 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Expression\MatchNode
   |  |  |  cond: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  name: 'operator'
   |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  line: 11
   |  |  |  |  |  column: 8
   |  |  |  |  |  offset: 119
   |  |  |  arms: array (1)
   |  |  |  |  0 => Latte\Compiler\Nodes\Php\MatchArmNode
   |  |  |  |  |  conds: array (1)
   |  |  |  |  |  |  0 => Latte\Compiler\Nodes\Php\Expression\ClassConstantFetchNode
   |  |  |  |  |  |  |  class: Latte\Compiler\Nodes\Php\NameNode
   |  |  |  |  |  |  |  |  parts: array (1)
   |  |  |  |  |  |  |  |  |  0 => 'BinaryOperator'
   |  |  |  |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  |  |  |  line: 12
   |  |  |  |  |  |  |  |  |  column: 5
   |  |  |  |  |  |  |  |  |  offset: 136
   |  |  |  |  |  |  |  name: Latte\Compiler\Nodes\Php\IdentifierNode
   |  |  |  |  |  |  |  |  name: 'ADD'
   |  |  |  |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  |  |  |  line: 12
   |  |  |  |  |  |  |  |  |  column: 21
   |  |  |  |  |  |  |  |  |  offset: 152
   |  |  |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  |  |  line: 12
   |  |  |  |  |  |  |  |  column: 5
   |  |  |  |  |  |  |  |  offset: 136
   |  |  |  |  |  body: Latte\Compiler\Nodes\Php\Expression\BinaryOpNode
   |  |  |  |  |  |  left: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  |  |  |  name: 'lhs'
   |  |  |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  |  |  line: 12
   |  |  |  |  |  |  |  |  column: 28
   |  |  |  |  |  |  |  |  offset: 159
   |  |  |  |  |  |  operator: '+'
   |  |  |  |  |  |  right: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  |  |  |  name: 'rhs'
   |  |  |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  |  |  line: 12
   |  |  |  |  |  |  |  |  column: 35
   |  |  |  |  |  |  |  |  offset: 166
   |  |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  |  line: 12
   |  |  |  |  |  |  |  column: 28
   |  |  |  |  |  |  |  offset: 159
   |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  line: 12
   |  |  |  |  |  |  column: 5
   |  |  |  |  |  |  offset: 136
   |  |  |  position: Latte\Compiler\Position
   |  |  |  |  line: 11
   |  |  |  |  column: 1
   |  |  |  |  offset: 112
   |  |  key: null
   |  |  byRef: false
   |  |  position: Latte\Compiler\Position
   |  |  |  line: 11
   |  |  |  column: 1
   |  |  |  offset: 112
   |  |  unpack: false
   |  3 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Expression\MatchNode
   |  |  |  cond: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  name: 'char'
   |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  line: 15
   |  |  |  |  |  column: 8
   |  |  |  |  |  offset: 183
   |  |  |  arms: array (2)
   |  |  |  |  0 => Latte\Compiler\Nodes\Php\MatchArmNode
   |  |  |  |  |  conds: array (1)
   |  |  |  |  |  |  0 => Latte\Compiler\Nodes\Php\Scalar\IntegerNode
   |  |  |  |  |  |  |  value: 1
   |  |  |  |  |  |  |  kind: 10
   |  |  |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  |  |  line: 16
   |  |  |  |  |  |  |  |  column: 5
   |  |  |  |  |  |  |  |  offset: 196
   |  |  |  |  |  body: Latte\Compiler\Nodes\Php\Scalar\StringNode
   |  |  |  |  |  |  value: '1'
   |  |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  |  line: 16
   |  |  |  |  |  |  |  column: 10
   |  |  |  |  |  |  |  offset: 201
   |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  line: 16
   |  |  |  |  |  |  column: 5
   |  |  |  |  |  |  offset: 196
   |  |  |  |  1 => Latte\Compiler\Nodes\Php\MatchArmNode
   |  |  |  |  |  conds: null
   |  |  |  |  |  body: Latte\Compiler\Nodes\Php\Scalar\StringNode
   |  |  |  |  |  |  value: 'default'
   |  |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  |  line: 17
   |  |  |  |  |  |  |  column: 16
   |  |  |  |  |  |  |  offset: 221
   |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  line: 17
   |  |  |  |  |  |  column: 5
   |  |  |  |  |  |  offset: 210
   |  |  |  position: Latte\Compiler\Position
   |  |  |  |  line: 15
   |  |  |  |  column: 1
   |  |  |  |  offset: 176
   |  |  key: null
   |  |  byRef: false
   |  |  position: Latte\Compiler\Position
   |  |  |  line: 15
   |  |  |  column: 1
   |  |  |  offset: 176
   |  |  unpack: false
   |  4 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Expression\MatchNode
   |  |  |  cond: Latte\Compiler\Nodes\Php\Scalar\IntegerNode
   |  |  |  |  value: 1
   |  |  |  |  kind: 10
   |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  line: 20
   |  |  |  |  |  column: 8
   |  |  |  |  |  offset: 242
   |  |  |  arms: array (2)
   |  |  |  |  0 => Latte\Compiler\Nodes\Php\MatchArmNode
   |  |  |  |  |  conds: array (2)
   |  |  |  |  |  |  0 => Latte\Compiler\Nodes\Php\Scalar\IntegerNode
   |  |  |  |  |  |  |  value: 0
   |  |  |  |  |  |  |  kind: 10
   |  |  |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  |  |  line: 21
   |  |  |  |  |  |  |  |  column: 5
   |  |  |  |  |  |  |  |  offset: 251
   |  |  |  |  |  |  1 => Latte\Compiler\Nodes\Php\Scalar\IntegerNode
   |  |  |  |  |  |  |  value: 1
   |  |  |  |  |  |  |  kind: 10
   |  |  |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  |  |  line: 21
   |  |  |  |  |  |  |  |  column: 8
   |  |  |  |  |  |  |  |  offset: 254
   |  |  |  |  |  body: Latte\Compiler\Nodes\Php\Scalar\StringNode
   |  |  |  |  |  |  value: 'Foo'
   |  |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  |  line: 21
   |  |  |  |  |  |  |  column: 14
   |  |  |  |  |  |  |  offset: 260
   |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  line: 21
   |  |  |  |  |  |  column: 5
   |  |  |  |  |  |  offset: 251
   |  |  |  |  1 => Latte\Compiler\Nodes\Php\MatchArmNode
   |  |  |  |  |  conds: null
   |  |  |  |  |  body: Latte\Compiler\Nodes\Php\Scalar\StringNode
   |  |  |  |  |  |  value: 'Bar'
   |  |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  |  line: 22
   |  |  |  |  |  |  |  column: 17
   |  |  |  |  |  |  |  offset: 283
   |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  line: 22
   |  |  |  |  |  |  column: 5
   |  |  |  |  |  |  offset: 271
   |  |  |  position: Latte\Compiler\Position
   |  |  |  |  line: 20
   |  |  |  |  column: 1
   |  |  |  |  offset: 235
   |  |  key: null
   |  |  byRef: false
   |  |  position: Latte\Compiler\Position
   |  |  |  line: 20
   |  |  |  column: 1
   |  |  |  offset: 235
   |  |  unpack: false
   position: null
