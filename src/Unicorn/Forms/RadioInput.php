<?php

namespace Unicorn\Forms;

class RadioInput extends AbstractRadioCheckboxInput
{
	function __construct(Form $form, string $id, string $label = null, string $name = null)
	{
		parent::__construct($form, "radio", $id, $label, $name);
	}
}
