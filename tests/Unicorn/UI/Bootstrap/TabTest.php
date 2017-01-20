<?php

namespace Unicorn\UI\Bootstrap;

use PHPUnit\Framework\TestCase;
use Unicorn\UI\Base\Container;
use Unicorn\UI\Base\TestIsContainer;

class TabTest extends TestCase
{
	use TestIsContainer;
	
	function constructTestObject()
	{
		return new Tab("test", "Test", false);
	}
	
	function testTabName()
	{
		$t = new Tab("test", "Test");
		
		$this->assertEquals("Test", $t->tabName());
	}
	
	function testID()
	{
		$t = new Tab("test", "Test");
		
		$this->assertEquals("test", $t->id());
	}
	
	function testContentPane()
	{
		$t = new Tab("test", "Test");
		$this->assertInstanceOf(Container::class, $t->contentPane());
	}
	
	function testNavigationItem()
	{
		$t = new Tab("test", "Test");
		$this->assertInstanceOf(NavigationItem::class, $t->navigationItem());
		$this->assertContains("Test", $t->navigationItem()->render());
	}
	
	function testActivate()
	{
		$t = new Tab("test", "Test");
		$t->activate();
		$this->assertTrue($t->hasClass("active"));
		$this->assertTrue($t->navigationItem()->hasClass("active"));
	}
}
