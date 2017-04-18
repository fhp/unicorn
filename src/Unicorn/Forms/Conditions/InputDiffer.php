<?php

namespace Unicorn\Forms\Conditions;

class InputDiffer extends DualInputCondition
{
	function condition($valueA, $valueB): bool
	{
		return $valueA != $valueB;
	}
	
	function defaultMessage()
	{
		return "The values should differ.";
	}
}
