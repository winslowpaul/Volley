<?php
/**
* ThemeThreads WooCommerce init
*
*/

if( !defined( 'ABSPATH' ) )
	exit; // Exit if accessed directly

/**
 * Load WooCommerce compatibility files.
 */
require get_template_directory() . '/themethreads/vendors/woocommerce/hooks.php';
require get_template_directory() . '/themethreads/vendors/woocommerce/functions.php';
require get_template_directory() . '/themethreads/vendors/woocommerce/template-tags.php';
require get_template_directory() . '/themethreads/vendors/woocommerce/options.php';
require get_template_directory() . '/themethreads/vendors/woocommerce/metaboxes.php';

function themethreads_single_woo_scripts() {
	
	if( apply_filters( 'themethreads_ajax_add_to_cart_single_product', true ) ) {
		wp_enqueue_script( 'themethreads_add_to_cart_ajax', get_template_directory_uri() . '/themethreads/vendors/woocommerce/js/themethreads_add_to_cart_ajax.js', array( 'jquery' ), null, true );
		wp_localize_script( 'themethreads_add_to_cart_ajax', 'themethreads_ajax_object', array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );
	}
	
}