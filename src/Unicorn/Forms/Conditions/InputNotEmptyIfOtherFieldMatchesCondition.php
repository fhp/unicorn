<?php

namespace Unicorn\Forms\Conditions;

use Unicorn\Forms\Input;

class InputNotEmptyIfOtherFieldMatchesCondition extends DualInputCondition
{
	private $otherFieldCondition;
	
	function __construct(Input $inputA, Input $otherInput, callable $otherFieldCondition, string $message = null)
	{
		$this->otherFieldCondition = $otherFieldCondition;
		parent::__construct($inputA, $otherInput, $message);
	}
	
	function condition($valueA, $valueB): bool
	{
		if(call_user_func($this->otherFieldCondition, $valueB)) {
			return $valueA !== null && $valueA != "";
		}
		return true;
	}
	
	function defaultMessage()
	{
		return "This field is required.";
	}
}
