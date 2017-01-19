<?php

namespace Unicorn\UI\Base;

use PHPUnit\Framework\TestCase;

class HtmlElementTest extends TestCase
{
	use TestIsHtmlElement;
	
	function constructHtmlElement(): Element
	{
		return new HtmlElement("p");
	}
}
