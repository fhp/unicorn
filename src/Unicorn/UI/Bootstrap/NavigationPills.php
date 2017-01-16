<?php
namespace Unicorn\UI\Bootstrap;

class NavigationPills extends Navigation
{
	function __construct()
	{
		parent::__construct();
		$this->addClass("nav-pills");
	}
}