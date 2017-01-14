<?php

namespace Unicorn\UI\Base;

class WidgetList extends ProtectedWidgetList
{
	public function addChild(Widget $child): void
	{
		parent::addChild($child);
	}
	
	public function prependChild(Widget $child): void
	{
		parent::prependChild($child);
	}
	
	public function addText(string $text): void
	{
		parent::addText($text);
	}
	
	public function prependText(string $text): void
	{
		parent::prependText($text);
	}
	
	public function removeChildren(): void
	{
		parent::removeChildren();
	}
}
