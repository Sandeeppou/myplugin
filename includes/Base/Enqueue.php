<?php
/**
 * @package myplugin
 */



namespace sandeep\Base;

use \sandeep\Base\BaseController;
/**
 *
 */
class Enqueue extends BaseController {
	public function register() {
		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue' ) );
	}
	function enqueue(): void {
		// enqueue all our scripts
		wp_enqueue_style( 'mypluginstyle', $this->plugin_url . 'assets/mystyle.css' );
		wp_enqueue_script( 'mypluginscript', $this->plugin_url . 'assets/myscript.js' );
	}
}