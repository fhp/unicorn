<?php

namespace Unicorn\UI\HTML\Attributes;

trait Headers
{
	use AttributeTrait;
	
	public function headers(): string
	{
		return $this->property("headers");
	}
	
	public function hasHeaders(): bool
	{
		return $this->hasProperty("headers");
	}
	
	public function setHeaders(string $value): void
	{
		$this->setProperty("headers", $value);
	}
}
