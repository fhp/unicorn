<?php

namespace Unicorn\UI\HTML;

use PHPUnit\Framework\TestCase;
use Unicorn\UI\Base\TestIsHtmlElement;

class SpanTest extends TestCase
{
	use TestIsHtmlElement;
	
	function constructTestObject()
	{
		return new Span("Hallo");
	}
	
	function testIsSpan()
	{
		$this->assertRegExp("/<span[^>]*>Hallo<\/span>/", $this->constructTestObject()->render());
	}
}
