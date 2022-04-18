<?php

// Ternary operator

declare(strict_types=1);

use Tester\Assert;

require __DIR__ . '/../bootstrap.php';

$test = <<<'XX'
	/* ternary */
	$a ? $b : $c,
	$a ?: $c,

	/* precedence */
	$a ? $b : $c ? $d : $e,
	$a ? $b : ($c ? $d : $e),

	/* null coalesce */
	$a ?? $b,
	$a ?? $b ?? $c,
	$a ?? $b ? $c : $d,
	$a && $b ?? $c,

	/* short ternary */
	$a ? $b,
	$a ? $b ? $c,
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
   |  |  value: Latte\Compiler\Nodes\Php\Expression\TernaryNode
   |  |  |  cond: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  name: 'a'
   |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  line: 2
   |  |  |  |  |  column: 1
   |  |  |  |  |  offset: 14
   |  |  |  if: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  name: 'b'
   |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  line: 2
   |  |  |  |  |  column: 6
   |  |  |  |  |  offset: 19
   |  |  |  else: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  name: 'c'
   |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  line: 2
   |  |  |  |  |  column: 11
   |  |  |  |  |  offset: 24
   |  |  |  position: Latte\Compiler\Position
   |  |  |  |  line: 2
   |  |  |  |  column: 1
   |  |  |  |  offset: 14
   |  |  key: null
   |  |  byRef: false
   |  |  position: Latte\Compiler\Position
   |  |  |  line: 2
   |  |  |  column: 1
   |  |  |  offset: 14
   |  |  unpack: false
   |  1 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Expression\TernaryNode
   |  |  |  cond: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  name: 'a'
   |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  line: 3
   |  |  |  |  |  column: 1
   |  |  |  |  |  offset: 28
   |  |  |  if: null
   |  |  |  else: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  name: 'c'
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
   |  |  value: Latte\Compiler\Nodes\Php\Expression\TernaryNode
   |  |  |  cond: Latte\Compiler\Nodes\Php\Expression\TernaryNode
   |  |  |  |  cond: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  |  name: 'a'
   |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  line: 6
   |  |  |  |  |  |  column: 1
   |  |  |  |  |  |  offset: 56
   |  |  |  |  if: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  |  name: 'b'
   |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  line: 6
   |  |  |  |  |  |  column: 6
   |  |  |  |  |  |  offset: 61
   |  |  |  |  else: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  |  name: 'c'
   |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  line: 6
   |  |  |  |  |  |  column: 11
   |  |  |  |  |  |  offset: 66
   |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  line: 6
   |  |  |  |  |  column: 1
   |  |  |  |  |  offset: 56
   |  |  |  if: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  name: 'd'
   |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  line: 6
   |  |  |  |  |  column: 16
   |  |  |  |  |  offset: 71
   |  |  |  else: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  name: 'e'
   |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  line: 6
   |  |  |  |  |  column: 21
   |  |  |  |  |  offset: 76
   |  |  |  position: Latte\Compiler\Position
   |  |  |  |  line: 6
   |  |  |  |  column: 1
   |  |  |  |  offset: 56
   |  |  key: null
   |  |  byRef: false
   |  |  position: Latte\Compiler\Position
   |  |  |  line: 6
   |  |  |  column: 1
   |  |  |  offset: 56
   |  |  unpack: false
   |  3 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Expression\TernaryNode
   |  |  |  cond: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  name: 'a'
   |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  line: 7
   |  |  |  |  |  column: 1
   |  |  |  |  |  offset: 80
   |  |  |  if: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  name: 'b'
   |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  line: 7
   |  |  |  |  |  column: 6
   |  |  |  |  |  offset: 85
   |  |  |  else: Latte\Compiler\Nodes\Php\Expression\TernaryNode
   |  |  |  |  cond: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  |  name: 'c'
   |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  line: 7
   |  |  |  |  |  |  column: 12
   |  |  |  |  |  |  offset: 91
   |  |  |  |  if: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  |  name: 'd'
   |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  line: 7
   |  |  |  |  |  |  column: 17
   |  |  |  |  |  |  offset: 96
   |  |  |  |  else: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  |  name: 'e'
   |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  line: 7
   |  |  |  |  |  |  column: 22
   |  |  |  |  |  |  offset: 101
   |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  line: 7
   |  |  |  |  |  column: 12
   |  |  |  |  |  offset: 91
   |  |  |  position: Latte\Compiler\Position
   |  |  |  |  line: 7
   |  |  |  |  column: 1
   |  |  |  |  offset: 80
   |  |  key: null
   |  |  byRef: false
   |  |  position: Latte\Compiler\Position
   |  |  |  line: 7
   |  |  |  column: 1
   |  |  |  offset: 80
   |  |  unpack: false
   |  4 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Expression\BinaryOpNode
   |  |  |  left: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  name: 'a'
   |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  line: 10
   |  |  |  |  |  column: 1
   |  |  |  |  |  offset: 127
   |  |  |  operator: '??'
   |  |  |  right: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  name: 'b'
   |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  line: 10
   |  |  |  |  |  column: 7
   |  |  |  |  |  offset: 133
   |  |  |  position: Latte\Compiler\Position
   |  |  |  |  line: 10
   |  |  |  |  column: 1
   |  |  |  |  offset: 127
   |  |  key: null
   |  |  byRef: false
   |  |  position: Latte\Compiler\Position
   |  |  |  line: 10
   |  |  |  column: 1
   |  |  |  offset: 127
   |  |  unpack: false
   |  5 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Expression\BinaryOpNode
   |  |  |  left: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  name: 'a'
   |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  line: 11
   |  |  |  |  |  column: 1
   |  |  |  |  |  offset: 137
   |  |  |  operator: '??'
   |  |  |  right: Latte\Compiler\Nodes\Php\Expression\BinaryOpNode
   |  |  |  |  left: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  |  name: 'b'
   |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  line: 11
   |  |  |  |  |  |  column: 7
   |  |  |  |  |  |  offset: 143
   |  |  |  |  operator: '??'
   |  |  |  |  right: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  |  name: 'c'
   |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  line: 11
   |  |  |  |  |  |  column: 13
   |  |  |  |  |  |  offset: 149
   |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  line: 11
   |  |  |  |  |  column: 7
   |  |  |  |  |  offset: 143
   |  |  |  position: Latte\Compiler\Position
   |  |  |  |  line: 11
   |  |  |  |  column: 1
   |  |  |  |  offset: 137
   |  |  key: null
   |  |  byRef: false
   |  |  position: Latte\Compiler\Position
   |  |  |  line: 11
   |  |  |  column: 1
   |  |  |  offset: 137
   |  |  unpack: false
   |  6 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Expression\TernaryNode
   |  |  |  cond: Latte\Compiler\Nodes\Php\Expression\BinaryOpNode
   |  |  |  |  left: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  |  name: 'a'
   |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  line: 12
   |  |  |  |  |  |  column: 1
   |  |  |  |  |  |  offset: 153
   |  |  |  |  operator: '??'
   |  |  |  |  right: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  |  name: 'b'
   |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  line: 12
   |  |  |  |  |  |  column: 7
   |  |  |  |  |  |  offset: 159
   |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  line: 12
   |  |  |  |  |  column: 1
   |  |  |  |  |  offset: 153
   |  |  |  if: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  name: 'c'
   |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  line: 12
   |  |  |  |  |  column: 12
   |  |  |  |  |  offset: 164
   |  |  |  else: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  name: 'd'
   |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  line: 12
   |  |  |  |  |  column: 17
   |  |  |  |  |  offset: 169
   |  |  |  position: Latte\Compiler\Position
   |  |  |  |  line: 12
   |  |  |  |  column: 1
   |  |  |  |  offset: 153
   |  |  key: null
   |  |  byRef: false
   |  |  position: Latte\Compiler\Position
   |  |  |  line: 12
   |  |  |  column: 1
   |  |  |  offset: 153
   |  |  unpack: false
   |  7 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Expression\BinaryOpNode
   |  |  |  left: Latte\Compiler\Nodes\Php\Expression\BinaryOpNode
   |  |  |  |  left: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  |  name: 'a'
   |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  line: 13
   |  |  |  |  |  |  column: 1
   |  |  |  |  |  |  offset: 173
   |  |  |  |  operator: '&&'
   |  |  |  |  right: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  |  name: 'b'
   |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  line: 13
   |  |  |  |  |  |  column: 7
   |  |  |  |  |  |  offset: 179
   |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  line: 13
   |  |  |  |  |  column: 1
   |  |  |  |  |  offset: 173
   |  |  |  operator: '??'
   |  |  |  right: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  name: 'c'
   |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  line: 13
   |  |  |  |  |  column: 13
   |  |  |  |  |  offset: 185
   |  |  |  position: Latte\Compiler\Position
   |  |  |  |  line: 13
   |  |  |  |  column: 1
   |  |  |  |  offset: 173
   |  |  key: null
   |  |  byRef: false
   |  |  position: Latte\Compiler\Position
   |  |  |  line: 13
   |  |  |  column: 1
   |  |  |  offset: 173
   |  |  unpack: false
   |  8 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Expression\TernaryNode
   |  |  |  cond: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  name: 'a'
   |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  line: 16
   |  |  |  |  |  column: 1
   |  |  |  |  |  offset: 210
   |  |  |  if: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  name: 'b'
   |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  line: 16
   |  |  |  |  |  column: 6
   |  |  |  |  |  offset: 215
   |  |  |  else: null
   |  |  |  position: Latte\Compiler\Position
   |  |  |  |  line: 16
   |  |  |  |  column: 1
   |  |  |  |  offset: 210
   |  |  key: null
   |  |  byRef: false
   |  |  position: Latte\Compiler\Position
   |  |  |  line: 16
   |  |  |  column: 1
   |  |  |  offset: 210
   |  |  unpack: false
   |  9 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Expression\TernaryNode
   |  |  |  cond: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  name: 'a'
   |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  line: 17
   |  |  |  |  |  column: 1
   |  |  |  |  |  offset: 219
   |  |  |  if: Latte\Compiler\Nodes\Php\Expression\TernaryNode
   |  |  |  |  cond: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  |  name: 'b'
   |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  line: 17
   |  |  |  |  |  |  column: 6
   |  |  |  |  |  |  offset: 224
   |  |  |  |  if: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  |  name: 'c'
   |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  line: 17
   |  |  |  |  |  |  column: 11
   |  |  |  |  |  |  offset: 229
   |  |  |  |  else: null
   |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  line: 17
   |  |  |  |  |  column: 6
   |  |  |  |  |  offset: 224
   |  |  |  else: null
   |  |  |  position: Latte\Compiler\Position
   |  |  |  |  line: 17
   |  |  |  |  column: 1
   |  |  |  |  offset: 219
   |  |  key: null
   |  |  byRef: false
   |  |  position: Latte\Compiler\Position
   |  |  |  line: 17
   |  |  |  column: 1
   |  |  |  offset: 219
   |  |  unpack: false
   position: null
