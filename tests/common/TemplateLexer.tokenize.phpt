<?php

declare(strict_types=1);

use Latte\Compiler\Token;
use Tester\Assert;

require __DIR__ . '/../bootstrap.php';


function tokenize($s)
{
	$lexer = new Latte\Compiler\TemplateLexer;
	return array_map(
		fn(Token $token) => [$token->type, $token->text, $token->line . ':' . $token->column],
		iterator_to_array($lexer->tokenize($s), false),
	);
}


Assert::same([
	[Token::Text, '<0>', '1:1'],
], tokenize('<0>'));

Assert::same([
	[Token::Html_TagOpen, '<', '1:1'],
	[Token::Html_Name, 'x:-._', '1:2'],
	[Token::Html_TagClose, '>', '1:7'],
], tokenize('<x:-._>'));

Assert::same([
	[Token::Text, '  ', '1:1'],
	[Token::Html_BogusOpen, '<?', '1:3'],
	[Token::Text, 'xml encoding="', '1:5'],
	[Token::Latte_TagOpen, '{', '1:19'],
	[Token::Php_Variable, '$enc', '1:20'],
	[Token::Latte_TagClose, '}', '1:24'],
	[Token::Text, '" ?', '1:25'],
	[Token::Html_TagClose, '>', '1:28'],
	[Token::Text, 'text', '1:29'],
], tokenize('  <?xml encoding="{$enc}" ?>text'));

Assert::same([
	[Token::Text, 'x ', '1:1'],
	[Token::Html_BogusOpen, '<?', '1:3'],
	[Token::Text, '= $abc ?', '1:5'],
	[Token::Html_TagClose, '>', '1:13'],
	[Token::Text, 'text', '1:14'],
], tokenize('x <?= $abc ?>text'));

Assert::same([
	[Token::Text, "\n ", '1:1'],
	[Token::Html_BogusOpen, '<?', '2:2'],
	[Token::Text, 'bogus', '2:4'],
	[Token::Html_TagClose, '>', '2:9'],
	[Token::Text, "\ntext", '2:10'],
], tokenize("\n <?bogus>\ntext"));

Assert::same([
	[Token::Html_BogusOpen, '<!', '1:1'],
	[Token::Text, 'doctype html', '1:3'],
	[Token::Html_TagClose, '>', '1:15'],
	[Token::Text, 'text', '1:16'],
], tokenize('<!doctype html>text'));

Assert::same([
	[Token::Text, '  ', '1:1'],
	[Token::Html_BogusOpen, '<!', '1:3'],
	[Token::Text, '--', '1:5'],
	[Token::Html_TagClose, '>', '1:7'],
	[Token::Text, ' text> --> text', '1:8'],
], tokenize('  <!--> text> --> text'));

Assert::same([
	[Token::Text, '  ', '1:1'],
	[Token::Html_CommentOpen, '<!--', '1:3'],
	[Token::Text, ' text> ', '1:7'],
	[Token::Html_CommentClose, '-->', '1:14'],
	[Token::Text, ' text', '1:17'],
], tokenize('  <!-- text> --> text'));

Assert::same([
	[Token::Html_BogusOpen, '<!', '1:1'],
	[Token::Text, 'bogus', '1:3'],
	[Token::Html_TagClose, '>', '1:8'],
	[Token::Text, 'text', '1:9'],
], tokenize('<!bogus>text'));


// html
Assert::same([
	[Token::Indentation, '  ', '1:1'],
	[Token::Html_TagOpen, '<', '1:3'],
	[Token::Html_Name, 'div', '1:4'],
	[Token::Html_TagClose, '>', '1:7'],
	[Token::Newline, "\n", '1:8'],
	[Token::Text, "\nx  ", '2:1'],
	[Token::Html_TagOpen, '<', '3:4'],
	[Token::Slash, '/', '3:5'],
	[Token::Html_Name, 'div', '3:6'],
	[Token::Html_TagClose, '>', '3:9'],
	[Token::Newline, "\n", '3:10'],
	[Token::Text, "\n", '4:1'],
], tokenize("  <div>\n\nx  </div>\n\n"));

Assert::same([
	[Token::Html_TagOpen, '<', '1:1'],
	[Token::Html_Name, 'meta', '1:2'],
	[Token::Whitespace, ' ', '1:6'],
	[Token::Html_Name, 'a', '1:7'],
	[Token::Whitespace, ' ', '1:8'],
	[Token::Html_Name, 'b', '1:9'],
	[Token::Whitespace, ' ', '1:10'],
	[Token::Html_Name, 'c', '1:11'],
	[Token::Whitespace, ' ', '1:12'],
	[Token::Equals, '=', '1:13'],
	[Token::Whitespace, ' ', '1:14'],
	[Token::Html_Name, 'd', '1:15'],
	[Token::Whitespace, ' ', '1:16'],
	[Token::Html_Name, 'n:e', '1:17'],
	[Token::Whitespace, ' ', '1:20'],
	[Token::Equals, '=', '1:21'],
	[Token::Whitespace, ' ', '1:22'],
	[Token::Quote, '\'', '1:23'],
	[Token::Text, 'f', '1:24'],
	[Token::Quote, '\'', '1:25'],
	[Token::Whitespace, ' ', '1:26'],
	[Token::Html_Name, 'g', '1:27'],
	[Token::Equals, '=', '1:28'],
	[Token::Quote, '"', '1:29'],
	[Token::Text, 'h', '1:30'],
	[Token::Quote, '"', '1:31'],
	[Token::Whitespace, ' ', '1:32'],
	[Token::Html_Name, 'i', '1:33'],
	[Token::Html_TagClose, '>', '1:34'],
], tokenize('<meta a b c = d n:e = \'f\' g="h" i>'));

Assert::same([
	[Token::Html_TagOpen, '<', '1:1'],
	[Token::Html_Name, 'div', '1:2'],
	[Token::Whitespace, ' ', '1:5'],
	[Token::Html_Name, 'a', '1:6'],
	[Token::Whitespace, ' ', '1:7'],
	[Token::Latte_TagOpen, '{', '1:8'],
	[Token::Latte_Name, 'b', '1:9'],
	[Token::Latte_TagClose, '}', '1:10'],
	[Token::Whitespace, ' ', '1:11'],
	[Token::Html_Name, 'c', '1:12'],
	[Token::Whitespace, ' ', '1:13'],
	[Token::Equals, '=', '1:14'],
	[Token::Whitespace, ' ', '1:15'],
	[Token::Latte_TagOpen, '{', '1:16'],
	[Token::Latte_Name, 'd', '1:17'],
	[Token::Latte_TagClose, '}', '1:18'],
	[Token::Whitespace, ' ', '1:19'],
	[Token::Html_Name, 'e', '1:20'],
	[Token::Whitespace, ' ', '1:21'],
	[Token::Equals, '=', '1:22'],
	[Token::Whitespace, ' ', '1:23'],
	[Token::Html_Name, 'a', '1:24'],
	[Token::Latte_TagOpen, '{', '1:25'],
	[Token::Latte_Name, 'b', '1:26'],
	[Token::Latte_TagClose, '}', '1:27'],
	[Token::Html_Name, 'c', '1:28'],
	[Token::Whitespace, ' ', '1:29'],
	[Token::Html_Name, 'f', '1:30'],
	[Token::Whitespace, ' ', '1:31'],
	[Token::Equals, '=', '1:32'],
	[Token::Whitespace, ' ', '1:33'],
	[Token::Quote, '"', '1:34'],
	[Token::Text, 'a', '1:35'],
	[Token::Latte_TagOpen, '{', '1:36'],
	[Token::Latte_Name, 'b', '1:37'],
	[Token::Latte_TagClose, '}', '1:38'],
	[Token::Text, 'c', '1:39'],
	[Token::Quote, '"', '1:40'],
	[Token::Html_TagClose, '>', '1:41'],
], tokenize('<div a {b} c = {d} e = a{b}c f = "a{b}c">'));

Assert::same([
	[Token::Html_TagOpen, '<', '1:1'],
	[Token::Html_Name, 'script', '1:2'],
	[Token::Html_TagClose, '>', '1:8'],
	[Token::Text, ' hello<a> ', '1:9'],
	[Token::Html_TagOpen, '<', '1:19'],
	[Token::Slash, '/', '1:20'],
	[Token::Html_Name, 'script', '1:21'],
	[Token::Html_TagClose, '>', '1:27'],
], tokenize('<script> hello<a> </script>'));

// latte elements
Assert::same([
	[Token::Indentation, ' ', '1:1'],
	[Token::Latte_TagOpen, '{', '1:2'],
	[Token::Latte_Name, 'foo', '1:3'],
	[Token::Php_Whitespace, ' ', '1:6'],
	[Token::Php_Identifier, 'bar', '1:7'],
	[Token::Latte_TagClose, '}', '1:10'],
	[Token::Text, ' ... ', '1:11'],
	[Token::Latte_TagOpen, '{', '1:16'],
	[Token::Slash, '/', '1:17'],
	[Token::Latte_Name, 'foo', '1:18'],
	[Token::Latte_TagClose, '}', '1:21'],
	[Token::Newline, "\n", '1:22'],
	[Token::Text, "\n ", '2:1'],
], tokenize(" {foo bar} ... {/foo}\n\n "));

Assert::same([
	[Token::Indentation, ' ', '1:1'],
	[Token::Latte_CommentOpen, '{*', '1:2'],
	[Token::Text, ' comment ', '1:4'],
	[Token::Latte_CommentClose, '*}', '1:13'],
	[Token::Newline, "\n\n", '1:15'],
	[Token::Text, "\n ", '3:1'],
], tokenize(" {* comment *}\n\n\n "));
