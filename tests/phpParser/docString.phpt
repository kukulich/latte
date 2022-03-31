<?php

// Nowdoc and heredoc strings

declare(strict_types=1);

use Tester\Assert;

require __DIR__ . '/../bootstrap.php';

$test = <<<'XX'
	/* empty strings */
	<<<'EOS'
	EOS,
	<<<EOS
	EOS,

	/* constant encapsed strings */
	<<<'EOS'
	Test '" $a \n
	EOS,
	<<<EOS
	Test '" \$a \n
	EOS,

	/* encapsed strings */
	<<<EOS
	Test $a
	EOS,
	<<<EOS
	Test $a and $b->c test
	EOS,
	XX;

$node = parseCode($test);

Assert::same(
	loadContent(__FILE__, __COMPILER_HALT_OFFSET__),
	exportNode($node),
);

__halt_compiler();
Latte\Compiler\Nodes\Php\Expression\ArrayNode
   items: array (6)
   |  0 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Scalar\StringNode
   |  |  |  value: ''
   |  |  |  startLine: 2
   |  |  |  endLine: null
   |  |  key: null
   |  |  byRef: false
   |  |  startLine: 2
   |  |  unpack: false
   |  |  endLine: null
   |  1 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Scalar\StringNode
   |  |  |  value: ''
   |  |  |  startLine: 4
   |  |  |  endLine: null
   |  |  key: null
   |  |  byRef: false
   |  |  startLine: 4
   |  |  unpack: false
   |  |  endLine: null
   |  2 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Scalar\StringNode
   |  |  |  value: 'Test '" $a \n'
   |  |  |  startLine: 8
   |  |  |  endLine: null
   |  |  key: null
   |  |  byRef: false
   |  |  startLine: 8
   |  |  unpack: false
   |  |  endLine: null
   |  3 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Scalar\StringNode
   |  |  |  value: 'Test '" $a \n'
   |  |  |  startLine: 11
   |  |  |  endLine: null
   |  |  key: null
   |  |  byRef: false
   |  |  startLine: 11
   |  |  unpack: false
   |  |  endLine: null
   |  4 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Scalar\EncapsedStringNode
   |  |  |  parts: array (2)
   |  |  |  |  0 => Latte\Compiler\Nodes\Php\Scalar\EncapsedStringPartNode
   |  |  |  |  |  value: 'Test '
   |  |  |  |  |  startLine: 17
   |  |  |  |  |  endLine: null
   |  |  |  |  1 => Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  |  name: 'a'
   |  |  |  |  |  startLine: 17
   |  |  |  |  |  endLine: null
   |  |  |  startLine: 16
   |  |  |  endLine: null
   |  |  key: null
   |  |  byRef: false
   |  |  startLine: 16
   |  |  unpack: false
   |  |  endLine: null
   |  5 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Scalar\EncapsedStringNode
   |  |  |  parts: array (5)
   |  |  |  |  0 => Latte\Compiler\Nodes\Php\Scalar\EncapsedStringPartNode
   |  |  |  |  |  value: 'Test '
   |  |  |  |  |  startLine: 20
   |  |  |  |  |  endLine: null
   |  |  |  |  1 => Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  |  name: 'a'
   |  |  |  |  |  startLine: 20
   |  |  |  |  |  endLine: null
   |  |  |  |  2 => Latte\Compiler\Nodes\Php\Scalar\EncapsedStringPartNode
   |  |  |  |  |  value: ' and '
   |  |  |  |  |  startLine: 20
   |  |  |  |  |  endLine: null
   |  |  |  |  3 => Latte\Compiler\Nodes\Php\Expression\PropertyFetchNode
   |  |  |  |  |  name: Latte\Compiler\Nodes\Php\IdentifierNode
   |  |  |  |  |  |  name: 'c'
   |  |  |  |  |  |  startLine: 20
   |  |  |  |  |  |  endLine: null
   |  |  |  |  |  var: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  |  |  name: 'b'
   |  |  |  |  |  |  startLine: 20
   |  |  |  |  |  |  endLine: null
   |  |  |  |  |  startLine: 20
   |  |  |  |  |  endLine: null
   |  |  |  |  4 => Latte\Compiler\Nodes\Php\Scalar\EncapsedStringPartNode
   |  |  |  |  |  value: ' test'
   |  |  |  |  |  startLine: 20
   |  |  |  |  |  endLine: null
   |  |  |  startLine: 19
   |  |  |  endLine: null
   |  |  key: null
   |  |  byRef: false
   |  |  startLine: 19
   |  |  unpack: false
   |  |  endLine: null
   startLine: null
   endLine: null
