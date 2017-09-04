<?php

namespace Unicorn\Forms;

use Unicorn\UI\Base\HtmlElement;
use Unicorn\UI\Base\Widget;

interface FormRenderer
{
	/**
	 * @return array<Widget $element, Widget $container>
	 */
	public function renderForm(HtmlElement $form);
	
	public function renderInput(HtmlElement $input, Widget $errors, string $label = null): Widget;
	
	public function renderSubmitButton(HtmlElement $button): Widget;
}
