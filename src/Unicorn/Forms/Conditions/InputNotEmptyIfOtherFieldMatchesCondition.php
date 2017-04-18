<?php

namespace Unicorn\Forms\Conditions;

use Unicorn\Forms\FormInput;

class InputNotEmptyIfOtherFieldMatchesCondition extends DualInputCondition
{
	private $otherFieldCondition;
	
	function __construct(FormInput $inputA, FormInput $otherInput, callable $otherFieldCondition, string $message = null)
	{
		$this->otherFieldCondition = $otherFieldCondition;
		parent::__construct($inputA, $otherInput, $message);
	}
	
	function condition($valueA, $valueB): bool
	{
		if($this->otherFieldCondition($valueB)) {
			return $valueA !== null && $valueA != "";
		}
		return true;
	}
	
	function defaultMessage()
	{
		return "This field is required.";
	}
}
