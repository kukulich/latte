<?php

// List reference assignments (PHP 7.3)

declare(strict_types=1);

use Tester\Assert;

require __DIR__ . '/../bootstrap.php';

$test = <<<'XX'
	list(&$v) = $x,
	list('k' => &$v) = $x,
	[&$v] = $x,
	['k' => &$v] = $x,
	XX;

$node = parseCode($test);

Assert::same(
	loadContent(__FILE__, __COMPILER_HALT_OFFSET__),
	exportNode($node),
);

__halt_compiler();
Latte\Compiler\Nodes\Php\Expression\ArrayNode
   items: array (4)
   |  0 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Expression\AssignNode
   |  |  |  var: Latte\Compiler\Nodes\Php\Expression\ListNode
   |  |  |  |  items: array (1)
   |  |  |  |  |  0 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  |  |  |  |  value: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  |  |  |  name: 'v'
   |  |  |  |  |  |  |  startLine: 1
   |  |  |  |  |  |  |  endLine: null
   |  |  |  |  |  |  key: null
   |  |  |  |  |  |  byRef: true
   |  |  |  |  |  |  startLine: 1
   |  |  |  |  |  |  unpack: false
   |  |  |  |  |  |  endLine: null
   |  |  |  |  startLine: 1
   |  |  |  |  endLine: null
   |  |  |  expr: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  name: 'x'
   |  |  |  |  startLine: 1
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
   |  |  |  |  items: array (1)
   |  |  |  |  |  0 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  |  |  |  |  value: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  |  |  |  name: 'v'
   |  |  |  |  |  |  |  startLine: 2
   |  |  |  |  |  |  |  endLine: null
   |  |  |  |  |  |  key: Latte\Compiler\Nodes\Php\Scalar\StringNode
   |  |  |  |  |  |  |  value: 'k'
   |  |  |  |  |  |  |  startLine: 2
   |  |  |  |  |  |  |  endLine: null
   |  |  |  |  |  |  byRef: true
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
   |  2 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Expression\AssignNode
   |  |  |  var: Latte\Compiler\Nodes\Php\Expression\ArrayNode
   |  |  |  |  items: array (1)
   |  |  |  |  |  0 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  |  |  |  |  value: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  |  |  |  name: 'v'
   |  |  |  |  |  |  |  startLine: 3
   |  |  |  |  |  |  |  endLine: null
   |  |  |  |  |  |  key: null
   |  |  |  |  |  |  byRef: true
   |  |  |  |  |  |  startLine: 3
   |  |  |  |  |  |  unpack: false
   |  |  |  |  |  |  endLine: null
   |  |  |  |  startLine: null
   |  |  |  |  endLine: null
   |  |  |  expr: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  name: 'x'
   |  |  |  |  startLine: 3
   |  |  |  |  endLine: null
   |  |  |  byRef: false
   |  |  |  startLine: 3
   |  |  |  endLine: null
   |  |  key: null
   |  |  byRef: false
   |  |  startLine: 3
   |  |  unpack: false
   |  |  endLine: null
   |  3 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Expression\AssignNode
   |  |  |  var: Latte\Compiler\Nodes\Php\Expression\ArrayNode
   |  |  |  |  items: array (1)
   |  |  |  |  |  0 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  |  |  |  |  value: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  |  |  |  name: 'v'
   |  |  |  |  |  |  |  startLine: 4
   |  |  |  |  |  |  |  endLine: null
   |  |  |  |  |  |  key: Latte\Compiler\Nodes\Php\Scalar\StringNode
   |  |  |  |  |  |  |  value: 'k'
   |  |  |  |  |  |  |  startLine: 4
   |  |  |  |  |  |  |  endLine: null
   |  |  |  |  |  |  byRef: true
   |  |  |  |  |  |  startLine: 4
   |  |  |  |  |  |  unpack: false
   |  |  |  |  |  |  endLine: null
   |  |  |  |  startLine: null
   |  |  |  |  endLine: null
   |  |  |  expr: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  name: 'x'
   |  |  |  |  startLine: 4
   |  |  |  |  endLine: null
   |  |  |  byRef: false
   |  |  |  startLine: 4
   |  |  |  endLine: null
   |  |  key: null
   |  |  byRef: false
   |  |  startLine: 4
   |  |  unpack: false
   |  |  endLine: null
   startLine: null
   endLine: null
