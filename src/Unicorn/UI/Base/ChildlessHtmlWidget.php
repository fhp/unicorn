<?php

namespace Unicorn\UI\Base;

abstract class ChildlessHtmlWidget implements IWidget, ISimpleHtmlElement
{
	/** @var HtmlElement */
	private $htmlElement;
	
	function __construct(string $tag)
	{
		$this->setElement(new HtmlElement($tag));
	}
	
	protected function getElement(): HtmlElement
	{
		return $this->htmlElement;
	}
	
	protected function setElement(HtmlElement $element): void
	{
		$this->htmlElement = $element;
	}
	
	public function render(): string
	{
		return $this->htmlElement->render();
	}
	
	public function getID(): ?string
	{
		return $this->htmlElement->getID();
	}
	
	public function setID(string $id): void
	{
		$this->htmlElement->setID($id);
	}
	
	public function removeID(): void
	{
		$this->htmlElement->removeID();
	}
	
	public function hasClass(string $class): bool
	{
		return $this->htmlElement->hasClass($class);
	}
	
	public function addClass(string $class): void
	{
		$this->htmlElement->addClass($class);
	}
	
	public function removeClass(string $class): void
	{
		$this->htmlElement->removeClass($class);
	}
}
