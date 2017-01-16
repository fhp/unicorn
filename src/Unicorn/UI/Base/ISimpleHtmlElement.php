<?php

namespace Unicorn\UI\Base;

interface ISimpleHtmlElement
{
	public function getID(): ?string;
	public function setID(string $id): void;
	public function removeID(): void;
	
	public function hasClass(string $class): bool;
	public function addClass(string $class): void;
	public function removeClass(string $class): void;
}
