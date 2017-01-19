<?php

namespace Unicorn\UI\Base;

trait TestIsHtmlElement
{
	use TestIsElement;
	
	/** @return HtmlElement */
	abstract function constructTestObject();
	
	function testNoCloseTag()
	{
		$t = $this->constructTestObject();
		$t->noCloseTag();
		$this->assertNotContains("</", trim($t->render()));
	}
	
	function testProperties()
	{
		$t = $this->constructTestObject();
		
		$this->assertNull($t->property("src"));
		
		$t->setProperty("src", "test.jpg");
		$this->assertEquals("test.jpg", $t->property("src"));
		
		$t->setProperty("src", "test.png");
		$this->assertEquals("test.png", $t->property("src"));
		$this->assertContains("src=\"test.png\"", $t->render());
		
		$t->removeProperty("src");
		$this->assertNull($t->property("src"));
		$this->assertNotContains("src=", $t->render());
	}
	
	function testData()
	{
		$t = $this->constructTestObject();
		
		$this->assertNull($t->data("foo"));
		
		$t->setData("foo", "bar");
		$this->assertEquals("bar", $t->data("foo"));
		
		$t->setData("foo", "baz");
		$this->assertEquals("baz", $t->data("foo"));
		$this->assertContains("data-foo=\"baz\"", $t->render());
		
		$t->removeData("foo");
		$this->assertNull($t->data("foo"));
		$this->assertNotContains("data-foo=", $t->render());
	}
	
	function testRole()
	{
		$t = $this->constructTestObject();
		
		$this->assertNull($t->role());
		
		$t->setRole("image");
		$this->assertEquals("image", $t->role());
		
		$t->setRole("photo");
		$this->assertEquals("photo", $t->role());
		$this->assertContains("role=\"photo\"", $t->render());
		
		$t->removeRole();
		$this->assertNull($t->role());
		$this->assertNotContains("role=", $t->render());
	}
	
	function testAria()
	{
		$t = $this->constructTestObject();
		
		$this->assertNull($t->aria("test"));
		
		$t->setAria("test", "image");
		$this->assertEquals("image", $t->aria("test"));
		
		$t->setAria("test", "photo");
		$this->assertEquals("photo", $t->aria("test"));
		$this->assertContains("aria-test=\"photo\"", $t->render());
		
		$t->removeAria("test");
		$this->assertNull($t->aria("test"));
		$this->assertNotContains("aria-test", $t->render());
	}
	
	function testEditable()
	{
		$t = $this->constructTestObject();
		
		$this->assertNotContains("contenteditable=", $t->render());
		
		$t->enableContentEditable();
		$this->assertContains("contenteditable=\"true\"", $t->render());
		
		$t->disableContentEditable();
		$this->assertContains("contenteditable=\"false\"", $t->render());
	}
	
	function testSpellcheck()
	{
		$t = $this->constructTestObject();
		
		$this->assertNotContains("spellcheck=", $t->render());
		
		$t->enableSpellcheck();
		$this->assertContains("spellcheck=\"true\"", $t->render());
		
		$t->disableSpellcheck();
		$this->assertContains("spellcheck=\"false\"", $t->render());
	}
	
	function testDraggable()
	{
		$t = $this->constructTestObject();
		
		$this->assertNotContains("draggable=", $t->render());
		
		$t->enableDraggable();
		$this->assertContains("draggable=\"true\"", $t->render());
		
		$t->disableDraggable();
		$this->assertContains("draggable=\"false\"", $t->render());
	}
	
	function testTabIndex()
	{
		$t = $this->constructTestObject();
		
		$this->assertNull($t->tabindex());
		
		$t->setTabindex(1);
		$this->assertEquals(1, $t->tabindex());
		
		$t->setTabindex(2);
		$this->assertEquals(2, $t->tabindex());
		$this->assertContains("tabindex=\"2\"", $t->render());
		
		$t->removeTabindex();
		$this->assertNull($t->tabindex());
		$this->assertNotContains("tabindex=", $t->render());
	}
	
	function testTitle()
	{
		$t = $this->constructTestObject();
		
		$this->assertNull($t->title());
		
		$t->setTitle("Hallo");
		$this->assertEquals("Hallo", $t->title());
		
		$t->setTitle("Hey");
		$this->assertEquals("Hey", $t->title());
		$this->assertContains("title=\"Hey\"", $t->render());
		
		$t->removeTitle();
		$this->assertNull($t->title());
		$this->assertNotContains("title=", $t->render());
	}
	
	function testLanguage()
	{
		$t = $this->constructTestObject();
		
		$this->assertNull($t->language());
		
		$t->setLanguage("en");
		$this->assertEquals("en", $t->language());
		
		$t->setLanguage("nl");
		$this->assertEquals("nl", $t->language());
		$this->assertContains("language=\"nl\"", $t->render());
		
		$t->removeLanguage();
		$this->assertNull($t->language());
		$this->assertNotContains("language=", $t->render());
	}
	
	function testTextDirection()
	{
		$t = $this->constructTestObject();
		
		$this->assertNull($t->textDirection());
		
		$t->setTextDirection("ltr");
		$this->assertEquals("ltr", $t->textDirection());
		
		$t->setTextDirection("rtl");
		$this->assertEquals("rtl", $t->textDirection());
		$this->assertContains("dir=\"rtl\"", $t->render());
		
		$t->removeTextDirection();
		$this->assertNull($t->textDirection());
		$this->assertNotContains("dir=", $t->render());
	}
	
	function testAccessKey()
	{
		$t = $this->constructTestObject();
		
		$this->assertNull($t->accesskey());
		
		$t->setAccesskey("a");
		$this->assertEquals("a", $t->accesskey());
		
		$t->setAccesskey("b");
		$this->assertEquals("b", $t->accesskey());
		$this->assertContains("accesskey=\"b\"", $t->render());
		
		$t->removeAccesskey();
		$this->assertNull($t->accesskey());
		$this->assertNotContains("accesskey=", $t->render());
	}
	
	function testJavascriptEvent()
	{
		$t = $this->constructTestObject();
		
		$this->assertNull($t->javascriptEvent("click"));
		
		$t->setJavascriptEvent("click", "callback();");
		$this->assertEquals("callback();", $t->javascriptEvent("click"));
		
		$t->setJavascriptEvent("click", "othercallback();");
		$this->assertEquals("othercallback();", $t->javascriptEvent("click"));
		$this->assertContains("onclick=\"othercallback();\"", $t->render());
		
		$t->removeJavascriptEvent("click");
		$this->assertNull($t->javascriptEvent("click"));
		$this->assertNotContains("onclick", $t->render());
	}
}
