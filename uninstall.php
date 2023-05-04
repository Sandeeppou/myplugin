<?php

/**
 * Trigger this file on Plugin uninstall
 * @package myplugin
 */
if ( ! defined('WP_UNINSTALL_PLUGIN')){
	die;
}

//clear Database stored data
$testimonials = get_posts(array('post_type' => 'testimonial', 'numberposts' => -1));

foreach ( $testimonials as $testimonial ){
	wp_delete_post( $testimonial->ID, true );
}

//access the database bia SQL
global $wpdb;
$wpdb->query("DELETE FROM wp_posts WHERE post_type = 'testimonial'");
$wpdb->query("DELETE FROM wp_postmeta WHERE post_id NOT IN (SELECT id FROM wp_posts)");
$wpdb->query("DELETE FROM wp_term_relationships WHERE object_id NOT IN (SELECT id FROM wp_posts)");