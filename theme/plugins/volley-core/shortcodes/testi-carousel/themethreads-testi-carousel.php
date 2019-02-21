<?php
/**
* Shortcode Testimonial Carousel
*/

if( !defined( 'ABSPATH' ) )
	exit; // Exit if accessed directly

/**
* LD_Shortcode
*/
class LD_Testi_Carousel extends LD_Shortcode {

	/**
	 * Construct
	 * @method __construct
	 */
	public function __construct() {

		// Properties
		$this->slug          = 'ld_testi_carousel';
		$this->title         = esc_html__( 'Testimonial Carousel', 'volley-core' );
		$this->icon          = 'fa fa-comments';
		$this->description   = esc_html__( 'Create Testimonial Carousel.', 'volley-core' );
		$this->is_container  = true;
		$this->show_settings_on_create = false;
		$this->as_parent     = array ( 'only' => 'ld_testi' );

		parent::__construct();
	}

	/**
	 * Get params
	 * @return array
	 */
	public function get_params() {

		$this->params = array(
			
			array(
				'type'        => 'dropdown',
				'param_name'  => 'template',
				'heading'     => esc_html__( 'Style', 'one' ),
				'description' => esc_html__( 'Select a style for the carousel', 'volley-core' ),
				'value'       => array(
					esc_html__( 'Default', 'volley-core' ) => '',
					esc_html__( 'Left Navigation', 'volley-core' ) => 'left-nav',
				),
			)
			
		);
		$this->add_extras();
	}

	public function before_output( $atts, &$content ) {

		global $themethreads_testi;

		$themethreads_testi = array();

		//parse vc_accordion_tab shortcode
		do_shortcode( $content );

		$atts['items'] = $themethreads_testi;

		return $atts;
	}
	
	protected function generate_css() {

		extract( $this->atts );

		$elements = array();
		$id = '.' .$this->get_id();


		$this->dynamic_css_parser( $id, $elements );
	}

}
new LD_Testi_Carousel;
class WPBakeryShortCode_LD_Testi_Carousel extends WPBakeryShortCodesContainer {}

// Testimonial Item
include_once 'themethreads-testi.php';