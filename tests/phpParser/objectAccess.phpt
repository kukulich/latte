<?php

// Object access

declare(strict_types=1);

use Tester\Assert;

require __DIR__ . '/../bootstrap.php';

$test = <<<'XX'
	/* property fetch variations */
	$a->b,
	$a->b['c'],

	/* method call variations */
	$a->b(),
	$a->{'b'}(),
	$a->$b(),
	$a->$b['c'](),

	/* array dereferencing */
	$a->b()['c'],
	XX;

$node = parseCode($test);

Assert::same(
	loadContent(__FILE__, __COMPILER_HALT_OFFSET__),
	exportNode($node),
);

__halt_compiler();
Latte\Compiler\Nodes\Php\Expression\ArrayNode
   items: array (7)
   |  0 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Expression\PropertyFetchNode
   |  |  |  name: Latte\Compiler\Nodes\Php\IdentifierNode
   |  |  |  |  name: 'b'
   |  |  |  |  startLine: 2
   |  |  |  |  endLine: null
   |  |  |  var: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  name: 'a'
   |  |  |  |  startLine: 2
   |  |  |  |  endLine: null
   |  |  |  startLine: 2
   |  |  |  endLine: null
   |  |  key: null
   |  |  byRef: false
   |  |  startLine: 2
   |  |  unpack: false
   |  |  endLine: null
   |  1 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Expression\ArrayAccessNode
   |  |  |  var: Latte\Compiler\Nodes\Php\Expression\PropertyFetchNode
   |  |  |  |  name: Latte\Compiler\Nodes\Php\IdentifierNode
   |  |  |  |  |  name: 'b'
   |  |  |  |  |  startLine: 3
   |  |  |  |  |  endLine: null
   |  |  |  |  var: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  |  name: 'a'
   |  |  |  |  |  startLine: 3
   |  |  |  |  |  endLine: null
   |  |  |  |  startLine: 3
   |  |  |  |  endLine: null
   |  |  |  index: Latte\Compiler\Nodes\Php\Scalar\StringNode
   |  |  |  |  value: 'c'
   |  |  |  |  startLine: 3
   |  |  |  |  endLine: null
   |  |  |  startLine: 3
   |  |  |  endLine: null
   |  |  key: null
   |  |  byRef: false
   |  |  startLine: 3
   |  |  unpack: false
   |  |  endLine: null
   |  2 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Expression\MethodCallNode
   |  |  |  var: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  name: 'a'
   |  |  |  |  startLine: 6
   |  |  |  |  endLine: null
   |  |  |  name: Latte\Compiler\Nodes\Php\IdentifierNode
   |  |  |  |  name: 'b'
   |  |  |  |  startLine: 6
   |  |  |  |  endLine: null
   |  |  |  args: array (0)
   |  |  |  startLine: 6
   |  |  |  endLine: null
   |  |  key: null
   |  |  byRef: false
   |  |  startLine: 6
   |  |  unpack: false
   |  |  endLine: null
   |  3 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Expression\MethodCallNode
   |  |  |  var: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  name: 'a'
   |  |  |  |  startLine: 7
   |  |  |  |  endLine: null
   |  |  |  name: Latte\Compiler\Nodes\Php\Scalar\StringNode
   |  |  |  |  value: 'b'
   |  |  |  |  startLine: 7
   |  |  |  |  endLine: null
   |  |  |  args: array (0)
   |  |  |  startLine: 7
   |  |  |  endLine: null
   |  |  key: null
   |  |  byRef: false
   |  |  startLine: 7
   |  |  unpack: false
   |  |  endLine: null
   |  4 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Expression\MethodCallNode
   |  |  |  var: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  name: 'a'
   |  |  |  |  startLine: 8
   |  |  |  |  endLine: null
   |  |  |  name: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  name: 'b'
   |  |  |  |  startLine: 8
   |  |  |  |  endLine: null
   |  |  |  args: array (0)
   |  |  |  startLine: 8
   |  |  |  endLine: null
   |  |  key: null
   |  |  byRef: false
   |  |  startLine: 8
   |  |  unpack: false
   |  |  endLine: null
   |  5 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Expression\FunctionCallNode
   |  |  |  name: Latte\Compiler\Nodes\Php\Expression\ArrayAccessNode
   |  |  |  |  var: Latte\Compiler\Nodes\Php\Expression\PropertyFetchNode
   |  |  |  |  |  name: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  |  |  name: 'b'
   |  |  |  |  |  |  startLine: 9
   |  |  |  |  |  |  endLine: null
   |  |  |  |  |  var: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  |  |  name: 'a'
   |  |  |  |  |  |  startLine: 9
   |  |  |  |  |  |  endLine: null
   |  |  |  |  |  startLine: 9
   |  |  |  |  |  endLine: null
   |  |  |  |  index: Latte\Compiler\Nodes\Php\Scalar\StringNode
   |  |  |  |  |  value: 'c'
   |  |  |  |  |  startLine: 9
   |  |  |  |  |  endLine: null
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
   |  6 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Expression\ArrayAccessNode
   |  |  |  var: Latte\Compiler\Nodes\Php\Expression\MethodCallNode
   |  |  |  |  var: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  |  name: 'a'
   |  |  |  |  |  startLine: 12
   |  |  |  |  |  endLine: null
   |  |  |  |  name: Latte\Compiler\Nodes\Php\IdentifierNode
   |  |  |  |  |  name: 'b'
   |  |  |  |  |  startLine: 12
   |  |  |  |  |  endLine: null
   |  |  |  |  args: array (0)
   |  |  |  |  startLine: 12
   |  |  |  |  endLine: null
   |  |  |  index: Latte\Compiler\Nodes\Php\Scalar\StringNode
   |  |  |  |  value: 'c'
   |  |  |  |  startLine: 12
   |  |  |  |  endLine: null
   |  |  |  startLine: 12
   |  |  |  endLine: null
   |  |  key: null
   |  |  byRef: false
   |  |  startLine: 12
   |  |  unpack: false
   |  |  endLine: null
   startLine: null
   endLine: null
