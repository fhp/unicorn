<?php

namespace Unicorn\UI\Bootstrap;

use PHPUnit\Framework\TestCase;
use Unicorn\UI\Base\TestHasNoChildren;
use Unicorn\UI\Base\TestIsElement;

class BadgeCounterTest extends TestCase
{
	use TestHasNoChildren;
	use TestIsElement;
	
	function constructTestObject()
	{
		return new BadgeCounter(37);
	}
	
	function testConstructor()
	{
		$b = new BadgeCounter(42);
		
		$this->assertTrue($b->hasClass("badge"));
		$this->assertContains("42", $b->render());
	}
	
	function testEmpty()
	{
		$b = new BadgeCounter(0);
		
		$this->assertTrue($b->hasClass("badge"));
		$this->assertNotContains("0", $b->render());
	}
}
