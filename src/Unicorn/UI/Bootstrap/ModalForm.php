<?php

namespace Unicorn\UI\Bootstrap;

use Unicorn\Forms\Form;

class ModalForm extends Modal
{
	private $form;
	
	function __construct(Form $form, string $id = null)
	{
		if($id === null) {
			$id = $form->id() . "-modal";
		}
		parent::__construct($id);
		
		$this->form = $form;
		
		$this->form->noSubmitButton();
		
		$submitButton = new Button($form->submitButton()->presetValue(), null, ContextualStyle::primary());
		$submitButton->setProperty("type", "submit");
		$submitButton->setProperty("form", $this->form->id());
		
		$this->setTitle($this->form->title());
		$this->form->noTitle();
		
		$this->body()->addChild($this->form);
		$this->footer()->addChild($submitButton);
	}
}
