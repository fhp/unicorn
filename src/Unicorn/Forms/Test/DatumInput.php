<?php

namespace Unicorn\Forms\Test;

use Unicorn\Forms\Input;
use Unicorn\Forms\InputSet;
use Unicorn\Forms\TextInput;

class DatumInput extends InputSet
{
	function __construct(Input $parent, $name, $label)
	{
		parent::__construct($parent, $name, $label);
		
		$this->addInput(new TextInput($this, "dag", "dag"));
		$this->addInput(new TextInput($this, "maand", "maand"));
		$this->addInput(new TextInput($this, "jaar", "jaar"));
	}
}
