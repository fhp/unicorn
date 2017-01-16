<?php

namespace Unicorn\UI\Base;

use Unicorn\UI\HTML\JavascriptSource;
use Unicorn\UI\HTML\StylesheetSource;

abstract class HtmlPage implements IWidgetList
{
	private $html;
	private $head;
	private $body;
	private $title;
	private $content;
	
	public function __construct(HtmlElement $content)
	{
		$this->html = new HtmlElement("html");
		$this->head = new HtmlElement("head");
		$this->body = new HtmlElement("body");
		$this->title = new Stub();
		
		$this->content = $content;
		
		$this->html->addChild($this->head);
		$this->html->addChild($this->body);
		
		$this->head->addChild($this->title);
	}
	
	protected function getHtml(): HtmlElement
	{
		return $this->html;
	}
	
	protected function getHead(): HtmlElement
	{
		return $this->head;
	}
	
	protected function getBody(): HtmlElement
	{
		return $this->body;
	}
	
	protected function getContentPane(): HtmlElement
	{
		return $this->content;
	}
	
	protected function setTitle(string $title): void
	{
		$titleTag = new HtmlElement("title");
		$titleTag->addText($title);
		$this->title->setWidget($titleTag);
	}
	
	protected function setContentPane(HtmlElement $content): void
	{
		$this->content = $content;
	}
	
	protected function addJavascript(string $scriptSrc): void
	{
		$this->getHead()->addChild(new JavascriptSource($scriptSrc));
	}
	
	protected function addStylesheet(string $styleSrc): void
	{
		$this->getHead()->addChild(new StylesheetSource($styleSrc));
	}
	
	public function addChild(IWidget $child): void
	{
		$this->getContentPane()->addChild($child);
	}
	
	public function prependChild(IWidget $child): void
	{
		$this->getContentPane()->prependChild($child);
	}
	
	public function addText(string $text): void
	{
		$this->getContentPane()->addText($text);
	}
	
	public function prependText(string $text): void
	{
		$this->getContentPane()->prependText($text);
	}
	
	public function removeChildren(): void
	{
		$this->getContentPane()->removeChildren();
	}
	
	public function render(): string
	{
		$html = "<!DOCTYPE html>\n";
		$html .= $this->getHtml()->render();
		
		return $html;
	}
	
	public function __toString(): string
	{
		return $this->render();
	}
}
