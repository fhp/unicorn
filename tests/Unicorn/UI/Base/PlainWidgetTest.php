<?php

namespace Unicorn\UI\Base;

use PHPUnit\Framework\TestCase;

class PlainWidgetTest extends TestCase
{
	use TestIsWidget;
	use TestIsNoElement;
	use TestHasNoChildren;
	
	function constructTestObject()
	{
		return new PlainWidgetTester("p");
	}
	
	function testWidgetConstructor()
	{
		$p = new PlainWidgetTester(new HtmlElement("p"));
		$this->assertEquals("<p></p>", trim($p->render()));
	}
	
	function testHtmlElementConstructor()
	{
		$p = new PlainWidgetTester("p");
		$this->assertEquals("<p></p>", trim($p->render()));
	}
	
	function testInvalidConstructor()
	{
		$this->expectException(\InvalidArgumentException::class);
		new PlainWidgetTester(new Text("Hallo"));
	}
	
}

class PlainWidgetTester extends PlainWidget
{
}
