<?php

namespace Unicorn\UI\Base;

class Text implements IWidget
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
}
