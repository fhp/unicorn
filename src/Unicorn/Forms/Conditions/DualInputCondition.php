<?php

namespace Unicorn\Forms\Conditions;

use Unicorn\Forms\FormInput;

abstract class DualInputCondition implements FormCondition
{
	/** @var FormInput */
	private $inputA;
	
	/** @var FormInput */
	private $inputB;
	
	/** @var string */
	private $message;
	
	function __construct(FormInput $inputA, FormInput $inputB, string $message = null)
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
	
	protected function setErrors(FormInput $inputA, FormInput $inputB, $message): void
	{
		$inputA->error($message);
		$inputB->error(null);
	}
	
	abstract function condition($valueA, $valueB): bool;
	
	/**
	 * @return null|string Return a default message, or null if no default message is available.
	 */
	abstract function defaultMessage();
}
