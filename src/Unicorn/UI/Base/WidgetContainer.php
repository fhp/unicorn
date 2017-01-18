<?php

namespace Unicorn\UI\Base;

interface WidgetContainer
{
	public function addChild(Widget $child): void;
	
	public function prependChild(Widget $child): void;
	
	public function addText(string $text): void;
	
	public function prependText(string $text): void;
	
	public function removeChildren(): void;
	
	public function render(): string;
}
