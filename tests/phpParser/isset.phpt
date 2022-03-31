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
   |  |  |  |  |  var: Latte\Compiler\Nodes\Php\Expression\BinaryOpNode
   |  |  |  |  |  |  left: Latte\Compiler\Nodes\Php\Expression\ArrayNode
   |  |  |  |  |  |  |  items: array (2)
   |  |  |  |  |  |  |  |  0 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  |  |  |  |  |  |  |  value: Latte\Compiler\Nodes\Php\Scalar\IntegerNode
   |  |  |  |  |  |  |  |  |  |  value: 0
   |  |  |  |  |  |  |  |  |  |  kind: 10
   |  |  |  |  |  |  |  |  |  |  startLine: 1
   |  |  |  |  |  |  |  |  |  |  endLine: null
   |  |  |  |  |  |  |  |  |  key: null
   |  |  |  |  |  |  |  |  |  byRef: false
   |  |  |  |  |  |  |  |  |  startLine: 1
   |  |  |  |  |  |  |  |  |  unpack: false
   |  |  |  |  |  |  |  |  |  endLine: null
   |  |  |  |  |  |  |  |  1 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  |  |  |  |  |  |  |  value: Latte\Compiler\Nodes\Php\Scalar\IntegerNode
   |  |  |  |  |  |  |  |  |  |  value: 1
   |  |  |  |  |  |  |  |  |  |  kind: 10
   |  |  |  |  |  |  |  |  |  |  startLine: 1
   |  |  |  |  |  |  |  |  |  |  endLine: null
   |  |  |  |  |  |  |  |  |  key: null
   |  |  |  |  |  |  |  |  |  byRef: false
   |  |  |  |  |  |  |  |  |  startLine: 1
   |  |  |  |  |  |  |  |  |  unpack: false
   |  |  |  |  |  |  |  |  |  endLine: null
   |  |  |  |  |  |  |  startLine: null
   |  |  |  |  |  |  |  endLine: null
   |  |  |  |  |  |  operator: '+'
   |  |  |  |  |  |  right: Latte\Compiler\Nodes\Php\Expression\ArrayNode
   |  |  |  |  |  |  |  items: array (0)
   |  |  |  |  |  |  |  startLine: null
   |  |  |  |  |  |  |  endLine: null
   |  |  |  |  |  |  startLine: 1
   |  |  |  |  |  |  endLine: null
   |  |  |  |  |  index: Latte\Compiler\Nodes\Php\Scalar\IntegerNode
   |  |  |  |  |  |  value: 0
   |  |  |  |  |  |  kind: 10
   |  |  |  |  |  |  startLine: 1
   |  |  |  |  |  |  endLine: null
   |  |  |  |  |  startLine: 1
   |  |  |  |  |  endLine: null
   |  |  |  startLine: 1
   |  |  |  endLine: null
   |  |  key: null
   |  |  byRef: false
   |  |  startLine: 1
   |  |  unpack: false
   |  |  endLine: null
   |  1 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Expression\IssetNode
   |  |  |  vars: array (1)
   |  |  |  |  0 => Latte\Compiler\Nodes\Php\Expression\PropertyFetchNode
   |  |  |  |  |  name: Latte\Compiler\Nodes\Php\IdentifierNode
   |  |  |  |  |  |  name: 'a'
   |  |  |  |  |  |  startLine: 2
   |  |  |  |  |  |  endLine: null
   |  |  |  |  |  var: Latte\Compiler\Nodes\Php\Expression\ArrayNode
   |  |  |  |  |  |  items: array (1)
   |  |  |  |  |  |  |  0 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  |  |  |  |  |  |  value: Latte\Compiler\Nodes\Php\Scalar\StringNode
   |  |  |  |  |  |  |  |  |  value: 'b'
   |  |  |  |  |  |  |  |  |  startLine: 2
   |  |  |  |  |  |  |  |  |  endLine: null
   |  |  |  |  |  |  |  |  key: Latte\Compiler\Nodes\Php\Scalar\StringNode
   |  |  |  |  |  |  |  |  |  value: 'a'
   |  |  |  |  |  |  |  |  |  startLine: 2
   |  |  |  |  |  |  |  |  |  endLine: null
   |  |  |  |  |  |  |  |  byRef: false
   |  |  |  |  |  |  |  |  startLine: 2
   |  |  |  |  |  |  |  |  unpack: false
   |  |  |  |  |  |  |  |  endLine: null
   |  |  |  |  |  |  startLine: null
   |  |  |  |  |  |  endLine: null
   |  |  |  |  |  startLine: 2
   |  |  |  |  |  endLine: null
   |  |  |  startLine: 2
   |  |  |  endLine: null
   |  |  key: null
   |  |  byRef: false
   |  |  startLine: 2
   |  |  unpack: false
   |  |  endLine: null
   |  2 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Expression\IssetNode
   |  |  |  vars: array (1)
   |  |  |  |  0 => Latte\Compiler\Nodes\Php\Expression\PropertyFetchNode
   |  |  |  |  |  name: Latte\Compiler\Nodes\Php\IdentifierNode
   |  |  |  |  |  |  name: 'a'
   |  |  |  |  |  |  startLine: 3
   |  |  |  |  |  |  endLine: null
   |  |  |  |  |  var: Latte\Compiler\Nodes\Php\Scalar\StringNode
   |  |  |  |  |  |  value: 'str'
   |  |  |  |  |  |  startLine: 3
   |  |  |  |  |  |  endLine: null
   |  |  |  |  |  startLine: 3
   |  |  |  |  |  endLine: null
   |  |  |  startLine: 3
   |  |  |  endLine: null
   |  |  key: null
   |  |  byRef: false
   |  |  startLine: 3
   |  |  unpack: false
   |  |  endLine: null
   startLine: null
   endLine: null
