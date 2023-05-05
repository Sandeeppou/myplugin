<?php
/**
 * @package myplugin
 */

/*
Plugin Name: My  Plugin
Plugin URI: http://sandeep.com/plugin
Description: This is my first time creating custom plugin.
Version: 1.0.0
Author: Sandeep Poudel
Author URI: http://sandeep.com
License: GPLv2 or later
Text Domain: my-plugin
*/

/*
This a free plugin thus you can redistribute it and/or modify it under the
terms of the GNU General Public License as published by the Free Software
Foundation; either version 2 of the License, or (at your option) any later
version.

This program is distributed in the hope that it will be useful, but without
ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS
FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.

You should have received a copy of the GNU General Public License along with
this program; if not, write to the Free Software Foundation, Inc, 51 Franklin
Street, Fifth Floor, Boston, MA 02110-1301, USA.

Copyright 2005-2015 Automatic, Inc.
*/

use sandeep\Base\Activate;
use sandeep\Base\Deactivate;


defined ( 'ABSPATH' ) or die('Hey, you cannot access this file.');

//Require once the Composer Autoload
if( file_exists( dirname(__FILE__). '/vendor/autoload.php')){
	require_once dirname( __FILE__) . '/vendor/autoload.php';
}

 //Define CONSTANTS
define( 'PLUGIN_PATH', plugin_dir_path(__FILE__));
define( 'PLUGIN_URL', plugin_dir_url(__FILE__));
define( 'PLUGIN', plugin_basename(__FILE__));

/**
 * This code that runs during plugin activation.
*/
function activate_myplugin(): void {
	Activate::activate();
}

/**
 * This code that runs during plugin deactivation.
 */
function deactivate_myplugin(): void {
	Deactivate::deactivate();
}


register_activation_hook( __FILE__, 'activate_myplugin');;
register_deactivation_hook( __FILE__, 'deactivate_myplugin');;

/**
 * Initialize all the core classes of the plugin
 */

if ( class_exists( 'sandeep\Init' )) {
	sandeep\init::register_services();
}
