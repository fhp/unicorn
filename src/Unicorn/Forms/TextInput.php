<?php

namespace Unicorn\Forms;

class TextInput extends AbstractInput
{
	function __construct(string $id, string $label = null, string $name = null)
	{
		parent::__construct("text", $id, $label, $name);
	}
}
