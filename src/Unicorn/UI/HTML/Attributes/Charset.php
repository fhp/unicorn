<?php

namespace Unicorn\UI\HTML\Attributes;

trait Charset
{
	use AttributeTrait;
	
	public function charset(): string
	{
		return $this->property("charset");
	}
	
	public function hasCharset(): bool
	{
		return $this->hasProperty("charset");
	}
	
	public function setCharset(string $value): void
	{
		$this->setProperty("charset", $value);
	}
}
