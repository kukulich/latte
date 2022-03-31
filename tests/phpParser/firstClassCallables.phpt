<?php

// First-class callables

declare(strict_types=1);

use Tester\Assert;

require __DIR__ . '/../bootstrap.php';

$test = <<<'XX'
	foo(...),
	$this->foo(...),
	A::foo(...),

	/* These are invalid, but accepted on the parser level. */
	new Foo(...),
	$this?->foo(...),
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
   |  |  value: Latte\Compiler\Nodes\Php\Expression\FunctionCallNode
   |  |  |  name: Latte\Compiler\Nodes\Php\NameNode
   |  |  |  |  parts: array (1)
   |  |  |  |  |  0 => 'foo'
   |  |  |  |  startLine: 1
   |  |  |  |  endLine: null
   |  |  |  args: array (1)
   |  |  |  |  0 => Latte\Compiler\Nodes\Php\VariadicPlaceholderNode
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
   |  |  value: Latte\Compiler\Nodes\Php\Expression\MethodCallNode
   |  |  |  var: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  name: 'this'
   |  |  |  |  startLine: 2
   |  |  |  |  endLine: null
   |  |  |  name: Latte\Compiler\Nodes\Php\IdentifierNode
   |  |  |  |  name: 'foo'
   |  |  |  |  startLine: 2
   |  |  |  |  endLine: null
   |  |  |  args: array (1)
   |  |  |  |  0 => Latte\Compiler\Nodes\Php\VariadicPlaceholderNode
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
   |  |  value: Latte\Compiler\Nodes\Php\Expression\StaticCallNode
   |  |  |  class: Latte\Compiler\Nodes\Php\NameNode
   |  |  |  |  parts: array (1)
   |  |  |  |  |  0 => 'A'
   |  |  |  |  startLine: 3
   |  |  |  |  endLine: null
   |  |  |  name: Latte\Compiler\Nodes\Php\IdentifierNode
   |  |  |  |  name: 'foo'
   |  |  |  |  startLine: 3
   |  |  |  |  endLine: null
   |  |  |  args: array (1)
   |  |  |  |  0 => Latte\Compiler\Nodes\Php\VariadicPlaceholderNode
   |  |  |  |  |  startLine: 3
   |  |  |  |  |  endLine: null
   |  |  |  startLine: 3
   |  |  |  endLine: null
   |  |  key: null
   |  |  byRef: false
   |  |  startLine: 3
   |  |  unpack: false
   |  |  endLine: null
   |  3 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Expression\NewNode
   |  |  |  class: Latte\Compiler\Nodes\Php\NameNode
   |  |  |  |  parts: array (1)
   |  |  |  |  |  0 => 'Foo'
   |  |  |  |  startLine: 6
   |  |  |  |  endLine: null
   |  |  |  args: array (1)
   |  |  |  |  0 => Latte\Compiler\Nodes\Php\VariadicPlaceholderNode
   |  |  |  |  |  startLine: 6
   |  |  |  |  |  endLine: null
   |  |  |  startLine: 6
   |  |  |  endLine: null
   |  |  key: null
   |  |  byRef: false
   |  |  startLine: 6
   |  |  unpack: false
   |  |  endLine: null
   |  4 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Expression\NullsafeMethodCallNode
   |  |  |  name: Latte\Compiler\Nodes\Php\IdentifierNode
   |  |  |  |  name: 'foo'
   |  |  |  |  startLine: 7
   |  |  |  |  endLine: null
   |  |  |  var: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  name: 'this'
   |  |  |  |  startLine: 7
   |  |  |  |  endLine: null
   |  |  |  args: array (1)
   |  |  |  |  0 => Latte\Compiler\Nodes\Php\VariadicPlaceholderNode
   |  |  |  |  |  startLine: 7
   |  |  |  |  |  endLine: null
   |  |  |  startLine: 7
   |  |  |  endLine: null
   |  |  key: null
   |  |  byRef: false
   |  |  startLine: 7
   |  |  unpack: false
   |  |  endLine: null
   startLine: null
   endLine: null
