<?php

namespace Unicorn\UI\Base;

trait TestIsHtmlElement
{
	use TestIsElement;
	
	/** @return HtmlElement */
	abstract function constructHtmlElement();
	
	function constructTestObject(): Element
	{
		return $this->constructHtmlElement();
	}
	
	function testNoCloseTag()
	{
		$t = $this->constructHtmlElement();
		$t->noCloseTag();
		$this->assertNotContains("</", trim($t->render()));
	}
	
	function testProperties()
	{
		$t = $this->constructHtmlElement();
		
		$this->assertNull($t->getProperty("src"));
		
		$t->setProperty("src", "test.jpg");
		$this->assertEquals("test.jpg", $t->getProperty("src"));
		
		$t->setProperty("src", "test.png");
		$this->assertEquals("test.png", $t->getProperty("src"));
		$this->assertContains("src=\"test.png\"", $t->render());
		
		$t->removeProperty("src");
		$this->assertNull($t->getProperty("src"));
		$this->assertNotContains("src=", $t->render());
	}
	
	function testData()
	{
		$t = $this->constructHtmlElement();
		
		$this->assertNull($t->getData("foo"));
		
		$t->setData("foo", "bar");
		$this->assertEquals("bar", $t->getData("foo"));
		
		$t->setData("foo", "baz");
		$this->assertEquals("baz", $t->getData("foo"));
		$this->assertContains("data-foo=\"baz\"", $t->render());
		
		$t->removeData("foo");
		$this->assertNull($t->getData("foo"));
		$this->assertNotContains("data-foo=", $t->render());
	}
	
	function testRole()
	{
		$t = $this->constructHtmlElement();
		
		$this->assertNull($t->getRole());
		
		$t->setRole("image");
		$this->assertEquals("image", $t->getRole());
		
		$t->setRole("photo");
		$this->assertEquals("photo", $t->getRole());
		$this->assertContains("role=\"photo\"", $t->render());
		
		$t->removeRole();
		$this->assertNull($t->getRole());
		$this->assertNotContains("role=", $t->render());
	}
	
	function testAria()
	{
		$t = $this->constructHtmlElement();
		
		$this->assertNull($t->getAria("test"));
		
		$t->setAria("test", "image");
		$this->assertEquals("image", $t->getAria("test"));
		
		$t->setAria("test", "photo");
		$this->assertEquals("photo", $t->getAria("test"));
		$this->assertContains("aria-test=\"photo\"", $t->render());
		
		$t->removeAria("test");
		$this->assertNull($t->getAria("test"));
		$this->assertNotContains("aria-test", $t->render());
	}
	
	function testEditable()
	{
		$t = $this->constructHtmlElement();
		
		$this->assertNotContains("contenteditable=", $t->render());
		
		$t->enableContentEditable();
		$this->assertContains("contenteditable=\"true\"", $t->render());
		
		$t->disableContentEditable();
		$this->assertContains("contenteditable=\"false\"", $t->render());
	}
	
	function testSpellcheck()
	{
		$t = $this->constructHtmlElement();
		
		$this->assertNotContains("spellcheck=", $t->render());
		
		$t->enableSpellcheck();
		$this->assertContains("spellcheck=\"true\"", $t->render());
		
		$t->disableSpellcheck();
		$this->assertContains("spellcheck=\"false\"", $t->render());
	}
	
	function testDraggable()
	{
		$t = $this->constructHtmlElement();
		
		$this->assertNotContains("draggable=", $t->render());
		
		$t->enableDraggable();
		$this->assertContains("draggable=\"true\"", $t->render());
		
		$t->disableDraggable();
		$this->assertContains("draggable=\"false\"", $t->render());
	}
	
	function testTabIndex()
	{
		$t = $this->constructHtmlElement();
		
		$this->assertNull($t->getTabindex());
		
		$t->setTabindex(1);
		$this->assertEquals(1, $t->getTabindex());
		
		$t->setTabindex(2);
		$this->assertEquals(2, $t->getTabindex());
		$this->assertContains("tabindex=\"2\"", $t->render());
		
		$t->removeTabindex();
		$this->assertNull($t->getTabindex());
		$this->assertNotContains("tabindex=", $t->render());
	}
	
	function testTitle()
	{
		$t = $this->constructHtmlElement();
		
		$this->assertNull($t->getTitle());
		
		$t->setTitle("Hallo");
		$this->assertEquals("Hallo", $t->getTitle());
		
		$t->setTitle("Hey");
		$this->assertEquals("Hey", $t->getTitle());
		$this->assertContains("title=\"Hey\"", $t->render());
		
		$t->removeTitle();
		$this->assertNull($t->getTitle());
		$this->assertNotContains("title=", $t->render());
	}
	
	function testLanguage()
	{
		$t = $this->constructHtmlElement();
		
		$this->assertNull($t->getLanguage());
		
		$t->setLanguage("en");
		$this->assertEquals("en", $t->getLanguage());
		
		$t->setLanguage("nl");
		$this->assertEquals("nl", $t->getLanguage());
		$this->assertContains("language=\"nl\"", $t->render());
		
		$t->removeLanguage();
		$this->assertNull($t->getLanguage());
		$this->assertNotContains("language=", $t->render());
	}
	
	function testTextDirection()
	{
		$t = $this->constructHtmlElement();
		
		$this->assertNull($t->getTextDirection());
		
		$t->setTextDirection("ltr");
		$this->assertEquals("ltr", $t->getTextDirection());
		
		$t->setTextDirection("rtl");
		$this->assertEquals("rtl", $t->getTextDirection());
		$this->assertContains("dir=\"rtl\"", $t->render());
		
		$t->removeTextDirection();
		$this->assertNull($t->getTextDirection());
		$this->assertNotContains("dir=", $t->render());
	}
	
	function testAccessKey()
	{
		$t = $this->constructHtmlElement();
		
		$this->assertNull($t->getAccesskey());
		
		$t->setAccesskey("a");
		$this->assertEquals("a", $t->getAccesskey());
		
		$t->setAccesskey("b");
		$this->assertEquals("b", $t->getAccesskey());
		$this->assertContains("accesskey=\"b\"", $t->render());
		
		$t->removeAccesskey();
		$this->assertNull($t->getAccesskey());
		$this->assertNotContains("accesskey=", $t->render());
	}
	
	function testJavascriptEvent()
	{
		$t = $this->constructHtmlElement();
		
		$this->assertNull($t->getJavascriptEvent("click"));
		
		$t->setJavascriptEvent("click", "callback();");
		$this->assertEquals("callback();", $t->getJavascriptEvent("click"));
		
		$t->setJavascriptEvent("click", "othercallback();");
		$this->assertEquals("othercallback();", $t->getJavascriptEvent("click"));
		$this->assertContains("onclick=\"othercallback();\"", $t->render());
		
		$t->removeJavascriptEvent("click");
		$this->assertNull($t->getJavascriptEvent("click"));
		$this->assertNotContains("onclick", $t->render());
	}
}
