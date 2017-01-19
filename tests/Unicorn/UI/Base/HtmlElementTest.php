<?php

namespace Unicorn\UI\Base;

use PHPUnit\Framework\TestCase;

class HtmlElementTest extends TestCase
{
	use TestIsHtmlElement;
	
	function constructTestObject(): Element
	{
		return new HtmlElement("p");
	}
}
