<?php

namespace Unicorn\UI\Base;

abstract class ProtectedHtmlElement extends ProtectedChildlessHtmlElement
{
	use ChildrenTrait;
	
	public function render(): string
	{
		$html = "";
		$html .= $this->renderOpenTag();
		$html .= $this->renderChildren();
		$html .= $this->renderCloseTag();
		return $html;
	}
}
