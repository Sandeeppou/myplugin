<?php
/**
 * @package myplugin
 */

namespace sandeep\Pages;

use sandeep\Api\SettingsApi;
use sandeep\Base\BaseController;
use sandeep\Api\Callbacks\AdminCallbacks;


class Admin extends BaseController
{
	public SettingsApi $settings;

	public $callbacks;

	public array $pages;
	public array $subpages;
	/**
	 * __construct()
	 */
	public function register(): void {

		$this->settings = new SettingsApi();

		$this->callbacks = new AdminCallbacks();

		$this->setPages();

		$this->setSubpages();

		$this->setSettings();
		$this->setSections();
		$this->setFields();

		$this->settings->addPages( $this->pages )->withSubPage('Dashboard')->addSubPages($this->subpages ) ->register();
	}

	public function setPages(): void {
		$this->pages = array(
			array(
				'page_title' => 'My Plugin',
				'menu_title' => 'Sandeep',
				'capability' => 'manage_options',
				'menu_slug' => 'my_plugin',
				'callback' => array( $this->callbacks, 'adminDashboard' ),
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
				'callback' => array( $this->callbacks, 'adminCpt' )
			),
			array(
				'parent_slug' => 'my_plugin',
				'page_title' => 'Custom Taxonomies',
				'menu_title' => 'Taxonomies',
				'capability' => 'manage_options',
				'menu_slug' => 'myplugin_taxonomies',
				'callback' => array( $this->callbacks, 'adminTaxonomy' )
			),
			array(
				'parent_slug' => 'my_plugin',
				'page_title' => 'Custom Widget',
				'menu_title' => 'Widgets',
				'capability' => 'manage_options',
				'menu_slug' => 'myplugin_widgets',
				'callback' => array( $this->callbacks, 'adminWidget')
			)

		);
	}

	public function setSettings(): void {
		$args = array(
			array(
				'option_group' => 'myplugin_options_group',
				'option_name' => 'text_example',
				'callback' => array($this->callbacks, 'mypluginOptionsGroup')
			)
		);

		$this->settings->setSettings($args);
	}
	public function setSections(): void {
		$args = array(
			array(
				'id' => 'myplugin_admin_index',
				'title' => 'Settings',
				'callback' => array($this->callbacks, 'mypluginAdminSection'),
				'page' => 'my_plugin'
			)
		);

		$this->settings->setSections($args);
	}
	public function setFields(): void {
		$args = array(
			array(
				'id' => 'text_example',
				'title' => 'Text Example',
				'callback' => array($this->callbacks, 'mypluginTextExample'),
				'page' => 'my_plugin',
				'section'=> 'myplugin_admin_index',
				'args' => array(
					'label_for' => 'text_example',
					'class' => 'example-class'
				)
			)
		);

		$this->settings->setFields($args);
	}
}