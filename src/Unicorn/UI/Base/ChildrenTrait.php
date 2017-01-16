<?php

namespace Unicorn\UI\Base;

trait ChildrenTrait
{
	/** @var IWidget[] */
	private $children = array();
	
	public function addChild(IWidget $child): void
	{
		$this->children[] = $child;
	}

	public function prependChild(IWidget $child): void
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
