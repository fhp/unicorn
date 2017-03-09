<?php

namespace Unicorn\Forms;

use Unicorn\UI\Base\HtmlElement;

class SelectInput extends MultipleChoiceInput
{
	function __construct(string $id, string $label = null, string $name = null)
	{
		parent::__construct($id, $label, $name);
		
		$select = new HtmlElement("select");
		$select->setProperty("name", $this->name());
		$select->setID($id);
		$select->addClass("form-control");
		$this->setInput($select);
	}
	
	protected function createInput(string $name, string $value, string $label): MultipleChoiceInputElement
	{
		return new class($value, $label) extends HtmlElement implements MultipleChoiceInputElement
		{
			function __construct(string $value, string $label)
			{
				parent::__construct("option");
				$this->setProperty("value", $value);
				$this->addText($label);
			}
			
			public function setDefault(bool $default): void
			{
				if($default) {
					$this->setProperty("selected", "selected");
				} else {
					$this->removeProperty("selected");
				}
			}
		};
	}
}
