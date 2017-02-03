<?php

namespace Unicorn\UI\Base;

use Unicorn\UI\Exceptions\UnsetPropertyException;

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
		
		$this->assertFalse($t->hasProperty("src"));
		
		$t->setProperty("src", "test.jpg");
		$this->assertEquals("test.jpg", $t->property("src"));
		$this->assertTrue($t->hasProperty("src"));
		
		$t->setProperty("src", "test.png");
		$this->assertEquals("test.png", $t->property("src"));
		$this->assertContains("src=\"test.png\"", $t->render());
		
		$t->removeProperty("src");
		$this->assertFalse($t->hasProperty("src"));
		$this->assertNotContains("src=", $t->render());
	}
	
	function testUnsetProperty()
	{
		$t = $this->constructTestObject();
		
		$this->assertFalse($t->hasProperty("test"));
		$this->expectException(UnsetPropertyException::class);
		$t->property("test");
	}
	
	function testData()
	{
		$t = $this->constructTestObject();
		
		$this->assertFalse($t->hasData("foo"));
		
		$t->setData("foo", "bar");
		$this->assertEquals("bar", $t->data("foo"));
		$this->assertTrue($t->hasData("foo"));
		
		$t->setData("foo", "baz");
		$this->assertEquals("baz", $t->data("foo"));
		$this->assertContains("data-foo=\"baz\"", $t->render());
		
		$t->removeData("foo");
		$this->assertFalse($t->hasData("foo"));
		$this->assertNotContains("data-foo=", $t->render());
	}
	
	function testRole()
	{
		$t = $this->constructTestObject();
		
		$this->assertFalse($t->hasRole());
		
		$t->setRole("image");
		$this->assertEquals("image", $t->role());
		$this->assertTrue($t->hasRole());
		
		$t->setRole("photo");
		$this->assertEquals("photo", $t->role());
		$this->assertContains("role=\"photo\"", $t->render());
		
		$t->removeRole();
		$this->assertFalse($t->hasRole());
		$this->assertNotContains("role=", $t->render());
	}
	
	function testAria()
	{
		$t = $this->constructTestObject();
		
		$this->assertFalse($t->hasAria("test"));
		
		$t->setAria("test", "image");
		$this->assertEquals("image", $t->aria("test"));
		$this->assertTrue($t->hasAria("test"));
		
		$t->setAria("test", "photo");
		$this->assertEquals("photo", $t->aria("test"));
		$this->assertContains("aria-test=\"photo\"", $t->render());
		
		$t->removeAria("test");
		$this->assertFalse($t->hasAria("test"));
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
		
		$this->assertFalse($t->hasTabindex());
		
		$t->setTabindex(1);
		$this->assertEquals(1, $t->tabindex());
		$this->assertTrue($t->hasTabindex());
		
		$t->setTabindex(2);
		$this->assertEquals(2, $t->tabindex());
		$this->assertContains("tabindex=\"2\"", $t->render());
		
		$t->removeTabindex();
		$this->assertFalse($t->hasTabindex());
		$this->assertNotContains("tabindex=", $t->render());
	}
	
	function testTitle()
	{
		$t = $this->constructTestObject();
		
		$this->assertFalse($t->hasTitle());
		
		$t->setTitle("Hallo");
		$this->assertEquals("Hallo", $t->title());
		$this->assertTrue($t->hasTitle());
		
		$t->setTitle("Hey");
		$this->assertEquals("Hey", $t->title());
		$this->assertContains("title=\"Hey\"", $t->render());
		
		$t->removeTitle();
		$this->assertFalse($t->hasTitle());
		$this->assertNotContains("title=", $t->render());
	}
	
	function testLanguage()
	{
		$t = $this->constructTestObject();
		
		$this->assertFalse($t->hasLanguage());
		
		$t->setLanguage("en");
		$this->assertEquals("en", $t->language());
		$this->assertTrue($t->hasLanguage());
		
		$t->setLanguage("nl");
		$this->assertEquals("nl", $t->language());
		$this->assertContains("language=\"nl\"", $t->render());
		
		$t->removeLanguage();
		$this->assertFalse($t->hasLanguage());
		$this->assertNotContains("language=", $t->render());
	}
	
	function testTextDirection()
	{
		$t = $this->constructTestObject();
		
		$this->assertFalse($t->hasTextDirection());
		
		$t->setTextDirection("ltr");
		$this->assertEquals("ltr", $t->textDirection());
		$this->assertTrue($t->hasTextDirection());
		
		$t->setTextDirection("rtl");
		$this->assertEquals("rtl", $t->textDirection());
		$this->assertContains("dir=\"rtl\"", $t->render());
		
		$t->removeTextDirection();
		$this->assertFalse($t->hasTextDirection());
		$this->assertNotContains("dir=", $t->render());
	}
	
	function testAccessKey()
	{
		$t = $this->constructTestObject();
		
		$this->assertFalse($t->hasAccesskey());
		
		$t->setAccesskey("a");
		$this->assertEquals("a", $t->accesskey());
		$this->assertTrue($t->hasAccesskey());
		
		$t->setAccesskey("b");
		$this->assertEquals("b", $t->accesskey());
		$this->assertContains("accesskey=\"b\"", $t->render());
		
		$t->removeAccesskey();
		$this->assertFalse($t->hasAccesskey());
		$this->assertNotContains("accesskey=", $t->render());
	}
	
	function testJavascriptEvent()
	{
		$t = $this->constructTestObject();
		
		$this->assertFalse($t->hasJavascriptEvent("click"));
		
		$t->setJavascriptEvent("click", "callback();");
		$this->assertEquals("callback();", $t->javascriptEvent("click"));
		$this->assertTrue($t->hasJavascriptEvent("click"));
		
		$t->setJavascriptEvent("click", "othercallback();");
		$this->assertEquals("othercallback();", $t->javascriptEvent("click"));
		$this->assertContains("onclick=\"othercallback();\"", $t->render());
		
		$t->removeJavascriptEvent("click");
		$this->assertFalse($t->hasJavascriptEvent("click"));
		$this->assertNotContains("onclick", $t->render());
	}
}
