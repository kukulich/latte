<?php

// Mathematical operators

declare(strict_types=1);

use Tester\Assert;

require __DIR__ . '/../bootstrap.php';

$test = <<<'XX'
	/* unary ops */
	~$a,
	+$a,
	-$a,

	/* binary ops */
	$a & $b,
	$a ^ $b,
	$a . $b,
	$a / $b,
	$a - $b,
	$a % $b,
	$a * $b,
	$a + $b,
	$a << $b,
	$a >> $b,
	$a ** $b,

	/* associativity */
	$a * $b * $c,
	$a * ($b * $c),

	/* precedence */
	$a + $b * $c,
	($a + $b) * $c,

	/* pow is special */
	$a ** $b ** $c,
	($a ** $b) ** $c,
	XX;

$node = parseCode($test);

Assert::same(
	loadContent(__FILE__, __COMPILER_HALT_OFFSET__),
	exportNode($node),
);

__halt_compiler();
Latte\Compiler\Nodes\Php\Expression\ArrayNode
   items: array (20)
   |  0 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Expression\UnaryOpNode
   |  |  |  expr: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  name: 'a'
   |  |  |  |  startLine: 2
   |  |  |  |  endLine: null
   |  |  |  operator: '~'
   |  |  |  startLine: 2
   |  |  |  endLine: null
   |  |  key: null
   |  |  byRef: false
   |  |  startLine: 2
   |  |  unpack: false
   |  |  endLine: null
   |  1 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Expression\UnaryOpNode
   |  |  |  expr: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  name: 'a'
   |  |  |  |  startLine: 3
   |  |  |  |  endLine: null
   |  |  |  operator: '+'
   |  |  |  startLine: 3
   |  |  |  endLine: null
   |  |  key: null
   |  |  byRef: false
   |  |  startLine: 3
   |  |  unpack: false
   |  |  endLine: null
   |  2 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Expression\UnaryOpNode
   |  |  |  expr: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  name: 'a'
   |  |  |  |  startLine: 4
   |  |  |  |  endLine: null
   |  |  |  operator: '-'
   |  |  |  startLine: 4
   |  |  |  endLine: null
   |  |  key: null
   |  |  byRef: false
   |  |  startLine: 4
   |  |  unpack: false
   |  |  endLine: null
   |  3 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Expression\BinaryOpNode
   |  |  |  left: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  name: 'a'
   |  |  |  |  startLine: 7
   |  |  |  |  endLine: null
   |  |  |  operator: '&'
   |  |  |  right: Latte\Compiler\Nodes\Php\Expression\VariableNode
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
   |  |  value: Latte\Compiler\Nodes\Php\Expression\BinaryOpNode
   |  |  |  left: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  name: 'a'
   |  |  |  |  startLine: 8
   |  |  |  |  endLine: null
   |  |  |  operator: '^'
   |  |  |  right: Latte\Compiler\Nodes\Php\Expression\VariableNode
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
   |  |  value: Latte\Compiler\Nodes\Php\Expression\BinaryOpNode
   |  |  |  left: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  name: 'a'
   |  |  |  |  startLine: 9
   |  |  |  |  endLine: null
   |  |  |  operator: '.'
   |  |  |  right: Latte\Compiler\Nodes\Php\Expression\VariableNode
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
   |  |  value: Latte\Compiler\Nodes\Php\Expression\BinaryOpNode
   |  |  |  left: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  name: 'a'
   |  |  |  |  startLine: 10
   |  |  |  |  endLine: null
   |  |  |  operator: '/'
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
   |  7 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Expression\BinaryOpNode
   |  |  |  left: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  name: 'a'
   |  |  |  |  startLine: 11
   |  |  |  |  endLine: null
   |  |  |  operator: '-'
   |  |  |  right: Latte\Compiler\Nodes\Php\Expression\VariableNode
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
   |  |  value: Latte\Compiler\Nodes\Php\Expression\BinaryOpNode
   |  |  |  left: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  name: 'a'
   |  |  |  |  startLine: 12
   |  |  |  |  endLine: null
   |  |  |  operator: '%'
   |  |  |  right: Latte\Compiler\Nodes\Php\Expression\VariableNode
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
   |  |  value: Latte\Compiler\Nodes\Php\Expression\BinaryOpNode
   |  |  |  left: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  name: 'a'
   |  |  |  |  startLine: 13
   |  |  |  |  endLine: null
   |  |  |  operator: '*'
   |  |  |  right: Latte\Compiler\Nodes\Php\Expression\VariableNode
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
   |  |  value: Latte\Compiler\Nodes\Php\Expression\BinaryOpNode
   |  |  |  left: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  name: 'a'
   |  |  |  |  startLine: 14
   |  |  |  |  endLine: null
   |  |  |  operator: '+'
   |  |  |  right: Latte\Compiler\Nodes\Php\Expression\VariableNode
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
   |  |  value: Latte\Compiler\Nodes\Php\Expression\BinaryOpNode
   |  |  |  left: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  name: 'a'
   |  |  |  |  startLine: 15
   |  |  |  |  endLine: null
   |  |  |  operator: '<<'
   |  |  |  right: Latte\Compiler\Nodes\Php\Expression\VariableNode
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
   |  |  value: Latte\Compiler\Nodes\Php\Expression\BinaryOpNode
   |  |  |  left: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  name: 'a'
   |  |  |  |  startLine: 16
   |  |  |  |  endLine: null
   |  |  |  operator: '>>'
   |  |  |  right: Latte\Compiler\Nodes\Php\Expression\VariableNode
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
   |  |  value: Latte\Compiler\Nodes\Php\Expression\BinaryOpNode
   |  |  |  left: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  name: 'a'
   |  |  |  |  startLine: 17
   |  |  |  |  endLine: null
   |  |  |  operator: '**'
   |  |  |  right: Latte\Compiler\Nodes\Php\Expression\VariableNode
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
   |  |  value: Latte\Compiler\Nodes\Php\Expression\BinaryOpNode
   |  |  |  left: Latte\Compiler\Nodes\Php\Expression\BinaryOpNode
   |  |  |  |  left: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  |  name: 'a'
   |  |  |  |  |  startLine: 20
   |  |  |  |  |  endLine: null
   |  |  |  |  operator: '*'
   |  |  |  |  right: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  |  name: 'b'
   |  |  |  |  |  startLine: 20
   |  |  |  |  |  endLine: null
   |  |  |  |  startLine: 20
   |  |  |  |  endLine: null
   |  |  |  operator: '*'
   |  |  |  right: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  name: 'c'
   |  |  |  |  startLine: 20
   |  |  |  |  endLine: null
   |  |  |  startLine: 20
   |  |  |  endLine: null
   |  |  key: null
   |  |  byRef: false
   |  |  startLine: 20
   |  |  unpack: false
   |  |  endLine: null
   |  15 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Expression\BinaryOpNode
   |  |  |  left: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  name: 'a'
   |  |  |  |  startLine: 21
   |  |  |  |  endLine: null
   |  |  |  operator: '*'
   |  |  |  right: Latte\Compiler\Nodes\Php\Expression\BinaryOpNode
   |  |  |  |  left: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  |  name: 'b'
   |  |  |  |  |  startLine: 21
   |  |  |  |  |  endLine: null
   |  |  |  |  operator: '*'
   |  |  |  |  right: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  |  name: 'c'
   |  |  |  |  |  startLine: 21
   |  |  |  |  |  endLine: null
   |  |  |  |  startLine: 21
   |  |  |  |  endLine: null
   |  |  |  startLine: 21
   |  |  |  endLine: null
   |  |  key: null
   |  |  byRef: false
   |  |  startLine: 21
   |  |  unpack: false
   |  |  endLine: null
   |  16 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Expression\BinaryOpNode
   |  |  |  left: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  name: 'a'
   |  |  |  |  startLine: 24
   |  |  |  |  endLine: null
   |  |  |  operator: '+'
   |  |  |  right: Latte\Compiler\Nodes\Php\Expression\BinaryOpNode
   |  |  |  |  left: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  |  name: 'b'
   |  |  |  |  |  startLine: 24
   |  |  |  |  |  endLine: null
   |  |  |  |  operator: '*'
   |  |  |  |  right: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  |  name: 'c'
   |  |  |  |  |  startLine: 24
   |  |  |  |  |  endLine: null
   |  |  |  |  startLine: 24
   |  |  |  |  endLine: null
   |  |  |  startLine: 24
   |  |  |  endLine: null
   |  |  key: null
   |  |  byRef: false
   |  |  startLine: 24
   |  |  unpack: false
   |  |  endLine: null
   |  17 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Expression\BinaryOpNode
   |  |  |  left: Latte\Compiler\Nodes\Php\Expression\BinaryOpNode
   |  |  |  |  left: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  |  name: 'a'
   |  |  |  |  |  startLine: 25
   |  |  |  |  |  endLine: null
   |  |  |  |  operator: '+'
   |  |  |  |  right: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  |  name: 'b'
   |  |  |  |  |  startLine: 25
   |  |  |  |  |  endLine: null
   |  |  |  |  startLine: 25
   |  |  |  |  endLine: null
   |  |  |  operator: '*'
   |  |  |  right: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  name: 'c'
   |  |  |  |  startLine: 25
   |  |  |  |  endLine: null
   |  |  |  startLine: 25
   |  |  |  endLine: null
   |  |  key: null
   |  |  byRef: false
   |  |  startLine: 25
   |  |  unpack: false
   |  |  endLine: null
   |  18 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Expression\BinaryOpNode
   |  |  |  left: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  name: 'a'
   |  |  |  |  startLine: 28
   |  |  |  |  endLine: null
   |  |  |  operator: '**'
   |  |  |  right: Latte\Compiler\Nodes\Php\Expression\BinaryOpNode
   |  |  |  |  left: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  |  name: 'b'
   |  |  |  |  |  startLine: 28
   |  |  |  |  |  endLine: null
   |  |  |  |  operator: '**'
   |  |  |  |  right: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  |  name: 'c'
   |  |  |  |  |  startLine: 28
   |  |  |  |  |  endLine: null
   |  |  |  |  startLine: 28
   |  |  |  |  endLine: null
   |  |  |  startLine: 28
   |  |  |  endLine: null
   |  |  key: null
   |  |  byRef: false
   |  |  startLine: 28
   |  |  unpack: false
   |  |  endLine: null
   |  19 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Expression\BinaryOpNode
   |  |  |  left: Latte\Compiler\Nodes\Php\Expression\BinaryOpNode
   |  |  |  |  left: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  |  name: 'a'
   |  |  |  |  |  startLine: 29
   |  |  |  |  |  endLine: null
   |  |  |  |  operator: '**'
   |  |  |  |  right: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  |  name: 'b'
   |  |  |  |  |  startLine: 29
   |  |  |  |  |  endLine: null
   |  |  |  |  startLine: 29
   |  |  |  |  endLine: null
   |  |  |  operator: '**'
   |  |  |  right: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  name: 'c'
   |  |  |  |  startLine: 29
   |  |  |  |  endLine: null
   |  |  |  startLine: 29
   |  |  |  endLine: null
   |  |  key: null
   |  |  byRef: false
   |  |  startLine: 29
   |  |  unpack: false
   |  |  endLine: null
   startLine: null
   endLine: null
