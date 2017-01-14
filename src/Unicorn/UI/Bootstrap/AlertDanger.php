<?php

namespace Unicorn\UI\Bootstrap;

class AlertDanger extends Alert
{
	protected function alertType(): string
	{
		return "alert-danger";
	}
}
