<?php

namespace Unicorn\UI\Base;

interface Element extends Widget
{
	public function id(): string;
	public function hasID(): bool;
	public function setID(string $id): void;
	public function removeID(): void;
	
	public function hasClass(string $class): bool;
	public function addClass(string $class): void;
	public function removeClass(string $class): void;
	
	// TODO: Mogelijke candidaten
//	public function getData(string $name): ?string;
//	public function setData(string $name, string $value): void;
//	public function removeData(string $name): void;
//
//	public function getRole(): ?string;
//	public function setRole(string $role): void;
//	public function removeRole(): void;
//
//	public function getAria(string $name): ?string;
//	public function setAria($name, $value): void;
//	public function removeAria(string $name): void;
//
//	public function getTabindex(): ?int;
//	public function setTabindex(int $tabindex): void;
//	public function removeTabindex(): void;
//
//	public function getTitle(): ?string;
//	public function setTitle(string $title): void;
//	public function removeTitle(): void;
//
//	public function getLanguage(): ?string;
//	public function setLanguage(string $language): void;
//	public function removeLanguage(): void;
//
//	public function getTextDirection(): ?string;
//	public function setTextDirection(string $textDirection): void;
//	public function removeTextDirection(): void;
//
//	public function getAccesskey(): ?string;
//	public function setAccesskey(string $accesskey): void;
//	public function removeAccesskey(): void;
//
//	public function getJavascriptEvent(string $event): ?string;
//	public function setJavascriptEvent(string $event, string $javascript): void;
//	public function removeJavascriptEvent(string $event): void;
}
