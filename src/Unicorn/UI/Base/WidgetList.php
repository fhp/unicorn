<?php

namespace Unicorn\UI\Base;

class WidgetList implements IWidgetList
{
	use ChildrenTrait {
		renderChildren as public render;
	}
}
