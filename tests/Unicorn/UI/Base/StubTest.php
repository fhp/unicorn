<?php

namespace Unicorn\UI\Base;

use PHPUnit\Framework\TestCase;
use Unicorn\UI\Exceptions\NoElementSetException;

class StubTest extends TestCase
{
	use TestHasNoChildren;
	use TestIsNoElement;
	
	function constructTestObject()
	{
		return new Stub();
	}
	
	function testDefaultEmpty()
	{
		$s = new Stub();
		$this->assertFalse($s->hasWidget());
	}
	
	function testEmptyGetWidgetException()
	{
		$s = new Stub();
		$this->expectException(NoElementSetException::class);
		$s->widget();
	}
	
	function testSetWidget()
	{
		$s = new Stub();
		$this->assertFalse($s->hasWidget());
		$s->setWidget(new Text("Hallo"));
		$this->assertTrue($s->hasWidget());
	}
	
	function testGetWidget()
	{
		$s = new Stub();
		$s->setWidget(new Text("Hallo"));
		$this->assertInstanceOf(Text::class, $s->widget());
	}
	
	function testRenderEmpty()
	{
		$s = new Stub();
		$this->assertEquals("", $s->render());
	}
	
	function testRender()
	{
		$s = new Stub();
		$s->setWidget(new Text("Hallo"));
		$this->assertEquals("Hallo", $s->render());
	}
}
