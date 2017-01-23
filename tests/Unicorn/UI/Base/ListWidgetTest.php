<?php

namespace Unicorn\UI\Base;

use PHPUnit\Framework\TestCase;

class ListWidgetTest extends TestCase
{
	use TestIsNoElement;
	use TestHasNoChildren;
	
	function constructTestObject()
	{
		return new ListWidgetTester();
	}
	
	function testDefaultEmpty()
	{
		$l = new ListWidgetEmptyTester();
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
		$this->container()->addText("Hallo");
	}
	
	public function getContainerTester(): Container
	{
		return parent::container();
	}
}

class ListWidgetEmptyTester extends ListWidget
{
}
