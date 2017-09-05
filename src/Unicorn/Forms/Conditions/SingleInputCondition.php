<?php

namespace Unicorn\Forms\Conditions;

use Unicorn\Forms\Input;

abstract class SingleInputCondition implements InputCondition
{
	private $message;
	private $input;
	
	function __construct(Input $input, string $message = null)
	{
		$this->input = $input;
		if($message === null) {
			$this->message = $this->defaultMessage();
		} else {
			$this->message = $message;
		}
	}
	
	function check(): void
	{
		if(!$this->condition($this->input->value())) {
			$this->input->error($this->message);
		}
	}
	
	abstract function condition($value): bool;
	
	/**
	 * @return null|string Return a default message, or null if no default message is available.
	 */
	abstract function defaultMessage();
}
