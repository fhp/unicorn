<?php

namespace Unicorn\UI\Base;

trait TestIsHtmlPage
{
	use TestIsContainer;
	use TestIsNoElement;
	
	/** @return HtmlPage */
	abstract function constructTestObject();
	
	function testToString()
	{
		$p = $this->constructTestObject();
		$this->assertInternalType("string", (string)$p);
	}
	
	function testDoctype()
	{
		$p = $this->constructTestObject();
		$this->assertStringStartsWith("<!DOCTYPE html>\n", (string)$p);
	}
	
	function testNotWidget()
	{
		$p = $this->constructTestObject();
		$this->assertNotInstanceOf(Widget::class, $p);
	}
}
