<?php

// Array definitions

declare(strict_types=1);

use Tester\Assert;

require __DIR__ . '/../bootstrap.php';

$test = <<<'XX'
	array(),
	array('a'),
	array('a', ),
	array('a', 'b'),
	array('a', &$b, 'c' => 'd', 'e' => &$f),

	/* short array syntax */
	[],
	[1, 2, 3],
	['a' => 'b'],

	/* modern syntax */
	[a: 'b', x: 3],
	[y : 'c'],
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
   |  |  value: Latte\Compiler\Nodes\Php\Expression\ArrayNode
   |  |  |  items: array (0)
   |  |  |  startLine: null
   |  |  |  endLine: null
   |  |  key: null
   |  |  byRef: false
   |  |  startLine: 1
   |  |  unpack: false
   |  |  endLine: null
   |  1 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Expression\ArrayNode
   |  |  |  items: array (1)
   |  |  |  |  0 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  |  |  |  value: Latte\Compiler\Nodes\Php\Scalar\StringNode
   |  |  |  |  |  |  value: 'a'
   |  |  |  |  |  |  startLine: 2
   |  |  |  |  |  |  endLine: null
   |  |  |  |  |  key: null
   |  |  |  |  |  byRef: false
   |  |  |  |  |  startLine: 2
   |  |  |  |  |  unpack: false
   |  |  |  |  |  endLine: null
   |  |  |  startLine: null
   |  |  |  endLine: null
   |  |  key: null
   |  |  byRef: false
   |  |  startLine: 2
   |  |  unpack: false
   |  |  endLine: null
   |  2 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Expression\ArrayNode
   |  |  |  items: array (1)
   |  |  |  |  0 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  |  |  |  value: Latte\Compiler\Nodes\Php\Scalar\StringNode
   |  |  |  |  |  |  value: 'a'
   |  |  |  |  |  |  startLine: 3
   |  |  |  |  |  |  endLine: null
   |  |  |  |  |  key: null
   |  |  |  |  |  byRef: false
   |  |  |  |  |  startLine: 3
   |  |  |  |  |  unpack: false
   |  |  |  |  |  endLine: null
   |  |  |  startLine: null
   |  |  |  endLine: null
   |  |  key: null
   |  |  byRef: false
   |  |  startLine: 3
   |  |  unpack: false
   |  |  endLine: null
   |  3 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Expression\ArrayNode
   |  |  |  items: array (2)
   |  |  |  |  0 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  |  |  |  value: Latte\Compiler\Nodes\Php\Scalar\StringNode
   |  |  |  |  |  |  value: 'a'
   |  |  |  |  |  |  startLine: 4
   |  |  |  |  |  |  endLine: null
   |  |  |  |  |  key: null
   |  |  |  |  |  byRef: false
   |  |  |  |  |  startLine: 4
   |  |  |  |  |  unpack: false
   |  |  |  |  |  endLine: null
   |  |  |  |  1 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  |  |  |  value: Latte\Compiler\Nodes\Php\Scalar\StringNode
   |  |  |  |  |  |  value: 'b'
   |  |  |  |  |  |  startLine: 4
   |  |  |  |  |  |  endLine: null
   |  |  |  |  |  key: null
   |  |  |  |  |  byRef: false
   |  |  |  |  |  startLine: 4
   |  |  |  |  |  unpack: false
   |  |  |  |  |  endLine: null
   |  |  |  startLine: null
   |  |  |  endLine: null
   |  |  key: null
   |  |  byRef: false
   |  |  startLine: 4
   |  |  unpack: false
   |  |  endLine: null
   |  4 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Expression\ArrayNode
   |  |  |  items: array (4)
   |  |  |  |  0 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  |  |  |  value: Latte\Compiler\Nodes\Php\Scalar\StringNode
   |  |  |  |  |  |  value: 'a'
   |  |  |  |  |  |  startLine: 5
   |  |  |  |  |  |  endLine: null
   |  |  |  |  |  key: null
   |  |  |  |  |  byRef: false
   |  |  |  |  |  startLine: 5
   |  |  |  |  |  unpack: false
   |  |  |  |  |  endLine: null
   |  |  |  |  1 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  |  |  |  value: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  |  |  name: 'b'
   |  |  |  |  |  |  startLine: 5
   |  |  |  |  |  |  endLine: null
   |  |  |  |  |  key: null
   |  |  |  |  |  byRef: true
   |  |  |  |  |  startLine: 5
   |  |  |  |  |  unpack: false
   |  |  |  |  |  endLine: null
   |  |  |  |  2 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  |  |  |  value: Latte\Compiler\Nodes\Php\Scalar\StringNode
   |  |  |  |  |  |  value: 'd'
   |  |  |  |  |  |  startLine: 5
   |  |  |  |  |  |  endLine: null
   |  |  |  |  |  key: Latte\Compiler\Nodes\Php\Scalar\StringNode
   |  |  |  |  |  |  value: 'c'
   |  |  |  |  |  |  startLine: 5
   |  |  |  |  |  |  endLine: null
   |  |  |  |  |  byRef: false
   |  |  |  |  |  startLine: 5
   |  |  |  |  |  unpack: false
   |  |  |  |  |  endLine: null
   |  |  |  |  3 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  |  |  |  value: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  |  |  name: 'f'
   |  |  |  |  |  |  startLine: 5
   |  |  |  |  |  |  endLine: null
   |  |  |  |  |  key: Latte\Compiler\Nodes\Php\Scalar\StringNode
   |  |  |  |  |  |  value: 'e'
   |  |  |  |  |  |  startLine: 5
   |  |  |  |  |  |  endLine: null
   |  |  |  |  |  byRef: true
   |  |  |  |  |  startLine: 5
   |  |  |  |  |  unpack: false
   |  |  |  |  |  endLine: null
   |  |  |  startLine: null
   |  |  |  endLine: null
   |  |  key: null
   |  |  byRef: false
   |  |  startLine: 5
   |  |  unpack: false
   |  |  endLine: null
   |  5 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Expression\ArrayNode
   |  |  |  items: array (0)
   |  |  |  startLine: null
   |  |  |  endLine: null
   |  |  key: null
   |  |  byRef: false
   |  |  startLine: 8
   |  |  unpack: false
   |  |  endLine: null
   |  6 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Expression\ArrayNode
   |  |  |  items: array (3)
   |  |  |  |  0 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  |  |  |  value: Latte\Compiler\Nodes\Php\Scalar\IntegerNode
   |  |  |  |  |  |  value: 1
   |  |  |  |  |  |  kind: 10
   |  |  |  |  |  |  startLine: 9
   |  |  |  |  |  |  endLine: null
   |  |  |  |  |  key: null
   |  |  |  |  |  byRef: false
   |  |  |  |  |  startLine: 9
   |  |  |  |  |  unpack: false
   |  |  |  |  |  endLine: null
   |  |  |  |  1 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  |  |  |  value: Latte\Compiler\Nodes\Php\Scalar\IntegerNode
   |  |  |  |  |  |  value: 2
   |  |  |  |  |  |  kind: 10
   |  |  |  |  |  |  startLine: 9
   |  |  |  |  |  |  endLine: null
   |  |  |  |  |  key: null
   |  |  |  |  |  byRef: false
   |  |  |  |  |  startLine: 9
   |  |  |  |  |  unpack: false
   |  |  |  |  |  endLine: null
   |  |  |  |  2 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  |  |  |  value: Latte\Compiler\Nodes\Php\Scalar\IntegerNode
   |  |  |  |  |  |  value: 3
   |  |  |  |  |  |  kind: 10
   |  |  |  |  |  |  startLine: 9
   |  |  |  |  |  |  endLine: null
   |  |  |  |  |  key: null
   |  |  |  |  |  byRef: false
   |  |  |  |  |  startLine: 9
   |  |  |  |  |  unpack: false
   |  |  |  |  |  endLine: null
   |  |  |  startLine: null
   |  |  |  endLine: null
   |  |  key: null
   |  |  byRef: false
   |  |  startLine: 9
   |  |  unpack: false
   |  |  endLine: null
   |  7 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Expression\ArrayNode
   |  |  |  items: array (1)
   |  |  |  |  0 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  |  |  |  value: Latte\Compiler\Nodes\Php\Scalar\StringNode
   |  |  |  |  |  |  value: 'b'
   |  |  |  |  |  |  startLine: 10
   |  |  |  |  |  |  endLine: null
   |  |  |  |  |  key: Latte\Compiler\Nodes\Php\Scalar\StringNode
   |  |  |  |  |  |  value: 'a'
   |  |  |  |  |  |  startLine: 10
   |  |  |  |  |  |  endLine: null
   |  |  |  |  |  byRef: false
   |  |  |  |  |  startLine: 10
   |  |  |  |  |  unpack: false
   |  |  |  |  |  endLine: null
   |  |  |  startLine: null
   |  |  |  endLine: null
   |  |  key: null
   |  |  byRef: false
   |  |  startLine: 10
   |  |  unpack: false
   |  |  endLine: null
   |  8 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Expression\ArrayNode
   |  |  |  items: array (2)
   |  |  |  |  0 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  |  |  |  value: Latte\Compiler\Nodes\Php\Scalar\StringNode
   |  |  |  |  |  |  value: 'b'
   |  |  |  |  |  |  startLine: 13
   |  |  |  |  |  |  endLine: null
   |  |  |  |  |  key: Latte\Compiler\Nodes\Php\IdentifierNode
   |  |  |  |  |  |  name: 'a'
   |  |  |  |  |  |  startLine: 13
   |  |  |  |  |  |  endLine: null
   |  |  |  |  |  byRef: false
   |  |  |  |  |  startLine: 13
   |  |  |  |  |  unpack: false
   |  |  |  |  |  endLine: null
   |  |  |  |  1 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  |  |  |  value: Latte\Compiler\Nodes\Php\Scalar\IntegerNode
   |  |  |  |  |  |  value: 3
   |  |  |  |  |  |  kind: 10
   |  |  |  |  |  |  startLine: 13
   |  |  |  |  |  |  endLine: null
   |  |  |  |  |  key: Latte\Compiler\Nodes\Php\IdentifierNode
   |  |  |  |  |  |  name: 'x'
   |  |  |  |  |  |  startLine: 13
   |  |  |  |  |  |  endLine: null
   |  |  |  |  |  byRef: false
   |  |  |  |  |  startLine: 13
   |  |  |  |  |  unpack: false
   |  |  |  |  |  endLine: null
   |  |  |  startLine: null
   |  |  |  endLine: null
   |  |  key: null
   |  |  byRef: false
   |  |  startLine: 13
   |  |  unpack: false
   |  |  endLine: null
   |  9 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Expression\ArrayNode
   |  |  |  items: array (1)
   |  |  |  |  0 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  |  |  |  value: Latte\Compiler\Nodes\Php\Scalar\StringNode
   |  |  |  |  |  |  value: 'c'
   |  |  |  |  |  |  startLine: 14
   |  |  |  |  |  |  endLine: null
   |  |  |  |  |  key: Latte\Compiler\Nodes\Php\IdentifierNode
   |  |  |  |  |  |  name: 'y'
   |  |  |  |  |  |  startLine: 14
   |  |  |  |  |  |  endLine: null
   |  |  |  |  |  byRef: false
   |  |  |  |  |  startLine: 14
   |  |  |  |  |  unpack: false
   |  |  |  |  |  endLine: null
   |  |  |  startLine: null
   |  |  |  endLine: null
   |  |  key: null
   |  |  byRef: false
   |  |  startLine: 14
   |  |  unpack: false
   |  |  endLine: null
   startLine: null
   endLine: null
