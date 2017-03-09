<?php

namespace Unicorn\Forms;

class RadioInput extends AbstractRadioCheckboxInput
{
	function __construct(string $id, string $label = null, string $name = null)
	{
		parent::__construct("radio", $id, $label, $name);
	}
}
