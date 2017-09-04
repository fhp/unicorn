<?php

namespace Unicorn\UI\HTML\Attributes;

trait Manifest
{
	use AttributeTrait;
	
	public function manifest(): string
	{
		return $this->property("manifest");
	}
	
	public function hasManifest(): bool
	{
		return $this->hasProperty("manifest");
	}
	
	public function setManifest(string $value): void
	{
		$this->setProperty("manifest", $value);
	}
}
