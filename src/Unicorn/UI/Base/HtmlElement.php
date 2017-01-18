<?php

namespace Unicorn\UI\Base;

class HtmlElement extends Container implements Element
{
	private $tag;
	private $classes = array();
	private $properties = array();
	private $closeTag = true;
	
	public function __construct(string $tag)
	{
		$this->tag = $tag;
	}
	
	public function noCloseTag(): void
	{
		$this->closeTag = false;
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
	
	public function getProperty(string $name): ?string
	{
		for($i = 0; $i < count($this->properties); $i++) {
			if($this->properties[$i]["name"] == $name) {
				return $this->properties[$i]["value"];
			}
		}
		return null;
	}
	
	public function setProperty(string $name, string $value): void
	{
		for($i = 0; $i < count($this->properties); $i++) {
			if($this->properties[$i]["name"] == $name) {
				$this->properties[$i]["value"] = $value;
				return;
			}
		}
		$this->properties[] = array("name"=>$name, "value"=>$value);
	}
	
	public function removeProperty(string $name): void
	{
		for($i = 0; $i < count($this->properties); $i++) {
			if($this->properties[$i]["name"] == $name) {
				unset($this->properties[$i]);
			}
		}
	}
	
	public function getID(): ?string
	{
		return $this->getProperty("id");
	}
	
	public function setID(string $id): void
	{
		$this->setProperty("id", $id);
	}
	
	public function removeID(): void
	{
		$this->removeProperty("id");
	}
	
	public function getData(string $name): ?string
	{
		return $this->getProperty("data-" . $name);
	}
	
	public function setData(string $name, string $value): void
	{
		$this->setProperty("data-" . $name, $value);
	}
	
	public function removeData(string $name): void
	{
		$this->removeProperty("data-" . $name);
	}
	
	public function getRole(): ?string
	{
		return $this->getProperty("role");
	}
	
	public function setRole(string $role): void
	{
		$this->setProperty("role", $role);
	}
	
	public function removeRole(): void
	{
		$this->removeProperty("role");
	}
	
	public function getAria(string $name): ?string
	{
		return $this->getProperty("aria-" . $name);
	}
	
	public function setAria($name, $value): void
	{
		$this->setProperty("aria-" . $name, $value);
	}
	
	public function removeAria(string $name): void
	{
		$this->removeProperty("aria-" . $name);
	}
	
	public function enableContentEditable(): void
	{
		$this->setProperty("contenteditable", "true");
	}
	
	public function disableContentEditable(): void
	{
		$this->setProperty("contenteditable", "false");
	}
	
	public function enableSpellcheck(): void
	{
		$this->setProperty("spellcheck", "true");
	}
	
	public function disableSpellcheck(): void
	{
		$this->setProperty("spellcheck", "false");
	}
	
	public function enableDraggable(): void
	{
		$this->setProperty("draggable", "true");
	}
	
	public function disableDraggable(): void
	{
		$this->setProperty("draggable", "false");
	}
	
	public function getTabindex(): ?int
	{
		return $this->getProperty("tabindex");
	}
	
	public function setTabindex(int $tabindex): void
	{
		$this->setProperty("tabindex", $tabindex);
	}
	
	public function removeTabindex(): void
	{
		$this->removeProperty("tabindex");
	}
	
	public function getTitle(): ?string
	{
		return $this->getProperty("title");
	}
	
	public function setTitle(string $title): void
	{
		$this->setProperty("title", $title);
	}
	
	public function removeTitle(): void
	{
		$this->removeProperty("title");
	}
	
	public function getLanguage(): ?string
	{
		return $this->getProperty("language");
	}
	
	public function setLanguage(string $language): void
	{
		$this->setProperty("language", $language);
	}
	
	public function removeLanguage(): void
	{
		$this->removeProperty("language");
	}
	
	public function getTextDirection(): ?string
	{
		return $this->getProperty("dir");
	}
	
	public function setTextDirection(string $textDirection): void
	{
		$this->setProperty("dir", $textDirection);
	}
	
	public function removeTextDirection(): void
	{
		$this->removeProperty("dir");
	}
	
	public function getAccesskey(): ?string
	{
		return $this->getProperty("accesskey");
	}
	
	public function setAccesskey(string $accesskey): void
	{
		$this->setProperty("accesskey", $accesskey);
	}
	
	public function removeAccesskey(): void
	{
		$this->removeProperty("accesskey");
	}
	
	public function getJavascriptEvent(string $event): ?string
	{
		return $this->getProperty("on" . $event);
	}
	
	public function setJavascriptEvent(string $event, string $javascript): void
	{
		$this->setProperty("on" . $event, $javascript);
	}
	
	public function removeJavascriptEvent(string $event): void
	{
		$this->removeProperty("on" . $event);
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
		$html .= parent::render();
		$html .= $this->renderCloseTag();
		$html .= "\n";
		return $html;
	}
}
