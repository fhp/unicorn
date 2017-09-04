<?php

namespace Unicorn\UI\HTML;

class TableHead extends TablePart
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
		$cell = new TableHeader($header);
		
		if(!isset($this->rows[0])) {
			$this->addRow(new TableRow());
		}
		$this->rows[0]->addCell($cell);
	}
}
