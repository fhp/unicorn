<?php

namespace Unicorn\UI\Base;

abstract class ProtectedChildlessHtmlElement extends Widget
{
	private $tag;
	private $classes = array();
	private $properties = array();
	private $closeTag = true;
	
	public function __construct(string $tag)
	{
		$this->tag = $tag;
	}
	
	protected function noCloseTag(): void
	{
		$this->closeTag = false;
	}
	
	protected function hasClass(string $class): bool
	{
		return in_array($class, $this->classes);
	}
	
	protected function addClass(string $class): void
	{
		if(!$this->hasClass($class)) {
			$this->classes[] = $class;
		}
	}
	
	protected function removeClass(string $class): void
	{
		for ($i = 0; $i < count($this->classes); $i++) {
			if($this->classes[$i] == $class) {
				unset($this->classes[$i]);
			}
		}
	}
	
	protected function getProperty(string $name): ?string
	{
		for($i = 0; $i < count($this->properties); $i++) {
			if($this->properties[$i]["name"] == $name) {
				return $this->properties[$i]["value"];
			}
		}
		return null;
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
	
	protected function getID(): ?string
	{
		return $this->getProperty("id");
	}
	
	protected function setID(string $id): void
	{
		$this->setProperty("id", $id);
	}
	
	protected function removeID(): void
	{
		$this->removeProperty("id");
	}
	
	protected function getData(string $name): ?string
	{
		return $this->getProperty("data-" . $name);
	}
	
	protected function setData(string $name, string $value): void
	{
		$this->setProperty("data-" . $name, $value);
	}
	
	protected function removeData(string $name): void
	{
		$this->removeProperty("data-" . $name);
	}
	
	protected function getRole(): ?string
	{
		return $this->getProperty("role");
	}
	
	protected function setRole(string $role): void
	{
		$this->setProperty("role", $role);
	}
	
	protected function removeRole(): void
	{
		$this->removeProperty("role");
	}
	
	protected function getAria(string $name): ?string
	{
		return $this->getProperty("aria-" . $name);
	}
	
	protected function setAria($name, $value): void
	{
		$this->setProperty("aria-" . $name, $value);
	}
	
	protected function removeAria(string $name): void
	{
		$this->removeProperty("aria-" . $name);
	}
	
	protected function renderProperties(): string
	{
		$html = "";
		if(count($this->classes) > 0) {
			$html = " class=\"" . implode(" ", $this->classes) . "\"";
		}
		foreach ($this->properties as $property) {
			$html .= " " . $property["name"] . "=\"" . $property["value"] . "\"";
		}
		return $html;
	}
	
	protected function renderOpenTag(): string
	{
		$html = "<{$this->tag}";
		$html .= $this->renderProperties();
		$html .= ">";
		return $html;
	}
	
	protected function renderCloseTag(): string
	{
		if($this->closeTag) {
			return "</{$this->tag}>";
		} else {
			return "";
		}
	}
	
	public function render(): string
	{
		$html = $this->renderOpenTag();
		$html .= $this->renderCloseTag();
		$html .= "\n";
		return $html;
	}
}
