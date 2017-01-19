<?php

namespace Unicorn\UI\HTML;

use PHPUnit\Framework\TestCase;
use Unicorn\UI\Base\TestIsHtmlElement;

class HeaderTest extends TestCase
{
	use TestIsHtmlElement;
	
	function constructTestObject()
	{
		return new Header("Appels");
	}
	
	function testSetSize()
	{
		$h1 = new Header("Appels", "h1");
		$this->assertContains("<h1>", $h1->render());
		
		$h2 = new Header("Appels", "h2");
		$this->assertContains("<h2>", $h2->render());
		
		$h3 = new Header("Appels", "h3");
		$this->assertContains("<h3>", $h3->render());
		
		$h4 = new Header("Appels", "h4");
		$this->assertContains("<h4>", $h4->render());
		
		$h5 = new Header("Appels", "h5");
		$this->assertContains("<h5>", $h5->render());
		
		$h6 = new Header("Appels", "h6");
		$this->assertContains("<h6>", $h6->render());
	}
	
	function testWrongSize()
	{
		$this->expectException(\InvalidArgumentException::class);
		new Header("Appels", "appel");
	}
	
	function testHeader()
	{
		$h = new Header("Appels");
		$this->assertContains("Appels", $h->render());
	}
	
	function testSubHeader()
	{
		$h = new Header("Appels", "h2", "en peren");
		$this->assertContains("<small>en peren</small>", $h->render());
	}
}
