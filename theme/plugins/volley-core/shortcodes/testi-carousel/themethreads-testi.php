<?php
/**
* Shortcode Testimonial Slider
*/

if( !defined( 'ABSPATH' ) )
	exit; // Exit if accessed directly

/**
* LD_Shortcode
*/
class LD_Testi extends LD_Shortcode {

	/**
	 * Construct
	 * @method __construct
	 */
	public function __construct() {

		// Properties
		$this->slug          = 'ld_testi';
		$this->title         = esc_html__( 'Testimonial Slider Item', 'volley-core' );
		$this->icon          = 'fa fa-comments';
		$this->description   = esc_html__( 'Add testimonial slider item.', 'volley-core' );
		$this->as_child      = array( 'only' => 'ld_testi_carousel' );

		parent::__construct();
	}

	/**
	 * Get params
	 * @return array
	 */
	public function get_params() {

		$this->params = array(
			
			array(
				'type' => 'textfield',
				'param_name' => 'author',
				'heading' => esc_html__( 'Author', 'volley-core' ),
				'edit_field_class' => 'vc_column-with-padding vc_col-sm-6',
				'admin_label' => true,
			),
			array(
				'type'       => 'dropdown',
				'param_name' => 'author_weight',
				'heading'    => esc_html__( 'Font Weight', 'volley-core'  ),
				'value'      => array(
					esc_html__( 'Default', 'volley-core' )  => '',
					esc_html__( 'Light', 'volley-core' )    => 'font-weight-light',
					esc_html__( 'Normal', 'volley-core' )   => 'font-weight-normal',
					esc_html__( 'Medium', 'volley-core' )   => 'font-weight-medium',
					esc_html__( 'Semibold', 'volley-core' ) => 'font-weight-semibold',
					esc_html__( 'Bold', 'volley-core' )     => 'font-weight-bold',
				),
				'edit_field_class' => 'vc_col-sm-6'
			),
			array(
				'type'        => 'textfield',
				'param_name'   => 'text',
				'heading'      => esc_html__( 'Info', 'volley-core' ),
				'description'  => esc_html__( 'Extra info, for Left Nav style', 'volley-core' ),
				'edit_field_class' => 'vc_col-sm-6',
			),
			array(
				'type'        => 'themethreads_attach_image',
				'param_name'  => 'image',
				'heading'     => esc_html__( 'Avatar', 'volley-core' ),
				'edit_field_class' => 'vc_col-sm-6'
			),
			array(
				'type'       => 'dropdown',
				'param_name' => 'avatar_size',
				'heading'    => esc_html__( 'Avatar Size', 'volley-core'  ),
				'value'      => array(
					esc_html__( 'Default', 'volley-core' )     => '',
					esc_html__( 'Small', 'volley-core' )       => 'testimonial-avatar-sm',
					esc_html__( 'Large', 'volley-core' )       => 'testimonial-avatar-lg',
					esc_html__( 'Extra Large', 'volley-core' ) => 'testimonial-avatar-xl',
				),
				'edit_field_class' => 'vc_col-sm-6'
			),
			array(
				'type'        => 'textarea_html',
				'param_name'  => 'content',
				'holder'      => 'div',
				'heading'     => esc_html__( 'Blockquote', 'volley-core' ),
			),
			
		);

		$this->add_extras();
	}

	public function render( $atts, $content = '' ) {

		global $themethreads_testi;

		$atts = vc_map_get_attributes( $this->slug, $atts );
		$atts = $this->before_output( $atts, $content );
		$atts['_id'] = uniqid( $this->slug .'_' );
		$atts['content'] = ld_helper()->do_the_content( $content );

		$themethreads_testi[]  = $atts;
	}

}
new LD_Testi;