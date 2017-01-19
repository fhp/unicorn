<?php

namespace Unicorn\UI\Base;

abstract class PanelWidget extends ElementWidget implements WidgetContainer
{
	use ContainerWrapper;
	
	/**
	 * ElementWidget constructor.
	 * @param Element|string $element An Element object, or a tag name in which case a HtmlElement will be instantiated.
	 */
	function __construct($element)
	{
		parent::__construct($element);
		$this->setContainer(new Container());
	}
}
