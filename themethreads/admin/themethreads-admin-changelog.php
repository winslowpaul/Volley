<?php
/**
* ThemeThreads Themes Theme Framework
* The ThemeThreads_Changelog class
*/

if( !defined( 'ABSPATH' ) )
	exit; // Exit if accessed directly

class ThemeThreads_Admin_Changelog extends ThemeThreads_Admin_Page {

	/**
	 * [__construct description]
	 * @method __construct
	 */
	public function __construct() {

		$this->id = 'themethreads-changelog';
		$this->page_title = esc_html__( 'ThemeThreads Changelog', 'volley' );
		$this->menu_title = esc_html__( 'Changelog', 'volley' );
		$this->parent = 'themethreads';
		$this->position = '99';

		parent::__construct();
	}

	/**
	 * [display description]
	 * @method display
	 * @return [type]  [description]
	 */
	public function display() {
		include_once( get_template_directory() . '/themethreads/admin/views/themethreads-changelog.php' );
	}

	/**
	 * [save description]
	 * @method save
	 * @return [type] [description]
	 */
	public function save() {

	}
}
new ThemeThreads_Admin_Changelog;