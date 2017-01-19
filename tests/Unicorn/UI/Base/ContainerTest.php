<?php

namespace Unicorn\UI\Base;

use PHPUnit\Framework\TestCase;

class ContainerTest extends TestCase
{
	use TestIsContainer;
	use TestIsNoElement;
	
	function constructTestObject(): WidgetContainer
	{
		return new Container();
	}
		
	public function testDefaultEmpty()
	{
		$c = new Container();
		$this->assertEquals("", $c->render());
	}
}
