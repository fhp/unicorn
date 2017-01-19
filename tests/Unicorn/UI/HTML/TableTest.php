<?php

namespace Unicorn\UI\HTML;

use PHPUnit\Framework\TestCase;
use Unicorn\UI\Base\TestHasNoChildren;
use Unicorn\UI\Base\TestIsElement;

class TableTest extends TestCase
{
	use TestIsElement;
	use TestHasNoChildren;
	
	function constructTestObject()
	{
		return new Table();
	}
	
	function testRenderEmpty()
	{
		$t = new Table();
		$this->assertXmlStringEqualsXmlString("<table></table>", str_replace("\n", "", $t->render()));
	}
	
	function testRenderHeader()
	{
		$t = new Table();
		$h = $t->header();
		$this->assertInstanceOf(TableHeader::class, $h);
		$this->assertXmlStringEqualsXmlString("<table><thead></thead></table>", $t->render());
	}
	
	function testRenderBody()
	{
		$t = new Table();
		$b = $t->body();
		$this->assertInstanceOf(TableBody::class, $b);
		$this->assertXmlStringEqualsXmlString("<table><tbody></tbody></table>", $t->render());
	}
	
	function testRenderFooter()
	{
		$t = new Table();
		$f = $t->footer();
		$this->assertInstanceOf(TableFooter::class, $f);
		$this->assertXmlStringEqualsXmlString("<table><tfoot></tfoot></table>", $t->render());
	}
	
	function testRenderOrder()
	{
		$t = new Table();
		$t->header();
		$t->body();
		$t->footer();
		$this->assertXmlStringEqualsXmlString("<table><thead></thead><tbody></tbody><tfoot></tfoot></table>", $t->render());
		
		$t = new Table();
		$t->footer();
		$t->body();
		$t->header();
		$this->assertXmlStringEqualsXmlString("<table><thead></thead><tbody></tbody><tfoot></tfoot></table>", $t->render());
	}
	
	function testAddColumn()
	{
		$t = new Table();
		$t->addColumn("Letter", ["A", "B"]);
		$t->addColumn("Number", ["1", "2"]);
		
		$this->assertXmlStringEqualsXmlString(<<<HTML
<table>
<thead>
<tr><th>Letter</th><th>Number</th></tr>
</thead>
<tbody>
<tr><td>A</td><td>1</td></tr>
<tr><td>B</td><td>2</td></tr>
</tbody>
</table>
HTML
		, $t->render());
	}
}
