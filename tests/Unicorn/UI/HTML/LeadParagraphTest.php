<?php

namespace Unicorn\UI\HTML;

use Unicorn\UI\Bootstrap\LeadParagraph;

class LeadParagraphTest extends ParagraphTest
{
	function constructTestObject()
	{
		return new LeadParagraph("Hallo");
	}
	
	function testLeadClass()
	{
		$this->assertTrue($this->constructTestObject()->hasClass("lead"));
	}
}
