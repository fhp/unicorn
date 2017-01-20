<?php

namespace Unicorn\UI\Bootstrap;

use PHPUnit\Framework\TestCase;
use Unicorn\UI\Base\TestHasNoChildren;
use Unicorn\UI\Base\TestIsElement;

class LabelTest extends TestCase
{
	use TestIsElement;
	use TestHasNoChildren;
	
	function constructTestObject()
	{
		return new Label("test");
	}
	
	function testConstructor()
	{
		$l = new Label("test");
		
		$this->assertContains("test", $l->render());
		$this->assertRegExp("/class=\"[^\"]*label[^\"]*\"/", $l->render());
	}
	
	function testStyle()
	{
		$l = new Label("test", ContextualStyle::danger());
		
		$this->assertContains("label-danger", $l->render());
	}
}
