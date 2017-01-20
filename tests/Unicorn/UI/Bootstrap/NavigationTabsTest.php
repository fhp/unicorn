<?php

namespace Unicorn\UI\Bootstrap;

use PHPUnit\Framework\TestCase;
use Unicorn\UI\Base\TestHasNoChildren;
use Unicorn\UI\Base\TestIsElement;
use Unicorn\UI\HTML\Link;

class NavigationTabsTest extends TestCase
{
	use TestHasNoChildren;
	use TestIsElement;
	
	function constructTestObject()
	{
		return new NavigationTabs();
	}
	
	function testClass()
	{
		$n = new NavigationTabs();
		
		$this->assertRegExp("/class=\"[^\"]*nav[^\"]*\"/", $n->render());
		$this->assertRegExp("/class=\"[^\"]*nav-tabs[^\"]*\"/", $n->render());
	}
	
	function testAddItem()
	{
		$n = new NavigationTabs();
		$link = new Link("test.html");
		$link->addText("hoi");
		$item = new NavigationItem($link);
		$n->addItem($item);
		
		$this->assertContains($link->render(), $n->render());
	}
}
