<?php

namespace Unicorn\Forms\Conditions;

class InputDiffer extends DualInputCondition
{
	function condition($valueA, $valueB): bool
	{
		return $valueA != $valueB;
	}
	
	function defaultMessage(): ?string
	{
		return "The values should differ.";
	}
}
