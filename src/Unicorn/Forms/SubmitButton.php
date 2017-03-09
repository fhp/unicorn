<?php

namespace Unicorn\Forms;

use Unicorn\UI\Bootstrap\ContextualStyle;

class SubmitButton extends SingleInput
{
	function __construct(Form $form, $id, $label, $name = null, ContextualStyle $style = null)
	{
		if($style === null) {
		       $style = ContextualStyle::default();
		}
		
		parent::__construct($form, "submit", $id, $name, null);
		$this->setValue($label);
		$this->input()->addClass("btn");
		$this->input()->addClass("btn-" . $style);
	}
}
