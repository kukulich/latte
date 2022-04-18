<?php

// UVS isset() on temporaries

declare(strict_types=1);

use Tester\Assert;

require __DIR__ . '/../bootstrap.php';

$test = <<<'XX'
	isset(([0, 1] + [])[0]),
	isset(['a' => 'b']->a),
	isset("str"->a),
	XX;

$node = parseCode($test);

Assert::same(
	loadContent(__FILE__, __COMPILER_HALT_OFFSET__),
	exportNode($node),
);

__halt_compiler();
Latte\Compiler\Nodes\Php\Expression\ArrayNode
   items: array (3)
   |  0 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Expression\IssetNode
   |  |  |  vars: array (1)
   |  |  |  |  0 => Latte\Compiler\Nodes\Php\Expression\ArrayAccessNode
   |  |  |  |  |  expr: Latte\Compiler\Nodes\Php\Expression\BinaryOpNode
   |  |  |  |  |  |  left: Latte\Compiler\Nodes\Php\Expression\ArrayNode
   |  |  |  |  |  |  |  items: array (2)
   |  |  |  |  |  |  |  |  0 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  |  |  |  |  |  |  |  value: Latte\Compiler\Nodes\Php\Scalar\IntegerNode
   |  |  |  |  |  |  |  |  |  |  value: 0
   |  |  |  |  |  |  |  |  |  |  kind: 10
   |  |  |  |  |  |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  |  |  |  |  |  line: 1
   |  |  |  |  |  |  |  |  |  |  |  column: 9
   |  |  |  |  |  |  |  |  |  |  |  offset: 8
   |  |  |  |  |  |  |  |  |  key: null
   |  |  |  |  |  |  |  |  |  byRef: false
   |  |  |  |  |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  |  |  |  |  line: 1
   |  |  |  |  |  |  |  |  |  |  column: 9
   |  |  |  |  |  |  |  |  |  |  offset: 8
   |  |  |  |  |  |  |  |  |  unpack: false
   |  |  |  |  |  |  |  |  1 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  |  |  |  |  |  |  |  value: Latte\Compiler\Nodes\Php\Scalar\IntegerNode
   |  |  |  |  |  |  |  |  |  |  value: 1
   |  |  |  |  |  |  |  |  |  |  kind: 10
   |  |  |  |  |  |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  |  |  |  |  |  line: 1
   |  |  |  |  |  |  |  |  |  |  |  column: 12
   |  |  |  |  |  |  |  |  |  |  |  offset: 11
   |  |  |  |  |  |  |  |  |  key: null
   |  |  |  |  |  |  |  |  |  byRef: false
   |  |  |  |  |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  |  |  |  |  line: 1
   |  |  |  |  |  |  |  |  |  |  column: 12
   |  |  |  |  |  |  |  |  |  |  offset: 11
   |  |  |  |  |  |  |  |  |  unpack: false
   |  |  |  |  |  |  |  position: null
   |  |  |  |  |  |  operator: '+'
   |  |  |  |  |  |  right: Latte\Compiler\Nodes\Php\Expression\ArrayNode
   |  |  |  |  |  |  |  items: array (0)
   |  |  |  |  |  |  |  position: null
   |  |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  |  line: 1
   |  |  |  |  |  |  |  column: 8
   |  |  |  |  |  |  |  offset: 7
   |  |  |  |  |  index: Latte\Compiler\Nodes\Php\Scalar\IntegerNode
   |  |  |  |  |  |  value: 0
   |  |  |  |  |  |  kind: 10
   |  |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  |  line: 1
   |  |  |  |  |  |  |  column: 21
   |  |  |  |  |  |  |  offset: 20
   |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  line: 1
   |  |  |  |  |  |  column: 7
   |  |  |  |  |  |  offset: 6
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
   |  |  value: Latte\Compiler\Nodes\Php\Expression\IssetNode
   |  |  |  vars: array (1)
   |  |  |  |  0 => Latte\Compiler\Nodes\Php\Expression\PropertyFetchNode
   |  |  |  |  |  name: Latte\Compiler\Nodes\Php\IdentifierNode
   |  |  |  |  |  |  name: 'a'
   |  |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  |  line: 2
   |  |  |  |  |  |  |  column: 21
   |  |  |  |  |  |  |  offset: 45
   |  |  |  |  |  object: Latte\Compiler\Nodes\Php\Expression\ArrayNode
   |  |  |  |  |  |  items: array (1)
   |  |  |  |  |  |  |  0 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  |  |  |  |  |  |  value: Latte\Compiler\Nodes\Php\Scalar\StringNode
   |  |  |  |  |  |  |  |  |  value: 'b'
   |  |  |  |  |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  |  |  |  |  line: 2
   |  |  |  |  |  |  |  |  |  |  column: 15
   |  |  |  |  |  |  |  |  |  |  offset: 39
   |  |  |  |  |  |  |  |  key: Latte\Compiler\Nodes\Php\Scalar\StringNode
   |  |  |  |  |  |  |  |  |  value: 'a'
   |  |  |  |  |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  |  |  |  |  line: 2
   |  |  |  |  |  |  |  |  |  |  column: 8
   |  |  |  |  |  |  |  |  |  |  offset: 32
   |  |  |  |  |  |  |  |  byRef: false
   |  |  |  |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  |  |  |  line: 2
   |  |  |  |  |  |  |  |  |  column: 8
   |  |  |  |  |  |  |  |  |  offset: 32
   |  |  |  |  |  |  |  |  unpack: false
   |  |  |  |  |  |  position: null
   |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  line: 2
   |  |  |  |  |  |  column: 7
   |  |  |  |  |  |  offset: 31
   |  |  |  position: Latte\Compiler\Position
   |  |  |  |  line: 2
   |  |  |  |  column: 1
   |  |  |  |  offset: 25
   |  |  key: null
   |  |  byRef: false
   |  |  position: Latte\Compiler\Position
   |  |  |  line: 2
   |  |  |  column: 1
   |  |  |  offset: 25
   |  |  unpack: false
   |  2 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Expression\IssetNode
   |  |  |  vars: array (1)
   |  |  |  |  0 => Latte\Compiler\Nodes\Php\Expression\PropertyFetchNode
   |  |  |  |  |  name: Latte\Compiler\Nodes\Php\IdentifierNode
   |  |  |  |  |  |  name: 'a'
   |  |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  |  line: 3
   |  |  |  |  |  |  |  column: 14
   |  |  |  |  |  |  |  offset: 62
   |  |  |  |  |  object: Latte\Compiler\Nodes\Php\Scalar\StringNode
   |  |  |  |  |  |  value: 'str'
   |  |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  |  line: 3
   |  |  |  |  |  |  |  column: 7
   |  |  |  |  |  |  |  offset: 55
   |  |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  |  line: 3
   |  |  |  |  |  |  column: 7
   |  |  |  |  |  |  offset: 55
   |  |  |  position: Latte\Compiler\Position
   |  |  |  |  line: 3
   |  |  |  |  column: 1
   |  |  |  |  offset: 49
   |  |  key: null
   |  |  byRef: false
   |  |  position: Latte\Compiler\Position
   |  |  |  line: 3
   |  |  |  column: 1
   |  |  |  offset: 49
   |  |  unpack: false
   position: null
