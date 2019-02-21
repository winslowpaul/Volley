<?php
/**
* Post Type: Portfolios
* Register Custom Post Type
*/

$portfolio_slug = 'portfolio';
$portfolio_cat_slug = 'portfolio-category';

if( function_exists( 'themethreads_helper' ) ) {
	$custom_portfolio_slug = themethreads_helper()->get_option( 'portfolio-single-slug' );
	if( ! empty( $custom_portfolio_slug ) ) {
		$portfolio_slug = esc_attr( $custom_portfolio_slug );
	}
	$custom_portfolio_cat_slug = themethreads_helper()->get_option( 'portfolio-category-slug' );
	if( ! empty( $custom_portfolio_cat_slug ) ) {
		$portfolio_cat_slug = esc_attr( $custom_portfolio_cat_slug );
	}
}

$labels = array(
	'name'                  => esc_html_x( 'Portfolios', 'Post Type General Name', 'volley-portfolio' ),
	'singular_name'         => esc_html_x( 'Portfolio', 'Post Type Singular Name', 'volley-portfolio' ),
	'menu_name'             => esc_html__( 'Portfolio items', 'volley-portfolio' ),
	'name_admin_bar'        => esc_html__( 'Portfolio item', 'volley-portfolio' ),
	'archives'              => esc_html__( 'Portfolio item Archives', 'volley-portfolio' ),
	'parent_item_colon'     => esc_html__( 'Parent Item:', 'volley-portfolio' ),
	'all_items'             => esc_html__( 'All Items', 'volley-portfolio' ),
	'add_new_item'          => esc_html__( 'Add New Portfolio', 'volley-portfolio' ),
	'add_new'               => esc_html__( 'Add New', 'volley-portfolio' ),
	'new_item'              => esc_html__( 'New Portfolio', 'volley-portfolio' ),
	'edit_item'             => esc_html__( 'Edit Portfolio', 'volley-portfolio' ),
	'update_item'           => esc_html__( 'Update Portfolio', 'volley-portfolio' ),
	'view_item'             => esc_html__( 'View Portfolio', 'volley-portfolio' ),
	'search_items'          => esc_html__( 'Search Portfolios', 'volley-portfolio' ),
	'not_found'             => esc_html__( 'Not found', 'volley-portfolio' ),
	'not_found_in_trash'    => esc_html__( 'Not found in Trash', 'volley-portfolio' ),
	'featured_image'        => esc_html__( 'Featured Image', 'volley-portfolio' ),
	'set_featured_image'    => esc_html__( 'Set featured image', 'volley-portfolio' ),
	'remove_featured_image' => esc_html__( 'Remove featured image', 'volley-portfolio' ),
	'use_featured_image'    => esc_html__( 'Use as featured image', 'volley-portfolio' ),
	'insert_into_item'      => esc_html__( 'Insert into Portfolio', 'volley-portfolio' ),
	'uploaded_to_this_item' => esc_html__( 'Uploaded to this Portfolio', 'volley-portfolio' ),
	'items_list'            => esc_html__( 'Items list', 'volley-portfolio' ),
	'items_list_navigation' => esc_html__( 'Items list navigation', 'volley-portfolio' ),
	'filter_items_list'     => esc_html__( 'Filter items list', 'volley-portfolio' ),
);
$rewrite = array(
	'slug'                  => $portfolio_slug,
	'with_front'            => true,
	'pages'                 => true,
	'feeds'                 => false,
);
$args = array(
	'label'                 => esc_html__( 'Portfolio', 'volley-portfolio' ),
	'labels'                => $labels,
	'supports'              => array( 'title', 'editor', 'excerpt', 'thumbnail', 'post-formats', 'themethreads-post-likes' ),
	'hierarchical'          => false,
	'public'                => true,
	'show_ui'               => true,
	'show_in_menu'          => true,
	'menu_position'         => 25.3,
	'menu_icon'             => 'dashicons-format-image',
	'show_in_admin_bar'     => true,
	'show_in_nav_menus'     => false,
	'can_export'            => true,
	'has_archive'           => 'portfolios',
	'exclude_from_search'   => false,
	'publicly_queryable'    => true,
	'query_var'             => 'portfolios',
	'rewrite'               => $rewrite,
	'capability_type'       => 'page',
);
register_post_type( 'themethreads-portfolio', $args );

/**
 * Taxonomy: Portfolio Category
 * Register Custom Taxonomy
 */
$labels = array(
	'name'                       => esc_html_x( 'Portfolio Categories', 'Taxonomy General Name', 'volley-portfolio' ),
	'singular_name'              => esc_html_x( 'Portfolio Category', 'Taxonomy Singular Name', 'volley-portfolio' ),
	'menu_name'                  => esc_html__( 'Categories', 'volley-portfolio' ),
	'all_items'                  => esc_html__( 'All Categories', 'volley-portfolio' ),
	'parent_item'                => esc_html__( 'Parent Category', 'volley-portfolio' ),
	'parent_item_colon'          => esc_html__( 'Parent Category:', 'volley-portfolio' ),
	'new_item_name'              => esc_html__( 'New Category Name', 'volley-portfolio' ),
	'add_new_item'               => esc_html__( 'Add New Category', 'volley-portfolio' ),
	'edit_item'                  => esc_html__( 'Edit Category', 'volley-portfolio' ),
	'update_item'                => esc_html__( 'Update Category', 'volley-portfolio' ),
	'view_item'                  => esc_html__( 'View Category', 'volley-portfolio' ),
	'separate_items_with_commas' => esc_html__( 'Separate Categories with commas', 'volley-portfolio' ),
	'add_or_remove_items'        => esc_html__( 'Add or remove Categories', 'volley-portfolio' ),
	'choose_from_most_used'      => esc_html__( 'Choose from the most used', 'volley-portfolio' ),
	'popular_items'              => esc_html__( 'Popular Categories', 'volley-portfolio' ),
	'search_items'               => esc_html__( 'Search Categories', 'volley-portfolio' ),
	'not_found'                  => esc_html__( 'Not Found', 'volley-portfolio' ),
	'no_terms'                   => esc_html__( 'No Categories', 'volley-portfolio' ),
	'items_list'                 => esc_html__( 'Items list', 'volley-portfolio' ),
	'items_list_navigation'      => esc_html__( 'Items list navigation', 'volley-portfolio' ),
);
$rewrite = array(
	'slug'                       => $portfolio_cat_slug,
	'with_front'                 => true,
	'hierarchical'               => false,
);
$args = array(
	'labels'                     => $labels,
	'hierarchical'               => true,
	'public'                     => true,
	'show_ui'                    => true,
	'show_admin_column'          => true,
	'show_in_nav_menus'          => false,
	'show_tagcloud'              => true,
	'query_var'                  => 'portfolio-category',
	'rewrite'                    => $rewrite,
);
register_taxonomy( 'themethreads-portfolio-category', array( 'themethreads-portfolio' ), $args );
register_taxonomy_for_object_type( 'post_format', 'themethreads-portfolio' );

/**
 * Adjust Post Type
 */
add_action( 'load-post.php','themethreads_portfolio_adjust_post_formats' );
add_action( 'load-post-new.php','themethreads_portfolio_adjust_post_formats' );
/**
 * [themethreads_portfolio_adjust_post_formats description]
 * @method themethreads_portfolio_adjust_post_formats
 * @return [type]                              [description]
 */
function themethreads_portfolio_adjust_post_formats() {
	if( isset( $_GET['post'] ) ) {
		$post = get_post( $_GET['post'] );
		if ( $post ) {
			$post_type = $post->post_type;
		}
	}
	elseif ( !isset($_GET['post_type']) ) {
		$post_type = 'post';
	}
	elseif ( in_array( $_GET['post_type'], get_post_types( array( 'show_ui' => true ) ) ) ) {
		$post_type = $_GET['post_type'];
	}
	else {
		return; // Page is going to fail anyway
	}

	if ( 'themethreads-portfolio' == $post_type ) {
		add_theme_support( 'post-formats', array( 'gallery' ) );
	}
}
