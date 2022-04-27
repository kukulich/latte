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
	   head: Latte\Compiler\Nodes\FragmentNode
	   |  children: array (0)
	   |  position: null
	   main: Latte\Compiler\Nodes\FragmentNode
	   |  children: array (0)
	   |  position: null
	   position: null
	XX, parse(''));


Assert::match(<<<'XX'
	Latte\Compiler\Nodes\TemplateNode
	   head: Latte\Compiler\Nodes\FragmentNode
	   |  children: array (0)
	   |  position: null
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
	   head: Latte\Compiler\Nodes\FragmentNode
	   |  children: array (0)
	   |  position: null
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
	   |  |  |  |  column: 18
	   |  |  |  |  offset: 17
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
	   head: Latte\Compiler\Nodes\FragmentNode
	   |  children: array (0)
	   |  position: null
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
	   head: Latte\Compiler\Nodes\FragmentNode
	   |  children: array (0)
	   |  position: null
	   main: Latte\Compiler\Nodes\FragmentNode
	   |  children: array (1)
	   |  |  0 => Latte\Compiler\Nodes\Html\ElementNode
	   |  |  |  customName: null
	   |  |  |  attributes: Latte\Compiler\Nodes\FragmentNode
	   |  |  |  |  children: array (6)
	   |  |  |  |  |  0 => Latte\Compiler\Nodes\TextNode
	   |  |  |  |  |  |  content: ' '
	   |  |  |  |  |  |  position: Latte\Compiler\Position
	   |  |  |  |  |  |  |  line: 1
	   |  |  |  |  |  |  |  column: 4
	   |  |  |  |  |  |  |  offset: 3
	   |  |  |  |  |  1 => Latte\Compiler\Nodes\Html\AttributeNode
	   |  |  |  |  |  |  name: Latte\Compiler\Nodes\TextNode
	   |  |  |  |  |  |  |  content: 'attr1'
	   |  |  |  |  |  |  |  position: Latte\Compiler\Position
	   |  |  |  |  |  |  |  |  line: 1
	   |  |  |  |  |  |  |  |  column: 5
	   |  |  |  |  |  |  |  |  offset: 4
	   |  |  |  |  |  |  value: null
	   |  |  |  |  |  |  position: Latte\Compiler\Position
	   |  |  |  |  |  |  |  line: 1
	   |  |  |  |  |  |  |  column: 5
	   |  |  |  |  |  |  |  offset: 4
	   |  |  |  |  |  2 => Latte\Compiler\Nodes\TextNode
	   |  |  |  |  |  |  content: ' \n'
	   |  |  |  |  |  |  position: Latte\Compiler\Position
	   |  |  |  |  |  |  |  line: 1
	   |  |  |  |  |  |  |  column: 10
	   |  |  |  |  |  |  |  offset: 9
	   |  |  |  |  |  3 => Latte\Compiler\Nodes\Html\AttributeNode
	   |  |  |  |  |  |  name: Latte\Compiler\Nodes\TextNode
	   |  |  |  |  |  |  |  content: 'attr2'
	   |  |  |  |  |  |  |  position: Latte\Compiler\Position
	   |  |  |  |  |  |  |  |  line: 2
	   |  |  |  |  |  |  |  |  column: 1
	   |  |  |  |  |  |  |  |  offset: 11
	   |  |  |  |  |  |  value: Latte\Compiler\Nodes\FragmentNode
	   |  |  |  |  |  |  |  children: array (1)
	   |  |  |  |  |  |  |  |  0 => Latte\Compiler\Nodes\TextNode
	   |  |  |  |  |  |  |  |  |  content: 'val'
	   |  |  |  |  |  |  |  |  |  position: Latte\Compiler\Position
	   |  |  |  |  |  |  |  |  |  |  line: 2
	   |  |  |  |  |  |  |  |  |  |  column: 7
	   |  |  |  |  |  |  |  |  |  |  offset: 17
	   |  |  |  |  |  |  |  position: Latte\Compiler\Position
	   |  |  |  |  |  |  |  |  line: 2
	   |  |  |  |  |  |  |  |  column: 7
	   |  |  |  |  |  |  |  |  offset: 17
	   |  |  |  |  |  |  position: Latte\Compiler\Position
	   |  |  |  |  |  |  |  line: 2
	   |  |  |  |  |  |  |  column: 1
	   |  |  |  |  |  |  |  offset: 11
	   |  |  |  |  |  4 => Latte\Compiler\Nodes\TextNode
	   |  |  |  |  |  |  content: string
	   |  |  |  |  |  |  |  '\n
	   |  |  |  |  |  |  |    '
	   |  |  |  |  |  |  position: Latte\Compiler\Position
	   |  |  |  |  |  |  |  line: 2
	   |  |  |  |  |  |  |  column: 10
	   |  |  |  |  |  |  |  offset: 20
	   |  |  |  |  |  5 => Latte\Compiler\Nodes\Html\AttributeNode
	   |  |  |  |  |  |  name: Latte\Compiler\Nodes\TextNode
	   |  |  |  |  |  |  |  content: 'attr3'
	   |  |  |  |  |  |  |  position: Latte\Compiler\Position
	   |  |  |  |  |  |  |  |  line: 3
	   |  |  |  |  |  |  |  |  column: 2
	   |  |  |  |  |  |  |  |  offset: 22
	   |  |  |  |  |  |  value: Latte\Compiler\Nodes\Html\QuotedValue
	   |  |  |  |  |  |  |  value: Latte\Compiler\Nodes\FragmentNode
	   |  |  |  |  |  |  |  |  children: array (1)
	   |  |  |  |  |  |  |  |  |  0 => Latte\Compiler\Nodes\TextNode
	   |  |  |  |  |  |  |  |  |  |  content: 'val'
	   |  |  |  |  |  |  |  |  |  |  position: Latte\Compiler\Position
	   |  |  |  |  |  |  |  |  |  |  |  line: 4
	   |  |  |  |  |  |  |  |  |  |  |  column: 2
	   |  |  |  |  |  |  |  |  |  |  |  offset: 30
	   |  |  |  |  |  |  |  |  position: Latte\Compiler\Position
	   |  |  |  |  |  |  |  |  |  line: 4
	   |  |  |  |  |  |  |  |  |  column: 2
	   |  |  |  |  |  |  |  |  |  offset: 30
	   |  |  |  |  |  |  |  quote: '''
	   |  |  |  |  |  |  |  position: Latte\Compiler\Position
	   |  |  |  |  |  |  |  |  line: 4
	   |  |  |  |  |  |  |  |  column: 1
	   |  |  |  |  |  |  |  |  offset: 29
	   |  |  |  |  |  |  position: Latte\Compiler\Position
	   |  |  |  |  |  |  |  line: 3
	   |  |  |  |  |  |  |  column: 2
	   |  |  |  |  |  |  |  offset: 22
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
	XX, parse("<br attr1 \nattr2=val\n attr3=\n'val'>"));


Assert::match(<<<'XX'
	Latte\Compiler\Nodes\TemplateNode
	   head: Latte\Compiler\Nodes\FragmentNode
	   |  children: array (0)
	   |  position: null
	   main: Latte\Compiler\Nodes\FragmentNode
	   |  children: array (1)
	   |  |  0 => Latte\Compiler\Nodes\Html\ElementNode
	   |  |  |  customName: null
	   |  |  |  attributes: Latte\Compiler\Nodes\FragmentNode
	   |  |  |  |  children: array (6)
	   |  |  |  |  |  0 => Latte\Compiler\Nodes\TextNode
	   |  |  |  |  |  |  content: ' '
	   |  |  |  |  |  |  position: Latte\Compiler\Position
	   |  |  |  |  |  |  |  line: 1
	   |  |  |  |  |  |  |  column: 4
	   |  |  |  |  |  |  |  offset: 3
	   |  |  |  |  |  1 => FooNode
	   |  |  |  |  |  |  position: Latte\Compiler\Position
	   |  |  |  |  |  |  |  line: 1
	   |  |  |  |  |  |  |  column: 5
	   |  |  |  |  |  |  |  offset: 4
	   |  |  |  |  |  2 => Latte\Compiler\Nodes\TextNode
	   |  |  |  |  |  |  content: ' '
	   |  |  |  |  |  |  position: Latte\Compiler\Position
	   |  |  |  |  |  |  |  line: 1
	   |  |  |  |  |  |  |  column: 27
	   |  |  |  |  |  |  |  offset: 26
	   |  |  |  |  |  3 => Latte\Compiler\Nodes\Html\AttributeNode
	   |  |  |  |  |  |  name: Latte\Compiler\Nodes\FragmentNode
	   |  |  |  |  |  |  |  children: array (1)
	   |  |  |  |  |  |  |  |  0 => FooNode
	   |  |  |  |  |  |  |  |  |  position: Latte\Compiler\Position
	   |  |  |  |  |  |  |  |  |  |  line: 1
	   |  |  |  |  |  |  |  |  |  |  column: 28
	   |  |  |  |  |  |  |  |  |  |  offset: 27
	   |  |  |  |  |  |  |  position: Latte\Compiler\Position
	   |  |  |  |  |  |  |  |  line: 1
	   |  |  |  |  |  |  |  |  column: 28
	   |  |  |  |  |  |  |  |  offset: 27
	   |  |  |  |  |  |  value: Latte\Compiler\Nodes\FragmentNode
	   |  |  |  |  |  |  |  children: array (1)
	   |  |  |  |  |  |  |  |  0 => FooNode
	   |  |  |  |  |  |  |  |  |  position: Latte\Compiler\Position
	   |  |  |  |  |  |  |  |  |  |  line: 1
	   |  |  |  |  |  |  |  |  |  |  column: 45
	   |  |  |  |  |  |  |  |  |  |  offset: 44
	   |  |  |  |  |  |  |  position: Latte\Compiler\Position
	   |  |  |  |  |  |  |  |  line: 1
	   |  |  |  |  |  |  |  |  column: 45
	   |  |  |  |  |  |  |  |  offset: 44
	   |  |  |  |  |  |  position: Latte\Compiler\Position
	   |  |  |  |  |  |  |  line: 1
	   |  |  |  |  |  |  |  column: 28
	   |  |  |  |  |  |  |  offset: 27
	   |  |  |  |  |  4 => Latte\Compiler\Nodes\TextNode
	   |  |  |  |  |  |  content: ' '
	   |  |  |  |  |  |  position: Latte\Compiler\Position
	   |  |  |  |  |  |  |  line: 1
	   |  |  |  |  |  |  |  column: 57
	   |  |  |  |  |  |  |  offset: 56
	   |  |  |  |  |  5 => Latte\Compiler\Nodes\Html\AttributeNode
	   |  |  |  |  |  |  name: Latte\Compiler\Nodes\FragmentNode
	   |  |  |  |  |  |  |  children: array (3)
	   |  |  |  |  |  |  |  |  0 => Latte\Compiler\Nodes\TextNode
	   |  |  |  |  |  |  |  |  |  content: 'attr6'
	   |  |  |  |  |  |  |  |  |  position: Latte\Compiler\Position
	   |  |  |  |  |  |  |  |  |  |  line: 1
	   |  |  |  |  |  |  |  |  |  |  column: 58
	   |  |  |  |  |  |  |  |  |  |  offset: 57
	   |  |  |  |  |  |  |  |  1 => FooNode
	   |  |  |  |  |  |  |  |  |  position: Latte\Compiler\Position
	   |  |  |  |  |  |  |  |  |  |  line: 1
	   |  |  |  |  |  |  |  |  |  |  column: 63
	   |  |  |  |  |  |  |  |  |  |  offset: 62
	   |  |  |  |  |  |  |  |  2 => Latte\Compiler\Nodes\TextNode
	   |  |  |  |  |  |  |  |  |  content: 'b'
	   |  |  |  |  |  |  |  |  |  position: Latte\Compiler\Position
	   |  |  |  |  |  |  |  |  |  |  line: 1
	   |  |  |  |  |  |  |  |  |  |  column: 69
	   |  |  |  |  |  |  |  |  |  |  offset: 68
	   |  |  |  |  |  |  |  position: Latte\Compiler\Position
	   |  |  |  |  |  |  |  |  line: 1
	   |  |  |  |  |  |  |  |  column: 58
	   |  |  |  |  |  |  |  |  offset: 57
	   |  |  |  |  |  |  value: Latte\Compiler\Nodes\FragmentNode
	   |  |  |  |  |  |  |  children: array (3)
	   |  |  |  |  |  |  |  |  0 => Latte\Compiler\Nodes\TextNode
	   |  |  |  |  |  |  |  |  |  content: 'c'
	   |  |  |  |  |  |  |  |  |  position: Latte\Compiler\Position
	   |  |  |  |  |  |  |  |  |  |  line: 1
	   |  |  |  |  |  |  |  |  |  |  column: 71
	   |  |  |  |  |  |  |  |  |  |  offset: 70
	   |  |  |  |  |  |  |  |  1 => FooNode
	   |  |  |  |  |  |  |  |  |  position: Latte\Compiler\Position
	   |  |  |  |  |  |  |  |  |  |  line: 1
	   |  |  |  |  |  |  |  |  |  |  column: 72
	   |  |  |  |  |  |  |  |  |  |  offset: 71
	   |  |  |  |  |  |  |  |  2 => Latte\Compiler\Nodes\TextNode
	   |  |  |  |  |  |  |  |  |  content: 'd'
	   |  |  |  |  |  |  |  |  |  position: Latte\Compiler\Position
	   |  |  |  |  |  |  |  |  |  |  line: 1
	   |  |  |  |  |  |  |  |  |  |  column: 78
	   |  |  |  |  |  |  |  |  |  |  offset: 77
	   |  |  |  |  |  |  |  position: Latte\Compiler\Position
	   |  |  |  |  |  |  |  |  line: 1
	   |  |  |  |  |  |  |  |  column: 71
	   |  |  |  |  |  |  |  |  offset: 70
	   |  |  |  |  |  |  position: Latte\Compiler\Position
	   |  |  |  |  |  |  |  line: 1
	   |  |  |  |  |  |  |  column: 58
	   |  |  |  |  |  |  |  offset: 57
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
	XX, parse("<br {foo}attr4='val'{/foo} {foo}attr5{/foo}={foo}b{/foo} attr6{foo/}b=c{foo/}d>"));


Assert::match(<<<'XX'
	Latte\Compiler\Nodes\TemplateNode
	   head: Latte\Compiler\Nodes\FragmentNode
	   |  children: array (0)
	   |  position: null
	   main: Latte\Compiler\Nodes\FragmentNode
	   |  children: array (1)
	   |  |  0 => FooNode
	   |  |  |  position: Latte\Compiler\Position
	   |  |  |  |  line: 1
	   |  |  |  |  column: 5
	   |  |  |  |  offset: 4
	   |  position: Latte\Compiler\Position
	   |  |  line: 1
	   |  |  column: 5
	   |  |  offset: 4
	   position: null
	XX, parse('<br n:foo>'));


Assert::match(<<<'XX'
	Latte\Compiler\Nodes\TemplateNode
	   head: Latte\Compiler\Nodes\FragmentNode
	   |  children: array (0)
	   |  position: null
	   main: Latte\Compiler\Nodes\FragmentNode
	   |  children: array (1)
	   |  |  0 => Latte\Compiler\Nodes\Html\ElementNode
	   |  |  |  customName: null
	   |  |  |  attributes: Latte\Compiler\Nodes\FragmentNode
	   |  |  |  |  children: array (0)
	   |  |  |  |  position: null
	   |  |  |  selfClosing: false
	   |  |  |  content: Latte\Compiler\Nodes\FragmentNode
	   |  |  |  |  children: array (2)
	   |  |  |  |  |  0 => Latte\Compiler\Nodes\TextNode
	   |  |  |  |  |  |  content: '\n'
	   |  |  |  |  |  |  position: Latte\Compiler\Position
	   |  |  |  |  |  |  |  line: 1
	   |  |  |  |  |  |  |  column: 4
	   |  |  |  |  |  |  |  offset: 3
	   |  |  |  |  |  1 => Latte\Compiler\Nodes\TextNode
	   |  |  |  |  |  |  content: '...\n'
	   |  |  |  |  |  |  position: Latte\Compiler\Position
	   |  |  |  |  |  |  |  line: 2
	   |  |  |  |  |  |  |  column: 1
	   |  |  |  |  |  |  |  offset: 4
	   |  |  |  |  position: Latte\Compiler\Position
	   |  |  |  |  |  line: 1
	   |  |  |  |  |  column: 4
	   |  |  |  |  |  offset: 3
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
