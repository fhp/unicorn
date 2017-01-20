<?php

namespace Unicorn\UI\Bootstrap;

use PHPUnit\Framework\TestCase;

class ContextualStyleTest extends TestCase
{
	function testStyles()
	{
		$this->assertEquals("default", (string)ContextualStyle::default());
		$this->assertEquals("primary", (string)ContextualStyle::primary());
		$this->assertEquals("success", (string)ContextualStyle::success());
		$this->assertEquals("info", (string)ContextualStyle::info());
		$this->assertEquals("warning", (string)ContextualStyle::warning());
		$this->assertEquals("danger", (string)ContextualStyle::danger());
		$this->assertEquals("muted", (string)ContextualStyle::muted());
		$this->assertEquals("active", (string)ContextualStyle::active());
	}
}
