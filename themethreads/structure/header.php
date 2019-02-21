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
 * [at_meta_mobile_app description]
 * @method at_meta_mobile_app
 * @return [type]             [description]
 */
add_action( 'wp_head', 'themethreads_meta_mobile_app', 0 );
function themethreads_meta_mobile_app() {

	echo '<meta name="mobile-web-app-capable" content="yes">' . "\n";
	echo '<meta name="apple-mobile-web-app-capable" content="yes">' . "\n";
	printf( '<meta name="apple-mobile-web-app-title" content="%s - %s">' . "\n", esc_html( get_bloginfo('name') ), esc_html( get_bloginfo('description') ) );
}

/**
 * [themethreads_meta_name_url description]
 * @method themethreads_meta_name_url
 * @return [type]          [description]
 */
add_action( 'wp_head', 'themethreads_meta_name_url', 1 );
function themethreads_meta_name_url() {

	if ( ! is_front_page() ) {
		return;
	}

	printf( '<meta itemprop="name" content="%s" />' . "\n", get_bloginfo( 'name' ) );
	printf( '<meta itemprop="url" content="%s" />' . "\n", trailingslashit( home_url() ) );
}

/**
 * [themethreads_meta_pingback description]
 * @method themethreads_meta_pingback
 * @return [type]              [description]
 */
add_action( 'wp_head', 'themethreads_meta_pingback', 0 );
function themethreads_meta_pingback() {

	if ( 'open' === get_option( 'default_ping_status' ) ) {
		echo '<link rel="pingback" href="' . get_bloginfo( 'pingback_url' ) . '" />' . "\n";
	}
}

/**
 * [themethreads_load_favicon description]
 * @method themethreads_load_favicon
 * @return [type]             [description]
 */
add_action( 'wp_head', 'themethreads_load_favicon' );
function themethreads_load_favicon() {
?>
	<link rel="shortcut icon" href="<?php themethreads_helper()->get_option_echo( 'favicon.url', 'url', get_template_directory_uri() . '/favicon.png') ?>" />
	<?php
	if ( $icon = themethreads_helper()->get_option( 'iphone_icon.url' ) ) : ?>
		<!-- For iPhone -->
		<link rel="apple-touch-icon-precomposed" href="<?php echo esc_url( $icon ) ?>">
	<?php endif;

	if ( $icon = themethreads_helper()->get_option( 'iphone_icon_retina.url' ) ) : ?>
		<!-- For iPhone 4 Retina display -->
		<link rel="apple-touch-icon" sizes="114x114" href="<?php echo esc_url( $icon ) ?>">
	<?php endif;

	if ( $icon = themethreads_helper()->get_option( 'ipad_icon.url' ) ) : ?>
		<!-- For iPad -->
		<link rel="apple-touch-icon" sizes="72x72" href="<?php echo esc_url( $icon ) ?>">
	<?php endif;

	if ( $icon = themethreads_helper()->get_option( 'ipad_icon_retina.url' ) ) : ?>
		<!-- For iPad Retina display -->
		<link rel="apple-touch-icon" sizes="144x144" href="<?php echo esc_url( $icon ) ?>">
	<?php endif;
}

/**
 * [themethreads_output_advance_code description]
 * @method themethreads_output_advance_code
 * @return [type]                  [description]
 */
add_action( 'wp_head', 'themethreads_output_advance_code', 999 );
function themethreads_output_advance_code() {

	echo themethreads_helper()->get_theme_option( 'google_analytics' );

	echo themethreads_helper()->get_theme_option( 'space_head' );
}

/**
 * Add skiplinks for screen readers and keyboard navigation
 */
add_action( 'themethreads_before', 'themethreads_skip_links', 1 );
function themethreads_skip_links() {

	// Determine which skip links are needed
	$links = array();

	if ( has_nav_menu( 'primary' ) ) {
		$links['primary'] =  esc_html__( 'Skip to primary navigation', 'volley' );
	}

	$links['content'] = esc_html__( 'Skip to content', 'volley' );

	// write HTML, skiplinks in a list with a heading
	$skiplinks  =  '<section>';
	$skiplinks .=  '<h2 class="screen-reader-text">'. esc_html__( 'Skip links', 'volley' ) .'</h2>';
	$skiplinks .=  '<ul class="themethreads-skip-link screen-reader-text">';

	// Add markup for each skiplink
	foreach ($links as $key => $value) {
		$skiplinks .=  '<li><a href="' . esc_url( '#' . $key ) . '" class="screen-reader-shortcut"> ' . esc_html( $value ) . '</a></li>';
	}

	$skiplinks .=  '</ul>';
	$skiplinks .=  '</section>' . "\n";

	echo wp_kses_post( $skiplinks );
}

/**
 * [themethreads_attributes_header description]
 * @method themethreads_attributes_header
 * @param  [type]                  $attributes [description]
 * @return [type]                              [description]
 */
add_filter( 'themethreads_attr_header', 'themethreads_attributes_header' );
function themethreads_attributes_header( $attributes ) {

	if( !isset( $attributes['id'] ) || empty( $attributes['id'] ) ) {
		$attributes['id'] = 'header';
	}

	$attributes['class'] = !empty( $attributes['class'] ) ? 'header site-header ' . $attributes['class'] : 'header site-header';
	$attributes['itemscope'] = 'itemscope';
	$attributes['itemtype']  = 'http://schema.org/WPHeader';

	return $attributes;

}


add_filter( 'themethreads_attr_archive-header', 'themethreads_attributes_archive_header' );
/**
 * [themethreads_attributes_archive_header description]
 * @method themethreads_attributes_archive_header
 * @param  [type]              $attributes [description]
 * @return [type]                          [description]
 */
function themethreads_attributes_archive_header( $attributes ) {

	$attributes['class'] = 'page-header archive-header';
	$attributes['itemscope'] = 'itemscope';
	$attributes['itemtype']  = 'http://schema.org/WebPageElement';

	return $attributes;
}


add_filter( 'themethreads_attr_archive-title', 'themethreads_attributes_archive_title' );
/**
 * [themethreads_attributes_archive_title description]
 * @method themethreads_attributes_archive_title
 * @param  [type]              $attributes [description]
 * @return [type]                          [description]
 */
function themethreads_attributes_archive_title( $attributes ) {

	$attributes['class']     = 'archive-title';
	$attributes['itemprop']  = 'headline';

	return $attributes;
}


add_filter( 'themethreads_attr_archive-description', 'themethreads_attributes_archive_description' );
/**
 * [themethreads_attributes_archive_description description]
 * @method themethreads_attributes_archive_description
 * @param  [type]              $attributes [description]
 * @return [type]                          [description]
 */
function themethreads_attributes_archive_description( $attributes ) {

	$attributes['class']     = 'archive-description';
	$attributes['itemprop']  = 'text';

	return $attributes;
}

// 2. Functions ------------------------------------------------------
//

/**
 * [themethreads_get_custom_header_id description]
 * @method themethreads_get_custom_header_id
 * @return [type]                     [description]
 */
function themethreads_get_custom_header_id() {
	
	// which one
	$search_id = themethreads_helper()->get_option( 'search-header-template' );
	if( is_search() && $search_id ) {
		$id = $search_id;
	}
	else { 
		$id = themethreads_helper()->get_option( 'header-template' );	
	}

	return $id;
}

/**
 * [themethreads_print_custom_header_css description]
 * @method themethreads_print_custom_header_css
 * @return [type]                        [description]
 */
add_action( 'wp_head', 'themethreads_print_custom_header_css', 1001 );
function themethreads_print_custom_header_css() {

	echo themethreads_helper()->get_vc_custom_css( themethreads_get_custom_header_id() );
}

// 3. Template Tags --------------------------------------------------
//

function themethreads_get_custom_header( $post_id = 0 ) {

	if( ! $post_id ) {
		return;
	}
}
