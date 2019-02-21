<?php
/**
* Shortcode Freakin Image Element
*/

if( ! defined( 'ABSPATH' ) )
	exit; // Exit if accessed directly
	
/**
* LD_Shortcode
*/
class LD_Freakin_Image extends LD_Shortcode {

	/**
	 * Construct
	 * @method __construct
	 */
	public function __construct() {

		// Properties
		$this->slug            = 'ld_freakin_image';
		$this->title           = esc_html__( 'Freakin Image', 'volley-core' );
		$this->description     = esc_html__( 'Add freakin image', 'volley-core' );
		$this->icon            = 'fa fa-image';

		parent::__construct();
	}
	
	public function get_params() {
		
		$this->params = array(

			array(
				'type'       => 'themethreads_attach_image',
				'param_name' => 'image',
				'heading'    => esc_html__( 'Image', 'volley-core' ),
				'descripton' => esc_html__( 'Add image from gallery or upload new', 'volley-core' ),
			),
			array(
				'type'       => 'dropdown',
				'param_name' => 'direction',
				'heading'    => esc_html__( 'Direction', 'volley-core' ),
				'value' => array(
					esc_html__( 'Right', 'volley-core' ) => '',
					esc_html__( 'Left', 'volley-core' )  => 'threads-freak-to-left',
				),
			),
			array(
				'type'       => 'themethreads_colorpicker',
				'param_name' => 'color',
				'heading'    => esc_html__( 'Background', 'volley-core' ),
				'group'      => esc_html__( 'Design Options', 'volley-core' ),
				'edit_field_class' => 'vc_col-sm-6',
			),
			
		);

		$this->add_extras();
	
	}

	protected function get_image() {

		// check
		if( empty( $this->atts['image'] ) ) {
			return;
		}
		
		$alt = get_post_meta( $this->atts['image'], '_wp_attachment_image_alt', true );
		$image_opts = array();
		
		if( preg_match( '/^\d+$/', $this->atts['image'] ) ){
			$image  = '<div class="threads-frickin-img-holder"><figure data-responsive-bg="true">' . wp_get_attachment_image( $this->atts['image'], 'full', false, $image_opts ) . '</figure></div>';
		} else {
			$image = '<div class="threads-frickin-img-holder"><figure data-responsive-bg="true"><img src="' . esc_url( $this->atts['image'] ) . '" alt="' . esc_attr( $alt ) . '" /></figure></div>';
		}

		echo $image;

	}

	protected function generate_css() {

		extract( $this->atts );

		$elements = array();
		$id = '.' . $this->get_id();
		
		if( !empty( $color ) ) {
			$elements[ themethreads_implode( '%1$s .threads-frickin-img-bg' ) ]['background'] = $color;
		}
		
		$this->dynamic_css_parser( $id, $elements );
	}
	
}
new LD_Freakin_Image;