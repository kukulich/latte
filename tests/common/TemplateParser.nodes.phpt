<?php

declare(strict_types=1);

use Tester\Assert;

require __DIR__ . '/../bootstrap.php';


class FooNode extends Latte\Compiler\Nodes\AreaNode
{
	public function print(Latte\Compiler\PrintContext $context): string
	{
		return '';
	}
}


function parse($s)
{
	$lexer = new Latte\Compiler\TemplateLexer;
	$parser = new Latte\Compiler\TemplateParser;
	$parser->addTags(['foo' => function () {
		$node = new FooNode;
		yield;
		return $node;
	}]);

	$node = $parser->parse($s, $lexer);
	return exportNode($node);
}


Assert::match(<<<'XX'
	Latte\Compiler\Nodes\TemplateNode
	   main: Latte\Compiler\Nodes\FragmentNode
	   |  children: array (0)
	   |  position: null
	   position: null
	XX, parse(''));


Assert::match(<<<'XX'
	Latte\Compiler\Nodes\TemplateNode
	   main: Latte\Compiler\Nodes\FragmentNode
	   |  children: array (1)
	   |  |  0 => Latte\Compiler\Nodes\TextNode
	   |  |  |  content: string
	   |  |  |  |  '\n
	   |  |  |  |   text\n'
	   |  |  |  position: Latte\Compiler\Position
	   |  |  |  |  line: 1
	   |  |  |  |  column: 1
	   |  |  |  |  offset: 0
	   |  position: Latte\Compiler\Position
	   |  |  line: 1
	   |  |  column: 1
	   |  |  offset: 0
	   position: null
	XX, parse("\ntext\n"));


Assert::match(<<<'XX'
	Latte\Compiler\Nodes\TemplateNode
	   main: Latte\Compiler\Nodes\FragmentNode
	   |  children: array (3)
	   |  |  0 => Latte\Compiler\Nodes\TextNode
	   |  |  |  content: 'foo '
	   |  |  |  position: Latte\Compiler\Position
	   |  |  |  |  line: 1
	   |  |  |  |  column: 1
	   |  |  |  |  offset: 0
	   |  |  1 => Latte\Compiler\Nodes\TextNode
	   |  |  |  content: '\n'
	   |  |  |  position: Latte\Compiler\Position
	   |  |  |  |  line: 1
	   |  |  |  |  column: 5
	   |  |  |  |  offset: 4
	   |  |  2 => Latte\Compiler\Nodes\TextNode
	   |  |  |  content: ' bar'
	   |  |  |  position: Latte\Compiler\Position
	   |  |  |  |  line: 2
	   |  |  |  |  column: 6
	   |  |  |  |  offset: 23
	   |  position: Latte\Compiler\Position
	   |  |  line: 1
	   |  |  column: 1
	   |  |  offset: 0
	   position: null
	XX, parse("foo {* comment *}\n{* *} bar"));


Assert::match(<<<'XX'
	Latte\Compiler\Nodes\TemplateNode
	   main: Latte\Compiler\Nodes\FragmentNode
	   |  children: array (2)
	   |  |  0 => Latte\Compiler\Nodes\TextNode
	   |  |  |  content: '\n'
	   |  |  |  position: Latte\Compiler\Position
	   |  |  |  |  line: 1
	   |  |  |  |  column: 1
	   |  |  |  |  offset: 0
	   |  |  1 => FooNode
	   |  |  |  position: Latte\Compiler\Position
	   |  |  |  |  line: 2
	   |  |  |  |  column: 1
	   |  |  |  |  offset: 1
	   |  position: Latte\Compiler\Position
	   |  |  line: 1
	   |  |  column: 1
	   |  |  offset: 0
	   position: null
	XX, parse("\n{foo\n} ... \n {/foo}"));


Assert::match(<<<'XX'
	Latte\Compiler\Nodes\TemplateNode
	   main: Latte\Compiler\Nodes\FragmentNode
	   |  children: array (1)
	   |  |  0 => Latte\Compiler\Nodes\Html\ElementNode
	   |  |  |  attributes: Latte\Compiler\Nodes\FragmentNode
	   |  |  |  |  children: array (2)
	   |  |  |  |  |  0 => Latte\Compiler\Nodes\Html\AttributeNode
	   |  |  |  |  |  |  name: 'attr'
	   |  |  |  |  |  |  text: string
	   |  |  |  |  |  |  |  ' \n
	   |  |  |  |  |  |  |   attr=val'
	   |  |  |  |  |  |  value: null
	   |  |  |  |  |  |  quote: null
	   |  |  |  |  |  |  position: Latte\Compiler\Position
	   |  |  |  |  |  |  |  line: 1
	   |  |  |  |  |  |  |  column: 4
	   |  |  |  |  |  |  |  offset: 3
	   |  |  |  |  |  1 => Latte\Compiler\Nodes\TextNode
	   |  |  |  |  |  |  content: '\n'
	   |  |  |  |  |  |  position: Latte\Compiler\Position
	   |  |  |  |  |  |  |  line: 2
	   |  |  |  |  |  |  |  column: 9
	   |  |  |  |  |  |  |  offset: 13
	   |  |  |  |  position: Latte\Compiler\Position
	   |  |  |  |  |  line: 1
	   |  |  |  |  |  column: 4
	   |  |  |  |  |  offset: 3
	   |  |  |  selfClosing: false
	   |  |  |  content: null
	   |  |  |  nAttributes: array (0)
	   |  |  |  tagNode: Latte\Compiler\Nodes\AuxiliaryNode
	   |  |  |  |  callable: Closure($context)
	   |  |  |  |  position: null
	   |  |  |  captureTagName: false
	   |  |  |  endTagVar: unset
	   |  |  |  name: 'br'
	   |  |  |  position: Latte\Compiler\Position
	   |  |  |  |  line: 1
	   |  |  |  |  column: 1
	   |  |  |  |  offset: 0
	   |  |  |  parent: null
	   |  |  |  data: stdClass
	   |  |  |  |  tag: null
	   |  position: Latte\Compiler\Position
	   |  |  line: 1
	   |  |  column: 1
	   |  |  offset: 0
	   position: null
	XX, parse("<br \nattr=val\n>"));


Assert::match(<<<'XX'
	Latte\Compiler\Nodes\TemplateNode
	   main: Latte\Compiler\Nodes\FragmentNode
	   |  children: array (1)
	   |  |  0 => Latte\Compiler\Nodes\Html\ElementNode
	   |  |  |  attributes: Latte\Compiler\Nodes\FragmentNode
	   |  |  |  |  children: array (0)
	   |  |  |  |  position: null
	   |  |  |  selfClosing: false
	   |  |  |  content: Latte\Compiler\Nodes\FragmentNode
	   |  |  |  |  children: array (2)
	   |  |  |  |  |  0 => Latte\Compiler\Nodes\TextNode
	   |  |  |  |  |  |  content: '\n'
	   |  |  |  |  |  |  position: null
	   |  |  |  |  |  1 => Latte\Compiler\Nodes\TextNode
	   |  |  |  |  |  |  content: '...\n'
	   |  |  |  |  |  |  position: Latte\Compiler\Position
	   |  |  |  |  |  |  |  line: 2
	   |  |  |  |  |  |  |  column: 1
	   |  |  |  |  |  |  |  offset: 4
	   |  |  |  |  position: Latte\Compiler\Position
	   |  |  |  |  |  line: 2
	   |  |  |  |  |  column: 1
	   |  |  |  |  |  offset: 4
	   |  |  |  nAttributes: array (0)
	   |  |  |  tagNode: Latte\Compiler\Nodes\AuxiliaryNode
	   |  |  |  |  callable: Closure($context)
	   |  |  |  |  position: null
	   |  |  |  captureTagName: false
	   |  |  |  endTagVar: unset
	   |  |  |  name: 'p'
	   |  |  |  position: Latte\Compiler\Position
	   |  |  |  |  line: 1
	   |  |  |  |  column: 1
	   |  |  |  |  offset: 0
	   |  |  |  parent: null
	   |  |  |  data: stdClass
	   |  |  |  |  tag: null
	   |  position: Latte\Compiler\Position
	   |  |  line: 1
	   |  |  column: 1
	   |  |  offset: 0
	   position: null
	XX, parse("<p>\n...\n</p>"));
