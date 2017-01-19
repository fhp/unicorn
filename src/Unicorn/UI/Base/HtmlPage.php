<?php

namespace Unicorn\UI\Base;

use Unicorn\UI\HTML\JavascriptSource;
use Unicorn\UI\HTML\StylesheetSource;

abstract class HtmlPage implements WidgetContainer
{
	private $html;
	private $head;
	private $body;
	private $title;
	
	use ContainerWrapper {
		ContainerWrapper::getContainer as private;
		ContainerWrapper::setContainer as private;
	}
	
	public function __construct(HtmlElement $content)
	{
		$this->html = new HtmlElement("html");
		$this->head = new HtmlElement("head");
		$this->body = new HtmlElement("body");
		$this->title = new Stub();
		
		$this->html->addChild($this->head);
		$this->html->addChild($this->body);
		
		$this->head->addChild($this->title);
		
		$this->setContainer($content);
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
		/** @var HtmlElement $content */
		$content = $this->getContainer();
		return $content;
	}
	
	protected function setTitle(string $title): void
	{
		$titleTag = new HtmlElement("title");
		$titleTag->addText($title);
		$this->title->setWidget($titleTag);
	}
	
	protected function addJavascript(string $scriptSrc): void
	{
		$this->getHead()->addChild(new JavascriptSource($scriptSrc));
	}
	
	protected function addStylesheet(string $styleSrc): void
	{
		$this->getHead()->addChild(new StylesheetSource($styleSrc));
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
