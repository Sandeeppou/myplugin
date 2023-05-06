<?php
/**
 * @package myplugin
 */

namespace sandeep\Base;

class deactivate{
	public static function deactivate(): void {
		flush_rewrite_rules();
	}
}