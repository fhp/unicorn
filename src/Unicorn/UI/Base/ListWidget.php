<?php

namespace Unicorn\UI\Base;

abstract class ListWidget implements Widget
{
	private $container;
	
	function __construct()
	{
		$this->container = new Container();
	}
	
	protected function container(): Container
	{
		return $this->container;
	}
	
	public function render(): string
	{
		return $this->container()->render();
	}
	
	public function isActive(): bool
	{
		return $this->container()->isActive();
	}
}
