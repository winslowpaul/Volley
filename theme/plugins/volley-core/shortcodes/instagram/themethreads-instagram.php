<?php
/**
* Shortcode Instagram
*/

if( !defined( 'ABSPATH' ) )
	exit; // Exit if accessed directly

/**
* LD_Shortcode
*/
class LD_Instagram extends LD_Shortcode {

	/**
	 * [__construct description]
	 * @method __construct
	 */
	public function __construct() {

		// Properties
		$this->slug        = 'ld_instagram';
		$this->title       = esc_html__( 'Instagram', 'volley-core' );
		$this->description = esc_html__( 'Add instagram feed with button', 'volley-core' );
		$this->icon        = 'fa fa-instagram';

		parent::__construct();
	}

	public function get_params() {

		$params = array(

			array(
				'id'  => 'limit',
				'std' => 5,
				'edit_field_class' => 'vc_column-with-padding vc_col-sm-4',
			),
			array(
				'type'       => 'dropdown',
				'param_name' => 'images_per_row',
				'heading'    => esc_html__( 'Columns', 'volley-core' ),
				'value'      => array(
					1,
					2,
					3,
					4,
					5,
					6,
				),
				'std' => 5,
				'edit_field_class' => 'vc_col-sm-4',
			),
			array(
				'type' => 'dropdown',
				'param_name' => 'columns_gap',
				'heading' => esc_html__( 'Columns Gap', 'volley-core' ),
				'description' => esc_html__( 'Specify columns spacing.', 'volley-core' ),
				'value' => array(
					esc_html__( 'None', 'volley-core' )  => '',
					2,
					4,
					6,
					8,
				),
				'edit_field_class' => 'vc_col-sm-4',
			),
			array(
				'type'        => 'checkbox',
				'param_name'  => 'stretch',
				'heading'     => esc_html__( 'Equal Height Images', 'volley-core' ),
				'description' => esc_html__( 'Enable to make all images having euql heights.', 'volley-core' ),
				'value'      => array( 
					esc_html__( 'Yes', 'volley-core' ) => 'yes' 
				),
				'std' => '',
			),
			array(
				'type'        => 'themethreads_colorpicker',
				'param_name'  => 'overlay_color',
				'heading'     => esc_html__( 'Overlay Color', 'volley-core' ),
				'description' => esc_html__( 'Pick a custom color for the overlay', 'volley-core' ),
				'group'       => esc_html__( 'Design Options', 'volley-core' ),
			)

		);

		$design = array(

			array(
				'type'       => 'css_editor',
				'param_name' => 'css',
				'heading'    => esc_html__( 'CSS box', 'volley-core' ),
				'group'      => esc_html__( 'Design Options', 'volley-core' ),
			),

		);

		$this->params = array_merge( $params, $design );
		$this->add_extras();
	}
	
	protected function get_columns() {

		$columns = $this->atts['images_per_row'];
		if( empty(  $columns ) || '5' === $columns ) {
			return;
		}

		return "data-list-columns=". $columns ;
		
	}
	protected function get_columns_gaps() {

		$columns_gap = $this->atts['columns_gap'];
		if( empty( $columns_gap ) ) {
			return;
		}

		return "data-list-gap=". $columns_gap ;
		
	}
	
	protected function get_stretch() {
		
		$enable = $this->atts['stretch'];
		if( empty( $enable ) ) {
			return;
		}
	
		return 'themethreads-stretch-images';
	
	}
	
	protected function get_images() {

		$limit = $this->atts['limit'];
		//if( 'single' === $style ) { $limit = 1; };
		$access_token = themethreads_helper()->get_option( 'instagram-token' );
		
		if( empty( $access_token ) ) {
			return wp_kses_post( _e( '<div class="alert alert-danger">Please, check you have set the access token in Theme Option Panel</div>', 'volley-core' ) );
		}
		
		$remote_wp    = wp_remote_get( 'https://api.instagram.com/v1/users/self/media/recent/?access_token=' . $access_token . '&count=' . $limit .'' );
		
		$media_array = json_decode( $remote_wp['body'] );
		
		if( $remote_wp['response']['code'] == 200 ) {

			foreach ( $media_array->data as $item ) {
				
				$alt = isset( $item->caption->text ) ? $item->caption->text : '';
				$label = isset( $item->caption->text ) ? '<span>' . $item->caption->text . '</span>' : '';
				
				echo '<li><a class="themethreads-ig-feed-overlay" target="_blank" href="' . esc_url( $item->link ) . '"><i class="fa fa-instagram"></i>' . $label . '</a><img src="' . esc_url( $item->images->standard_resolution->url ) . '"  alt="' . esc_attr( $alt ) . '" /></li>';
				
			}
		
		} elseif ( $remote_wp['response']['code'] == 400 ) {

			echo '<div class="alert alert-danger">' . $remote_wp['response']['message'] . ':' . $media_array->meta->error_message . '</div>';

		}

	}
	
	protected function generate_css() {
		
		extract( $this->atts );

		$elements = array();
		$id = '.' . $this->get_id();

		if( ! empty( $overlay_color ) ) {
			$elements[ themethreads_implode( '%1$s .themethreads-ig-feed-overlay' ) ]['background'] = esc_attr( $overlay_color );
		}

		$this->dynamic_css_parser( $id, $elements );
	}
	

}
new LD_Instagram;