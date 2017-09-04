<?php

namespace Unicorn\UI\HTML\Attributes;

trait Download
{
	use AttributeTrait;
	
	public function download(): string
	{
		return $this->property("download");
	}
	
	public function hasDownload(): bool
	{
		return $this->hasProperty("download");
	}
	
	public function setDownload(string $value): void
	{
		$this->setProperty("download", $value);
	}
}
