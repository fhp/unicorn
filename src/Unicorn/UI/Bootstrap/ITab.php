<?php

namespace Unicorn\UI\Bootstrap;

use Unicorn\UI\Base\Container;

interface ITab
{
	public function getContentPane(): Container;
	
	public function getNavigationItem(): NavigationItem;
	
	public function getID(): string;
	
	public function activate(): void;
	
	public function active(): bool;
}
