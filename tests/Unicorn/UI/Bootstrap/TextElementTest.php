<?php

namespace Unicorn\UI\Bootstrap;

use PHPUnit\Framework\TestCase;
use Unicorn\UI\HTML\Paragraph;

class TextElementTest extends TestCase
{
	function testTextStyle()
	{
		$t = new Paragraph("Hallo");
		$t->setContextualStyle(ContextualStyle::default());
		
		$this->assertTrue($t->hasClass("text-default"));
	}
	
	function testBackgroundStyle()
	{
		$t = new Paragraph("Hallo");
		$t->setContextualBackgroundStyle(ContextualStyle::default());
		
		$this->assertTrue($t->hasClass("bg-default"));
	}
}
