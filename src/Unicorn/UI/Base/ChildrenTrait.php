<?php

namespace Unicorn\UI\Base;

trait ChildrenTrait
{
	/** @var Widget[] */
	private $children = array();
	
	protected function addChild(Widget $child): void
	{
		$this->children[] = $child;
	}
	
	protected function prependChild(Widget $child): void
	{
		$this->children = array_merge(array($child), $this->children);
	}
	
	protected function addText(string $text): void
	{
		$this->addChild(new Text($text));
	}
	
	protected function prependText(string $text): void
	{
		$this->prependChild(new Text($text));
	}
	
	protected function removeChildren(): void
	{
		$this->children = array();
	}
	
	protected function renderChildren(): string
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
