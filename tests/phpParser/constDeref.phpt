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
   |  |  |  |  startLine: 1
   |  |  |  |  endLine: null
   |  |  |  var: Latte\Compiler\Nodes\Php\Expression\ConstantFetchNode
   |  |  |  |  name: Latte\Compiler\Nodes\Php\NameNode
   |  |  |  |  |  parts: array (1)
   |  |  |  |  |  |  0 => 'A'
   |  |  |  |  |  startLine: 1
   |  |  |  |  |  endLine: null
   |  |  |  |  startLine: 1
   |  |  |  |  endLine: null
   |  |  |  startLine: 1
   |  |  |  endLine: null
   |  |  key: null
   |  |  byRef: false
   |  |  startLine: 1
   |  |  unpack: false
   |  |  endLine: null
   |  1 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Expression\MethodCallNode
   |  |  |  var: Latte\Compiler\Nodes\Php\Expression\ConstantFetchNode
   |  |  |  |  name: Latte\Compiler\Nodes\Php\NameNode
   |  |  |  |  |  parts: array (1)
   |  |  |  |  |  |  0 => 'A'
   |  |  |  |  |  startLine: 2
   |  |  |  |  |  endLine: null
   |  |  |  |  startLine: 2
   |  |  |  |  endLine: null
   |  |  |  name: Latte\Compiler\Nodes\Php\IdentifierNode
   |  |  |  |  name: 'length'
   |  |  |  |  startLine: 2
   |  |  |  |  endLine: null
   |  |  |  args: array (0)
   |  |  |  startLine: 2
   |  |  |  endLine: null
   |  |  key: null
   |  |  byRef: false
   |  |  startLine: 2
   |  |  unpack: false
   |  |  endLine: null
   |  2 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Expression\ArrayAccessNode
   |  |  |  var: Latte\Compiler\Nodes\Php\Expression\ConstantFetchNode
   |  |  |  |  name: Latte\Compiler\Nodes\Php\NameNode
   |  |  |  |  |  parts: array (1)
   |  |  |  |  |  |  0 => 'A'
   |  |  |  |  |  startLine: 3
   |  |  |  |  |  endLine: null
   |  |  |  |  startLine: 3
   |  |  |  |  endLine: null
   |  |  |  index: Latte\Compiler\Nodes\Php\Scalar\IntegerNode
   |  |  |  |  value: 0
   |  |  |  |  kind: 10
   |  |  |  |  startLine: 3
   |  |  |  |  endLine: null
   |  |  |  startLine: 3
   |  |  |  endLine: null
   |  |  key: null
   |  |  byRef: false
   |  |  startLine: 3
   |  |  unpack: false
   |  |  endLine: null
   |  3 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Expression\ArrayAccessNode
   |  |  |  var: Latte\Compiler\Nodes\Php\Expression\ArrayAccessNode
   |  |  |  |  var: Latte\Compiler\Nodes\Php\Expression\ArrayAccessNode
   |  |  |  |  |  var: Latte\Compiler\Nodes\Php\Expression\ConstantFetchNode
   |  |  |  |  |  |  name: Latte\Compiler\Nodes\Php\NameNode
   |  |  |  |  |  |  |  parts: array (1)
   |  |  |  |  |  |  |  |  0 => 'A'
   |  |  |  |  |  |  |  startLine: 4
   |  |  |  |  |  |  |  endLine: null
   |  |  |  |  |  |  startLine: 4
   |  |  |  |  |  |  endLine: null
   |  |  |  |  |  index: Latte\Compiler\Nodes\Php\Scalar\IntegerNode
   |  |  |  |  |  |  value: 0
   |  |  |  |  |  |  kind: 10
   |  |  |  |  |  |  startLine: 4
   |  |  |  |  |  |  endLine: null
   |  |  |  |  |  startLine: 4
   |  |  |  |  |  endLine: null
   |  |  |  |  index: Latte\Compiler\Nodes\Php\Scalar\IntegerNode
   |  |  |  |  |  value: 1
   |  |  |  |  |  kind: 10
   |  |  |  |  |  startLine: 4
   |  |  |  |  |  endLine: null
   |  |  |  |  startLine: 4
   |  |  |  |  endLine: null
   |  |  |  index: Latte\Compiler\Nodes\Php\Scalar\IntegerNode
   |  |  |  |  value: 2
   |  |  |  |  kind: 10
   |  |  |  |  startLine: 4
   |  |  |  |  endLine: null
   |  |  |  startLine: 4
   |  |  |  endLine: null
   |  |  key: null
   |  |  byRef: false
   |  |  startLine: 4
   |  |  unpack: false
   |  |  endLine: null
   |  4 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Expression\ArrayAccessNode
   |  |  |  var: Latte\Compiler\Nodes\Php\Expression\ClassConstantFetchNode
   |  |  |  |  class: Latte\Compiler\Nodes\Php\NameNode
   |  |  |  |  |  parts: array (1)
   |  |  |  |  |  |  0 => 'A'
   |  |  |  |  |  startLine: 6
   |  |  |  |  |  endLine: null
   |  |  |  |  name: Latte\Compiler\Nodes\Php\IdentifierNode
   |  |  |  |  |  name: 'B'
   |  |  |  |  |  startLine: 6
   |  |  |  |  |  endLine: null
   |  |  |  |  startLine: 6
   |  |  |  |  endLine: null
   |  |  |  index: Latte\Compiler\Nodes\Php\Scalar\IntegerNode
   |  |  |  |  value: 0
   |  |  |  |  kind: 10
   |  |  |  |  startLine: 6
   |  |  |  |  endLine: null
   |  |  |  startLine: 6
   |  |  |  endLine: null
   |  |  key: null
   |  |  byRef: false
   |  |  startLine: 6
   |  |  unpack: false
   |  |  endLine: null
   |  5 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Expression\ArrayAccessNode
   |  |  |  var: Latte\Compiler\Nodes\Php\Expression\ArrayAccessNode
   |  |  |  |  var: Latte\Compiler\Nodes\Php\Expression\ArrayAccessNode
   |  |  |  |  |  var: Latte\Compiler\Nodes\Php\Expression\ClassConstantFetchNode
   |  |  |  |  |  |  class: Latte\Compiler\Nodes\Php\NameNode
   |  |  |  |  |  |  |  parts: array (1)
   |  |  |  |  |  |  |  |  0 => 'A'
   |  |  |  |  |  |  |  startLine: 7
   |  |  |  |  |  |  |  endLine: null
   |  |  |  |  |  |  name: Latte\Compiler\Nodes\Php\IdentifierNode
   |  |  |  |  |  |  |  name: 'B'
   |  |  |  |  |  |  |  startLine: 7
   |  |  |  |  |  |  |  endLine: null
   |  |  |  |  |  |  startLine: 7
   |  |  |  |  |  |  endLine: null
   |  |  |  |  |  index: Latte\Compiler\Nodes\Php\Scalar\IntegerNode
   |  |  |  |  |  |  value: 0
   |  |  |  |  |  |  kind: 10
   |  |  |  |  |  |  startLine: 7
   |  |  |  |  |  |  endLine: null
   |  |  |  |  |  startLine: 7
   |  |  |  |  |  endLine: null
   |  |  |  |  index: Latte\Compiler\Nodes\Php\Scalar\IntegerNode
   |  |  |  |  |  value: 1
   |  |  |  |  |  kind: 10
   |  |  |  |  |  startLine: 7
   |  |  |  |  |  endLine: null
   |  |  |  |  startLine: 7
   |  |  |  |  endLine: null
   |  |  |  index: Latte\Compiler\Nodes\Php\Scalar\IntegerNode
   |  |  |  |  value: 2
   |  |  |  |  kind: 10
   |  |  |  |  startLine: 7
   |  |  |  |  endLine: null
   |  |  |  startLine: 7
   |  |  |  endLine: null
   |  |  key: null
   |  |  byRef: false
   |  |  startLine: 7
   |  |  unpack: false
   |  |  endLine: null
   |  6 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Expression\PropertyFetchNode
   |  |  |  name: Latte\Compiler\Nodes\Php\IdentifierNode
   |  |  |  |  name: 'length'
   |  |  |  |  startLine: 8
   |  |  |  |  endLine: null
   |  |  |  var: Latte\Compiler\Nodes\Php\Expression\ClassConstantFetchNode
   |  |  |  |  class: Latte\Compiler\Nodes\Php\NameNode
   |  |  |  |  |  parts: array (1)
   |  |  |  |  |  |  0 => 'A'
   |  |  |  |  |  startLine: 8
   |  |  |  |  |  endLine: null
   |  |  |  |  name: Latte\Compiler\Nodes\Php\IdentifierNode
   |  |  |  |  |  name: 'B'
   |  |  |  |  |  startLine: 8
   |  |  |  |  |  endLine: null
   |  |  |  |  startLine: 8
   |  |  |  |  endLine: null
   |  |  |  startLine: 8
   |  |  |  endLine: null
   |  |  key: null
   |  |  byRef: false
   |  |  startLine: 8
   |  |  unpack: false
   |  |  endLine: null
   |  7 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Expression\MethodCallNode
   |  |  |  var: Latte\Compiler\Nodes\Php\Expression\ClassConstantFetchNode
   |  |  |  |  class: Latte\Compiler\Nodes\Php\NameNode
   |  |  |  |  |  parts: array (1)
   |  |  |  |  |  |  0 => 'A'
   |  |  |  |  |  startLine: 9
   |  |  |  |  |  endLine: null
   |  |  |  |  name: Latte\Compiler\Nodes\Php\IdentifierNode
   |  |  |  |  |  name: 'B'
   |  |  |  |  |  startLine: 9
   |  |  |  |  |  endLine: null
   |  |  |  |  startLine: 9
   |  |  |  |  endLine: null
   |  |  |  name: Latte\Compiler\Nodes\Php\IdentifierNode
   |  |  |  |  name: 'length'
   |  |  |  |  startLine: 9
   |  |  |  |  endLine: null
   |  |  |  args: array (0)
   |  |  |  startLine: 9
   |  |  |  endLine: null
   |  |  key: null
   |  |  byRef: false
   |  |  startLine: 9
   |  |  unpack: false
   |  |  endLine: null
   |  8 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Expression\ClassConstantFetchNode
   |  |  |  class: Latte\Compiler\Nodes\Php\Expression\ClassConstantFetchNode
   |  |  |  |  class: Latte\Compiler\Nodes\Php\NameNode
   |  |  |  |  |  parts: array (1)
   |  |  |  |  |  |  0 => 'A'
   |  |  |  |  |  startLine: 10
   |  |  |  |  |  endLine: null
   |  |  |  |  name: Latte\Compiler\Nodes\Php\IdentifierNode
   |  |  |  |  |  name: 'B'
   |  |  |  |  |  startLine: 10
   |  |  |  |  |  endLine: null
   |  |  |  |  startLine: 10
   |  |  |  |  endLine: null
   |  |  |  name: Latte\Compiler\Nodes\Php\IdentifierNode
   |  |  |  |  name: 'C'
   |  |  |  |  startLine: 10
   |  |  |  |  endLine: null
   |  |  |  startLine: 10
   |  |  |  endLine: null
   |  |  key: null
   |  |  byRef: false
   |  |  startLine: 10
   |  |  unpack: false
   |  |  endLine: null
   |  9 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Expression\StaticPropertyFetchNode
   |  |  |  name: Latte\Compiler\Nodes\Php\VarLikeIdentifierNode
   |  |  |  |  name: 'c'
   |  |  |  |  startLine: 11
   |  |  |  |  endLine: null
   |  |  |  class: Latte\Compiler\Nodes\Php\Expression\ClassConstantFetchNode
   |  |  |  |  class: Latte\Compiler\Nodes\Php\NameNode
   |  |  |  |  |  parts: array (1)
   |  |  |  |  |  |  0 => 'A'
   |  |  |  |  |  startLine: 11
   |  |  |  |  |  endLine: null
   |  |  |  |  name: Latte\Compiler\Nodes\Php\IdentifierNode
   |  |  |  |  |  name: 'B'
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
   |  10 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Expression\StaticCallNode
   |  |  |  class: Latte\Compiler\Nodes\Php\Expression\ClassConstantFetchNode
   |  |  |  |  class: Latte\Compiler\Nodes\Php\NameNode
   |  |  |  |  |  parts: array (1)
   |  |  |  |  |  |  0 => 'A'
   |  |  |  |  |  startLine: 12
   |  |  |  |  |  endLine: null
   |  |  |  |  name: Latte\Compiler\Nodes\Php\IdentifierNode
   |  |  |  |  |  name: 'B'
   |  |  |  |  |  startLine: 12
   |  |  |  |  |  endLine: null
   |  |  |  |  startLine: 12
   |  |  |  |  endLine: null
   |  |  |  name: Latte\Compiler\Nodes\Php\IdentifierNode
   |  |  |  |  name: 'c'
   |  |  |  |  startLine: 12
   |  |  |  |  endLine: null
   |  |  |  args: array (0)
   |  |  |  startLine: 12
   |  |  |  endLine: null
   |  |  key: null
   |  |  byRef: false
   |  |  startLine: 12
   |  |  unpack: false
   |  |  endLine: null
   |  11 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Expression\ArrayAccessNode
   |  |  |  var: Latte\Compiler\Nodes\Php\Expression\ConstantFetchNode
   |  |  |  |  name: Latte\Compiler\Nodes\Php\NameNode
   |  |  |  |  |  parts: array (1)
   |  |  |  |  |  |  0 => '__FUNCTION__'
   |  |  |  |  |  startLine: 14
   |  |  |  |  |  endLine: null
   |  |  |  |  startLine: 14
   |  |  |  |  endLine: null
   |  |  |  index: Latte\Compiler\Nodes\Php\Scalar\IntegerNode
   |  |  |  |  value: 0
   |  |  |  |  kind: 10
   |  |  |  |  startLine: 14
   |  |  |  |  endLine: null
   |  |  |  startLine: 14
   |  |  |  endLine: null
   |  |  key: null
   |  |  byRef: false
   |  |  startLine: 14
   |  |  unpack: false
   |  |  endLine: null
   |  12 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Expression\PropertyFetchNode
   |  |  |  name: Latte\Compiler\Nodes\Php\IdentifierNode
   |  |  |  |  name: 'length'
   |  |  |  |  startLine: 15
   |  |  |  |  endLine: null
   |  |  |  var: Latte\Compiler\Nodes\Php\Expression\ConstantFetchNode
   |  |  |  |  name: Latte\Compiler\Nodes\Php\NameNode
   |  |  |  |  |  parts: array (1)
   |  |  |  |  |  |  0 => '__FUNCTION__'
   |  |  |  |  |  startLine: 15
   |  |  |  |  |  endLine: null
   |  |  |  |  startLine: 15
   |  |  |  |  endLine: null
   |  |  |  startLine: 15
   |  |  |  endLine: null
   |  |  key: null
   |  |  byRef: false
   |  |  startLine: 15
   |  |  unpack: false
   |  |  endLine: null
   |  13 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Expression\MethodCallNode
   |  |  |  var: Latte\Compiler\Nodes\Php\Expression\ConstantFetchNode
   |  |  |  |  name: Latte\Compiler\Nodes\Php\NameNode
   |  |  |  |  |  parts: array (1)
   |  |  |  |  |  |  0 => '__FUNCIONT__'
   |  |  |  |  |  startLine: 16
   |  |  |  |  |  endLine: null
   |  |  |  |  startLine: 16
   |  |  |  |  endLine: null
   |  |  |  name: Latte\Compiler\Nodes\Php\IdentifierNode
   |  |  |  |  name: 'length'
   |  |  |  |  startLine: 16
   |  |  |  |  endLine: null
   |  |  |  args: array (0)
   |  |  |  startLine: 16
   |  |  |  endLine: null
   |  |  key: null
   |  |  byRef: false
   |  |  startLine: 16
   |  |  unpack: false
   |  |  endLine: null
   startLine: null
   endLine: null
