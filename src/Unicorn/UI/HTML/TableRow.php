<?php

namespace Unicorn\UI\HTML;

use Unicorn\UI\Base\ChildlessHtmlWidget;
use Unicorn\UI\Bootstrap\ContextualStyle;

class TableRow extends ChildlessHtmlWidget
{
	function __construct()
	{
		parent::__construct("tr");
	}
	
	public function addCell(TableCell $cell): void
	{
		$this->getElement()->addChild($cell);
	}
	
	public function setStyle(ContextualStyle $style): void
	{
		$this->getElement()->addClass($style);
	}
	
	static public function headerFromArray(iterable $data): TableRow
	{
		$row = new static();
		
		foreach($data as $element) {
			$row->addCell(self::setDataFromArrayElement(new TableHead(), $element));
		}
		
		return $row;
	}
	
	static public function fromArray(iterable $data): TableRow
	{
		$row = new static();
		
		foreach($data as $element) {
			$row->addCell(self::setDataFromArrayElement(new TableData(), $element));
		}
		
		return $row;
	}
	
	static private function setDataFromArrayElement(TableCell $cell, $element): TableCell
	{
		if(is_a($element, "IWidget")) {
			$cell->addClass($element);
		} else if(is_string($element)) {
			$cell->addText($element);
		} else {
			throw new \RuntimeException("Invalid array passed to TableRow::fromArray(). The array can contain only strings and IWidget elements");
		}
		return $cell;
	}
}
