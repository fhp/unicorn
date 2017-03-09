<?php

namespace Unicorn\Forms;

class TextInput extends SingleInput
{
	function __construct(Form $form, string $id, string $label = null, string $name = null)
	{
		parent::__construct($form, "text", $id, $label, $name);
	}
}
