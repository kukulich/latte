<?php

// New

declare(strict_types=1);

use Tester\Assert;

require __DIR__ . '/../bootstrap.php';

$test = <<<'XX'
	new A,
	new A($b),

	/* class name variations */
	new $a(),
	new $a['b'](),
	new A::$b(),
	/* DNCR object access */
	new $a->b(),
	new $a->b->c(),
	new $a->b['c'](),

	/* UVS new expressions */
	new $className,
	new $array['className'],
	new $obj->className,
	new Test::$className,
	new $test::$className,
	new $weird[0]->foo::$className,

	/* test regression introduces by new dereferencing syntax */
	(new A),
	XX;

$node = parseCode($test);

Assert::same(
	loadContent(__FILE__, __COMPILER_HALT_OFFSET__),
	exportNode($node),
);

__halt_compiler();
Latte\Compiler\Nodes\Php\Expression\ArrayNode
   items: array (15)
   |  0 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Expression\NewNode
   |  |  |  class: Latte\Compiler\Nodes\Php\NameNode
   |  |  |  |  parts: array (1)
   |  |  |  |  |  0 => 'A'
   |  |  |  |  position: 1:5 (offset 4)
   |  |  |  args: array (0)
   |  |  |  position: 1:1 (offset 0)
   |  |  key: null
   |  |  byRef: false
   |  |  position: 1:1 (offset 0)
   |  |  unpack: false
   |  1 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Expression\NewNode
   |  |  |  class: Latte\Compiler\Nodes\Php\NameNode
   |  |  |  |  parts: array (1)
   |  |  |  |  |  0 => 'A'
   |  |  |  |  position: 2:5 (offset 11)
   |  |  |  args: array (1)
   |  |  |  |  0 => Latte\Compiler\Nodes\Php\ArgumentNode
   |  |  |  |  |  value: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  |  |  name: 'b'
   |  |  |  |  |  |  position: 2:7 (offset 13)
   |  |  |  |  |  byRef: false
   |  |  |  |  |  unpack: false
   |  |  |  |  |  position: 2:7 (offset 13)
   |  |  |  |  |  name: null
   |  |  |  position: 2:1 (offset 7)
   |  |  key: null
   |  |  byRef: false
   |  |  position: 2:1 (offset 7)
   |  |  unpack: false
   |  2 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Expression\NewNode
   |  |  |  class: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  name: 'a'
   |  |  |  |  position: 5:5 (offset 51)
   |  |  |  args: array (0)
   |  |  |  position: 5:1 (offset 47)
   |  |  key: null
   |  |  byRef: false
   |  |  position: 5:1 (offset 47)
   |  |  unpack: false
   |  3 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Expression\NewNode
   |  |  |  class: Latte\Compiler\Nodes\Php\Expression\ArrayAccessNode
   |  |  |  |  expr: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  |  name: 'a'
   |  |  |  |  |  position: 6:5 (offset 61)
   |  |  |  |  index: Latte\Compiler\Nodes\Php\Scalar\StringNode
   |  |  |  |  |  value: 'b'
   |  |  |  |  |  position: 6:8 (offset 64)
   |  |  |  |  position: 6:5 (offset 61)
   |  |  |  args: array (0)
   |  |  |  position: 6:1 (offset 57)
   |  |  key: null
   |  |  byRef: false
   |  |  position: 6:1 (offset 57)
   |  |  unpack: false
   |  4 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Expression\NewNode
   |  |  |  class: Latte\Compiler\Nodes\Php\Expression\StaticPropertyFetchNode
   |  |  |  |  name: Latte\Compiler\Nodes\Php\VarLikeIdentifierNode
   |  |  |  |  |  name: 'b'
   |  |  |  |  |  position: 7:8 (offset 79)
   |  |  |  |  class: Latte\Compiler\Nodes\Php\NameNode
   |  |  |  |  |  parts: array (1)
   |  |  |  |  |  |  0 => 'A'
   |  |  |  |  |  position: 7:5 (offset 76)
   |  |  |  |  position: 7:5 (offset 76)
   |  |  |  args: array (0)
   |  |  |  position: 7:1 (offset 72)
   |  |  key: null
   |  |  byRef: false
   |  |  position: 7:1 (offset 72)
   |  |  unpack: false
   |  5 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Expression\NewNode
   |  |  |  class: Latte\Compiler\Nodes\Php\Expression\PropertyFetchNode
   |  |  |  |  name: Latte\Compiler\Nodes\Php\IdentifierNode
   |  |  |  |  |  name: 'b'
   |  |  |  |  |  position: 9:9 (offset 118)
   |  |  |  |  object: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  |  name: 'a'
   |  |  |  |  |  position: 9:5 (offset 114)
   |  |  |  |  position: 9:5 (offset 114)
   |  |  |  args: array (0)
   |  |  |  position: 9:1 (offset 110)
   |  |  key: null
   |  |  byRef: false
   |  |  position: 9:1 (offset 110)
   |  |  unpack: false
   |  6 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Expression\NewNode
   |  |  |  class: Latte\Compiler\Nodes\Php\Expression\PropertyFetchNode
   |  |  |  |  name: Latte\Compiler\Nodes\Php\IdentifierNode
   |  |  |  |  |  name: 'c'
   |  |  |  |  |  position: 10:12 (offset 134)
   |  |  |  |  object: Latte\Compiler\Nodes\Php\Expression\PropertyFetchNode
   |  |  |  |  |  name: Latte\Compiler\Nodes\Php\IdentifierNode
   |  |  |  |  |  |  name: 'b'
   |  |  |  |  |  |  position: 10:9 (offset 131)
   |  |  |  |  |  object: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  |  |  name: 'a'
   |  |  |  |  |  |  position: 10:5 (offset 127)
   |  |  |  |  |  position: 10:5 (offset 127)
   |  |  |  |  position: 10:5 (offset 127)
   |  |  |  args: array (0)
   |  |  |  position: 10:1 (offset 123)
   |  |  key: null
   |  |  byRef: false
   |  |  position: 10:1 (offset 123)
   |  |  unpack: false
   |  7 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Expression\NewNode
   |  |  |  class: Latte\Compiler\Nodes\Php\Expression\ArrayAccessNode
   |  |  |  |  expr: Latte\Compiler\Nodes\Php\Expression\PropertyFetchNode
   |  |  |  |  |  name: Latte\Compiler\Nodes\Php\IdentifierNode
   |  |  |  |  |  |  name: 'b'
   |  |  |  |  |  |  position: 11:9 (offset 147)
   |  |  |  |  |  object: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  |  |  name: 'a'
   |  |  |  |  |  |  position: 11:5 (offset 143)
   |  |  |  |  |  position: 11:5 (offset 143)
   |  |  |  |  index: Latte\Compiler\Nodes\Php\Scalar\StringNode
   |  |  |  |  |  value: 'c'
   |  |  |  |  |  position: 11:11 (offset 149)
   |  |  |  |  position: 11:5 (offset 143)
   |  |  |  args: array (0)
   |  |  |  position: 11:1 (offset 139)
   |  |  key: null
   |  |  byRef: false
   |  |  position: 11:1 (offset 139)
   |  |  unpack: false
   |  8 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Expression\NewNode
   |  |  |  class: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  name: 'className'
   |  |  |  |  position: 14:5 (offset 188)
   |  |  |  args: array (0)
   |  |  |  position: 14:1 (offset 184)
   |  |  key: null
   |  |  byRef: false
   |  |  position: 14:1 (offset 184)
   |  |  unpack: false
   |  9 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Expression\NewNode
   |  |  |  class: Latte\Compiler\Nodes\Php\Expression\ArrayAccessNode
   |  |  |  |  expr: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  |  name: 'array'
   |  |  |  |  |  position: 15:5 (offset 204)
   |  |  |  |  index: Latte\Compiler\Nodes\Php\Scalar\StringNode
   |  |  |  |  |  value: 'className'
   |  |  |  |  |  position: 15:12 (offset 211)
   |  |  |  |  position: 15:5 (offset 204)
   |  |  |  args: array (0)
   |  |  |  position: 15:1 (offset 200)
   |  |  key: null
   |  |  byRef: false
   |  |  position: 15:1 (offset 200)
   |  |  unpack: false
   |  10 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Expression\NewNode
   |  |  |  class: Latte\Compiler\Nodes\Php\Expression\PropertyFetchNode
   |  |  |  |  name: Latte\Compiler\Nodes\Php\IdentifierNode
   |  |  |  |  |  name: 'className'
   |  |  |  |  |  position: 16:11 (offset 235)
   |  |  |  |  object: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  |  name: 'obj'
   |  |  |  |  |  position: 16:5 (offset 229)
   |  |  |  |  position: 16:5 (offset 229)
   |  |  |  args: array (0)
   |  |  |  position: 16:1 (offset 225)
   |  |  key: null
   |  |  byRef: false
   |  |  position: 16:1 (offset 225)
   |  |  unpack: false
   |  11 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Expression\NewNode
   |  |  |  class: Latte\Compiler\Nodes\Php\Expression\StaticPropertyFetchNode
   |  |  |  |  name: Latte\Compiler\Nodes\Php\VarLikeIdentifierNode
   |  |  |  |  |  name: 'className'
   |  |  |  |  |  position: 17:11 (offset 256)
   |  |  |  |  class: Latte\Compiler\Nodes\Php\NameNode
   |  |  |  |  |  parts: array (1)
   |  |  |  |  |  |  0 => 'Test'
   |  |  |  |  |  position: 17:5 (offset 250)
   |  |  |  |  position: 17:5 (offset 250)
   |  |  |  args: array (0)
   |  |  |  position: 17:1 (offset 246)
   |  |  key: null
   |  |  byRef: false
   |  |  position: 17:1 (offset 246)
   |  |  unpack: false
   |  12 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Expression\NewNode
   |  |  |  class: Latte\Compiler\Nodes\Php\Expression\StaticPropertyFetchNode
   |  |  |  |  name: Latte\Compiler\Nodes\Php\VarLikeIdentifierNode
   |  |  |  |  |  name: 'className'
   |  |  |  |  |  position: 18:12 (offset 279)
   |  |  |  |  class: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  |  name: 'test'
   |  |  |  |  |  position: 18:5 (offset 272)
   |  |  |  |  position: 18:5 (offset 272)
   |  |  |  args: array (0)
   |  |  |  position: 18:1 (offset 268)
   |  |  key: null
   |  |  byRef: false
   |  |  position: 18:1 (offset 268)
   |  |  unpack: false
   |  13 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Expression\NewNode
   |  |  |  class: Latte\Compiler\Nodes\Php\Expression\StaticPropertyFetchNode
   |  |  |  |  name: Latte\Compiler\Nodes\Php\VarLikeIdentifierNode
   |  |  |  |  |  name: 'className'
   |  |  |  |  |  position: 19:21 (offset 311)
   |  |  |  |  class: Latte\Compiler\Nodes\Php\Expression\PropertyFetchNode
   |  |  |  |  |  name: Latte\Compiler\Nodes\Php\IdentifierNode
   |  |  |  |  |  |  name: 'foo'
   |  |  |  |  |  |  position: 19:16 (offset 306)
   |  |  |  |  |  object: Latte\Compiler\Nodes\Php\Expression\ArrayAccessNode
   |  |  |  |  |  |  expr: Latte\Compiler\Nodes\Php\Expression\VariableNode
   |  |  |  |  |  |  |  name: 'weird'
   |  |  |  |  |  |  |  position: 19:5 (offset 295)
   |  |  |  |  |  |  index: Latte\Compiler\Nodes\Php\Scalar\IntegerNode
   |  |  |  |  |  |  |  value: 0
   |  |  |  |  |  |  |  kind: 10
   |  |  |  |  |  |  |  position: 19:12 (offset 302)
   |  |  |  |  |  |  position: 19:5 (offset 295)
   |  |  |  |  |  position: 19:5 (offset 295)
   |  |  |  |  position: 19:5 (offset 295)
   |  |  |  args: array (0)
   |  |  |  position: 19:1 (offset 291)
   |  |  key: null
   |  |  byRef: false
   |  |  position: 19:1 (offset 291)
   |  |  unpack: false
   |  14 => Latte\Compiler\Nodes\Php\Expression\ArrayItemNode
   |  |  value: Latte\Compiler\Nodes\Php\Expression\NewNode
   |  |  |  class: Latte\Compiler\Nodes\Php\NameNode
   |  |  |  |  parts: array (1)
   |  |  |  |  |  0 => 'A'
   |  |  |  |  position: 22:6 (offset 390)
   |  |  |  args: array (0)
   |  |  |  position: 22:2 (offset 386)
   |  |  key: null
   |  |  byRef: false
   |  |  position: 22:1 (offset 385)
   |  |  unpack: false
   position: null
