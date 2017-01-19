<?php

namespace Unicorn\UI\Base;

use PHPUnit\Framework\TestCase;

class HtmlPageTest extends TestCase
{
	use TestIsHtmlPage;
	
	/** @return HtmlPageTester */
	function constructTestObject()
	{
		return new HtmlPageTester();
	}
	
	function testSetTitle()
	{
		$p = $this->constructTestObject();
		
		$p->setTitle("Appel");
		$this->assertContains("<title>Appel</title>", $p->render());
	}
	
	function testAddJavascript()
	{
		$p = $this->constructTestObject();
		
		$p->addJavascript("script.js");
		$this->assertContains("<script src=\"script.js\">", $p->render());
	}
	
	function testAddStylesheet()
	{
		$p = $this->constructTestObject();
		
		$p->addStylesheet("style.css");
		$this->assertContains("<link href=\"style.css\" type=\"text/css\" rel=\"stylesheet\">", $p->render());
	}
	
	function testContentPane()
	{
		$div = new HtmlElement("div");
		$div->addText("TEST");
		
		$p = new HtmlPageTester($div);
		
		$this->assertEquals($div, $p->contentPane());
		$this->assertContains("TEST", $p->render());
	}
}

class HtmlPageTester extends HtmlPage
{
	function __construct($content = null)
	{
		if($content === null) {
			$content = new HtmlElement("div");
		}
		
		parent::__construct($content);
		
		$this->body()->addChild($content);
	}
	
	public function contentPane(): HtmlElement
	{
		return parent::contentPane();
	}
	
	public function setTitle(string $title): void
	{
		parent::setTitle($title);
	}
	
	public function addJavascript(string $scriptSrc): void
	{
		parent::addJavascript($scriptSrc);
	}
	
	public function addStylesheet(string $styleSrc): void
	{
		parent::addStylesheet($styleSrc);
	}
}
