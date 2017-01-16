<?php

namespace Unicorn\UI\HTML;

use Unicorn\UI\Base\HtmlWidget;
use Unicorn\UI\Bootstrap\ContextualStyle;

abstract class TableCell extends HtmlWidget
{
	public function setStyle(ContextualStyle $style): void
	{
		$this->getElement()->addClass($style);
	}
}
