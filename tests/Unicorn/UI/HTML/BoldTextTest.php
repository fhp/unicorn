<?php

namespace Unicorn\UI\HTML;

use PHPUnit\Framework\TestCase;
use Unicorn\UI\Base\TestIsHtmlElement;
use Unicorn\UI\Bootstrap\Bold;

class BoldTextTest extends TestCase
{
	use TestIsHtmlElement;
	
	function constructTestObject()
	{
		return new Bold("Hallo");
	}
	
	function testIsBoldTag()
	{
		$this->assertXmlStringEqualsXmlString("<b>Hallo</b>", $this->constructTestObject()->render());
	}
}
