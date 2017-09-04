<?php

namespace Unicorn\UI\Base;

abstract class PlainWidget implements Widget
{
	private $element;
	
	function __construct($element)
	{
		if($element instanceof Element) {
			$this->element = $element;
		} else if(is_string($element)) {
			$this->element = new HtmlElement($element);
		} else {
			throw new \InvalidArgumentException("Invalid argument \$element to ElementWidget. Must be an instance of Element or a string (html tag name).");
		}
	}
	
	protected function element(): Widget
	{
		return $this->element;
	}
	
	public function render(): string
	{
		return $this->element()->render();
	}
	
	public function isActive(): bool
	{
		return $this->element()->isActive();
	}
}
