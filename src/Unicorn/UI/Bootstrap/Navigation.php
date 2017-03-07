<?php

namespace Unicorn\UI\Bootstrap;

use Unicorn\UI\Base\ElementWidget;

class Navigation extends ElementWidget
{
	function __construct()
	{
		parent::__construct("ul");
		$this->addClass("nav");
	}
	
	public function addItem(NavigationItem $item): void
	{
		$this->element()->addChild($item);
	}
}
