<?php

namespace Unicorn\UI\Base;

class HtmlElement extends ProtectedHtmlElement
{
	public function noCloseTag(): void
	{
		parent::noCloseTag();
	}
	
	public function hasClass(string $class): bool
	{
		return parent::hasClass($class);
	}
	
	public function addClass(string $class): void
	{
		parent::addClass($class);
	}
	
	public function removeClass(string $class): void
	{
		parent::removeClass($class);
	}
	
	public function getProperty(string $name): ?string
	{
		return parent::getProperty($name);
	}
	
	public function setProperty(string $name, string $value): void
	{
		parent::setProperty($name, $value);
	}
	
	public function removeProperty(string $name): void
	{
		parent::removeProperty($name);
	}
	
	public function getID(): ?string
	{
		return parent::getID();
	}
	
	public function setID(string $id): void
	{
		parent::setID($id);
	}
	
	public function removeID(): void
	{
		parent::removeID();
	}
	
	public function getData(string $name): ?string
	{
		return parent::getData($name);
	}
	
	public function setData(string $name, string $value): void
	{
		parent::setData($name, $value);
	}
	
	public function removeData(string $name): void
	{
		parent::removeData($name);
	}
	
	public function getRole(): ?string
	{
		return parent::getRole();
	}
	
	public function setRole(string $role): void
	{
		parent::setRole($role);
	}
	
	public function removeRole(): void
	{
		parent::removeRole();
	}
	
	public function getAria(string $name): ?string
	{
		return parent::getAria($name);
	}
	
	public function setAria($name, $value): void
	{
		parent::setAria($name, $value);
	}
	
	public function removeAria(string $name): void
	{
		parent::removeAria($name);
	}
	
	public function addChild(Widget $child): void
	{
		parent::addChild($child);
	}
	
	public function prependChild(Widget $child): void
	{
		parent::prependChild($child);
	}
	
	public function addText(string $text): void
	{
		parent::addText($text);
	}
	
	public function prependText(string $text): void
	{
		parent::prependText($text);
	}
	
	public function removeChildren(): void
	{
		parent::removeChildren();
	}
}
