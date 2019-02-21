<?php
/**
* ThemeThreads Themes Theme Framework
*/

if( !defined( 'ABSPATH' ) )
	exit; // Exit if accessed directly

class ThemeThreads_Admin_License extends ThemeThreads_Admin_Page {

	/**
	 * [__construct description]
	 * @method __construct
	 */
	public function __construct() {

		$this->id         = 'themethreads-license';
		$this->page_title = esc_html__( 'ThemeThreads License', 'volley' );
		$this->menu_title = esc_html__( 'License', 'volley' );
		$this->position   = '55';
		$this->parent     = 'themethreads';

		parent::__construct();
	}

	/**
	 * [display description]
	 * @method display
	 * @return [type]  [description]
	 */
	public function display() {
		include_once( get_template_directory() . '/themethreads/admin/views/themethreads-login.php' );
	}

	/**
	 * [save description]
	 * @method save
	 * @return [type] [description]
	 */
	public function save() {

	}
}
new ThemeThreads_Admin_License;
