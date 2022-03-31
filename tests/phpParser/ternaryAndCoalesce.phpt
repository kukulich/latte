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
   |  |  |  |  startLine: 2
   |  |  |  |  endLine: null
   |  |  |  if: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  name: 'b'
   |  |  |  |  startLine: 2
   |  |  |  |  endLine: null
   |  |  |  else: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  name: 'c'
   |  |  |  |  startLine: 2
   |  |  |  |  endLine: null
   |  |  |  startLine: 2
   |  |  |  endLine: null
   |  |  key: null
   |  |  byRef: false
   |  |  startLine: 2
   |  |  unpack: false
   |  |  endLine: null
   |  1 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Expression\TernaryNode
   |  |  |  cond: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  name: 'a'
   |  |  |  |  startLine: 3
   |  |  |  |  endLine: null
   |  |  |  if: null
   |  |  |  else: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  name: 'c'
   |  |  |  |  startLine: 3
   |  |  |  |  endLine: null
   |  |  |  startLine: 3
   |  |  |  endLine: null
   |  |  key: null
   |  |  byRef: false
   |  |  startLine: 3
   |  |  unpack: false
   |  |  endLine: null
   |  2 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Expression\TernaryNode
   |  |  |  cond: Latte\Compiler\Nodes\Php\Expression\TernaryNode
   |  |  |  |  cond: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  |  name: 'a'
   |  |  |  |  |  startLine: 6
   |  |  |  |  |  endLine: null
   |  |  |  |  if: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  |  name: 'b'
   |  |  |  |  |  startLine: 6
   |  |  |  |  |  endLine: null
   |  |  |  |  else: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  |  name: 'c'
   |  |  |  |  |  startLine: 6
   |  |  |  |  |  endLine: null
   |  |  |  |  startLine: 6
   |  |  |  |  endLine: null
   |  |  |  if: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  name: 'd'
   |  |  |  |  startLine: 6
   |  |  |  |  endLine: null
   |  |  |  else: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  name: 'e'
   |  |  |  |  startLine: 6
   |  |  |  |  endLine: null
   |  |  |  startLine: 6
   |  |  |  endLine: null
   |  |  key: null
   |  |  byRef: false
   |  |  startLine: 6
   |  |  unpack: false
   |  |  endLine: null
   |  3 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Expression\TernaryNode
   |  |  |  cond: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  name: 'a'
   |  |  |  |  startLine: 7
   |  |  |  |  endLine: null
   |  |  |  if: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  name: 'b'
   |  |  |  |  startLine: 7
   |  |  |  |  endLine: null
   |  |  |  else: Latte\Compiler\Nodes\Php\Expression\TernaryNode
   |  |  |  |  cond: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  |  name: 'c'
   |  |  |  |  |  startLine: 7
   |  |  |  |  |  endLine: null
   |  |  |  |  if: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  |  name: 'd'
   |  |  |  |  |  startLine: 7
   |  |  |  |  |  endLine: null
   |  |  |  |  else: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  |  name: 'e'
   |  |  |  |  |  startLine: 7
   |  |  |  |  |  endLine: null
   |  |  |  |  startLine: 7
   |  |  |  |  endLine: null
   |  |  |  startLine: 7
   |  |  |  endLine: null
   |  |  key: null
   |  |  byRef: false
   |  |  startLine: 7
   |  |  unpack: false
   |  |  endLine: null
   |  4 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Expression\BinaryOpNode
   |  |  |  left: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  name: 'a'
   |  |  |  |  startLine: 10
   |  |  |  |  endLine: null
   |  |  |  operator: '??'
   |  |  |  right: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  name: 'b'
   |  |  |  |  startLine: 10
   |  |  |  |  endLine: null
   |  |  |  startLine: 10
   |  |  |  endLine: null
   |  |  key: null
   |  |  byRef: false
   |  |  startLine: 10
   |  |  unpack: false
   |  |  endLine: null
   |  5 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Expression\BinaryOpNode
   |  |  |  left: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  name: 'a'
   |  |  |  |  startLine: 11
   |  |  |  |  endLine: null
   |  |  |  operator: '??'
   |  |  |  right: Latte\Compiler\Nodes\Php\Expression\BinaryOpNode
   |  |  |  |  left: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  |  name: 'b'
   |  |  |  |  |  startLine: 11
   |  |  |  |  |  endLine: null
   |  |  |  |  operator: '??'
   |  |  |  |  right: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  |  name: 'c'
   |  |  |  |  |  startLine: 11
   |  |  |  |  |  endLine: null
   |  |  |  |  startLine: 11
   |  |  |  |  endLine: null
   |  |  |  startLine: 11
   |  |  |  endLine: null
   |  |  key: null
   |  |  byRef: false
   |  |  startLine: 11
   |  |  unpack: false
   |  |  endLine: null
   |  6 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Expression\TernaryNode
   |  |  |  cond: Latte\Compiler\Nodes\Php\Expression\BinaryOpNode
   |  |  |  |  left: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  |  name: 'a'
   |  |  |  |  |  startLine: 12
   |  |  |  |  |  endLine: null
   |  |  |  |  operator: '??'
   |  |  |  |  right: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  |  name: 'b'
   |  |  |  |  |  startLine: 12
   |  |  |  |  |  endLine: null
   |  |  |  |  startLine: 12
   |  |  |  |  endLine: null
   |  |  |  if: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  name: 'c'
   |  |  |  |  startLine: 12
   |  |  |  |  endLine: null
   |  |  |  else: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  name: 'd'
   |  |  |  |  startLine: 12
   |  |  |  |  endLine: null
   |  |  |  startLine: 12
   |  |  |  endLine: null
   |  |  key: null
   |  |  byRef: false
   |  |  startLine: 12
   |  |  unpack: false
   |  |  endLine: null
   |  7 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Expression\BinaryOpNode
   |  |  |  left: Latte\Compiler\Nodes\Php\Expression\BinaryOpNode
   |  |  |  |  left: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  |  name: 'a'
   |  |  |  |  |  startLine: 13
   |  |  |  |  |  endLine: null
   |  |  |  |  operator: '&&'
   |  |  |  |  right: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  |  name: 'b'
   |  |  |  |  |  startLine: 13
   |  |  |  |  |  endLine: null
   |  |  |  |  startLine: 13
   |  |  |  |  endLine: null
   |  |  |  operator: '??'
   |  |  |  right: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  name: 'c'
   |  |  |  |  startLine: 13
   |  |  |  |  endLine: null
   |  |  |  startLine: 13
   |  |  |  endLine: null
   |  |  key: null
   |  |  byRef: false
   |  |  startLine: 13
   |  |  unpack: false
   |  |  endLine: null
   |  8 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Expression\TernaryNode
   |  |  |  cond: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  name: 'a'
   |  |  |  |  startLine: 16
   |  |  |  |  endLine: null
   |  |  |  if: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  name: 'b'
   |  |  |  |  startLine: 16
   |  |  |  |  endLine: null
   |  |  |  else: null
   |  |  |  startLine: 16
   |  |  |  endLine: null
   |  |  key: null
   |  |  byRef: false
   |  |  startLine: 16
   |  |  unpack: false
   |  |  endLine: null
   |  9 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Expression\TernaryNode
   |  |  |  cond: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  name: 'a'
   |  |  |  |  startLine: 17
   |  |  |  |  endLine: null
   |  |  |  if: Latte\Compiler\Nodes\Php\Expression\TernaryNode
   |  |  |  |  cond: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  |  name: 'b'
   |  |  |  |  |  startLine: 17
   |  |  |  |  |  endLine: null
   |  |  |  |  if: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  |  name: 'c'
   |  |  |  |  |  startLine: 17
   |  |  |  |  |  endLine: null
   |  |  |  |  else: null
   |  |  |  |  startLine: 17
   |  |  |  |  endLine: null
   |  |  |  else: null
   |  |  |  startLine: 17
   |  |  |  endLine: null
   |  |  key: null
   |  |  byRef: false
   |  |  startLine: 17
   |  |  unpack: false
   |  |  endLine: null
   startLine: null
   endLine: null
