<?php

namespace Unicorn\UI\Base;

class ChildlessHtmlElement implements Element
{
	use HtmlTag;
	
	public function __construct(string $tag)
	{
		$this->setTag($tag);
	}
	
	public function render(): string
	{
		$html = $this->renderOpenTag();
		$html .= $this->renderCloseTag();
		$html .= "";
		return $html;
	}
	
	public function isActive(): bool
	{
		return false;
	}
}
