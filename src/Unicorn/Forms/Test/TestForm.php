<?php

namespace Unicorn\Forms\Test;

use Unicorn\Forms\Form;
use Unicorn\Forms\TextInput;

class TestForm extends Form
{
	/** @var TextInput */
	private $appel;
	
	/** @var NAWInput */
	private $nawFactuur;

	/** @var NAWInput */
	private $nawBezorg;
	
	/** @var DatumInput */
	private $bezorgDatum;
	
	function __construct($name)
	{
		parent::__construct($name);
	}
	
	public function checkAccess(): bool
	{
		return true;
	}
	
	public function title(): string
	{
		return "Test form";
	}
	
	public function buildForm(): void
	{
		$this->appel = new TextInput($this, "appel", "Appel");
		$this->appel->required();
		
		$this->nawFactuur = new NAWInput($this, "factuur", "Factuurgegevens");
		$this->nawBezorg = new NAWInput($this, "bezorg", "Bezorggegevens");
		$this->bezorgDatum = new DatumInput($this, "datum", "Bezorgdatum");
		
		$this->addInput($this->appel);
		$this->addInput($this->nawFactuur);
		$this->addInput($this->nawBezorg);
		$this->addInput($this->bezorgDatum);
	}
	
	public function handle(): void
	{
//		var_dump("FORM HANDLED", $_POST, $this->value(), $this->appel->value(), $this->nawFactuur->value());
//		die();
	}
}
