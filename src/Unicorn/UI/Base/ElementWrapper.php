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
		} else if(is_a($element, "Element")) {
			$this->setElement($element);
		} else if(is_string($element)) {
			$this->setElement(new HtmlElement($element));
		} else {
			throw new \InvalidArgumentException("Invalid argument \$element to ElementWidget. Must be an instance of Element, a string (html tag name), or null.");
		}
	}
	
	/**
	 * @return Element|HtmlElement
	 * @throws NoElementSetException
	 */
	protected function getElement(): Element
	{
		if($this->element === null) {
			throw new NoElementSetException("No element set on ElementWrapper trait.");
		}
		return $this->element;
	}
	
	public function getID(): ?string
	{
		return $this->getElement()->getID();
	}
	
	public function setID(string $id): void
	{
		$this->getElement()->setID($id);
	}
	public function removeID(): void
	{
		$this->getElement()->removeID();
	}
	
	public function hasClass(string $class): bool
	{
		return $this->getElement()->hasClass($class);
	}
	
	public function addClass(string $class): void
	{
		$this->getElement()->addClass($class);
	}
	
	public function removeClass(string $class): void
	{
		$this->getElement()->removeClass($class);
	}
	
	public function render(): string
	{
		return $this->getElement()->render();
	}
}
