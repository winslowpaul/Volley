<?php
/**
* Shortcode Woo Products
*/

if( !defined( 'ABSPATH' ) )
	exit; // Exit if accessed directly

/**
* LD_Shortcode
*/
class LD_Woo_Products extends LD_Shortcode {

	/**
	* [$taxonomies description]
	* @var array
	*/
	private $taxonomies = array( 'product_cat' );

	/**
	 * [__construct description]
	 * @method __construct
	 */
	public function __construct() {

		// Properties
		$this->slug = 'ld_woo_products';
		$this->title = esc_html__( 'Woo Products Carousel Widget', 'volley-core' );
		$this->icon = 'fa fa-shopping-bag';
		$this->description = esc_html__( 'Display Woo products carousel widget.', 'volley-core' );
		
		require_once vc_path_dir( 'CONFIG_DIR', 'grids/vc-grids-functions.php' );
		if ( 'vc_get_autocomplete_suggestion' === vc_request_param( 'action' ) || 'vc_edit_form' === vc_post_param( 'action' ) ) {
			// Narrow data taxonomies
			add_filter( 'vc_autocomplete_'. $this->slug . '_taxonomies_callback', array( $this,'autocomplete_taxonomies_field_search' ) );
			add_filter( 'vc_autocomplete_'. $this->slug . '_taxonomies_render', array($this, 'render_autocomplete_field') );

		}		
		
		parent::__construct();
	}

	public function get_params() {

		$this->params = array(


			array(
				'type'        => 'autocomplete',
				'param_name'  => 'taxonomies',
				'heading'     => esc_html__( 'Categories', 'volley-core' ),
				'description' => esc_html__( 'Show products only from these categories', 'volley-core' ),
				'settings'    => array(
					'multiple'       => true,
					'min_length'     => 1,
					'groups'         => true,
					'no_hide'        => true, // In UI after select doesn't hide an select list
					'unique_values'  => true,
					'display_inline' => true,
					'delay'          => 500,
					'auto_focus'     => true,
				),
				'param_holder_class' => 'vc_not-for-custom',
			),

			array(
				'type'        => 'dropdown',
				'param_name'  => 'orderby',
				'heading'     => esc_html__( 'Order by', 'volley-core' ),
				'admin_label' => true,
				'value'       => array(
					esc_html__( 'Rand', 'volley-core' )       => 'rand',
					esc_html__( 'Date', 'volley-core' )       => 'date',
					esc_html__( 'Price', 'volley-core' )      => 'price',
					esc_html__( 'Popularity', 'volley-core' ) => 'popularity',
					esc_html__( 'Rating', 'volley-core' )     => 'rating',
					esc_html__( 'Title', 'volley-core' )      => 'title',
				),
			),
			array(
				'type'        => 'dropdown',
				'param_name'  => 'order',
				'heading'     => esc_html__( 'Order', 'volley-core' ),
				'value'       => array(
					esc_html__( 'Ascending', 'volley-core' )  => 'asc',
					esc_html__( 'Descending', 'volley-core' ) => 'desc'
				),
				'dependency'  => array( 'element' => 'orderby', 'value' => array( 'date', 'price', 'title' ) ),
				'admin_label' => true
			),
			array(
				'type'       => 'dropdown',
				'param_name' => 'show',
				'heading'    => esc_html__( 'Show', 'volley-core' ),
				'value'      => array(
					esc_html__( 'All Products', 'volley-core' ) 	    => '',
					esc_html__( 'Featured Products', 'volley-core' ) => 'featured',
					esc_html__( 'On-sale Products', 'volley-core' )  => 'onsale',
				),
				'admin_label' => true
			),
			array(
				'id' => 'limit'
			),
		);

		$this->add_extras();
	}
	
	/**
	 * @since 4.5.2
	 *
	 * @param $search_string
	 *
	 * @return array|bool
	 */
	function autocomplete_taxonomies_field_search( $search_string ) {
		$data = array();
		$vc_taxonomies = get_terms( $this->taxonomies, array(
			'hide_empty' => false,
			'search'     => $search_string,
		) );
		if ( is_array( $vc_taxonomies ) && ! empty( $vc_taxonomies ) ) {
			foreach ( $vc_taxonomies as $t ) {
				if ( is_object( $t ) ) {
					$data[] = ld_helper()->get_term_object( $t );
				}
			}
		}

		return $data;
	}

	function render_autocomplete_field( $term ) {
		return ld_helper()->vc_autocomplete_taxonomies_field_render($term, 'product_cat');
	}
	
	
}
new LD_Woo_Products;