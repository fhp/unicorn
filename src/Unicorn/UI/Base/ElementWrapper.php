<?php

namespace Unicorn\UI\Base;

use Unicorn\UI\Exceptions\NoElementSetException;

trait ElementWrapper
{
	/** @var Element */
	private $element;

	protected function setElement(Element $element): void
	{
		$this->element = $element;
	}
	
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
}
