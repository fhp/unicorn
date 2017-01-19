<?php

namespace Unicorn\UI\HTML;

use PHPUnit\Framework\TestCase;
use Unicorn\UI\Base\TestHasNoChildren;
use Unicorn\UI\Base\TestIsElement;
use Unicorn\UI\Base\Text;

class TableBodyTest extends TestCase
{
	use TestIsElement;
	use TestHasNoChildren;
	
	function constructTestObject()
	{
		return new TableBody();
	}
	
	function testAddRow()
	{
		$t = new TableBody();
		$t->addRow(new TableRow());
		
		$this->assertXmlStringEqualsXmlString("<tbody><tr></tr></tbody>", $t->render());
	}
	
	function testFromArray()
	{
		$t = new TableBody();
		$t->fromArray([
			["1", "2", "3"],
			["4", "5", "6"]
		]);
		
		$this->assertXmlStringEqualsXmlString("<tbody><tr><td>1</td><td>2</td><td>3</td></tr><tr><td>4</td><td>5</td><td>6</td></tr></tbody>", $t->render());
	}
	
	function testAddColumn()
	{
		$t = new TableBody();
		$t->addColumn(["A", "B"]);
		$t->addColumn(["1", "2"]);
		
		$this->assertXmlStringEqualsXmlString("<tbody><tr><td>A</td><td>1</td></tr><tr><td>B</td><td>2</td></tr></tbody>", $t->render());
	}
	
	function testAddWidgetColumn()
	{
		$t = new TableBody();
		$t->addColumn([new Text("A"), new Text("B")]);
		$t->addColumn([new Text("1"), new Text("2")]);
		
		$this->assertXmlStringEqualsXmlString("<tbody><tr><td>A</td><td>1</td></tr><tr><td>B</td><td>2</td></tr></tbody>", $t->render());
	}
	
	function testAddInvalidColumn()
	{
		$this->expectException(\InvalidArgumentException::class);
		$t = new TableBody();
		$t->addColumn([new \stdClass()]);
	}
}
