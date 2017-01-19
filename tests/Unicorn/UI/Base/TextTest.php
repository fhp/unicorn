<?php

namespace Unicorn\UI\Base;

use PHPUnit\Framework\TestCase;

class TextTest extends TestCase
{
	use TestHasNoChildren;
	use TestIsNoElement;
	
	function constructTestObject()
	{
		return new Text("Hallo");
	}
	
	function testRender()
	{
		$t = new Text("Hallo");
		$this->assertEquals("Hallo", $t->render());
	}
	
	function testHtmlEntities()
	{
		$t = new Text("a&b");
		$this->assertEquals("a&amp;b", $t->render());
	}
}
