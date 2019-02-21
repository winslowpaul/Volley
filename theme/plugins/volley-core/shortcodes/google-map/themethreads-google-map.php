<?php
/**
* Shortcode Google map
*/

if( !defined( 'ABSPATH' ) )
	exit; // Exit if accessed directly

/**
* LD_Shortcode
*/
class LD_Google_Map extends LD_Shortcode {

	/**
	 * [__construct description]
	 * @method __construct
	 */
	public function __construct() {

		// Properties
		$this->slug        = 'ld_google_map';
		$this->title       = esc_html__( 'Fancy Google Maps', 'volley-core' );
		$this->description = esc_html__( 'Add a custom Google map', 'volley-core' );
		$this->icon        = 'fa fa-map';
		$this->scripts     = 'google-maps-api';
		$this->defaults    = array();

		parent::__construct();
	}
	
	public function get_params() {

		$url = themethreads_addons()->plugin_uri() . '/assets/img/sc-preview/google-maps/';
		$general = array(

			array(
				'type'        => 'select_preview',
				'param_name'  => 'style',
				'heading'     => esc_html__( 'Map Style', 'volley-core' ),
				'description' => '.',
				'value'       => array(

					array(
						'value' => 'assassinsCreedIV',
						'label' => esc_html__( 'Assassins Creed IV', 'volley-core' ),
						'image' => $url . 'assassins-creed-IV.jpg'
					),
					array(
						'label' => esc_html__( 'Blue Essence', 'volley-core' ),
						'value' => 'blueEssence',
						'image' => $url . 'blue-essence.jpg'
					),
					array(
						'label' => esc_html__( 'Classic', 'volley-core' ),
						'value' => 'classic',
						'image' => $url . 'classic.jpg'
					),
					array(
						'label' => esc_html__( 'Light Monochrome', 'volley-core' ),
						'value' => 'lightMonochrome',
						'image' => $url . 'light-monochrome.jpg'
					),
					array(
						'label' => esc_html__( 'Unsaturated Browns', 'volley-core' ),
						'value' => 'unsaturatedBrowns',
						'image' => $url . 'unsaturated-browns.jpg'
					),
					array(
						'label' => esc_html__( 'WY', 'volley-core' ),
						'value' => 'wy',
						'image' => $url . 'wy.jpg'
					),
				),
				'admin_label' => true,
				'save_always' => true,				
			),
			
			array(
				'type'        => 'textarea',
				'heading'     => esc_html__( 'Address', 'volley-core' ),
				'param_name'  => 'address',
				'group'       => esc_html__( 'Address', 'volley-core' ),
				'admin_label' => true,
			),

			array(
				'type'        => 'textfield',
				'param_name'  => 'map_height',
				'heading'     => esc_html__( 'Height', 'volley-core' ),
				'description' => esc_html__( 'Set custom google map height, in px. eg 250px', 'volley-core' ),
				'dependency' => array(
					'element' => 'adv_opts',
					'is_empty' => true,
				),
				'edit_field_class' => 'vc_col-sm-6'
			),

			array(
				'type'       => 'dropdown',
				'param_name' => 'map_marker',
				'heading'    => esc_html__( 'Marker', 'volley-core' ),
				'value'      => array(
					esc_html__( 'None', 'volley-core' )   => 'no',
					esc_html__( 'Custom', 'volley-core' ) => 'custom',
					esc_html__( 'Animated Circles', 'volley-core' )   => 'html_marker'
				),
				'edit_field_class' => 'vc_col-sm-6'
			),
			
			array(
				'type'       => 'colorpicker',
				'param_name' => 'color_marker',
				'heading'	 => esc_html__( 'Marker Color', 'volley-core' ),
				'dependency' => array(
					'element' => 'map_marker',
					'value'   => array( 'html_marker' )
				),				
			),

			array(
				'type'       => 'attach_image',
				'param_name' => 'custom_marker',
				'heading'    => esc_html__( 'Custom Marker', 'volley-core' ),
				'dependency' => array(
					'element' => 'map_marker',
					'value'   => array( 'custom' )
				),
				'edit_field_class' => 'vc_col-sm-6'
			),

			array(
				'type'        => 'checkbox',
				'param_name'  => 'multiple_markers',
				'heading'     => esc_html__( 'Multiple markers?', 'volley-core' ),
				'description' => esc_html__( 'Enable multiple markers on map', 'volley-core' ),
				'value'       => array( esc_html__( 'Yes', 'volley-core' ) => 'yes' ),
				'dependency' => array(
					'element' => 'adv_opts',
					'is_empty' => true,
				),
			),

			array(
				'type'       => 'param_group',
				'param_name' => 'marker_coordinates',
				'heading'    => esc_html__( 'Marker\'s coordinates', 'volley-core' ),
				'params'     => array(
					array(
						'type'        => 'textfield',
						'param_name'  => 'lat',
						'heading'     => esc_html__( 'Latitude', 'volley-core' ),
						'description' => esc_html__( 'Marker Latitude', 'volley-core' ),
						'admin_label' => true,
						'edit_field_class' => 'vc_col-sm-6 vc_column-with-padding'
					),

					array(
						'type'        => 'textfield',
						'param_name'  => 'long',
						'heading'     => esc_html__( 'Longitude', 'volley-core' ),
						'description' => esc_html__( 'Marker Longitude', 'volley-core' ),
						'admin_label' => true,
						'edit_field_class' => 'vc_col-sm-6'
					)
				),
				'dependency' => array(
					'element' => 'multiple_markers',
					'value' => 'yes'
				),
			),
			
		);

		$socials = vc_map_integrate_shortcode( 'ld_social_icons', 'si_', esc_html__( 'Social Identities', 'volley-core' ), 
			array(
				'exclude' => array(
					'primary_color',
					'el_id',
					'el_class'
				),
			),
			array(
				'element' => 'show_infobox',
				'value'   => 'yes'	
			)
		);

		$map = array(
			array(
				'type'       => 'dropdown',
				'param_name' => 'map_type',
				'heading'    => esc_html__( 'Map Type', 'volley-core' ),
				'value'      => array(
					esc_html__( 'Roadmap', 'volley-core' )	=> 'roadmap',
					esc_html__( 'Satellite', 'volley-core' )	=> 'satellite',
					esc_html__( 'Hybrid', 'volley-core' )	=> 'hybrid',
					esc_Html__( 'Terrain', 'volley-core' )	=> 'terrain',
				),
				'edit_field_class' => 'vc_col-sm-6 vc_column-with-padding'
			),

			array(
				'type'        => 'textfield',
				'param_name'  => 'zoom',
				'heading'     => esc_html__( 'Zoom', 'volley-core' ),
				'value'       => 14,
				'edit_field_class' => 'vc_col-sm-6'
			),

			array(
				'type'       => 'themethreads_checkbox',
				'param_name' => 'map_controls',
				'heading'    => esc_html__( 'Enable/Disable controls', 'volley-core' ),
				'value'      => array(
					esc_html__( 'Fullscreen', 'volley-core' )  => 'fullscreenControl',
					esc_html__( 'Pan', 'volley-core' )         => 'panControl',
					esc_html__( 'Rotate', 'volley-core' )      => 'rotateControl',
					esc_html__( 'Scale', 'volley-core' )       => 'scaleControl',
					esc_Html__( 'Scrollwheel', 'volley-core' ) => 'scrollwheel',
					esc_html__( 'Street View', 'volley-core' ) => 'streetViewControl',
					esc_html__( 'Zoom', 'volley-core' )        => 'zoomControl',
				)
			),



		);

		foreach( $map as &$param ) {
			$param['group'] = esc_html__( 'Map Options', 'volley-core' );
		}

		$this->params = array_merge( $general, $socials, $map );

		$this->add_extras();
	}

	protected function get_marker() {

		if( empty( $this->atts['map_marker'] ) || 'no' == $this->atts['map_marker'] ) {
			return;
		}

		if( 'custom' == $this->atts['map_marker'] && $url = themethreads_get_image( $this->atts['custom_marker'] ) ) {
			return $url;
		}
		if( 'html_marker' ==  $this->atts['map_marker'] ) {
			return themethreads_addons()->plugin_uri() . 'assets/img/markers/map-pin.svg';	
		}

		return themethreads_addons()->plugin_uri() . 'assets/img/markers/' . $this->atts['map_marker'] . '.svg';
	}

	protected function get_coordinates() {

		if( empty( $this->atts['multiple_markers'] ) ) {
			return;
		}

		$items = vc_param_group_parse_atts( $this->atts['marker_coordinates'] );
		$items = array_filter( $items );

		if( empty( $items ) ) {
			return;
		}

		$data = array();

		foreach( $items as $item ) {
			$data[] = array( ''. esc_attr( $item['lat'] ) . '', '' . esc_attr( $item['long'] ) . '' );
		}

		return $data;

	}
	
	protected function get_social() {

		$data = vc_map_integrate_parse_atts( $this->slug, 'ld_social_icons', $this->atts, 'si_' );
		if ( $data ) {

			$si = visual_composer()->getShortCode( 'ld_social_icons' )->shortcodeClass();

			if ( is_object( $si ) ) {
				echo $si->render( array_filter( $data ) );
			}
		}
	}


	protected function generate_css() {

		extract( $this->atts );

		$elements = array();
		$id = '.' . $this->get_id();

		$this->dynamic_css_parser( $id, $elements );
	}		
	
}
new LD_Google_Map;