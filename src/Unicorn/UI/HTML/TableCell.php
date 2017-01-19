<?php

namespace Unicorn\UI\HTML;

use Unicorn\UI\Base\PanelWidget;
use Unicorn\UI\Bootstrap\ContextualStyle;

abstract class TableCell extends PanelWidget
{
	function __construct($element)
	{
		parent::__construct($element);
		$this->setContainer($this->element());
	}
	
	public function setStyle(ContextualStyle $style): void
	{
		$this->element()->addClass($style);
	}
}
