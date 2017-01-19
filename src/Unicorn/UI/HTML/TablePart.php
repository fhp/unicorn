<?php

namespace Unicorn\UI\HTML;

use Unicorn\UI\Base\ElementWidget;

abstract class TablePart extends ElementWidget
{
	/** @var TableRow[] */
	protected $rows = array();
	
	function __construct($tag)
	{
		parent::__construct($tag);
	}
	
	public function addRow(TableRow $row): void
	{
		$this->element()->addChild($row);
		$this->rows[] = $row;
	}
}
