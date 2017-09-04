<?php

namespace Unicorn\UI\HTML;

use Unicorn\UI\Base\Widget;

class Comment implements Widget
{
	private $text;
	
	public function __construct(string $text)
	{
		$this->text = $text;
	}
	
	public function render(): string
	{
		return "<!-- " . htmlentities($this->text) . " -->";
	}
	
	public function isActive(): bool
	{
		return false;
	}
}
