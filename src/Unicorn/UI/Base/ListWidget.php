<?php

namespace Unicorn\UI\Base;

abstract class ListWidget implements IWidget
{
	private $list;
	
	function __construct()
	{
		$this->list = new WidgetList();
	}
	
	protected function addChild(IWidget $child): void
	{
		$this->list->addChild($child);
	}
	
	protected function prependChild(IWidget $child): void
	{
		$this->list->prependChild($child);
	}
	
	protected function addText(string $text): void
	{
		$this->list->addText($text);
	}
	
	protected function prependText(string $text): void
	{
		$this->list->prependText($text);
	}
	
	protected function removeChildren(): void
	{
		$this->list->removeChildren();
	}
	
	public function render(): string
	{
		return $this->list->render();
	}
}
