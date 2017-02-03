<?php

namespace Unicorn\UI\Base;

abstract class PlainWidget implements Widget
{
	private $element;
	
	/**
	 * @param Element|string|null $element An Element object, or a tag name in which case a HtmlElement will be instantiated.
	 */
	function __construct($element)
	{
		if($element instanceof HtmlElement) {
			$this->element = $element;
		} else if(is_string($element)) {
			$this->element = new HtmlElement($element);
		} else {
			throw new \InvalidArgumentException("Argument must be an instance of HtmlElement or a string representing an html tag.");
		}
	}
	
	protected function element(): HtmlElement
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
