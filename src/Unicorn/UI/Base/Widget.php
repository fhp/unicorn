<?php

namespace Unicorn\UI\Base;

interface Widget
{
	public function render(): string;
	public function isActive(): bool;
}
