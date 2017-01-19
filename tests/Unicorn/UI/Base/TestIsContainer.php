<?php

namespace Unicorn\UI\Base;

trait TestIsContainer
{
	/** @return WidgetContainer|Container */
	abstract function constructTestObject();
	
	public function testAddText()
	{
		$c = $this->constructTestObject();
		$c->addText("Hello");
		$this->assertContains("Hello", $c->render());
	}
	
	public function testAddMoreText()
	{
		$c = $this->constructTestObject();
		$c->addText("Hello");
		$c->addText(" World!");
		$this->assertContains("Hello World!", $c->render());
	}
	
	public function testPrependText()
	{
		$c = $this->constructTestObject();
		$c->addText(" World!");
		$c->prependText("Hello");
		$this->assertContains("Hello World!", $c->render());
	}
	
	public function testAddChild()
	{
		$c = $this->constructTestObject();
		$c->prependChild(new Text("Hello"));
		$this->assertContains("Hello", $c->render());
	}
	
	public function testAddMoreChildren()
	{
		$c = $this->constructTestObject();
		$c->prependChild(new Text("Hello"));
		$c->addChild(new Text(" World!"));
		$this->assertContains("Hello World!", $c->render());
	}
	
	public function testPrependChild()
	{
		$c = $this->constructTestObject();
		$c->addChild(new Text(" World!"));
		$c->prependChild(new Text("Hello"));
		$this->assertContains("Hello World!", $c->render());
	}
	
	public function testAddTextAndChild()
	{
		$c = $this->constructTestObject();
		$c->addChild(new Text("Hello"));
		$c->addText(" World!");
		$this->assertContains("Hello World!", $c->render());
	}
	
	public function testRemoveChildren()
	{
		$c = $this->constructTestObject();
		$c->addText("Hello");
		$c->removeChildren();
		$this->assertNotContains("Hello", $c->render());
	}
}
