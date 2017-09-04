<?php

namespace Unicorn\UI\Base;

class HtmlElementWidget extends ListWidget
{
	use HtmlTag;
	
	public function __construct(string $tag)
	{
		parent::__construct();
		
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
