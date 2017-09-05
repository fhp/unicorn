<?php

namespace Unicorn\Forms\Test;

use Unicorn\Forms\FieldsetInput;
use Unicorn\Forms\Form;
use Unicorn\Forms\TextInput;

class NAWInput extends FieldsetInput
{
	function __construct(Form $form, $name, $label)
	{
		parent::__construct($form, $name, $label);
		
		$this->addInput(new TextInput($this, "naam", "Naam"));
		$this->addInput(new TextInput($this, "adres", "Adres"));
		$this->addInput(new TextInput($this, "postcode", "Postcode"));
	}
}
