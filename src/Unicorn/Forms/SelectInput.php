<?php

namespace Unicorn\Forms;

use Unicorn\UI\Base\HtmlElement;

class SelectInput extends MultipleChoiceInput
{
	function __construct(Form $form, string $id, string $label = null, string $name = null)
	{
		parent::__construct($form, new HtmlElement("select"), $id, $label, $name);
		
		$this->input()->setProperty("name", $this->name());
		$this->input()->setID($id);
		$this->input()->addClass("form-control");
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
