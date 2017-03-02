<?php

namespace Unicorn\UI\Base;

use Unicorn\UI\Exceptions\NoElementSetException;

trait ElementWrapper
{
	/** @var Element */
	private $element;

	/**
	 * @param Element|string|null $element An Element object, or a tag name in which case a HtmlElement will be instantiated.
	 */
	protected function setElement($element): void
	{
		if($element === null) {
			// Do nothing
		} else if($element instanceof Element) {
			$this->element = $element;
		} else if(is_string($element)) {
			$this->element = new HtmlElement($element);
		} else {
			throw new \InvalidArgumentException("Invalid argument \$element to ElementWidget. Must be an instance of Element, a string (html tag name), or null.");
		}
	}
	
	/**
	 * @return Element|HtmlElement
	 * @throws NoElementSetException
	 */
	protected function element(): Element
	{
		if($this->element === null) {
			throw new NoElementSetException("No element set on ElementWrapper trait.");
		}
		return $this->element;
	}
	
	protected function hasElement(): bool
	{
		return $this->element !== null;
	}
	
	public function id(): string
	{
		return $this->element()->id();
	}
	
	public function hasID(): bool
	{
		return $this->element()->hasID();
	}
	
	public function setID(string $id): void
	{
		$this->element()->setID($id);
	}
	
	public function removeID(): void
	{
		$this->element()->removeID();
	}
	
	public function hasClass(string $class): bool
	{
		return $this->element()->hasClass($class);
	}
	
	public function addClass(string $class): void
	{
		$this->element()->addClass($class);
	}
	
	public function removeClass(string $class): void
	{
		$this->element()->removeClass($class);
	}
	
	public function isActive(): bool
	{
		return $this->element()->isActive();
	}
}
