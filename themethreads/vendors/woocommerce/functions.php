<?php
/**
 * General functions used to integrate this theme with WooCommerce.
 *
 * @package Volley theme
 */

/**
 * Custom heading for loop product
 * @return string
 */
if ( ! function_exists( 'themethreads_woocommerce_template_loop_product_title' ) ) {
	function themethreads_woocommerce_template_loop_product_title() {
		echo '<h3><a href="' . get_permalink() . '">' . get_the_title() . '</a></h3>';
	}
}

/**
 * Custom breadcrumb
 * @return string
 */
if ( !function_exists( 'themethreads_woocommerce_breadcrumb_args' ) ) {
	function themethreads_woocommerce_breadcrumb_args( $args ) {
		
		$args = array(

			'delimiter'   => '',
			'wrap_before' => '<div class="col-md-6"><nav class="woocommerce-breadcrumb mb-4 mb-md-0"><ul class="breadcrumbs reset-ul inline-nav comma-sep-li">',
			'wrap_after'  => '</ul></nav></div>',
			'before'      => '<li>',
			'after'       => '</li>',
			'home'        => esc_html_x( 'Home', 'breadcrumb', 'volley' ),
				
		);

		return $args;

	}
}

function themethreads_start_shop_topbar_container() {
	
	echo '<div class="ld-shop-topbar fullwidth"><div class="container"><div class="row">';
	
}
function themethreads_end_shop_topbar_container() {

	echo '</div></div></div>';
}

/**
 * Add custom woocommerce template part for list loop
 * @return void
 */
if ( ! function_exists( 'themethreads_woocommerce_add_to_cart_list' ) ) {
	function themethreads_woocommerce_add_to_cart_list() {
		wc_get_template( 'loop/add-to-cart-list.php' );
	}
}

/**
 * Add custom woocommerce template part for carousel loop
 * @return void
 */
if ( ! function_exists( 'themethreads_woocommerce_add_to_cart_carousel' ) ) {
	function themethreads_woocommerce_add_to_cart_carousel() {
		wc_get_template( 'loop/add-to-cart-carousel.php' );
	}
}

/**
 * Add custom woocommerce template part for elegant loop
 * @return void
 */
if ( ! function_exists( 'themethreads_woocommerce_add_to_cart_elegant' ) ) {
	function themethreads_woocommerce_add_to_cart_elegant() {
		wc_get_template( 'loop/add-to-cart-elegant.php' );
	}
}

function themethreads_start_summary_foot_container() {
	
	global $product;
	
	if( $product->is_type( 'variable' ) ) {
		return'';
	}
	
	if( $product->is_in_stock() ) {
		echo '<div class="ld-product-summary-foot d-flex flex-row align-items-center">';	
	}
	
}

function themethreads_start_variable_summary_foot_container() {
	
	global $product;
	
	if( !$product->is_type( 'variable' ) ) {
		return'';
	}

	echo '<div class="ld-product-summary-foot d-flex flex-row align-items-center">';
	
}
function themethreads_end_variable_summary_foot_container() {
	
	global $product;
	
	if( !$product->is_type( 'variable' ) ) {
		return'';
	}

	echo '</div>';
}
function themethreads_end_summary_foot_container_no_stock() {

	global $product;
	
	if( $product->is_type( 'variable' ) ) {
		return'';
	}
	
	if( !$product->is_in_stock() ) {
		echo '<div class="ld-product-summary-foot d-flex flex-row align-items-center no-add-to-cart">';	
	}	
}
function themethreads_end_summary_foot_container() {
	
	global $product;
	
	if( $product->is_type( 'variable' ) ) {
		return'';
	}

	echo '</div>';
}

/**
 * Add custom woocommerce template part for heading cart
 * @return void
 */
if ( ! function_exists( 'themethreads_woocommerce_header_cart' ) ) {
    function themethreads_woocommerce_header_cart() {
        wc_get_template( 'cart/header-mini-cart.php' );
    }
}

/**
 * Enqueue theme-init js after woocommerce js
 * @return void
 */
if ( ! function_exists( 'themethreads_theme_init_js' ) ) {
    function themethreads_theme_init_js() {
		//Hook to enqueue woocommerce scripts bofore theme-init.js
		wp_dequeue_script( 'custom' );
		wp_enqueue_script( 'custom' );
    }
}

/**
 * Add heading to payment method
 * @return void
 */
if ( ! function_exists( 'themethreads_heading_payment_method' ) ) {
	function themethreads_heading_payment_method() {
		echo '<h3 class="order_review_heading">' . esc_html__( 'Payment', 'volley' ) . '</h3>';
	}
}

/**
 * Add custom woocommerce template part single product
 * @return void
 */
if ( ! function_exists( 'themethreads_woocommerce_template_single_cats' ) ) {
	function themethreads_woocommerce_template_single_cats() {
		wc_get_template( 'single-product/cats-and-tags.php' );
	}
}

/**
 * Add custom woocommerce template part single product
 * @return void
 */
if ( ! function_exists( 'themethreads_woocommerce_variations_quantity_input' ) ) {
	function themethreads_woocommerce_variations_quantity_input() {
		wc_get_template( 'single-product/add-to-cart/quantity-input.php' );
	}
}

/**
 * Add custom woocommerce template part single product
 * @return void
 */
if ( ! function_exists( 'themethreads_woocommerce_add_availability' ) ) {
	function themethreads_woocommerce_add_availability() {
		wc_get_template( 'single-product/availability.php' );
	}
}

/**
 * Add 'woocommerce' class to the body tag
 * @param  array $classes
 * @return array $classes modified to include 'woocommerce' class
 */
if ( ! function_exists( 'themethreads_woocommerce_body_class' ) ) {
	function themethreads_woocommerce_body_class( $classes ) {
		
		if ( get_post_meta( get_the_ID(), '_wp_page_template', true ) == 'page-templates/shop.php' ) {
	
			$classes[] = 'woocommerce';
		}
		
		$woo_product_style = themethreads_helper()->get_theme_option( 'woo_single_style' );
		if( is_product() && 'alt' === $woo_product_style ) {
			$classes[] = 'single-product-alt';
		}
		
	
		return $classes;
	}
}

/**
 * Default loop columns on product archives
 * @return integer products per row
 * @since  1.0.0
 */
if ( ! function_exists( 'themethreads_loop_columns' ) ) {
	function themethreads_loop_columns() {
		$columns = themethreads_helper()->get_option( 'ld_woo_columns', '3' );	
		if( empty( $columns ) ) {
			$columns = '3';
		}
		return $columns; // products per row
	}
}

/**
 * Default related loop columns on single product
 * @return integer columns per row
 * @since  1.0.0
 */
if ( ! function_exists( 'themethreads_related_loop_columns' ) ) {
	function themethreads_related_loop_columns() {
		$columns = themethreads_helper()->get_option( 'ld_woo_related_columns', '4' );	
		if( empty( $columns ) ) {
			$columns = '4';
		}
		return $columns; // products per row
	}
}

/**
 * Default up-sell loop columns on single product
 * @return integer columns per row
 * @since  1.0.0
 */
if ( ! function_exists( 'themethreads_upsell_loop_columns' ) ) {
	function themethreads_upsell_loop_columns() {
		$columns = themethreads_helper()->get_option( 'ld_woo_up_sell_columns', '4' );	
		if( empty( $columns ) ) {
			$columns = '4';
		}
		return $columns; // products per row
	}
}

/**
 * Default cross-sell loop columns
 * @return integer columns per row
 * @since  1.0.0
 */
if ( ! function_exists( 'themethreads_cross_sell_loop_columns' ) ) {
	function themethreads_cross_sell_loop_columns() {
		$columns = themethreads_helper()->get_option( 'ld_woo_cross_sell_columns', '4' );	
		if( empty( $columns ) ) {
			$columns = '4';
		}
		return $columns; // products per row
	}
}

/**
 * Get default posts per page value
 * @return int
 */
function themethreads_wc_get_current_posts_per_page_value( $force_value = null ) {	
	$posts_per_page = get_query_var( 'postsperpage' );
	if ( empty( $posts_per_page ) ) {

		if ( $force_value != null && intval( $force_value ) ) {
			$posts_per_page = $force_value;
		} else {
			$posts_per_page = themethreads_helper()->get_option( 'ld_woo_products_per_page', '12' );
			if ( empty( $posts_per_page ) ) {
				$posts_per_page = get_option( 'posts_per_page' );
			}
		}
	}
	return intval( $posts_per_page );
}

/**
 * Limit post on products archive
 * @return type
 */
function themethreads_wc_limit_archive_posts_per_page() {
	return themethreads_wc_get_current_posts_per_page_value();
}

/**
 * Add postsperpage var to custom query
 * @param array $vars
 * @return string
 */
function themethreads_wc_add_custom_query_var( $vars ){
  $vars[] = "postsperpage";
  return $vars;
}

/**
 * Get values to post per pages dropdown list
 * @return type
 */
function themethreads_wc_get_posts_per_page_dropdown_values( $add_value = null ) {
  
	$current_value = themethreads_wc_get_current_posts_per_page_value( $add_value );

	$values = array( 10,20,30,40,50,60,70,80,90,100 );

	if ( ! in_array( $current_value, $values ) ) {
		$values[] = $current_value;
		sort( $values );
	}

	if ( ! in_array( $add_value, $values ) ) {
		$values[] = $add_value;
		sort( $values );
	}

	$defined_posts_per_page = intval( themethreads_helper()->get_option( 'ld_woo_products_per_page' ) );
	if ( ! empty( $defined_posts_per_page ) &&  ! in_array( $defined_posts_per_page, $values ) ) {
		$values[] = themethreads_helper()->get_option( 'ld_woo_products_per_page' );
		sort( $values );
	}

	return $values;
}

/**
 * Custom woocommerce order by array
 * @param array $sortby
 * @return array
 */

function themethreads_woocommerce_catalog_orderby( $sortby ) {
	
	$sortby = array(
		'menu_order' => esc_html__( 'Default Order', 'volley' ),
		'popularity' => esc_html__( 'Popularity', 'volley' ),
		'rating'     => esc_html__( 'Average rating', 'volley' ),
		'date'       => esc_html__( 'Newness', 'volley' ),
		'price'      => esc_html__( 'Lowest Price', 'volley' ),
		'price-desc' => esc_html__( 'Highest Price', 'volley' )
	);
	
	return $sortby;
}

/**
 * Define woocommerce image sizes
 */
function themethreads_woocommerce_setup() {
	global $pagenow;

	if ( ! isset( $_GET['activated'] ) || $pagenow != 'themes.php' ) {
		return;
	}

	$catalog = array(
		'width'  => '250', // px
		'height' => '358', // px
		'crop'   => 1      // true
	);

	$single = array(
		'width'  => '500', // px
		'height' => '760', // px
		'crop'   => 1      // true
	);

	$thumbnail = array(
		'width'  => '50', // px
		'height' => '72', // px
		'crop'   => 1     // true
	);

	// Image sizes
	update_option( 'shop_catalog_image_size',   $catalog );   // Product category thumbs
	update_option( 'shop_single_image_size',    $single );    // Single product image
	update_option( 'shop_thumbnail_image_size', $thumbnail ); // Image gallery thumbs
	update_option( 'yith_wcwl_button_position', 'shortcode' );
}

/**
 * Empty the cart
 * @global object $woocommerce
 */
function themethreads_woocommerce_clear_cart_url() {
  global $woocommerce;
	
	if ( is_object( $woocommerce ) && isset( $_GET['empty-cart'] ) ) {
		$woocommerce->cart->empty_cart();
		$url = $woocommerce->cart->get_cart_url();
		if ( empty( $url ) ) {
			$url = get_permalink( wc_get_page_id( 'shop' ) );
		}
		wp_redirect( esc_url($url) );
	}
}

/**
 * Get current products list view type
 * @return string
 */
function themethreads_woocommerce_get_products_list_view_type() {
	
	if ( isset( $_GET['view'] ) && in_array( $_GET['view'], array( 'list', 'grid' ) ) ) {
		return $_GET['view'];
	}
	return themethreads_helper()->get_option( 'shop-products-list-view' );
}

/**
* WP Core doens't let us change the sort direction for invidual orderby params - http://core.trac.wordpress.org/ticket/17065
*
* This lets us sort by meta value desc, and have a second orderby param.
*
* @param array $args
* @return array
*/
function themethreads_woocommerce_order_by_popularity_post_clauses( $args ) {

	global $wpdb;
	$args['orderby'] = "$wpdb->postmeta.meta_value+0 DESC, $wpdb->posts.post_date DESC";
	return $args;
}

/**
* order_by_rating_post_clauses function.
*
* @param array $args
* @return array
*/
function themethreads_woocommerce_order_by_rating_post_clauses( $args ) {

	global $wpdb;
	$args['fields'] .= ", AVG( $wpdb->commentmeta.meta_value ) as average_rating ";
	$args['where'] .= " AND ( $wpdb->commentmeta.meta_key = 'rating' OR $wpdb->commentmeta.meta_key IS null ) ";
	$args['join'] .= "
	   LEFT OUTER JOIN $wpdb->comments ON($wpdb->posts.ID = $wpdb->comments.comment_post_ID)
	   LEFT JOIN $wpdb->commentmeta ON($wpdb->comments.comment_ID = $wpdb->commentmeta.comment_id)
	";
	$args['orderby'] = "average_rating DESC, $wpdb->posts.post_date DESC";
	$args['groupby'] = "$wpdb->posts.ID";

	return $args;
};

function themethreads_get_woo_header_notice() {
	
	global $woocommerce, $post;
	
	$notice = get_post_meta( $post->ID, 'themethreads_woo_header_notice', true );
	if( empty( $notice ) ) {
		return '';
	}
	
	printf( '<div class="ld-shop-notice fullwidth"><div class="container"><div class="row"><div class="col-md-12 text-center"><h3>%s</h3></div></div></div></div>', wp_kses_post( $notice ) );

}


/*
 * Tab
 */
add_filter( 'woocommerce_product_data_tabs', 'themethreads_product_settings_tabs' );
function themethreads_product_settings_tabs( $tabs ){
 
	//unset( $tabs['inventory'] );
 
	$tabs['header-note'] = array(
		'label'    => esc_html__( 'Header Note', 'volley' ),
		'target'   => 'themethreads_product_data',
		'priority' => 21,
	);
	return $tabs;
}
/*
 * Tab content
 */
add_action( 'woocommerce_product_data_panels', 'themethreads_product_panels' );
function themethreads_product_panels(){
	
	global $woocommerce, $post;
 
	echo '<div id="themethreads_product_data" class="panel woocommerce_options_panel hidden">';
 
	woocommerce_wp_textarea_input( array(
		'id'          => 'themethreads_woo_header_notice',
		'value'       => get_post_meta( $post->ID, 'themethreads_woo_header_notice', true ),
		'label'       => esc_html__( 'Notice', 'volley' ),
		'desc_tip'    => true,
		'description' => esc_html__( 'Add header notice in yellow box', 'volley' ),
	) );

	echo '</div>';

}
add_action( 'woocommerce_process_product_meta', 'themethreads_add_header_notice_field_save' );
/**
 * Save values for custom field in woo product
 * @return void
 */
function themethreads_add_header_notice_field_save( $post_id ){

	// Custom button label
	$woo_header_notice = wp_kses_post( $_POST['themethreads_woo_header_notice'] );
	if( !empty( $woo_header_notice ) ) {
		update_post_meta( $post_id, 'themethreads_woo_header_notice', $woo_header_notice );
	}
}
add_action( 'admin_head', 'themethreads_css_icon' );
function themethreads_css_icon(){
	echo '<style>
	#woocommerce-product-data ul.wc-tabs li.header-note_options.header-note_tab a:before{
		content: "\f534";
	}
	</style>';
}
