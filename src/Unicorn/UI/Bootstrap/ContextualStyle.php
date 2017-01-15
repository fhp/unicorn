<?php

namespace Unicorn\UI\Bootstrap;

class ContextualStyle
{
	private $name;
	
	protected function __construct($name)
	{
		$this->name = $name;
	}
	
	public function __toString(): string
	{
		return $this->name;
	}
	
	public static function default(): ContextualStyle
	{
		return new self("default");
	}
	
	public static function primary(): ContextualStyle
	{
		return new self("primary");
	}
	
	public static function success(): ContextualStyle
	{
		return new self("success");
	}
	
	public static function info(): ContextualStyle
	{
		return new self("info");
	}
	
	public static function warning(): ContextualStyle
	{
		return new self("warning");
	}
	
	public static function danger(): ContextualStyle
	{
		return new self("danger");
	}
	
	public static function muted(): ContextualStyle
	{
		return new self("muted");
	}
	
	public static function active(): ContextualStyle
	{
		return new self("active");
	}
}
