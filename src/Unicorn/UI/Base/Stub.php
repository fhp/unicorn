<?php

namespace Unicorn\UI\Base;

class Stub extends Widget
{
	/** @var Widget */
	private $widget = null;
	
	public function setWidget(Widget $widget): void
	{
		$this->widget = $widget;
	}
	
	public function hasWidget(): bool
	{
		return $this->widget !== null;
	}
	
	public function getWidget(): ?Widget
	{
		return $this->widget;
	}
	
	function render(): string
	{
		if($this->hasWidget()) {
			return $this->getWidget()->render();
		} else {
			return "";
		}
	}
}
