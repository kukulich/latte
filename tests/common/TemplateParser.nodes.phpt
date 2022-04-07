<?php

declare(strict_types=1);

use Tester\Assert;

require __DIR__ . '/../bootstrap.php';


function parse($s)
{
	$lexer = new Latte\Compiler\TemplateLexer;
	$parser = new Latte\Compiler\TemplateParser;
	$parser->addTags(['foo' => function () {
		$node = new Latte\Compiler\Nodes\AuxiliaryNode(fn() => '');
		yield;
		return $node;
	}]);

	$node = $parser->parse($s, $lexer);
	return exportNode($node);
}


Assert::match(<<<'XX'
	Latte\Compiler\Nodes\TemplateNode
	   head: Latte\Compiler\Nodes\FragmentNode
	   |  children: array (0)
	   |  startLine: null
	   |  endLine: null
	   main: Latte\Compiler\Nodes\FragmentNode
	   |  children: array (0)
	   |  startLine: null
	   |  endLine: null
	   startLine: null
	   endLine: null
	XX, parse(''));


Assert::match(<<<'XX'
	Latte\Compiler\Nodes\TemplateNode
	   head: Latte\Compiler\Nodes\FragmentNode
	   |  children: array (0)
	   |  startLine: null
	   |  endLine: null
	   main: Latte\Compiler\Nodes\FragmentNode
	   |  children: array (1)
	   |  |  0 => Latte\Compiler\Nodes\TextNode
	   |  |  |  content: string
	   |  |  |  |  '\n
	   |  |  |  |   text\n'
	   |  |  |  startLine: 1
	   |  |  |  endLine: 3
	   |  startLine: 1
	   |  endLine: 3
	   startLine: null
	   endLine: null
	XX, parse("\ntext\n"));


Assert::match(<<<'XX'
	Latte\Compiler\Nodes\TemplateNode
	   head: Latte\Compiler\Nodes\FragmentNode
	   |  children: array (0)
	   |  startLine: null
	   |  endLine: null
	   main: Latte\Compiler\Nodes\FragmentNode
	   |  children: array (3)
	   |  |  0 => Latte\Compiler\Nodes\TextNode
	   |  |  |  content: 'foo '
	   |  |  |  startLine: 1
	   |  |  |  endLine: 1
	   |  |  1 => Latte\Compiler\Nodes\TextNode
	   |  |  |  content: '\n'
	   |  |  |  startLine: 1
	   |  |  |  endLine: 2
	   |  |  2 => Latte\Compiler\Nodes\TextNode
	   |  |  |  content: ' bar'
	   |  |  |  startLine: 2
	   |  |  |  endLine: 2
	   |  startLine: 1
	   |  endLine: 2
	   startLine: null
	   endLine: null
	XX, parse("foo {* comment *}\n{* *} bar"));


Assert::match(<<<'XX'
	Latte\Compiler\Nodes\TemplateNode
	   head: Latte\Compiler\Nodes\FragmentNode
	   |  children: array (0)
	   |  startLine: null
	   |  endLine: null
	   main: Latte\Compiler\Nodes\FragmentNode
	   |  children: array (2)
	   |  |  0 => Latte\Compiler\Nodes\TextNode
	   |  |  |  content: '\n'
	   |  |  |  startLine: 1
	   |  |  |  endLine: 2
	   |  |  1 => Latte\Compiler\Nodes\AuxiliaryNode
	   |  |  |  callable: Closure()
	   |  |  |  startLine: 2
	   |  |  |  endLine: 4
	   |  startLine: 1
	   |  endLine: 4
	   startLine: null
	   endLine: null
	XX, parse("\n{foo\n} ... \n {/foo}"));


Assert::match(<<<'XX'
	Latte\Compiler\Nodes\TemplateNode
	   head: Latte\Compiler\Nodes\FragmentNode
	   |  children: array (0)
	   |  startLine: null
	   |  endLine: null
	   main: Latte\Compiler\Nodes\FragmentNode
	   |  children: array (1)
	   |  |  0 => Latte\Compiler\Nodes\Html\ElementNode
	   |  |  |  customName: null
	   |  |  |  attributes: Latte\Compiler\Nodes\FragmentNode
	   |  |  |  |  children: array (3)
	   |  |  |  |  |  0 => Latte\Compiler\Nodes\TextNode
	   |  |  |  |  |  |  content: ' \n'
	   |  |  |  |  |  |  startLine: 1
	   |  |  |  |  |  |  endLine: 2
	   |  |  |  |  |  1 => Latte\Compiler\Nodes\Html\AttributeNode
	   |  |  |  |  |  |  name: 'attr'
	   |  |  |  |  |  |  value: Latte\Compiler\Nodes\TextNode
	   |  |  |  |  |  |  |  content: 'val'
	   |  |  |  |  |  |  |  startLine: 2
	   |  |  |  |  |  |  |  endLine: 2
	   |  |  |  |  |  |  startLine: 2
	   |  |  |  |  |  |  endLine: 2
	   |  |  |  |  |  2 => Latte\Compiler\Nodes\TextNode
	   |  |  |  |  |  |  content: '\n'
	   |  |  |  |  |  |  startLine: 2
	   |  |  |  |  |  |  endLine: 3
	   |  |  |  |  startLine: 1
	   |  |  |  |  endLine: 3
	   |  |  |  selfClosing: false
	   |  |  |  content: null
	   |  |  |  nAttributes: array (0)
	   |  |  |  tagNode: Latte\Compiler\Nodes\AuxiliaryNode
	   |  |  |  |  callable: Closure($context)
	   |  |  |  |  startLine: null
	   |  |  |  |  endLine: null
	   |  |  |  captureTagName: false
	   |  |  |  endTagVar: unset
	   |  |  |  name: 'br'
	   |  |  |  startLine: 1
	   |  |  |  parent: null
	   |  |  |  data: stdClass
	   |  |  |  |  tag: null
	   |  |  |  endLine: 3
	   |  startLine: 1
	   |  endLine: 3
	   startLine: null
	   endLine: null
	XX, parse("<br \nattr=val\n>"));


Assert::match(<<<'XX'
	Latte\Compiler\Nodes\TemplateNode
	   head: Latte\Compiler\Nodes\FragmentNode
	   |  children: array (0)
	   |  startLine: null
	   |  endLine: null
	   main: Latte\Compiler\Nodes\FragmentNode
	   |  children: array (1)
	   |  |  0 => Latte\Compiler\Nodes\Html\ElementNode
	   |  |  |  customName: null
	   |  |  |  attributes: Latte\Compiler\Nodes\FragmentNode
	   |  |  |  |  children: array (0)
	   |  |  |  |  startLine: null
	   |  |  |  |  endLine: null
	   |  |  |  selfClosing: false
	   |  |  |  content: Latte\Compiler\Nodes\FragmentNode
	   |  |  |  |  children: array (2)
	   |  |  |  |  |  0 => Latte\Compiler\Nodes\TextNode
	   |  |  |  |  |  |  content: '\n'
	   |  |  |  |  |  |  startLine: 1
	   |  |  |  |  |  |  endLine: 2
	   |  |  |  |  |  1 => Latte\Compiler\Nodes\TextNode
	   |  |  |  |  |  |  content: '...\n'
	   |  |  |  |  |  |  startLine: 2
	   |  |  |  |  |  |  endLine: 3
	   |  |  |  |  startLine: 1
	   |  |  |  |  endLine: null
	   |  |  |  nAttributes: array (0)
	   |  |  |  tagNode: Latte\Compiler\Nodes\AuxiliaryNode
	   |  |  |  |  callable: Closure($context)
	   |  |  |  |  startLine: null
	   |  |  |  |  endLine: null
	   |  |  |  captureTagName: false
	   |  |  |  endTagVar: unset
	   |  |  |  name: 'p'
	   |  |  |  startLine: 1
	   |  |  |  parent: null
	   |  |  |  data: stdClass
	   |  |  |  |  tag: null
	   |  |  |  endLine: 3
	   |  startLine: 1
	   |  endLine: 1
	   startLine: null
	   endLine: null
	XX, parse("<p>\n...\n</p>"));
