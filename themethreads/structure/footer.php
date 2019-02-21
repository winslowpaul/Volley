<?php
/**
 * ThemeThreads Themes Theme Framework
 */

if( !defined( 'ABSPATH' ) )
	exit; // Exit if accessed directly

/**
 * Table of content
 *
 * 1. Hooks
 * 2. Functions
 * 3. Template Tags
 */

// 1. Hooks ------------------------------------------------------
//

/**
 * [themethreads_output_space_body description]
 * @method themethreads_output_space_body
 * @return [type]                  [description]
 */
add_action( 'wp_footer', 'themethreads_output_space_body', 999 );
function themethreads_output_space_body() {

	echo themethreads_helper()->get_theme_option( 'space_body' );
}

/**
 * [themethreads_attributes_footer description]
 * @method themethreads_attributes_footer
 * @param  [type]                  $attributes [description]
 * @return [type]                              [description]
 */
add_filter( 'themethreads_attr_footer', 'themethreads_attributes_footer' );
function themethreads_attributes_footer( $attributes ) {

	$enabled_fullpage = themethreads_helper()->get_option( 'enable-fullpage' );
	if( 'on' === $enabled_fullpage ) {
		$attributes['class'] = !empty( $attributes['class'] ) ? 'main-footer site-footer section fp-auto-height-responsive fp-auto-height ' . $attributes['class'] : 'main-footer site-footer section fp-auto-height-responsive fp-auto-height' ;
	} else {
		$attributes['class'] = !empty( $attributes['class'] ) ? 'main-footer site-footer ' . $attributes['class'] : 'main-footer site-footer';	
	}

	$attributes['id'] = 'footer';
	$attributes['itemscope'] = 'itemscope';
	$attributes['itemtype']  = 'http://schema.org/WPFooter';
	
	global $post;
	
	// which one
	$id = themethreads_get_custom_footer_id();
	if( 'on' === themethreads_helper()->get_post_meta( 'footer-fixed', $id ) ) {
		$attributes['data-sticky-footer']  = true;	
	}

	return $attributes;

}

/**
 * [themethreads_footer_backtotop description]
 * @method themethreads_footer_backtotop
 * @return [type]                 [description]
 */
add_action( 'themethreads_after_footer', 'themethreads_footer_backtotop' );
function themethreads_footer_backtotop() {
	
	$enable = themethreads_helper()->get_theme_option( 'enable-go-top' );
	if( ! $enable ) {
		return;
	}
		
	$atts = array(
		'after'    => '</div>',
		'before'   => '<div class="local-scroll site-backtotop">',
		'href'     => '#wrap',
		'nofollow' => true,
		'text'     => esc_html__( 'Return to top of page', 'volley' ),
	);
	$atts = apply_filters( 'themethreads_footer_backtotop_defaults', $atts );

	$nofollow = $atts['nofollow'] ? 'rel="nofollow"' : '';

	printf( '%s<a href="%s" %s>%s</a>%s', $atts['before'], esc_url( $atts['href'] ), $nofollow, $atts['text'], $atts['after'] );
}

// 2. Functions ------------------------------------------------------
//

/**
 * [themethreads_get_custom_footer_id description]
 * @method themethreads_get_custom_footer_id
 * @return [type]                     [description]
 */
function themethreads_get_custom_footer_id() {

	// which one
	$id = themethreads_helper()->get_option( 'footer-template' );
	if( current_theme_supports( 'theme-demo' ) && !empty( $_GET['f'] ) ) {
		$id = $_GET['f'];
	}

	return $id;
}

/**
 * [themethreads_print_custom_footer_css description]
 * @method themethreads_print_custom_footer_css
 * @return [type]                        [description]
 */
add_action( 'wp_head', 'themethreads_print_custom_footer_css', 1001 );
function themethreads_print_custom_footer_css() {

	echo themethreads_helper()->get_vc_custom_css( themethreads_get_custom_footer_id() );
}

// 3. Template Tags --------------------------------------------------
//
