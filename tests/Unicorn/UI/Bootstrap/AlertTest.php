<?php

namespace Unicorn\UI\Bootstrap;

use PHPUnit\Framework\TestCase;
use Unicorn\UI\Base\TestHasNoChildren;
use Unicorn\UI\Base\TestIsElement;

class AlertTest extends TestCase
{
	use TestIsElement;
	use TestHasNoChildren;
	
	function constructTestObject()
	{
		return new Alert("Let op!", "Dit is een test", ContextualStyle::info());
	}
	
	function testClasses()
	{
		$t = $this->constructTestObject();
		$this->assertTrue($t->hasClass("alert"));
		$this->assertTrue($t->hasClass("alert-info"));
	}
	
	function testDismissable()
	{
		$t = $this->constructTestObject();
		$t->dismissable();
		
		$this->assertTrue($t->hasClass("alert-dismissible"));
		$this->assertContains("<button", $t->render());
		$this->assertContains("&times;", $t->render());
	}
}
