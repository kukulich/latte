<?php

// Dereferencing of constants

declare(strict_types=1);

use Tester\Assert;

require __DIR__ . '/../bootstrap.php';

$test = <<<'XX'
	A->length,
	A->length(),
	A[0],
	A[0][1][2],

	A::B[0],
	A::B[0][1][2],
	A::B->length,
	A::B->length(),
	A::B::C,
	A::B::$c,
	A::B::c(),

	__FUNCTION__[0],
	__FUNCTION__->length,
	__FUNCIONT__->length(),
	XX;

$node = parseCode($test);

Assert::same(
	loadContent(__FILE__, __COMPILER_HALT_OFFSET__),
	exportNode($node),
);

__halt_compiler();
Latte\Compiler\Nodes\Php\Expression\ArrayNode
   items: array (14)
   |  0 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Expression\PropertyFetchNode
   |  |  |  name: Latte\Compiler\Nodes\Php\IdentifierNode
   |  |  |  |  name: 'length'
   |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  line: 1
   |  |  |  |  |  column: 4
   |  |  |  |  |  offset: 3
   |  |  |  object: Latte\Compiler\Nodes\Php\Expression\ConstantFetchNode
   |  |  |  |  name: Latte\Compiler\Nodes\Php\NameNode
   |  |  |  |  |  parts: array (1)
   |  |  |  |  |  |  0 => 'A'
   |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  line: 1
   |  |  |  |  |  |  column: 1
   |  |  |  |  |  |  offset: 0
   |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  line: 1
   |  |  |  |  |  column: 1
   |  |  |  |  |  offset: 0
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
   |  |  value: Latte\Compiler\Nodes\Php\Expression\MethodCallNode
   |  |  |  object: Latte\Compiler\Nodes\Php\Expression\ConstantFetchNode
   |  |  |  |  name: Latte\Compiler\Nodes\Php\NameNode
   |  |  |  |  |  parts: array (1)
   |  |  |  |  |  |  0 => 'A'
   |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  line: 2
   |  |  |  |  |  |  column: 1
   |  |  |  |  |  |  offset: 11
   |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  line: 2
   |  |  |  |  |  column: 1
   |  |  |  |  |  offset: 11
   |  |  |  name: Latte\Compiler\Nodes\Php\IdentifierNode
   |  |  |  |  name: 'length'
   |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  line: 2
   |  |  |  |  |  column: 4
   |  |  |  |  |  offset: 14
   |  |  |  args: array (0)
   |  |  |  position: Latte\Compiler\Position
   |  |  |  |  line: 2
   |  |  |  |  column: 1
   |  |  |  |  offset: 11
   |  |  key: null
   |  |  byRef: false
   |  |  position: Latte\Compiler\Position
   |  |  |  line: 2
   |  |  |  column: 1
   |  |  |  offset: 11
   |  |  unpack: false
   |  2 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Expression\ArrayAccessNode
   |  |  |  expr: Latte\Compiler\Nodes\Php\Expression\ConstantFetchNode
   |  |  |  |  name: Latte\Compiler\Nodes\Php\NameNode
   |  |  |  |  |  parts: array (1)
   |  |  |  |  |  |  0 => 'A'
   |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  line: 3
   |  |  |  |  |  |  column: 1
   |  |  |  |  |  |  offset: 24
   |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  line: 3
   |  |  |  |  |  column: 1
   |  |  |  |  |  offset: 24
   |  |  |  index: Latte\Compiler\Nodes\Php\Scalar\IntegerNode
   |  |  |  |  value: 0
   |  |  |  |  kind: 10
   |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  line: 3
   |  |  |  |  |  column: 3
   |  |  |  |  |  offset: 26
   |  |  |  position: Latte\Compiler\Position
   |  |  |  |  line: 3
   |  |  |  |  column: 1
   |  |  |  |  offset: 24
   |  |  key: null
   |  |  byRef: false
   |  |  position: Latte\Compiler\Position
   |  |  |  line: 3
   |  |  |  column: 1
   |  |  |  offset: 24
   |  |  unpack: false
   |  3 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Expression\ArrayAccessNode
   |  |  |  expr: Latte\Compiler\Nodes\Php\Expression\ArrayAccessNode
   |  |  |  |  expr: Latte\Compiler\Nodes\Php\Expression\ArrayAccessNode
   |  |  |  |  |  expr: Latte\Compiler\Nodes\Php\Expression\ConstantFetchNode
   |  |  |  |  |  |  name: Latte\Compiler\Nodes\Php\NameNode
   |  |  |  |  |  |  |  parts: array (1)
   |  |  |  |  |  |  |  |  0 => 'A'
   |  |  |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  |  |  line: 4
   |  |  |  |  |  |  |  |  column: 1
   |  |  |  |  |  |  |  |  offset: 30
   |  |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  |  line: 4
   |  |  |  |  |  |  |  column: 1
   |  |  |  |  |  |  |  offset: 30
   |  |  |  |  |  index: Latte\Compiler\Nodes\Php\Scalar\IntegerNode
   |  |  |  |  |  |  value: 0
   |  |  |  |  |  |  kind: 10
   |  |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  |  line: 4
   |  |  |  |  |  |  |  column: 3
   |  |  |  |  |  |  |  offset: 32
   |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  line: 4
   |  |  |  |  |  |  column: 1
   |  |  |  |  |  |  offset: 30
   |  |  |  |  index: Latte\Compiler\Nodes\Php\Scalar\IntegerNode
   |  |  |  |  |  value: 1
   |  |  |  |  |  kind: 10
   |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  line: 4
   |  |  |  |  |  |  column: 6
   |  |  |  |  |  |  offset: 35
   |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  line: 4
   |  |  |  |  |  column: 1
   |  |  |  |  |  offset: 30
   |  |  |  index: Latte\Compiler\Nodes\Php\Scalar\IntegerNode
   |  |  |  |  value: 2
   |  |  |  |  kind: 10
   |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  line: 4
   |  |  |  |  |  column: 9
   |  |  |  |  |  offset: 38
   |  |  |  position: Latte\Compiler\Position
   |  |  |  |  line: 4
   |  |  |  |  column: 1
   |  |  |  |  offset: 30
   |  |  key: null
   |  |  byRef: false
   |  |  position: Latte\Compiler\Position
   |  |  |  line: 4
   |  |  |  column: 1
   |  |  |  offset: 30
   |  |  unpack: false
   |  4 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Expression\ArrayAccessNode
   |  |  |  expr: Latte\Compiler\Nodes\Php\Expression\ClassConstantFetchNode
   |  |  |  |  class: Latte\Compiler\Nodes\Php\NameNode
   |  |  |  |  |  parts: array (1)
   |  |  |  |  |  |  0 => 'A'
   |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  line: 6
   |  |  |  |  |  |  column: 1
   |  |  |  |  |  |  offset: 43
   |  |  |  |  name: Latte\Compiler\Nodes\Php\IdentifierNode
   |  |  |  |  |  name: 'B'
   |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  line: 6
   |  |  |  |  |  |  column: 4
   |  |  |  |  |  |  offset: 46
   |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  line: 6
   |  |  |  |  |  column: 1
   |  |  |  |  |  offset: 43
   |  |  |  index: Latte\Compiler\Nodes\Php\Scalar\IntegerNode
   |  |  |  |  value: 0
   |  |  |  |  kind: 10
   |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  line: 6
   |  |  |  |  |  column: 6
   |  |  |  |  |  offset: 48
   |  |  |  position: Latte\Compiler\Position
   |  |  |  |  line: 6
   |  |  |  |  column: 1
   |  |  |  |  offset: 43
   |  |  key: null
   |  |  byRef: false
   |  |  position: Latte\Compiler\Position
   |  |  |  line: 6
   |  |  |  column: 1
   |  |  |  offset: 43
   |  |  unpack: false
   |  5 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Expression\ArrayAccessNode
   |  |  |  expr: Latte\Compiler\Nodes\Php\Expression\ArrayAccessNode
   |  |  |  |  expr: Latte\Compiler\Nodes\Php\Expression\ArrayAccessNode
   |  |  |  |  |  expr: Latte\Compiler\Nodes\Php\Expression\ClassConstantFetchNode
   |  |  |  |  |  |  class: Latte\Compiler\Nodes\Php\NameNode
   |  |  |  |  |  |  |  parts: array (1)
   |  |  |  |  |  |  |  |  0 => 'A'
   |  |  |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  |  |  line: 7
   |  |  |  |  |  |  |  |  column: 1
   |  |  |  |  |  |  |  |  offset: 52
   |  |  |  |  |  |  name: Latte\Compiler\Nodes\Php\IdentifierNode
   |  |  |  |  |  |  |  name: 'B'
   |  |  |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  |  |  line: 7
   |  |  |  |  |  |  |  |  column: 4
   |  |  |  |  |  |  |  |  offset: 55
   |  |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  |  line: 7
   |  |  |  |  |  |  |  column: 1
   |  |  |  |  |  |  |  offset: 52
   |  |  |  |  |  index: Latte\Compiler\Nodes\Php\Scalar\IntegerNode
   |  |  |  |  |  |  value: 0
   |  |  |  |  |  |  kind: 10
   |  |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  |  line: 7
   |  |  |  |  |  |  |  column: 6
   |  |  |  |  |  |  |  offset: 57
   |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  line: 7
   |  |  |  |  |  |  column: 1
   |  |  |  |  |  |  offset: 52
   |  |  |  |  index: Latte\Compiler\Nodes\Php\Scalar\IntegerNode
   |  |  |  |  |  value: 1
   |  |  |  |  |  kind: 10
   |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  line: 7
   |  |  |  |  |  |  column: 9
   |  |  |  |  |  |  offset: 60
   |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  line: 7
   |  |  |  |  |  column: 1
   |  |  |  |  |  offset: 52
   |  |  |  index: Latte\Compiler\Nodes\Php\Scalar\IntegerNode
   |  |  |  |  value: 2
   |  |  |  |  kind: 10
   |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  line: 7
   |  |  |  |  |  column: 12
   |  |  |  |  |  offset: 63
   |  |  |  position: Latte\Compiler\Position
   |  |  |  |  line: 7
   |  |  |  |  column: 1
   |  |  |  |  offset: 52
   |  |  key: null
   |  |  byRef: false
   |  |  position: Latte\Compiler\Position
   |  |  |  line: 7
   |  |  |  column: 1
   |  |  |  offset: 52
   |  |  unpack: false
   |  6 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Expression\PropertyFetchNode
   |  |  |  name: Latte\Compiler\Nodes\Php\IdentifierNode
   |  |  |  |  name: 'length'
   |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  line: 8
   |  |  |  |  |  column: 7
   |  |  |  |  |  offset: 73
   |  |  |  object: Latte\Compiler\Nodes\Php\Expression\ClassConstantFetchNode
   |  |  |  |  class: Latte\Compiler\Nodes\Php\NameNode
   |  |  |  |  |  parts: array (1)
   |  |  |  |  |  |  0 => 'A'
   |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  line: 8
   |  |  |  |  |  |  column: 1
   |  |  |  |  |  |  offset: 67
   |  |  |  |  name: Latte\Compiler\Nodes\Php\IdentifierNode
   |  |  |  |  |  name: 'B'
   |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  line: 8
   |  |  |  |  |  |  column: 4
   |  |  |  |  |  |  offset: 70
   |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  line: 8
   |  |  |  |  |  column: 1
   |  |  |  |  |  offset: 67
   |  |  |  position: Latte\Compiler\Position
   |  |  |  |  line: 8
   |  |  |  |  column: 1
   |  |  |  |  offset: 67
   |  |  key: null
   |  |  byRef: false
   |  |  position: Latte\Compiler\Position
   |  |  |  line: 8
   |  |  |  column: 1
   |  |  |  offset: 67
   |  |  unpack: false
   |  7 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Expression\MethodCallNode
   |  |  |  object: Latte\Compiler\Nodes\Php\Expression\ClassConstantFetchNode
   |  |  |  |  class: Latte\Compiler\Nodes\Php\NameNode
   |  |  |  |  |  parts: array (1)
   |  |  |  |  |  |  0 => 'A'
   |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  line: 9
   |  |  |  |  |  |  column: 1
   |  |  |  |  |  |  offset: 81
   |  |  |  |  name: Latte\Compiler\Nodes\Php\IdentifierNode
   |  |  |  |  |  name: 'B'
   |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  line: 9
   |  |  |  |  |  |  column: 4
   |  |  |  |  |  |  offset: 84
   |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  line: 9
   |  |  |  |  |  column: 1
   |  |  |  |  |  offset: 81
   |  |  |  name: Latte\Compiler\Nodes\Php\IdentifierNode
   |  |  |  |  name: 'length'
   |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  line: 9
   |  |  |  |  |  column: 7
   |  |  |  |  |  offset: 87
   |  |  |  args: array (0)
   |  |  |  position: Latte\Compiler\Position
   |  |  |  |  line: 9
   |  |  |  |  column: 1
   |  |  |  |  offset: 81
   |  |  key: null
   |  |  byRef: false
   |  |  position: Latte\Compiler\Position
   |  |  |  line: 9
   |  |  |  column: 1
   |  |  |  offset: 81
   |  |  unpack: false
   |  8 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Expression\ClassConstantFetchNode
   |  |  |  class: Latte\Compiler\Nodes\Php\Expression\ClassConstantFetchNode
   |  |  |  |  class: Latte\Compiler\Nodes\Php\NameNode
   |  |  |  |  |  parts: array (1)
   |  |  |  |  |  |  0 => 'A'
   |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  line: 10
   |  |  |  |  |  |  column: 1
   |  |  |  |  |  |  offset: 97
   |  |  |  |  name: Latte\Compiler\Nodes\Php\IdentifierNode
   |  |  |  |  |  name: 'B'
   |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  line: 10
   |  |  |  |  |  |  column: 4
   |  |  |  |  |  |  offset: 100
   |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  line: 10
   |  |  |  |  |  column: 1
   |  |  |  |  |  offset: 97
   |  |  |  name: Latte\Compiler\Nodes\Php\IdentifierNode
   |  |  |  |  name: 'C'
   |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  line: 10
   |  |  |  |  |  column: 7
   |  |  |  |  |  offset: 103
   |  |  |  position: Latte\Compiler\Position
   |  |  |  |  line: 10
   |  |  |  |  column: 1
   |  |  |  |  offset: 97
   |  |  key: null
   |  |  byRef: false
   |  |  position: Latte\Compiler\Position
   |  |  |  line: 10
   |  |  |  column: 1
   |  |  |  offset: 97
   |  |  unpack: false
   |  9 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Expression\StaticPropertyFetchNode
   |  |  |  name: Latte\Compiler\Nodes\Php\VarLikeIdentifierNode
   |  |  |  |  name: 'c'
   |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  line: 11
   |  |  |  |  |  column: 7
   |  |  |  |  |  offset: 112
   |  |  |  class: Latte\Compiler\Nodes\Php\Expression\ClassConstantFetchNode
   |  |  |  |  class: Latte\Compiler\Nodes\Php\NameNode
   |  |  |  |  |  parts: array (1)
   |  |  |  |  |  |  0 => 'A'
   |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  line: 11
   |  |  |  |  |  |  column: 1
   |  |  |  |  |  |  offset: 106
   |  |  |  |  name: Latte\Compiler\Nodes\Php\IdentifierNode
   |  |  |  |  |  name: 'B'
   |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  line: 11
   |  |  |  |  |  |  column: 4
   |  |  |  |  |  |  offset: 109
   |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  line: 11
   |  |  |  |  |  column: 1
   |  |  |  |  |  offset: 106
   |  |  |  position: Latte\Compiler\Position
   |  |  |  |  line: 11
   |  |  |  |  column: 1
   |  |  |  |  offset: 106
   |  |  key: null
   |  |  byRef: false
   |  |  position: Latte\Compiler\Position
   |  |  |  line: 11
   |  |  |  column: 1
   |  |  |  offset: 106
   |  |  unpack: false
   |  10 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Expression\StaticCallNode
   |  |  |  class: Latte\Compiler\Nodes\Php\Expression\ClassConstantFetchNode
   |  |  |  |  class: Latte\Compiler\Nodes\Php\NameNode
   |  |  |  |  |  parts: array (1)
   |  |  |  |  |  |  0 => 'A'
   |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  line: 12
   |  |  |  |  |  |  column: 1
   |  |  |  |  |  |  offset: 116
   |  |  |  |  name: Latte\Compiler\Nodes\Php\IdentifierNode
   |  |  |  |  |  name: 'B'
   |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  line: 12
   |  |  |  |  |  |  column: 4
   |  |  |  |  |  |  offset: 119
   |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  line: 12
   |  |  |  |  |  column: 1
   |  |  |  |  |  offset: 116
   |  |  |  name: Latte\Compiler\Nodes\Php\IdentifierNode
   |  |  |  |  name: 'c'
   |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  line: 12
   |  |  |  |  |  column: 7
   |  |  |  |  |  offset: 122
   |  |  |  args: array (0)
   |  |  |  position: Latte\Compiler\Position
   |  |  |  |  line: 12
   |  |  |  |  column: 1
   |  |  |  |  offset: 116
   |  |  key: null
   |  |  byRef: false
   |  |  position: Latte\Compiler\Position
   |  |  |  line: 12
   |  |  |  column: 1
   |  |  |  offset: 116
   |  |  unpack: false
   |  11 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Expression\ArrayAccessNode
   |  |  |  expr: Latte\Compiler\Nodes\Php\Expression\ConstantFetchNode
   |  |  |  |  name: Latte\Compiler\Nodes\Php\NameNode
   |  |  |  |  |  parts: array (1)
   |  |  |  |  |  |  0 => '__FUNCTION__'
   |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  line: 14
   |  |  |  |  |  |  column: 1
   |  |  |  |  |  |  offset: 128
   |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  line: 14
   |  |  |  |  |  column: 1
   |  |  |  |  |  offset: 128
   |  |  |  index: Latte\Compiler\Nodes\Php\Scalar\IntegerNode
   |  |  |  |  value: 0
   |  |  |  |  kind: 10
   |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  line: 14
   |  |  |  |  |  column: 14
   |  |  |  |  |  offset: 141
   |  |  |  position: Latte\Compiler\Position
   |  |  |  |  line: 14
   |  |  |  |  column: 1
   |  |  |  |  offset: 128
   |  |  key: null
   |  |  byRef: false
   |  |  position: Latte\Compiler\Position
   |  |  |  line: 14
   |  |  |  column: 1
   |  |  |  offset: 128
   |  |  unpack: false
   |  12 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Expression\PropertyFetchNode
   |  |  |  name: Latte\Compiler\Nodes\Php\IdentifierNode
   |  |  |  |  name: 'length'
   |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  line: 15
   |  |  |  |  |  column: 15
   |  |  |  |  |  offset: 159
   |  |  |  object: Latte\Compiler\Nodes\Php\Expression\ConstantFetchNode
   |  |  |  |  name: Latte\Compiler\Nodes\Php\NameNode
   |  |  |  |  |  parts: array (1)
   |  |  |  |  |  |  0 => '__FUNCTION__'
   |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  line: 15
   |  |  |  |  |  |  column: 1
   |  |  |  |  |  |  offset: 145
   |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  line: 15
   |  |  |  |  |  column: 1
   |  |  |  |  |  offset: 145
   |  |  |  position: Latte\Compiler\Position
   |  |  |  |  line: 15
   |  |  |  |  column: 1
   |  |  |  |  offset: 145
   |  |  key: null
   |  |  byRef: false
   |  |  position: Latte\Compiler\Position
   |  |  |  line: 15
   |  |  |  column: 1
   |  |  |  offset: 145
   |  |  unpack: false
   |  13 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Expression\MethodCallNode
   |  |  |  object: Latte\Compiler\Nodes\Php\Expression\ConstantFetchNode
   |  |  |  |  name: Latte\Compiler\Nodes\Php\NameNode
   |  |  |  |  |  parts: array (1)
   |  |  |  |  |  |  0 => '__FUNCIONT__'
   |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  line: 16
   |  |  |  |  |  |  column: 1
   |  |  |  |  |  |  offset: 167
   |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  line: 16
   |  |  |  |  |  column: 1
   |  |  |  |  |  offset: 167
   |  |  |  name: Latte\Compiler\Nodes\Php\IdentifierNode
   |  |  |  |  name: 'length'
   |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  line: 16
   |  |  |  |  |  column: 15
   |  |  |  |  |  offset: 181
   |  |  |  args: array (0)
   |  |  |  position: Latte\Compiler\Position
   |  |  |  |  line: 16
   |  |  |  |  column: 1
   |  |  |  |  offset: 167
   |  |  key: null
   |  |  byRef: false
   |  |  position: Latte\Compiler\Position
   |  |  |  line: 16
   |  |  |  column: 1
   |  |  |  offset: 167
   |  |  unpack: false
   position: null
