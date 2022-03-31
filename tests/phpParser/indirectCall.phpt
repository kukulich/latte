<?php

// UVS indirect calls

declare(strict_types=1);

use Tester\Assert;

require __DIR__ . '/../bootstrap.php';

$test = <<<'XX'
	id('var_dump')(1),

	id('id')('var_dump')(2),

	id()()('var_dump')(4),

	id(['udef', 'id'])[1]()('var_dump')(5),

	(function($x) { return $x; })('id')('var_dump')(8),

	($f = function($x = null) use (&$f) {
	    return $x ?: $f;
	})()()()('var_dump')(9),

	[$obj, 'id']()('id')($id)('var_dump')(10),

	'id'()('id')('var_dump')(12),

	('i' . 'd')()('var_dump')(13),

	'\id'('var_dump')(14),
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
   |  |  value: Latte\Compiler\Nodes\Php\Expression\FunctionCallNode
   |  |  |  name: Latte\Compiler\Nodes\Php\Expression\FunctionCallNode
   |  |  |  |  name: Latte\Compiler\Nodes\Php\NameNode
   |  |  |  |  |  parts: array (1)
   |  |  |  |  |  |  0 => 'id'
   |  |  |  |  |  startLine: 1
   |  |  |  |  |  endLine: null
   |  |  |  |  args: array (1)
   |  |  |  |  |  0 => Latte\Compiler\Nodes\Php\ArgumentNode
   |  |  |  |  |  |  value: Latte\Compiler\Nodes\Php\Scalar\StringNode
   |  |  |  |  |  |  |  value: 'var_dump'
   |  |  |  |  |  |  |  startLine: 1
   |  |  |  |  |  |  |  endLine: null
   |  |  |  |  |  |  byRef: false
   |  |  |  |  |  |  unpack: false
   |  |  |  |  |  |  startLine: 1
   |  |  |  |  |  |  name: null
   |  |  |  |  |  |  endLine: null
   |  |  |  |  startLine: 1
   |  |  |  |  endLine: null
   |  |  |  args: array (1)
   |  |  |  |  0 => Latte\Compiler\Nodes\Php\ArgumentNode
   |  |  |  |  |  value: Latte\Compiler\Nodes\Php\Scalar\IntegerNode
   |  |  |  |  |  |  value: 1
   |  |  |  |  |  |  kind: 10
   |  |  |  |  |  |  startLine: 1
   |  |  |  |  |  |  endLine: null
   |  |  |  |  |  byRef: false
   |  |  |  |  |  unpack: false
   |  |  |  |  |  startLine: 1
   |  |  |  |  |  name: null
   |  |  |  |  |  endLine: null
   |  |  |  startLine: 1
   |  |  |  endLine: null
   |  |  key: null
   |  |  byRef: false
   |  |  startLine: 1
   |  |  unpack: false
   |  |  endLine: null
   |  1 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Expression\FunctionCallNode
   |  |  |  name: Latte\Compiler\Nodes\Php\Expression\FunctionCallNode
   |  |  |  |  name: Latte\Compiler\Nodes\Php\Expression\FunctionCallNode
   |  |  |  |  |  name: Latte\Compiler\Nodes\Php\NameNode
   |  |  |  |  |  |  parts: array (1)
   |  |  |  |  |  |  |  0 => 'id'
   |  |  |  |  |  |  startLine: 3
   |  |  |  |  |  |  endLine: null
   |  |  |  |  |  args: array (1)
   |  |  |  |  |  |  0 => Latte\Compiler\Nodes\Php\ArgumentNode
   |  |  |  |  |  |  |  value: Latte\Compiler\Nodes\Php\Scalar\StringNode
   |  |  |  |  |  |  |  |  value: 'id'
   |  |  |  |  |  |  |  |  startLine: 3
   |  |  |  |  |  |  |  |  endLine: null
   |  |  |  |  |  |  |  byRef: false
   |  |  |  |  |  |  |  unpack: false
   |  |  |  |  |  |  |  startLine: 3
   |  |  |  |  |  |  |  name: null
   |  |  |  |  |  |  |  endLine: null
   |  |  |  |  |  startLine: 3
   |  |  |  |  |  endLine: null
   |  |  |  |  args: array (1)
   |  |  |  |  |  0 => Latte\Compiler\Nodes\Php\ArgumentNode
   |  |  |  |  |  |  value: Latte\Compiler\Nodes\Php\Scalar\StringNode
   |  |  |  |  |  |  |  value: 'var_dump'
   |  |  |  |  |  |  |  startLine: 3
   |  |  |  |  |  |  |  endLine: null
   |  |  |  |  |  |  byRef: false
   |  |  |  |  |  |  unpack: false
   |  |  |  |  |  |  startLine: 3
   |  |  |  |  |  |  name: null
   |  |  |  |  |  |  endLine: null
   |  |  |  |  startLine: 3
   |  |  |  |  endLine: null
   |  |  |  args: array (1)
   |  |  |  |  0 => Latte\Compiler\Nodes\Php\ArgumentNode
   |  |  |  |  |  value: Latte\Compiler\Nodes\Php\Scalar\IntegerNode
   |  |  |  |  |  |  value: 2
   |  |  |  |  |  |  kind: 10
   |  |  |  |  |  |  startLine: 3
   |  |  |  |  |  |  endLine: null
   |  |  |  |  |  byRef: false
   |  |  |  |  |  unpack: false
   |  |  |  |  |  startLine: 3
   |  |  |  |  |  name: null
   |  |  |  |  |  endLine: null
   |  |  |  startLine: 3
   |  |  |  endLine: null
   |  |  key: null
   |  |  byRef: false
   |  |  startLine: 3
   |  |  unpack: false
   |  |  endLine: null
   |  2 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Expression\FunctionCallNode
   |  |  |  name: Latte\Compiler\Nodes\Php\Expression\FunctionCallNode
   |  |  |  |  name: Latte\Compiler\Nodes\Php\Expression\FunctionCallNode
   |  |  |  |  |  name: Latte\Compiler\Nodes\Php\Expression\FunctionCallNode
   |  |  |  |  |  |  name: Latte\Compiler\Nodes\Php\NameNode
   |  |  |  |  |  |  |  parts: array (1)
   |  |  |  |  |  |  |  |  0 => 'id'
   |  |  |  |  |  |  |  startLine: 5
   |  |  |  |  |  |  |  endLine: null
   |  |  |  |  |  |  args: array (0)
   |  |  |  |  |  |  startLine: 5
   |  |  |  |  |  |  endLine: null
   |  |  |  |  |  args: array (0)
   |  |  |  |  |  startLine: 5
   |  |  |  |  |  endLine: null
   |  |  |  |  args: array (1)
   |  |  |  |  |  0 => Latte\Compiler\Nodes\Php\ArgumentNode
   |  |  |  |  |  |  value: Latte\Compiler\Nodes\Php\Scalar\StringNode
   |  |  |  |  |  |  |  value: 'var_dump'
   |  |  |  |  |  |  |  startLine: 5
   |  |  |  |  |  |  |  endLine: null
   |  |  |  |  |  |  byRef: false
   |  |  |  |  |  |  unpack: false
   |  |  |  |  |  |  startLine: 5
   |  |  |  |  |  |  name: null
   |  |  |  |  |  |  endLine: null
   |  |  |  |  startLine: 5
   |  |  |  |  endLine: null
   |  |  |  args: array (1)
   |  |  |  |  0 => Latte\Compiler\Nodes\Php\ArgumentNode
   |  |  |  |  |  value: Latte\Compiler\Nodes\Php\Scalar\IntegerNode
   |  |  |  |  |  |  value: 4
   |  |  |  |  |  |  kind: 10
   |  |  |  |  |  |  startLine: 5
   |  |  |  |  |  |  endLine: null
   |  |  |  |  |  byRef: false
   |  |  |  |  |  unpack: false
   |  |  |  |  |  startLine: 5
   |  |  |  |  |  name: null
   |  |  |  |  |  endLine: null
   |  |  |  startLine: 5
   |  |  |  endLine: null
   |  |  key: null
   |  |  byRef: false
   |  |  startLine: 5
   |  |  unpack: false
   |  |  endLine: null
   |  3 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Expression\FunctionCallNode
   |  |  |  name: Latte\Compiler\Nodes\Php\Expression\FunctionCallNode
   |  |  |  |  name: Latte\Compiler\Nodes\Php\Expression\FunctionCallNode
   |  |  |  |  |  name: Latte\Compiler\Nodes\Php\Expression\ArrayAccessNode
   |  |  |  |  |  |  var: Latte\Compiler\Nodes\Php\Expression\FunctionCallNode
   |  |  |  |  |  |  |  name: Latte\Compiler\Nodes\Php\NameNode
   |  |  |  |  |  |  |  |  parts: array (1)
   |  |  |  |  |  |  |  |  |  0 => 'id'
   |  |  |  |  |  |  |  |  startLine: 7
   |  |  |  |  |  |  |  |  endLine: null
   |  |  |  |  |  |  |  args: array (1)
   |  |  |  |  |  |  |  |  0 => Latte\Compiler\Nodes\Php\ArgumentNode
   |  |  |  |  |  |  |  |  |  value: Latte\Compiler\Nodes\Php\Expression\ArrayNode
   |  |  |  |  |  |  |  |  |  |  items: array (2)
   |  |  |  |  |  |  |  |  |  |  |  0 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  |  |  |  |  |  |  |  |  |  |  value: Latte\Compiler\Nodes\Php\Scalar\StringNode
   |  |  |  |  |  |  |  |  |  |  |  |  |  value: 'udef'
   |  |  |  |  |  |  |  |  |  |  |  |  |  startLine: 7
   |  |  |  |  |  |  |  |  |  |  |  |  |  endLine: null
   |  |  |  |  |  |  |  |  |  |  |  |  key: null
   |  |  |  |  |  |  |  |  |  |  |  |  byRef: false
   |  |  |  |  |  |  |  |  |  |  |  |  startLine: 7
   |  |  |  |  |  |  |  |  |  |  |  |  unpack: false
   |  |  |  |  |  |  |  |  |  |  |  |  endLine: null
   |  |  |  |  |  |  |  |  |  |  |  1 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  |  |  |  |  |  |  |  |  |  |  value: Latte\Compiler\Nodes\Php\Scalar\StringNode
   |  |  |  |  |  |  |  |  |  |  |  |  |  value: 'id'
   |  |  |  |  |  |  |  |  |  |  |  |  |  startLine: 7
   |  |  |  |  |  |  |  |  |  |  |  |  |  endLine: null
   |  |  |  |  |  |  |  |  |  |  |  |  key: null
   |  |  |  |  |  |  |  |  |  |  |  |  byRef: false
   |  |  |  |  |  |  |  |  |  |  |  |  startLine: 7
   |  |  |  |  |  |  |  |  |  |  |  |  unpack: false
   |  |  |  |  |  |  |  |  |  |  |  |  endLine: null
   |  |  |  |  |  |  |  |  |  |  startLine: null
   |  |  |  |  |  |  |  |  |  |  endLine: null
   |  |  |  |  |  |  |  |  |  byRef: false
   |  |  |  |  |  |  |  |  |  unpack: false
   |  |  |  |  |  |  |  |  |  startLine: 7
   |  |  |  |  |  |  |  |  |  name: null
   |  |  |  |  |  |  |  |  |  endLine: null
   |  |  |  |  |  |  |  startLine: 7
   |  |  |  |  |  |  |  endLine: null
   |  |  |  |  |  |  index: Latte\Compiler\Nodes\Php\Scalar\IntegerNode
   |  |  |  |  |  |  |  value: 1
   |  |  |  |  |  |  |  kind: 10
   |  |  |  |  |  |  |  startLine: 7
   |  |  |  |  |  |  |  endLine: null
   |  |  |  |  |  |  startLine: 7
   |  |  |  |  |  |  endLine: null
   |  |  |  |  |  args: array (0)
   |  |  |  |  |  startLine: 7
   |  |  |  |  |  endLine: null
   |  |  |  |  args: array (1)
   |  |  |  |  |  0 => Latte\Compiler\Nodes\Php\ArgumentNode
   |  |  |  |  |  |  value: Latte\Compiler\Nodes\Php\Scalar\StringNode
   |  |  |  |  |  |  |  value: 'var_dump'
   |  |  |  |  |  |  |  startLine: 7
   |  |  |  |  |  |  |  endLine: null
   |  |  |  |  |  |  byRef: false
   |  |  |  |  |  |  unpack: false
   |  |  |  |  |  |  startLine: 7
   |  |  |  |  |  |  name: null
   |  |  |  |  |  |  endLine: null
   |  |  |  |  startLine: 7
   |  |  |  |  endLine: null
   |  |  |  args: array (1)
   |  |  |  |  0 => Latte\Compiler\Nodes\Php\ArgumentNode
   |  |  |  |  |  value: Latte\Compiler\Nodes\Php\Scalar\IntegerNode
   |  |  |  |  |  |  value: 5
   |  |  |  |  |  |  kind: 10
   |  |  |  |  |  |  startLine: 7
   |  |  |  |  |  |  endLine: null
   |  |  |  |  |  byRef: false
   |  |  |  |  |  unpack: false
   |  |  |  |  |  startLine: 7
   |  |  |  |  |  name: null
   |  |  |  |  |  endLine: null
   |  |  |  startLine: 7
   |  |  |  endLine: null
   |  |  key: null
   |  |  byRef: false
   |  |  startLine: 7
   |  |  unpack: false
   |  |  endLine: null
   |  4 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Expression\FunctionCallNode
   |  |  |  name: Latte\Compiler\Nodes\Php\Expression\FunctionCallNode
   |  |  |  |  name: Latte\Compiler\Nodes\Php\Expression\FunctionCallNode
   |  |  |  |  |  name: Latte\Compiler\Nodes\Php\Expression\ClosureNode
   |  |  |  |  |  |  byRef: false
   |  |  |  |  |  |  params: array (1)
   |  |  |  |  |  |  |  0 => Latte\Compiler\Nodes\Php\ParameterNode
   |  |  |  |  |  |  |  |  type: null
   |  |  |  |  |  |  |  |  var: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  |  |  |  |  |  name: 'x'
   |  |  |  |  |  |  |  |  |  startLine: 9
   |  |  |  |  |  |  |  |  |  endLine: null
   |  |  |  |  |  |  |  |  default: null
   |  |  |  |  |  |  |  |  byRef: false
   |  |  |  |  |  |  |  |  variadic: false
   |  |  |  |  |  |  |  |  startLine: 9
   |  |  |  |  |  |  |  |  flags: 0
   |  |  |  |  |  |  |  |  endLine: null
   |  |  |  |  |  |  uses: array (0)
   |  |  |  |  |  |  returnType: null
   |  |  |  |  |  |  expr: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  |  |  |  name: 'x'
   |  |  |  |  |  |  |  startLine: 9
   |  |  |  |  |  |  |  endLine: null
   |  |  |  |  |  |  startLine: 9
   |  |  |  |  |  |  endLine: null
   |  |  |  |  |  args: array (1)
   |  |  |  |  |  |  0 => Latte\Compiler\Nodes\Php\ArgumentNode
   |  |  |  |  |  |  |  value: Latte\Compiler\Nodes\Php\Scalar\StringNode
   |  |  |  |  |  |  |  |  value: 'id'
   |  |  |  |  |  |  |  |  startLine: 9
   |  |  |  |  |  |  |  |  endLine: null
   |  |  |  |  |  |  |  byRef: false
   |  |  |  |  |  |  |  unpack: false
   |  |  |  |  |  |  |  startLine: 9
   |  |  |  |  |  |  |  name: null
   |  |  |  |  |  |  |  endLine: null
   |  |  |  |  |  startLine: 9
   |  |  |  |  |  endLine: null
   |  |  |  |  args: array (1)
   |  |  |  |  |  0 => Latte\Compiler\Nodes\Php\ArgumentNode
   |  |  |  |  |  |  value: Latte\Compiler\Nodes\Php\Scalar\StringNode
   |  |  |  |  |  |  |  value: 'var_dump'
   |  |  |  |  |  |  |  startLine: 9
   |  |  |  |  |  |  |  endLine: null
   |  |  |  |  |  |  byRef: false
   |  |  |  |  |  |  unpack: false
   |  |  |  |  |  |  startLine: 9
   |  |  |  |  |  |  name: null
   |  |  |  |  |  |  endLine: null
   |  |  |  |  startLine: 9
   |  |  |  |  endLine: null
   |  |  |  args: array (1)
   |  |  |  |  0 => Latte\Compiler\Nodes\Php\ArgumentNode
   |  |  |  |  |  value: Latte\Compiler\Nodes\Php\Scalar\IntegerNode
   |  |  |  |  |  |  value: 8
   |  |  |  |  |  |  kind: 10
   |  |  |  |  |  |  startLine: 9
   |  |  |  |  |  |  endLine: null
   |  |  |  |  |  byRef: false
   |  |  |  |  |  unpack: false
   |  |  |  |  |  startLine: 9
   |  |  |  |  |  name: null
   |  |  |  |  |  endLine: null
   |  |  |  startLine: 9
   |  |  |  endLine: null
   |  |  key: null
   |  |  byRef: false
   |  |  startLine: 9
   |  |  unpack: false
   |  |  endLine: null
   |  5 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Expression\FunctionCallNode
   |  |  |  name: Latte\Compiler\Nodes\Php\Expression\FunctionCallNode
   |  |  |  |  name: Latte\Compiler\Nodes\Php\Expression\FunctionCallNode
   |  |  |  |  |  name: Latte\Compiler\Nodes\Php\Expression\FunctionCallNode
   |  |  |  |  |  |  name: Latte\Compiler\Nodes\Php\Expression\FunctionCallNode
   |  |  |  |  |  |  |  name: Latte\Compiler\Nodes\Php\Expression\AssignNode
   |  |  |  |  |  |  |  |  var: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  |  |  |  |  |  name: 'f'
   |  |  |  |  |  |  |  |  |  startLine: 11
   |  |  |  |  |  |  |  |  |  endLine: null
   |  |  |  |  |  |  |  |  expr: Latte\Compiler\Nodes\Php\Expression\ClosureNode
   |  |  |  |  |  |  |  |  |  byRef: false
   |  |  |  |  |  |  |  |  |  params: array (1)
   |  |  |  |  |  |  |  |  |  |  0 => Latte\Compiler\Nodes\Php\ParameterNode
   |  |  |  |  |  |  |  |  |  |  |  type: null
   |  |  |  |  |  |  |  |  |  |  |  var: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  |  |  |  |  |  |  |  |  name: 'x'
   |  |  |  |  |  |  |  |  |  |  |  |  startLine: 11
   |  |  |  |  |  |  |  |  |  |  |  |  endLine: null
   |  |  |  |  |  |  |  |  |  |  |  default: Latte\Compiler\Nodes\Php\Expression\ConstantFetchNode
   |  |  |  |  |  |  |  |  |  |  |  |  name: Latte\Compiler\Nodes\Php\NameNode
   |  |  |  |  |  |  |  |  |  |  |  |  |  parts: array (1)
   |  |  |  |  |  |  |  |  |  |  |  |  |  |  0 => 'null'
   |  |  |  |  |  |  |  |  |  |  |  |  |  startLine: 11
   |  |  |  |  |  |  |  |  |  |  |  |  |  endLine: null
   |  |  |  |  |  |  |  |  |  |  |  |  startLine: 11
   |  |  |  |  |  |  |  |  |  |  |  |  endLine: null
   |  |  |  |  |  |  |  |  |  |  |  byRef: false
   |  |  |  |  |  |  |  |  |  |  |  variadic: false
   |  |  |  |  |  |  |  |  |  |  |  startLine: 11
   |  |  |  |  |  |  |  |  |  |  |  flags: 0
   |  |  |  |  |  |  |  |  |  |  |  endLine: null
   |  |  |  |  |  |  |  |  |  uses: array (1)
   |  |  |  |  |  |  |  |  |  |  0 => Latte\Compiler\Nodes\Php\Expression\ClosureUseNode
   |  |  |  |  |  |  |  |  |  |  |  var: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  |  |  |  |  |  |  |  |  name: 'f'
   |  |  |  |  |  |  |  |  |  |  |  |  startLine: 11
   |  |  |  |  |  |  |  |  |  |  |  |  endLine: null
   |  |  |  |  |  |  |  |  |  |  |  byRef: true
   |  |  |  |  |  |  |  |  |  |  |  startLine: 11
   |  |  |  |  |  |  |  |  |  |  |  endLine: null
   |  |  |  |  |  |  |  |  |  returnType: null
   |  |  |  |  |  |  |  |  |  expr: Latte\Compiler\Nodes\Php\Expression\TernaryNode
   |  |  |  |  |  |  |  |  |  |  cond: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  |  |  |  |  |  |  |  name: 'x'
   |  |  |  |  |  |  |  |  |  |  |  startLine: 12
   |  |  |  |  |  |  |  |  |  |  |  endLine: null
   |  |  |  |  |  |  |  |  |  |  if: null
   |  |  |  |  |  |  |  |  |  |  else: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  |  |  |  |  |  |  |  name: 'f'
   |  |  |  |  |  |  |  |  |  |  |  startLine: 12
   |  |  |  |  |  |  |  |  |  |  |  endLine: null
   |  |  |  |  |  |  |  |  |  |  startLine: 12
   |  |  |  |  |  |  |  |  |  |  endLine: null
   |  |  |  |  |  |  |  |  |  startLine: 11
   |  |  |  |  |  |  |  |  |  endLine: null
   |  |  |  |  |  |  |  |  byRef: false
   |  |  |  |  |  |  |  |  startLine: 11
   |  |  |  |  |  |  |  |  endLine: null
   |  |  |  |  |  |  |  args: array (0)
   |  |  |  |  |  |  |  startLine: 11
   |  |  |  |  |  |  |  endLine: null
   |  |  |  |  |  |  args: array (0)
   |  |  |  |  |  |  startLine: 11
   |  |  |  |  |  |  endLine: null
   |  |  |  |  |  args: array (0)
   |  |  |  |  |  startLine: 11
   |  |  |  |  |  endLine: null
   |  |  |  |  args: array (1)
   |  |  |  |  |  0 => Latte\Compiler\Nodes\Php\ArgumentNode
   |  |  |  |  |  |  value: Latte\Compiler\Nodes\Php\Scalar\StringNode
   |  |  |  |  |  |  |  value: 'var_dump'
   |  |  |  |  |  |  |  startLine: 13
   |  |  |  |  |  |  |  endLine: null
   |  |  |  |  |  |  byRef: false
   |  |  |  |  |  |  unpack: false
   |  |  |  |  |  |  startLine: 13
   |  |  |  |  |  |  name: null
   |  |  |  |  |  |  endLine: null
   |  |  |  |  startLine: 11
   |  |  |  |  endLine: null
   |  |  |  args: array (1)
   |  |  |  |  0 => Latte\Compiler\Nodes\Php\ArgumentNode
   |  |  |  |  |  value: Latte\Compiler\Nodes\Php\Scalar\IntegerNode
   |  |  |  |  |  |  value: 9
   |  |  |  |  |  |  kind: 10
   |  |  |  |  |  |  startLine: 13
   |  |  |  |  |  |  endLine: null
   |  |  |  |  |  byRef: false
   |  |  |  |  |  unpack: false
   |  |  |  |  |  startLine: 13
   |  |  |  |  |  name: null
   |  |  |  |  |  endLine: null
   |  |  |  startLine: 11
   |  |  |  endLine: null
   |  |  key: null
   |  |  byRef: false
   |  |  startLine: 11
   |  |  unpack: false
   |  |  endLine: null
   |  6 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Expression\FunctionCallNode
   |  |  |  name: Latte\Compiler\Nodes\Php\Expression\FunctionCallNode
   |  |  |  |  name: Latte\Compiler\Nodes\Php\Expression\FunctionCallNode
   |  |  |  |  |  name: Latte\Compiler\Nodes\Php\Expression\FunctionCallNode
   |  |  |  |  |  |  name: Latte\Compiler\Nodes\Php\Expression\FunctionCallNode
   |  |  |  |  |  |  |  name: Latte\Compiler\Nodes\Php\Expression\ArrayNode
   |  |  |  |  |  |  |  |  items: array (2)
   |  |  |  |  |  |  |  |  |  0 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  |  |  |  |  |  |  |  |  value: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  |  |  |  |  |  |  |  name: 'obj'
   |  |  |  |  |  |  |  |  |  |  |  startLine: 15
   |  |  |  |  |  |  |  |  |  |  |  endLine: null
   |  |  |  |  |  |  |  |  |  |  key: null
   |  |  |  |  |  |  |  |  |  |  byRef: false
   |  |  |  |  |  |  |  |  |  |  startLine: 15
   |  |  |  |  |  |  |  |  |  |  unpack: false
   |  |  |  |  |  |  |  |  |  |  endLine: null
   |  |  |  |  |  |  |  |  |  1 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  |  |  |  |  |  |  |  |  value: Latte\Compiler\Nodes\Php\Scalar\StringNode
   |  |  |  |  |  |  |  |  |  |  |  value: 'id'
   |  |  |  |  |  |  |  |  |  |  |  startLine: 15
   |  |  |  |  |  |  |  |  |  |  |  endLine: null
   |  |  |  |  |  |  |  |  |  |  key: null
   |  |  |  |  |  |  |  |  |  |  byRef: false
   |  |  |  |  |  |  |  |  |  |  startLine: 15
   |  |  |  |  |  |  |  |  |  |  unpack: false
   |  |  |  |  |  |  |  |  |  |  endLine: null
   |  |  |  |  |  |  |  |  startLine: null
   |  |  |  |  |  |  |  |  endLine: null
   |  |  |  |  |  |  |  args: array (0)
   |  |  |  |  |  |  |  startLine: 15
   |  |  |  |  |  |  |  endLine: null
   |  |  |  |  |  |  args: array (1)
   |  |  |  |  |  |  |  0 => Latte\Compiler\Nodes\Php\ArgumentNode
   |  |  |  |  |  |  |  |  value: Latte\Compiler\Nodes\Php\Scalar\StringNode
   |  |  |  |  |  |  |  |  |  value: 'id'
   |  |  |  |  |  |  |  |  |  startLine: 15
   |  |  |  |  |  |  |  |  |  endLine: null
   |  |  |  |  |  |  |  |  byRef: false
   |  |  |  |  |  |  |  |  unpack: false
   |  |  |  |  |  |  |  |  startLine: 15
   |  |  |  |  |  |  |  |  name: null
   |  |  |  |  |  |  |  |  endLine: null
   |  |  |  |  |  |  startLine: 15
   |  |  |  |  |  |  endLine: null
   |  |  |  |  |  args: array (1)
   |  |  |  |  |  |  0 => Latte\Compiler\Nodes\Php\ArgumentNode
   |  |  |  |  |  |  |  value: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  |  |  |  |  name: 'id'
   |  |  |  |  |  |  |  |  startLine: 15
   |  |  |  |  |  |  |  |  endLine: null
   |  |  |  |  |  |  |  byRef: false
   |  |  |  |  |  |  |  unpack: false
   |  |  |  |  |  |  |  startLine: 15
   |  |  |  |  |  |  |  name: null
   |  |  |  |  |  |  |  endLine: null
   |  |  |  |  |  startLine: 15
   |  |  |  |  |  endLine: null
   |  |  |  |  args: array (1)
   |  |  |  |  |  0 => Latte\Compiler\Nodes\Php\ArgumentNode
   |  |  |  |  |  |  value: Latte\Compiler\Nodes\Php\Scalar\StringNode
   |  |  |  |  |  |  |  value: 'var_dump'
   |  |  |  |  |  |  |  startLine: 15
   |  |  |  |  |  |  |  endLine: null
   |  |  |  |  |  |  byRef: false
   |  |  |  |  |  |  unpack: false
   |  |  |  |  |  |  startLine: 15
   |  |  |  |  |  |  name: null
   |  |  |  |  |  |  endLine: null
   |  |  |  |  startLine: 15
   |  |  |  |  endLine: null
   |  |  |  args: array (1)
   |  |  |  |  0 => Latte\Compiler\Nodes\Php\ArgumentNode
   |  |  |  |  |  value: Latte\Compiler\Nodes\Php\Scalar\IntegerNode
   |  |  |  |  |  |  value: 10
   |  |  |  |  |  |  kind: 10
   |  |  |  |  |  |  startLine: 15
   |  |  |  |  |  |  endLine: null
   |  |  |  |  |  byRef: false
   |  |  |  |  |  unpack: false
   |  |  |  |  |  startLine: 15
   |  |  |  |  |  name: null
   |  |  |  |  |  endLine: null
   |  |  |  startLine: 15
   |  |  |  endLine: null
   |  |  key: null
   |  |  byRef: false
   |  |  startLine: 15
   |  |  unpack: false
   |  |  endLine: null
   |  7 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Expression\FunctionCallNode
   |  |  |  name: Latte\Compiler\Nodes\Php\Expression\FunctionCallNode
   |  |  |  |  name: Latte\Compiler\Nodes\Php\Expression\FunctionCallNode
   |  |  |  |  |  name: Latte\Compiler\Nodes\Php\Expression\FunctionCallNode
   |  |  |  |  |  |  name: Latte\Compiler\Nodes\Php\Scalar\StringNode
   |  |  |  |  |  |  |  value: 'id'
   |  |  |  |  |  |  |  startLine: 17
   |  |  |  |  |  |  |  endLine: null
   |  |  |  |  |  |  args: array (0)
   |  |  |  |  |  |  startLine: 17
   |  |  |  |  |  |  endLine: null
   |  |  |  |  |  args: array (1)
   |  |  |  |  |  |  0 => Latte\Compiler\Nodes\Php\ArgumentNode
   |  |  |  |  |  |  |  value: Latte\Compiler\Nodes\Php\Scalar\StringNode
   |  |  |  |  |  |  |  |  value: 'id'
   |  |  |  |  |  |  |  |  startLine: 17
   |  |  |  |  |  |  |  |  endLine: null
   |  |  |  |  |  |  |  byRef: false
   |  |  |  |  |  |  |  unpack: false
   |  |  |  |  |  |  |  startLine: 17
   |  |  |  |  |  |  |  name: null
   |  |  |  |  |  |  |  endLine: null
   |  |  |  |  |  startLine: 17
   |  |  |  |  |  endLine: null
   |  |  |  |  args: array (1)
   |  |  |  |  |  0 => Latte\Compiler\Nodes\Php\ArgumentNode
   |  |  |  |  |  |  value: Latte\Compiler\Nodes\Php\Scalar\StringNode
   |  |  |  |  |  |  |  value: 'var_dump'
   |  |  |  |  |  |  |  startLine: 17
   |  |  |  |  |  |  |  endLine: null
   |  |  |  |  |  |  byRef: false
   |  |  |  |  |  |  unpack: false
   |  |  |  |  |  |  startLine: 17
   |  |  |  |  |  |  name: null
   |  |  |  |  |  |  endLine: null
   |  |  |  |  startLine: 17
   |  |  |  |  endLine: null
   |  |  |  args: array (1)
   |  |  |  |  0 => Latte\Compiler\Nodes\Php\ArgumentNode
   |  |  |  |  |  value: Latte\Compiler\Nodes\Php\Scalar\IntegerNode
   |  |  |  |  |  |  value: 12
   |  |  |  |  |  |  kind: 10
   |  |  |  |  |  |  startLine: 17
   |  |  |  |  |  |  endLine: null
   |  |  |  |  |  byRef: false
   |  |  |  |  |  unpack: false
   |  |  |  |  |  startLine: 17
   |  |  |  |  |  name: null
   |  |  |  |  |  endLine: null
   |  |  |  startLine: 17
   |  |  |  endLine: null
   |  |  key: null
   |  |  byRef: false
   |  |  startLine: 17
   |  |  unpack: false
   |  |  endLine: null
   |  8 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Expression\FunctionCallNode
   |  |  |  name: Latte\Compiler\Nodes\Php\Expression\FunctionCallNode
   |  |  |  |  name: Latte\Compiler\Nodes\Php\Expression\FunctionCallNode
   |  |  |  |  |  name: Latte\Compiler\Nodes\Php\Expression\BinaryOpNode
   |  |  |  |  |  |  left: Latte\Compiler\Nodes\Php\Scalar\StringNode
   |  |  |  |  |  |  |  value: 'i'
   |  |  |  |  |  |  |  startLine: 19
   |  |  |  |  |  |  |  endLine: null
   |  |  |  |  |  |  operator: '.'
   |  |  |  |  |  |  right: Latte\Compiler\Nodes\Php\Scalar\StringNode
   |  |  |  |  |  |  |  value: 'd'
   |  |  |  |  |  |  |  startLine: 19
   |  |  |  |  |  |  |  endLine: null
   |  |  |  |  |  |  startLine: 19
   |  |  |  |  |  |  endLine: null
   |  |  |  |  |  args: array (0)
   |  |  |  |  |  startLine: 19
   |  |  |  |  |  endLine: null
   |  |  |  |  args: array (1)
   |  |  |  |  |  0 => Latte\Compiler\Nodes\Php\ArgumentNode
   |  |  |  |  |  |  value: Latte\Compiler\Nodes\Php\Scalar\StringNode
   |  |  |  |  |  |  |  value: 'var_dump'
   |  |  |  |  |  |  |  startLine: 19
   |  |  |  |  |  |  |  endLine: null
   |  |  |  |  |  |  byRef: false
   |  |  |  |  |  |  unpack: false
   |  |  |  |  |  |  startLine: 19
   |  |  |  |  |  |  name: null
   |  |  |  |  |  |  endLine: null
   |  |  |  |  startLine: 19
   |  |  |  |  endLine: null
   |  |  |  args: array (1)
   |  |  |  |  0 => Latte\Compiler\Nodes\Php\ArgumentNode
   |  |  |  |  |  value: Latte\Compiler\Nodes\Php\Scalar\IntegerNode
   |  |  |  |  |  |  value: 13
   |  |  |  |  |  |  kind: 10
   |  |  |  |  |  |  startLine: 19
   |  |  |  |  |  |  endLine: null
   |  |  |  |  |  byRef: false
   |  |  |  |  |  unpack: false
   |  |  |  |  |  startLine: 19
   |  |  |  |  |  name: null
   |  |  |  |  |  endLine: null
   |  |  |  startLine: 19
   |  |  |  endLine: null
   |  |  key: null
   |  |  byRef: false
   |  |  startLine: 19
   |  |  unpack: false
   |  |  endLine: null
   |  9 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Expression\FunctionCallNode
   |  |  |  name: Latte\Compiler\Nodes\Php\Expression\FunctionCallNode
   |  |  |  |  name: Latte\Compiler\Nodes\Php\Scalar\StringNode
   |  |  |  |  |  value: '\id'
   |  |  |  |  |  startLine: 21
   |  |  |  |  |  endLine: null
   |  |  |  |  args: array (1)
   |  |  |  |  |  0 => Latte\Compiler\Nodes\Php\ArgumentNode
   |  |  |  |  |  |  value: Latte\Compiler\Nodes\Php\Scalar\StringNode
   |  |  |  |  |  |  |  value: 'var_dump'
   |  |  |  |  |  |  |  startLine: 21
   |  |  |  |  |  |  |  endLine: null
   |  |  |  |  |  |  byRef: false
   |  |  |  |  |  |  unpack: false
   |  |  |  |  |  |  startLine: 21
   |  |  |  |  |  |  name: null
   |  |  |  |  |  |  endLine: null
   |  |  |  |  startLine: 21
   |  |  |  |  endLine: null
   |  |  |  args: array (1)
   |  |  |  |  0 => Latte\Compiler\Nodes\Php\ArgumentNode
   |  |  |  |  |  value: Latte\Compiler\Nodes\Php\Scalar\IntegerNode
   |  |  |  |  |  |  value: 14
   |  |  |  |  |  |  kind: 10
   |  |  |  |  |  |  startLine: 21
   |  |  |  |  |  |  endLine: null
   |  |  |  |  |  byRef: false
   |  |  |  |  |  unpack: false
   |  |  |  |  |  startLine: 21
   |  |  |  |  |  name: null
   |  |  |  |  |  endLine: null
   |  |  |  startLine: 21
   |  |  |  endLine: null
   |  |  key: null
   |  |  byRef: false
   |  |  startLine: 21
   |  |  unpack: false
   |  |  endLine: null
   startLine: null
   endLine: null
