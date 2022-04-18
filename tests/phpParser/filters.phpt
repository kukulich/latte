<?php

// Filters

declare(strict_types=1);

use Tester\Assert;

require __DIR__ . '/../bootstrap.php';

$test = <<<'XX'
	($a|upper),
	($a . $b |upper|truncate),
	($a |truncate: 10, 20|trim),
	($a |truncate: 10, (20|round)|trim),
	($a |truncate: a: 10, b: true),
	($a |truncate( a: 10, b: true)),
	XX;

$node = parseCode($test);

Assert::same(
	loadContent(__FILE__, __COMPILER_HALT_OFFSET__),
	exportNode($node),
);

__halt_compiler();
Latte\Compiler\Nodes\Php\Expression\ArrayNode
   items: array (6)
   |  0 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Expression\FilterCallNode
   |  |  |  expr: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  name: 'a'
   |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  line: 1
   |  |  |  |  |  column: 2
   |  |  |  |  |  offset: 1
   |  |  |  filter: Latte\Compiler\Nodes\Php\FilterNode
   |  |  |  |  name: Latte\Compiler\Nodes\Php\IdentifierNode
   |  |  |  |  |  name: 'upper'
   |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  line: 1
   |  |  |  |  |  |  column: 5
   |  |  |  |  |  |  offset: 4
   |  |  |  |  args: array (0)
   |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  line: 1
   |  |  |  |  |  column: 2
   |  |  |  |  |  offset: 1
   |  |  |  position: Latte\Compiler\Position
   |  |  |  |  line: 1
   |  |  |  |  column: 2
   |  |  |  |  offset: 1
   |  |  |  args: array (0)
   |  |  key: null
   |  |  byRef: false
   |  |  position: Latte\Compiler\Position
   |  |  |  line: 1
   |  |  |  column: 1
   |  |  |  offset: 0
   |  |  unpack: false
   |  1 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Expression\FilterCallNode
   |  |  |  expr: Latte\Compiler\Nodes\Php\Expression\FilterCallNode
   |  |  |  |  expr: Latte\Compiler\Nodes\Php\Expression\BinaryOpNode
   |  |  |  |  |  left: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  |  |  name: 'a'
   |  |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  |  line: 2
   |  |  |  |  |  |  |  column: 2
   |  |  |  |  |  |  |  offset: 13
   |  |  |  |  |  operator: '.'
   |  |  |  |  |  right: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  |  |  name: 'b'
   |  |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  |  line: 2
   |  |  |  |  |  |  |  column: 7
   |  |  |  |  |  |  |  offset: 18
   |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  line: 2
   |  |  |  |  |  |  column: 2
   |  |  |  |  |  |  offset: 13
   |  |  |  |  filter: Latte\Compiler\Nodes\Php\FilterNode
   |  |  |  |  |  name: Latte\Compiler\Nodes\Php\IdentifierNode
   |  |  |  |  |  |  name: 'upper'
   |  |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  |  line: 2
   |  |  |  |  |  |  |  column: 11
   |  |  |  |  |  |  |  offset: 22
   |  |  |  |  |  args: array (0)
   |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  line: 2
   |  |  |  |  |  |  column: 2
   |  |  |  |  |  |  offset: 13
   |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  line: 2
   |  |  |  |  |  column: 2
   |  |  |  |  |  offset: 13
   |  |  |  |  args: array (0)
   |  |  |  filter: Latte\Compiler\Nodes\Php\FilterNode
   |  |  |  |  name: Latte\Compiler\Nodes\Php\IdentifierNode
   |  |  |  |  |  name: 'truncate'
   |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  line: 2
   |  |  |  |  |  |  column: 17
   |  |  |  |  |  |  offset: 28
   |  |  |  |  args: array (0)
   |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  line: 2
   |  |  |  |  |  column: 2
   |  |  |  |  |  offset: 13
   |  |  |  position: Latte\Compiler\Position
   |  |  |  |  line: 2
   |  |  |  |  column: 2
   |  |  |  |  offset: 13
   |  |  |  args: array (0)
   |  |  key: null
   |  |  byRef: false
   |  |  position: Latte\Compiler\Position
   |  |  |  line: 2
   |  |  |  column: 1
   |  |  |  offset: 12
   |  |  unpack: false
   |  2 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Expression\FilterCallNode
   |  |  |  expr: Latte\Compiler\Nodes\Php\Expression\FilterCallNode
   |  |  |  |  expr: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  |  name: 'a'
   |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  line: 3
   |  |  |  |  |  |  column: 2
   |  |  |  |  |  |  offset: 40
   |  |  |  |  filter: Latte\Compiler\Nodes\Php\FilterNode
   |  |  |  |  |  name: Latte\Compiler\Nodes\Php\IdentifierNode
   |  |  |  |  |  |  name: 'truncate'
   |  |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  |  line: 3
   |  |  |  |  |  |  |  column: 6
   |  |  |  |  |  |  |  offset: 44
   |  |  |  |  |  args: array (2)
   |  |  |  |  |  |  0 => Latte\Compiler\Nodes\Php\ArgumentNode
   |  |  |  |  |  |  |  value: Latte\Compiler\Nodes\Php\Scalar\IntegerNode
   |  |  |  |  |  |  |  |  value: 10
   |  |  |  |  |  |  |  |  kind: 10
   |  |  |  |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  |  |  |  line: 3
   |  |  |  |  |  |  |  |  |  column: 16
   |  |  |  |  |  |  |  |  |  offset: 54
   |  |  |  |  |  |  |  byRef: false
   |  |  |  |  |  |  |  unpack: false
   |  |  |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  |  |  line: 3
   |  |  |  |  |  |  |  |  column: 16
   |  |  |  |  |  |  |  |  offset: 54
   |  |  |  |  |  |  |  name: null
   |  |  |  |  |  |  1 => Latte\Compiler\Nodes\Php\ArgumentNode
   |  |  |  |  |  |  |  value: Latte\Compiler\Nodes\Php\Scalar\IntegerNode
   |  |  |  |  |  |  |  |  value: 20
   |  |  |  |  |  |  |  |  kind: 10
   |  |  |  |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  |  |  |  line: 3
   |  |  |  |  |  |  |  |  |  column: 20
   |  |  |  |  |  |  |  |  |  offset: 58
   |  |  |  |  |  |  |  byRef: false
   |  |  |  |  |  |  |  unpack: false
   |  |  |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  |  |  line: 3
   |  |  |  |  |  |  |  |  column: 20
   |  |  |  |  |  |  |  |  offset: 58
   |  |  |  |  |  |  |  name: null
   |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  line: 3
   |  |  |  |  |  |  column: 2
   |  |  |  |  |  |  offset: 40
   |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  line: 3
   |  |  |  |  |  column: 2
   |  |  |  |  |  offset: 40
   |  |  |  |  args: array (0)
   |  |  |  filter: Latte\Compiler\Nodes\Php\FilterNode
   |  |  |  |  name: Latte\Compiler\Nodes\Php\IdentifierNode
   |  |  |  |  |  name: 'trim'
   |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  line: 3
   |  |  |  |  |  |  column: 23
   |  |  |  |  |  |  offset: 61
   |  |  |  |  args: array (0)
   |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  line: 3
   |  |  |  |  |  column: 2
   |  |  |  |  |  offset: 40
   |  |  |  position: Latte\Compiler\Position
   |  |  |  |  line: 3
   |  |  |  |  column: 2
   |  |  |  |  offset: 40
   |  |  |  args: array (0)
   |  |  key: null
   |  |  byRef: false
   |  |  position: Latte\Compiler\Position
   |  |  |  line: 3
   |  |  |  column: 1
   |  |  |  offset: 39
   |  |  unpack: false
   |  3 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Expression\FilterCallNode
   |  |  |  expr: Latte\Compiler\Nodes\Php\Expression\FilterCallNode
   |  |  |  |  expr: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  |  name: 'a'
   |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  line: 4
   |  |  |  |  |  |  column: 2
   |  |  |  |  |  |  offset: 69
   |  |  |  |  filter: Latte\Compiler\Nodes\Php\FilterNode
   |  |  |  |  |  name: Latte\Compiler\Nodes\Php\IdentifierNode
   |  |  |  |  |  |  name: 'truncate'
   |  |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  |  line: 4
   |  |  |  |  |  |  |  column: 6
   |  |  |  |  |  |  |  offset: 73
   |  |  |  |  |  args: array (2)
   |  |  |  |  |  |  0 => Latte\Compiler\Nodes\Php\ArgumentNode
   |  |  |  |  |  |  |  value: Latte\Compiler\Nodes\Php\Scalar\IntegerNode
   |  |  |  |  |  |  |  |  value: 10
   |  |  |  |  |  |  |  |  kind: 10
   |  |  |  |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  |  |  |  line: 4
   |  |  |  |  |  |  |  |  |  column: 16
   |  |  |  |  |  |  |  |  |  offset: 83
   |  |  |  |  |  |  |  byRef: false
   |  |  |  |  |  |  |  unpack: false
   |  |  |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  |  |  line: 4
   |  |  |  |  |  |  |  |  column: 16
   |  |  |  |  |  |  |  |  offset: 83
   |  |  |  |  |  |  |  name: null
   |  |  |  |  |  |  1 => Latte\Compiler\Nodes\Php\ArgumentNode
   |  |  |  |  |  |  |  value: Latte\Compiler\Nodes\Php\Expression\FilterCallNode
   |  |  |  |  |  |  |  |  expr: Latte\Compiler\Nodes\Php\Scalar\IntegerNode
   |  |  |  |  |  |  |  |  |  value: 20
   |  |  |  |  |  |  |  |  |  kind: 10
   |  |  |  |  |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  |  |  |  |  line: 4
   |  |  |  |  |  |  |  |  |  |  column: 21
   |  |  |  |  |  |  |  |  |  |  offset: 88
   |  |  |  |  |  |  |  |  filter: Latte\Compiler\Nodes\Php\FilterNode
   |  |  |  |  |  |  |  |  |  name: Latte\Compiler\Nodes\Php\IdentifierNode
   |  |  |  |  |  |  |  |  |  |  name: 'round'
   |  |  |  |  |  |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  |  |  |  |  |  line: 4
   |  |  |  |  |  |  |  |  |  |  |  column: 24
   |  |  |  |  |  |  |  |  |  |  |  offset: 91
   |  |  |  |  |  |  |  |  |  args: array (0)
   |  |  |  |  |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  |  |  |  |  line: 4
   |  |  |  |  |  |  |  |  |  |  column: 21
   |  |  |  |  |  |  |  |  |  |  offset: 88
   |  |  |  |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  |  |  |  line: 4
   |  |  |  |  |  |  |  |  |  column: 21
   |  |  |  |  |  |  |  |  |  offset: 88
   |  |  |  |  |  |  |  |  args: array (0)
   |  |  |  |  |  |  |  byRef: false
   |  |  |  |  |  |  |  unpack: false
   |  |  |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  |  |  line: 4
   |  |  |  |  |  |  |  |  column: 20
   |  |  |  |  |  |  |  |  offset: 87
   |  |  |  |  |  |  |  name: null
   |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  line: 4
   |  |  |  |  |  |  column: 2
   |  |  |  |  |  |  offset: 69
   |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  line: 4
   |  |  |  |  |  column: 2
   |  |  |  |  |  offset: 69
   |  |  |  |  args: array (0)
   |  |  |  filter: Latte\Compiler\Nodes\Php\FilterNode
   |  |  |  |  name: Latte\Compiler\Nodes\Php\IdentifierNode
   |  |  |  |  |  name: 'trim'
   |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  line: 4
   |  |  |  |  |  |  column: 31
   |  |  |  |  |  |  offset: 98
   |  |  |  |  args: array (0)
   |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  line: 4
   |  |  |  |  |  column: 2
   |  |  |  |  |  offset: 69
   |  |  |  position: Latte\Compiler\Position
   |  |  |  |  line: 4
   |  |  |  |  column: 2
   |  |  |  |  offset: 69
   |  |  |  args: array (0)
   |  |  key: null
   |  |  byRef: false
   |  |  position: Latte\Compiler\Position
   |  |  |  line: 4
   |  |  |  column: 1
   |  |  |  offset: 68
   |  |  unpack: false
   |  4 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Expression\FilterCallNode
   |  |  |  expr: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  name: 'a'
   |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  line: 5
   |  |  |  |  |  column: 2
   |  |  |  |  |  offset: 106
   |  |  |  filter: Latte\Compiler\Nodes\Php\FilterNode
   |  |  |  |  name: Latte\Compiler\Nodes\Php\IdentifierNode
   |  |  |  |  |  name: 'truncate'
   |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  line: 5
   |  |  |  |  |  |  column: 6
   |  |  |  |  |  |  offset: 110
   |  |  |  |  args: array (2)
   |  |  |  |  |  0 => Latte\Compiler\Nodes\Php\ArgumentNode
   |  |  |  |  |  |  value: Latte\Compiler\Nodes\Php\Scalar\IntegerNode
   |  |  |  |  |  |  |  value: 10
   |  |  |  |  |  |  |  kind: 10
   |  |  |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  |  |  line: 5
   |  |  |  |  |  |  |  |  column: 19
   |  |  |  |  |  |  |  |  offset: 123
   |  |  |  |  |  |  byRef: false
   |  |  |  |  |  |  unpack: false
   |  |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  |  line: 5
   |  |  |  |  |  |  |  column: 16
   |  |  |  |  |  |  |  offset: 120
   |  |  |  |  |  |  name: Latte\Compiler\Nodes\Php\IdentifierNode
   |  |  |  |  |  |  |  name: 'a'
   |  |  |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  |  |  line: 5
   |  |  |  |  |  |  |  |  column: 16
   |  |  |  |  |  |  |  |  offset: 120
   |  |  |  |  |  1 => Latte\Compiler\Nodes\Php\ArgumentNode
   |  |  |  |  |  |  value: Latte\Compiler\Nodes\Php\Scalar\BooleanNode
   |  |  |  |  |  |  |  value: true
   |  |  |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  |  |  line: 5
   |  |  |  |  |  |  |  |  column: 26
   |  |  |  |  |  |  |  |  offset: 130
   |  |  |  |  |  |  byRef: false
   |  |  |  |  |  |  unpack: false
   |  |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  |  line: 5
   |  |  |  |  |  |  |  column: 23
   |  |  |  |  |  |  |  offset: 127
   |  |  |  |  |  |  name: Latte\Compiler\Nodes\Php\IdentifierNode
   |  |  |  |  |  |  |  name: 'b'
   |  |  |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  |  |  line: 5
   |  |  |  |  |  |  |  |  column: 23
   |  |  |  |  |  |  |  |  offset: 127
   |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  line: 5
   |  |  |  |  |  column: 2
   |  |  |  |  |  offset: 106
   |  |  |  position: Latte\Compiler\Position
   |  |  |  |  line: 5
   |  |  |  |  column: 2
   |  |  |  |  offset: 106
   |  |  |  args: array (0)
   |  |  key: null
   |  |  byRef: false
   |  |  position: Latte\Compiler\Position
   |  |  |  line: 5
   |  |  |  column: 1
   |  |  |  offset: 105
   |  |  unpack: false
   |  5 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Expression\FilterCallNode
   |  |  |  expr: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  name: 'a'
   |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  line: 6
   |  |  |  |  |  column: 2
   |  |  |  |  |  offset: 138
   |  |  |  filter: Latte\Compiler\Nodes\Php\FilterNode
   |  |  |  |  name: Latte\Compiler\Nodes\Php\IdentifierNode
   |  |  |  |  |  name: 'truncate'
   |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  line: 6
   |  |  |  |  |  |  column: 6
   |  |  |  |  |  |  offset: 142
   |  |  |  |  args: array (2)
   |  |  |  |  |  0 => Latte\Compiler\Nodes\Php\ArgumentNode
   |  |  |  |  |  |  value: Latte\Compiler\Nodes\Php\Scalar\IntegerNode
   |  |  |  |  |  |  |  value: 10
   |  |  |  |  |  |  |  kind: 10
   |  |  |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  |  |  line: 6
   |  |  |  |  |  |  |  |  column: 19
   |  |  |  |  |  |  |  |  offset: 155
   |  |  |  |  |  |  byRef: false
   |  |  |  |  |  |  unpack: false
   |  |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  |  line: 6
   |  |  |  |  |  |  |  column: 16
   |  |  |  |  |  |  |  offset: 152
   |  |  |  |  |  |  name: Latte\Compiler\Nodes\Php\IdentifierNode
   |  |  |  |  |  |  |  name: 'a'
   |  |  |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  |  |  line: 6
   |  |  |  |  |  |  |  |  column: 16
   |  |  |  |  |  |  |  |  offset: 152
   |  |  |  |  |  1 => Latte\Compiler\Nodes\Php\ArgumentNode
   |  |  |  |  |  |  value: Latte\Compiler\Nodes\Php\Scalar\BooleanNode
   |  |  |  |  |  |  |  value: true
   |  |  |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  |  |  line: 6
   |  |  |  |  |  |  |  |  column: 26
   |  |  |  |  |  |  |  |  offset: 162
   |  |  |  |  |  |  byRef: false
   |  |  |  |  |  |  unpack: false
   |  |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  |  line: 6
   |  |  |  |  |  |  |  column: 23
   |  |  |  |  |  |  |  offset: 159
   |  |  |  |  |  |  name: Latte\Compiler\Nodes\Php\IdentifierNode
   |  |  |  |  |  |  |  name: 'b'
   |  |  |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  |  |  line: 6
   |  |  |  |  |  |  |  |  column: 23
   |  |  |  |  |  |  |  |  offset: 159
   |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  line: 6
   |  |  |  |  |  column: 2
   |  |  |  |  |  offset: 138
   |  |  |  position: Latte\Compiler\Position
   |  |  |  |  line: 6
   |  |  |  |  column: 2
   |  |  |  |  offset: 138
   |  |  |  args: array (0)
   |  |  key: null
   |  |  byRef: false
   |  |  position: Latte\Compiler\Position
   |  |  |  line: 6
   |  |  |  column: 1
   |  |  |  offset: 137
   |  |  unpack: false
   position: null
