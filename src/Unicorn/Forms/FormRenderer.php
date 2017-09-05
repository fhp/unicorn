<?php

namespace Unicorn\Forms;

use Unicorn\UI\Base\Widget;

abstract class FormRenderer implements Widget
{
	private $form;
	
	function __construct(Form $form)
	{
		$this->form = $form;
	}
	
	protected function form(): Form
	{
		return $this->form;
	}
	
	abstract public function render(): string;
	
	public function isActive(): bool
	{
		return $this->form->isActive();
	}
}
