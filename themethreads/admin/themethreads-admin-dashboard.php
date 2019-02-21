<?php
/**
* ThemeThreads Themes Theme Framework
* The ThemeThreads_Admin_Dashboard base class
*/

if( !defined( 'ABSPATH' ) )
	exit; // Exit if accessed directly

class ThemeThreads_Admin_Dashboard extends ThemeThreads_Admin_Page {

	/**
	 * [__construct description]
	 * @method __construct
	 */
	public function __construct() {

		$this->id = 'themethreads';
		$this->page_title = esc_html__( 'ThemeThreads Dashboard', 'volley' );
		$this->menu_title = esc_html__( 'ThemeThreads', 'volley' );
		$this->position = '50';

		parent::__construct();
	}

	/**
	 * [display description]
	 * @method display
	 * @return [type]  [description]
	 */
	public function display() {
		include_once( get_template_directory() . '/themethreads/admin/views/themethreads-dashboard.php' );
	}

	/**
	 * [save description]
	 * @method save
	 * @return [type] [description]
	 */
	public function save() {

	}
}
new ThemeThreads_Admin_Dashboard;
