<?php

// Constant fetches

declare(strict_types=1);

use Tester\Assert;

require __DIR__ . '/../bootstrap.php';

$test = <<<'XX'
	A,
	A::B,
	A::class,
	$a::B,
	$a::class,
	XX;

$node = parseCode($test);

Assert::same(
	loadContent(__FILE__, __COMPILER_HALT_OFFSET__),
	exportNode($node),
);

__halt_compiler();
Latte\Compiler\Nodes\Php\Expression\ArrayNode
   items: array (5)
   |  0 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Scalar\StringNode
   |  |  |  value: 'A'
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
   |  |  value: Latte\Compiler\Nodes\Php\Expression\ClassConstantFetchNode
   |  |  |  class: Latte\Compiler\Nodes\Php\NameNode
   |  |  |  |  parts: array (1)
   |  |  |  |  |  0 => 'A'
   |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  line: 2
   |  |  |  |  |  column: 1
   |  |  |  |  |  offset: 3
   |  |  |  name: Latte\Compiler\Nodes\Php\IdentifierNode
   |  |  |  |  name: 'B'
   |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  line: 2
   |  |  |  |  |  column: 4
   |  |  |  |  |  offset: 6
   |  |  |  position: Latte\Compiler\Position
   |  |  |  |  line: 2
   |  |  |  |  column: 1
   |  |  |  |  offset: 3
   |  |  key: null
   |  |  byRef: false
   |  |  position: Latte\Compiler\Position
   |  |  |  line: 2
   |  |  |  column: 1
   |  |  |  offset: 3
   |  |  unpack: false
   |  2 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Expression\ClassConstantFetchNode
   |  |  |  class: Latte\Compiler\Nodes\Php\NameNode
   |  |  |  |  parts: array (1)
   |  |  |  |  |  0 => 'A'
   |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  line: 3
   |  |  |  |  |  column: 1
   |  |  |  |  |  offset: 9
   |  |  |  name: Latte\Compiler\Nodes\Php\IdentifierNode
   |  |  |  |  name: 'class'
   |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  line: 3
   |  |  |  |  |  column: 4
   |  |  |  |  |  offset: 12
   |  |  |  position: Latte\Compiler\Position
   |  |  |  |  line: 3
   |  |  |  |  column: 1
   |  |  |  |  offset: 9
   |  |  key: null
   |  |  byRef: false
   |  |  position: Latte\Compiler\Position
   |  |  |  line: 3
   |  |  |  column: 1
   |  |  |  offset: 9
   |  |  unpack: false
   |  3 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Expression\ClassConstantFetchNode
   |  |  |  class: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  name: 'a'
   |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  line: 4
   |  |  |  |  |  column: 1
   |  |  |  |  |  offset: 19
   |  |  |  name: Latte\Compiler\Nodes\Php\IdentifierNode
   |  |  |  |  name: 'B'
   |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  line: 4
   |  |  |  |  |  column: 5
   |  |  |  |  |  offset: 23
   |  |  |  position: Latte\Compiler\Position
   |  |  |  |  line: 4
   |  |  |  |  column: 1
   |  |  |  |  offset: 19
   |  |  key: null
   |  |  byRef: false
   |  |  position: Latte\Compiler\Position
   |  |  |  line: 4
   |  |  |  column: 1
   |  |  |  offset: 19
   |  |  unpack: false
   |  4 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Expression\ClassConstantFetchNode
   |  |  |  class: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  name: 'a'
   |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  line: 5
   |  |  |  |  |  column: 1
   |  |  |  |  |  offset: 26
   |  |  |  name: Latte\Compiler\Nodes\Php\IdentifierNode
   |  |  |  |  name: 'class'
   |  |  |  |  position: Latte\Compiler\Position
   |  |  |  |  |  line: 5
   |  |  |  |  |  column: 5
   |  |  |  |  |  offset: 30
   |  |  |  position: Latte\Compiler\Position
   |  |  |  |  line: 5
   |  |  |  |  column: 1
   |  |  |  |  offset: 26
   |  |  key: null
   |  |  byRef: false
   |  |  position: Latte\Compiler\Position
   |  |  |  line: 5
   |  |  |  column: 1
   |  |  |  offset: 26
   |  |  unpack: false
   position: null
