<?php
/**
* Custom Button Shortcode
*/

if( !defined( 'ABSPATH' ) ) 
	exit; // Exit if accessed directly

/**
* LD_Shortcode
*/

class LD_Button extends LD_Shortcode {
	
	/**
	 * [__construct description]
	 * @method __construct
	 */
	public function __construct() {

		// Properties
		$this->slug        = 'ld_button';
		$this->title       = esc_html__( 'Button', 'volley-core' );
		$this->icon        = 'fa fa-play-circle';
		$this->description = esc_html__( 'Create a custom button.', 'volley-core' );

		parent::__construct();
	}
	
	public function get_params() {
		
		
		$url = themethreads_addons()->plugin_uri() . '/assets/img/sc-preview/button/';
		
		$icon_params = themethreads_get_icon_params( true, '', array( 'fontawesome', 'linea' ), array( 'align', 'color', 'hcolor' ), 'i_' );
		
		$icon_button_params = array(
			array(
				'type' => 'dropdown',
				'param_name' => 'i_position',
				'heading' => esc_html__( 'Icon Position', 'volley-core' ),
				'value' => array(
					esc_html__( 'Right', 'volley-core' )  => '',
					esc_html__( 'Left', 'volley-core' )   => 'left',
					esc_html__( 'Bottom', 'volley-core' ) => 'bottom',
					esc_html__( 'Top', 'volley-core' )    => 'top',
				),
				'dependency' => array(
					'element' => 'i_add_icon',
					'not_empty' => true
				),
				'edit_field_class' => 'vc_col-sm-6',
			),
			array(
				'type'       => 'dropdown',
				'param_name' => 'i_shape',
				'heading'    => esc_html__( 'Icon shape', 'volley-core' ),
				'value'      => array(
					esc_html__( 'None', 'volley-core' )       => '',
					esc_html__( 'Square', 'volley-core' )     => 'btn-icon-square',
					esc_html__( 'Semi Round', 'volley-core' ) => 'btn-icon-semi-round',
					esc_html__( 'Round', 'volley-core' )      => 'btn-icon-round',
					esc_html__( 'Circle', 'volley-core' )     => 'btn-icon-circle',
				),
				'dependency' => array(
					'element' => 'i_add_icon',
					'not_empty' => true
				),
				'edit_field_class' => 'vc_col-sm-4',
			),
			array(
				'type' => 'dropdown',
				'param_name' => 'i_shape_style',
				'heading' => esc_html__( 'Icon shape style', 'volley-core' ),
				'value' => array(
					esc_html__( 'Default', 'volley-core' ) => '',
					esc_html__( 'Solid', 'volley-core' )    => 'btn-icon-solid',
					esc_html__( 'Bordered', 'volley-core' ) => 'btn-icon-bordered',
				),
				'dependency' => array(
					'element' => 'i_shape',
					'not_empty' => true
				),
				'edit_field_class' => 'vc_col-sm-4',
			),
			array(
				'type'       => 'dropdown',
				'param_name' => 'i_shape_size',
				'heading'    => esc_html__( 'Icon Shape size', 'volley-core' ),
				'value'      => array(
					esc_html__( 'Default', 'volley-core' )     => '',
					esc_html__( 'Extra Small', 'volley-core' ) => 'btn-icon-xsm',
					esc_html__( 'Small', 'volley-core' )       => 'btn-icon-sm',
					esc_html__( 'Medium', 'volley-core' )      => 'btn-icon-md',
					esc_html__( 'Large', 'volley-core' )       => 'btn-icon-lg',
					esc_html__( 'Extra Large', 'volley-core' ) => 'btn-icon-xlg',
					esc_html__( 'Custom Size', 'volley-core' ) => 'btn-icon-custom-size',
				),
				'dependency' => array(
					'element' => 'i_shape',
					'value' => array( 'btn-icon-square', 'btn-icon-semi-round', 'btn-icon-round', 'btn-icon-circle' ),
				),
				'edit_field_class' => 'vc_col-sm-4',
			),
			array(
				'type'        => 'textfield',
				'param_name'  => 'i_shape_custom_size',
				'heading'     => esc_html__( 'Icon shape custom size', 'volley-core' ),
				'description' => esc_html__( 'Add custom shape size with px. for ex. 30px', 'volley-core' ),
				'dependency'  => array(
					'element' => 'i_shape_size',
					'value'   => array( 'btn-icon-custom-size' ),
				),
			),
			array(
				'type'       => 'dropdown',
				'param_name' => 'i_ripple',
				'heading'    => esc_html__( 'Icon Ripple Effect', 'volley-core' ),
				'value'      => array(
					esc_html__( 'No', 'volley-core' )  => '',
					esc_html__( 'Yes', 'volley-core' ) => 'btn-icon-ripple',
				),
				'dependency' => array(
					'element' => 'i_shape',
					'value' => array( 'btn-icon-circle' ),
				),
				'edit_field_class' => 'vc_col-sm-4',
			),
			array(
				'type' => 'textfield',
				'param_name' => 'i_margin_left',
				'heading' => esc_html__( 'Icon Left Margin', 'volley-core' ),
				'description' => esc_html__( 'Add left margin for icon with px. for ex. 30px', 'volley-core' ),
				'dependency' => array(
					'element' => 'i_add_icon',
					'not_empty' => true
				),
				'edit_field_class' => 'vc_col-sm-4',
			),
			array(
				'type' => 'textfield',
				'param_name' => 'i_margin_right',
				'heading' => esc_html__( 'Icon Right Margin', 'volley-core' ),
				'description' => esc_html__( 'Add right margin for icon with px. for ex. 30px', 'volley-core' ),
				'dependency' => array(
					'element' => 'i_add_icon',
					'not_empty' => true
				),
				'edit_field_class' => 'vc_col-sm-4',
			),

			//Icon Box Shadow Options
			array(
				'type'        => 'checkbox',
				'heading'     => esc_html__( 'Enable icon box-shadow?', 'volley-core' ),
				'param_name'  => 'enable_icon_shadowbox',
				'description' => esc_html__( 'If checked, the icon box-shadow options will be visible', 'volley-core' ),
				'value'       => array( esc_html__( 'Yes', 'volley-core' ) => 'yes' ),
				'edit_field_class' => 'vc_col-sm-6',
				'dependency' => array(
					'element' => 'i_shape_style',
					'value'   => array( 'btn-icon-solid', 'btn-icon-bordered' ),
				),
			),
			array(
				'type' => 'param_group',
				'heading' => esc_html__( 'Icon Shadow Box Options', 'volley-core' ),
				'param_name' => 'icon_box_shadow',
				'dependency' => array(
					'element' => 'enable_icon_shadowbox',
					'not_empty' => true,
				),
				'params' => array(
					array(
						'type'        => 'dropdown',
						'param_name'  => 'inset',
						'heading'     => esc_html__( 'Inset', 'volley-core' ),
						'description' => esc_html__(  'Select if it is inset', 'volley-core' ),
						'value'      => array(
							esc_html__( 'No', 'volley-core' )  => '',
							esc_html__( 'Yes', 'volley-core' ) => 'inset',
						),
						'edit_field_class' => 'vc_col-sm-6 vc_column-with-padding'
					),
					array(
						'type'        => 'textfield',
						'param_name'  => 'x_offset',
						'heading'     => esc_html__( 'Position X', 'volley-core' ),
						'description' => esc_html__(  'Set position X in px', 'volley-core' ),
						'edit_field_class' => 'vc_col-sm-6'
					),
					array(
						'type'        => 'textfield',
						'param_name'  => 'y_offset',
						'heading'     => esc_html__( 'Position Y', 'volley-core' ),
						'description' => esc_html__(  'Set position Y in px', 'volley-core' ),
						'edit_field_class' => 'vc_col-sm-6'
					),
					array(
						'type'        => 'textfield',
						'param_name'  => 'blur_radius',
						'heading'     => esc_html__( 'Blur Radius', 'volley-core' ),
						'description' => esc_html__(  'Add blur radius in px', 'volley-core' ),
						'edit_field_class' => 'vc_col-sm-6'
					),
					array(
						'type'        => 'textfield',
						'param_name'  => 'spread_radius',
						'heading'     => esc_html__( 'Spread Radius', 'volley-core' ),
						'description' => esc_html__(  'Add spread radius in px', 'volley-core' ),
						'edit_field_class' => 'vc_col-sm-6'
					),
					array(
						'type'        => 'colorpicker',
						'param_name'  => 'shadow_color',
						'heading'     => esc_html__( 'Color', 'volley-core' ),
						'description' => esc_html__(  'Pick a color for shadow', 'volley-core' ),
						'edit_field_class' => 'vc_col-sm-6'
					),

				)
			),
			array(
				'type' => 'param_group',
				'heading' => esc_html__( 'Icon Shadow Box Options', 'volley-core' ),
				'param_name' => 'h_icon_box_shadow',
				'dependency' => array(
					'element' => 'enable_icon_shadowbox',
					'not_empty' => true,
				),
				'params' => array(
					array(
						'type'        => 'dropdown',
						'param_name'  => 'inset',
						'heading'     => esc_html__( 'Inset', 'volley-core' ),
						'description' => esc_html__(  'Select if it is inset', 'volley-core' ),
						'value'      => array(
							esc_html__( 'No', 'volley-core' )  => '',
							esc_html__( 'Yes', 'volley-core' ) => 'inset',
						),
						'edit_field_class' => 'vc_col-sm-6 vc_column-with-padding'
					),
					array(
						'type'        => 'textfield',
						'param_name'  => 'x_offset',
						'heading'     => esc_html__( 'Position X', 'volley-core' ),
						'description' => esc_html__(  'Set position X in px', 'volley-core' ),
						'edit_field_class' => 'vc_col-sm-6'
					),
					array(
						'type'        => 'textfield',
						'param_name'  => 'y_offset',
						'heading'     => esc_html__( 'Position Y', 'volley-core' ),
						'description' => esc_html__(  'Set position Y in px', 'volley-core' ),
						'edit_field_class' => 'vc_col-sm-6'
					),
					array(
						'type'        => 'textfield',
						'param_name'  => 'blur_radius',
						'heading'     => esc_html__( 'Blur Radius', 'volley-core' ),
						'description' => esc_html__(  'Add blur radius in px', 'volley-core' ),
						'edit_field_class' => 'vc_col-sm-6'
					),
					array(
						'type'        => 'textfield',
						'param_name'  => 'spread_radius',
						'heading'     => esc_html__( 'Spread Radius', 'volley-core' ),
						'description' => esc_html__(  'Add spread radius in px', 'volley-core' ),
						'edit_field_class' => 'vc_col-sm-6'
					),
					array(
						'type'        => 'colorpicker',
						'param_name'  => 'shadow_color',
						'heading'     => esc_html__( 'Color', 'volley-core' ),
						'description' => esc_html__(  'Pick a color for shadow', 'volley-core' ),
						'edit_field_class' => 'vc_col-sm-6'
					),

				)
			),

		);	

		$general_params = array(
			
		array(
				'type'       => 'select_preview',
				'param_name' => 'style',
				'heading'    => esc_html__( 'Style', 'volley-core' ),
				'value'      => array(

					array(
						'value' => 'btn-default',
						'label' => esc_html__( 'Bordered', 'volley-core' ),
						'image' => $url . 'bordered.svg'
					),
					array(
						'label' => esc_html__( 'Solid', 'volley-core' ),
						'value' => 'btn-solid',
						'image' => $url . 'solid.svg'
					),
					array(
						'label' => esc_html__( 'Text only', 'volley-core' ),
						'value' => 'btn-naked',
						'image' => $url . 'text-only.svg'
					),
					array(
						'label' => esc_html__( 'Underlined', 'volley-core' ),
						'value' => 'btn-underlined',
						'image' => $url . 'underlined.svg'
					),

				),
				'save_always' => true,
			),
		
			// Params goes here
			array(
				'type'        => 'textfield',
				'param_name'  => 'title',
				'heading'     => esc_html__( 'Text', 'volley-core' ),
				'value'       => '',
				'admin_label' => true,
				'edit_field_class' => 'vc_col-sm-6 vc_column-with-padding'
			),
			array(
				'type'       => 'dropdown',
				'param_name' => 'transformation',
				'heading'    => esc_html__( 'Text transformation', 'volley-core' ),
				'value'      => array(
					esc_html__( 'Default', 'volley-core' ) => '',
					esc_html__( 'Uppercase', 'volley-core' ) => 'text-uppercase',
					esc_html__( 'Capitalize', 'volley-core' ) => 'text-capitalize',
					esc_html__( 'Lowercase', 'volley-core' ) => 'text-lowercase',
				),
				'edit_field_class' => 'vc_col-sm-6'
			),
			array(
				'type'        => 'dropdown',
				'param_name'  => 'link_type', 
				'heading'     => esc_html__( 'Link Type', 'volley-core' ),
				'description' => esc_html__( 'Select a type of the link' ),
				'value' => array(
					esc_html__( 'Simple Click', 'one' )      => '',
					esc_html__( 'Lightbox', 'volley-core' )     => 'lightbox',
					esc_html__( 'Modal Window', 'volley-core' ) => 'modal_window',
					esc_html__( 'Local Scroll', 'volley-core' ) => 'local_scroll',
					esc_html__( 'Scroll to Section Bellow', 'volley-core' ) => 'scroll_to_section',
				),
				'edit_field_class' => 'vc_col-sm-6'
			),
			array(
				'type'             => 'textfield',
				'param_name'       => 'anchor_id',
				'heading'          => esc_html__( 'Element ID', 'volley-core' ),
				'description'      => esc_html__( 'Input the ID of the element to scroll, for ex. #Element_ID', 'volley-core' ),
				'edit_field_class' => 'vc_col-sm-6',
				'dependency'       => array(
					'element' => 'link_type',
					'value' => array( 'local_scroll', 'modal_window' ),
				),
			),
			array(
				'id'               => 'link',
				'description'      => esc_html__( 'Add the link', 'volley-core' ),
				'edit_field_class' => 'vc_col-sm-6',
				'dependency'       => array(
					'element' => 'link_type',
					'value_not_equal_to' => array( 'modal_window', 'local_scroll', 'scroll_to_section' ),
				),
			),
			array(
				'type'       => 'subheading',
				'param_name' => 'sh_styling',
				'heading'    => esc_html__( 'Styling', 'volley-core' ),
				'dependency' => array(
					'element' => 'style',
					'value_not_equal_to' => 'btn-naked',
				),
			),
			array(
				'type'       => 'dropdown',
				'param_name' => 'shape',
				'heading'    => esc_html__( 'Shape', 'volley-core' ),
				'value'      => array(
					esc_html__( 'None', 'volley-core' )    => '',
					esc_html__( 'Semi Round', 'volley-core' ) => 'semi-round',
					esc_html__( 'Round', 'volley-core' )      => 'round',
					esc_html__( 'Circle', 'volley-core' )     => 'circle'
				),
				'edit_field_class' => 'vc_col-sm-6',
				'dependency' => array(
					'element' => 'style',
					'value_not_equal_to' => array( 'btn-naked', 'btn-underlined' ),
				),
			),
			array(
				'type'       => 'dropdown',
				'param_name' => 'size',
				'heading'    => esc_html__( 'Size', 'volley-core' ),
				'value'      => array(
					esc_html__( 'Default', 'volley-core' )     => '',
					esc_html__( 'Extra Small', 'volley-core' ) => 'btn-xsm',
					esc_html__( 'Small', 'volley-core' )       => 'btn-sm',
					esc_html__( 'Medium', 'volley-core' )      => 'btn-md',
					esc_html__( 'Large', 'volley-core' )       => 'btn-lg',
					esc_html__( 'Extra Large', 'volley-core' ) => 'btn-xlg',
					esc_html__( 'Custom', 'volley-core' )      => 'btn-custom',

				),
				'edit_field_class' => 'vc_col-sm-6',
				'dependency' => array(
					'element' => 'style',
					'value_not_equal_to' => array( 'btn-naked', 'btn-underlined' ),
				),
			),
			array(
				'type'        => 'textfield',
				'param_name'  => 'custom_size',
				'heading'     => esc_html__( 'Custom Width', 'volley-core' ),
				'description' => esc_html__( 'Add custom width for button, in px.', 'volley-core' ),
				'dependency'  => array(
					'element' => 'size',
					'value'   => 'btn-custom'
				),
				'edit_field_class' => 'vc_col-sm-6',
			),
			array(
				'type'        => 'textfield',
				'param_name'  => 'custom_height',
				'heading'     => esc_html__( 'Custom Height', 'volley-core' ),
				'description' => esc_html__( 'Add custom height for button, in px.', 'volley-core' ),
				'dependency'  => array(
					'element' => 'size',
					'value'   => 'btn-custom'
				),
				'edit_field_class' => 'vc_col-sm-6',
			),
			array(
				'type'       => 'dropdown',
				'param_name' => 'border',
				'heading'    => esc_html__( 'Border Size', 'volley-core' ),
				'value'      => array(
					esc_html__( 'Default', 'volley-core' ) => 'border-thin',
					esc_html__( 'Thick', 'volley-core' )   => 'border-thick',
					esc_html__( 'Thicker', 'volley-core' ) => 'border-thicker',
				),
				'dependency' => array(
					'element' => 'style',
					'value_not_equal_to' => 'btn-naked',
				),
				'edit_field_class' => 'vc_col-sm-6',
			),			
			

		);
			
		$styling_params = array (
			
			//Group Design Options
			array(
				'type'        => 'css_editor',
				'param_name'  => 'css',
				'description' => '',
				'heading'     => esc_html__( 'CSS Box', 'volley-core' ),
				'group'       => esc_html__( 'Design Options', 'volley-core' ),
			),
			array(
				'type'             => 'themethreads_colorpicker',
				'param_name'       => 'color',
				'only_solid'       => true,
				'heading'          => esc_html__( 'Primary Color', 'volley-core' ),
				'description'      => esc_html__( 'Background color', 'volley-core' ),
				'group'            => esc_html__( 'Design Options', 'volley-core' ),
				'edit_field_class' => 'vc_column-with-padding  vc_col-sm-6',
			),
			array(
				'type'             => 'themethreads_colorpicker',
				'param_name'       => 'color2',
				'only_solid'       => true,
				'heading'          => esc_html__( 'Secondary Color', 'volley-core' ),
				'description'      => esc_html__( 'Background secondary color, will create gradient effect', 'volley-core' ),
				'group'            => esc_html__( 'Design Options', 'volley-core' ),
				'edit_field_class' => 'vc_col-sm-6',
			),
			array(
				'type'        => 'themethreads_colorpicker',
				'param_name'  => 'hover_color',
				'only_solid'  => true,
				'heading'     => esc_html__( 'Primary Hover Color', 'volley-core' ),
				'description' => esc_html__( 'Hover state background color', 'volley-core' ),
				'group'       => esc_html__( 'Design Options', 'volley-core' ),
				'edit_field_class' => 'vc_col-sm-6',
			),
			array(
				'type'        => 'themethreads_colorpicker',
				'param_name'  => 'hover_color2',
				'only_solid'  => true,
				'heading'     => esc_html__( 'Secondary Hover Color', 'volley-core' ),
				'description' => esc_html__( 'Hover state background secondary color, will create gradient effect', 'volley-core' ),
				'group'       => esc_html__( 'Design Options', 'volley-core' ),
				'edit_field_class' => 'vc_col-sm-6',
			),
			array(
				'type'        => 'themethreads_colorpicker',
				'only_solid'  => true,
				'param_name'  => 'i_color',
				'heading'     => esc_html__( 'Icon color', 'volley-core' ),
				'description' => esc_html__( 'Select icon color.', 'volley-core' ),
				'edit_field_class' => 'vc_col-sm-6',
				'dependency' => array(
					'element' => 'i_add_icon',
					'not_empty' => true
				),
				'group' => esc_html__( 'Design Options', 'volley-core' ),
			),
			array(
				'type'        => 'themethreads_colorpicker',
				'only_solid'  => true,
				'param_name'  => 'i_hcolor',
				'heading'     => esc_html__( 'Icon hover color', 'volley-core' ),
				'description' => esc_html__( 'Pick icon hover color.', 'volley-core' ),
				'edit_field_class' => 'vc_col-sm-6',
				'dependency' => array(
					'element' => 'i_add_icon',
					'not_empty' => true
				),
				'group' => esc_html__( 'Design Options', 'volley-core' ),
			),
			array(
				'type'        => 'themethreads_colorpicker',
				'param_name'  => 'i_fill_color',
				'heading'     => esc_html__( 'Icon Fill color', 'volley-core' ),
				'description' => esc_html__( 'Pick icon fill color.', 'volley-core' ),
				'edit_field_class' => 'vc_col-sm-6',
				'dependency' => array(
					'element' => 'i_shape_style',
					'value'   => array( 'btn-icon-solid' ),
				),
				'group' => esc_html__( 'Design Options', 'volley-core' ),
			),
			array(
				'type'        => 'themethreads_colorpicker',
				'param_name'  => 'i_fill_hcolor',
				'heading'     => esc_html__( 'Icon Hover Fill color', 'volley-core' ),
				'description' => esc_html__( 'Pick icon hover fill color.', 'volley-core' ),
				'edit_field_class' => 'vc_col-sm-6',
				'dependency' => array(
					'element' => 'i_shape_style',
					'value'   => array( 'btn-icon-solid' ),
				),
				'group' => esc_html__( 'Design Options', 'volley-core' ),
			),
			
			array(
				'type'        => 'themethreads_colorpicker',
				'only_solid'  => true,
				'param_name'  => 'i_fill_color2',
				'heading'     => esc_html__( 'Icon Fill color', 'volley-core' ),
				'description' => esc_html__( 'Pick icon fill color.', 'volley-core' ),
				'edit_field_class' => 'vc_col-sm-6',
				'dependency' => array(
					'element' => 'i_shape_style',
					'value'   => array( 'btn-icon-bordered' ),
				),
				'group' => esc_html__( 'Design Options', 'volley-core' ),
			),
			array(
				'type'        => 'themethreads_colorpicker',
				'only_solid'  => true,
				'param_name'  => 'i_fill_hcolor2',
				'heading'     => esc_html__( 'Icon Hover Fill color', 'volley-core' ),
				'description' => esc_html__( 'Pick icon hover fill color.', 'volley-core' ),
				'edit_field_class' => 'vc_col-sm-6',
				'dependency' => array(
					'element' => 'i_shape_style',
					'value'   => array( 'btn-icon-bordered' ),
				),
				'group' => esc_html__( 'Design Options', 'volley-core' ),
			),
			
			array(
				'type'       => 'subheading',
				'param_name' => 'sh_label',
				'heading'    => esc_html__( 'Label', 'volley-core' ),
				'group'      => esc_html__( 'Design Options', 'volley-core' ),
			),
			array(
				'type'       => 'themethreads_colorpicker',
				'param_name' => 'text_color',
				'only_solid'  => true,
				'heading'    => esc_html__( 'Label Color', 'volley-core' ),
				'group'      => esc_html__( 'Design Options', 'volley-core' ),
				'edit_field_class' => 'vc_col-sm-6',
				'dependency' => array(
					'element' => 'style',
					'value_not_equal_to' => 'btn-underlined',
				),
			),
			array(
				'type'       => 'themethreads_colorpicker',
				'param_name' => 'htext_color',
				'only_solid'  => true,
				'heading'    => esc_html__( 'Label Hover Color', 'volley-core' ),
				'group'      => esc_html__( 'Design Options', 'volley-core' ),
				'edit_field_class' => 'vc_col-sm-6',
				'dependency' => array(
					'element' => 'style',
					'value_not_equal_to' => 'btn-underlined',
				),
			),
			array(
				'type'        => 'textfield',
				'param_name'  => 'fs',
				'heading'     => esc_html__( 'Font Size', 'volley-core' ),
				'description' => esc_html__( 'Example: 20px', 'volley-core' ),
				'group'       => esc_html__( 'Design Options', 'volley-core' ),
				'edit_field_class' => 'vc_col-sm-3',
			),
			array(
				'type'        => 'textfield',
				'param_name'  => 'lh',
				'heading'     => esc_html__( 'Line-Height', 'volley-core' ),
				'group'       => esc_html__( 'Design Options', 'volley-core' ),
				'edit_field_class' => 'vc_col-sm-3',
			),
			array(
				'type'        => 'textfield',
				'param_name'  => 'fw',
				'heading'     => esc_html__( 'Font Weight', 'volley-core' ),
				'group'       => esc_html__( 'Design Options', 'volley-core' ),
				'edit_field_class' => 'vc_col-sm-3',
			),
			array(
				'type'        => 'textfield',
				'param_name'  => 'ls',
				'heading'     => esc_html__( 'Letter Spacing', 'volley-core' ),
				'group'       => esc_html__( 'Design Options', 'volley-core' ),
				'edit_field_class' => 'vc_col-sm-3',
			),
			array(
				'type'       => 'subheading',
				'param_name' => 'sh_border',
				'heading'    => esc_html__( 'Border', 'volley-core' ),
				'group'      => esc_html__( 'Design Options', 'volley-core' ),
				'dependency' => array(
					'element' => 'style',
					'value_not_equal_to' => 'btn-naked',
				),
			),
			array(
				'type'       => 'themethreads_colorpicker',
				'param_name' => 'b_color',
				'only_solid'  => true,
				'heading'    => 'Border Color',
				'group'      => esc_html__( 'Design Options', 'volley-core' ),
				'edit_field_class' => 'vc_col-sm-6',
				'dependency' => array(
					'element' => 'style',
					'value_not_equal_to' => array( 'btn-naked', 'btn-default' ),
				),
			),
			array(
				'type'        => 'themethreads_colorpicker',
				'param_name'  => 'b_color2',
				'heading'     => 'Border Color 2',
				'only_solid'  => true,
				'description' => esc_html__( 'Border color 2, will create gradient effect', 'volley-core' ),
				'group'       => esc_html__( 'Design Options', 'volley-core' ),
				'edit_field_class' => 'vc_col-sm-6',
				'dependency' => array(
					'element' => 'style',
					'value_not_equal_to' => array( 'btn-naked', 'btn-default' ),
				),
			),
			array(
				'type'       => 'themethreads_colorpicker',
				'param_name' => 'h_b_color',
				'only_solid'  => true,
				'heading'    => 'Hover Border Color',
				'group'      => esc_html__( 'Design Options', 'volley-core' ),
				'edit_field_class' => 'vc_col-sm-6',
				'dependency' => array(
					'element' => 'style',
					'value_not_equal_to' => 'btn-naked',
				),
			),
			array(
				'type'        => 'themethreads_colorpicker',
				'param_name'  => 'h_b_color2',
				'only_solid'  => true,
				'heading'     => 'Hover Border Color 2',
				'description' => esc_html__( 'Hover Border color 2, will create gradient effect', 'volley-core' ),
				'group'       => esc_html__( 'Design Options', 'volley-core' ),
				'edit_field_class' => 'vc_col-sm-6',
				'dependency' => array(
					'element' => 'style',
					'value_not_equal_to' => 'btn-naked',
				),
			),
			array(
				'type'       => 'subheading',
				'param_name' => 'sh_shadowbox',
				'heading'    => esc_html__( 'Box-shadow', 'volley-core' ),
				'group'      => esc_html__( 'Design Options', 'volley-core' ),
				'dependency' => array(
					'element' => 'style',
					'value_not_equal_to' => array( 'btn-naked', 'btn-underlined' ),
				),
			),

			//Box Shadow Options
			array(
				'type'        => 'checkbox',
				'heading'     => esc_html__( 'Enable box-shadow?', 'volley-core' ),
				'param_name'  => 'enable_row_shadowbox',
				'description' => esc_html__( 'If checked, the box-shadow options will be visible', 'volley-core' ),
				'value'       => array( esc_html__( 'Yes', 'volley-core' ) => 'yes' ),
				'edit_field_class' => 'vc_col-sm-6',
				'group' => esc_html__( 'Design Options', 'volley-core' ),
				'dependency' => array(
					'element' => 'style',
					'value_not_equal_to' => array( 'btn-naked', 'btn-underlined' ),
				),
			),
			array(
				'type' => 'param_group',
				'heading' => esc_html__( 'Shadow Box Options', 'volley-core' ),
				'param_name' => 'button_box_shadow',
				'group' => esc_html__( 'Design Options', 'volley-core' ),
				'dependency' => array(
					'element' => 'enable_row_shadowbox',
					'not_empty' => true,
				),
				'params' => array(
					array(
						'type'        => 'dropdown',
						'param_name'  => 'inset',
						'heading'     => esc_html__( 'Inset', 'volley-core' ),
						'description' => esc_html__(  'Select if it is inset', 'volley-core' ),
						'value'      => array(
							esc_html__( 'No', 'volley-core' )  => '',
							esc_html__( 'Yes', 'volley-core' ) => 'inset',
						),
						'edit_field_class' => 'vc_col-sm-6 vc_column-with-padding'
					),
					array(
						'type'        => 'textfield',
						'param_name'  => 'x_offset',
						'heading'     => esc_html__( 'Position X', 'volley-core' ),
						'description' => esc_html__(  'Set position X in px', 'volley-core' ),
						'edit_field_class' => 'vc_col-sm-6'
					),
					array(
						'type'        => 'textfield',
						'param_name'  => 'y_offset',
						'heading'     => esc_html__( 'Position Y', 'volley-core' ),
						'description' => esc_html__(  'Set position Y in px', 'volley-core' ),
						'edit_field_class' => 'vc_col-sm-6'
					),
					array(
						'type'        => 'textfield',
						'param_name'  => 'blur_radius',
						'heading'     => esc_html__( 'Blur Radius', 'volley-core' ),
						'description' => esc_html__(  'Add blur radius in px', 'volley-core' ),
						'edit_field_class' => 'vc_col-sm-6'
					),
					array(
						'type'        => 'textfield',
						'param_name'  => 'spread_radius',
						'heading'     => esc_html__( 'Spread Radius', 'volley-core' ),
						'description' => esc_html__(  'Add spread radius in px', 'volley-core' ),
						'edit_field_class' => 'vc_col-sm-6'
					),
					array(
						'type'        => 'colorpicker',
						'param_name'  => 'shadow_color',
						'heading'     => esc_html__( 'Color', 'volley-core' ),
						'description' => esc_html__(  'Pick a color for shadow', 'volley-core' ),
						'edit_field_class' => 'vc_col-sm-6'
					),

				)
			),

			//Hover state box-shadow
			array(
				'type' => 'param_group',
				'heading' => esc_html__( 'Hover Shadow Box Options', 'volley-core' ),
				'param_name' => 'hover_button_box_shadow',
				'group' => esc_html__( 'Design Options', 'volley-core' ),
				'dependency' => array(
					'element' => 'enable_row_shadowbox',
					'not_empty' => true,
				),
				'params' => array(
					array(
						'type'        => 'dropdown',
						'param_name'  => 'inset',
						'heading'     => esc_html__( 'Inset', 'volley-core' ),
						'description' => esc_html__(  'Select if it is inset', 'volley-core' ),
						'value'      => array(
							esc_html__( 'No', 'volley-core' )  => '',
							esc_html__( 'Yes', 'volley-core' ) => 'inset',
						),
						'edit_field_class' => 'vc_col-sm-6 vc_column-with-padding'
					),
					array(
						'type'        => 'textfield',
						'param_name'  => 'x_offset',
						'heading'     => esc_html__( 'Position X', 'volley-core' ),
						'description' => esc_html__(  'Set position X in px', 'volley-core' ),
						'edit_field_class' => 'vc_col-sm-6'
					),
					array(
						'type'        => 'textfield',
						'param_name'  => 'y_offset',
						'heading'     => esc_html__( 'Position Y', 'volley-core' ),
						'description' => esc_html__(  'Set position Y in px', 'volley-core' ),
						'edit_field_class' => 'vc_col-sm-6'
					),
					array(
						'type'        => 'textfield',
						'param_name'  => 'blur_radius',
						'heading'     => esc_html__( 'Blur Radius', 'volley-core' ),
						'description' => esc_html__(  'Add blur radius in px', 'volley-core' ),
						'edit_field_class' => 'vc_col-sm-6'
					),
					array(
						'type'        => 'textfield',
						'param_name'  => 'spread_radius',
						'heading'     => esc_html__( 'Spread Radius', 'volley-core' ),
						'description' => esc_html__(  'Add spread radius in px', 'volley-core' ),
						'edit_field_class' => 'vc_col-sm-6'
					),
					array(
						'type'        => 'colorpicker',
						'param_name'  => 'shadow_color',
						'heading'     => esc_html__( 'Color', 'volley-core' ),
						'description' => esc_html__(  'Pick a color for shadow', 'volley-core' ),
						'edit_field_class' => 'vc_col-sm-6'
					),
				)
			),
		);
		
		$this->params = array_merge( $general_params,  $icon_params, $icon_button_params, $styling_params  );

		$this->add_extras();
	}

	protected function get_size() {
		
		$size = $this->atts['size'];
		
		if( empty( $size ) ) {
			return '';
		}
		
		return $size;
	}

	protected function get_shape() {
		
		$shape = $this->atts['shape'];
		
		if( empty( $shape ) ) {
			return '';
		}
		
		return $shape;
	}	
	
	protected function get_border() {
		
		
		if( 'btn-naked' === $this->atts['style'] ) {
			return;
		}

		$border = $this->atts['border'];
		
		return "btn-bordered $border";	
	}
	
	protected function get_gradient() {
		
		$color  = $this->atts['color2'];
		$color2 = $this->atts['hover_color2'];

		// if( empty( $color ) || empty( $color2 ) ) {
		if( empty( $color ) ) {
			return;
		}
		
		return 'btn-gradient';
		
	}
	
	protected function get_gradient_bg() {
		
		extract( $this->atts );
		
		if( empty( $color ) || empty( $color2 ) || 'btn-default' === $style || 'btn-naked' === $style || 'btn-underlined' === $style ) {
			return;
		}
		
		echo '<span class="btn-gradient-bg"></span>';
		
	}

	protected function get_gradient_hover_bg() {

		extract( $this->atts );
		
		if( ( empty( $hover_color2 ) && empty( $color2 ) ) || 'btn-naked' === $style || 'btn-underlined' === $style ) {
			return;
		}
		
		echo '<span class="btn-gradient-bg btn-gradient-bg-hover"></span>';
		
	}
	
	protected function get_gradient_hover_icon_bg() {

		extract( $this->atts );
		
		if( 'btn-icon-solid' === $i_shape_style && !empty( $hover_color2 ) && 'btn-naked' === $style || 
			'btn-icon-solid' === $i_shape_style && !empty( $hover_color2 ) && 'btn-underlined' === $style ) 
		{
			return '<span class="btn-gradient-bg btn-gradient-bg-hover"></span>';	
		}

	}
	
	protected function get_gradient_border() {

		$color  = $this->atts['b_color2'];
		$color2 = $this->atts['h_b_color2'];
		
		if( empty( $color ) && empty( $color2 ) ) {
			return;
		}
		
		return 'btn-bordered-gradient';

	}
	
	protected function get_custom_size_classname() {
		
		if( !empty( $this->atts['custom_size'] ) || !empty( $this->atts['custom_height'] ) ) {
			
			return 'btn-custom-sized';
		}

	}
	
	protected function get_border_svg() {
		
		extract( $this->atts );

		$border_color  = $b_color2;
		$border_color2 = $h_b_color2;
		
		$rx = $ry = 0;
		
		if( 'semi-round' === $shape ) {
			$rx = $ry = '2px';
		}
		elseif( 'round' === $shape ) {
			$rx = $ry = '4px';
		}
		elseif( 'circle' === $shape ) {
			$rx = '17%';
			$ry = '50%';
		}
		// if( !empty( $custom_size ) ) {
		// 	$rx = (int)$custom_size / 2 . 'px';
		// }
		if( !empty( $custom_height ) ) {
			$rx = (int)$custom_height / 2 . 'px';
			$ry = (int)$custom_height / 2 . 'px';
		}
		
		if( ( empty( $color2 ) && empty( $hover_color2 ) ) || 'btn-naked' === $style || 'btn-underlined' === $style ) {
			return;
		}
		
		// if( ! empty( $hover_color ) && empty( $hover_color2 ) ) {
		// 	$hover_color2 = $hover_color;
		// }

		$out = '';
		$svg_id = uniqid('svg-border-');
		$out .= '<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xml:space="preserve" class="btn-gradient-border" width="100%" height="100%">
			      <defs>
			        <linearGradient id="' . $svg_id . '" x1="0%" y1="0%" x2="100%" y2="0%">
			          <stop offset="0%" />
			          <stop offset="100%" />
			        </linearGradient>
			      </defs>
			      <rect x="0.5" y="0.5" rx="' . esc_attr( $rx ) . '" ry="' . esc_attr( $ry ) . '" width="100%" height="100%" stroke="url(#' . $svg_id . ')"/>
			    </svg>';

		echo $out;

	}

	protected function get_icon_pos() {
		
		$pos = $this->atts['i_position'];
			
		if( empty( $pos ) ) {
			return;
		}
				
		$hash = array(
			'left'   => 'btn-icon-left',
			'bottom' => 'btn-icon-block',
			'top'    => 'btn-icon-block btn-icon-top',	
		);

		return $hash[ $pos ];

	}

	protected function if_lightbox() {

		if( 'lightbox' !== $this->atts['link_type'] ) {
			return '';
		}

		return 'fresco';

	}

	public function generate_css() {
		
		extract( $this->atts );
		
		$elements     = array();
		$parent       = isset( $this->parent_selector ) ? $this->parent_selector . ' ' : '';
		$id           = '.' .$this->get_id();
		$parent_hover = isset( $this->parent_selector ) ? $this->parent_selector . ':hover ' . $id : '';
		
		$gradient_border_start = '#svg-' . $this->get_id() . ' .btn-gradient-border defs stop:first-child';
		$gradient_border_stop  = '#svg-' . $this->get_id() . ' .btn-gradient-border defs stop:last-child';

		$button_box_shadow = vc_param_group_parse_atts( $button_box_shadow );
		$hover_button_box_shadow = vc_param_group_parse_atts( $hover_button_box_shadow );
		$icon_box_shadow = vc_param_group_parse_atts( $icon_box_shadow );
		$h_icon_box_shadow = vc_param_group_parse_atts( $h_icon_box_shadow );
		
		if( !empty( $color ) && isset( $color ) ) {
			$elements[themethreads_implode( '%1$s.btn-icon-solid .btn-icon' )]['background'] = $color;
			$elements[themethreads_implode( '%1$s.btn-icon-circle.btn-icon-ripple .btn-icon:before' )]['border-color'] = $color;
		}
		if( !empty( $hover_color ) && isset( $hover_color ) && empty( $hover_color2 ) ) {
			$elements[themethreads_implode( '%1$s.btn-icon-solid:hover .btn-icon' )]['background'] = $hover_color;
		}
		
		//Icon styling 
		if( !empty( $i_color ) ) {
			$elements[themethreads_implode( '%1$s .btn-icon' )]['color'] = $i_color;
		}
		if( !empty( $i_size ) ) {
			$elements[themethreads_implode( '%1$s .btn-icon' )]['font-size'] = $i_size;
		}
		if( !empty( $i_hcolor ) ) {
			$elements[themethreads_implode( '%1$s:hover .btn-icon' )]['color'] = $i_hcolor;
		}
		if( !empty( $i_fill_color ) ) {
			$elements[themethreads_implode( '%1$s.btn-icon-solid .btn-icon' )]['background'] = $i_fill_color;
		}
		if( !empty( $i_fill_hcolor ) ) {
			$elements[themethreads_implode( '%1$s.btn-icon-solid:hover .btn-icon' )]['background'] = $i_fill_hcolor;
		}
		if( !empty( $i_fill_color2 ) ) {
			$elements[themethreads_implode( '%1$s.btn-icon-bordered .btn-icon' )]['border-color'] = $i_fill_color2;
		}
		if( !empty( $i_fill_hcolor2 ) ) {
			$elements[themethreads_implode( '%1$s.btn-icon-bordered:hover .btn-icon' )]['border-color'] = $i_fill_hcolor2;
		}
		if( !empty( $i_margin_left ) ) {
			$elements[themethreads_implode( '%1$s .btn-icon' )]['margin-left'] = $i_margin_left . ' !important';
		}
		if( !empty( $i_margin_right ) ) {
			$elements[themethreads_implode( '%1$s .btn-icon' )]['margin-right'] = $i_margin_right . ' !important';
		}
		if( !empty( $i_shape_custom_size ) ) {
			$elements[themethreads_implode( '%1$s .btn-icon' )]['width'] = $i_shape_custom_size . ' !important';
			$elements[themethreads_implode( '%1$s .btn-icon' )]['height'] = $i_shape_custom_size . ' !important';
		}
		
		//Button Custom Size
		if( !empty( $custom_size ) ) {
			$elements[themethreads_implode( '%1$s' )]['width'] = $custom_size;
		}
		if( !empty( $custom_height ) ) {
			$elements[themethreads_implode( '%1$s' )]['height'] = $custom_height;
		}
		
		
		if( 'btn-default' === $style ) {
			
			if( ! empty( $color ) && isset( $color ) ) {
				$elements[themethreads_implode( '%1$s' )]['color'] = $color;
				$elements[themethreads_implode( '%1$s' )]['border-color'] = $color;
				$elements[themethreads_implode( '%1$s:hover' )]['background-color'] = $color;
			}
			if( ! empty( $hover_color ) && isset( $hover_color ) ) {
				$elements[themethreads_implode( array( $parent_hover, '%1$s:hover' ) )]['background-color'] = $hover_color;
				$elements[themethreads_implode( array( $parent_hover, '%1$s:hover' ) )]['border-color'] = $hover_color;
			}
			if( ! empty( $hover_color ) && ! empty( $hover_color2 ) ) {
				$elements[themethreads_implode( array( '%1$s .btn-gradient-bg-hover' ) )]['background'] = 'linear-gradient(to right, ' . esc_attr( $hover_color ) . ' 0%, ' . esc_attr( $hover_color2 ) . ' 100%)';
			} elseif ( empty( $hover_color2 ) && ! empty( $hover_color ) ) {
				$elements[themethreads_implode( array( '%1$s .btn-gradient-bg-hover' ) )]['background'] = 'linear-gradient(to right, ' . esc_attr( $hover_color ) . ' 0%, ' . esc_attr( $hover_color ) . ' 100%)';
			} elseif ( ! empty( $color ) && ! empty( $color2 ) && empty( $hover_color ) && empty( $hover_color_2 ) ) {
				$elements[themethreads_implode( array( '%1$s .btn-gradient-bg-hover' ) )]['background'] = 'linear-gradient(to right, ' . esc_attr( $color ) . ' 0%, ' . esc_attr( $color2 ) . ' 100%)';
			}
			//Button gradient border colors
			if( ! empty( $color ) && ! empty( $color2 ) ) {
				$elements[ themethreads_implode( array( '%1$s .btn-gradient-border defs stop:first-child' ) )]['stop-color'] = $color;
				$elements[ themethreads_implode( array( '%1$s .btn-gradient-border defs stop:last-child' ) )]['stop-color'] = $color2;
			}
			if( ! empty( $h_b_color ) && ! empty( $h_b_color2 ) ) { 
				$elements[ themethreads_implode( array( '%1$s:hover .btn-gradient-border defs stop:first-child' ) )]['stop-color'] = $h_b_color;
				$elements[ themethreads_implode( array( '%1$s:hover .btn-gradient-border defs stop:last-child' ) )]['stop-color'] = $h_b_color2;
			} elseif( ! empty( $hover_color ) && ! empty( $hover_color2 ) ) { 
				$elements[ themethreads_implode( array( '%1$s:hover .btn-gradient-border defs stop:first-child' ) )]['stop-color'] = $hover_color;
				$elements[ themethreads_implode( array( '%1$s:hover .btn-gradient-border defs stop:last-child' ) )]['stop-color'] = $hover_color2;
			}elseif ( ! empty($hover_color) && empty($hover_color2) ) {
				$elements[ themethreads_implode( array( '%1$s:hover .btn-gradient-border defs stop:first-child' ) )]['stop-color'] = $hover_color;
				$elements[ themethreads_implode( array( '%1$s:hover .btn-gradient-border defs stop:last-child' ) )]['stop-color'] = $hover_color;
			}
			
		}
		elseif( 'btn-solid' === $style ) {
			if( ! empty( $color ) && isset( $color ) ) {
				$elements[themethreads_implode( '%1$s' )]['background-color'] = $color;
				$elements[themethreads_implode( '%1$s' )]['border-color'] = $color;
				$elements[themethreads_implode( '%1$s' )]['border-color'] = $color;
			}
			if( ! empty( $hover_color ) && isset( $hover_color ) ) {
				$elements[themethreads_implode( array( $parent_hover, '%1$s:hover' ) )]['background-color'] = $hover_color;
				$elements[themethreads_implode( array( $parent_hover, '%1$s:hover' ) )]['border-color'] = $hover_color;
			}			
			if( ! empty( $color ) && ! empty( $color2 ) ) {
				$elements[themethreads_implode( array( '%1$s .btn-gradient-bg' ) )]['background'] = 'linear-gradient(to right, ' . esc_attr( $color ) . ' 0%, ' . esc_attr( $color2 ) . ' 100%)';
			}
			if( ! empty( $hover_color ) && ! empty( $hover_color2 ) ) {
				$elements[themethreads_implode( array( '%1$s .btn-gradient-bg-hover' ) )]['background'] = 'linear-gradient(to right, ' . esc_attr( $hover_color ) . ' 0%, ' . esc_attr( $hover_color2 ) . ' 100%)';
			} elseif ( empty( $hover_color2 ) && ! empty( $hover_color ) ) {
				$elements[themethreads_implode( array( '%1$s .btn-gradient-bg-hover' ) )]['background'] = 'linear-gradient(to right, ' . esc_attr( $hover_color ) . ' 0%, ' . esc_attr( $hover_color ) . ' 100%)';
			}
			//Button gradient border colors
			if( ! empty( $color ) && ! empty( $color2 ) ) {
				$elements[ themethreads_implode( array( '%1$s .btn-gradient-border defs stop:first-child' ) )]['stop-color'] = $color;
				$elements[ themethreads_implode( array( '%1$s .btn-gradient-border defs stop:last-child' ) )]['stop-color'] = $color2;
			} elseif ( ! empty( $color ) && empty( $color2 ) ) {
				$elements[ themethreads_implode( array( '%1$s .btn-gradient-border defs stop:first-child' ) )]['stop-color'] = $color;
				$elements[ themethreads_implode( array( '%1$s .btn-gradient-border defs stop:last-child' ) )]['stop-color'] = $color;
			}

			if( ! empty( $b_color ) && ! empty( $b_color2 ) ) {
				$elements[ themethreads_implode( array( '%1$s .btn-gradient-border defs stop:first-child' ) )]['stop-color'] = $b_color;
				$elements[ themethreads_implode( array( '%1$s .btn-gradient-border defs stop:last-child' ) )]['stop-color'] = $b_color2;
			} elseif( ! empty( $b_color ) && empty( $b_color2 ) ) {
				$elements[ themethreads_implode( array( '%1$s .btn-gradient-border defs stop:first-child' ) )]['stop-color'] = $b_color;
				$elements[ themethreads_implode( array( '%1$s .btn-gradient-border defs stop:last-child' ) )]['stop-color'] = $b_color;
			} 

			if( ! empty( $h_b_color ) && ! empty( $h_b_color2 ) ) { 
				$elements[ themethreads_implode( array( '%1$s:hover .btn-gradient-border defs stop:first-child' ) )]['stop-color'] = $h_b_color;
				$elements[ themethreads_implode( array( '%1$s:hover .btn-gradient-border defs stop:last-child' ) )]['stop-color'] = $h_b_color2;
			} elseif( ! empty( $hover_color ) && ! empty( $hover_color2 ) ) { 
				$elements[ themethreads_implode( array( '%1$s:hover .btn-gradient-border defs stop:first-child' ) )]['stop-color'] = $hover_color;
				$elements[ themethreads_implode( array( '%1$s:hover .btn-gradient-border defs stop:last-child' ) )]['stop-color'] = $hover_color2;
			} elseif ( ! empty($hover_color) && empty($hover_color2) ) {
				$elements[ themethreads_implode( array( '%1$s:hover .btn-gradient-border defs stop:first-child' ) )]['stop-color'] = $hover_color;
				$elements[ themethreads_implode( array( '%1$s:hover .btn-gradient-border defs stop:last-child' ) )]['stop-color'] = $hover_color;
			}
		} elseif ( 'btn-naked' === $style || 'btn-underlined' === $style ) {

			if( ! empty( $color ) && isset( $color ) ) {
				$elements[themethreads_implode( '%1$s' )]['color'] = $color;
			}

			if( ! empty( $hover_color ) && isset( $hover_color ) ) {
				$elements[themethreads_implode( array( $parent_hover, '%1$s:hover' ) )]['color'] = $hover_color;
			}

			if ( ! empty( $color ) && ! empty( $color2 ) ) {
				$elements[themethreads_implode( array( '.backgroundcliptext %1$s .btn-txt' ) )]['background'] = 'linear-gradient(to right, ' . esc_attr( $color ) . ' 0%, ' . esc_attr( $color2 ) . ' 100%)';
				$elements[themethreads_implode( array( '%1$s.btn-icon-solid .btn-icon' ) )]['background'] = 'linear-gradient(to right, ' . esc_attr( $color ) . ' 0%, ' . esc_attr( $color2 ) . ' 100%)';
				$elements[themethreads_implode( array( '.backgroundcliptext %1$s:not(.btn-icon-solid) .btn-icon i' ) )]['background'] = 'linear-gradient(to right, ' . esc_attr( $color ) . ' 0%, ' . esc_attr( $color2 ) . ' 100%)';
			}
			
			if ( !empty( $hover_color ) && !empty( $hover_color2 ) ) {
				$elements[themethreads_implode( array( '.backgroundcliptext %1$s:hover .btn-txt' ) )]['background'] = 'linear-gradient(to right, ' . esc_attr( $hover_color ) . ' 0%, ' . esc_attr( $hover_color2 ) . ' 100%)';
				$elements[themethreads_implode( array( '.backgroundcliptext %1$s:hover:not(.btn-icon-solid) .btn-icon i' ) )]['background'] = 'linear-gradient(to right, ' . esc_attr( $hover_color ) . ' 0%, ' . esc_attr( $hover_color2 ) . ' 100%)';
				$elements[themethreads_implode( array( '%1$s.btn-icon-solid .btn-icon .btn-gradient-bg-hover' ) )]['background'] = 'linear-gradient(to right, ' . esc_attr( $hover_color ) . ' 0%, ' . esc_attr( $hover_color2 ) . ' 100%)';
			} 
			elseif ( !empty( $color2 ) && !empty( $hover_color ) && empty( $hover_color2 ) ) {
				$elements[themethreads_implode( array( '.backgroundcliptext %1$s:hover .btn-txt' ) )]['background'] = 'linear-gradient(to right, ' . esc_attr( $hover_color ) . ' 0%, ' . esc_attr( $hover_color ) . ' 100%)';
				$elements[themethreads_implode( array( '.backgroundcliptext %1$s:hover:not(.btn-icon-solid) .btn-icon i' ) )]['background'] = 'linear-gradient(to right, ' . esc_attr( $hover_color ) . ' 0%, ' . esc_attr( $hover_color ) . ' 100%)';
				$elements[themethreads_implode( array( '%1$s.btn-icon-solid:hover .btn-icon' ) )]['background'] = 'linear-gradient(to right, ' . esc_attr( $hover_color ) . ' 0%, ' . esc_attr( $hover_color ) . ' 100%)';
			}

			if ( !empty($text_color) && isset($text_color) ) {
				$elements[themethreads_implode( '%1$s' )]['color'] = $text_color;
			}

			if ( !empty($htext_color) && isset($htext_color) ) {
				$elements[themethreads_implode( '%1$s:hover' )]['color'] = $htext_color;
			}

		}

		if ( 'btn-underlined' === $style ) {

			if ( ! empty( $color ) && isset( $color ) ) {
				$elements[themethreads_implode( array( '%1$s:before' ) )]['background'] = $color;
			}

			if ( ! empty( $hover_color ) && isset( $hover_color ) ) {
				$elements[themethreads_implode( array( '%1$s:after' ) )]['background'] = $hover_color;
			}

			if ( ! empty( $color ) && ! empty( $color2 ) ) {
				$elements[themethreads_implode( array( '%1$s:before' ) )]['background'] = 'linear-gradient(to right, ' . esc_attr( $color ) . ' 0%, ' . esc_attr( $color2 ) . ' 100%)';
			}

			if ( ! empty( $hover_color ) && ! empty( $hover_color2 ) ) {
				$elements[themethreads_implode( array( '%1$s:after' ) )]['background'] = 'linear-gradient(to right, ' . esc_attr( $hover_color ) . ' 0%, ' . esc_attr( $hover_color2 ) . ' 100%)';
			}

			if ( ! empty( $b_color ) ) {
				$elements[themethreads_implode( array( '%1$s:before' ) )]['background'] = $b_color;
			}

			if ( ! empty( $b_color ) && ! empty( $b_color2 ) ) {
				$elements[themethreads_implode( array( '%1$s:before' ) )]['background'] = 'linear-gradient(to right, ' . esc_attr( $b_color ) . ' 0%, ' . esc_attr( $b_color2 ) . ' 100%)';
			}

			if ( ! empty( $h_b_color ) ) {
				$elements[themethreads_implode( array( '%1$s:after' ) )]['background'] = $h_b_color;
			}

			if ( ! empty( $h_b_color ) && ! empty( $h_b_color2 ) ) {
				$elements[themethreads_implode( array( '%1$s:after' ) )]['background'] = 'linear-gradient(to right, ' . esc_attr( $h_b_color ) . ' 0%, ' . esc_attr( $h_b_color2 ) . ' 100%)';
			}

			if ( !empty($text_color) && isset($text_color) ) {
				$elements[themethreads_implode( '%1$s' )]['color'] = $text_color;
			}

			if ( !empty($htext_color) && isset($htext_color) ) {
				$elements[themethreads_implode( '%1$s:hover' )]['color'] = $htext_color;
			}

		}
		
		//text colors for button label
		if ( 'btn-naked' !== $style ) {

			if( ! empty( $text_color ) && isset( $text_color ) ) {
				$elements[themethreads_implode( '%1$s' )]['color'] = $text_color;
			}	
			if( ! empty( $htext_color ) && isset( $htext_color ) ) {
				$elements[themethreads_implode( '%1$s:hover' )]['color'] = $htext_color;
			}
			
		} else {
			
			if( !empty( $text_color ) && isset( $text_color ) && !empty( $color2 ) ) {
				$elements[themethreads_implode( '%1$s.btn .btn-txt, .backgroundcliptext %1$s.btn .btn-txt' )]['color'] = $text_color;
				$elements[themethreads_implode( '%1$s.btn .btn-txt, .backgroundcliptext %1$s.btn .btn-txt' )]['background'] = 'none';
				$elements[themethreads_implode( '%1$s.btn .btn-txt, .backgroundcliptext %1$s.btn .btn-txt' )]['text-fill-color'] = 'currentcolor !important';
				$elements[themethreads_implode( '%1$s.btn .btn-txt, .backgroundcliptext %1$s.btn .btn-txt' )]['-webkit-text-fill-color'] = 'currentcolor !important';
				$elements[themethreads_implode( '%1$s.btn .btn-txt, .backgroundcliptext %1$s.btn .btn-txt' )]['background-clip'] = 'border-box !important';
				$elements[themethreads_implode( '%1$s.btn .btn-txt, .backgroundcliptext %1$s.btn .btn-txt' )]['-webkit-background-clip'] = 'border-box !important';
			}	
			if( !empty( $htext_color ) && isset( $htext_color ) && !empty( $hover_color2 ) ) {
				$elements[themethreads_implode( '%1$s.btn:hover .btn-txt', '.backgroundcliptext %1$s.btn:hover .btn-txt' )]['color'] = $htext_color;
				$elements[themethreads_implode( '%1$s.btn:hover .btn-txt', '.backgroundcliptext %1$s.btn:hover .btn-txt' )]['text-fill-color'] = 'currentcolor !important';
				$elements[themethreads_implode( '%1$s.btn:hover .btn-txt', '.backgroundcliptext %1$s.btn:hover .btn-txt' )]['-webkit-text-fill-color'] = 'currentcolor !important';
				$elements[themethreads_implode( '%1$s.btn:hover .btn-txt', '.backgroundcliptext %1$s.btn:hover .btn-txt' )]['background-clip'] = 'border-box !important';
				$elements[themethreads_implode( '%1$s.btn:hover .btn-txt', '.backgroundcliptext %1$s.btn:hover .btn-txt' )]['-webkit-background-clip'] = 'border-box !important';
			}
		}

		//Font options fot the label
		if( $lh ) {
			$elements[themethreads_implode( '%1$s' )]['line-height'] = $lh . ' !important';
		}

		if ( $fs ) {
			$elements[themethreads_implode( '%1$s' )]['font-size'] = $fs . ' !important';
		}

		if ( $fw ) {
			$elements[themethreads_implode( '%1$s' )]['font-weight'] = $fw . ' !important';
		}
		if ( $ls ) {
			$elements[themethreads_implode( '%1$s' )]['letter-spacing'] = $ls . ' !important';
		}

		//Button border colors
		if( ! empty( $b_color ) && isset( $b_color ) ) {
			$elements[themethreads_implode( array( '%1$s.btn-bordered' ) )]['border-color'] = $b_color;
		}
		if( ! empty( $h_b_color ) && isset( $h_b_color ) ) {
			$elements[themethreads_implode( array( '%1$s.btn-bordered:hover' ) )]['border-color'] = $h_b_color;
		}
		
		if( !empty( $icon_box_shadow ) ) {
			$icon_box_shadow_css = $this->get_shadow_css( $icon_box_shadow );
			$elements[themethreads_implode( '%1$s .btn-icon' )]['box-shadow'] = $icon_box_shadow_css;
		}
		if( !empty( $h_icon_box_shadow ) ) {
			$h_icon_box_shadow_css = $this->get_shadow_css( $h_icon_box_shadow );
			$elements[themethreads_implode( '%1$s:hover .btn-icon' )]['box-shadow'] = $h_icon_box_shadow_css;
		}
		
		//Shadow box for button
		if( ! empty( $button_box_shadow ) ) {
			
			$button_box_shadow_css = $this->get_shadow_css( $button_box_shadow );
			$elements[themethreads_implode( '%1$s' )]['box-shadow'] = $button_box_shadow_css;

		}
		if( ! empty( $hover_button_box_shadow ) ) {

			$hover_button_box_shadow_css = $this->get_shadow_css( $hover_button_box_shadow );
			$elements[themethreads_implode( array( '%1$s:hover' ) )]['box-shadow'] = $hover_button_box_shadow_css;

		}

		$this->dynamic_css_parser( $parent . $id, $elements );

	}
}
new LD_Button;