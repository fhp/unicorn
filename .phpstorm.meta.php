<?php

// Fix for unknown iterable type in PHPStorm

namespace Unicorn\UI\Bootstrap {
	interface iterable extends \Iterator {}
}
namespace Unicorn\UI\HTML {
	interface iterable extends \Iterator {}
}
