<?php

namespace Unicorn\Forms\Conditions;

use Unicorn\Forms\Input;

class InputEquals extends SingleInputCondition
{
	private $value;
	
	function __construct(Input $input, $value, $message = null)
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
