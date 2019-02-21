<?php
/**
* Shortcode Header Text
*/

if( !defined( 'ABSPATH' ) )
	exit; // Exit if accessed directly

/**
* LD_Shortcode
*/
class LD_Header_Spacing extends LD_Shortcode {

	/**
	 * [__construct description]
	 * @method __construct
	 */
	public function __construct() {

		// Properties
		$this->slug        = 'ld_header_spacing';
		$this->title       = esc_html__( 'Horizontal Spacing', 'volley-core' );
		$this->description = esc_html__( 'Add Horizontal spacing', 'volley-core' );
		$this->icon        = 'fa fa-star';
		$this->category    = esc_html__( 'Header Modules', 'volley-core' );

		parent::__construct();

	}
	
	public function get_params() {

		$this->params = array(
			
			array(
				'type'        => 'themethreads_slider',
				'param_name'  => 'height',
				'heading'     => esc_html__( 'Height', 'volley-core' ),
				'description' => esc_html__( 'Add height for horizontal spacing', 'volley-core' ),
				'min'         => 5,
				'max'         => 100,
				'step'        => 1,
				'std'         => 30,
			),

		);
	}

	
	protected function generate_css() {

		extract( $this->atts );

		$elements = array();
		$id = '.' . $this->get_id();
		
		if( !empty( $height ) ) {
			$elements[ themethreads_implode( '%1$s' ) ]['height'] = $height . 'px';
		}

		$this->dynamic_css_parser( $id, $elements );

	}

}
new LD_Header_Spacing;