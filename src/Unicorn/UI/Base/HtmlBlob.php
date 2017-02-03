<?php

namespace Unicorn\UI\Base;

class HtmlBlob implements Widget
{
	private $html;
	
	public function __construct(string $html)
	{
		$this->html = $html;
	}
	
	public function render(): string
	{
		return $this->html;
	}
	
	public function isActive(): bool
	{
		return false;
	}
}
