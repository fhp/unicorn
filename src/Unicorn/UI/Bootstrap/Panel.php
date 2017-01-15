<?php

namespace Unicorn\UI\Bootstrap;

use Unicorn\UI\Base\HtmlElement;
use Unicorn\UI\Base\ProtectedHtmlElement;
use Unicorn\UI\Base\Stub;
use Unicorn\UI\Base\Widget;

class Panel extends ProtectedHtmlElement
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
		
		$this->body = new HtmlElement("div");
		$this->body->addClass("panel-body");
		
		$this->header = new Stub();
		$this->body = new Stub();
		$this->table = new Stub();
		$this->footer = new Stub();
		
		$this->addChild($this->header);
		$this->addChild($this->body);
		$this->addChild($this->table);
		$this->addChild($this->footer);
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
	
	public function getTable(): HtmlElement
	{
		if(!$this->table->hasWidget()) {
			$header = new HtmlElement("table");
			$header->addClass("table");
			
			$this->table->setWidget($header);
		}
		return $this->table->getWidget();
	}
	
	public function setTable(Widget $table): void
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
}
