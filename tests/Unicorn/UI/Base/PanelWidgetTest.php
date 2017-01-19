<?php

namespace Unicorn\UI\Base;

use PHPUnit\Framework\TestCase;
use Unicorn\UI\Exceptions\NoElementSetException;

class PanelWidgetTest extends TestCase
{
	use TestIsElement;
	use TestIsContainer;
	
	function constructTestObject()
	{
		return new PanelWidgetTester("p");
	}
	
	function testWidgetConstructor()
	{
		$p = new PanelWidgetTester(new HtmlElement("p"));
		$this->assertEquals("<p></p>", trim($p->render()));
	}
	
	function testHtmlElementConstructor()
	{
		$p = new PanelWidgetTester("p");
		$this->assertEquals("<p></p>", trim($p->render()));
	}
	
	function testInvalidConstructor()
	{
		$this->expectException(\InvalidArgumentException::class);
		new PanelWidgetTester(new Text("Hallo"));
	}
	
	function testNoElementSet()
	{
		$this->expectException(NoElementSetException::class);
		$p = new PanelWidgetTester(null);
		$p->setID("test");
	}
	
	function testNoContainerSet()
	{
		$this->expectException(NoElementSetException::class);
		$p = new BrokenPanelWidgetTester("p");
		$p->addText("test");
	}
}

class PanelWidgetTester extends PanelWidget
{
	function __construct($element)
	{
		parent::__construct($element);
		$this->element()->addChild($this->container());
	}
}

class BrokenPanelWidgetTester extends PanelWidget
{
	/** @noinspection PhpMissingParentConstructorInspection */
	function __construct($element)
	{
		// Not calling setContainer();
	}
}
