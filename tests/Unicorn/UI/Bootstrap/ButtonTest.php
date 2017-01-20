<?php

namespace Unicorn\UI\Bootstrap;

use PHPUnit\Framework\TestCase;
use Unicorn\UI\Base\TestIsHtmlElement;
use Unicorn\UI\Bootstrap\Icons\TrueIcon;

class ButtonTest extends TestCase
{
	use TestIsHtmlElement;
	
	function constructTestObject()
	{
		return new Button("test");
	}
	
	function testConstructor()
	{
		$b = new Button("test");
		
		$this->assertTrue($b->hasClass("btn"));
		$this->assertTrue($b->hasClass("btn-default"));
		$this->assertTrue($b->property("type") == "button");
		$this->assertContains("test", $b->render());
	}
	
	function testIcon()
	{
		$b = new Button("test", new TrueIcon);
		
		$this->assertContains("glyphicon-ok", $b->render());
	}
	
	function testStyle()
	{
		$b = new Button("test", null, ContextualStyle::primary());
		
		$this->assertTrue($b->hasClass("btn-primary"));
	}
}
