<?php

namespace Unicorn\UI\Base;

use Unicorn\UI\Exceptions\NoElementSetException;

class Stub implements Widget
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
	
	public function unsetWidget(): void
	{
		$this->widget = null;
	}
	
	public function widget(): Widget
	{
		if($this->widget === null) {
			throw new NoElementSetException("No widget set on Stub widget.");
		}
		return $this->widget;
	}
	
	function render(): string
	{
		if($this->hasWidget()) {
			return $this->widget()->render();
		} else {
			return "";
		}
	}
	
	function isActive(): bool
	{
		if($this->hasWidget()) {
			return $this->widget()->isActive();
		} else {
			return false;
		}
	}
}
