<?php
/**
* ThemeThreads Themes Theme Framework
* The ThemeThreads_Admin_Import class
*/

if( !defined( 'ABSPATH' ) )
	exit; // Exit if accessed directly

class ThemeThreads_Admin_Import extends ThemeThreads_Admin_Page {

	/**
	 * [__construct description]
	 * @method __construct
	 */
	public function __construct() {

		$this->id = 'themethreads-import-demos';
		$this->page_title = esc_html__( 'ThemeThreads Import Demos', 'volley' );
		$this->menu_title = esc_html__( 'Import Demos', 'volley' );
		$this->parent = 'themethreads';
		$this->position = '10';

		parent::__construct();
	}

	/**
	 * [display description]
	 * @method display
	 * @return [type]  [description]
	 */
	public function display() {
		include_once( get_template_directory() . '/themethreads/admin/views/themethreads-demos.php' );
	}

	/**
	 * [save description]
	 * @method save
	 * @return [type] [description]
	 */
	public function save() {

	}
}
new ThemeThreads_Admin_Import;