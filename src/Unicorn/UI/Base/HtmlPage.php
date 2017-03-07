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
		ContainerWrapper::container as private;
		ContainerWrapper::setContainer as setContentPane;
	}
	
	public function __construct(HtmlElement $content = null)
	{
		$this->html = new HtmlElement("html");
		$this->head = new HtmlElement("head");
		$this->body = new HtmlElement("body");
		$this->title = new Stub();
		
		$this->html->addChild($this->head);
		$this->html->addChild($this->body);
		
		$this->head->addChild($this->title);
		
		if($content !== null) {
			$this->setContentPane($content);
		}
	}
	
	protected function html(): HtmlElement
	{
		return $this->html;
	}
	
	protected function head(): HtmlElement
	{
		return $this->head;
	}
	
	protected function body(): HtmlElement
	{
		return $this->body;
	}
	
	protected function contentPane(): HtmlElement
	{
		/** @var HtmlElement $content */
		$content = $this->container();
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
		$this->head()->addChild(new JavascriptSource($scriptSrc));
	}
	
	protected function addStylesheet(string $styleSrc): void
	{
		$this->head()->addChild(new StylesheetSource($styleSrc));
	}
	
	public function render(): string
	{
		$html = "<!DOCTYPE html>\n";
		$html .= $this->html()->render();
		
		return $html;
	}
	
	public function __toString(): string
	{
		return $this->render();
	}
}
