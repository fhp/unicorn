<?php

namespace Unicorn\UI\Base;

class PanelWidget extends ElementWidget implements WidgetContainer
{
	use ContainerWrapper;
	
	function __construct($element)
	{
		parent::__construct($element);
		$this->setContainer(new Container());
	}
}
