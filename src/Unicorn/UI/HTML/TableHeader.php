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
	
	public function addColumn(string $header): void
	{
		$cell = new TableHead();
		$cell->addtext($header);
		
		if(!isset($this->rows[0])) {
			$this->addRow(new TableRow());
		}
		$this->rows[0]->addCell($cell);
	}
}
