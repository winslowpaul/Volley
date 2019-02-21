<?php
/**
 * Post Type: Footer
 * Register Custom Post Type
 */
$labels = array(
	'name'                  => esc_html_x( 'Footers', 'Post Type General Name', 'volley-core' ),
	'singular_name'         => esc_html_x( 'Footer', 'Post Type Singular Name', 'volley-core' ),
	'menu_name'             => esc_html__( 'Footers', 'volley-core' ),
	'name_admin_bar'        => esc_html__( 'Footers', 'volley-core' ),
	'archives'              => esc_html__( 'Item Archives', 'volley-core' ),
	'parent_item_colon'     => esc_html__( 'Parent Item:', 'volley-core' ),
	'all_items'             => esc_html__( 'All Items', 'volley-core' ),
	'add_new_item'          => esc_html__( 'Add New Footer', 'volley-core' ),
	'add_new'               => esc_html__( 'Add New', 'volley-core' ),
	'new_item'              => esc_html__( 'New Footer', 'volley-core' ),
	'edit_item'             => esc_html__( 'Edit Footer', 'volley-core' ),
	'update_item'           => esc_html__( 'Update Footer', 'volley-core' ),
	'view_item'             => esc_html__( 'View Footer', 'volley-core' ),
	'search_items'          => esc_html__( 'Search Footer', 'volley-core' ),
	'not_found'             => esc_html__( 'Not found', 'volley-core' ),
	'not_found_in_trash'    => esc_html__( 'Not found in Trash', 'volley-core' ),
	'featured_image'        => esc_html__( 'Featured Image', 'volley-core' ),
	'set_featured_image'    => esc_html__( 'Set featured image', 'volley-core' ),
	'remove_featured_image' => esc_html__( 'Remove featured image', 'volley-core' ),
	'use_featured_image'    => esc_html__( 'Use as featured image', 'volley-core' ),
	'insert_into_item'      => esc_html__( 'Insert into item', 'volley-core' ),
	'uploaded_to_this_item' => esc_html__( 'Uploaded to this item', 'volley-core' ),
	'items_list'            => esc_html__( 'Items list', 'volley-core' ),
	'items_list_navigation' => esc_html__( 'Items list navigation', 'volley-core' ),
	'filter_items_list'     => esc_html__( 'Filter items list', 'volley-core' ),
);
$args = array(
	'label'                 => esc_html__( 'Footer', 'volley-core' ),
	'labels'        => $labels,
	'supports'              => array( 'title', 'editor', 'revisions', ),
	'hierarchical'          => false,
	'public'                => true,
	'show_ui'       => true,
	'show_in_menu'          => true,
	'menu_position'         => 25,
	'menu_icon'     => 'dashicons-align-center',	
	'show_in_admin_bar'     => true,
	'show_in_nav_menus'     => false,
	'can_export'            => true,
	'has_archive'   => false,
	'exclude_from_search'   => true,
	'publicly_queryable'    => false,
	'rewrite'               => false,
	'capability_type'       => 'page',
);
register_post_type( 'themethreads-footer', $args );
