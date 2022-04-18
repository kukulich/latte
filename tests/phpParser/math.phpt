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
   |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  line: 2
   |  |  |  |  |  column: 2
   |  |  |  |  |  offset: 17
   |  |  |  operator: '~'
   |  |  |  position: Latte\Compiler\Position
   |  |  |  |  line: 2
   |  |  |  |  column: 1
   |  |  |  |  offset: 16
   |  |  key: null
   |  |  byRef: false
   |  |  position: Latte\Compiler\Position
   |  |  |  line: 2
   |  |  |  column: 1
   |  |  |  offset: 16
   |  |  unpack: false
   |  1 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Expression\UnaryOpNode
   |  |  |  expr: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  name: 'a'
   |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  line: 3
   |  |  |  |  |  column: 2
   |  |  |  |  |  offset: 22
   |  |  |  operator: '+'
   |  |  |  position: Latte\Compiler\Position
   |  |  |  |  line: 3
   |  |  |  |  column: 1
   |  |  |  |  offset: 21
   |  |  key: null
   |  |  byRef: false
   |  |  position: Latte\Compiler\Position
   |  |  |  line: 3
   |  |  |  column: 1
   |  |  |  offset: 21
   |  |  unpack: false
   |  2 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Expression\UnaryOpNode
   |  |  |  expr: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  name: 'a'
   |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  line: 4
   |  |  |  |  |  column: 2
   |  |  |  |  |  offset: 27
   |  |  |  operator: '-'
   |  |  |  position: Latte\Compiler\Position
   |  |  |  |  line: 4
   |  |  |  |  column: 1
   |  |  |  |  offset: 26
   |  |  key: null
   |  |  byRef: false
   |  |  position: Latte\Compiler\Position
   |  |  |  line: 4
   |  |  |  column: 1
   |  |  |  offset: 26
   |  |  unpack: false
   |  3 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Expression\BinaryOpNode
   |  |  |  left: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  name: 'a'
   |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  line: 7
   |  |  |  |  |  column: 1
   |  |  |  |  |  offset: 49
   |  |  |  operator: '&'
   |  |  |  right: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  name: 'b'
   |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  line: 7
   |  |  |  |  |  column: 6
   |  |  |  |  |  offset: 54
   |  |  |  position: Latte\Compiler\Position
   |  |  |  |  line: 7
   |  |  |  |  column: 1
   |  |  |  |  offset: 49
   |  |  key: null
   |  |  byRef: false
   |  |  position: Latte\Compiler\Position
   |  |  |  line: 7
   |  |  |  column: 1
   |  |  |  offset: 49
   |  |  unpack: false
   |  4 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Expression\BinaryOpNode
   |  |  |  left: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  name: 'a'
   |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  line: 8
   |  |  |  |  |  column: 1
   |  |  |  |  |  offset: 58
   |  |  |  operator: '^'
   |  |  |  right: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  name: 'b'
   |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  line: 8
   |  |  |  |  |  column: 6
   |  |  |  |  |  offset: 63
   |  |  |  position: Latte\Compiler\Position
   |  |  |  |  line: 8
   |  |  |  |  column: 1
   |  |  |  |  offset: 58
   |  |  key: null
   |  |  byRef: false
   |  |  position: Latte\Compiler\Position
   |  |  |  line: 8
   |  |  |  column: 1
   |  |  |  offset: 58
   |  |  unpack: false
   |  5 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Expression\BinaryOpNode
   |  |  |  left: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  name: 'a'
   |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  line: 9
   |  |  |  |  |  column: 1
   |  |  |  |  |  offset: 67
   |  |  |  operator: '.'
   |  |  |  right: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  name: 'b'
   |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  line: 9
   |  |  |  |  |  column: 6
   |  |  |  |  |  offset: 72
   |  |  |  position: Latte\Compiler\Position
   |  |  |  |  line: 9
   |  |  |  |  column: 1
   |  |  |  |  offset: 67
   |  |  key: null
   |  |  byRef: false
   |  |  position: Latte\Compiler\Position
   |  |  |  line: 9
   |  |  |  column: 1
   |  |  |  offset: 67
   |  |  unpack: false
   |  6 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Expression\BinaryOpNode
   |  |  |  left: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  name: 'a'
   |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  line: 10
   |  |  |  |  |  column: 1
   |  |  |  |  |  offset: 76
   |  |  |  operator: '/'
   |  |  |  right: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  name: 'b'
   |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  line: 10
   |  |  |  |  |  column: 6
   |  |  |  |  |  offset: 81
   |  |  |  position: Latte\Compiler\Position
   |  |  |  |  line: 10
   |  |  |  |  column: 1
   |  |  |  |  offset: 76
   |  |  key: null
   |  |  byRef: false
   |  |  position: Latte\Compiler\Position
   |  |  |  line: 10
   |  |  |  column: 1
   |  |  |  offset: 76
   |  |  unpack: false
   |  7 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Expression\BinaryOpNode
   |  |  |  left: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  name: 'a'
   |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  line: 11
   |  |  |  |  |  column: 1
   |  |  |  |  |  offset: 85
   |  |  |  operator: '-'
   |  |  |  right: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  name: 'b'
   |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  line: 11
   |  |  |  |  |  column: 6
   |  |  |  |  |  offset: 90
   |  |  |  position: Latte\Compiler\Position
   |  |  |  |  line: 11
   |  |  |  |  column: 1
   |  |  |  |  offset: 85
   |  |  key: null
   |  |  byRef: false
   |  |  position: Latte\Compiler\Position
   |  |  |  line: 11
   |  |  |  column: 1
   |  |  |  offset: 85
   |  |  unpack: false
   |  8 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Expression\BinaryOpNode
   |  |  |  left: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  name: 'a'
   |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  line: 12
   |  |  |  |  |  column: 1
   |  |  |  |  |  offset: 94
   |  |  |  operator: '%'
   |  |  |  right: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  name: 'b'
   |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  line: 12
   |  |  |  |  |  column: 6
   |  |  |  |  |  offset: 99
   |  |  |  position: Latte\Compiler\Position
   |  |  |  |  line: 12
   |  |  |  |  column: 1
   |  |  |  |  offset: 94
   |  |  key: null
   |  |  byRef: false
   |  |  position: Latte\Compiler\Position
   |  |  |  line: 12
   |  |  |  column: 1
   |  |  |  offset: 94
   |  |  unpack: false
   |  9 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Expression\BinaryOpNode
   |  |  |  left: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  name: 'a'
   |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  line: 13
   |  |  |  |  |  column: 1
   |  |  |  |  |  offset: 103
   |  |  |  operator: '*'
   |  |  |  right: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  name: 'b'
   |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  line: 13
   |  |  |  |  |  column: 6
   |  |  |  |  |  offset: 108
   |  |  |  position: Latte\Compiler\Position
   |  |  |  |  line: 13
   |  |  |  |  column: 1
   |  |  |  |  offset: 103
   |  |  key: null
   |  |  byRef: false
   |  |  position: Latte\Compiler\Position
   |  |  |  line: 13
   |  |  |  column: 1
   |  |  |  offset: 103
   |  |  unpack: false
   |  10 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Expression\BinaryOpNode
   |  |  |  left: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  name: 'a'
   |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  line: 14
   |  |  |  |  |  column: 1
   |  |  |  |  |  offset: 112
   |  |  |  operator: '+'
   |  |  |  right: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  name: 'b'
   |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  line: 14
   |  |  |  |  |  column: 6
   |  |  |  |  |  offset: 117
   |  |  |  position: Latte\Compiler\Position
   |  |  |  |  line: 14
   |  |  |  |  column: 1
   |  |  |  |  offset: 112
   |  |  key: null
   |  |  byRef: false
   |  |  position: Latte\Compiler\Position
   |  |  |  line: 14
   |  |  |  column: 1
   |  |  |  offset: 112
   |  |  unpack: false
   |  11 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Expression\BinaryOpNode
   |  |  |  left: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  name: 'a'
   |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  line: 15
   |  |  |  |  |  column: 1
   |  |  |  |  |  offset: 121
   |  |  |  operator: '<<'
   |  |  |  right: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  name: 'b'
   |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  line: 15
   |  |  |  |  |  column: 7
   |  |  |  |  |  offset: 127
   |  |  |  position: Latte\Compiler\Position
   |  |  |  |  line: 15
   |  |  |  |  column: 1
   |  |  |  |  offset: 121
   |  |  key: null
   |  |  byRef: false
   |  |  position: Latte\Compiler\Position
   |  |  |  line: 15
   |  |  |  column: 1
   |  |  |  offset: 121
   |  |  unpack: false
   |  12 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Expression\BinaryOpNode
   |  |  |  left: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  name: 'a'
   |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  line: 16
   |  |  |  |  |  column: 1
   |  |  |  |  |  offset: 131
   |  |  |  operator: '>>'
   |  |  |  right: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  name: 'b'
   |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  line: 16
   |  |  |  |  |  column: 7
   |  |  |  |  |  offset: 137
   |  |  |  position: Latte\Compiler\Position
   |  |  |  |  line: 16
   |  |  |  |  column: 1
   |  |  |  |  offset: 131
   |  |  key: null
   |  |  byRef: false
   |  |  position: Latte\Compiler\Position
   |  |  |  line: 16
   |  |  |  column: 1
   |  |  |  offset: 131
   |  |  unpack: false
   |  13 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Expression\BinaryOpNode
   |  |  |  left: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  name: 'a'
   |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  line: 17
   |  |  |  |  |  column: 1
   |  |  |  |  |  offset: 141
   |  |  |  operator: '**'
   |  |  |  right: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  name: 'b'
   |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  line: 17
   |  |  |  |  |  column: 7
   |  |  |  |  |  offset: 147
   |  |  |  position: Latte\Compiler\Position
   |  |  |  |  line: 17
   |  |  |  |  column: 1
   |  |  |  |  offset: 141
   |  |  key: null
   |  |  byRef: false
   |  |  position: Latte\Compiler\Position
   |  |  |  line: 17
   |  |  |  column: 1
   |  |  |  offset: 141
   |  |  unpack: false
   |  14 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Expression\BinaryOpNode
   |  |  |  left: Latte\Compiler\Nodes\Php\Expression\BinaryOpNode
   |  |  |  |  left: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  |  name: 'a'
   |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  line: 20
   |  |  |  |  |  |  column: 1
   |  |  |  |  |  |  offset: 172
   |  |  |  |  operator: '*'
   |  |  |  |  right: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  |  name: 'b'
   |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  line: 20
   |  |  |  |  |  |  column: 6
   |  |  |  |  |  |  offset: 177
   |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  line: 20
   |  |  |  |  |  column: 1
   |  |  |  |  |  offset: 172
   |  |  |  operator: '*'
   |  |  |  right: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  name: 'c'
   |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  line: 20
   |  |  |  |  |  column: 11
   |  |  |  |  |  offset: 182
   |  |  |  position: Latte\Compiler\Position
   |  |  |  |  line: 20
   |  |  |  |  column: 1
   |  |  |  |  offset: 172
   |  |  key: null
   |  |  byRef: false
   |  |  position: Latte\Compiler\Position
   |  |  |  line: 20
   |  |  |  column: 1
   |  |  |  offset: 172
   |  |  unpack: false
   |  15 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Expression\BinaryOpNode
   |  |  |  left: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  name: 'a'
   |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  line: 21
   |  |  |  |  |  column: 1
   |  |  |  |  |  offset: 186
   |  |  |  operator: '*'
   |  |  |  right: Latte\Compiler\Nodes\Php\Expression\BinaryOpNode
   |  |  |  |  left: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  |  name: 'b'
   |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  line: 21
   |  |  |  |  |  |  column: 7
   |  |  |  |  |  |  offset: 192
   |  |  |  |  operator: '*'
   |  |  |  |  right: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  |  name: 'c'
   |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  line: 21
   |  |  |  |  |  |  column: 12
   |  |  |  |  |  |  offset: 197
   |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  line: 21
   |  |  |  |  |  column: 7
   |  |  |  |  |  offset: 192
   |  |  |  position: Latte\Compiler\Position
   |  |  |  |  line: 21
   |  |  |  |  column: 1
   |  |  |  |  offset: 186
   |  |  key: null
   |  |  byRef: false
   |  |  position: Latte\Compiler\Position
   |  |  |  line: 21
   |  |  |  column: 1
   |  |  |  offset: 186
   |  |  unpack: false
   |  16 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Expression\BinaryOpNode
   |  |  |  left: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  name: 'a'
   |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  line: 24
   |  |  |  |  |  column: 1
   |  |  |  |  |  offset: 220
   |  |  |  operator: '+'
   |  |  |  right: Latte\Compiler\Nodes\Php\Expression\BinaryOpNode
   |  |  |  |  left: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  |  name: 'b'
   |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  line: 24
   |  |  |  |  |  |  column: 6
   |  |  |  |  |  |  offset: 225
   |  |  |  |  operator: '*'
   |  |  |  |  right: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  |  name: 'c'
   |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  line: 24
   |  |  |  |  |  |  column: 11
   |  |  |  |  |  |  offset: 230
   |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  line: 24
   |  |  |  |  |  column: 6
   |  |  |  |  |  offset: 225
   |  |  |  position: Latte\Compiler\Position
   |  |  |  |  line: 24
   |  |  |  |  column: 1
   |  |  |  |  offset: 220
   |  |  key: null
   |  |  byRef: false
   |  |  position: Latte\Compiler\Position
   |  |  |  line: 24
   |  |  |  column: 1
   |  |  |  offset: 220
   |  |  unpack: false
   |  17 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Expression\BinaryOpNode
   |  |  |  left: Latte\Compiler\Nodes\Php\Expression\BinaryOpNode
   |  |  |  |  left: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  |  name: 'a'
   |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  line: 25
   |  |  |  |  |  |  column: 2
   |  |  |  |  |  |  offset: 235
   |  |  |  |  operator: '+'
   |  |  |  |  right: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  |  name: 'b'
   |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  line: 25
   |  |  |  |  |  |  column: 7
   |  |  |  |  |  |  offset: 240
   |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  line: 25
   |  |  |  |  |  column: 2
   |  |  |  |  |  offset: 235
   |  |  |  operator: '*'
   |  |  |  right: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  name: 'c'
   |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  line: 25
   |  |  |  |  |  column: 13
   |  |  |  |  |  offset: 246
   |  |  |  position: Latte\Compiler\Position
   |  |  |  |  line: 25
   |  |  |  |  column: 1
   |  |  |  |  offset: 234
   |  |  key: null
   |  |  byRef: false
   |  |  position: Latte\Compiler\Position
   |  |  |  line: 25
   |  |  |  column: 1
   |  |  |  offset: 234
   |  |  unpack: false
   |  18 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Expression\BinaryOpNode
   |  |  |  left: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  name: 'a'
   |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  line: 28
   |  |  |  |  |  column: 1
   |  |  |  |  |  offset: 272
   |  |  |  operator: '**'
   |  |  |  right: Latte\Compiler\Nodes\Php\Expression\BinaryOpNode
   |  |  |  |  left: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  |  name: 'b'
   |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  line: 28
   |  |  |  |  |  |  column: 7
   |  |  |  |  |  |  offset: 278
   |  |  |  |  operator: '**'
   |  |  |  |  right: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  |  name: 'c'
   |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  line: 28
   |  |  |  |  |  |  column: 13
   |  |  |  |  |  |  offset: 284
   |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  line: 28
   |  |  |  |  |  column: 7
   |  |  |  |  |  offset: 278
   |  |  |  position: Latte\Compiler\Position
   |  |  |  |  line: 28
   |  |  |  |  column: 1
   |  |  |  |  offset: 272
   |  |  key: null
   |  |  byRef: false
   |  |  position: Latte\Compiler\Position
   |  |  |  line: 28
   |  |  |  column: 1
   |  |  |  offset: 272
   |  |  unpack: false
   |  19 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Expression\BinaryOpNode
   |  |  |  left: Latte\Compiler\Nodes\Php\Expression\BinaryOpNode
   |  |  |  |  left: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  |  name: 'a'
   |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  line: 29
   |  |  |  |  |  |  column: 2
   |  |  |  |  |  |  offset: 289
   |  |  |  |  operator: '**'
   |  |  |  |  right: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  |  name: 'b'
   |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  line: 29
   |  |  |  |  |  |  column: 8
   |  |  |  |  |  |  offset: 295
   |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  line: 29
   |  |  |  |  |  column: 2
   |  |  |  |  |  offset: 289
   |  |  |  operator: '**'
   |  |  |  right: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  name: 'c'
   |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  line: 29
   |  |  |  |  |  column: 15
   |  |  |  |  |  offset: 302
   |  |  |  position: Latte\Compiler\Position
   |  |  |  |  line: 29
   |  |  |  |  column: 1
   |  |  |  |  offset: 288
   |  |  key: null
   |  |  byRef: false
   |  |  position: Latte\Compiler\Position
   |  |  |  line: 29
   |  |  |  column: 1
   |  |  |  offset: 288
   |  |  unpack: false
   position: null
