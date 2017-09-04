<?php

namespace Unicorn\UI\Bootstrap;

class LeadParagraph extends Paragraph
{
	function __construct($text = null)
	{
		parent::__construct($text);
		$this->addClass("lead");
	}
}
