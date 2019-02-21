<?php
/**
 * ThemeThreads Theme Framework
 */

if( !defined( 'ABSPATH' ) )
	exit; // Exit if accessed directly


/**
 * [themethreads_attributes_head description]
 * @method themethreads_attributes_head
 * @param  [type]                $attributes [description]
 * @return [type]                            [description]
 */
add_filter( 'themethreads_attr_head', 'themethreads_attributes_head' );
function themethreads_attributes_head( $attributes ) {

	unset( $attributes['class'] );
	if ( ! is_front_page() ) {
		return $attributes;
	}

	$attributes['itemscope'] = 'itemscope';
	$attributes['itemtype']  = 'http://schema.org/WebSite';

	return $attributes;
}

/**
 * [themethreads_attributes_body description]
 * @method themethreads_attributes_body
 * @param  [type]                $attributes [description]
 * @return [type]                            [description]
 */
add_filter( 'themethreads_attr_body', 'themethreads_attributes_body' );
function themethreads_attributes_body( $attributes ) {
	
	unset( $attributes['class'] );
	$attributes['dir']       = is_rtl() ? 'rtl' : 'ltr';
	$attributes['itemscope'] = 'itemscope';
	$attributes['itemtype']  = 'http://schema.org/WebPage';	
	
	$media_mobile_nav = themethreads_helper()->get_option( 'media-mobile-nav' );
	$attributes['data-mobile-nav-breakpoint'] = !empty( $media_mobile_nav ) ? $media_mobile_nav : '1200';
	
	if ( is_singular( 'post' ) || is_home() || is_archive() ) {
		$attributes['itemtype'] = 'http://schema.org/Blog';
	}

	if ( is_search() ) {
		$attributes['itemtype'] = 'http://schema.org/SearchResultsPage';
	}

	return $attributes;
}

/**
 * [themethreads_attributes_menu description]
 * @method themethreads_attributes_menu
 * @return [type]                [description]
 */
add_filter( 'themethreads_attr_menu', 'themethreads_attributes_menu' );
function themethreads_attributes_menu( $attributes ) {

	if ( $attributes['location'] ) {

		$menu_name = themethreads_helper()->get_menu_location_name( $attributes['location'] );

		if ( $menu_name ) {
			// Translators: The %s is the menu name. This is used for the 'aria-label' attribute.
			$attributes['aria-label'] = esc_attr( sprintf( esc_html_x( '%s', 'nav menu aria label', 'volley' ), $menu_name ) );
		}
	}
	unset( $attributes['location'] );

	$attributes['itemscope']  = 'itemscope';
	$attributes['itemtype']   = 'http://schema.org/SiteNavigationElement';

	return $attributes;
}


/**
 * [themethreads_attributes_content description]
 * @method themethreads_attributes_content
 * @param  [type]                   $attributes [description]
 * @return [type]                               [description]
 */
add_filter( 'themethreads_attr_content', 'themethreads_attributes_content' );
function themethreads_attributes_content( $attributes ) {

	$attributes['id'] = 'content';

	//Fullpage enable
	$enabled_fullpage = themethreads_helper()->get_option( 'enable-fullpage' );
	if( 'on' === $enabled_fullpage ) {
		$attributes['data-enable-fullpage'] = true;
	}
	
	//Stack enable
	$enabled_stack  = themethreads_helper()->get_option( 'page-enable-stack' );
	$stack_nav      = themethreads_helper()->get_option( 'page-stack-nav' );
	$stack_prevnext = themethreads_helper()->get_option( 'page-stack-nav-prevnextbuttons' );
	$stack_numbers  = themethreads_helper()->get_option( 'page-stack-numbers' );
	$stack_effect   = themethreads_helper()->get_option( 'page-stack-effect' );
	$stack_opts = array();

	if( 'on' === $enabled_stack ) {
		$attributes['data-themethreads-stack'] = true;
		$stack_opts['navigation']        = ( 'on' == $stack_nav ) ? true : false;
		$stack_opts['prevNextButtons']   = ( 'on' == $stack_prevnext ) ? true : false;
		$stack_opts['pageNumber']        = ( 'on' == $stack_numbers ) ? true : false;
		$stack_opts['prevNextLabels']    = array( 'prev' => esc_html__( 'Previous', 'volley' ), 'next' => esc_html__( 'Next', 'volley' ) );

		if( !empty( $stack_effect ) ){
			$stack_opts['effect'] = $stack_effect;
		}
		
		$attributes['data-stack-options'] = wp_json_encode( $stack_opts );
	}

	//Fullpage enable parallax	
	$enabled_fullpage_parallax = themethreads_helper()->get_option( 'enable-fullpage-parallax' );
	if( 'on' === $enabled_fullpage_parallax ) {
		$attributes['data-fullpage-parallax'] = true;
	}

	if ( ! is_singular( 'post' ) && ! is_home() && ! is_archive() ) {}

	return $attributes;

}
