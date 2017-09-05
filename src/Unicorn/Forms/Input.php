<?php

namespace Unicorn\Forms;

use Unicorn\Forms\Conditions\InputCondition;

abstract class Input
{
	private $parent;
	private $name;
	private $label;
	
	/** @var InputCondition[] */
	private $conditions = array();
	
	/** @var string[] */
	private $errors = array();
	
	function __construct(Input $parent, string $name, string $label = null)
	{
		$this->parent = $parent;
		$this->name = $name;
		$this->label = $label;
	}
	
	public function form(): Form
	{
		return $this->parent->form();
	}
	
	public function name(): string
	{
		return $this->name;
	}
	
	public function label(): ?string
	{
		return $this->label;
	}
	
	public function prefix(): string
	{
		return $this->parent->prefix();
	}
	
	public function fullName(): string
	{
		return $this->prefix() . $this->name();
	}
	
	public function check(): void
	{
		foreach($this->conditions as $condition) {
			$condition->check();
		}
	}
	
	public function ensure(InputCondition $condition): void
	{
		$this->conditions[] = $condition;
	}
	
	public function error($message): void
	{
		$this->errors[] = $message;
	}
	
	public function errors(): array
	{
		return $this->errors;
	}
	
	public function hasErrors(): bool
	{
		return count($this->errors) != 0;
	}
	
	protected function isSane(): bool
	{
		return !$this->hasErrors();
	}
	
	abstract public function value();
}
