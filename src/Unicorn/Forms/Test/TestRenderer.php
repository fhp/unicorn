<?php

namespace Unicorn\Forms\Test;

use Unicorn\Forms\Exceptions\RenderingNotImplemented;
use Unicorn\Forms\FieldsetInput;
use Unicorn\Forms\Form;
use Unicorn\Forms\FormRenderer;
use Unicorn\Forms\HiddenInput;
use Unicorn\Forms\Input;
use Unicorn\Forms\InputList;
use Unicorn\Forms\InputSet;
use Unicorn\Forms\SingleInput;
use Unicorn\UI\Base\Container;
use Unicorn\UI\HTML\Attributes\Placeholder;
use Unicorn\UI\HTML\Button;
use Unicorn\UI\HTML\Fieldset;
use Unicorn\UI\HTML\Input as InputTag;
use Unicorn\UI\HTML\Label;
use Unicorn\UI\HTML\Div;
use Unicorn\UI\HTML\Legend;

class TestRenderer extends FormRenderer
{
	public function render(): string
	{
		return $this->renderInput($this->form())->render();
	}
	
	public function renderInput(Input $input)
	{
		if($input instanceof Form) {
			return $this->renderForm($input);
		}
		if($input instanceof FieldsetInput) {
			return $this->renderFieldset($input);
		}
		if($input instanceof InputList) {
			return $this->renderList($input);
		}
		if($input instanceof InputSet) {
			return $this->renderSet($input);
		}
		if($input instanceof HiddenInput) {
			return $this->renderHidden($input);
		}
		if($input instanceof SingleInput) {
			return $this->renderSingleInput($input);
		}
		throw new RenderingNotImplemented("No render method implemented for " . get_class($input));
	}
	
	protected function renderForm(Form $form)
	{
		$tag = $form->widget();
		
		foreach($form->inputs() as $input) {
			$tag->addChild($this->renderInput($input));
		}
		
		$button = new Button("submit", $form->submitText());
		$button->setType("submit");
		$tag->addChild($button);
		
		return $tag;
	}
	
	protected function renderList(InputList $list)
	{
		$tag = new Container();
		
		foreach($list->inputs() as $input) {
			$tag->addChild($this->renderInput($input));
		}
		
		return $tag;
	}
	
	private function renderSingleInput(SingleInput $input)
	{
		$inputWidget = $input->widget();
		
		$inputWidget->addClass("form-control");
		
		$div = new Div("form-group");
		
		$label = $input->label();
		if($label !== null) {
			$labelElement = new Label($inputWidget->id(), $label);
			$labelElement->addClass("form-control-label");
			$div->addChild($labelElement);
		}
		
		$div->addChild($inputWidget);
		if($input->hasErrors()) {
			$inputWidget->addClass("is-invalid");
			
			$errors = new Container();
			foreach($input->errors() as $error) {
				$errorDiv = new Div("invalid-feedback");
				$errorDiv->addText($error);
				$errors->addChild($errorDiv);
			}
			$div->addChild($errors);
		}
		
		return $div;
	}
	
	private function renderHidden(HiddenInput $input)
	{
		return $input->widget();
	}
	
	private function renderFieldset(FieldsetInput $list)
	{
		$tag = new Fieldset();
		$tag->addChild(new Legend($list->label()));
		
		foreach($list->inputs() as $input) {
			$tag->addChild($this->renderInput($input));
		}
		
		return $tag;
	}
	
	private function renderSet(InputSet $input)
	{
		$div = new Div("form-group");
		$row = new Div("row");
		
		$firstInputID = null;
		foreach($input->inputs() as $childInput) {
			if($childInput instanceof SingleInput) {
				$firstInputID = $childInput->widget()->id();
			} else {
				throw new RenderingNotImplemented("Invalid structure: cannot nest " . get_class($childInput) . " in InputSets");
			}
			
		}
		
		$label = $input->label();
		if($label !== null) {
			$labelElement = new Label($firstInputID, $label);
			$labelElement->addClass("form-control-label");
			$div->addChild($labelElement);
		}
		
		foreach($input->inputs() as $childInput) {
			if($childInput instanceof SingleInput) {
				$inputWidget = $childInput->widget();
				$inputWidget->addClass("form-control");
				if($childInput->label() !== null && $inputWidget instanceof InputTag) {
					$inputWidget->setPlaceholder($childInput->label());
				}
				
				$col = new Div("col");
				$col->addChild($inputWidget);
				$row->addChild($col);
			} else {
				throw new RenderingNotImplemented("Invalid structure: cannot nest " . get_class($childInput) . " in InputSets");
			}
		}
		
		$div->addChild($row);
		return $div;
	}
}
