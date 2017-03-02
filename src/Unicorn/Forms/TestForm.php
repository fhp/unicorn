<?php

namespace Unicorn\Forms;

use Unicorn\Forms\Conditions\InputDiffer;
use Unicorn\Forms\Conditions\InputNotEmpty;

class TestForm extends CsrfProtectedForm
{
	/** @var TextInput */
	private $appel;
	
	/** @var TextInput */
	private $peer;
	
	public function checkAccess(): bool
	{
		return true;
	}
	
	public function title(): string
	{
		return "Test form";
	}
	
	public function form(): void
	{
		$this->appel = new TextInput("appel", "Appel");
		$this->appel->setDefaultValue("abc");
		$this->ensure(new InputNotEmpty($this->appel, "Appels zijn belangrijk."));
		$this->addInput($this->appel);
		
		$this->peer = new TextInput("peer", "Peer");
		$this->peer->setDefaultValue("123");
		$this->addInput($this->peer);
		
		$this->ensure(new InputDiffer($this->appel, $this->peer, "Appels niet met peren vergelijken."));
		
		$this->setSubmitButton(new SubmitButton("submit", "Verstuur"));
	}
	
	public function handle(): void
	{
		// DB::nieuw($this->appel->value(), $this->peer->value());
	}
}
