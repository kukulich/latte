<?php

// UVS static access

declare(strict_types=1);

use Tester\Assert;

require __DIR__ . '/../bootstrap.php';

$test = <<<'XX'
	A::$b,
	$A::$b,
	'A'::$b,
	('A' . '')::$b,
	'A'[0]::$b,
	A::$A::$b,
	XX;

$node = parseCode($test);

Assert::same(
	loadContent(__FILE__, __COMPILER_HALT_OFFSET__),
	exportNode($node),
);

__halt_compiler();
Latte\Compiler\Nodes\Php\Expression\ArrayNode
   items: array (6)
   |  0 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Expression\StaticPropertyFetchNode
   |  |  |  name: Latte\Compiler\Nodes\Php\VarLikeIdentifierNode
   |  |  |  |  name: 'b'
   |  |  |  |  startLine: 1
   |  |  |  |  endLine: null
   |  |  |  class: Latte\Compiler\Nodes\Php\NameNode
   |  |  |  |  parts: array (1)
   |  |  |  |  |  0 => 'A'
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
   |  |  value: Latte\Compiler\Nodes\Php\Expression\StaticPropertyFetchNode
   |  |  |  name: Latte\Compiler\Nodes\Php\VarLikeIdentifierNode
   |  |  |  |  name: 'b'
   |  |  |  |  startLine: 2
   |  |  |  |  endLine: null
   |  |  |  class: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  name: 'A'
   |  |  |  |  startLine: 2
   |  |  |  |  endLine: null
   |  |  |  startLine: 2
   |  |  |  endLine: null
   |  |  key: null
   |  |  byRef: false
   |  |  startLine: 2
   |  |  unpack: false
   |  |  endLine: null
   |  2 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Expression\StaticPropertyFetchNode
   |  |  |  name: Latte\Compiler\Nodes\Php\VarLikeIdentifierNode
   |  |  |  |  name: 'b'
   |  |  |  |  startLine: 3
   |  |  |  |  endLine: null
   |  |  |  class: Latte\Compiler\Nodes\Php\Scalar\StringNode
   |  |  |  |  value: 'A'
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
   |  |  value: Latte\Compiler\Nodes\Php\Expression\StaticPropertyFetchNode
   |  |  |  name: Latte\Compiler\Nodes\Php\VarLikeIdentifierNode
   |  |  |  |  name: 'b'
   |  |  |  |  startLine: 4
   |  |  |  |  endLine: null
   |  |  |  class: Latte\Compiler\Nodes\Php\Expression\BinaryOpNode
   |  |  |  |  left: Latte\Compiler\Nodes\Php\Scalar\StringNode
   |  |  |  |  |  value: 'A'
   |  |  |  |  |  startLine: 4
   |  |  |  |  |  endLine: null
   |  |  |  |  operator: '.'
   |  |  |  |  right: Latte\Compiler\Nodes\Php\Scalar\StringNode
   |  |  |  |  |  value: ''
   |  |  |  |  |  startLine: 4
   |  |  |  |  |  endLine: null
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
   |  |  value: Latte\Compiler\Nodes\Php\Expression\StaticPropertyFetchNode
   |  |  |  name: Latte\Compiler\Nodes\Php\VarLikeIdentifierNode
   |  |  |  |  name: 'b'
   |  |  |  |  startLine: 5
   |  |  |  |  endLine: null
   |  |  |  class: Latte\Compiler\Nodes\Php\Expression\ArrayAccessNode
   |  |  |  |  var: Latte\Compiler\Nodes\Php\Scalar\StringNode
   |  |  |  |  |  value: 'A'
   |  |  |  |  |  startLine: 5
   |  |  |  |  |  endLine: null
   |  |  |  |  index: Latte\Compiler\Nodes\Php\Scalar\IntegerNode
   |  |  |  |  |  value: 0
   |  |  |  |  |  kind: 10
   |  |  |  |  |  startLine: 5
   |  |  |  |  |  endLine: null
   |  |  |  |  startLine: 5
   |  |  |  |  endLine: null
   |  |  |  startLine: 5
   |  |  |  endLine: null
   |  |  key: null
   |  |  byRef: false
   |  |  startLine: 5
   |  |  unpack: false
   |  |  endLine: null
   |  5 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Expression\StaticPropertyFetchNode
   |  |  |  name: Latte\Compiler\Nodes\Php\VarLikeIdentifierNode
   |  |  |  |  name: 'b'
   |  |  |  |  startLine: 6
   |  |  |  |  endLine: null
   |  |  |  class: Latte\Compiler\Nodes\Php\Expression\StaticPropertyFetchNode
   |  |  |  |  name: Latte\Compiler\Nodes\Php\VarLikeIdentifierNode
   |  |  |  |  |  name: 'A'
   |  |  |  |  |  startLine: 6
   |  |  |  |  |  endLine: null
   |  |  |  |  class: Latte\Compiler\Nodes\Php\NameNode
   |  |  |  |  |  parts: array (1)
   |  |  |  |  |  |  0 => 'A'
   |  |  |  |  |  startLine: 6
   |  |  |  |  |  endLine: null
   |  |  |  |  startLine: 6
   |  |  |  |  endLine: null
   |  |  |  startLine: 6
   |  |  |  endLine: null
   |  |  key: null
   |  |  byRef: false
   |  |  startLine: 6
   |  |  unpack: false
   |  |  endLine: null
   startLine: null
   endLine: null
