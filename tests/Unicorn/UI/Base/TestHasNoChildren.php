<?php

namespace Unicorn\UI\Base;

use Unicorn\MethodExitsTests;

trait TestHasNoChildren
{
	abstract function constructTestObject();
	
	function testNoChildren()
	{
		MethodExitsTests::assertNotMethodExist($this->constructTestObject(), "addChild");
		MethodExitsTests::assertNotMethodExist($this->constructTestObject(), "prependChild");
		MethodExitsTests::assertNotMethodExist($this->constructTestObject(), "addText");
		MethodExitsTests::assertNotMethodExist($this->constructTestObject(), "prependText");
		MethodExitsTests::assertNotMethodExist($this->constructTestObject(), "removeChildren");
	}
}
