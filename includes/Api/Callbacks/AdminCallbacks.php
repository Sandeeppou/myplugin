<?php
/**
 * @package myplugin
 */
namespace sandeep\Api\Callbacks;

use sandeep\Base\BaseController;

class AdminCallbacks extends BaseController {

	public function adminDashboard(){
		return require_once( "$this->plugin_path/templates/admin.php");
	}
	public function adminCpt(){
		return require_once( "$this->plugin_path/templates/cpt.php");
	}
	public function adminTaxonomy(){
		return require_once( "$this->plugin_path/templates/taxonomy.php");
	}
	public function adminWidget(){
		return require_once( "$this->plugin_path/templates/widget.php");
	}

	public function mypluginOptionsGroup( $input )
	{
		return $input;
	}

	public function mypluginAdminSection(){
		echo 'Check this  beautiful section';
	}
	public function mypluginTextExample()
	{
		$value = esc_attr( get_option('text_example'));
		echo '<input type="text" class="regular-text" name="text_example" value="'. $value.'" placeholder= "Write what you want to..">';
	}

}
