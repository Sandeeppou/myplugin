<?php
/**
 * @package myplugin
 */

namespace sandeep\Pages;

use sandeep\Base\BaseController;
use sandeep\Api\SettingsApi;


class Admin extends BaseController
{
	public SettingsApi $settings;

	public array $pages;
	public array $subpages;
	/**
	 * __construct()
	 */
	public function register(): void {

		$this->settings = new SettingsApi();

		$this->setPages();

		$this->setSubpages();

		$this->settings->addPages( $this->pages )->withSubPage('Dashboard')->addSubPages($this->subpages ) ->register();
	}

	public function setPages(): void {
		$this->pages = array(
			array(
				'page_title' => 'My Plugin',
				'menu_title' => 'Sandeep',
				'capability' => 'manage_options',
				'menu_slug' => 'my_plugin',
				'callback' => function() {return require_once( "$this->plugin_path/templates/admin.php"); },
				'icon_url' => 'dashicons-store',
				'position' => 110
			)
		);
	}

	public function setSubpages(): void {

		$this->subpages = array(
			array(
				'parent_slug' => 'my_plugin',
				'page_title' => 'Custom Post Types',
				'menu_title' => 'CPT',
				'capability' => 'manage_options',
				'menu_slug' => 'myplugin_cpt',
				'callback' => function() {echo '<h1>Custom Post Type Manager</h1>';},
			),
			array(
				'parent_slug' => 'my_plugin',
				'page_title' => 'Custom Taxonomies',
				'menu_title' => 'Taxonomies',
				'capability' => 'manage_options',
				'menu_slug' => 'myplugin_taxonomies',
				'callback' => function() {echo '<h1>Taxonomies Manager</h1>';},
			),
			array(
				'parent_slug' => 'my_plugin',
				'page_title' => 'Custom Widget',
				'menu_title' => 'Widgets',
				'capability' => 'manage_options',
				'menu_slug' => 'myplugin_widgets',
				'callback' => function() {echo '<h1>Widgets Manager</h1>';},
			)

		);
	}
}