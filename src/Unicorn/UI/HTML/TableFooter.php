<?php

namespace Unicorn\UI\HTML;

class TableFooter extends TablePart
{
	function __construct()
	{
		parent::__construct("tfoot");
	}
	
	public function fromArray(iterable $data)
	{
		$this->addRow(TableRow::headerFromArray($data));
	}
}
