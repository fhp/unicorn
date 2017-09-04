<?php

namespace Unicorn\UI\HTML\Attributes;

trait AttributeTrait
{
	abstract function property(string $name): string;
	abstract function hasProperty(string $name): bool;
	abstract function setProperty(string $name, string $value): void;
	abstract function removeProperty(string $name): void;
}
