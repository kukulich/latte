<?php

/**
 * Test: Latte\Essential\Filters::repeat()
 */

declare(strict_types=1);

use Latte\Context;
use Latte\Essential\Filters;
use Latte\Runtime\FilterInfo;
use Tester\Assert;

require __DIR__ . '/../bootstrap.php';


test('', function () {
	$info = new FilterInfo(Context::Text);
	Assert::same('', Filters::repeat($info, '', 1));
	Assert::same('ab', Filters::repeat($info, 'ab', 1));
	Assert::same('', Filters::repeat($info, 'ab', 0));
	Assert::same('ababababab', Filters::repeat($info, 'ab', 5));
});


test('', function () {
	$info = new FilterInfo(Context::Html);
	Assert::same('', Filters::repeat($info, '', 1));
	Assert::same('ab', Filters::repeat($info, 'ab', 1));
	Assert::same('', Filters::repeat($info, 'ab', 0));
	Assert::same('ababababab', Filters::repeat($info, 'ab', 5));
});
