<?php

namespace Unicorn\Forms;

use Unicorn\Forms\Conditions\AddSlashes;
use Unicorn\Forms\Conditions\InputNotEmpty;

class SearchForm extends Form
{
	/** @var FormInput */
	private $searchField;
	
	public function __construct($id, $action)
	{
		parent::__construct($id, $action, "get");
	}
	
	public function checkAccess(): bool
	{
		return true;
	}
	
	public function title(): string
	{
		return "Zoeken";
	}
	
	public function form(): void
	{
		$this->disableRedirect();
		
		$this->searchField = new TextInput("search", "Zoeken");
		$this->addInput($this->searchField);
		$this->ensure(new InputNotEmpty($this->searchField));
		$this->ensure(new AddSlashes($this->searchField)); // TODO: hiervan een ander type maken. "converters" ofzo? Of in TextInput stoppen? Datumveld met unixtime als output is een goede testcase.
		
		$this->addInput(new SubmitButton("submit", "Zoek"));
	}
	
	public function handle(): void
	{
		
	}
	
	public function querty(): string
	{
		return $this->searchField->value();
	}
}
