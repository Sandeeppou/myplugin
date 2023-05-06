<?php
/**
 * @package myplugin
 */
namespace sandeep\Api;

class SettingsApi
{
	public array $admin_pages;

	public array $admin_subpages;

	public function register(): void {
		if (! empty($this->admin_pages))
		{
			add_action( 'admin_menu', array( $this, 'add_admin_menu') );
		}
	}

	public function addPages(array $pages){

		$this->admin_pages = $pages;

		return $this;
	}

	/**
	 * @param string|null $title
	 *
	 * @return $this
	 */
	public  function  withSubPage( string $title = null ) {
		if ( empty($this->admin_pages)){
			return $this;
		}

		$admin_page = $this->admin_pages[0];

		$subpage = array(
			array(
				'parent_slug' => $admin_page['menu_slug'],
				'page_title' => $admin_page['page_title'],
				'menu_title' => ($title) ? $title: $admin_page['menu_title'],
				'capability' => $admin_page['capability'],
				'menu_slug' => $admin_page['menu_slug'],
				'callback' => $admin_page['callback']
			)
		);

		$this->admin_subpages = $subpage;

		return $this;

	}
	public function addSubPages(array $pages){
		$this->admin_subpages = array_merge($this->admin_subpages, $pages);
		return $this;
	}

	public function add_admin_menu(): void {
		foreach ($this->admin_pages as $page){
			add_menu_page( $page['page_title'], $page['menu_title'], $page['capability'], $page['menu_slug'],
			$page['callback'], $page['icon_url'], $page['position'] );
		}

		foreach ($this->admin_subpages as $page){
			add_submenu_page( $page['parent_slug'], $page['page_title'], $page['menu_title'], $page['capability'],
				$page['menu_slug'], $page['callback'] );
		}
	}
}