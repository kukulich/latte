<?php

// Filters

declare(strict_types=1);

use Tester\Assert;

require __DIR__ . '/../bootstrap.php';

$test = <<<'XX'
	($a|upper),
	($a . $b |upper|truncate),
	($a |truncate: 10, 20|trim),
	($a |truncate: 10, (20|round)|trim),
	($a |truncate: a: 10, b: true),
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
   |  |  value: Latte\Compiler\Nodes\Php\Expression\FilterNode
   |  |  |  inner: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  name: 'a'
   |  |  |  |  startLine: 1
   |  |  |  |  endLine: null
   |  |  |  name: Latte\Compiler\Nodes\Php\IdentifierNode
   |  |  |  |  name: 'upper'
   |  |  |  |  startLine: 1
   |  |  |  |  endLine: null
   |  |  |  args: array (0)
   |  |  |  startLine: 1
   |  |  |  endLine: null
   |  |  key: null
   |  |  byRef: false
   |  |  startLine: 1
   |  |  unpack: false
   |  |  endLine: null
   |  1 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Expression\FilterNode
   |  |  |  inner: Latte\Compiler\Nodes\Php\Expression\FilterNode
   |  |  |  |  inner: Latte\Compiler\Nodes\Php\Expression\BinaryOpNode
   |  |  |  |  |  left: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  |  |  name: 'a'
   |  |  |  |  |  |  startLine: 2
   |  |  |  |  |  |  endLine: null
   |  |  |  |  |  operator: '.'
   |  |  |  |  |  right: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  |  |  name: 'b'
   |  |  |  |  |  |  startLine: 2
   |  |  |  |  |  |  endLine: null
   |  |  |  |  |  startLine: 2
   |  |  |  |  |  endLine: null
   |  |  |  |  name: Latte\Compiler\Nodes\Php\IdentifierNode
   |  |  |  |  |  name: 'upper'
   |  |  |  |  |  startLine: 2
   |  |  |  |  |  endLine: null
   |  |  |  |  args: array (0)
   |  |  |  |  startLine: 2
   |  |  |  |  endLine: null
   |  |  |  name: Latte\Compiler\Nodes\Php\IdentifierNode
   |  |  |  |  name: 'truncate'
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
   |  |  value: Latte\Compiler\Nodes\Php\Expression\FilterNode
   |  |  |  inner: Latte\Compiler\Nodes\Php\Expression\FilterNode
   |  |  |  |  inner: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  |  name: 'a'
   |  |  |  |  |  startLine: 3
   |  |  |  |  |  endLine: null
   |  |  |  |  name: Latte\Compiler\Nodes\Php\IdentifierNode
   |  |  |  |  |  name: 'truncate'
   |  |  |  |  |  startLine: 3
   |  |  |  |  |  endLine: null
   |  |  |  |  args: array (2)
   |  |  |  |  |  0 => Latte\Compiler\Nodes\Php\ArgumentNode
   |  |  |  |  |  |  value: Latte\Compiler\Nodes\Php\Scalar\IntegerNode
   |  |  |  |  |  |  |  value: 10
   |  |  |  |  |  |  |  kind: 10
   |  |  |  |  |  |  |  startLine: 3
   |  |  |  |  |  |  |  endLine: null
   |  |  |  |  |  |  byRef: false
   |  |  |  |  |  |  unpack: false
   |  |  |  |  |  |  startLine: 3
   |  |  |  |  |  |  name: null
   |  |  |  |  |  |  endLine: null
   |  |  |  |  |  1 => Latte\Compiler\Nodes\Php\ArgumentNode
   |  |  |  |  |  |  value: Latte\Compiler\Nodes\Php\Scalar\IntegerNode
   |  |  |  |  |  |  |  value: 20
   |  |  |  |  |  |  |  kind: 10
   |  |  |  |  |  |  |  startLine: 3
   |  |  |  |  |  |  |  endLine: null
   |  |  |  |  |  |  byRef: false
   |  |  |  |  |  |  unpack: false
   |  |  |  |  |  |  startLine: 3
   |  |  |  |  |  |  name: null
   |  |  |  |  |  |  endLine: null
   |  |  |  |  startLine: 3
   |  |  |  |  endLine: null
   |  |  |  name: Latte\Compiler\Nodes\Php\IdentifierNode
   |  |  |  |  name: 'trim'
   |  |  |  |  startLine: 3
   |  |  |  |  endLine: null
   |  |  |  args: array (0)
   |  |  |  startLine: 3
   |  |  |  endLine: null
   |  |  key: null
   |  |  byRef: false
   |  |  startLine: 3
   |  |  unpack: false
   |  |  endLine: null
   |  3 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Expression\FilterNode
   |  |  |  inner: Latte\Compiler\Nodes\Php\Expression\FilterNode
   |  |  |  |  inner: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  |  name: 'a'
   |  |  |  |  |  startLine: 4
   |  |  |  |  |  endLine: null
   |  |  |  |  name: Latte\Compiler\Nodes\Php\IdentifierNode
   |  |  |  |  |  name: 'truncate'
   |  |  |  |  |  startLine: 4
   |  |  |  |  |  endLine: null
   |  |  |  |  args: array (2)
   |  |  |  |  |  0 => Latte\Compiler\Nodes\Php\ArgumentNode
   |  |  |  |  |  |  value: Latte\Compiler\Nodes\Php\Scalar\IntegerNode
   |  |  |  |  |  |  |  value: 10
   |  |  |  |  |  |  |  kind: 10
   |  |  |  |  |  |  |  startLine: 4
   |  |  |  |  |  |  |  endLine: null
   |  |  |  |  |  |  byRef: false
   |  |  |  |  |  |  unpack: false
   |  |  |  |  |  |  startLine: 4
   |  |  |  |  |  |  name: null
   |  |  |  |  |  |  endLine: null
   |  |  |  |  |  1 => Latte\Compiler\Nodes\Php\ArgumentNode
   |  |  |  |  |  |  value: Latte\Compiler\Nodes\Php\Expression\FilterNode
   |  |  |  |  |  |  |  inner: Latte\Compiler\Nodes\Php\Scalar\IntegerNode
   |  |  |  |  |  |  |  |  value: 20
   |  |  |  |  |  |  |  |  kind: 10
   |  |  |  |  |  |  |  |  startLine: 4
   |  |  |  |  |  |  |  |  endLine: null
   |  |  |  |  |  |  |  name: Latte\Compiler\Nodes\Php\IdentifierNode
   |  |  |  |  |  |  |  |  name: 'round'
   |  |  |  |  |  |  |  |  startLine: 4
   |  |  |  |  |  |  |  |  endLine: null
   |  |  |  |  |  |  |  args: array (0)
   |  |  |  |  |  |  |  startLine: 4
   |  |  |  |  |  |  |  endLine: null
   |  |  |  |  |  |  byRef: false
   |  |  |  |  |  |  unpack: false
   |  |  |  |  |  |  startLine: 4
   |  |  |  |  |  |  name: null
   |  |  |  |  |  |  endLine: null
   |  |  |  |  startLine: 4
   |  |  |  |  endLine: null
   |  |  |  name: Latte\Compiler\Nodes\Php\IdentifierNode
   |  |  |  |  name: 'trim'
   |  |  |  |  startLine: 4
   |  |  |  |  endLine: null
   |  |  |  args: array (0)
   |  |  |  startLine: 4
   |  |  |  endLine: null
   |  |  key: null
   |  |  byRef: false
   |  |  startLine: 4
   |  |  unpack: false
   |  |  endLine: null
   |  4 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Expression\FilterNode
   |  |  |  inner: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  name: 'a'
   |  |  |  |  startLine: 5
   |  |  |  |  endLine: null
   |  |  |  name: Latte\Compiler\Nodes\Php\IdentifierNode
   |  |  |  |  name: 'truncate'
   |  |  |  |  startLine: 5
   |  |  |  |  endLine: null
   |  |  |  args: array (2)
   |  |  |  |  0 => Latte\Compiler\Nodes\Php\ArgumentNode
   |  |  |  |  |  value: Latte\Compiler\Nodes\Php\Scalar\IntegerNode
   |  |  |  |  |  |  value: 10
   |  |  |  |  |  |  kind: 10
   |  |  |  |  |  |  startLine: 5
   |  |  |  |  |  |  endLine: null
   |  |  |  |  |  byRef: false
   |  |  |  |  |  unpack: false
   |  |  |  |  |  startLine: 5
   |  |  |  |  |  name: Latte\Compiler\Nodes\Php\IdentifierNode
   |  |  |  |  |  |  name: 'a'
   |  |  |  |  |  |  startLine: 5
   |  |  |  |  |  |  endLine: null
   |  |  |  |  |  endLine: null
   |  |  |  |  1 => Latte\Compiler\Nodes\Php\ArgumentNode
   |  |  |  |  |  value: Latte\Compiler\Nodes\Php\Expression\ConstantFetchNode
   |  |  |  |  |  |  name: Latte\Compiler\Nodes\Php\NameNode
   |  |  |  |  |  |  |  parts: array (1)
   |  |  |  |  |  |  |  |  0 => 'true'
   |  |  |  |  |  |  |  startLine: 5
   |  |  |  |  |  |  |  endLine: null
   |  |  |  |  |  |  startLine: 5
   |  |  |  |  |  |  endLine: null
   |  |  |  |  |  byRef: false
   |  |  |  |  |  unpack: false
   |  |  |  |  |  startLine: 5
   |  |  |  |  |  name: Latte\Compiler\Nodes\Php\IdentifierNode
   |  |  |  |  |  |  name: 'b'
   |  |  |  |  |  |  startLine: 5
   |  |  |  |  |  |  endLine: null
   |  |  |  |  |  endLine: null
   |  |  |  startLine: 5
   |  |  |  endLine: null
   |  |  key: null
   |  |  byRef: false
   |  |  startLine: 5
   |  |  unpack: false
   |  |  endLine: null
   startLine: null
   endLine: null
