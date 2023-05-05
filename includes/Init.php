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

//if( !class_exists( 'myPlugin' ) ){
//
//class myPlugin {
//
//public $plugin;
//
//function __construct(){
//$this->plugin = plugin_basename(__FILE__);
//}
//
//function register(): void {
//add_action( 'admin_enqueue_scripts', array( $this, 'enqueue' ) );
//
//add_action('admin_menu', array( $this, 'add_admin_pages' ) );
//
//add_filter("plugin_action_links_$this->plugin", array( $this, 'setting_links' ));
//}
//
//public function setting_links( &$links ){
////add custom settings link
//
//
//}
//
//public function add_admin_pages(): void {
//add_menu_page( 'My Plugin', 'Sandeep', 'manage_options', 'my_plugin',
//array( $this, 'admin_index' ), 'dashicons-store', 110 );
//}
//
//
//public function admin_index(): void {
////require template
//require_once plugin_dir_path( __FILE__ ) . 'templates/admin.php';
//}
//
//protected function create_post_type(): void {
//add_action( 'init', array( $this, 'custom_post_type' ) );
//}
//
//function custom_post_type(): void {
//register_post_type( 'testimonial', [ 'public' => true, 'label' => 'Testimonials' ] );
//}
//

//
//function activate(): void {
////			require_once plugin_dir_path( __FILE__ ) . 'includes/activate.php';
//activate::activate();
//}
//}
//
//$myPlugin = new myPlugin();
//$myPlugin->register();
//
////activation
//register_activation_hook( __FILE__, array($myPlugin, 'activate' ) );
//
//
////deactivation
////	require_once plugin_dir_path( __FILE__ ) . 'includes/deactivate.php';
//register_deactivation_hook( __FILE__, array( 'deactivate', 'deactivate' ) );
//
//}