<?php

namespace Unicorn\UI\Base;

class HtmlWidget extends ChildlessHtmlWidget
{
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
