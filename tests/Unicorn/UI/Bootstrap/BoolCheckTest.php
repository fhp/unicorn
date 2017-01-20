<?php

namespace Unicorn\UI\Bootstrap;

use PHPUnit\Framework\TestCase;
use Unicorn\UI\Base\TestHasNoChildren;
use Unicorn\UI\Base\TestIsNoElement;

class BoolCheckTest extends TestCase
{
	use TestHasNoChildren;
	use TestIsNoElement;
	
	function constructTestObject()
	{
		return new BoolCheck(true);
	}
	
	function testLongformat()
	{
		$b = new BoolCheck(true, true);
		
		$this->assertRegExp("/ ja$/", $b->render());
	}
	
	function testTrue()
	{
		$b = new BoolCheck(true);
		
		$this->assertContains("glyphicon-ok", $b->render());
	}
	
	function testFalse()
	{
		$b = new BoolCheck(false);
		
		$this->assertContains("glyphicon-remove", $b->render());
	}
	
	function testShortformat()
	{
		$b = new BoolCheck(true, false);
		
		$this->assertNotRegExp("/ ja$/", $b->render());
		$this->assertContains("<span class=\"sr-only\">ja</span>", $b->render());
	}
}
