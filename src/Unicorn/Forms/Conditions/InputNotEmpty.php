<?php

namespace Unicorn\Forms\Conditions;

class InputNotEmpty extends SingleInputCondition
{
	function condition($value): bool
	{
		return $value !== null && $value != "";
	}
	
	function defaultMessage(): ?string
	{
		return "This field is required.";
	}
}
