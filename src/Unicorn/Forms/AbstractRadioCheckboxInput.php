<?php

namespace Unicorn\Forms;

use Unicorn\UI\Base\Container;
use Unicorn\UI\Base\HtmlElement;

class AbstractRadioCheckboxInput extends MultipleChoiceInput
{
	private $type;
	
	function __construct(Form $form, string $type, string $id, string $label = null, string $name = null)
	{
		parent::__construct($form, new Container(), $id, $label, $name);
		
		$this->type = $type;
	}
	
	protected function createInput(string $name, string $value, string $label = null): MultipleChoiceInputElement
	{
		$element = new class($this->type, $name, $value, $label) extends HtmlElement implements MultipleChoiceInputElement
		{
			/** @var HtmlElement */
			private $input;
			
			function __construct(string $type, string $name, string $value, string $label = null)
			{
				parent::__construct("div");
				$this->addClass($type);
				
				$labelElement = new HtmlElement("label");
				$this->addChild($labelElement);
				
				$input = new HtmlElement("input");
				$input->setProperty("type", $type);
				$input->setProperty("name", $name);
				$input->setProperty("value", $value);
				$this->input = $input;
				$labelElement->addChild($input);
				
				if($label !== null) {
					$this->addText($label);
				}
			}
			
			public function setDefault(bool $default): void
			{
				if($default) {
					$this->input->setProperty("checked", "checked");
				} else {
					$this->input->removeProperty("checked");
				}
			}
		};
		
		return $element;
	}
}
