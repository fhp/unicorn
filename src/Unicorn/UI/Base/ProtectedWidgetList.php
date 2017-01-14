<?php

namespace Unicorn\UI\Base;

abstract class ProtectedWidgetList extends Widget
{
	use ChildrenTrait {
		renderChildren as public render;
	}
}
