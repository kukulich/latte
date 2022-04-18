<?php

// Expressions in list()

declare(strict_types=1);

use Tester\Assert;

require __DIR__ . '/../bootstrap.php';

$test = <<<'XX'
	/* This is legal. */
	list(($a), ((($b)))) = $x,
	/* This is illegal, but not a syntax error. */
	list(1 + 1) = $x,
	XX;

$node = parseCode($test);

Assert::same(
	loadContent(__FILE__, __COMPILER_HALT_OFFSET__),
	exportNode($node),
);

__halt_compiler();
Latte\Compiler\Nodes\Php\Expression\ArrayNode
   items: array (2)
   |  0 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Expression\AssignNode
   |  |  |  var: Latte\Compiler\Nodes\Php\Expression\ListNode
   |  |  |  |  items: array (2)
   |  |  |  |  |  0 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  |  |  |  |  value: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  |  |  |  name: 'a'
   |  |  |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  |  |  line: 2
   |  |  |  |  |  |  |  |  column: 7
   |  |  |  |  |  |  |  |  offset: 27
   |  |  |  |  |  |  key: null
   |  |  |  |  |  |  byRef: false
   |  |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  |  line: 2
   |  |  |  |  |  |  |  column: 6
   |  |  |  |  |  |  |  offset: 26
   |  |  |  |  |  |  unpack: false
   |  |  |  |  |  1 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  |  |  |  |  value: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  |  |  |  name: 'b'
   |  |  |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  |  |  line: 2
   |  |  |  |  |  |  |  |  column: 15
   |  |  |  |  |  |  |  |  offset: 35
   |  |  |  |  |  |  key: null
   |  |  |  |  |  |  byRef: false
   |  |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  |  line: 2
   |  |  |  |  |  |  |  column: 12
   |  |  |  |  |  |  |  offset: 32
   |  |  |  |  |  |  unpack: false
   |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  line: 2
   |  |  |  |  |  column: 1
   |  |  |  |  |  offset: 21
   |  |  |  expr: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  name: 'x'
   |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  line: 2
   |  |  |  |  |  column: 24
   |  |  |  |  |  offset: 44
   |  |  |  byRef: false
   |  |  |  position: Latte\Compiler\Position
   |  |  |  |  line: 2
   |  |  |  |  column: 1
   |  |  |  |  offset: 21
   |  |  key: null
   |  |  byRef: false
   |  |  position: Latte\Compiler\Position
   |  |  |  line: 2
   |  |  |  column: 1
   |  |  |  offset: 21
   |  |  unpack: false
   |  1 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Expression\AssignNode
   |  |  |  var: Latte\Compiler\Nodes\Php\Expression\ListNode
   |  |  |  |  items: array (1)
   |  |  |  |  |  0 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  |  |  |  |  value: Latte\Compiler\Nodes\Php\Expression\BinaryOpNode
   |  |  |  |  |  |  |  left: Latte\Compiler\Nodes\Php\Scalar\IntegerNode
   |  |  |  |  |  |  |  |  value: 1
   |  |  |  |  |  |  |  |  kind: 10
   |  |  |  |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  |  |  |  line: 4
   |  |  |  |  |  |  |  |  |  column: 6
   |  |  |  |  |  |  |  |  |  offset: 100
   |  |  |  |  |  |  |  operator: '+'
   |  |  |  |  |  |  |  right: Latte\Compiler\Nodes\Php\Scalar\IntegerNode
   |  |  |  |  |  |  |  |  value: 1
   |  |  |  |  |  |  |  |  kind: 10
   |  |  |  |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  |  |  |  line: 4
   |  |  |  |  |  |  |  |  |  column: 10
   |  |  |  |  |  |  |  |  |  offset: 104
   |  |  |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  |  |  line: 4
   |  |  |  |  |  |  |  |  column: 6
   |  |  |  |  |  |  |  |  offset: 100
   |  |  |  |  |  |  key: null
   |  |  |  |  |  |  byRef: false
   |  |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  |  line: 4
   |  |  |  |  |  |  |  column: 6
   |  |  |  |  |  |  |  offset: 100
   |  |  |  |  |  |  unpack: false
   |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  line: 4
   |  |  |  |  |  column: 1
   |  |  |  |  |  offset: 95
   |  |  |  expr: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  name: 'x'
   |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  line: 4
   |  |  |  |  |  column: 15
   |  |  |  |  |  offset: 109
   |  |  |  byRef: false
   |  |  |  position: Latte\Compiler\Position
   |  |  |  |  line: 4
   |  |  |  |  column: 1
   |  |  |  |  offset: 95
   |  |  key: null
   |  |  byRef: false
   |  |  position: Latte\Compiler\Position
   |  |  |  line: 4
   |  |  |  column: 1
   |  |  |  offset: 95
   |  |  unpack: false
   position: null
