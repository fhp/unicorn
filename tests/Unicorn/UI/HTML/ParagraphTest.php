<?php

namespace Unicorn\UI\HTML;

use PHPUnit\Framework\TestCase;
use Unicorn\UI\Base\TestIsHtmlElement;
use Unicorn\UI\Bootstrap\Paragraph;

class ParagraphTest extends TestCase
{
	use TestIsHtmlElement;
	
	function constructTestObject()
	{
		return new Paragraph("Hallo");
	}
	
	function testIsParagraph()
	{
		$this->assertRegExp("/<p[^>]*>Hallo<\/p>/", $this->constructTestObject()->render());
	}
}
