<?php

namespace Unicorn\UI\Bootstrap;

use PHPUnit\Framework\TestCase;
use Unicorn\UI\Base\TestHasNoChildren;
use Unicorn\UI\Base\TestIsElement;

class BadgeTest extends TestCase
{
	use TestHasNoChildren;
	use TestIsElement;
	
	function constructTestObject()
	{
		return new Badge("test");
	}
	
	function testConstructor()
	{
		$b = new Badge("test");
		
		$this->assertTrue($b->hasClass("badge"));
		$this->assertContains("test", $b->render());
	}
}
