<?php

namespace Unicorn\Forms\Conditions;

use Unicorn\Forms\Input;

abstract class DualInputCondition implements InputCondition
{
	/** @var Input */
	private $inputA;
	
	/** @var Input */
	private $inputB;
	
	/** @var string */
	private $message;
	
	function __construct(Input $inputA, Input $inputB, string $message = null)
	{
		$this->inputA = $inputA;
		$this->inputB = $inputB;
		if($message === null) {
			$this->message = $this->defaultMessage();
		} else {
			$this->message = $message;
		}
	}
	
	public function check(): void
	{
		if(!$this->condition($this->inputA->value(), $this->inputB->value())) {
			$this->setErrors($this->inputA, $this->inputB, $this->message);
		}
	}
	
	protected function setErrors(Input $inputA, Input $inputB, $message): void
	{
		$inputA->error($message);
		$inputB->error(null);
	}
	
	abstract protected function condition($valueA, $valueB): bool;
	
	/**
	 * @return null|string Return a default message, or null if no default message is available.
	 */
	abstract protected function defaultMessage();
}
