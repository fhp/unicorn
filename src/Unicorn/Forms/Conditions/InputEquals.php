<?php

namespace Unicorn\Forms\Conditions;

use Unicorn\Forms\FormInput;

class InputEquals extends SingleInputCondition
{
	private $value;
	
	function __construct(FormInput $input, $value, $message = null)
	{
		$this->value = $value;
		parent::__construct($input, $message);
	}
	
	function condition($value): bool
	{
		return $value == $this->value;
	}
	
	function defaultMessage()
	{
		return null;
	}
}
