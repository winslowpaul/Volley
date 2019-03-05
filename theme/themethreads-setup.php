<?php
/**
 * ThemeThreads Theme Framework
 */

if( !defined( 'ABSPATH' ) ) 
	exit; // Exit if accessed directly

// Custom Post Type Supports
add_theme_support( 'volley-portfolio' );
add_theme_support( 'themethreads-footer' );
add_theme_support( 'themethreads-header' );
add_theme_support( 'themethreads-promotion' );
add_theme_support( 'themethreads-mega-menu' );

// Custom Extensions
add_theme_support( 'themethreads-extension', array(
	'mega-menu',
	'breadcrumb',
	'wp-editor'
) );
add_post_type_support( 'post', 'themethreads-post-likes' );

//Support Gutenberg
add_theme_support(
	'gutenberg',
	array( 'wide-images' => true )
);
add_theme_support( 'wp-block-styles' );
add_theme_support( 'responsive-embeds' );
add_theme_support( 'align-wide' );

// Set theme options
themethreads()->set_option_name( 'themethreads_one_opt' );
add_theme_support( 'themethreads-theme-options', array(
	'layout',
	'responsive',
	'colors',
	'logo',
	'header',
	'footer',
	'sidebars',
	'typography',
	'blog',
	'portfolio',
	'woocommerce',
	'page-search',
	'apikeys',
	'extras',
	'advanced',
	'custom-code',
	'export'
));


//Set available metaboxes
add_theme_support( 'themethreads-metaboxes', array(
	
	'portfolio-general',
	'portfolio-meta',
	'page',
	'header',
	'footer',
	'sidebars',
	'title-wrapper',
	'title-wrapper-portfolio',
	'post',
	'post-format',

	// ThemeThreads Content
	'header-options',
	'footer-options',
	'megamenu-options'
));

//Enable support for Post Formats.
//See http://codex.wordpress.org/Post_Formats
add_theme_support( 'post-formats', array(
	'audio', 'gallery', 'link', 'quote', 'video'
) );

// Sets up theme navigation locations.
register_nav_menus( array(
   'primary'   => esc_html__( 'Primary Menu', 'volley' ),
   'secondary' => esc_html__( 'Secondary Menu', 'volley' )
) );

// Register Widgets Area.
add_action( 'widgets_init', 'themethreads_main_sidebar' );
function themethreads_main_sidebar() {
	register_sidebar( array(
		'name'          => esc_html__( 'Main Sidebar', 'volley' ),
		'id'            => 'main',
		'description'   => esc_html__( 'Main widget area to display in sidebar', 'volley' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	));
}