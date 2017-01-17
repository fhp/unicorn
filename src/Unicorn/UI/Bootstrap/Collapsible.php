<?php

namespace Unicorn\UI\Bootstrap;

use Unicorn\UI\Base\HtmlElement;
use Unicorn\UI\Base\IWidget;
use Unicorn\UI\Base\WidgetList;

class Collapsible extends WidgetList
{
	private $button;
	private $area;
	
	function __construct(string $id, string $text = null, Icon $icon = null)
	{
		$this->button = new Button($text, $icon);
		$this->button->setData("toggle", "collapse");
		$this->button->setData("target", "#" . $id);
		
		$this->area = new HtmlElement("div");
		$this->area->setID($id);
		$this->area->addClass("collapse");
		
		parent::addChild($this->button);
		parent::addChild($this->area);
	}
	
	public function getButton(): Button
	{
		return $this->button;
	}
	
	protected function getElement(): HtmlElement
	{
		return $this->area;
	}
	
	public function addChild(IWidget $child): void
	{
		$this->getElement()->addChild($child);
	}
	
	public function prependChild(IWidget $child): void
	{
		$this->getElement()->prependChild($child);
	}
	
	public function addText(string $text): void
	{
		$this->getElement()->addText($text);
	}
	
	public function prependText(string $text): void
	{
		$this->getElement()->prependText($text);
	}
	
	public function removeChildren(): void
	{
		$this->getElement()->removeChildren();
	}
}
