<?php

namespace Unicorn\UI\Bootstrap;

use Unicorn\UI\Base\HtmlElement;
use Unicorn\UI\Base\ElementWidget;
use Unicorn\UI\Base\Stub;
use Unicorn\UI\Base\Widget;
use Unicorn\UI\Base\WidgetContainer;

class Panel extends ElementWidget implements WidgetContainer
{
	private $header;
	private $body;
	private $table;
	private $footer;
	
	function __construct(ContextualStyle $type = null)
	{
		parent::__construct("div");
		
		if($type === null) {
			$type = ContextualStyle::default();
		}
		
		$this->addClass("panel");
		$this->addClass("panel-" . $type);
		
		$this->header = new Stub();
		$this->body = new Stub();
		$this->table = new Stub();
		$this->footer = new Stub();
		
		$this->getElement()->addChild($this->header);
		$this->getElement()->addChild($this->body);
		$this->getElement()->addChild($this->table);
		$this->getElement()->addChild($this->footer);
	}
	
	public function getHeader(): HtmlElement
	{
		if(!$this->header->hasWidget()) {
			$header = new HtmlElement("div");
			$header->addClass("panel-heading");
			
			$this->header->setWidget($header);
		}
		return $this->header->getWidget();
	}
	
	public function getBody(): HtmlElement
	{
		if(!$this->body->hasWidget()) {
			$header = new HtmlElement("div");
			$header->addClass("panel-body");
			
			$this->body->setWidget($header);
		}
		return $this->body->getWidget();
	}
	
	public function getTable(): Table
	{
		if(!$this->table->hasWidget()) {
			$this->table->setWidget(new Table());
		}
		return $this->table->getWidget();
	}
	
	public function setTable(Table $table): void
	{
		$this->table->setWidget($table);
	}
	
	public function getFooter(): HtmlElement
	{
		if(!$this->footer->hasWidget()) {
			$header = new HtmlElement("div");
			$header->addClass("panel-footer");
			
			$this->footer->setWidget($header);
		}
		return $this->footer->getWidget();
	}
	
	public function addChild(Widget $child): void
	{
		$this->getBody()->addChild($child);
	}
	
	public function prependChild(Widget $child): void
	{
		$this->getBody()->prependChild($child);
	}
	
	public function addText(string $text): void
	{
		$this->getBody()->addText($text);
	}
	
	public function prependText(string $text): void
	{
		$this->getBody()->prependText($text);
	}
	
	public function removeChildren(): void
	{
		$this->getBody()->removeChildren();
	}
}
