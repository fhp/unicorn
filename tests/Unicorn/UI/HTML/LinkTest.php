<?php

namespace Unicorn\UI\HTML;

use PHPUnit\Framework\TestCase;
use Unicorn\UI\Base\TestIsHtmlElement;

class LinkTest extends TestCase
{
	use TestIsHtmlElement;
	
	function constructTestObject()
	{
		return new Link("index.html");
	}
	
	function testIsLink()
	{
		$this->assertXmlStringEqualsXmlString("<a href=\"index.html\"></a>", $this->constructTestObject()->render());
	}
	
}
