<?php

namespace Unicorn\UI\Base;

abstract class ElementWidget implements Element
{
	use ElementWrapper;
	
	/**
	 * ElementWidget constructor.
	 * @param Element|string|null $element An Element object, or a tag name in which case a HtmlElement will be instantiated.
	 */
	function __construct($element)
	{
		$this->setElement($element);
	}
}
