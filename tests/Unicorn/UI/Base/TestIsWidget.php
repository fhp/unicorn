<?php

namespace Unicorn\UI\Base;

trait TestIsWidget
{
	abstract function constructTestObject();
	
	function testIsWidget()
	{
		$this->assertInstanceOf(Widget::class, $this->constructTestObject());
	}
}
