<?php

namespace Unicorn\UI\Bootstrap;

use PHPUnit\Framework\TestCase;
use Unicorn\UI\Base\TestHasNoChildren;
use Unicorn\UI\Base\TestIsNoElement;
use Unicorn\UI\Bootstrap\Icons\TrueIcon;

class IconTest extends TestCase
{
	use TestHasNoChildren;
	use TestIsNoElement;
	
	function constructTestObject()
	{
		return new TrueIcon();
	}
	
	function testConstructorColor()
	{
		$i = new TrueIcon("blue");
		
		$this->assertContains("style=\"color: blue;\"", $i->render());
	}
	
	function testColor()
	{
		$i = new TrueIcon();
		$i->setColor("blue");
		
		$this->assertContains("style=\"color: blue;\"", $i->render());
	}
	
	function testOverrideColor()
	{
		$i = new TrueIcon("green");
		$i->setColor("red");
		$i->setColor("blue");
		
		$this->assertContains("style=\"color: blue;\"", $i->render());
		$this->assertNotContains("style=\"color: green;\"", $i->render());
		$this->assertNotContains("style=\"color: red;\"", $i->render());
	}
	
	function testConstructorAria()
	{
		$i = new TrueIcon("green", "ja");
		
		$this->assertContains("<span class=\"sr-only\">ja</span>", $i->render());
	}
	
	function testAria()
	{
		$i = new TrueIcon();
		$i->setAriaMeaning("ja");
		
		$this->assertContains("<span class=\"sr-only\">ja</span>", $i->render());
	}
}
