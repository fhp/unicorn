<?php

namespace Unicorn\Forms;

class CheckboxInput extends AbstractRadioCheckboxInput
{
	function __construct(string $id, string $label = null, string $name = null)
	{
		parent::__construct("checkbox", $id, $label, $name);
	}
}
