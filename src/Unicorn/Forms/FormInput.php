<?php

namespace Unicorn\Forms;

use Unicorn\UI\Base\Widget;

interface FormInput extends Widget
{
	public function id(): string;
	public function value();
	public function error(string $message = null): void;
	public function updateValue($newValue): void;
}
