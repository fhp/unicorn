<?php

namespace Unicorn\UI\Bootstrap;

use PHPUnit\Framework\TestCase;
use Unicorn\UI\Base\TestIsContainer;
use Unicorn\UI\Base\TestIsElement;

class PanelTest extends TestCase
{
	use TestIsElement;
	use TestIsContainer;
	
	function constructTestObject()
	{
		return new Panel();
	}
	
	function testDefaultEmpty()
	{
		$p = new Panel();
		
		$this->assertNotContains("panel-heading", $p->render());
		$this->assertNotContains("panel-body", $p->render());
		$this->assertNotContains("panel-footer", $p->render());
		$this->assertNotContains("table", $p->render());
	}
	
	function testEnableHeader()
	{
		$p = new Panel();
		$p->header()->addText("hallo");
		
		$this->assertContains("panel-heading", $p->render());
	}
	
	function testEnableBody()
	{
		$p = new Panel();
		$p->body()->addText("hallo");
		
		$this->assertContains("panel-body", $p->render());
	}
	
	function testEnableFooter()
	{
		$p = new Panel();
		$p->footer()->addText("hallo");
		
		$this->assertContains("panel-footer", $p->render());
	}
	
	function testEnableTable()
	{
		$p = new Panel();
		$p->table();
		
		$this->assertContains("table", $p->render());
	}
	
	function testSetTable()
	{
		$p = new Panel();
		$p->setTable(new Table());
		
		$this->assertContains("table", $p->render());
	}
	
	function testOrder()
	{
		$p = new Panel();
		$p->header();
		$p->body();
		$p->table();
		$p->footer();
		
		$this->assertRegExp("/panel-heading.*panel-body.*table.*panel-footer/", str_replace("\n", "", $p->render()));
		
		$p = new Panel();
		$p->footer();
		$p->table();
		$p->body();
		$p->header();
		
		$this->assertRegExp("/panel-heading.*panel-body.*table.*panel-footer/", str_replace("\n", "", $p->render()));
	}
}
