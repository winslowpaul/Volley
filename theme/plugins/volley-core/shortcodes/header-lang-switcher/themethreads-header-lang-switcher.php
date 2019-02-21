<?php
/**
* Shortcode Header Dropdown
*/

if ( ! defined( 'ABSPATH' ) ) 
	exit; // Exit if accessed directly

/**
* LD_Shortcode
*/
class LD_Header_Lang_Switcher extends LD_Shortcode { 
	
	/**
	 * [__construct description]
	 * @method __construct
	 */
	public function __construct() {

		// Properties
		$this->slug        = 'ld_header_lang_switcher';
		$this->title       = esc_html__( 'Header Language Switcher', 'volley-core' );
		$this->icon        = 'fa fa-bars';
		$this->description = esc_html__( 'Create custom dropdown.', 'volley-core' );
		$this->category    = esc_html__( 'Header Modules', 'volley-core' );

		parent::__construct();
	}
	
	public function get_params() {

		$this->params = array(
			array(
				'type'        => 'checkbox',
				'param_name'  => 'use_custom_fonts_trigger',
				'heading'     => esc_html__( 'Custom font for Trigger?', 'volley-core' ),
				'description' => esc_html__( 'Check to use custom font for trigger label', 'volley-core' ),
				'edit_field_class' => 'vc_col-sm-6 vc_column-with-padding',
			),
			array(
				'type'        => 'checkbox',
				'param_name'  => 'use_custom_fonts_menu',
				'heading'     => esc_html__( 'Custom font for Dropdown?', 'volley-core' ),
				'description' => esc_html__( 'Check to use custom font for dropdown', 'volley-core' ),
				'edit_field_class' => 'vc_col-sm-6',
			),
			//Typo Options
			array(
				'type'        => 'textfield',
				'param_name'  => 'trigger_fs',
				'heading'     => esc_html__( 'Font Size', 'volley-core' ),
				'description' => esc_html__( 'Example: 20px', 'volley-core' ),
				'edit_field_class' => 'vc_col-sm-3 vc_column-with-padding',
				'dependency' => array(
					'element' => 'use_custom_fonts_trigger',
					'value'   => 'true',
				),
				'group' => esc_html__( 'Typo Label', 'volley-core' ),
			),
			array(
				'type'        => 'textfield',
				'param_name'  => 'trigger_lh',
				'heading'     => esc_html__( 'Line-Height', 'volley-core' ),
				'edit_field_class' => 'vc_col-sm-3',
				'dependency' => array(
					'element' => 'use_custom_fonts_trigger',
					'value'   => 'true',
				),
				'group' => esc_html__( 'Typo Label', 'volley-core' ),
			),
			array(
				'type'        => 'textfield',
				'param_name'  => 'trigger_fw',
				'heading'     => esc_html__( 'Font Weight', 'volley-core' ),
				'edit_field_class' => 'vc_col-sm-3',
				'dependency' => array(
					'element' => 'use_custom_fonts_trigger',
					'value'   => 'true',
				),
				'group' => esc_html__( 'Typo Label', 'volley-core' ),
			),
			array(
				'type'        => 'textfield',
				'param_name'  => 'trigger_ls',
				'heading'     => esc_html__( 'Letter Spacing', 'volley-core' ),
				'edit_field_class' => 'vc_col-sm-3',
				'dependency' => array(
					'element' => 'use_custom_fonts_trigger',
					'value'   => 'true',
				),
				'group' => esc_html__( 'Typo Label', 'volley-core' ),
			),
			array(
				'type'        => 'checkbox',
				'heading'     => esc_html__( 'Use for Trigger Label theme default font family?', 'volley-core' ),
				'param_name'  => 'use_theme_fonts_trigger',
				'value'       => array(
					esc_html__( 'Yes', 'volley-core' ) => 'yes'
				),
				'description' => esc_html__( 'Use font family from the theme.', 'volley-core' ),
				'group' => esc_html__( 'Typo Label', 'volley-core' ),
				'dependency' => array(
					'element' => 'use_custom_fonts_trigger',
					'value'   => 'true',
				),
				'std'         => 'yes',
			),
			array(
				'type'       => 'google_fonts',
				'param_name' => 'trigger_font',
				'value'      => 'font_family:Abril%20Fatface%3Aregular|font_style:400%20regular%3A400%3Anormal',
				'settings'   => array(
					'fields' => array(
						'font_family_description' => esc_html__( 'Select font family.', 'volley-core' ),
						'font_style_description'  => esc_html__( 'Select font styling.', 'volley-core' ),
					),
				),
				'group' => esc_html__( 'Typo Label', 'volley-core' ),
				'dependency' => array(
					'element'            => 'use_theme_fonts_trigger',
					'value_not_equal_to' => 'yes',
				),
			),
			array(
				'type'        => 'dropdown',
				'param_name'  => 'hover_style',
				'heading'     => esc_html__( 'Hover Style', 'volley-core' ),
				'description' => esc_html__( 'Select hover style for dropdown', 'volley-core' ),
				'value'       => array(
					esc_html__( 'Default', 'volley-core' ) => '',
					esc_html__( 'Underlined', 'volley-core' )   => 'ld-dropdown-menu-underlined',
				),
			),
			//Typo Options
			array(
				'type'        => 'textfield',
				'param_name'  => 'fs',
				'heading'     => esc_html__( 'Font Size', 'volley-core' ),
				'description' => esc_html__( 'Example: 20px', 'volley-core' ),
				'edit_field_class' => 'vc_col-sm-3 vc_column-with-padding',
				'dependency' => array(
					'element' => 'use_custom_fonts_menu',
					'value'   => 'true',
				),
				'group' => esc_html__( 'Typo DropDown', 'volley-core' ),
			),
			array(
				'type'        => 'textfield',
				'param_name'  => 'lh',
				'heading'     => esc_html__( 'Line-Height', 'volley-core' ),
				'edit_field_class' => 'vc_col-sm-3',
				'dependency' => array(
					'element' => 'use_custom_fonts_menu',
					'value'   => 'true',
				),
				'group' => esc_html__( 'Typo DropDown', 'volley-core' ),
			),
			array(
				'type'        => 'textfield',
				'param_name'  => 'fw',
				'heading'     => esc_html__( 'Font Weight', 'volley-core' ),
				'edit_field_class' => 'vc_col-sm-3',
				'dependency' => array(
					'element' => 'use_custom_fonts_menu',
					'value'   => 'true',
				),
				'group' => esc_html__( 'Typo DropDown', 'volley-core' ),
			),
			array(
				'type'        => 'textfield',
				'param_name'  => 'ls',
				'heading'     => esc_html__( 'Letter Spacing', 'volley-core' ),
				'edit_field_class' => 'vc_col-sm-3',
				'dependency' => array(
					'element' => 'use_custom_fonts_menu',
					'value'   => 'true',
				),
				'group' => esc_html__( 'Typo DropDown', 'volley-core' ),
			),
			array(
				'type'        => 'checkbox',
				'heading'     => esc_html__( 'Use for Dropdown items theme default font family?', 'volley-core' ),
				'param_name'  => 'use_theme_fonts',
				'value'       => array(
					esc_html__( 'Yes', 'volley-core' ) => 'yes'
				),
				'description' => esc_html__( 'Use font family from the theme.', 'volley-core' ),
				'group' => esc_html__( 'Typo DropDown', 'volley-core' ),
				'dependency' => array(
					'element' => 'use_custom_fonts_menu',
					'value'   => 'true',
				),
				'std'         => 'yes',
			),
			array(
				'type'       => 'google_fonts',
				'param_name' => 'menu_font',
				'value'      => 'font_family:Abril%20Fatface%3Aregular|font_style:400%20regular%3A400%3Anormal',
				'settings'   => array(
					'fields' => array(
						'font_family_description' => esc_html__( 'Select font family.', 'volley-core' ),
						'font_style_description'  => esc_html__( 'Select font styling.', 'volley-core' ),
					),
				),
				'group' => esc_html__( 'Typo DropDown', 'volley-core' ),
				'dependency' => array(
					'element'            => 'use_theme_fonts',
					'value_not_equal_to' => 'yes',
				),
			),
			array(
				'type'        => 'themethreads_colorpicker',
				'param_name'  => 'trigger_color',
				'only_solid'  => true,
				'heading'     => esc_html__( 'Label Color', 'volley-core' ),
				'description' => esc_html__( 'Pick a color for the trigger label', 'volley-core' ),
				'edit_field_class' => 'vc_col-sm-4 vc_column-with-padding',
				'group' => esc_html__( 'Design Options' ),
			),
			array(
				'type'        => 'themethreads_colorpicker',
				'param_name'  => 'color',
				'only_solid'  => true,
				'heading'     => esc_html__( 'Color', 'volley-core' ),
				'description' => esc_html__( 'Pick a color for the dropdown item', 'volley-core' ),
				'edit_field_class' => 'vc_col-sm-4',
				'group' => esc_html__( 'Design Options' ),
			),
			array(
				'type'        => 'themethreads_colorpicker',
				'param_name'  => 'hcolor',
				'only_solid'  => true,
				'heading'     => esc_html__( 'Hover Color', 'volley-core' ),
				'description' => esc_html__( 'Pick hover color for the dropdown item', 'volley-core' ),
				'edit_field_class' => 'vc_col-sm-4',
				'group' => esc_html__( 'Design Options' ),
			)

		);

		$this->add_extras();
	}
	
	protected function generate_css() {
		
		$settings = get_option( 'wpb_js_google_fonts_subsets' );
		if ( is_array( $settings ) && ! empty( $settings ) ) {
			$subsets = '&subset=' . implode( ',', $settings );
		} else {
			$subsets = '';
		}

		extract( $this->atts );

		$elements = array();
		$id = '.' . $this->get_id();
		$menu_font_inline_style = $trigger_font_inline_style = '';
		
		if( 'yes' !== $use_theme_fonts ) {

			// Build the data array
			$menu_font_data = $this->get_fonts_data( $menu_font );

			// Build the inline style
			$menu_font_inline_style = $this->google_fonts_style( $menu_font_data );

			// Enqueue the right font
			$this->enqueue_google_fonts( $menu_font_data );

		}
		
		if( 'yes' !== $use_theme_fonts_trigger ) {

			// Build the data array
			$trigger_font_data = $this->get_fonts_data( $trigger_font );

			// Build the inline style
			$trigger_font_inline_style = $this->google_fonts_style( $trigger_font_data );

			// Enqueue the right font
			$this->enqueue_google_fonts( $trigger_font_data );

		}
		
		$elements[ themethreads_implode( '%1$s li > a' ) ] = array( $menu_font_inline_style );
		$elements[ themethreads_implode( '%1$s li > a' ) ]['font-size'] = !empty( $fs ) ? $fs : '';
		$elements[ themethreads_implode( '%1$s li > a' ) ]['line-height'] = !empty( $lh ) ? $lh : '';
		$elements[ themethreads_implode( '%1$s li > a' ) ]['font-weight'] = !empty( $fw ) ? $fw : '';
		$elements[ themethreads_implode( '%1$s li > a' ) ]['letter-spacing'] = !empty( $ls ) ? $ls : '';
		
		$elements[ themethreads_implode( '%1$s .ld-module-trigger-txt' ) ] = array( $trigger_font_inline_style );
		$elements[ themethreads_implode( '%1$s .ld-module-trigger-txt' ) ]['font-size'] = !empty( $trigger_fs ) ? $trigger_fs : '';
		$elements[ themethreads_implode( '%1$s .ld-module-trigger-txt' ) ]['line-height'] = !empty( $trigger_lh ) ? $trigger_lh : '';
		$elements[ themethreads_implode( '%1$s .ld-module-trigger-txt' ) ]['font-weight'] = !empty( $trigger_fw ) ? $trigger_fw : '';
		$elements[ themethreads_implode( '%1$s .ld-module-trigger-txt' ) ]['letter-spacing'] = !empty( $trigger_ls ) ? $trigger_ls : '';

		if( !empty( $trigger_color ) ) {
			$elements[ themethreads_implode( '%1$s .ld-module-trigger-txt' ) ]['color'] = $trigger_color;
		}
		if( !empty( $color ) ) {
			$elements[ themethreads_implode( '%1$s li > a' ) ]['color'] = $color;
		}
		if( !empty( $hcolor ) ) {
			$elements[ themethreads_implode( '%1$s li > a:hover' ) ]['color'] = $hcolor;
		}

		$this->dynamic_css_parser( $id, $elements );

	}

}
new LD_Header_Lang_Switcher;