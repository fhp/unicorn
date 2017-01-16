<?php

namespace Unicorn\UI\HTML;

use Unicorn\UI\Base\ChildlessHtmlWidget;

abstract class TablePart extends ChildlessHtmlWidget
{
	function __construct($tag)
	{
		parent::__construct($tag);
	}
	
	public function addRow(TableRow $row): void
	{
		$this->getElement()->addChild($row);
	}
}
