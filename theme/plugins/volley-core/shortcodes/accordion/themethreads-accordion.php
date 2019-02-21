<?php

/**
* Shortcode Accordion
*/

if( ! defined( 'ABSPATH' ) ) 
	exit; // Exit if accessed directly
	
/**
* LD_Shortcode
*/
class LD_Accordion extends LD_Shortcode {
	
	/**
	 * Construct
	 * @method __construct
	 */
	public function __construct() {

		// Properties
		$this->slug          = 'vc_accordion';
		$this->title         = esc_html__( 'Accordion', 'volley-core' );
		$this->icon          = 'fa fa-navicon';
		$this->description   = esc_html__( 'Create an accordion.', 'volley-core' );
		$this->is_container  = true;
		$this->show_settings_on_create = false;
		$this->js_view       = 'VcAccordionView';
		$this->custom_markup = '<div class="wpb_accordion_holder wpb_holder clearfix vc_container_for_children">%content%</div><div class="tab_controls"><a class="add_tab" title="Add section"><span class="vc_icon"></span> <span class="tab-label">Add section</span></a></div>';
		$this->default_content = '
			[vc_accordion_tab title="' . sprintf( '%s %d', 'Section', 1 ) . '"][/vc_accordion_tab]
			[vc_accordion_tab title="' . sprintf( '%s %d', 'Section', 2 ) . '"][/vc_accordion_tab]';

		parent::__construct();

	}
	
	/**
	 * Get params
	 * @return array
	 */
	public function get_params() {

		$this->params = array_merge(

			array(

				array(
					'type'        => 'textfield',
					'param_name'  => 'active_tab',
					'heading'     => esc_html__( 'Active tab', 'volley-core' ),
				),
				
				array(
					'type'       => 'dropdown',
					'param_name' => 'size',
					'heading'    => esc_html__( 'Title Height', 'volley-core' ),
					'value'      => array(
						esc_html__( 'Shortest', 'volley-core' ) => 'xs',
						esc_html__( 'Short', 'volley-core' )    => 'sm',
						esc_html__( 'Medium', 'volley-core' )   => 'md',
						esc_html__( 'Tall', 'volley-core' )     => 'lg',
					),
					'std' => 'md',
					'edit_field_class' => 'vc_col-sm-6'
				),
				array(
					'type'        => 'dropdown',
					'param_name'  => 'active_style',
					'heading'     => esc_html__( 'Active state style', 'volley-core' ),
					'value'       => array(
						esc_html__( 'Default', 'volley-core' ) => '',
						esc_html__( 'Fill', 'volley-core' )    => 'fill',
						esc_html__( 'Shadow', 'volley-core' )  => 'shadow',
						esc_html__( 'Fill and Shadow', 'volley-core' ) => 'fill_shadow',
					),
					'edit_field_class' => 'vc_col-sm-6'
				),
				
				array(
					'type'       => 'dropdown',
					'param_name' => 'borders',
					'heading'    => esc_html__( 'Border style', 'volley-core' ),
					'value'      => array(
						esc_html__( 'None', 'volley-core' )  => '',
						esc_html__( 'Title Bordered', 'volley-core' )     => 'accordion-title-bordered',
						esc_html__( 'Title Underlined', 'volley-core' )   => 'accordion-title-underlined',
						esc_html__( 'Content Underlined', 'volley-core' ) => 'accordion-body-underlined',
						esc_html__( 'Content Bordered', 'volley-core' )   => 'accordion-body-bordered',
					),
					'edit_field_class' => 'vc_col-sm-6'
				),
				
				array(
					'type'       => 'dropdown',
					'param_name' => 'border_round',
					'heading'    => esc_html__( 'Border Round', 'volley-core' ),
					'value'      => array(
						esc_html__( 'None', 'volley-core' )  => '',
						esc_html__( 'Round', 'volley-core' )  => 'accordion-title-round',
						esc_html__( 'Circle', 'volley-core' ) => 'accordion-title-circle',
					),
					'edit_field_class' => 'vc_col-sm-6',
					'dependency' => array(
						'element' => 'borders',
						'value'   => 'accordion-title-bordered'
					),
				),
				array(
					'type'        => 'checkbox',
					'param_name'  => 'use_custom_fonts_title',
					'heading'     => esc_html__( 'Custom font?', 'volley-core' ),
					'description' => esc_html__( 'Check to use custom font for title', 'volley-core' ),
				),
				//Typo Options
			array(
				'type'        => 'textfield',
				'param_name'  => 'fs',
				'heading'     => esc_html__( 'Font Size', 'volley-core' ),
				'description' => esc_html__( 'Example: 20px', 'volley-core' ),
				'edit_field_class' => 'vc_col-sm-3 vc_column-with-padding',
				'dependency' => array(
					'element' => 'use_custom_fonts_title',
					'value'   => 'true',
				),
				'group' => esc_html__( 'Typo', 'volley-core' ),
			),
			array(
				'type'        => 'textfield',
				'param_name'  => 'lh',
				'heading'     => esc_html__( 'Line-Height', 'volley-core' ),
				'edit_field_class' => 'vc_col-sm-3',
				'dependency' => array(
					'element' => 'use_custom_fonts_title',
					'value'   => 'true',
				),
				'group' => esc_html__( 'Typo', 'volley-core' ),
			),
			array(
				'type'        => 'textfield',
				'param_name'  => 'fw',
				'heading'     => esc_html__( 'Font Weight', 'volley-core' ),
				'edit_field_class' => 'vc_col-sm-3',
				'dependency' => array(
					'element' => 'use_custom_fonts_title',
					'value'   => 'true',
				),
				'group' => esc_html__( 'Typo', 'volley-core' ),
			),
			array(
				'type'        => 'textfield',
				'param_name'  => 'ls',
				'heading'     => esc_html__( 'Letter Spacing', 'volley-core' ),
				'edit_field_class' => 'vc_col-sm-3',
				'dependency' => array(
					'element' => 'use_custom_fonts_title',
					'value'   => 'true',
				),
				'group' => esc_html__( 'Typo', 'volley-core' ),
			),
			array(
				'type'        => 'checkbox',
				'heading'     => esc_html__( 'Use for Title theme default font family?', 'volley-core' ),
				'param_name'  => 'use_theme_fonts',
				'value'       => array(
					esc_html__( 'Yes', 'volley-core' ) => 'yes'
				),
				'description' => esc_html__( 'Use font family from the theme.', 'volley-core' ),
				'group' => esc_html__( 'Typo', 'volley-core' ),
				'dependency' => array(
					'element' => 'use_custom_fonts_title',
					'value'   => 'true',
				),
				'std'         => 'yes',
			),
			array(
				'type'       => 'google_fonts',
				'param_name' => 'text_font',
				'value'      => 'font_family:Abril%20Fatface%3Aregular|font_style:400%20regular%3A400%3Anormal',
				'settings'   => array(
					'fields' => array(
						'font_family_description' => esc_html__( 'Select font family.', 'volley-core' ),
						'font_style_description'  => esc_html__( 'Select font styling.', 'volley-core' ),
					),
				),
				'group' => esc_html__( 'Typo', 'volley-core' ),
				'dependency' => array(
					'element'            => 'use_theme_fonts',
					'value_not_equal_to' => 'yes',
				),
			),
				array(
					'type'        => 'checkbox',
					'param_name'  => 'show_icon',
					'heading'     => esc_html__( 'Icons?', 'volley-core' ),
					'description' => esc_html__( 'If enabled will show icons in expander', 'volley-core' ),
					'value'       => array( esc_html__( ' Yes', 'volley-core' ) => 'yes' ),
				),

				array(
					'type'       => 'checkbox',
					'param_name' => 'i_add_icon',
					'heading'    => esc_html__( 'Add icon?', 'volley-core' ),
					'description' => esc_html__( 'Normal state of the panel', 'volley-core' ),
					'group'      => esc_html__( 'Icon', 'volley-core' ),
					'value'      => '',
					'dependency' => array(
						'element' => 'show_icon',
						'value'   => 'yes'
					),
				),

				array(
					'type'       => 'dropdown',
					'param_name' => 'expander_position',
					'heading'    => esc_html__( 'Expander position', 'volley-core' ),
					'value'      => array(
						esc_html__( 'Default', 'volley-core' ) => '',
						esc_html__( 'Left', 'volley-core' )    => 'accordion-expander-left',
					),
					'edit_field_class' => 'vc_col-sm-6',
					'dependency' => array(
						'element' => 'show_icon',
						'value'   => 'yes'
					),
				),
				array(
					'type'       => 'dropdown',
					'param_name' => 'expander_size',
					'heading'    => esc_html__( 'Expander Size', 'volley-core' ),
					'value'      => array(
						esc_html__( 'Normal', 'volley-core' ) => '',
						esc_html__( 'Large ( 22px )', 'volley-core' )    => 'accordion-expander-lg',
						esc_html__( 'xLarge ( 26px )', 'volley-core' )    => 'accordion-expander-xl',
					),
					'edit_field_class' => 'vc_col-sm-6',
					'dependency' => array(
						'element' => 'show_icon',
						'value'   => 'yes'
					),
				),
			),

			themethreads_get_icon_params( 'manual', esc_html__( 'Icon', 'volley-core' ), 'all', array( 'align', 'color', 'size', 'hcolor' ) ),

			array(

				array(
					'type'       => 'checkbox',
					'param_name' => 'active_add_icon',
					'heading'    => esc_html__( 'Add icon?', 'volley-core' ),
					'description' => esc_html__( 'Active state of the panel', 'volley-core' ),
					'group'      => esc_html__( 'Icon', 'volley-core' ),
					'value'      => '',
					'dependency' => array(
						'element' => 'show_icon',
						'value'   => 'yes'
					),
				),

			),

			themethreads_get_icon_params( 'manual', esc_html__( 'Icon', 'volley-core' ), 'all', array( 'align', 'color', 'size', 'hcolor' ), 'active_' ),

			array(

				//Headings colors
				array( 
					'type'        => 'themethreads_colorpicker',
					'only_solid'  => true,
					'param_name'  => 'heading_color',
					'heading'     => esc_html__( 'Color', 'volley-core' ),
					'description' => esc_html__( 'Heading normal state', 'volley-core' ),
					'group'       => esc_html__( 'Design', 'volley-core' ),
					'edit_field_class' => 'vc_col-sm-6 vc_column-with-padding'
				),
				array( 
					'type'        => 'themethreads_colorpicker',
					'only_solid'  => true,
					'param_name'  => 'active_heading_color',
					'heading'     => esc_html__( 'Active Color', 'volley-core' ),
					'description' => esc_html__( 'Heading active state', 'volley-core' ),
					'group'       => esc_html__( 'Design', 'volley-core' ),
					'edit_field_class' => 'vc_col-sm-6'
				),

				//BG colors				
				array( 
					'type'        => 'themethreads_colorpicker',
					'param_name'  => 'bg_color',
					'heading'     => esc_html__( 'Background Color', 'volley-core' ),
					'description' => esc_html__( 'Background color for heading', 'volley-core' ),
					'group'       => esc_html__( 'Design', 'volley-core' ),
					'edit_field_class' => 'vc_col-sm-6',
					'dependency' => array(
						'element' => 'active_style',
						'value'   => array( 'fill',  'fill_shadow' )
					),
				),
				array( 
					'type'        => 'themethreads_colorpicker',
					'param_name'  => 'active_bg_color',
					'heading'     => esc_html__( 'Active Background Color', 'volley-core' ),
					'description' => esc_html__( 'Background color for active heading', 'volley-core' ),
					'group'       => esc_html__( 'Design', 'volley-core' ),
					'edit_field_class' => 'vc_col-sm-6',
					'dependency' => array(
						'element' => 'active_style',
						'value'   => array( 'fill',  'fill_shadow' )
					),
				),
				
				//Border color
				array( 
					'type'        => 'themethreads_colorpicker',
					'only_solid'  => true,
					'param_name'  => 'border_color',
					'heading'     => esc_html__( 'Border Color', 'volley-core' ),
					'group'       => esc_html__( 'Design', 'volley-core' ),
					'edit_field_class' => 'vc_col-sm-6'
				),
				array( 
					'type'        => 'themethreads_colorpicker',
					'only_solid'  => true,
					'param_name'  => 'active_border_color',
					'heading'     => esc_html__( 'Active Border Color', 'volley-core' ),
					'group'       => esc_html__( 'Design', 'volley-core' ),
					'edit_field_class' => 'vc_col-sm-6'
				),
				
				//Expander color
				array( 
					'type'        => 'themethreads_colorpicker',
					'only_solid'  => true,
					'param_name'  => 'exp_color',
					'heading'     => esc_html__( 'Expander Color', 'volley-core' ),
					'group'       => esc_html__( 'Design', 'volley-core' ),
					'edit_field_class' => 'vc_col-sm-6',
					'dependency' => array(
						'element' => 'show_icon',
						'value'   => 'yes'
					),
				),
				array( 
					'type'        => 'themethreads_colorpicker',
					'only_solid'  => true,
					'param_name'  => 'active_exp_color',
					'heading'     => esc_html__( 'Active Expander Color', 'volley-core' ),
					'group'       => esc_html__( 'Design', 'volley-core' ),
					'edit_field_class' => 'vc_col-sm-6',
					'dependency' => array(
						'element' => 'show_icon',
						'value'   => 'yes'
					),
				),

				
			)
		);

		$this->add_extras();
	}
	
	public function before_output( $atts, &$content ) {

		global $themethreads_accordion_tabs;

		$themethreads_accordion_tabs = array();

		//parse vc_accordion_tab shortcode
		do_shortcode( $content );

		$atts['items'] = $themethreads_accordion_tabs;

		return $atts;
	}
	
	//Method to get size classname of the accordion	
	protected function get_size() {
		
		$size = $this->atts['size'];
		
		if( empty( $size ) ) {
			return;
		}
		
		return 'accordion-' . $size;
	}

	protected function get_active_style() {
		
		$active_style = $this->atts['active_style'];
		$active_style_arr = array(
			'fill'   => 'accordion-active-has-fill',
			'shadow' => 'accordion-active-has-shadow',
			'fill_shadow' => 'accordion-active-has-fill accordion-active-has-shadow',
		);

		if( empty( $active_style ) ) {
			return;
		}

		return $active_style_arr[ $active_style ];		
	}


	protected function generate_css() {

		extract( $this->atts );

		$elements = array();
		$id = '.' . $this->get_id();
		
		$text_font_inline_style = '';
		
		if( 'yes' !== $use_theme_fonts ) {

			// Build the data array
			$text_font_data = $this->get_fonts_data( $text_font );

			// Build the inline style
			$text_font_inline_style = $this->google_fonts_style( $text_font_data );

			// Enqueue the right font
			$this->enqueue_google_fonts( $text_font_data );

		}

		$elements[ themethreads_implode( '%1$s .accordion-title'  ) ] = array( $text_font_inline_style );
		$elements[ themethreads_implode( '%1$s .accordion-title'  ) ]['font-size'] = !empty( $fs ) ? $fs : '';
		$elements[ themethreads_implode( '%1$s .accordion-title' ) ]['line-height'] = !empty( $lh ) ? $lh : '';
		$elements[ themethreads_implode( '%1$s .accordion-title'  ) ]['font-weight'] = !empty( $fw ) ? $fw : '';
		$elements[ themethreads_implode( '%1$s .accordion-title'  ) ]['letter-spacing'] = !empty( $ls ) ? $ls : '';
		
		//Heading color
		if( ! empty( $heading_color ) && isset( $heading_color ) ) {
			$elements[ themethreads_implode( '%1$s .accordion-title a' ) ]['color'] = $heading_color;
		}
		if( ! empty( $active_heading_color ) && isset( $active_heading_color ) ) {
			$elements[ themethreads_implode( '%1$s .active .accordion-title a' ) ]['color'] = $active_heading_color;
		}

		//BG Color
		if( ! empty( $bg_color ) && isset( $bg_color ) ) {
			$elements[ themethreads_implode( '%1$s .accordion-title a' ) ]['background'] = $bg_color;
		}
		if( ! empty( $active_bg_color ) && isset( $active_bg_color ) ) {
			$elements[ themethreads_implode( '%1$s .active .accordion-title a' ) ]['background'] = $active_bg_color;
		}
		
		//Border color		
		if( ! empty( $border_color ) && isset( $border_color ) ) {
			$elements[ themethreads_implode( '%1$s .accordion-title a, %1$s .accordion-item' ) ]['border-color'] = $border_color;
		}
		if( ! empty( $active_border_color ) && isset( $active_border_color ) ) {
			$elements[ themethreads_implode( '%1$s .active .accordion-title a, %1$s .accordion-item.active' ) ]['border-color'] = $active_border_color;
		}
		
		//Expander color		
		if( ! empty( $exp_color ) && isset( $exp_color ) ) {
			$elements[ themethreads_implode( '%1$s .accordion-expander' ) ]['color'] = $exp_color;
		}
		if( ! empty( $active_exp_color ) && isset( $active_exp_color ) ) {
			$elements[ themethreads_implode( '%1$s .active .accordion-expander' ) ]['color'] = $active_exp_color;
		}

		$this->dynamic_css_parser( $id, $elements );
	}


	
}
new LD_Accordion;

//Accordion Tab
include_once 'themethreads-accordion-tab.php';