<?php

namespace Unicorn\Forms;

class PasswordInput extends SingleInput
{
	function __construct(Form $form, string $id, string $label = null, string $name = null)
	{
		parent::__construct($form, "password", $id, $label, $name);
	}
}
