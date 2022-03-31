<?php

// Type hints

declare(strict_types=1);

use Tester\Assert;

require __DIR__ . '/../bootstrap.php';

$test = <<<'XX'
	function (
		$a,
		array $b,
		callable $c,
		E $d,
	    ?Foo $e,
	    A|iterable|null $f,
	    A&B $g,
	): never { return null; }
	XX;

$node = parseCode($test);

Assert::same(
	loadContent(__FILE__, __COMPILER_HALT_OFFSET__),
	exportNode($node),
);

__halt_compiler();
Latte\Compiler\Nodes\Php\Expression\ArrayNode
   items: array (1)
   |  0 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Expression\ClosureNode
   |  |  |  byRef: false
   |  |  |  params: array (7)
   |  |  |  |  0 => Latte\Compiler\Nodes\Php\ParameterNode
   |  |  |  |  |  type: null
   |  |  |  |  |  var: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  |  |  name: 'a'
   |  |  |  |  |  |  startLine: 2
   |  |  |  |  |  |  endLine: null
   |  |  |  |  |  default: null
   |  |  |  |  |  byRef: false
   |  |  |  |  |  variadic: false
   |  |  |  |  |  startLine: 2
   |  |  |  |  |  flags: 0
   |  |  |  |  |  endLine: null
   |  |  |  |  1 => Latte\Compiler\Nodes\Php\ParameterNode
   |  |  |  |  |  type: Latte\Compiler\Nodes\Php\IdentifierNode
   |  |  |  |  |  |  name: 'array'
   |  |  |  |  |  |  startLine: 3
   |  |  |  |  |  |  endLine: null
   |  |  |  |  |  var: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  |  |  name: 'b'
   |  |  |  |  |  |  startLine: 3
   |  |  |  |  |  |  endLine: null
   |  |  |  |  |  default: null
   |  |  |  |  |  byRef: false
   |  |  |  |  |  variadic: false
   |  |  |  |  |  startLine: 3
   |  |  |  |  |  flags: 0
   |  |  |  |  |  endLine: null
   |  |  |  |  2 => Latte\Compiler\Nodes\Php\ParameterNode
   |  |  |  |  |  type: Latte\Compiler\Nodes\Php\NameNode
   |  |  |  |  |  |  parts: array (1)
   |  |  |  |  |  |  |  0 => 'callable'
   |  |  |  |  |  |  startLine: 4
   |  |  |  |  |  |  endLine: null
   |  |  |  |  |  var: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  |  |  name: 'c'
   |  |  |  |  |  |  startLine: 4
   |  |  |  |  |  |  endLine: null
   |  |  |  |  |  default: null
   |  |  |  |  |  byRef: false
   |  |  |  |  |  variadic: false
   |  |  |  |  |  startLine: 4
   |  |  |  |  |  flags: 0
   |  |  |  |  |  endLine: null
   |  |  |  |  3 => Latte\Compiler\Nodes\Php\ParameterNode
   |  |  |  |  |  type: Latte\Compiler\Nodes\Php\NameNode
   |  |  |  |  |  |  parts: array (1)
   |  |  |  |  |  |  |  0 => 'E'
   |  |  |  |  |  |  startLine: 5
   |  |  |  |  |  |  endLine: null
   |  |  |  |  |  var: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  |  |  name: 'd'
   |  |  |  |  |  |  startLine: 5
   |  |  |  |  |  |  endLine: null
   |  |  |  |  |  default: null
   |  |  |  |  |  byRef: false
   |  |  |  |  |  variadic: false
   |  |  |  |  |  startLine: 5
   |  |  |  |  |  flags: 0
   |  |  |  |  |  endLine: null
   |  |  |  |  4 => Latte\Compiler\Nodes\Php\ParameterNode
   |  |  |  |  |  type: Latte\Compiler\Nodes\Php\NullableTypeNode
   |  |  |  |  |  |  type: Latte\Compiler\Nodes\Php\NameNode
   |  |  |  |  |  |  |  parts: array (1)
   |  |  |  |  |  |  |  |  0 => 'Foo'
   |  |  |  |  |  |  |  startLine: 6
   |  |  |  |  |  |  |  endLine: null
   |  |  |  |  |  |  startLine: 6
   |  |  |  |  |  |  endLine: null
   |  |  |  |  |  var: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  |  |  name: 'e'
   |  |  |  |  |  |  startLine: 6
   |  |  |  |  |  |  endLine: null
   |  |  |  |  |  default: null
   |  |  |  |  |  byRef: false
   |  |  |  |  |  variadic: false
   |  |  |  |  |  startLine: 6
   |  |  |  |  |  flags: 0
   |  |  |  |  |  endLine: null
   |  |  |  |  5 => Latte\Compiler\Nodes\Php\ParameterNode
   |  |  |  |  |  type: Latte\Compiler\Nodes\Php\UnionTypeNode
   |  |  |  |  |  |  types: array (3)
   |  |  |  |  |  |  |  0 => Latte\Compiler\Nodes\Php\NameNode
   |  |  |  |  |  |  |  |  parts: array (1)
   |  |  |  |  |  |  |  |  |  0 => 'A'
   |  |  |  |  |  |  |  |  startLine: 7
   |  |  |  |  |  |  |  |  endLine: null
   |  |  |  |  |  |  |  1 => Latte\Compiler\Nodes\Php\IdentifierNode
   |  |  |  |  |  |  |  |  name: 'iterable'
   |  |  |  |  |  |  |  |  startLine: 7
   |  |  |  |  |  |  |  |  endLine: null
   |  |  |  |  |  |  |  2 => Latte\Compiler\Nodes\Php\IdentifierNode
   |  |  |  |  |  |  |  |  name: 'null'
   |  |  |  |  |  |  |  |  startLine: 7
   |  |  |  |  |  |  |  |  endLine: null
   |  |  |  |  |  |  startLine: 7
   |  |  |  |  |  |  endLine: null
   |  |  |  |  |  var: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  |  |  name: 'f'
   |  |  |  |  |  |  startLine: 7
   |  |  |  |  |  |  endLine: null
   |  |  |  |  |  default: null
   |  |  |  |  |  byRef: false
   |  |  |  |  |  variadic: false
   |  |  |  |  |  startLine: 7
   |  |  |  |  |  flags: 0
   |  |  |  |  |  endLine: null
   |  |  |  |  6 => Latte\Compiler\Nodes\Php\ParameterNode
   |  |  |  |  |  type: Latte\Compiler\Nodes\Php\IntersectionTypeNode
   |  |  |  |  |  |  types: array (2)
   |  |  |  |  |  |  |  0 => Latte\Compiler\Nodes\Php\NameNode
   |  |  |  |  |  |  |  |  parts: array (1)
   |  |  |  |  |  |  |  |  |  0 => 'A'
   |  |  |  |  |  |  |  |  startLine: 8
   |  |  |  |  |  |  |  |  endLine: null
   |  |  |  |  |  |  |  1 => Latte\Compiler\Nodes\Php\NameNode
   |  |  |  |  |  |  |  |  parts: array (1)
   |  |  |  |  |  |  |  |  |  0 => 'B'
   |  |  |  |  |  |  |  |  startLine: 8
   |  |  |  |  |  |  |  |  endLine: null
   |  |  |  |  |  |  startLine: 8
   |  |  |  |  |  |  endLine: null
   |  |  |  |  |  var: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  |  |  name: 'g'
   |  |  |  |  |  |  startLine: 8
   |  |  |  |  |  |  endLine: null
   |  |  |  |  |  default: null
   |  |  |  |  |  byRef: false
   |  |  |  |  |  variadic: false
   |  |  |  |  |  startLine: 8
   |  |  |  |  |  flags: 0
   |  |  |  |  |  endLine: null
   |  |  |  uses: array (0)
   |  |  |  returnType: Latte\Compiler\Nodes\Php\IdentifierNode
   |  |  |  |  name: 'never'
   |  |  |  |  startLine: 9
   |  |  |  |  endLine: null
   |  |  |  expr: Latte\Compiler\Nodes\Php\Expression\ConstantFetchNode
   |  |  |  |  name: Latte\Compiler\Nodes\Php\NameNode
   |  |  |  |  |  parts: array (1)
   |  |  |  |  |  |  0 => 'null'
   |  |  |  |  |  startLine: 9
   |  |  |  |  |  endLine: null
   |  |  |  |  startLine: 9
   |  |  |  |  endLine: null
   |  |  |  startLine: 1
   |  |  |  endLine: null
   |  |  key: null
   |  |  byRef: false
   |  |  startLine: 1
   |  |  unpack: false
   |  |  endLine: null
   startLine: null
   endLine: null
