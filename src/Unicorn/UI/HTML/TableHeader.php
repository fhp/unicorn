<?php

namespace Unicorn\UI\HTML;

class TableHeader extends TablePart
{
	function __construct()
	{
		parent::__construct("thead");
	}
	
	public function fromArray(iterable $data)
	{
		$this->addRow(TableRow::headerFromArray($data));
	}
}
