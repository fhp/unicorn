<?php

namespace Unicorn\UI\Bootstrap;

use PHPUnit\Framework\TestCase;
use Unicorn\UI\Base\TestHasNoChildren;
use Unicorn\UI\Base\TestIsElement;
use Unicorn\UI\HTML\Link;

class NavigationPillsTest extends TestCase
{
	use TestHasNoChildren;
	use TestIsElement;
	
	function constructTestObject()
	{
		return new NavigationPills();
	}
	
	function testClass()
	{
		$n = new NavigationPills();
		
		$this->assertRegExp("/class=\"[^\"]*nav[^\"]*\"/", $n->render());
		$this->assertRegExp("/class=\"[^\"]*nav-pills[^\"]*\"/", $n->render());
	}
	
	function testAddItem()
	{
		$n = new NavigationPills();
		$link = new Link("test.html");
		$link->addText("hoi");
		$item = new NavigationItem($link);
		$n->addItem($item);
		
		$this->assertContains($link->render(), $n->render());
	}
	
}
