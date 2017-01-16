<?php

namespace Unicorn\UI\HTML;

class TableBody extends TablePart
{
	function __construct()
	{
		parent::__construct("tbody");
	}
	
	public function fromArray(iterable $data)
	{
		foreach($data as $elements) {
			$this->addRow(TableRow::fromArray($elements));
		}
	}
}
