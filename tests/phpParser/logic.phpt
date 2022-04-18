<?php

// Logical operators

declare(strict_types=1);

use Tester\Assert;

require __DIR__ . '/../bootstrap.php';

$test = <<<'XX'
	/* boolean ops */
	$a && $b,
	$a || $b,
	!$a,
	!!$a,

	/* logical ops */
	$a and $b,
	$a or $b,
	$a xor $b,

	/* precedence */
	$a && $b || $c && $d,
	$a && ($b || $c) && $d,

	$a = $b || $c,
	$a = $b or $c,
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
   |  |  value: Latte\Compiler\Nodes\Php\Expression\BinaryOpNode
   |  |  |  left: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  name: 'a'
   |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  line: 2
   |  |  |  |  |  column: 1
   |  |  |  |  |  offset: 18
   |  |  |  operator: '&&'
   |  |  |  right: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  name: 'b'
   |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  line: 2
   |  |  |  |  |  column: 7
   |  |  |  |  |  offset: 24
   |  |  |  position: Latte\Compiler\Position
   |  |  |  |  line: 2
   |  |  |  |  column: 1
   |  |  |  |  offset: 18
   |  |  key: null
   |  |  byRef: false
   |  |  position: Latte\Compiler\Position
   |  |  |  line: 2
   |  |  |  column: 1
   |  |  |  offset: 18
   |  |  unpack: false
   |  1 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Expression\BinaryOpNode
   |  |  |  left: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  name: 'a'
   |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  line: 3
   |  |  |  |  |  column: 1
   |  |  |  |  |  offset: 28
   |  |  |  operator: '||'
   |  |  |  right: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  name: 'b'
   |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  line: 3
   |  |  |  |  |  column: 7
   |  |  |  |  |  offset: 34
   |  |  |  position: Latte\Compiler\Position
   |  |  |  |  line: 3
   |  |  |  |  column: 1
   |  |  |  |  offset: 28
   |  |  key: null
   |  |  byRef: false
   |  |  position: Latte\Compiler\Position
   |  |  |  line: 3
   |  |  |  column: 1
   |  |  |  offset: 28
   |  |  unpack: false
   |  2 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Expression\NotNode
   |  |  |  expr: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  name: 'a'
   |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  line: 4
   |  |  |  |  |  column: 2
   |  |  |  |  |  offset: 39
   |  |  |  position: Latte\Compiler\Position
   |  |  |  |  line: 4
   |  |  |  |  column: 1
   |  |  |  |  offset: 38
   |  |  key: null
   |  |  byRef: false
   |  |  position: Latte\Compiler\Position
   |  |  |  line: 4
   |  |  |  column: 1
   |  |  |  offset: 38
   |  |  unpack: false
   |  3 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Expression\NotNode
   |  |  |  expr: Latte\Compiler\Nodes\Php\Expression\NotNode
   |  |  |  |  expr: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  |  name: 'a'
   |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  line: 5
   |  |  |  |  |  |  column: 3
   |  |  |  |  |  |  offset: 45
   |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  line: 5
   |  |  |  |  |  column: 2
   |  |  |  |  |  offset: 44
   |  |  |  position: Latte\Compiler\Position
   |  |  |  |  line: 5
   |  |  |  |  column: 1
   |  |  |  |  offset: 43
   |  |  key: null
   |  |  byRef: false
   |  |  position: Latte\Compiler\Position
   |  |  |  line: 5
   |  |  |  column: 1
   |  |  |  offset: 43
   |  |  unpack: false
   |  4 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Expression\BinaryOpNode
   |  |  |  left: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  name: 'a'
   |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  line: 8
   |  |  |  |  |  column: 1
   |  |  |  |  |  offset: 68
   |  |  |  operator: 'and'
   |  |  |  right: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  name: 'b'
   |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  line: 8
   |  |  |  |  |  column: 8
   |  |  |  |  |  offset: 75
   |  |  |  position: Latte\Compiler\Position
   |  |  |  |  line: 8
   |  |  |  |  column: 1
   |  |  |  |  offset: 68
   |  |  key: null
   |  |  byRef: false
   |  |  position: Latte\Compiler\Position
   |  |  |  line: 8
   |  |  |  column: 1
   |  |  |  offset: 68
   |  |  unpack: false
   |  5 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Expression\BinaryOpNode
   |  |  |  left: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  name: 'a'
   |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  line: 9
   |  |  |  |  |  column: 1
   |  |  |  |  |  offset: 79
   |  |  |  operator: 'or'
   |  |  |  right: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  name: 'b'
   |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  line: 9
   |  |  |  |  |  column: 7
   |  |  |  |  |  offset: 85
   |  |  |  position: Latte\Compiler\Position
   |  |  |  |  line: 9
   |  |  |  |  column: 1
   |  |  |  |  offset: 79
   |  |  key: null
   |  |  byRef: false
   |  |  position: Latte\Compiler\Position
   |  |  |  line: 9
   |  |  |  column: 1
   |  |  |  offset: 79
   |  |  unpack: false
   |  6 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Expression\BinaryOpNode
   |  |  |  left: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  name: 'a'
   |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  line: 10
   |  |  |  |  |  column: 1
   |  |  |  |  |  offset: 89
   |  |  |  operator: 'xor'
   |  |  |  right: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  name: 'b'
   |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  line: 10
   |  |  |  |  |  column: 8
   |  |  |  |  |  offset: 96
   |  |  |  position: Latte\Compiler\Position
   |  |  |  |  line: 10
   |  |  |  |  column: 1
   |  |  |  |  offset: 89
   |  |  key: null
   |  |  byRef: false
   |  |  position: Latte\Compiler\Position
   |  |  |  line: 10
   |  |  |  column: 1
   |  |  |  offset: 89
   |  |  unpack: false
   |  7 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Expression\BinaryOpNode
   |  |  |  left: Latte\Compiler\Nodes\Php\Expression\BinaryOpNode
   |  |  |  |  left: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  |  name: 'a'
   |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  line: 13
   |  |  |  |  |  |  column: 1
   |  |  |  |  |  |  offset: 118
   |  |  |  |  operator: '&&'
   |  |  |  |  right: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  |  name: 'b'
   |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  line: 13
   |  |  |  |  |  |  column: 7
   |  |  |  |  |  |  offset: 124
   |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  line: 13
   |  |  |  |  |  column: 1
   |  |  |  |  |  offset: 118
   |  |  |  operator: '||'
   |  |  |  right: Latte\Compiler\Nodes\Php\Expression\BinaryOpNode
   |  |  |  |  left: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  |  name: 'c'
   |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  line: 13
   |  |  |  |  |  |  column: 13
   |  |  |  |  |  |  offset: 130
   |  |  |  |  operator: '&&'
   |  |  |  |  right: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  |  name: 'd'
   |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  line: 13
   |  |  |  |  |  |  column: 19
   |  |  |  |  |  |  offset: 136
   |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  line: 13
   |  |  |  |  |  column: 13
   |  |  |  |  |  offset: 130
   |  |  |  position: Latte\Compiler\Position
   |  |  |  |  line: 13
   |  |  |  |  column: 1
   |  |  |  |  offset: 118
   |  |  key: null
   |  |  byRef: false
   |  |  position: Latte\Compiler\Position
   |  |  |  line: 13
   |  |  |  column: 1
   |  |  |  offset: 118
   |  |  unpack: false
   |  8 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Expression\BinaryOpNode
   |  |  |  left: Latte\Compiler\Nodes\Php\Expression\BinaryOpNode
   |  |  |  |  left: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  |  name: 'a'
   |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  line: 14
   |  |  |  |  |  |  column: 1
   |  |  |  |  |  |  offset: 140
   |  |  |  |  operator: '&&'
   |  |  |  |  right: Latte\Compiler\Nodes\Php\Expression\BinaryOpNode
   |  |  |  |  |  left: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  |  |  name: 'b'
   |  |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  |  line: 14
   |  |  |  |  |  |  |  column: 8
   |  |  |  |  |  |  |  offset: 147
   |  |  |  |  |  operator: '||'
   |  |  |  |  |  right: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  |  |  name: 'c'
   |  |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  |  line: 14
   |  |  |  |  |  |  |  column: 14
   |  |  |  |  |  |  |  offset: 153
   |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  line: 14
   |  |  |  |  |  |  column: 8
   |  |  |  |  |  |  offset: 147
   |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  line: 14
   |  |  |  |  |  column: 1
   |  |  |  |  |  offset: 140
   |  |  |  operator: '&&'
   |  |  |  right: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  name: 'd'
   |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  line: 14
   |  |  |  |  |  column: 21
   |  |  |  |  |  offset: 160
   |  |  |  position: Latte\Compiler\Position
   |  |  |  |  line: 14
   |  |  |  |  column: 1
   |  |  |  |  offset: 140
   |  |  key: null
   |  |  byRef: false
   |  |  position: Latte\Compiler\Position
   |  |  |  line: 14
   |  |  |  column: 1
   |  |  |  offset: 140
   |  |  unpack: false
   |  9 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Expression\AssignNode
   |  |  |  var: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  name: 'a'
   |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  line: 16
   |  |  |  |  |  column: 1
   |  |  |  |  |  offset: 165
   |  |  |  expr: Latte\Compiler\Nodes\Php\Expression\BinaryOpNode
   |  |  |  |  left: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  |  name: 'b'
   |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  line: 16
   |  |  |  |  |  |  column: 6
   |  |  |  |  |  |  offset: 170
   |  |  |  |  operator: '||'
   |  |  |  |  right: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  |  name: 'c'
   |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  line: 16
   |  |  |  |  |  |  column: 12
   |  |  |  |  |  |  offset: 176
   |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  line: 16
   |  |  |  |  |  column: 6
   |  |  |  |  |  offset: 170
   |  |  |  byRef: false
   |  |  |  position: Latte\Compiler\Position
   |  |  |  |  line: 16
   |  |  |  |  column: 1
   |  |  |  |  offset: 165
   |  |  key: null
   |  |  byRef: false
   |  |  position: Latte\Compiler\Position
   |  |  |  line: 16
   |  |  |  column: 1
   |  |  |  offset: 165
   |  |  unpack: false
   |  10 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Expression\BinaryOpNode
   |  |  |  left: Latte\Compiler\Nodes\Php\Expression\AssignNode
   |  |  |  |  var: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  |  name: 'a'
   |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  line: 17
   |  |  |  |  |  |  column: 1
   |  |  |  |  |  |  offset: 180
   |  |  |  |  expr: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  |  name: 'b'
   |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  line: 17
   |  |  |  |  |  |  column: 6
   |  |  |  |  |  |  offset: 185
   |  |  |  |  byRef: false
   |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  line: 17
   |  |  |  |  |  column: 1
   |  |  |  |  |  offset: 180
   |  |  |  operator: 'or'
   |  |  |  right: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  name: 'c'
   |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  line: 17
   |  |  |  |  |  column: 12
   |  |  |  |  |  offset: 191
   |  |  |  position: Latte\Compiler\Position
   |  |  |  |  line: 17
   |  |  |  |  column: 1
   |  |  |  |  offset: 180
   |  |  key: null
   |  |  byRef: false
   |  |  position: Latte\Compiler\Position
   |  |  |  line: 17
   |  |  |  column: 1
   |  |  |  offset: 180
   |  |  unpack: false
   position: null
