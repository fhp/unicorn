<?php

namespace Unicorn\UI\Bootstrap;

use PHPUnit\Framework\TestCase;
use Unicorn\UI\Base\TestIsHtmlElement;

class PanelTitleTest extends TestCase
{
	use TestIsHtmlElement;

	function constructTestObject()
	{
		return new PanelTitle("Test");
	}
	
	function testConstructor()
	{
		$t = new PanelTitle("Hallo");
		
		$this->assertTrue($t->hasClass("panel-title"));
	}
}
