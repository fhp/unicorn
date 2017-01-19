<?php

namespace Unicorn\UI\HTML;

use Unicorn\UI\Base\Widget;

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
			if($element instanceof Widget) {
				$cell->addChild($element);
			} else if(is_string($element)) {
				$cell->addtext($element);
			} else {
				throw new \InvalidArgumentException("Invalid array passed to TableBody::addColumn(). The array can contain only strings and Widget elements");
			}
			$this->rows[$i++]->addCell($cell);
		}
	}
}
