<?php

namespace Unicorn\UI\Bootstrap;

use PHPUnit\Framework\TestCase;

class TableTest extends TestCase
{
	function testConstruct()
	{
		$t = new Table();
		$this->assertTrue($t->hasClass("table"));
	}
	
	function testStriped()
	{
		$t = new Table();
		$t->striped();
		$this->assertTrue($t->hasClass("table-striped"));
	}
	
	function testBordered()
	{
		$t = new Table();
		$t->bordered();
		$this->assertTrue($t->hasClass("table-bordered"));
	}
	
	function testHover()
	{
		$t = new Table();
		$t->hoverRows();
		$this->assertTrue($t->hasClass("table-hover"));
	}
	
	function testCondensed()
	{
		$t = new Table();
		$t->condensed();
		$this->assertTrue($t->hasClass("table-condensed"));
	}
}
