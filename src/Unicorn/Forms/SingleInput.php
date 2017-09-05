<?php

namespace Unicorn\Forms;

use Unicorn\UI\Base\Element;

abstract class SingleInput extends Input
{
	public function value()
	{
		return $this->form()->data($this->fullName());
	}
	
	abstract public function widget(): Element;
}
