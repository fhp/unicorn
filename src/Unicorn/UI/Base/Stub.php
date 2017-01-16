<?php

namespace Unicorn\UI\Base;

class Stub implements IWidget
{
	/** @var IWidget */
	private $widget = null;
	
	public function setWidget(IWidget $widget): void
	{
		$this->widget = $widget;
	}
	
	public function hasWidget(): bool
	{
		return $this->widget !== null;
	}
	
	public function getWidget(): ?IWidget
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
