<?php

namespace Unicorn\UI\Base;

abstract class ElementWidget implements Element
{
	use ElementWrapper;
	
	/**
	 * @param Element|string|null $element An Element object, or a tag name in which case a HtmlElement will be instantiated.
	 */
	function __construct($element)
	{
		$this->setElement($element);
	}
	
	public function render(): string
	{
		return $this->element()->render();
	}
}
