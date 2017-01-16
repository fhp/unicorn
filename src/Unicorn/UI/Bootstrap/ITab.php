<?php

namespace Unicorn\UI\Bootstrap;

use Unicorn\UI\Base\IWidgetList;
use Unicorn\UI\HTML\Link;

interface ITab
{
	public function getContentPane(): IWidgetList;
	
	public function getNavigationItem(): NavigationItem;
	
	public function getID(): string;
	
	public function activate(): void;
	
	public function active(): bool;
}
