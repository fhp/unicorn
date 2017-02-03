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
		$newLines = count($this->children) > 1;
		foreach($this->children as $child) {
			$html .= $child->render();
			if($newLines && substr($html, -1) != "\n") {
				$html .= "\n";
			}
		}
		$newLines = strpos($html, "\n") !== false;
		$html = str_replace("\n", "\n\t", trim($html));
		if($newLines) {
			$html = "\n\t" . $html . "\n";
		}
		
		return $html;
	}
	
	public function isActive(): bool
	{
		$active = false;
		foreach($this->children as $child) {
			$active |= $child->isActive();
		}
		return $active;
	}
}
