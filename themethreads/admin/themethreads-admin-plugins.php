<?php
/**
* ThemeThreads Themes Theme Framework
* The dashbaord class
*/

if( !defined( 'ABSPATH' ) )
	exit; // Exit if accessed directly

class ThemeThreads_Admin_Plugins extends ThemeThreads_Admin_Page {

	/**
	 * [__construct description]
	 * @method __construct
	 */
	public function __construct() {

		$this->id = 'themethreads-plugins';
		$this->page_title = esc_html__( 'Install ThemeThreads Plugins', 'volley' );
		$this->menu_title = esc_html__( 'Install Plugins', 'volley' );
		$this->parent = 'themethreads';

		parent::__construct();
	}

	/**
	 * [display description]
	 * @method display
	 * @return [type]  [description]
	 */
	public function display() {
		include_once( get_template_directory() . '/themethreads/admin/views/themethreads-plugins.php' );
	}

	/**
	 * [save description]
	 * @method save
	 * @return [type] [description]
	 */
	public function save() {

	}
}
new ThemeThreads_Admin_Plugins;
