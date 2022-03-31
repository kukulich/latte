<?php

// Assignments

declare(strict_types=1);

use Tester\Assert;

require __DIR__ . '/../bootstrap.php';

$test = <<<'XX'
	/* simple assign */
	$a = $b,

	/* combined assign */
	$a &= $b,
	$a |= $b,
	$a ^= $b,
	$a .= $b,
	$a /= $b,
	$a -= $b,
	$a %= $b,
	$a *= $b,
	$a += $b,
	$a <<= $b,
	$a >>= $b,
	$a **= $b,
	$a ??= $b,

	/* chained assign */
	$a = $b *= $c **= $d,

	/* by ref assign */
	$a =& $b,

	/* list() assign */
	list($a) = $b,
	list($a, , $b) = $c,
	list($a, list(, $c), $d) = $e,

	/* inc/dec */
	++$a,
	$a++,
	--$a,
	$a--,
	XX;

$node = parseCode($test);

Assert::same(
	loadContent(__FILE__, __COMPILER_HALT_OFFSET__),
	exportNode($node),
);

__halt_compiler();
Latte\Compiler\Nodes\Php\Expression\ArrayNode
   items: array (23)
   |  0 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Expression\AssignNode
   |  |  |  var: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  name: 'a'
   |  |  |  |  startLine: 2
   |  |  |  |  endLine: null
   |  |  |  expr: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  name: 'b'
   |  |  |  |  startLine: 2
   |  |  |  |  endLine: null
   |  |  |  byRef: false
   |  |  |  startLine: 2
   |  |  |  endLine: null
   |  |  key: null
   |  |  byRef: false
   |  |  startLine: 2
   |  |  unpack: false
   |  |  endLine: null
   |  1 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Expression\AssignOpNode
   |  |  |  var: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  name: 'a'
   |  |  |  |  startLine: 5
   |  |  |  |  endLine: null
   |  |  |  operator: '&'
   |  |  |  expr: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  name: 'b'
   |  |  |  |  startLine: 5
   |  |  |  |  endLine: null
   |  |  |  startLine: 5
   |  |  |  endLine: null
   |  |  key: null
   |  |  byRef: false
   |  |  startLine: 5
   |  |  unpack: false
   |  |  endLine: null
   |  2 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Expression\AssignOpNode
   |  |  |  var: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  name: 'a'
   |  |  |  |  startLine: 6
   |  |  |  |  endLine: null
   |  |  |  operator: '|'
   |  |  |  expr: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  name: 'b'
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
   |  |  value: Latte\Compiler\Nodes\Php\Expression\AssignOpNode
   |  |  |  var: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  name: 'a'
   |  |  |  |  startLine: 7
   |  |  |  |  endLine: null
   |  |  |  operator: '^'
   |  |  |  expr: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  name: 'b'
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
   |  |  value: Latte\Compiler\Nodes\Php\Expression\AssignOpNode
   |  |  |  var: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  name: 'a'
   |  |  |  |  startLine: 8
   |  |  |  |  endLine: null
   |  |  |  operator: '.'
   |  |  |  expr: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  name: 'b'
   |  |  |  |  startLine: 8
   |  |  |  |  endLine: null
   |  |  |  startLine: 8
   |  |  |  endLine: null
   |  |  key: null
   |  |  byRef: false
   |  |  startLine: 8
   |  |  unpack: false
   |  |  endLine: null
   |  5 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Expression\AssignOpNode
   |  |  |  var: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  name: 'a'
   |  |  |  |  startLine: 9
   |  |  |  |  endLine: null
   |  |  |  operator: '/'
   |  |  |  expr: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  name: 'b'
   |  |  |  |  startLine: 9
   |  |  |  |  endLine: null
   |  |  |  startLine: 9
   |  |  |  endLine: null
   |  |  key: null
   |  |  byRef: false
   |  |  startLine: 9
   |  |  unpack: false
   |  |  endLine: null
   |  6 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Expression\AssignOpNode
   |  |  |  var: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  name: 'a'
   |  |  |  |  startLine: 10
   |  |  |  |  endLine: null
   |  |  |  operator: '-'
   |  |  |  expr: Latte\Compiler\Nodes\Php\Expression\VariableNode
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
   |  7 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Expression\AssignOpNode
   |  |  |  var: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  name: 'a'
   |  |  |  |  startLine: 11
   |  |  |  |  endLine: null
   |  |  |  operator: '%'
   |  |  |  expr: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  name: 'b'
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
   |  |  value: Latte\Compiler\Nodes\Php\Expression\AssignOpNode
   |  |  |  var: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  name: 'a'
   |  |  |  |  startLine: 12
   |  |  |  |  endLine: null
   |  |  |  operator: '*'
   |  |  |  expr: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  name: 'b'
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
   |  |  value: Latte\Compiler\Nodes\Php\Expression\AssignOpNode
   |  |  |  var: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  name: 'a'
   |  |  |  |  startLine: 13
   |  |  |  |  endLine: null
   |  |  |  operator: '+'
   |  |  |  expr: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  name: 'b'
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
   |  |  value: Latte\Compiler\Nodes\Php\Expression\AssignOpNode
   |  |  |  var: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  name: 'a'
   |  |  |  |  startLine: 14
   |  |  |  |  endLine: null
   |  |  |  operator: '<<'
   |  |  |  expr: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  name: 'b'
   |  |  |  |  startLine: 14
   |  |  |  |  endLine: null
   |  |  |  startLine: 14
   |  |  |  endLine: null
   |  |  key: null
   |  |  byRef: false
   |  |  startLine: 14
   |  |  unpack: false
   |  |  endLine: null
   |  11 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Expression\AssignOpNode
   |  |  |  var: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  name: 'a'
   |  |  |  |  startLine: 15
   |  |  |  |  endLine: null
   |  |  |  operator: '>>'
   |  |  |  expr: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  name: 'b'
   |  |  |  |  startLine: 15
   |  |  |  |  endLine: null
   |  |  |  startLine: 15
   |  |  |  endLine: null
   |  |  key: null
   |  |  byRef: false
   |  |  startLine: 15
   |  |  unpack: false
   |  |  endLine: null
   |  12 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Expression\AssignOpNode
   |  |  |  var: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  name: 'a'
   |  |  |  |  startLine: 16
   |  |  |  |  endLine: null
   |  |  |  operator: '**'
   |  |  |  expr: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  name: 'b'
   |  |  |  |  startLine: 16
   |  |  |  |  endLine: null
   |  |  |  startLine: 16
   |  |  |  endLine: null
   |  |  key: null
   |  |  byRef: false
   |  |  startLine: 16
   |  |  unpack: false
   |  |  endLine: null
   |  13 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Expression\AssignOpNode
   |  |  |  var: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  name: 'a'
   |  |  |  |  startLine: 17
   |  |  |  |  endLine: null
   |  |  |  operator: '??'
   |  |  |  expr: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  name: 'b'
   |  |  |  |  startLine: 17
   |  |  |  |  endLine: null
   |  |  |  startLine: 17
   |  |  |  endLine: null
   |  |  key: null
   |  |  byRef: false
   |  |  startLine: 17
   |  |  unpack: false
   |  |  endLine: null
   |  14 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Expression\AssignNode
   |  |  |  var: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  name: 'a'
   |  |  |  |  startLine: 20
   |  |  |  |  endLine: null
   |  |  |  expr: Latte\Compiler\Nodes\Php\Expression\AssignOpNode
   |  |  |  |  var: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  |  name: 'b'
   |  |  |  |  |  startLine: 20
   |  |  |  |  |  endLine: null
   |  |  |  |  operator: '*'
   |  |  |  |  expr: Latte\Compiler\Nodes\Php\Expression\AssignOpNode
   |  |  |  |  |  var: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  |  |  name: 'c'
   |  |  |  |  |  |  startLine: 20
   |  |  |  |  |  |  endLine: null
   |  |  |  |  |  operator: '**'
   |  |  |  |  |  expr: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  |  |  name: 'd'
   |  |  |  |  |  |  startLine: 20
   |  |  |  |  |  |  endLine: null
   |  |  |  |  |  startLine: 20
   |  |  |  |  |  endLine: null
   |  |  |  |  startLine: 20
   |  |  |  |  endLine: null
   |  |  |  byRef: false
   |  |  |  startLine: 20
   |  |  |  endLine: null
   |  |  key: null
   |  |  byRef: false
   |  |  startLine: 20
   |  |  unpack: false
   |  |  endLine: null
   |  15 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Expression\AssignNode
   |  |  |  var: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  name: 'a'
   |  |  |  |  startLine: 23
   |  |  |  |  endLine: null
   |  |  |  expr: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  name: 'b'
   |  |  |  |  startLine: 23
   |  |  |  |  endLine: null
   |  |  |  byRef: true
   |  |  |  startLine: 23
   |  |  |  endLine: null
   |  |  key: null
   |  |  byRef: false
   |  |  startLine: 23
   |  |  unpack: false
   |  |  endLine: null
   |  16 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Expression\AssignNode
   |  |  |  var: Latte\Compiler\Nodes\Php\Expression\ListNode
   |  |  |  |  items: array (1)
   |  |  |  |  |  0 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  |  |  |  |  value: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  |  |  |  name: 'a'
   |  |  |  |  |  |  |  startLine: 26
   |  |  |  |  |  |  |  endLine: null
   |  |  |  |  |  |  key: null
   |  |  |  |  |  |  byRef: false
   |  |  |  |  |  |  startLine: 26
   |  |  |  |  |  |  unpack: false
   |  |  |  |  |  |  endLine: null
   |  |  |  |  startLine: 26
   |  |  |  |  endLine: null
   |  |  |  expr: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  name: 'b'
   |  |  |  |  startLine: 26
   |  |  |  |  endLine: null
   |  |  |  byRef: false
   |  |  |  startLine: 26
   |  |  |  endLine: null
   |  |  key: null
   |  |  byRef: false
   |  |  startLine: 26
   |  |  unpack: false
   |  |  endLine: null
   |  17 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Expression\AssignNode
   |  |  |  var: Latte\Compiler\Nodes\Php\Expression\ListNode
   |  |  |  |  items: array (3)
   |  |  |  |  |  0 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  |  |  |  |  value: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  |  |  |  name: 'a'
   |  |  |  |  |  |  |  startLine: 27
   |  |  |  |  |  |  |  endLine: null
   |  |  |  |  |  |  key: null
   |  |  |  |  |  |  byRef: false
   |  |  |  |  |  |  startLine: 27
   |  |  |  |  |  |  unpack: false
   |  |  |  |  |  |  endLine: null
   |  |  |  |  |  1 => null
   |  |  |  |  |  2 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  |  |  |  |  value: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  |  |  |  name: 'b'
   |  |  |  |  |  |  |  startLine: 27
   |  |  |  |  |  |  |  endLine: null
   |  |  |  |  |  |  key: null
   |  |  |  |  |  |  byRef: false
   |  |  |  |  |  |  startLine: 27
   |  |  |  |  |  |  unpack: false
   |  |  |  |  |  |  endLine: null
   |  |  |  |  startLine: 27
   |  |  |  |  endLine: null
   |  |  |  expr: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  name: 'c'
   |  |  |  |  startLine: 27
   |  |  |  |  endLine: null
   |  |  |  byRef: false
   |  |  |  startLine: 27
   |  |  |  endLine: null
   |  |  key: null
   |  |  byRef: false
   |  |  startLine: 27
   |  |  unpack: false
   |  |  endLine: null
   |  18 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Expression\AssignNode
   |  |  |  var: Latte\Compiler\Nodes\Php\Expression\ListNode
   |  |  |  |  items: array (3)
   |  |  |  |  |  0 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  |  |  |  |  value: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  |  |  |  name: 'a'
   |  |  |  |  |  |  |  startLine: 28
   |  |  |  |  |  |  |  endLine: null
   |  |  |  |  |  |  key: null
   |  |  |  |  |  |  byRef: false
   |  |  |  |  |  |  startLine: 28
   |  |  |  |  |  |  unpack: false
   |  |  |  |  |  |  endLine: null
   |  |  |  |  |  1 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  |  |  |  |  value: Latte\Compiler\Nodes\Php\Expression\ListNode
   |  |  |  |  |  |  |  items: array (2)
   |  |  |  |  |  |  |  |  0 => null
   |  |  |  |  |  |  |  |  1 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  |  |  |  |  |  |  |  value: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  |  |  |  |  |  |  name: 'c'
   |  |  |  |  |  |  |  |  |  |  startLine: 28
   |  |  |  |  |  |  |  |  |  |  endLine: null
   |  |  |  |  |  |  |  |  |  key: null
   |  |  |  |  |  |  |  |  |  byRef: false
   |  |  |  |  |  |  |  |  |  startLine: 28
   |  |  |  |  |  |  |  |  |  unpack: false
   |  |  |  |  |  |  |  |  |  endLine: null
   |  |  |  |  |  |  |  startLine: 28
   |  |  |  |  |  |  |  endLine: null
   |  |  |  |  |  |  key: null
   |  |  |  |  |  |  byRef: false
   |  |  |  |  |  |  startLine: 28
   |  |  |  |  |  |  unpack: false
   |  |  |  |  |  |  endLine: null
   |  |  |  |  |  2 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  |  |  |  |  value: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  |  |  |  name: 'd'
   |  |  |  |  |  |  |  startLine: 28
   |  |  |  |  |  |  |  endLine: null
   |  |  |  |  |  |  key: null
   |  |  |  |  |  |  byRef: false
   |  |  |  |  |  |  startLine: 28
   |  |  |  |  |  |  unpack: false
   |  |  |  |  |  |  endLine: null
   |  |  |  |  startLine: 28
   |  |  |  |  endLine: null
   |  |  |  expr: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  name: 'e'
   |  |  |  |  startLine: 28
   |  |  |  |  endLine: null
   |  |  |  byRef: false
   |  |  |  startLine: 28
   |  |  |  endLine: null
   |  |  key: null
   |  |  byRef: false
   |  |  startLine: 28
   |  |  unpack: false
   |  |  endLine: null
   |  19 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Expression\PreOpNode
   |  |  |  var: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  name: 'a'
   |  |  |  |  startLine: 31
   |  |  |  |  endLine: null
   |  |  |  operator: '++'
   |  |  |  startLine: 31
   |  |  |  endLine: null
   |  |  key: null
   |  |  byRef: false
   |  |  startLine: 31
   |  |  unpack: false
   |  |  endLine: null
   |  20 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Expression\PostOpNode
   |  |  |  var: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  name: 'a'
   |  |  |  |  startLine: 32
   |  |  |  |  endLine: null
   |  |  |  operator: '++'
   |  |  |  startLine: 32
   |  |  |  endLine: null
   |  |  key: null
   |  |  byRef: false
   |  |  startLine: 32
   |  |  unpack: false
   |  |  endLine: null
   |  21 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Expression\PreOpNode
   |  |  |  var: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  name: 'a'
   |  |  |  |  startLine: 33
   |  |  |  |  endLine: null
   |  |  |  operator: '--'
   |  |  |  startLine: 33
   |  |  |  endLine: null
   |  |  key: null
   |  |  byRef: false
   |  |  startLine: 33
   |  |  unpack: false
   |  |  endLine: null
   |  22 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Expression\PostOpNode
   |  |  |  var: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  name: 'a'
   |  |  |  |  startLine: 34
   |  |  |  |  endLine: null
   |  |  |  operator: '--'
   |  |  |  startLine: 34
   |  |  |  endLine: null
   |  |  key: null
   |  |  byRef: false
   |  |  startLine: 34
   |  |  unpack: false
   |  |  endLine: null
   startLine: null
   endLine: null
