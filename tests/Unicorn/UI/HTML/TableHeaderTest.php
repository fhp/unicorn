<?php

namespace Unicorn\UI\HTML;

use PHPUnit\Framework\TestCase;
use Unicorn\UI\Base\TestHasNoChildren;
use Unicorn\UI\Base\TestIsElement;

class TableHeaderTest extends TestCase
{
	use TestIsElement;
	use TestHasNoChildren;
	
	function constructTestObject()
	{
		return new TableHeader();
	}
	
	function testAddRow()
	{
		$t = new TableHeader();
		$t->addRow(new TableRow());
		
		$this->assertXmlStringEqualsXmlString("<thead><tr></tr></thead>", $t->render());
	}
	
	function testFromArray()
	{
		$t = new TableHeader();
		$t->fromArray(["1", "2", "3"]);
		
		$this->assertXmlStringEqualsXmlString("<thead><tr><th>1</th><th>2</th><th>3</th></tr></thead>", $t->render());
	}
	
	function testAddColumn()
	{
		$t = new TableHeader();
		$t->addColumn("A");
		$t->addColumn("B");
		$t->addColumn("C");
		
		$this->assertXmlStringEqualsXmlString("<thead><tr><th>A</th><th>B</th><th>C</th></tr></thead>", $t->render());
	}
}
