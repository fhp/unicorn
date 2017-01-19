<?php

namespace Unicorn\UI\HTML;

use PHPUnit\Framework\TestCase;
use Unicorn\UI\Base\TestIsHtmlElement;
use Unicorn\UI\Bootstrap\ContextualStyle;

class TableDataTest extends TestCase
{
	use TestIsHtmlElement;
	
	function constructTestObject()
	{
		return new TableData();
	}
	
	function testSetStyle()
	{
		$t = new TableData();
		$t->setStyle(ContextualStyle::default());
		
		$this->assertTrue($t->hasClass("default"));
	}
}
