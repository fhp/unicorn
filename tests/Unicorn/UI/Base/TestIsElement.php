<?php

namespace Unicorn\UI\Base;

trait TestIsElement
{
	use TestIsWidget;
	
	/** @return Element */
	abstract function constructTestObject();
	
	public function testID()
	{
		$t = $this->constructTestObject();
		$t->setID("henk");
		$this->assertEquals("henk", $t->id());
		$this->assertContains("id=\"henk\"", $t->render());
		$this->assertTrue($t->hasID());
		$t->removeID();
		$this->assertFalse($t->hasID());
		$this->assertNotContains("id=", $t->render());
	}
	
	public function testClass()
	{
		$t = $this->constructTestObject();
		$this->assertFalse($t->hasClass("henk"));
		$t->addClass("henk");
		$this->assertTrue($t->hasClass("henk"));
		$this->assertRegExp("/class=\"([^\"]*)henk([^\"]*)\"/", $t->render());
		$t->removeClass("henk");
		$this->assertFalse($t->hasClass("henk"));
		$this->assertNotRegExp("/class=\"([^\"]*)henk([^\"]*)\"/", $t->render());
	}
}
