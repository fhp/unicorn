<?php

namespace Unicorn\Forms;

use Unicorn\UI\Base\ElementWidget;
use Unicorn\UI\Base\HtmlElement;

class AbstractSubmitButton extends ElementWidget
{
	private $form;
	private $button;
	private $name;
	
	function __construct(Form $form, HtmlElement $button, string $id, string $name = null)
	{
		$this->form = $form;
		$this->button = $button;
		
		if($name === null) {
			$name = $id;
		}
		$this->name = $name;
		
		$renderedButton = $this->form->renderSubmitButton($this->button);
		
		parent::__construct($renderedButton);
	}
}
