<?php

namespace Unicorn\UI\Base;

trait TestIsElement
{
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
		$this->assertContains("class=\"henk\"", $t->render());
		$t->removeClass("henk");
		$this->assertFalse($t->hasClass("henk"));
		$this->assertNotContains("class=", $t->render());
	}
}
