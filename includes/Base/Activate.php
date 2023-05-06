<?php
/**
 * @package myplugin
 */

namespace sandeep\Base;

class Activate{
	public static function activate(): void {
		flush_rewrite_rules();
	}
}