<?php

namespace Unicorn\UI\Base;

class ContainerWidget implements WidgetContainer, Widget
{
	use ContainerWrapper;
	
	function __construct()
	{
		$this->setContainer(new Container());
	}
	
	public function render(): string
	{
		return $this->getContainer()->render();
	}
}
