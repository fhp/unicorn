<?php

namespace Unicorn\UI\Base;

class ListWidget implements Widget
{
	private $container;
	
	function __construct()
	{
		$this->container = new Container();
	}
	
	protected function getContainer(): Container
	{
		return $this->container;
	}
	
	public function render(): string
	{
		return $this->getContainer()->render();
	}
}
