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
		return new PlainWidget("p");
	}
	
	function testWidgetConstructor()
	{
		$p = new PlainWidget(new HtmlElement("p"));
		$this->assertEquals("<p></p>", trim($p->render()));
	}
	
	function testHtmlElementConstructor()
	{
		$p = new PlainWidget("p");
		$this->assertEquals("<p></p>", trim($p->render()));
	}
	
	function testInvalidConstructor()
	{
		$this->expectException(\InvalidArgumentException::class);
		new PlainWidget(new Text("Hallo"));
	}
	
}
