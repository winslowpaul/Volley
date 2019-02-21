<?php
/**
* Shortcode Lists
*/

if ( ! defined( 'ABSPATH' ) ) 
	exit; // Exit if accessed directly

/**
* LD_Shortcode
*/
class LD_List extends LD_Shortcode { 

	/**
	 * [__construct description]
	 * @method __construct
	 */
	public function __construct() {

		// Properties
		$this->slug        = 'ld_list';
		$this->title       = esc_html__( 'Custom Lists', 'volley-core' );
		$this->icon        = 'fa fa-list';
		$this->description = esc_html__( 'Create custom lists.', 'volley-core' );

		parent::__construct();
	}
	
	public function get_params() {

		$params = array(
			
			array(
				'type'       => 'checkbox',
				'param_name' => 'inline',
				'heading'    => esc_html__( 'Inline List?', 'volley-core' ),
				'description' => esc_html__( 'Enable to make list inline', 'volley-core' ),
				'value'      => array( esc_html__( 'Yes', 'volley-core' ) => 'inline-nav' ),
			),	
			array(
				'type'        => 'exploded_textarea',
				'param_name'  => 'content',
				'heading'     => esc_html__( 'List Items', 'volley-core' ),
				'description' => esc_html__( 'Enter list items here. Divide items with linebreaks (Enter).', 'volley-core'),
				'value'       =>  'List item 1, List Item 2, List Item 3',
			),
			array(
				'type'        => 'checkbox',
				'param_name'  => 'use_custom_fonts_list',
				'heading'     => esc_html__( 'Custom font?', 'volley-core' ),
				'description' => esc_html__( 'Check to use custom font for lists items', 'volley-core' ),
			),
			array(
				'type'        => 'themethreads_slider',
				'param_name'  => 'items_spacing',
				'heading'     => esc_html__( 'Spacing', 'volley-core' ),
				'description' => esc_html__( 'Add margin between lists items', 'volley-core' ),
				'edit_field_class' => 'vc_col-sm-6',
				'min'         => 0,
				'max'         => 50,
				'step'        => 1,
			),
			array(
				'type'        => 'textfield',
				'param_name'  => 'bullet_size',
				'heading'     => esc_html__( 'Bullet Size', 'volley-core' ),
				'description' => esc_html__( 'Example: 20px', 'volley-core' ),
				'edit_field_class' => 'vc_col-sm-6',
			),

		);
		
		$design = array(
			
			array(
				'type'        => 'themethreads_colorpicker',
				'param_name'  => 'primary_color',
				'only_solid'  => true,
				'heading'     => esc_html__( 'Primary Color', 'volley-core' ),
				'description' => esc_html__( 'Pick a custom color for the date/time color', 'volley-core' ),
				'group'       => esc_html__( 'Design Options', 'volley-core' ),
			),
			array(
				'type'        => 'themethreads_colorpicker',
				'param_name'  => 'txt_color',
				'only_solid'  => true,
				'heading'     => esc_html__( 'Text Color', 'volley-core' ),
				'description' => esc_html__( 'Pick a color for text', 'volley-core' ),
				'group'       => esc_html__( 'Design Options', 'volley-core' ),
			)

		);
		
		$typo = array(

			//Typo Options
			array(
				'type'        => 'textfield',
				'param_name'  => 'fs',
				'heading'     => esc_html__( 'Font Size', 'volley-core' ),
				'description' => esc_html__( 'Example: 20px', 'volley-core' ),
				'edit_field_class' => 'vc_col-sm-3 vc_column-with-padding',
				'dependency' => array(
					'element' => 'use_custom_fonts_list',
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
					'element' => 'use_custom_fonts_list',
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
					'element' => 'use_custom_fonts_list',
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
					'element' => 'use_custom_fonts_list',
					'value'   => 'true',
				),
				'group' => esc_html__( 'Typo', 'volley-core' ),
			),
			array(
				'type'       => 'dropdown',
				'param_name' => 'transform',
				'heading'    => esc_html__( 'Transformation', 'volley-core' ),
				'value'      => array(
					esc_html__( 'Default', 'volley-core' )    => '',
					esc_html__( 'Uppercase', 'volley-core' )  => 'uppercase',
					esc_html__( 'Lowercase', 'volley-core' )  => 'lowercase',
					esc_html__( 'Capitalize', 'volley-core' ) => 'capitalize',
				),
				'dependency' => array(
					'element' => 'use_custom_fonts_list',
					'value'   => 'true',
				),
				'group' => esc_html__( 'Typo', 'volley-core' ),
			),
			array(
				'type'        => 'checkbox',
				'heading'     => esc_html__( 'Use for lists items theme default font family?', 'volley-core' ),
				'param_name'  => 'use_theme_fonts',
				'value'       => array(
					esc_html__( 'Yes', 'volley-core' ) => 'yes'
				),
				'description' => esc_html__( 'Use font family from the theme.', 'volley-core' ),
				'group' => esc_html__( 'Typo', 'volley-core' ),
				'dependency' => array(
					'element' => 'use_custom_fonts_list',
					'value'   => 'true',
				),
				'std'         => 'yes',
			),
			array(
				'type'       => 'google_fonts',
				'param_name' => 'list_font',
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
					
		);

		$this->params = array_merge( $params, $typo, $design );
		$this->add_extras();
	}

	
	protected function get_items() {

		// check
		if( empty( $this->atts['content'] ) ) {
			return '';
		}
		
		$output = '';
		
		$items = explode( ',', $this->atts['content'] );
		
		foreach( $items as $item ) {
			$output .= sprintf( '<li>%s</li>', $item );
		}

		echo $output;
	}

	protected function generate_css() {
		
		extract( $this->atts );

		$elements = array();
		$id = '.' . $this->get_id();

		$list_font_inline_style = '';
		
		if( 'yes' !== $use_theme_fonts ) {

			// Build the data array
			$list_font_data = $this->get_fonts_data( $list_font );

			// Build the inline style
			$list_font_inline_style = $this->google_fonts_style( $list_font_data );

			// Enqueue the right font
			$this->enqueue_google_fonts( $list_font_data );

		}
		
		if( '0' !== $items_spacing && empty( $inline ) ) {
			$elements[ themethreads_implode( '%1$s li' ) ]['margin-bottom'] = $items_spacing . 'px';
		}
		elseif( '0' !== $items_spacing && $inline ) {
			$elements[ themethreads_implode( '%1$s.inline-nav li + li' ) ]['margin-left'] = $items_spacing . 'px';
		}
		
		$elements[ themethreads_implode( '%1$s > li' ) ] = array( $list_font_inline_style );
		$elements[ themethreads_implode( '%1$s > li' ) ]['font-size'] = !empty( $fs ) ? $fs : '';
		$elements[ themethreads_implode( '%1$s > li' ) ]['line-height'] = !empty( $lh ) ? $lh : '';
		$elements[ themethreads_implode( '%1$s > li' ) ]['font-weight'] = !empty( $fw ) ? $fw : '';
		$elements[ themethreads_implode( '%1$s > li' ) ]['letter-spacing'] = !empty( $ls ) ? $ls : '';
		
		if( !empty( $txt_color ) ) {
			$elements[ themethreads_implode( '%1$s > li' ) ]['color'] = $txt_color;			
		}
		if( !empty( $transform ) ) {
			$elements[ themethreads_implode( '%1$s > li' ) ]['text-transform'] = $transform;
		}
		if( !empty( $bullet_size ) ) { 
			$elements[ themethreads_implode( '%1$s li:before' ) ] = array(
				'height' => $bullet_size,
				'width'  => $bullet_size,
			);
		}
		if( !empty( $primary_color ) ) {
			$elements[ themethreads_implode( '%1$s li:before' ) ]['background'] = $primary_color;
		}

		$this->dynamic_css_parser( $id, $elements );
	}
	
}

new LD_List;