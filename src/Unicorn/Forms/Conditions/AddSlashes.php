<?php

namespace Unicorn\Forms\Conditions;

use Unicorn\Forms\FormInput;

class AddSlashes implements FormCondition
{
	private $input;
	
	function __construct(FormInput $input)
	{
		$this->input = $input;
	}
	
	public function check(): void
	{
		$this->input->updateValue(htmlentities($this->input->value()));
	}
}
