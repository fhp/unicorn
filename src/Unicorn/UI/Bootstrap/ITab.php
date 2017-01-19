<?php

namespace Unicorn\UI\Bootstrap;

use Unicorn\UI\Base\Container;

interface ITab
{
	public function contentPane(): Container;
	
	public function navigationItem(): NavigationItem;
	
	public function id(): string;
	
	public function activate(): void;
	
	public function isActive(): bool;
}
