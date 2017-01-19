<?php

namespace Unicorn\UI\Base;

use PHPUnit\Framework\TestCase;

class HtmlBlobTest extends TestCase
{
	use TestIsNoContainer;
	use TestIsNoElement;
	
	function constructTestObject()
	{
		return new HtmlBlob("<p>Hallo</p>");
	}
	
	function testRender()
	{
		$h = new HtmlBlob("Hallo");
		$this->assertEquals("Hallo", $h->render());
	}
	
	function testNoHtmlEntities()
	{
		$h = new HtmlBlob("<p>Hallo</p>");
		$this->assertEquals("<p>Hallo</p>", $h->render());
	}
	
}
