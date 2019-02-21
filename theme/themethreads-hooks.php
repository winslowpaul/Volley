<?php
/**
 * ThemeThreads Themes Theme Hooks
 */

if( ! defined( 'ABSPATH' ) ) 
	exit; 
// Exit if accessed directly

/**
 * [themethreads_add_body_classes description]
 * @method themethreads_add_body_classes
 * @param  [type] $classes [description]
 */
function themethreads_add_body_classes( $classes ) {
	
	//Add for single post body classnames
	if( is_single() ) {
		
		$single_post_style = themethreads_helper()->get_option( 'post-style', 'cover-spaced' );
		$alt_image_src   = themethreads_helper()->get_option( 'themethreads-post-cover-image' );
		$image_src = isset( $alt_image_src['background-image'] ) ? esc_url( $alt_image_src['background-image'] ) : get_the_post_thumbnail_url( get_the_ID(), 'full' );
		
		if( empty( $single_post_style ) ) {
			$single_post_style = 'cover-spaced';
		}
		if( 'default' === $single_post_style ) {
			$classes[] = 'blog-single-image-left';
		}
		elseif( 'cover' === $single_post_style ) {
			$classes[] = 'blog-single-default';
		}
		elseif( 'cover-spaced' === $single_post_style ) {
			$classes[] = 'blog-single-cover-bordered';
		}
		elseif( 'slider' === $single_post_style ) {
			$classes[] = 'blog-single-cover-fade';
		}
		
		if( !empty( $image_src ) ) {
			$classes[] = 'blog-single-post-has-thumbnail';
		}
		else {
			$classes[] = 'blog-single-post-has-not-thumbnail';
		}
		$check = get_the_content();
		if( empty( $check ) ) {
			$classes[] = 'post-has-no-content';
		}
		
	}
	$enabled_stack  = themethreads_helper()->get_option( 'page-enable-stack' );
	if( 'on' === $enabled_stack ) {
		$buttons_style = themethreads_helper()->get_option( 'page-stack-buttons-style' );
		$classes[] = !empty( $buttons_style ) ? $buttons_style : 'threads-stack-buttons-style-1';
	}
	
	$site_layout = themethreads_helper()->get_option( 'page-layout' );
	if( !empty( $site_layout ) ) {
		$classes[] = "site-$site_layout-layout";
	}
	
	$body_shadow = themethreads_helper()->get_option( 'body-shadow' );
	if( !empty( $body_shadow ) ) {
		$classes[] = $body_shadow;
	}	

	//Page color scheme
	$page_color_scheme = themethreads_helper()->get_option( 'body-color-scheme' );
	if( !empty( $page_color_scheme ) ) {
		if( 'light' === $page_color_scheme ) {
			$classes[] = 'page-scheme-light';
		}
		else {
			$classes[] = 'page-scheme-dark';	
		}
	}
	//Progressively load classnames
	if( 'on' === themethreads_helper()->get_option( 'enable-lazy-load' ) && !is_admin() ) {
		$classes[] = 'lazyload-enabled';
	}
	
	// Header body class
	$id = themethreads_get_custom_header_id(); // which one
	if( $layout = themethreads_helper()->get_post_meta( 'header-layout', $id ) ) {
		if( 'fullscreen' === $layout ) {
			$classes[] = 'header-style-fullscreen';
		}
		elseif( in_array( $layout, array( 'side', 'side-2', 'side-3' ) ) ) {
			$classes[] = 'header-style-side';
		}
	}

	return $classes;
	
}
add_filter( 'body_class', 'themethreads_add_body_classes' );

/**
 * [themethreads_add_admin_body_classes description]
 * @method themethreads_add_admin_body_classes
 * @param  [type] $classes [description]
 */
function themethreads_add_admin_body_classes( $classes ) {
	
	$enabled_stack  = themethreads_helper()->get_option( 'page-enable-stack' );
	if( 'on' === $enabled_stack ) {
		$classes .= 'threads-stack-enabled';
	}

	return $classes;

}
add_filter( 'admin_body_class', 'themethreads_add_admin_body_classes' );

function themethreads_mobile_nav_body_attributes( $attributes ) {
	
	//Default Values
	$attributes['data-mobile-nav-style']             = 'modern';
	$attributes['data-mobile-nav-scheme']            = 'dark';
	$attributes['data-mobile-nav-trigger-alignment'] = 'right';
	$attributes['data-mobile-header-scheme']         = 'gray';
	$attributes['data-mobile-secondary-bar']         = 'false';

	// Header body atts
	$id = themethreads_get_custom_header_id(); // which one
	if( $id ) {

		$mobile_nav_style        = themethreads_helper()->get_post_meta( 'm-nav-style', $id );
		$mobile_nav_style_global = themethreads_helper()->get_theme_option( 'm-nav-style' );
		if( $mobile_nav_style ) {
			$attributes['data-mobile-nav-style'] = $mobile_nav_style;
			if( 'modern' === $mobile_nav_style ) {
				$attributes['data-mobile-nav-scheme'] = 'dark';	
			}
		}
		elseif( $mobile_nav_style_global ) {
			$attributes['data-mobile-nav-style'] = $mobile_nav_style_global;
			if( 'modern' === $mobile_nav_style_global ) {
				$attributes['data-mobile-nav-scheme'] = 'dark';	
			}			
		}

		$mobile_nav_trigger_alignment = themethreads_helper()->get_post_meta( 'm-nav-trigger-alignment', $id );
		$mobile_nav_trigger_alignment_global = themethreads_helper()->get_theme_option( 'm-nav-trigger-alignment' );
		if( $mobile_nav_trigger_alignment ) {
			$attributes['data-mobile-nav-trigger-alignment'] = $mobile_nav_trigger_alignment;
		}
		elseif( $mobile_nav_trigger_alignment_global ) {
			$attributes['data-mobile-nav-trigger-alignment'] = $mobile_nav_trigger_alignment_global;
		}

		$mobile_nav_alignment = themethreads_helper()->get_post_meta( 'm-nav-alignment', $id );
		$mobile_nav_alignment_global = themethreads_helper()->get_theme_option( 'm-nav-alignment' );
		if( $mobile_nav_alignment && 'modern' !== $mobile_nav_style ) {
			$attributes['data-mobile-nav-align'] = $mobile_nav_alignment;
		}
		elseif( $mobile_nav_alignment_global && 'modern' !== $mobile_nav_style_global ) {
			$attributes['data-mobile-nav-align'] = $mobile_nav_alignment_global;
		}

		$mobile_nav_scheme = themethreads_helper()->get_post_meta( 'm-nav-scheme', $id );
		$mobile_nav_scheme_global = themethreads_helper()->get_theme_option( 'm-nav-scheme' );
		if( $mobile_nav_scheme && 'modern' !== $mobile_nav_style ) {
			$attributes['data-mobile-nav-scheme'] = $mobile_nav_scheme;
		}
		elseif( $mobile_nav_scheme_global && 'modern' !== $mobile_nav_style_global ) {
			$attributes['data-mobile-nav-scheme'] = $mobile_nav_scheme_global;			
		}

		$mobile_nav_header_style = themethreads_helper()->get_post_meta( 'm-nav-header-scheme', $id );
		$mobile_nav_header_style_global = themethreads_helper()->get_theme_option( 'm-nav-header-scheme' );
		if( $mobile_nav_header_style ) {
			$attributes['data-mobile-header-scheme'] = $mobile_nav_header_style;
		}
		elseif( $mobile_nav_header_style_global ) {
			$attributes['data-mobile-header-scheme'] = $mobile_nav_header_style_global;
		}

		$mobile_nav_sec_bar        = themethreads_helper()->get_post_meta( 'm-nav-enable-secondary-bar', $id );
		$mobile_nav_sec_bar_global = themethreads_helper()->get_theme_option( 'm-nav-enable-secondary-bar' );

		if( !empty( $mobile_nav_sec_bar ) ) {
			if( 'no' === $mobile_nav_sec_bar ) {
				$attributes['data-mobile-secondary-bar'] = 'false';
			}
			else {
				$attributes['data-mobile-secondary-bar'] = 'true';
			}
		}
		elseif( $mobile_nav_sec_bar_global ) {
			if( 'no' === $mobile_nav_sec_bar_global ) {
				$attributes['data-mobile-secondary-bar'] = 'false';
			}
			else {
				$attributes['data-mobile-secondary-bar'] = 'true';
			}	
		}

		$mobile_header_overlay = themethreads_helper()->get_post_meta( 'mobile-header-overlay', $id );		

		if( !empty( $mobile_header_overlay ) ) {
			if( 'yes' === $mobile_header_overlay ) {
				$attributes['data-overlay-onmobile'] = 'true';
			}
			else {
				$attributes['data-overlay-onmobile'] = 'false';
			}
		}
		
	}
	
	return $attributes;
	
}
add_filter( 'themethreads_attr_body', 'themethreads_mobile_nav_body_attributes', 10 );

function themethreads_add_header_collapsed( $classes ) {

	// Header body class
	$id = themethreads_get_custom_header_id(); // which one
	if( $layout = themethreads_helper()->get_post_meta( 'header-layout', $id ) ) {
		if( 'fullscreen' === $layout ) {
			$classes[] = 'navbar-fullscreen';
		}
	}
	return $classes;	
} 
add_filter( 'themethreads_header_collapsed_classes', 'themethreads_add_header_collapsed', 99 );

function themethreads_add_header_nav_classes( $classes ) {

	// Header body class
	$id = themethreads_get_custom_header_id(); // which one
	if( $layout = themethreads_helper()->get_post_meta( 'header-layout', $id ) ) {
		if( 'fullscreen' === $layout ) {
			$classes[] = 'main-nav-hover-underline-1 main-nav-fullscreen-style-1';
		}
		elseif( 'side' === $layout ) {
			$classes[] = 'main-nav-side main-nav-side-style-1';
		}
		elseif( 'side-2' === $layout ) {
			$classes[] = 'main-nav-side main-nav-side-style-2';
		}
		elseif( 'side-3' === $layout ) {
			$classes[] = 'main-nav-side main-nav-side-style-2';
		}
	}
	return $classes;	
} 
add_filter( 'themethreads_header_nav_classes', 'themethreads_add_header_nav_classes', 99 );

function themethreads_add_header_nav_args( $args ) {

	// Header body class
	$id = themethreads_get_custom_header_id(); // which one

	if( $layout = themethreads_helper()->get_post_meta( 'header-layout', $id ) ) {
		if( 'fullscreen' === $layout 
			|| 'side' === $layout 
			|| 'side-2' === $layout 
			|| 'side-3' === $layout 
		) {
			$args['toggleType'] = 'slide';
			$args['handler']    = 'click';
		}
	}
	return $args;	
} 
add_filter( 'themethreads_header_nav_args', 'themethreads_add_header_nav_args', 99 );

function themethreads_add_trigger_classes( $classes ) {

	// Header body class
	$id = themethreads_get_custom_header_id(); // which one
	if( $layout = themethreads_helper()->get_post_meta( 'header-layout', $id ) ) {
		if( 'fullscreen' === $layout ) {
			$classes[] = 'main-nav-trigger';
		}
	}	
	return $classes;
}
add_filter( 'themethreads_trigger_classes', 'themethreads_add_trigger_classes', 99 );

function themethreads_add_trigger_opts( $opts ) {

	// Header body class
	$id = themethreads_get_custom_header_id(); // which one
	if( $layout = themethreads_helper()->get_post_meta( 'header-layout', $id ) ) {
		if( 'fullscreen' === $layout ) {
			$opts[] = 'data-changeclassnames=\'{ "html": "overflow-hidden" }\'';
		}
		elseif( 'side' === $layout ) {
			$opts[] = 'data-changeclassnames=\'{ "html": "side-nav-showing" }\'';
		}
	}	
	return $opts;
}
add_filter( 'themethreads_trigger_opts', 'themethreads_add_trigger_opts', 99 );


/**
 * [themethreads_get_header_view description]
 * @method themethreads_get_header_view
 * @return [type] [description]
 */

function themethreads_get_header_view() {

	//Check if is not frontend vc editor
	if( function_exists( 'vc_mode' ) && 'page_editable' === vc_mode() ) {
		return;
	}

	$enable = themethreads_helper()->get_option( 'header-enable-switch', 'raw', '' );
	// Check if header is enabled
	if( 'off' === $enable ) {
		return;
	}

	// Overlay Header
	$header_id = themethreads_get_custom_header_id();
	$header_overlay = themethreads_helper()->get_post_meta( 'header-overlay', $header_id );

		if( is_search() ) {
			$enable_titlebar = themethreads_helper()->get_option( 'search-title-bar-enable', 'raw', '' );
		}
		elseif( is_post_type_archive( 'themethreads-portfolio' ) || is_tax( 'themethreads-portfolio-category' ) ) {
			$enable_titlebar = themethreads_helper()->get_option( 'portfolio-title-bar-enable', 'raw', '' );
		}
		elseif( class_exists( 'WooCommerce' ) && ( is_product_taxonomy() || is_product_category() ) ) {
			$enable_titlebar = themethreads_helper()->get_option( 'wc-archive-title-bar-enable', 'raw', '' );
		}
		elseif( ! themethreads_helper()->get_current_page_id() && is_home() ){
			$enable_titlebar = themethreads_helper()->get_option( 'blog-title-bar-enable', 'raw', '' );
		}
		elseif( is_singular( 'post' ) ) {
			$enable_titlebar = themethreads_helper()->get_post_meta( 'title-bar-enable' ) ? themethreads_helper()->get_post_meta( 'title-bar-enable' ) : themethreads_helper()->get_theme_option( 'post-titlebar-enable' );
		}
		elseif( is_category() ) {
			$enable_titlebar = themethreads_helper()->get_option( 'category-title-bar-enable', 'raw', '' );
		}
		elseif( is_tag() ){
			$enable_titlebar = themethreads_helper()->get_option( 'tag-title-bar-enable', 'raw', '' );
		}
		elseif( is_author() ) {
			$enable_titlebar = themethreads_helper()->get_option( 'author-title-bar-enable', 'raw', '' );
		}
		else {
			$enable_titlebar = themethreads_helper()->get_option( 'title-bar-enable', 'raw', '' );
		}

	if( 'main-header-overlay' === $header_overlay && 'on' === $enable_titlebar ){
		return;
	}

	if( $id = themethreads_helper()->get_option( 'header-template', 'raw', false ) ) {
		get_template_part( 'templates/header/custom' );
		return;
	}

	get_template_part( 'templates/header/default' );
}
add_action( 'themethreads_header', 'themethreads_get_header_view' );

/**
 * [themethreads_get_header_view description]
 * @method themethreads_get_header_view
 * @return [type]             [description]
 */
function themethreads_get_header_titlebar_view() {

	//Check if is not frontend vc editor
	if( function_exists( 'vc_mode' ) && 'page_editable' === vc_mode() ) {
		return;
	}

	if( is_404() ) {
		$enable = themethreads_helper()->get_option( 'error-404-header-enable-switch', 'raw', '' );	
	}
	else {
		$enable = themethreads_helper()->get_option( 'header-enable-switch', 'raw', '' );	
	}
	// Check if title bar is enabled
	if( 'on' !== $enable ) {
		return;
	}

	// Overlay Header
	$header_id = themethreads_get_custom_header_id();
	$header_overlay = themethreads_helper()->get_post_meta( 'header-overlay', $header_id );
	$header_overlay = $header_overlay ? $header_overlay : '';

	if( empty( $header_overlay ) ){
		return;
	}

	if( $id = themethreads_helper()->get_option( 'header-template', 'raw', false ) ) {
		get_template_part( 'templates/header/custom' );
		return;
	}

	get_template_part( 'templates/header/default' );
}
add_action( 'themethreads_header_titlebar', 'themethreads_get_header_titlebar_view' );

/**
 * [themethreads_get_footer_view description]
 * @method themethreads_get_footer_view
 * @return [type] [description]
 */

function themethreads_get_back_to_top_link() {

	$enable = themethreads_helper()->get_option( 'footer-back-to-top', 'raw', '' );
	if( 'off' === $enable ) {
		return;
	}

	echo '<div class="threads-back-to-top" data-back-to-top="true">
			<a href="#wrap" data-localscroll="true">
				<i class="fa fa-angle-up"></i>
			</a>
		</div><!-- /.threads-back-to-top -->';

}
add_action( 'themethreads_before_footer', 'themethreads_get_back_to_top_link' );

/**
 * [themethreads_get_titlebar_view description]
 * @method themethreads_get_titlebar_view
 * @return [type]                  [description]
 */
function themethreads_get_titlebar_view() {
	
	if( is_404() ) {
		return;
	}

	if( class_exists( 'ReduxFramework' ) && class_exists( 'ThemeThreads_Addons' ) ) {

		if( is_search() ) {
			$enable = themethreads_helper()->get_option( 'search-title-bar-enable', 'raw', '' );
		}
		elseif( is_post_type_archive( 'themethreads-portfolio' ) || is_tax( 'themethreads-portfolio-category' ) ) {
			$enable = themethreads_helper()->get_option( 'portfolio-title-bar-enable', 'raw', '' );
		}
		elseif( class_exists( 'WooCommerce' ) && ( is_product_taxonomy() || is_product_category() ) ) {
			$enable = themethreads_helper()->get_option( 'wc-archive-title-bar-enable', 'raw', '' );
		}
		elseif( ! themethreads_helper()->get_current_page_id() && is_home() ){
			$enable = themethreads_helper()->get_option( 'blog-title-bar-enable', 'raw', '' );
		}
		elseif( is_singular( 'post' ) ) {
			$enable = themethreads_helper()->get_post_meta( 'title-bar-enable' ) ? themethreads_helper()->get_post_meta( 'title-bar-enable' ) : themethreads_helper()->get_theme_option( 'post-titlebar-enable' );
		}
		elseif( is_category() ) {
			$enable = themethreads_helper()->get_option( 'category-title-bar-enable', 'raw', '' );
		}
		elseif( is_tag() ){
			$enable = themethreads_helper()->get_option( 'tag-title-bar-enable', 'raw', '' );
		}
		elseif( is_author() ) {
			$enable = themethreads_helper()->get_option( 'author-title-bar-enable', 'raw', '' );
		}
		else {
			$enable = themethreads_helper()->get_option( 'title-bar-enable', 'raw', '' );
		}

		if( 'on' !== $enable ) {
			return;
		}
	}

	if( is_singular( 'themethreads-portfolio' )) {
		get_template_part( 'templates/header/header-title-bar', 'portfolio' );
		return;
	}

	if( !class_exists( 'ReduxFramework' ) && is_single() ) {
		return;
	}

	get_template_part( 'templates/header/header-title', 'bar' );
}
add_action( 'themethreads_after_header', 'themethreads_get_titlebar_view' );

/**
 * [themethreads_get_footer_view description]
 * @method themethreads_get_footer_view
 * @return [type] [description]
 */

function themethreads_get_footer_view() {

	$enable = themethreads_helper()->get_option( 'footer-enable-switch', 'raw', '' );
	if( 'off' === $enable ) {
		return;
	}

	if( $id = themethreads_helper()->get_option( 'footer-template', 'raw', false ) ) {
		get_template_part( 'templates/footer/custom' );
		return;
	}

	get_template_part( 'templates/footer/default' );
}
add_action( 'themethreads_footer', 'themethreads_get_footer_view' );

/**
 * [themethreads_custom_sidebars description]
 * @method themethreads_custom_sidebars
 * @return [type] [description]
 */
function themethreads_custom_sidebars() {

	//adding custom sidebars defined in theme options
	$custom_sidebars = themethreads_helper()->get_theme_option( 'custom-sidebars' );
	$custom_sidebars = array_filter( (array)$custom_sidebars );

	if ( !empty( $custom_sidebars ) ) {

		foreach ( $custom_sidebars as $sidebar ) {

			register_sidebar ( array (
				'name'          => $sidebar,
				'id'            => sanitize_title( $sidebar ),
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<h3 class="widget-title">',
				'after_title'   => '</h3>',
			) );
		}
	}
}
add_action( 'after_setup_theme', 'themethreads_custom_sidebars', 9 );

/**
* [themethreads_before_comment_form description]
* @method themethreads_before_comment_form
* @return [type] [description]
*/
function themethreads_before_comment_form() {
	echo '<div class="row">';
}
add_action( 'comment_form_top', 'themethreads_before_comment_form', 9 );

/**
* [themethreads_after_comment_form description]
* @method themethreads_after_comment_form
* @return [type] [description]
*/
function themethreads_after_comment_form( $post_id ) {
	echo '</div>';
}
add_action( 'comment_form', 'themethreads_after_comment_form', 9 );

/**
* [themethreads_move_comment_field_to_bottom description]
* @method themethreads_move_comment_field_to_bottom
* @return [type] [description]
*/
function themethreads_move_comment_field_to_bottom( $fields ) {

	$comment_field = $fields['comment'];

	unset( $fields['comment'] );
	$fields['comment'] = $comment_field;

	return $fields;
}
add_filter( 'comment_form_fields', 'themethreads_move_comment_field_to_bottom' );

/**
 * [themethreads_add_image_placeholders description]
 * @method themethreads_add_image_placeholders
 * @param  [type]                       $content [description]
 */

add_action( 'init', 'themethreads_enable_lazy_load' );
function themethreads_enable_lazy_load() {
	
	if( function_exists( 'vc_mode' ) && 'page_editable' === vc_mode() ) {
		return;
	}

	if( 'on' === themethreads_helper()->get_option( 'enable-lazy-load' ) && !is_admin() ) {
		add_filter( 'wp_get_attachment_image_attributes', 'themethreads_filter_gallery_img_atts', 10, 2 );
	}

}

/**
 * [themethreads_filter_gallery_img_atts description]
 * @method themethreads_process_image_placeholders
 * @param  [type]             $atts [description]
 * @param  [type]             $attachment [description]
 * @return [type]            [description]
 */
function themethreads_filter_gallery_img_atts( $atts, $attachment ) {

		$img_data = $atts['src'];
		$aspect_ratio = '';

		$filetype = wp_check_filetype( $img_data );

		@list( $width, $height ) = getimagesize( $atts['src'] );
		if( isset( $width ) && isset( $height ) ) {
			$aspect_ratio = $width / $height;
		}

		if( 'svg' === $filetype['ext'] ) {
			return $atts;
		}

		$atts['src'] = 'data:image/svg+xml;charset=utf-8,<svg xmlns%3D\'http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg\' viewBox%3D\'0 0 ' . $width . ' ' . $height . '\'%2F>';
		$atts['class'] .= ' ld-lazyload';
		$atts['data-src'] = $img_data;
		if ( isset($atts['srcset']) ) { $atts['data-srcset'] = $atts['srcset']; };
		$atts['data-aspect'] = $aspect_ratio;
		$atts['srcset'] = '';

    return $atts;
}

/**
 * [themethreads_page_ajaxify description]
 * @method themethreads_page_ajaxify
 * @param  [type]             $template [description]
 * @return [type]                       [description]
 */
add_action( 'template_include', 'themethreads_page_ajaxify', 1 );
function themethreads_page_ajaxify( $template ) {

	if( isset( $_GET['ajaxify'] ) && $_GET['ajaxify'] ) {
		
		if( ! is_archive() ) {
			$located = locate_template( 'ajaxify.php' );
		}

		if( '' != $located ) {
			return $located;
		}
	}

	return $template;
}
