<?php
/**
 * @package myplugin
 */

namespace sandeep\Base;

use \sandeep\Base\BaseController;

class Settings extends \sandeep\Base\BaseController {
	public function register(): void {

		add_filter( "plugin_action_links_$this->plugin", array($this, 'settings' ) );
	}

	public function settings( $links ){
		$settings = '<a href="admin.php?page=my_plugin">Settings</a>';
		$links[] = $settings;
		return $links;

	}
}