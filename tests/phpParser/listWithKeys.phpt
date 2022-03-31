<?php

// List destructing with keys

declare(strict_types=1);

use Tester\Assert;

require __DIR__ . '/../bootstrap.php';

$test = <<<'XX'
	list('a' => $b) = ['a' => 'b'],
	list('a' => list($b => $c), 'd' => $e) = $x,
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
   |  |  value: Latte\Compiler\Nodes\Php\Expression\AssignNode
   |  |  |  var: Latte\Compiler\Nodes\Php\Expression\ListNode
   |  |  |  |  items: array (1)
   |  |  |  |  |  0 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  |  |  |  |  value: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  |  |  |  name: 'b'
   |  |  |  |  |  |  |  startLine: 1
   |  |  |  |  |  |  |  endLine: null
   |  |  |  |  |  |  key: Latte\Compiler\Nodes\Php\Scalar\StringNode
   |  |  |  |  |  |  |  value: 'a'
   |  |  |  |  |  |  |  startLine: 1
   |  |  |  |  |  |  |  endLine: null
   |  |  |  |  |  |  byRef: false
   |  |  |  |  |  |  startLine: 1
   |  |  |  |  |  |  unpack: false
   |  |  |  |  |  |  endLine: null
   |  |  |  |  startLine: 1
   |  |  |  |  endLine: null
   |  |  |  expr: Latte\Compiler\Nodes\Php\Expression\ArrayNode
   |  |  |  |  items: array (1)
   |  |  |  |  |  0 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  |  |  |  |  value: Latte\Compiler\Nodes\Php\Scalar\StringNode
   |  |  |  |  |  |  |  value: 'b'
   |  |  |  |  |  |  |  startLine: 1
   |  |  |  |  |  |  |  endLine: null
   |  |  |  |  |  |  key: Latte\Compiler\Nodes\Php\Scalar\StringNode
   |  |  |  |  |  |  |  value: 'a'
   |  |  |  |  |  |  |  startLine: 1
   |  |  |  |  |  |  |  endLine: null
   |  |  |  |  |  |  byRef: false
   |  |  |  |  |  |  startLine: 1
   |  |  |  |  |  |  unpack: false
   |  |  |  |  |  |  endLine: null
   |  |  |  |  startLine: null
   |  |  |  |  endLine: null
   |  |  |  byRef: false
   |  |  |  startLine: 1
   |  |  |  endLine: null
   |  |  key: null
   |  |  byRef: false
   |  |  startLine: 1
   |  |  unpack: false
   |  |  endLine: null
   |  1 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Expression\AssignNode
   |  |  |  var: Latte\Compiler\Nodes\Php\Expression\ListNode
   |  |  |  |  items: array (2)
   |  |  |  |  |  0 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  |  |  |  |  value: Latte\Compiler\Nodes\Php\Expression\ListNode
   |  |  |  |  |  |  |  items: array (1)
   |  |  |  |  |  |  |  |  0 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  |  |  |  |  |  |  |  value: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  |  |  |  |  |  |  name: 'c'
   |  |  |  |  |  |  |  |  |  |  startLine: 2
   |  |  |  |  |  |  |  |  |  |  endLine: null
   |  |  |  |  |  |  |  |  |  key: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  |  |  |  |  |  |  name: 'b'
   |  |  |  |  |  |  |  |  |  |  startLine: 2
   |  |  |  |  |  |  |  |  |  |  endLine: null
   |  |  |  |  |  |  |  |  |  byRef: false
   |  |  |  |  |  |  |  |  |  startLine: 2
   |  |  |  |  |  |  |  |  |  unpack: false
   |  |  |  |  |  |  |  |  |  endLine: null
   |  |  |  |  |  |  |  startLine: 2
   |  |  |  |  |  |  |  endLine: null
   |  |  |  |  |  |  key: Latte\Compiler\Nodes\Php\Scalar\StringNode
   |  |  |  |  |  |  |  value: 'a'
   |  |  |  |  |  |  |  startLine: 2
   |  |  |  |  |  |  |  endLine: null
   |  |  |  |  |  |  byRef: false
   |  |  |  |  |  |  startLine: 2
   |  |  |  |  |  |  unpack: false
   |  |  |  |  |  |  endLine: null
   |  |  |  |  |  1 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  |  |  |  |  value: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  |  |  |  name: 'e'
   |  |  |  |  |  |  |  startLine: 2
   |  |  |  |  |  |  |  endLine: null
   |  |  |  |  |  |  key: Latte\Compiler\Nodes\Php\Scalar\StringNode
   |  |  |  |  |  |  |  value: 'd'
   |  |  |  |  |  |  |  startLine: 2
   |  |  |  |  |  |  |  endLine: null
   |  |  |  |  |  |  byRef: false
   |  |  |  |  |  |  startLine: 2
   |  |  |  |  |  |  unpack: false
   |  |  |  |  |  |  endLine: null
   |  |  |  |  startLine: 2
   |  |  |  |  endLine: null
   |  |  |  expr: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  name: 'x'
   |  |  |  |  startLine: 2
   |  |  |  |  endLine: null
   |  |  |  byRef: false
   |  |  |  startLine: 2
   |  |  |  endLine: null
   |  |  key: null
   |  |  byRef: false
   |  |  startLine: 2
   |  |  unpack: false
   |  |  endLine: null
   startLine: null
   endLine: null
