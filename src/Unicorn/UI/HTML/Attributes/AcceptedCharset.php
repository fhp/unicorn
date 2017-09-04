<?php

namespace Unicorn\UI\HTML\Attributes;

trait AcceptedCharset
{
	use AttributeTrait;
	
	public function AcceptCharset(): string
	{
		return $this->property("accept-charset");
	}
	
	public function hasAcceptCharset(): bool
	{
		return $this->hasProperty("accept-charset");
	}
	
	public function setAcceptCharset(string $value): void
	{
		$this->setProperty("accept-charset", $value);
	}
}
