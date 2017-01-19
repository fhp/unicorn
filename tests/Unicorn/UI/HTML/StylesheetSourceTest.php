<?php

namespace Unicorn\UI\HTML;

use PHPUnit\Framework\TestCase;
use Unicorn\UI\Base\TestHasNoChildren;
use Unicorn\UI\Base\TestIsNoElement;

class StylesheetSourceTest extends TestCase
{
	use TestIsNoElement;
	use TestHasNoChildren;
	
	function constructTestObject()
	{
		return new StylesheetSource("style.css");
	}
	
	function testIsValidLinkTag()
	{
		$t = new StylesheetSource("style.css");
		$this->assertContains("<link href=\"style.css\" type=\"text/css\" rel=\"stylesheet\">", $t->render());
	}
}
