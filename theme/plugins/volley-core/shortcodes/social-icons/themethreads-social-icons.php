<?php
/**
* Shortcode Social Icons
*/

if( !defined( 'ABSPATH' ) )
	exit; // Exit if accessed directly

/**
* LD_Shortcode
*/
class LD_Social_Icons extends LD_Shortcode {

	/**
	 * [__construct description]
	 * @method __construct
	 */
	public function __construct() {

		// Properties
		$this->slug        = 'ld_social_icons';
		$this->title       = esc_html__( 'Social Icons', 'volley-core' );
		$this->description = esc_html__( 'Social Icons', 'volley-core' );
		$this->icon        = 'fa fa-facebook';

		parent::__construct();
	}

	public function get_params() {

		$url = themethreads_addons()->plugin_uri() . '/assets/img/sc-preview/social-icons/';

		$this->params = array(

			array(
				'type'       => 'select_preview',
				'param_name' => 'style',
				'heading'    => esc_html__( 'Style', 'volley-core' ),
				'value'      => array(

					array(
						'value' => '',
						'label' => esc_html__( 'Default', 'volley-core' ),
						'image' => $url . 'default.svg'
					),

					array(
						'label' => esc_html__( 'Brand Colors', 'volley-core' ),
						'value' => 'branded-text',
						'image' => $url . 'brand-color.svg'
					),

					array(
						'label' => esc_html__( 'Brand Fills', 'volley-core' ),
						'value' => 'branded',
						'image' => $url . 'brand-fill.svg'
					),
				),
				'save_always' => true,
			),

			array(
				'type'       => 'dropdown',
				'param_name' => 'size',
				'heading'    => esc_html__( 'Size', 'volley-core' ),
				'value'      => array(
					esc_html__( 'Small ( 30px )', 'volley-core' )  => 'social-icon-sm',
					esc_html__( 'Medium ( 48px )', 'volley-core' ) => 'social-icon-md',
					esc_html__( 'Large ( 55px )', 'volley-core' )  => 'social-icon-lg'
				),
				'edit_field_class' => 'vc_col-md-6'
			),

			array(
				'type'       => 'dropdown',
				'param_name' => 'shape',
				'heading'    => esc_html__( 'Shape', 'volley-core' ),
				'value'      => array(
					esc_html__( 'None', 'volley-core' )       => '',
					esc_html__( 'Square', 'volley-core' )     => 'square',
					esc_html__( 'Round', 'volley-core' )      => 'round',
					esc_html__( 'Circle', 'volley-core' )     => 'circle',
				),
				'edit_field_class' => 'vc_col-md-6'
			),

			array(
				'type'       => 'dropdown',
				'param_name' => 'scheme',
				'heading'    => esc_html__( 'Color Scheme', 'volley-core' ),
				'value'      => array(
					esc_html__( 'Default', 'volley-core' ) => '',
					esc_html__( 'Light', 'volley-core' )   => 'scheme-white',
					esc_html__( 'Gray', 'volley-core' )    => 'scheme-gray',
					esc_html__( 'Dark', 'volley-core' )    => 'scheme-dark'
				),
				'dependency'  => array(
					'element' => 'style',
					'value_not_equal_to' => array( 'branded', 'branded-text' ),
				),
				'edit_field_class' => 'vc_col-md-6'
			),

			array(
				'type'       => 'dropdown',
				'param_name' => 'orientation',
				'heading'    => esc_html__( 'Direction', 'volley-core' ),
				'value'      => array(
					esc_html__( 'Horizontal', 'volley-core' ) => '',
					esc_html__( 'Vertical', 'volley-core' )   => 'vertical'
				),
				'edit_field_class' => 'vc_col-md-6'
			),

			array(
				'type'       => 'param_group',
				'param_name' => 'identities',
				'heading'    => esc_html__( 'Identities', 'volley-core' ),
				'params'     => array(

					array(
						'id' => 'network',
						'edit_field_class' => 'vc_col-sm-6 vc_column-with-padding'
					),

					array(
						'type'        => 'textfield',
						'param_name'  => 'url',
						'heading'     => esc_html__( 'URL (Link)', 'volley-core' ),
						'description' => esc_html__(  'Add social link', 'volley-core' ),
						'edit_field_class' => 'vc_col-sm-6'
					)
				)
			),

			array(
				'type'        => 'textfield',
				'param_name'  => 'font_size',
				'heading'     => esc_html__( 'Size', 'volley-core' ),
				'description' => esc_html__( 'Add size in pixels e.g 15px', 'volley-core' ),
				'group'       => esc_html__( 'Design Options', 'volley-core' ),
				'edit_field_class' => 'vc_col-sm-12',
			),

			array(
				'type'        => 'colorpicker',
				'param_name'  => 'primary_color',
				'heading'     => esc_html__( 'Primary Color', 'volley-core' ),
				'group'       => esc_html__( 'Design Options', 'volley-core' ),
				'edit_field_class' => 'vc_col-sm-6',
			),

			array(
				'type'        => 'colorpicker',
				'param_name'  => 'hover_color',
				'heading'     => esc_html__( 'Hover Color', 'volley-core' ),
				'group'       => esc_html__( 'Design Options', 'volley-core' ),
				'edit_field_class' => 'vc_col-sm-6',
			),

			array(
				'type'        => 'colorpicker',
				'param_name'  => 'bg_color',
				'heading'     => esc_html__( 'Background Color', 'volley-core' ),
				'group'       => esc_html__( 'Design Options', 'volley-core' ),
				'dependency'  => array(
					'element' => 'shape',
					'value' => array( 'square', 'round', 'circle', 'rectangle' )
				),
				'edit_field_class' => 'vc_col-sm-6',
			),

			array(
				'type'        => 'colorpicker',
				'param_name'  => 'hbg_color',
				'heading'     => esc_html__( 'Hover Background Color', 'volley-core' ),
				'group'       => esc_html__( 'Design Options', 'volley-core' ),
				'dependency'  => array(
					'element' => 'shape',
					'value'   => array( 'square', 'round', 'circle', 'rectangle' )
				),
				'edit_field_class' => 'vc_col-sm-6',
			),

			array(
				'type'       => 'colorpicker',
				'param_name' => 'border_color',
				'heading'    => esc_html__( 'Border Color', 'volley-core' ),
				'group'      => esc_html__( 'Design Options', 'volley-core' ),
				'dependency' => array(
					'element' => 'shape',
					'value' => 'square'
				),
				'edit_field_class' => 'vc_col-sm-6',
			),

		);

		$this->add_extras();
	}

	public function generate_css() {

		extract( $this->atts );

		$elements = array();

		$id = '.' . $this->get_id();
		$out = '';

		$elements['%1$s.social-icon'] = array (
			'font-size' => $font_size
		);

		$elements['%1$s.social-icon li a']['color'] = isset( $primary_color ) ? $primary_color : '';
		$elements['%1$s.social-icon li']['border-color'] = isset( $border_color ) ? $border_color : '';
		$elements['%1$s.social-icon li a:hover']['color'] = isset( $hover_color ) ? $hover_color : '';
		$elements['%1$s.social-icon li a']['background-color'] = isset( $bg_color ) ? $bg_color : '';
		$elements['%1$s.social-icon li a:hover']['background-color'] = isset( $hbg_color ) ? $hbg_color : '';

		$this->dynamic_css_parser( $id, $elements );
	}
}
new LD_Social_Icons;