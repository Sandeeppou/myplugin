<?php
/**
 * @package myplugin
 */
namespace sandeep\Base;

/**
 * @property string $plugin_url
 * @property string $plugin
 */
class BaseController{

	public string $plugin_path;

	public function __construct() {
		$this->plugin_path = plugin_dir_path( dirname( __FILE__, 2 ) );
		$this->plugin_url = plugin_dir_url( dirname( __FILE__, 2 ) );
		$this->plugin = plugin_basename( dirname( __FILE__, 3 ) ) . '/myplugin.php';

	}
}

