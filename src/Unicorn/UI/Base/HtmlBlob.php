<?php

namespace Unicorn\UI\Base;

class HtmlBlob implements IWidget
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
}
