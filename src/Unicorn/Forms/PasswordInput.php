<?php

namespace Unicorn\Forms;

class PasswordInput extends AbstractInput
{
	function __construct(string $id, string $label = null, string $name = null)
	{
		parent::__construct("password", $id, $label, $name);
	}
}
