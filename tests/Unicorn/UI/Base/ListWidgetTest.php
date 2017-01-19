<?php

namespace Unicorn\UI\Base;

use PHPUnit\Framework\TestCase;

class ListWidgetTest extends TestCase
{
	use TestIsNoElement;
	use TestIsNoContainer;
	
	function constructTestObject()
	{
		return new ListWidgetTester();
	}
	
	function testDefaultEmpty()
	{
		$l = new ListWidget();
		$this->assertEquals("", $l->render());
	}
	
	function testHelloInstance()
	{
		$l = new ListWidgetTester();
		$this->assertEquals("Hallo", $l->render());
	}
	
	function testGetContainer()
	{
		$l = new ListWidgetTester();
		$this->assertInstanceOf(Container::class, $l->getContainerTester());
	}
}

class ListWidgetTester extends ListWidget
{
	function __construct()
	{
		parent::__construct();
		$this->getContainer()->addText("Hallo");
	}
	
	public function getContainerTester(): Container
	{
		return parent::getContainer();
	}
}
