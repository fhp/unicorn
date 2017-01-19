<?php

namespace Unicorn\UI\Base;

use Unicorn\UI\Exceptions\NoElementSetException;

trait ContainerWrapper
{
	/** @var WidgetContainer */
	private $container = null;
	
	protected function setContainer(WidgetContainer $container): void
	{
		$this->container = $container;
	}
	
	/**
	 * @return WidgetContainer|Container
	 * @throws NoElementSetException
	 */
	protected function container(): WidgetContainer
	{
		if($this->container === null) {
			throw new NoElementSetException("No container set on ContainerWrapper trait.");
		}
		return $this->container;
	}
	
	public function addChild(Widget $child): void
	{
		$this->container()->addChild($child);
	}
	
	public function prependChild(Widget $child): void
	{
		$this->container()->prependChild($child);
	}
	
	public function addText(string $text): void
	{
		$this->container()->addText($text);
	}
	
	public function prependText(string $text): void
	{
		$this->container()->prependText($text);
	}
	
	public function removeChildren(): void
	{
		$this->container()->removeChildren();
	}
}
