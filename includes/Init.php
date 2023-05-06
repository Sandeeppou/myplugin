<?php
/**
 * @package myplugin
 */

namespace sandeep;

use sandeep\Pages\Admin;

final class Init{



	public static function get_services(): array {
		return [
			Pages\Admin::class,
			Base\Enqueue::class,
			Base\Settings::class
		];
	}


	public static function register_services(): void {
		foreach (self::get_services() as $class ){
			$service = self::instantiate( $class );
			if (method_exists ($service, 'register')){
				$service->register();
			}
		}

	}

	private static function instantiate( $class ){
		return new $class();
	}
}
