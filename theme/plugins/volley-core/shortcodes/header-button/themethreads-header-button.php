<?php
/**
* Header Button Shortcode
*/

if( !defined( 'ABSPATH' ) ) 
	exit; // Exit if accessed directly

/**
* LD_Shortcode
*/

class LD_Header_Button extends LD_Shortcode {
	
	/**
	 * [__construct description]
	 * @method __construct
	 */
	public function __construct() {

		// Properties
		$this->slug        = 'ld_header_button';
		$this->title       = esc_html__( 'Button', 'volley-core' );
		$this->icon        = 'fa fa-square';
		$this->description = esc_html__( 'Create a custom button.', 'volley-core' );
		$this->category    = esc_html__( 'Header Modules', 'volley-core' );

		parent::__construct();
	}
	
	public function get_params() {
		
		$this->params = array_merge( 

			vc_map_integrate_shortcode( 'ld_button', 'ib_', '' ), 
			array(
				array(
					'type'             => 'themethreads_colorpicker',
					'param_name'       => 'sticky_color',
					'only_solid'       => true,
					'heading'          => esc_html__( 'Sticky Primary Color', 'volley-core' ),
					'description'      => esc_html__( 'Background color', 'volley-core' ),
					'group'            => esc_html__( 'Sticky Design Options', 'volley-core' ),
					'edit_field_class' => 'vc_column-with-padding  vc_col-sm-6',
				),
				// array(
				// 	'type'             => 'themethreads_colorpicker',
				// 	'param_name'       => 'sticky_color2',
				// 	'only_solid'       => true,
				// 	'heading'          => esc_html__( 'Sticky Secondary Color', 'volley-core' ),
				// 	'description'      => esc_html__( 'Background secondary color, will create gradient effect', 'volley-core' ),
				// 	'group'            => esc_html__( 'Sticky Design Options', 'volley-core' ),
				// 	'edit_field_class' => 'vc_col-sm-6',
				// ),
				array(
					'type'        => 'themethreads_colorpicker',
					'param_name'  => 'sticky_hover_color',
					'only_solid'  => true,
					'heading'     => esc_html__( 'Sticky Primary Hover Color', 'volley-core' ),
					'description' => esc_html__( 'Hover state background color', 'volley-core' ),
					'group'       => esc_html__( 'Sticky Design Options', 'volley-core' ),
					'edit_field_class' => 'vc_col-sm-6',
				),
				// array(
				// 	'type'        => 'themethreads_colorpicker',
				// 	'param_name'  => 'sticky_hover_color2',
				// 	'only_solid'  => true,
				// 	'heading'     => esc_html__( 'Sticky Secondary Hover Color', 'volley-core' ),
				// 	'description' => esc_html__( 'Hover state background secondary color, will create gradient effect', 'volley-core' ),
				// 	'group'       => esc_html__( 'Sticky Design Options', 'volley-core' ),
				// 	'edit_field_class' => 'vc_col-sm-6',
				// ),
				array(
					'type'       => 'subheading',
					'param_name' => 'sticky_sh_label',
					'heading'    => esc_html__( 'Label', 'volley-core' ),
					'group'      => esc_html__( 'Sticky Design Options', 'volley-core' ),
				),
				array(
					'type'       => 'themethreads_colorpicker',
					'param_name' => 'sticky_text_color',
					'only_solid' => true,
					'heading'    => esc_html__( 'Label Color', 'volley-core' ),
					'group'      => esc_html__( 'Sticky Design Options', 'volley-core' ),
					'edit_field_class' => 'vc_col-sm-6',
				),
				array(
					'type'       => 'themethreads_colorpicker',
					'param_name' => 'sticky_htext_color',
					'only_solid' => true,
					'heading'    => esc_html__( 'Label Hover Color', 'volley-core' ),
					'group'      => esc_html__( 'Sticky Design Options', 'volley-core' ),
					'edit_field_class' => 'vc_col-sm-6',
				),
				array(
					'type'       => 'subheading',
					'param_name' => 'sticky_sh_border',
					'heading'    => esc_html__( 'Border', 'volley-core' ),
					'group'      => esc_html__( 'Sticky Design Options', 'volley-core' ),
				),
				array(
					'type'       => 'themethreads_colorpicker',
					'param_name' => 'sticky_border_color',
					'only_solid' => true,
					'heading'    => esc_html__( 'Border Color', 'volley-core' ),
					'group'      => esc_html__( 'Sticky Design Options', 'volley-core' ),
					'edit_field_class' => 'vc_col-sm-6',
				),
				array(
					'type'       => 'themethreads_colorpicker',
					'param_name' => 'sticky_hborder_color',
					'only_solid' => true,
					'heading'    => esc_html__( 'Border Hover Color', 'volley-core' ),
					'group'      => esc_html__( 'Sticky Design Options', 'volley-core' ),
					'edit_field_class' => 'vc_col-sm-6',
				),
					
			) 
		);

	}

	protected function get_button() {

		$data = vc_map_integrate_parse_atts( $this->slug, 'ld_button', $this->atts, 'ib_' );
		$data['el_class'] = ' ' . $this->get_id();
		
		if ( $data ) {

			$btn = visual_composer()->getShortCode( 'ld_button' )->shortcodeClass();

			if ( is_object( $btn ) ) {
				echo $btn->render( array_filter( $data ) );
			}
		}
	}
	
	public function generate_css() {
		
		extract( $this->atts );
		
		$elements     = array();
		$id           = '.' .$this->get_id();
		
		if( ! empty( $sticky_color ) && isset( $sticky_color ) ) {
			$elements[themethreads_implode( '.is-stuck %1$s' )]['color'] = $sticky_color;
			$elements[themethreads_implode( '.is-stuck %1$s' )]['border-color'] = $sticky_color;
			$elements[themethreads_implode( '.is-stuck %1$s.btn-solid' )]['background-color'] = $sticky_color;
		}

		if( ! empty( $sticky_hover_color ) && isset( $sticky_hover_color ) ) {
			$elements[themethreads_implode( array( '.is-stuck %1$s:hover' ) )]['border-color'] = $sticky_hover_color;
			$elements[themethreads_implode( array( '.is-stuck %1$s:hover, .is-stuck %1$s.btn-solid:hover' ) )]['background-color'] = $sticky_hover_color;
		}

		if ( !empty( $sticky_text_color ) && isset( $sticky_text_color ) ) {
			$elements[themethreads_implode( '.is-stuck %1$s' )]['color'] = $sticky_text_color;
		}

		if ( !empty( $sticky_htext_color ) && isset( $sticky_htext_color ) ) {
			$elements[themethreads_implode( '.is-stuck %1$s:hover' )]['color'] = $sticky_htext_color;
		}

		if ( !empty( $sticky_border_color ) && isset( $sticky_border_color ) ) {
			$elements[themethreads_implode( '.is-stuck %1$s' )]['border-color'] = $sticky_border_color;
		}

		if ( !empty( $sticky_hborder_color ) && isset( $sticky_hborder_color ) ) {
			$elements[themethreads_implode( '.is-stuck %1$s:hover' )]['border-color'] = $sticky_hborder_color;
		}
	
		$this->dynamic_css_parser( $id, $elements );	
		
	}

	
}
new LD_Header_Button;