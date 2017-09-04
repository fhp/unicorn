<?php

namespace Unicorn\UI\Base;

class HtmlElement extends Container implements Element
{
	use HtmlTag;
	
	public function __construct(string $tag)
	{
		$this->setTag($tag);
	}
	
	public function render(): string
	{
		$html = $this->renderOpenTag();
		$html .= parent::render();
		$html .= $this->renderCloseTag();
		return $html;
	}
}
