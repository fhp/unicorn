<?php

namespace Unicorn\UI\Base;

trait HtmlGlobalAttributes
{
	use HtmlBasicAttributes;
	
	public function data(string $name): string
	{
		return $this->property("data-" . $name);
	}
	
	public function hasData(string $name): bool
	{
		return $this->hasProperty("data-" . $name);
	}
	
	public function setData(string $name, string $value): void
	{
		$this->setProperty("data-" . $name, $value);
	}
	
	public function removeData(string $name): void
	{
		$this->removeProperty("data-" . $name);
	}
	
	public function style(): string
	{
		return $this->property("style");
	}
	
	public function hasStyle(): bool
	{
		return $this->hasProperty("style");
	}
	
	public function setStyle(string $value): void
	{
		$this->setProperty("style", $value);
	}
	
	public function addStyle(string $value): void
	{
		if($this->hasStyle()) {
			$style = $this->style() . $value;
		} else {
			$style = $value;
		}
		$this->setProperty("style", $style);
	}
	
	public function removeStyle(): void
	{
		$this->removeProperty("style");
	}
	
	public function role(): string
	{
		return $this->property("role");
	}
	
	public function hasRole(): bool
	{
		return $this->hasProperty("role");
	}
	
	public function setRole(string $role): void
	{
		$this->setProperty("role", $role);
	}
	
	public function removeRole(): void
	{
		$this->removeProperty("role");
	}
	
	public function aria(string $name): string
	{
		return $this->property("aria-" . $name);
	}
	
	public function hasAria(string $name): bool
	{
		return $this->hasProperty("aria-" . $name);
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
	
	public function tabindex(): int
	{
		return $this->property("tabindex");
	}
	
	public function hasTabindex(): bool
	{
		return $this->hasProperty("tabindex");
	}
	
	public function setTabindex(int $tabindex): void
	{
		$this->setProperty("tabindex", $tabindex);
	}
	
	public function removeTabindex(): void
	{
		$this->removeProperty("tabindex");
	}
	
	public function title(): string
	{
		return $this->property("title");
	}
	
	public function hasTitle(): bool
	{
		return $this->hasProperty("title");
	}
	
	public function setTitle(string $title): void
	{
		$this->setProperty("title", $title);
	}
	
	public function removeTitle(): void
	{
		$this->removeProperty("title");
	}
	
	public function language(): string
	{
		return $this->property("language");
	}
	
	public function hasLanguage(): bool
	{
		return $this->hasProperty("language");
	}
	
	public function setLanguage(string $language): void
	{
		$this->setProperty("language", $language);
	}
	
	public function removeLanguage(): void
	{
		$this->removeProperty("language");
	}
	
	public function textDirection(): string
	{
		return $this->property("dir");
	}
	
	public function hasTextDirection(): bool
	{
		return $this->hasProperty("dir");
	}
	
	public function setTextDirection(string $textDirection): void
	{
		$this->setProperty("dir", $textDirection);
	}
	
	public function removeTextDirection(): void
	{
		$this->removeProperty("dir");
	}
	
	public function accesskey(): string
	{
		return $this->property("accesskey");
	}
	
	public function hasAccesskey(): bool
	{
		return $this->hasProperty("accesskey");
	}
	
	public function setAccesskey(string $accesskey): void
	{
		$this->setProperty("accesskey", $accesskey);
	}
	
	public function removeAccesskey(): void
	{
		$this->removeProperty("accesskey");
	}
	
	public function javascriptEvent(string $event): string
	{
		return $this->property("on" . $event);
	}
	
	public function hasJavascriptEvent(string $event): bool
	{
		return $this->hasProperty("on" . $event);
	}
	
	public function setJavascriptEvent(string $event, string $javascript): void
	{
		$this->setProperty("on" . $event, $javascript);
	}
	
	public function removeJavascriptEvent(string $event): void
	{
		$this->removeProperty("on" . $event);
	}
}
