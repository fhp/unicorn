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
	protected function getContainer(): WidgetContainer
	{
		if($this->container === null) {
			throw new NoElementSetException("No container set on ContainerWrapper trait.");
		}
		return $this->container;
	}
	
	public function addChild(Widget $child): void
	{
		$this->getContainer()->addChild($child);
	}
	
	public function prependChild(Widget $child): void
	{
		$this->getContainer()->prependChild($child);
	}
	
	public function addText(string $text): void
	{
		$this->getContainer()->addText($text);
	}
	
	public function prependText(string $text): void
	{
		$this->getContainer()->prependText($text);
	}
	
	public function removeChildren(): void
	{
		$this->getContainer()->removeChildren();
	}
}
