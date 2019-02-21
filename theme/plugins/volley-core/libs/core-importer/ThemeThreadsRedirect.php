<?php
/**
 * Take users to the start page after theme activate or update
 *
 * @package be-functions
 * @author be
 **/
class ThemeThreadsRedirect
{
	
	function __construct()
	{
		
	}
	public function run() {
		//add_action( 'after_switch_theme', array($this, 'activate_theme')  );
		add_action( 'admin_enqueue_scripts', array($this, 'update_redirect'));
	}

	public function activate_theme() {
		global $pagenow;
		
		if( is_admin() && 'themes.php' == $pagenow && isset( $_GET['activated'] ) ) {
			wp_redirect( admin_url('admin.php?page=themethreads', 302 ) );
			die();
		}
	}
	public function update_redirect() {
		
		if( ! function_exists( 'themethreads' ) ) {
			return;
		}

		wp_enqueue_script( 'themethreads-update-redirect', themethreads()->load_assets( 'js/update-redirect.js' ), array( 'jquery' ), false, false );
		wp_localize_script( 'themethreads-update-redirect', 'themethreads_redirect', array(
			'url' => admin_url( 'admin.php?page=themethreads' ),
		) );
	}
}
?>