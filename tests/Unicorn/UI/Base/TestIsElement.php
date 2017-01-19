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
		$this->assertNull($t->id());
		$t->setID("henk");
		$this->assertEquals("henk", $t->id());
		$this->assertContains("id=\"henk\"", $t->render());
		$t->removeID();
		$this->assertNull($t->id());
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
