<?php
namespace Unicorn\Forms;

use Unicorn\Forms\Conditions\InputEquals;

abstract class CsrfProtectedForm extends Form
{
	protected $csrfFieldName = "_CSRFTOKEN";
	private $csrfField;
	
	public function __construct($id, $action, $method = "POST", $encoding = "multipart/form-data", $charset = "UTF-8")
	{
		$this->csrfField = new HiddenInput($this->csrfFieldName, "RANDOMCODE");
		$this->addInput($this->csrfField);
		$this->ensure(new InputEquals($this->csrfField, "RANDOMCODE"));
		
		parent::__construct($id, $action, $method, $encoding, $charset);
	}
}
