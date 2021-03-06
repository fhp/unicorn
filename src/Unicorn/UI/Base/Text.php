<?php

namespace Unicorn\UI\Base;

class Text implements Widget
{
	private $text;
	
	public function __construct(string $text)
	{
		$this->text = $text;
	}
	
	public function render(): string
	{
		return htmlentities($this->text);
	}
	
	public function isActive(): bool
	{
		return false;
	}
}
