<?php

namespace Unicorn\UI\Base;

interface IWidgetList extends IWidget
{
	public function addChild(IWidget $child): void;
	
	public function prependChild(IWidget $child): void;
	
	public function addText(string $text): void;
	
	public function prependText(string $text): void;
	
	public function removeChildren(): void;
}
