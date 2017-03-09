<?php

namespace Unicorn\Forms;

class CheckboxInput extends AbstractRadioCheckboxInput
{
	function __construct(Form $form, string $id, string $label = null, string $name = null)
	{
		parent::__construct($form, "checkbox", $id, $label, $name);
	}
}
