<?php

// Encapsed strings

declare(strict_types=1);

use Tester\Assert;

require __DIR__ . '/../bootstrap.php';

$test = <<<'XX'
	"$A",
	"$A->B",
	"$A[B]",
	"$A[0]",
	"$A[1234]",
	"$A[9223372036854775808]",
	"$A[000]",
	"$A[0x0]",
	"$A[0b0]",
	"$A[$B]",
	"{$A}",
	"{$A['B']}",
	"\{$A}",
	"\{ $A }",
	"\\{$A}",
	"\\{ $A }",
	"$$A[B]",
	"A $B C",
	XX;

$node = parseCode($test);

Assert::same(
	loadContent(__FILE__, __COMPILER_HALT_OFFSET__),
	exportNode($node),
);

__halt_compiler();
Latte\Compiler\Nodes\Php\Expression\ArrayNode
   items: array (18)
   |  0 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Scalar\EncapsedStringNode
   |  |  |  parts: array (1)
   |  |  |  |  0 => Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  |  name: 'A'
   |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  line: 1
   |  |  |  |  |  |  column: 2
   |  |  |  |  |  |  offset: 1
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
   |  |  value: Latte\Compiler\Nodes\Php\Scalar\EncapsedStringNode
   |  |  |  parts: array (1)
   |  |  |  |  0 => Latte\Compiler\Nodes\Php\Expression\PropertyFetchNode
   |  |  |  |  |  name: Latte\Compiler\Nodes\Php\IdentifierNode
   |  |  |  |  |  |  name: 'B'
   |  |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  |  line: 2
   |  |  |  |  |  |  |  column: 6
   |  |  |  |  |  |  |  offset: 11
   |  |  |  |  |  object: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  |  |  name: 'A'
   |  |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  |  line: 2
   |  |  |  |  |  |  |  column: 2
   |  |  |  |  |  |  |  offset: 7
   |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  line: 2
   |  |  |  |  |  |  column: 2
   |  |  |  |  |  |  offset: 7
   |  |  |  position: Latte\Compiler\Position
   |  |  |  |  line: 2
   |  |  |  |  column: 1
   |  |  |  |  offset: 6
   |  |  key: null
   |  |  byRef: false
   |  |  position: Latte\Compiler\Position
   |  |  |  line: 2
   |  |  |  column: 1
   |  |  |  offset: 6
   |  |  unpack: false
   |  2 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Scalar\EncapsedStringNode
   |  |  |  parts: array (1)
   |  |  |  |  0 => Latte\Compiler\Nodes\Php\Expression\ArrayAccessNode
   |  |  |  |  |  expr: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  |  |  name: 'A'
   |  |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  |  line: 3
   |  |  |  |  |  |  |  column: 2
   |  |  |  |  |  |  |  offset: 16
   |  |  |  |  |  index: Latte\Compiler\Nodes\Php\Scalar\StringNode
   |  |  |  |  |  |  value: 'B'
   |  |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  |  line: 3
   |  |  |  |  |  |  |  column: 5
   |  |  |  |  |  |  |  offset: 19
   |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  line: 3
   |  |  |  |  |  |  column: 2
   |  |  |  |  |  |  offset: 16
   |  |  |  position: Latte\Compiler\Position
   |  |  |  |  line: 3
   |  |  |  |  column: 1
   |  |  |  |  offset: 15
   |  |  key: null
   |  |  byRef: false
   |  |  position: Latte\Compiler\Position
   |  |  |  line: 3
   |  |  |  column: 1
   |  |  |  offset: 15
   |  |  unpack: false
   |  3 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Scalar\EncapsedStringNode
   |  |  |  parts: array (1)
   |  |  |  |  0 => Latte\Compiler\Nodes\Php\Expression\ArrayAccessNode
   |  |  |  |  |  expr: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  |  |  name: 'A'
   |  |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  |  line: 4
   |  |  |  |  |  |  |  column: 2
   |  |  |  |  |  |  |  offset: 25
   |  |  |  |  |  index: Latte\Compiler\Nodes\Php\Scalar\IntegerNode
   |  |  |  |  |  |  value: 0
   |  |  |  |  |  |  kind: 10
   |  |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  |  line: 4
   |  |  |  |  |  |  |  column: 5
   |  |  |  |  |  |  |  offset: 28
   |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  line: 4
   |  |  |  |  |  |  column: 2
   |  |  |  |  |  |  offset: 25
   |  |  |  position: Latte\Compiler\Position
   |  |  |  |  line: 4
   |  |  |  |  column: 1
   |  |  |  |  offset: 24
   |  |  key: null
   |  |  byRef: false
   |  |  position: Latte\Compiler\Position
   |  |  |  line: 4
   |  |  |  column: 1
   |  |  |  offset: 24
   |  |  unpack: false
   |  4 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Scalar\EncapsedStringNode
   |  |  |  parts: array (1)
   |  |  |  |  0 => Latte\Compiler\Nodes\Php\Expression\ArrayAccessNode
   |  |  |  |  |  expr: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  |  |  name: 'A'
   |  |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  |  line: 5
   |  |  |  |  |  |  |  column: 2
   |  |  |  |  |  |  |  offset: 34
   |  |  |  |  |  index: Latte\Compiler\Nodes\Php\Scalar\IntegerNode
   |  |  |  |  |  |  value: 1234
   |  |  |  |  |  |  kind: 10
   |  |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  |  line: 5
   |  |  |  |  |  |  |  column: 5
   |  |  |  |  |  |  |  offset: 37
   |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  line: 5
   |  |  |  |  |  |  column: 2
   |  |  |  |  |  |  offset: 34
   |  |  |  position: Latte\Compiler\Position
   |  |  |  |  line: 5
   |  |  |  |  column: 1
   |  |  |  |  offset: 33
   |  |  key: null
   |  |  byRef: false
   |  |  position: Latte\Compiler\Position
   |  |  |  line: 5
   |  |  |  column: 1
   |  |  |  offset: 33
   |  |  unpack: false
   |  5 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Scalar\EncapsedStringNode
   |  |  |  parts: array (1)
   |  |  |  |  0 => Latte\Compiler\Nodes\Php\Expression\ArrayAccessNode
   |  |  |  |  |  expr: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  |  |  name: 'A'
   |  |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  |  line: 6
   |  |  |  |  |  |  |  column: 2
   |  |  |  |  |  |  |  offset: 46
   |  |  |  |  |  index: Latte\Compiler\Nodes\Php\Scalar\StringNode
   |  |  |  |  |  |  value: '9223372036854775808'
   |  |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  |  line: 6
   |  |  |  |  |  |  |  column: 5
   |  |  |  |  |  |  |  offset: 49
   |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  line: 6
   |  |  |  |  |  |  column: 2
   |  |  |  |  |  |  offset: 46
   |  |  |  position: Latte\Compiler\Position
   |  |  |  |  line: 6
   |  |  |  |  column: 1
   |  |  |  |  offset: 45
   |  |  key: null
   |  |  byRef: false
   |  |  position: Latte\Compiler\Position
   |  |  |  line: 6
   |  |  |  column: 1
   |  |  |  offset: 45
   |  |  unpack: false
   |  6 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Scalar\EncapsedStringNode
   |  |  |  parts: array (1)
   |  |  |  |  0 => Latte\Compiler\Nodes\Php\Expression\ArrayAccessNode
   |  |  |  |  |  expr: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  |  |  name: 'A'
   |  |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  |  line: 7
   |  |  |  |  |  |  |  column: 2
   |  |  |  |  |  |  |  offset: 73
   |  |  |  |  |  index: Latte\Compiler\Nodes\Php\Scalar\StringNode
   |  |  |  |  |  |  value: '000'
   |  |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  |  line: 7
   |  |  |  |  |  |  |  column: 5
   |  |  |  |  |  |  |  offset: 76
   |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  line: 7
   |  |  |  |  |  |  column: 2
   |  |  |  |  |  |  offset: 73
   |  |  |  position: Latte\Compiler\Position
   |  |  |  |  line: 7
   |  |  |  |  column: 1
   |  |  |  |  offset: 72
   |  |  key: null
   |  |  byRef: false
   |  |  position: Latte\Compiler\Position
   |  |  |  line: 7
   |  |  |  column: 1
   |  |  |  offset: 72
   |  |  unpack: false
   |  7 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Scalar\EncapsedStringNode
   |  |  |  parts: array (1)
   |  |  |  |  0 => Latte\Compiler\Nodes\Php\Expression\ArrayAccessNode
   |  |  |  |  |  expr: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  |  |  name: 'A'
   |  |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  |  line: 8
   |  |  |  |  |  |  |  column: 2
   |  |  |  |  |  |  |  offset: 84
   |  |  |  |  |  index: Latte\Compiler\Nodes\Php\Scalar\StringNode
   |  |  |  |  |  |  value: '0x0'
   |  |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  |  line: 8
   |  |  |  |  |  |  |  column: 5
   |  |  |  |  |  |  |  offset: 87
   |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  line: 8
   |  |  |  |  |  |  column: 2
   |  |  |  |  |  |  offset: 84
   |  |  |  position: Latte\Compiler\Position
   |  |  |  |  line: 8
   |  |  |  |  column: 1
   |  |  |  |  offset: 83
   |  |  key: null
   |  |  byRef: false
   |  |  position: Latte\Compiler\Position
   |  |  |  line: 8
   |  |  |  column: 1
   |  |  |  offset: 83
   |  |  unpack: false
   |  8 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Scalar\EncapsedStringNode
   |  |  |  parts: array (1)
   |  |  |  |  0 => Latte\Compiler\Nodes\Php\Expression\ArrayAccessNode
   |  |  |  |  |  expr: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  |  |  name: 'A'
   |  |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  |  line: 9
   |  |  |  |  |  |  |  column: 2
   |  |  |  |  |  |  |  offset: 95
   |  |  |  |  |  index: Latte\Compiler\Nodes\Php\Scalar\StringNode
   |  |  |  |  |  |  value: '0b0'
   |  |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  |  line: 9
   |  |  |  |  |  |  |  column: 5
   |  |  |  |  |  |  |  offset: 98
   |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  line: 9
   |  |  |  |  |  |  column: 2
   |  |  |  |  |  |  offset: 95
   |  |  |  position: Latte\Compiler\Position
   |  |  |  |  line: 9
   |  |  |  |  column: 1
   |  |  |  |  offset: 94
   |  |  key: null
   |  |  byRef: false
   |  |  position: Latte\Compiler\Position
   |  |  |  line: 9
   |  |  |  column: 1
   |  |  |  offset: 94
   |  |  unpack: false
   |  9 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Scalar\EncapsedStringNode
   |  |  |  parts: array (1)
   |  |  |  |  0 => Latte\Compiler\Nodes\Php\Expression\ArrayAccessNode
   |  |  |  |  |  expr: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  |  |  name: 'A'
   |  |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  |  line: 10
   |  |  |  |  |  |  |  column: 2
   |  |  |  |  |  |  |  offset: 106
   |  |  |  |  |  index: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  |  |  name: 'B'
   |  |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  |  line: 10
   |  |  |  |  |  |  |  column: 5
   |  |  |  |  |  |  |  offset: 109
   |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  line: 10
   |  |  |  |  |  |  column: 2
   |  |  |  |  |  |  offset: 106
   |  |  |  position: Latte\Compiler\Position
   |  |  |  |  line: 10
   |  |  |  |  column: 1
   |  |  |  |  offset: 105
   |  |  key: null
   |  |  byRef: false
   |  |  position: Latte\Compiler\Position
   |  |  |  line: 10
   |  |  |  column: 1
   |  |  |  offset: 105
   |  |  unpack: false
   |  10 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Scalar\EncapsedStringNode
   |  |  |  parts: array (1)
   |  |  |  |  0 => Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  |  name: 'A'
   |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  line: 11
   |  |  |  |  |  |  column: 3
   |  |  |  |  |  |  offset: 117
   |  |  |  position: Latte\Compiler\Position
   |  |  |  |  line: 11
   |  |  |  |  column: 1
   |  |  |  |  offset: 115
   |  |  key: null
   |  |  byRef: false
   |  |  position: Latte\Compiler\Position
   |  |  |  line: 11
   |  |  |  column: 1
   |  |  |  offset: 115
   |  |  unpack: false
   |  11 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Scalar\EncapsedStringNode
   |  |  |  parts: array (1)
   |  |  |  |  0 => Latte\Compiler\Nodes\Php\Expression\ArrayAccessNode
   |  |  |  |  |  expr: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  |  |  name: 'A'
   |  |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  |  line: 12
   |  |  |  |  |  |  |  column: 3
   |  |  |  |  |  |  |  offset: 125
   |  |  |  |  |  index: Latte\Compiler\Nodes\Php\Scalar\StringNode
   |  |  |  |  |  |  value: 'B'
   |  |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  |  line: 12
   |  |  |  |  |  |  |  column: 6
   |  |  |  |  |  |  |  offset: 128
   |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  line: 12
   |  |  |  |  |  |  column: 3
   |  |  |  |  |  |  offset: 125
   |  |  |  position: Latte\Compiler\Position
   |  |  |  |  line: 12
   |  |  |  |  column: 1
   |  |  |  |  offset: 123
   |  |  key: null
   |  |  byRef: false
   |  |  position: Latte\Compiler\Position
   |  |  |  line: 12
   |  |  |  column: 1
   |  |  |  offset: 123
   |  |  unpack: false
   |  12 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Scalar\EncapsedStringNode
   |  |  |  parts: array (3)
   |  |  |  |  0 => Latte\Compiler\Nodes\Php\Scalar\EncapsedStringPartNode
   |  |  |  |  |  value: '\{'
   |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  line: 13
   |  |  |  |  |  |  column: 2
   |  |  |  |  |  |  offset: 137
   |  |  |  |  1 => Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  |  name: 'A'
   |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  line: 13
   |  |  |  |  |  |  column: 4
   |  |  |  |  |  |  offset: 139
   |  |  |  |  2 => Latte\Compiler\Nodes\Php\Scalar\EncapsedStringPartNode
   |  |  |  |  |  value: '}'
   |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  line: 13
   |  |  |  |  |  |  column: 6
   |  |  |  |  |  |  offset: 141
   |  |  |  position: Latte\Compiler\Position
   |  |  |  |  line: 13
   |  |  |  |  column: 1
   |  |  |  |  offset: 136
   |  |  key: null
   |  |  byRef: false
   |  |  position: Latte\Compiler\Position
   |  |  |  line: 13
   |  |  |  column: 1
   |  |  |  offset: 136
   |  |  unpack: false
   |  13 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Scalar\EncapsedStringNode
   |  |  |  parts: array (3)
   |  |  |  |  0 => Latte\Compiler\Nodes\Php\Scalar\EncapsedStringPartNode
   |  |  |  |  |  value: '\{ '
   |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  line: 14
   |  |  |  |  |  |  column: 2
   |  |  |  |  |  |  offset: 146
   |  |  |  |  1 => Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  |  name: 'A'
   |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  line: 14
   |  |  |  |  |  |  column: 5
   |  |  |  |  |  |  offset: 149
   |  |  |  |  2 => Latte\Compiler\Nodes\Php\Scalar\EncapsedStringPartNode
   |  |  |  |  |  value: ' }'
   |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  line: 14
   |  |  |  |  |  |  column: 7
   |  |  |  |  |  |  offset: 151
   |  |  |  position: Latte\Compiler\Position
   |  |  |  |  line: 14
   |  |  |  |  column: 1
   |  |  |  |  offset: 145
   |  |  key: null
   |  |  byRef: false
   |  |  position: Latte\Compiler\Position
   |  |  |  line: 14
   |  |  |  column: 1
   |  |  |  offset: 145
   |  |  unpack: false
   |  14 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Scalar\EncapsedStringNode
   |  |  |  parts: array (2)
   |  |  |  |  0 => Latte\Compiler\Nodes\Php\Scalar\EncapsedStringPartNode
   |  |  |  |  |  value: '\'
   |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  line: 15
   |  |  |  |  |  |  column: 2
   |  |  |  |  |  |  offset: 157
   |  |  |  |  1 => Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  |  name: 'A'
   |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  line: 15
   |  |  |  |  |  |  column: 5
   |  |  |  |  |  |  offset: 160
   |  |  |  position: Latte\Compiler\Position
   |  |  |  |  line: 15
   |  |  |  |  column: 1
   |  |  |  |  offset: 156
   |  |  key: null
   |  |  byRef: false
   |  |  position: Latte\Compiler\Position
   |  |  |  line: 15
   |  |  |  column: 1
   |  |  |  offset: 156
   |  |  unpack: false
   |  15 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Scalar\EncapsedStringNode
   |  |  |  parts: array (3)
   |  |  |  |  0 => Latte\Compiler\Nodes\Php\Scalar\EncapsedStringPartNode
   |  |  |  |  |  value: '\{ '
   |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  line: 16
   |  |  |  |  |  |  column: 2
   |  |  |  |  |  |  offset: 167
   |  |  |  |  1 => Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  |  name: 'A'
   |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  line: 16
   |  |  |  |  |  |  column: 6
   |  |  |  |  |  |  offset: 171
   |  |  |  |  2 => Latte\Compiler\Nodes\Php\Scalar\EncapsedStringPartNode
   |  |  |  |  |  value: ' }'
   |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  line: 16
   |  |  |  |  |  |  column: 8
   |  |  |  |  |  |  offset: 173
   |  |  |  position: Latte\Compiler\Position
   |  |  |  |  line: 16
   |  |  |  |  column: 1
   |  |  |  |  offset: 166
   |  |  key: null
   |  |  byRef: false
   |  |  position: Latte\Compiler\Position
   |  |  |  line: 16
   |  |  |  column: 1
   |  |  |  offset: 166
   |  |  unpack: false
   |  16 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Scalar\EncapsedStringNode
   |  |  |  parts: array (2)
   |  |  |  |  0 => Latte\Compiler\Nodes\Php\Scalar\EncapsedStringPartNode
   |  |  |  |  |  value: '$'
   |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  line: 17
   |  |  |  |  |  |  column: 2
   |  |  |  |  |  |  offset: 179
   |  |  |  |  1 => Latte\Compiler\Nodes\Php\Expression\ArrayAccessNode
   |  |  |  |  |  expr: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  |  |  name: 'A'
   |  |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  |  line: 17
   |  |  |  |  |  |  |  column: 3
   |  |  |  |  |  |  |  offset: 180
   |  |  |  |  |  index: Latte\Compiler\Nodes\Php\Scalar\StringNode
   |  |  |  |  |  |  value: 'B'
   |  |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  |  line: 17
   |  |  |  |  |  |  |  column: 6
   |  |  |  |  |  |  |  offset: 183
   |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  line: 17
   |  |  |  |  |  |  column: 3
   |  |  |  |  |  |  offset: 180
   |  |  |  position: Latte\Compiler\Position
   |  |  |  |  line: 17
   |  |  |  |  column: 1
   |  |  |  |  offset: 178
   |  |  key: null
   |  |  byRef: false
   |  |  position: Latte\Compiler\Position
   |  |  |  line: 17
   |  |  |  column: 1
   |  |  |  offset: 178
   |  |  unpack: false
   |  17 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Scalar\EncapsedStringNode
   |  |  |  parts: array (3)
   |  |  |  |  0 => Latte\Compiler\Nodes\Php\Scalar\EncapsedStringPartNode
   |  |  |  |  |  value: 'A '
   |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  line: 18
   |  |  |  |  |  |  column: 2
   |  |  |  |  |  |  offset: 189
   |  |  |  |  1 => Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  |  name: 'B'
   |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  line: 18
   |  |  |  |  |  |  column: 4
   |  |  |  |  |  |  offset: 191
   |  |  |  |  2 => Latte\Compiler\Nodes\Php\Scalar\EncapsedStringPartNode
   |  |  |  |  |  value: ' C'
   |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  line: 18
   |  |  |  |  |  |  column: 6
   |  |  |  |  |  |  offset: 193
   |  |  |  position: Latte\Compiler\Position
   |  |  |  |  line: 18
   |  |  |  |  column: 1
   |  |  |  |  offset: 188
   |  |  key: null
   |  |  byRef: false
   |  |  position: Latte\Compiler\Position
   |  |  |  line: 18
   |  |  |  column: 1
   |  |  |  offset: 188
   |  |  unpack: false
   position: null
