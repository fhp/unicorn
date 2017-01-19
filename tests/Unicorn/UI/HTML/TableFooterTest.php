<?php

namespace Unicorn\UI\HTML;

use PHPUnit\Framework\TestCase;
use Unicorn\UI\Base\TestHasNoChildren;
use Unicorn\UI\Base\TestIsElement;

class TableFooterTest extends TestCase
{
	use TestIsElement;
	use TestHasNoChildren;
	
	function constructTestObject()
	{
		return new TableFooter();
	}
	
	function testAddRow()
	{
		$t = new TableFooter();
		$t->addRow(new TableRow());
		
		$this->assertXmlStringEqualsXmlString("<tfoot><tr></tr></tfoot>", $t->render());
	}
	
	function testFromArray()
	{
		$t = new TableFooter();
		$t->fromArray(["1", "2", "3"]);
		
		$this->assertXmlStringEqualsXmlString("<tfoot><tr><th>1</th><th>2</th><th>3</th></tr></tfoot>", $t->render());
	}
	
	function testAddColumn()
	{
		$t = new TableFooter();
		$t->addColumn("A");
		$t->addColumn("B");
		$t->addColumn("C");
		
		$this->assertXmlStringEqualsXmlString("<tfoot><tr><th>A</th><th>B</th><th>C</th></tr></tfoot>", $t->render());
	}
}
