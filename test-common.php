<?php

use Unicorn\UI\Base\HtmlElement;
use Unicorn\UI\Bootstrap\BootstrapHtmlPage;
use Unicorn\UI\Bootstrap\LinkButton;
use Unicorn\UI\Bootstrap\Navbar;
use Unicorn\UI\Bootstrap\Navigation;
use Unicorn\UI\Bootstrap\NavigationItem;
use Unicorn\UI\HTML\Link;

class TestPageLayout extends BootstrapHtmlPage
{
	function __construct()
	{
		$content = new HtmlElement("div");
		$content->addClass("container");
		
		parent::__construct($content);
		
		$navbar = new Navbar("navbar");
		$navbar->addText("Hallo");
		
		$navbar->addText("Hallo Henk", true);
		$button = new LinkButton("/logout", "logout");
		$navbar->addButton($button, true);
		
		$navbar->brandLink("Test Pagina");
		
		$navigation = new Navigation();
		$navigation->addClass("navbar-nav");
		
		$link1 = new Link("test.php");
		$link1->addText("Appel");
		$item = new NavigationItem($link1);
		$item->activate();
		$navigation->addItem($item);
		
		$link2 = new Link("test2.php");
		$link2->addText("Peer");
		$navigation->addItem(new NavigationItem($link2));
		
		$navbar->addChild($navigation);
		
		$body = $this->body();
		$body->addChild($navbar);
		$body->addChild($content);
		
		$this->addStylesheet("test.css");
	}
	
	protected function setTitle(string $title): void
	{
		parent::setTitle("Test - " . $title);
	}
	
	protected function lipsum(): string
	{
		return file_get_contents("http://loripsum.net/api/1/plaintext");
	}
}
