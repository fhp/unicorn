<?php

namespace Unicorn\UI\HTML;

use PHPUnit\Framework\TestCase;
use Unicorn\UI\Base\TestIsHtmlElement;

class BoldTextTest extends TestCase
{
	use TestIsHtmlElement;
	
	function constructTestObject()
	{
		return new BoldText("Hallo");
	}
	
	function testIsBoldTag()
	{
		$this->assertXmlStringEqualsXmlString("<b>Hallo</b>", $this->constructTestObject()->render());
	}
}
