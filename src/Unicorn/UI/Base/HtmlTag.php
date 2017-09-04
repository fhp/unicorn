<?php

namespace Unicorn\UI\Base;

use Unicorn\UI\Exceptions\NoElementSetException;

trait HtmlTag
{
	use HtmlGlobalAttributes;
	
	private $tag;
	private $closeTag = true;
	
	protected function setTag($tag): void
	{
		$this->tag = $tag;
	}
	
	protected function noCloseTag(): void
	{
		$this->closeTag = false;
	}
	
	protected function renderOpenTag(): string
	{
		if($this->tag === null) {
			throw new NoElementSetException("Tag not set before calling render()");
		}
		$html = "<{$this->tag}";
		$html .= $this->renderAttributes();
		$html .= ">";
		return $html;
	}
	
	protected function renderCloseTag(): string
	{
		if($this->closeTag) {
			return "</{$this->tag}>";
		} else {
			return "";
		}
	}
}
