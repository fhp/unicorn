<?php

namespace Unicorn\UI\Bootstrap;

use Unicorn\UI\HTML\Header;

class PanelTitle extends Header
{
	function __construct($header)
	{
		parent::__construct($header, "h3");
		$this->addClass("panel-title");
	}
}
