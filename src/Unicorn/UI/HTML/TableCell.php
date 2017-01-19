<?php

namespace Unicorn\UI\HTML;

use Unicorn\UI\Base\HtmlElement;
use Unicorn\UI\Bootstrap\ContextualStyle;

abstract class TableCell extends HtmlElement
{
	public function setStyle(ContextualStyle $style): void
	{
		$this->addClass($style);
	}
}
