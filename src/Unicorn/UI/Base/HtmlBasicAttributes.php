<?php

namespace Unicorn\UI\Base;

use Unicorn\UI\Exceptions\UnsetPropertyException;

trait HtmlBasicAttributes
{
	private $properties = array();
	private $classes = array();
	
	protected function property(string $name): string
	{
		foreach($this->properties as $property) {
			if($property["name"] == $name) {
				return $property["value"];
			}
		}
		throw new UnsetPropertyException($name);
	}
	
	protected function hasProperty(string $name): bool
	{
		foreach($this->properties as $property) {
			if($property["name"] == $name) {
				return true;
			}
		}
		return false;
	}
	
	protected function setProperty(string $name, string $value): void
	{
		for($i = 0; $i < count($this->properties); $i++) {
			if($this->properties[$i]["name"] == $name) {
				$this->properties[$i]["value"] = $value;
				return;
			}
		}
		$this->properties[] = array("name"=>$name, "value"=>$value);
	}
	
	protected function removeProperty(string $name): void
	{
		for($i = 0; $i < count($this->properties); $i++) {
			if($this->properties[$i]["name"] == $name) {
				unset($this->properties[$i]);
			}
		}
	}
	
	public function id(): string
	{
		return $this->property("id");
	}
	
	public function hasID(): bool
	{
		return $this->hasProperty("id");
	}
	
	public function setID(string $id): void
	{
		$this->setProperty("id", $id);
	}
	
	public function removeID(): void
	{
		$this->removeProperty("id");
	}
	
	public function hasClass(string $class): bool
	{
		return in_array($class, $this->classes);
	}
	
	public function addClass(string $class): void
	{
		if(!$this->hasClass($class)) {
			$this->classes[] = $class;
		}
	}
	
	public function removeClass(string $class): void
	{
		for ($i = 0; $i < count($this->classes); $i++) {
			if($this->classes[$i] == $class) {
				unset($this->classes[$i]);
			}
		}
	}
	
	public function removeClasses(): void
	{
		$this->classes = array();
	}
	
	private function renderClasses(): string
	{
		if(count($this->classes) > 0) {
			return " class=\"" . implode(" ", $this->classes) . "\"";
		}
		return "";
	}
	
	protected function renderAttributes(): string
	{
		$html = "";
		$html .= $this->renderClasses();
		foreach ($this->properties as $property) {
			$html .= " " . $property["name"] . "=\"" . $property["value"] . "\"";
		}
		return $html;
	}
}
