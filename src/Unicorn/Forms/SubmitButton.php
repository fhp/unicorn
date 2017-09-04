<?php

namespace Unicorn\Forms;

use Unicorn\UI\Bootstrap\Button;
use Unicorn\UI\Bootstrap\ContextualStyle;
use Unicorn\UI\Bootstrap\Icon;

class SubmitButton extends AbstractSubmitButton
{
	function __construct(Form $form, string $label, string $id = "submit", string $name = null, Icon $icon = null, ContextualStyle $style = null)
	{
		if($style === null) {
		       $style = ContextualStyle::primary();
		}
		$button = new Button($label, $icon, $style);
		$button->setProperty("type", "submit");
		$button->setID($id);
		
		parent::__construct($form, $button, $id, $name);
	}
}
