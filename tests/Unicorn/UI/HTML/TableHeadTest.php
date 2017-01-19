<?php

namespace Unicorn\UI\HTML;

use PHPUnit\Framework\TestCase;
use Unicorn\UI\Base\TestIsHtmlElement;
use Unicorn\UI\Bootstrap\ContextualStyle;

class TableHeadTest extends TestCase
{
	use TestIsHtmlElement;
	
	function constructTestObject()
	{
		return new TableHead();
	}
	
	function testSetStyle()
	{
		$t = new TableHead();
		$t->setStyle(ContextualStyle::default());
		
		$this->assertTrue($t->hasClass("default"));
	}
}
