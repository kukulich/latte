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
   |  |  |  |  startLine: 1
   |  |  |  |  endLine: null
   |  |  |  arms: array (2)
   |  |  |  |  0 => Latte\Compiler\Nodes\Php\MatchArmNode
   |  |  |  |  |  conds: array (1)
   |  |  |  |  |  |  0 => Latte\Compiler\Nodes\Php\Scalar\IntegerNode
   |  |  |  |  |  |  |  value: 0
   |  |  |  |  |  |  |  kind: 10
   |  |  |  |  |  |  |  startLine: 2
   |  |  |  |  |  |  |  endLine: null
   |  |  |  |  |  body: Latte\Compiler\Nodes\Php\Scalar\StringNode
   |  |  |  |  |  |  value: 'Foo'
   |  |  |  |  |  |  startLine: 2
   |  |  |  |  |  |  endLine: null
   |  |  |  |  |  startLine: 2
   |  |  |  |  |  endLine: null
   |  |  |  |  1 => Latte\Compiler\Nodes\Php\MatchArmNode
   |  |  |  |  |  conds: array (1)
   |  |  |  |  |  |  0 => Latte\Compiler\Nodes\Php\Scalar\IntegerNode
   |  |  |  |  |  |  |  value: 1
   |  |  |  |  |  |  |  kind: 10
   |  |  |  |  |  |  |  startLine: 3
   |  |  |  |  |  |  |  endLine: null
   |  |  |  |  |  body: Latte\Compiler\Nodes\Php\Scalar\StringNode
   |  |  |  |  |  |  value: 'Bar'
   |  |  |  |  |  |  startLine: 3
   |  |  |  |  |  |  endLine: null
   |  |  |  |  |  startLine: 3
   |  |  |  |  |  endLine: null
   |  |  |  startLine: 1
   |  |  |  endLine: null
   |  |  key: null
   |  |  byRef: false
   |  |  startLine: 1
   |  |  unpack: false
   |  |  endLine: null
   |  1 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Expression\MatchNode
   |  |  |  cond: Latte\Compiler\Nodes\Php\Scalar\IntegerNode
   |  |  |  |  value: 1
   |  |  |  |  kind: 10
   |  |  |  |  startLine: 6
   |  |  |  |  endLine: null
   |  |  |  arms: array (1)
   |  |  |  |  0 => Latte\Compiler\Nodes\Php\MatchArmNode
   |  |  |  |  |  conds: array (2)
   |  |  |  |  |  |  0 => Latte\Compiler\Nodes\Php\Scalar\IntegerNode
   |  |  |  |  |  |  |  value: 0
   |  |  |  |  |  |  |  kind: 10
   |  |  |  |  |  |  |  startLine: 8
   |  |  |  |  |  |  |  endLine: null
   |  |  |  |  |  |  1 => Latte\Compiler\Nodes\Php\Scalar\IntegerNode
   |  |  |  |  |  |  |  value: 1
   |  |  |  |  |  |  |  kind: 10
   |  |  |  |  |  |  |  startLine: 8
   |  |  |  |  |  |  |  endLine: null
   |  |  |  |  |  body: Latte\Compiler\Nodes\Php\Scalar\StringNode
   |  |  |  |  |  |  value: 'Foo'
   |  |  |  |  |  |  startLine: 8
   |  |  |  |  |  |  endLine: null
   |  |  |  |  |  startLine: 8
   |  |  |  |  |  endLine: null
   |  |  |  startLine: 6
   |  |  |  endLine: null
   |  |  key: null
   |  |  byRef: false
   |  |  startLine: 6
   |  |  unpack: false
   |  |  endLine: null
   |  2 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Expression\MatchNode
   |  |  |  cond: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  name: 'operator'
   |  |  |  |  startLine: 11
   |  |  |  |  endLine: null
   |  |  |  arms: array (1)
   |  |  |  |  0 => Latte\Compiler\Nodes\Php\MatchArmNode
   |  |  |  |  |  conds: array (1)
   |  |  |  |  |  |  0 => Latte\Compiler\Nodes\Php\Expression\ClassConstantFetchNode
   |  |  |  |  |  |  |  class: Latte\Compiler\Nodes\Php\NameNode
   |  |  |  |  |  |  |  |  parts: array (1)
   |  |  |  |  |  |  |  |  |  0 => 'BinaryOperator'
   |  |  |  |  |  |  |  |  startLine: 12
   |  |  |  |  |  |  |  |  endLine: null
   |  |  |  |  |  |  |  name: Latte\Compiler\Nodes\Php\IdentifierNode
   |  |  |  |  |  |  |  |  name: 'ADD'
   |  |  |  |  |  |  |  |  startLine: 12
   |  |  |  |  |  |  |  |  endLine: null
   |  |  |  |  |  |  |  startLine: 12
   |  |  |  |  |  |  |  endLine: null
   |  |  |  |  |  body: Latte\Compiler\Nodes\Php\Expression\BinaryOpNode
   |  |  |  |  |  |  left: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  |  |  |  name: 'lhs'
   |  |  |  |  |  |  |  startLine: 12
   |  |  |  |  |  |  |  endLine: null
   |  |  |  |  |  |  operator: '+'
   |  |  |  |  |  |  right: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  |  |  |  name: 'rhs'
   |  |  |  |  |  |  |  startLine: 12
   |  |  |  |  |  |  |  endLine: null
   |  |  |  |  |  |  startLine: 12
   |  |  |  |  |  |  endLine: null
   |  |  |  |  |  startLine: 12
   |  |  |  |  |  endLine: null
   |  |  |  startLine: 11
   |  |  |  endLine: null
   |  |  key: null
   |  |  byRef: false
   |  |  startLine: 11
   |  |  unpack: false
   |  |  endLine: null
   |  3 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Expression\MatchNode
   |  |  |  cond: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  name: 'char'
   |  |  |  |  startLine: 15
   |  |  |  |  endLine: null
   |  |  |  arms: array (2)
   |  |  |  |  0 => Latte\Compiler\Nodes\Php\MatchArmNode
   |  |  |  |  |  conds: array (1)
   |  |  |  |  |  |  0 => Latte\Compiler\Nodes\Php\Scalar\IntegerNode
   |  |  |  |  |  |  |  value: 1
   |  |  |  |  |  |  |  kind: 10
   |  |  |  |  |  |  |  startLine: 16
   |  |  |  |  |  |  |  endLine: null
   |  |  |  |  |  body: Latte\Compiler\Nodes\Php\Scalar\StringNode
   |  |  |  |  |  |  value: '1'
   |  |  |  |  |  |  startLine: 16
   |  |  |  |  |  |  endLine: null
   |  |  |  |  |  startLine: 16
   |  |  |  |  |  endLine: null
   |  |  |  |  1 => Latte\Compiler\Nodes\Php\MatchArmNode
   |  |  |  |  |  conds: null
   |  |  |  |  |  body: Latte\Compiler\Nodes\Php\Scalar\StringNode
   |  |  |  |  |  |  value: 'default'
   |  |  |  |  |  |  startLine: 17
   |  |  |  |  |  |  endLine: null
   |  |  |  |  |  startLine: 17
   |  |  |  |  |  endLine: null
   |  |  |  startLine: 15
   |  |  |  endLine: null
   |  |  key: null
   |  |  byRef: false
   |  |  startLine: 15
   |  |  unpack: false
   |  |  endLine: null
   |  4 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Expression\MatchNode
   |  |  |  cond: Latte\Compiler\Nodes\Php\Scalar\IntegerNode
   |  |  |  |  value: 1
   |  |  |  |  kind: 10
   |  |  |  |  startLine: 20
   |  |  |  |  endLine: null
   |  |  |  arms: array (2)
   |  |  |  |  0 => Latte\Compiler\Nodes\Php\MatchArmNode
   |  |  |  |  |  conds: array (2)
   |  |  |  |  |  |  0 => Latte\Compiler\Nodes\Php\Scalar\IntegerNode
   |  |  |  |  |  |  |  value: 0
   |  |  |  |  |  |  |  kind: 10
   |  |  |  |  |  |  |  startLine: 21
   |  |  |  |  |  |  |  endLine: null
   |  |  |  |  |  |  1 => Latte\Compiler\Nodes\Php\Scalar\IntegerNode
   |  |  |  |  |  |  |  value: 1
   |  |  |  |  |  |  |  kind: 10
   |  |  |  |  |  |  |  startLine: 21
   |  |  |  |  |  |  |  endLine: null
   |  |  |  |  |  body: Latte\Compiler\Nodes\Php\Scalar\StringNode
   |  |  |  |  |  |  value: 'Foo'
   |  |  |  |  |  |  startLine: 21
   |  |  |  |  |  |  endLine: null
   |  |  |  |  |  startLine: 21
   |  |  |  |  |  endLine: null
   |  |  |  |  1 => Latte\Compiler\Nodes\Php\MatchArmNode
   |  |  |  |  |  conds: null
   |  |  |  |  |  body: Latte\Compiler\Nodes\Php\Scalar\StringNode
   |  |  |  |  |  |  value: 'Bar'
   |  |  |  |  |  |  startLine: 22
   |  |  |  |  |  |  endLine: null
   |  |  |  |  |  startLine: 22
   |  |  |  |  |  endLine: null
   |  |  |  startLine: 20
   |  |  |  endLine: null
   |  |  key: null
   |  |  byRef: false
   |  |  startLine: 20
   |  |  unpack: false
   |  |  endLine: null
   startLine: null
   endLine: null
