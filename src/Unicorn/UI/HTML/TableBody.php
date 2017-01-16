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
		foreach ($data as $elements) {
			$this->addRow(TableRow::fromArray($elements));
		}
	}
	
	public function addColumn(iterable $data): void
	{
		$i = 0;
		
		foreach($data as $element) {
			if(!isset($this->rows[$i])) {
				$this->addRow(new TableRow());
			}
			$cell = new TableData();
			if(is_a($element, "IWidget")) {
				$cell->addChild($element);
			} else if(is_string($element)) {
				$cell->addtext($element);
			} else {
				throw new \RuntimeException("Invalid array passed to TableBody::addColumn(). The array can contain only strings and IWidget elements");
			}
			$this->rows[$i++]->addCell($cell);
		}
	}
}
