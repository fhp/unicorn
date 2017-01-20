<?php

namespace Unicorn\UI\Bootstrap;

use PHPUnit\Framework\TestCase;
use Unicorn\UI\Base\TestIsContainer;
use Unicorn\UI\Base\TestIsNoElement;
use Unicorn\UI\Bootstrap\Icons\TrueIcon;

class CollapsibleTest extends TestCase
{
	use TestIsContainer;
	use TestIsNoElement;
	
	function constructTestObject()
	{
		return new Collapsible("test");
	}
	
	function testConstructor()
	{
		$c = new Collapsible("test", "Hallo", new TrueIcon());
		
		$this->assertContains("id=\"test\"", $c->render());
		$this->assertContains("Hallo", $c->render());
		$this->assertContains("glyphicon-ok", $c->render());
	}
	
	function testButton()
	{
		$c = new Collapsible("test", "Hallo", new TrueIcon());
		
		$this->assertContains("Hallo", $c->button()->render());
		$this->assertContains("glyphicon-ok", $c->button()->render());
	}
}
