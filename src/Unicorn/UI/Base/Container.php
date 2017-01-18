<?php

namespace Unicorn\UI\Base;

class Container implements WidgetContainer, Widget
{
	/** @var Widget[] */
	private $children = array();
	
	public function addChild(Widget $child): void
	{
		$this->children[] = $child;
	}
	
	public function prependChild(Widget $child): void
	{
		$this->children = array_merge(array($child), $this->children);
	}
	
	public function addText(string $text): void
	{
		$this->addChild(new Text($text));
	}
	
	public function prependText(string $text): void
	{
		$this->prependChild(new Text($text));
	}
	
	public function removeChildren(): void
	{
		$this->children = array();
	}
	
	public function render(): string
	{
		$html = "";
		if(count($this->children) > 1) {
			$html .= "\n";
		}
		foreach($this->children as $child) {
			$html .= $child->render();
		}
		if(count($this->children) > 1) {
			$html .= "\n";
		}
		return $html;
	}
}
