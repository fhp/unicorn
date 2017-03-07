<?php

namespace Unicorn\UI\Bootstrap;

use Unicorn\UI\Base\HtmlElement;
use Unicorn\UI\Base\PanelWidget;
use Unicorn\UI\Base\Stub;
use Unicorn\UI\Base\Widget;
use Unicorn\UI\HTML\Div;
use Unicorn\UI\HTML\Link;
use Unicorn\UI\HTML\Paragraph;
use Unicorn\UI\HTML\Span;

class Navbar extends PanelWidget
{
	/** @var Stub */
	private $header;
	private $collapseID;
	
	public function __construct()
	{
		$nav = new HtmlElement("nav");
		$nav->addClass("navbar");
		$nav->addClass("navbar-default");
		
		$container = new Div("container-fluid");
		$nav->addChild($container);
		
		$this->header = new Stub();
		$container->addChild($this->header);
		
		$content = new Div(["collapse", "navbar-collapse"]);
		$this->collapseID = bin2hex(random_bytes(5));
		$content->setID($this->collapseID);
		$container->addChild($content);
		
		parent::__construct($nav);
		$this->setContainer($content);
	}
	
	public function addButton(Button $button, $alignRight = false): void
	{
		$button->addClass("navbar-btn");
		if($alignRight) {
			$button->addClass("navbar-right");
		}
		$this->addChild($button);
	}
	
	public function addText(string $text, $alignRight = false): void
	{
		$p = new Paragraph($text);
		$p->addClass("navbar-text");
		if($alignRight) {
			$p->addClass("navbar-right");
		}
		$this->addChild($p);
	}
	
	public function header(): Div
	{
		if(!$this->header->hasWidget()) {
			$header = new Div("navbar-header");
			$header->addChild($this->collapseButton());
			$this->header->setWidget($header);
		}
		return $this->header->widget();
	}
	
	public function brandLink($content, $url = "")
	{
		$link = new Link($url);
		$link->addClass("navbar-brand");
		if(is_a($content, Widget::class)) {
			$link->addChild($content);
		} else {
			$link->addText($content);
		}
		$this->header()->addChild($link);
	}
	
	private function collapseButton()
	{
		$button = new Button();
		$button->addClass("navbar-toggle");
		$button->addClass("collapsed");
		$button->setData("toggle", "collapse");
		$button->setData("target", "#" . $this->collapseID);
		$button->setAria("expanded", "false");
		
		$srInfo = new Span("Toggle navigation");
		$srInfo->addClass("sr-only");
		
		$bar = new Span();
		$bar->addClass("icon-bar");
		
		$button->addChild($srInfo);
		$button->addChild($bar);
		$button->addChild($bar);
		$button->addChild($bar);
		
		return $button;
	}
}
