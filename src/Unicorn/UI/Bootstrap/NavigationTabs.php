<?php
namespace Unicorn\UI\Bootstrap;

class NavigationTabs extends Navigation
{
	function __construct()
	{
		parent::__construct();
		$this->addClass("nav-tabs");
		$this->element()->setRole("tablist");
	}
}