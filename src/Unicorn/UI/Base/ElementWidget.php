<?php

namespace Unicorn\UI\Base;

/**
 * @method Element|HtmlElement getElement()
 */
abstract class ElementWidget implements Element
{
	use ElementWrapper;
	
	/**
	 * ElementWidget constructor.
	 * @param Element|string|null $element An Element object, or a tag name in which case a HtmlElement will be instantiated.
	 */
	function __construct($element)
	{
		if($element === null) {
			// Do nothing
		} else if(is_a($element, "Element")) {
			$this->setElement($element);
		} else if(is_string($element)) {
			$this->setElement(new HtmlElement($element));
		} else {
			throw new \InvalidArgumentException("Invalid argument \$element to ElementWidget. Must be an instance of Element, a string (html tag name), or null.");
		}
	}
	
	public function render(): string
	{
		return $this->getElement()->render();
	}
}
