<?php

namespace Unicorn\Forms;

class SubmitButton extends AbstractInput
{
	function __construct($id, $label, $name = null)
	{
		parent::__construct("submit", $id, $name, null);
		$this->setValue($label);
	}
}
