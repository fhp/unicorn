<?php

namespace Unicorn\UI\HTML;

use PHPUnit\Framework\TestCase;
use Unicorn\UI\Base\TestHasNoChildren;
use Unicorn\UI\Base\TestIsNoElement;

class JavascriptSourceTest extends TestCase
{
	use TestIsNoElement;
	use TestHasNoChildren;
	
	function constructTestObject()
	{
		return new JavascriptSource("script.js");
	}
	
	function testIsValidLinkTag()
	{
		$t = new JavascriptSource("script.js");
		$this->assertContains("<script src=\"script.js\">", $t->render());
	}
	
}
