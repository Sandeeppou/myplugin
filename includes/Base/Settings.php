<?php
/**
 * @package myplugin
 */

namespace sandeep\Base;

class Settings{
	public function register(): void {
		add_filter( "plugin_action_links_". PLUGIN, array($this, 'settings' ) );
	}

	public function settings( $links ){
		$settings = '<a href="admin.php?page=my_plugin">Settings</a>';
		$links[] = $settings;
		return $links;

	}
}