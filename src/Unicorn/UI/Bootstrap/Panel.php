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
		
		$this->element()->addChild($this->header);
		$this->element()->addChild($this->body);
		$this->element()->addChild($this->table);
		$this->element()->addChild($this->footer);
	}
	
	public function header(): HtmlElement
	{
		if(!$this->header->hasWidget()) {
			$header = new HtmlElement("div");
			$header->addClass("panel-heading");
			
			$this->header->setWidget($header);
		}
		return $this->header->widget();
	}
	
	public function body(): HtmlElement
	{
		if(!$this->body->hasWidget()) {
			$header = new HtmlElement("div");
			$header->addClass("panel-body");
			
			$this->body->setWidget($header);
		}
		return $this->body->widget();
	}
	
	public function table(): Table
	{
		if(!$this->table->hasWidget()) {
			$this->table->setWidget(new Table());
		}
		return $this->table->widget();
	}
	
	public function setTable(Table $table): void
	{
		$this->table->setWidget($table);
	}
	
	public function footer(): HtmlElement
	{
		if(!$this->footer->hasWidget()) {
			$header = new HtmlElement("div");
			$header->addClass("panel-footer");
			
			$this->footer->setWidget($header);
		}
		return $this->footer->widget();
	}
	
	public function addChild(Widget $child): void
	{
		$this->body()->addChild($child);
	}
	
	public function prependChild(Widget $child): void
	{
		$this->body()->prependChild($child);
	}
	
	public function addText(string $text): void
	{
		$this->body()->addText($text);
	}
	
	public function prependText(string $text): void
	{
		$this->body()->prependText($text);
	}
	
	public function removeChildren(): void
	{
		$this->body()->removeChildren();
	}
}
