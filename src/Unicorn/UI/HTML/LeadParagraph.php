<?php

namespace Unicorn\UI\HTML;

class LeadParagraph extends Paragraph
{
	function __construct($text = null)
	{
		parent::__construct($text);
		$this->addClass("lead");
	}
}
