<?php

namespace Unicorn\UI\Base;

use Unicorn\MethodExitsTests;

trait TestIsNoElement
{
	abstract function constructTestObject();
	
	function testNoIDMethods()
	{
		MethodExitsTests::assertNotMethodExist($this->constructTestObject(), "getID");
		MethodExitsTests::assertNotMethodExist($this->constructTestObject(), "setID");
		MethodExitsTests::assertNotMethodExist($this->constructTestObject(), "removeID");
	}
	
	function testNoClassMethods()
	{
		MethodExitsTests::assertNotMethodExist($this->constructTestObject(), "hasClass");
		MethodExitsTests::assertNotMethodExist($this->constructTestObject(), "addClass");
		MethodExitsTests::assertNotMethodExist($this->constructTestObject(), "removeClass");
	}
}
