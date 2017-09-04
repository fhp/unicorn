<?php

namespace Unicorn\UI\HTML;

use Unicorn\UI\Base\HtmlElementWidget;

abstract class TablePart extends HtmlElementWidget
{
	/** @var TableRow[] */
	protected $rows = array();
	
	public function addRow(TableRow $row): void
	{
		$this->container()->addChild($row);
		$this->rows[] = $row;
	}
}
