<?php

// Expressions in isset()

declare(strict_types=1);

use Tester\Assert;

require __DIR__ . '/../bootstrap.php';

$test = <<<'XX'
	/* This is legal. */
	isset(($a), (($b))),
	/* This is illegal, but not a syntax error. */
	isset(1 + 1),
	XX;

$node = parseCode($test);

Assert::same(
	loadContent(__FILE__, __COMPILER_HALT_OFFSET__),
	exportNode($node),
);

__halt_compiler();
Latte\Compiler\Nodes\Php\Expression\ArrayNode
   items: array (2)
   |  0 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Expression\IssetNode
   |  |  |  vars: array (2)
   |  |  |  |  0 => Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  |  name: 'a'
   |  |  |  |  |  startLine: 2
   |  |  |  |  |  endLine: null
   |  |  |  |  1 => Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  |  name: 'b'
   |  |  |  |  |  startLine: 2
   |  |  |  |  |  endLine: null
   |  |  |  startLine: 2
   |  |  |  endLine: null
   |  |  key: null
   |  |  byRef: false
   |  |  startLine: 2
   |  |  unpack: false
   |  |  endLine: null
   |  1 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Expression\IssetNode
   |  |  |  vars: array (1)
   |  |  |  |  0 => Latte\Compiler\Nodes\Php\Expression\BinaryOpNode
   |  |  |  |  |  left: Latte\Compiler\Nodes\Php\Scalar\IntegerNode
   |  |  |  |  |  |  value: 1
   |  |  |  |  |  |  kind: 10
   |  |  |  |  |  |  startLine: 4
   |  |  |  |  |  |  endLine: null
   |  |  |  |  |  operator: '+'
   |  |  |  |  |  right: Latte\Compiler\Nodes\Php\Scalar\IntegerNode
   |  |  |  |  |  |  value: 1
   |  |  |  |  |  |  kind: 10
   |  |  |  |  |  |  startLine: 4
   |  |  |  |  |  |  endLine: null
   |  |  |  |  |  startLine: 4
   |  |  |  |  |  endLine: null
   |  |  |  startLine: 4
   |  |  |  endLine: null
   |  |  key: null
   |  |  byRef: false
   |  |  startLine: 4
   |  |  unpack: false
   |  |  endLine: null
   startLine: null
   endLine: null
