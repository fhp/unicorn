<?php

namespace Unicorn\UI\Bootstrap;

use PHPUnit\Framework\TestCase;
use Unicorn\UI\Base\TestHasNoChildren;
use Unicorn\UI\Base\TestIsElement;

class BreadcrumbsTest extends TestCase
{
	use TestIsElement;
	use TestHasNoChildren;
	
	function constructTestObject()
	{
		return new Breadcrumbs("Appels");
	}
	
	function testDefaultHomeCrumb()
	{
		$b = new Breadcrumbs("Appels");
		
		$this->assertContains("Home", $b->render());
		$this->assertContains("href=\"/\"", $b->render());
	}
	
	function testNoHomeCrumb()
	{
		$b = new Breadcrumbs("Appels", false);
		
		$this->assertNotContains("Home", $b->render());
		$this->assertNotContains("href=\"/\"", $b->render());
	}
	
	function testActivePage()
	{
		$b = new Breadcrumbs("Appels");
		
		$this->assertContains("<li class=\"active\">Appels</li>", $b->render());
	}
	
	function testActivePageLast()
	{
		$b = new Breadcrumbs("Appels");
		
		$this->assertContains("<li class=\"active\">Appels</li></ol>", str_replace("\n", "", $b->render()));
	}
	
	function testAddBreadcrumb()
	{
		$b = new Breadcrumbs("Appels");
		
		$b->addBreadcrumb("Fruit", "fruit.html");
		$this->assertContains("<li><a href=\"fruit.html\">Fruit</a></li>", str_replace("\n", "", $b->render()));
	}
}
