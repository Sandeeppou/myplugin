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

This program is distributed in the hope that it wiil be useful, but without
ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS
FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.

You should have received a copy of the GNU General Public License along with
this program; if not, write to the Free Software Foundation, Inc, 51 Franklin
Street, Fifth Floor, Boston, MA 02110-1301, USA.

Copyright 2005-2015 Automatic, Inc.
*/

// if( ! defined( 'ABSPATH' ) ){
//     die;
// }

// defined ( 'ABSPATH' ) of die('Hey, you cannot access this file.');

if( !function_exists( 'add_action' ) ){
    echo 'Hey, you cannot access this file';
    exit;
}

class myPlugin
{
	//Public


	//Protected

	//Private

    function __construct() {
        add_action('init', array($this, 'custom_post_type' ));
    }

	function register(): void {
		add_action('admin_enqueue_scripts', array($this, 'enqueue'));
	}

    function activate(): void {
        // generate a custom post type.
	    $this->custom_post_type();
        // flush rewrite rules
	    flush_rewrite_rules();

    }

    function deactivate(){
        // flush rewrite rules

    }

    function custom_post_type(): void
    {
        register_post_type('testimonial', ['public' => true, 'label' => 'Testimonials']);
    }
	function enqueue(): void {
		// enqueue all our scripts
		wp_enqueue_style('mypluginstyle', plugins_url( '/assets/mystyle.css', __FILE__ ) );
		wp_enqueue_script('mypluginscript', plugins_url( '/assets/myscript.js', __FILE__ ) );
	}
}


if( class_exists( 'myPlugin' ) ){
    $myPlugin = new myPlugin();
	$myPlugin->register();
}

//activation
register_activation_hook( __FILE__, array( $myPlugin, 'activate' ) );


//deactivation
register_deactivation_hook( __FILE__, array( $myPlugin, 'deactivate' ) );

