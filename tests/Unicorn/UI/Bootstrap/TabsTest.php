<?php

namespace Unicorn\UI\Bootstrap;

use PHPUnit\Framework\TestCase;
use Unicorn\UI\Base\TestHasNoChildren;
use Unicorn\UI\Base\TestIsElement;

class TabsTest extends TestCase
{
	use TestIsElement;
	use TestHasNoChildren;
	
	function constructTestObject()
	{
		return new Tabs();
	}
	
	function testAddTab()
	{
		$tabs = new Tabs();
		$tab = new Tab("test", "Test");
		$tabs->addTab($tab);
		
		$tabsRendered = str_replace("\n", "", $tabs->render());
		$this->assertContains(str_replace("\n", "", $tab->render()), $tabsRendered);
		$this->assertContains(str_replace("\n", "", $tab->navigationItem()->render()), $tabsRendered);
	}
	
	function testFirstTabActive()
	{
		$tabs = new Tabs();
		$tab1 = new Tab("test1", "Test1");
		$tab2 = new Tab("test2", "Test2");
		$tab3 = new Tab("test3", "Test3");
		
		$tabs->addTab($tab1);
		$tabs->addTab($tab2);
		$tabs->addTab($tab3);
		
		$tabs->render();
		
		$this->assertTrue($tab1->hasClass("active"));
		$this->assertFalse($tab2->hasClass("active"));
		$this->assertFalse($tab3->hasClass("active"));
	}
	
	function testSpecifiedTabActive()
	{
		$tabs = new Tabs("test2");
		$tab1 = new Tab("test1", "Test1");
		$tab2 = new Tab("test2", "Test2");
		$tab3 = new Tab("test3", "Test3");
		
		$tabs->addTab($tab1);
		$tabs->addTab($tab2);
		$tabs->addTab($tab3);
		
		$tabs->render();
		
		$this->assertFalse($tab1->hasClass("active"));
		$this->assertTrue($tab2->hasClass("active"));
		$this->assertFalse($tab3->hasClass("active"));
	}
	
	function testActiveTabActive()
	{
		$tabs = new Tabs();
		$tab1 = new Tab("test1", "Test1");
		$tab2 = new ActiveTab("test2", "Test2");
		$tab3 = new Tab("test3", "Test3");
		
		$tabs->addTab($tab1);
		$tabs->addTab($tab2);
		$tabs->addTab($tab3);
		
		$tabs->render();
		
		$this->assertFalse($tab1->hasClass("active"));
		$this->assertTrue($tab2->hasClass("active"));
		$this->assertFalse($tab3->hasClass("active"));
	}
}

class ActiveTab extends Tab
{
	function isActive(): bool
	{
		return true;
	}
}