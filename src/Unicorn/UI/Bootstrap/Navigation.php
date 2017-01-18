<?php

namespace Unicorn\UI\Bootstrap;

use Unicorn\UI\Base\ElementWidget;

abstract class Navigation extends ElementWidget
{
	function __construct()
	{
		parent::__construct("ul");
		$this->addClass("nav");
	}
	
	public function addItem(NavigationItem $item): void
	{
		$this->getElement()->addChild($item);
	}
}
