<?php
/**
* Shortcode Header Menu
*/

if( !defined( 'ABSPATH' ) )
	exit; // Exit if accessed directly

/**
* LD_Shortcode
*/
class LD_Header_Menu extends LD_Shortcode {

	/**
	 * [__construct description]
	 * @method __construct
	 */
	public function __construct() {

		// Properties
		$this->slug        = 'ld_header_menu';
		$this->title       = esc_html__( 'Primary Menu', 'volley-core' );
		$this->description = esc_html__( 'Add Navigation Menu', 'volley-core' );
		$this->icon        = 'fa fa-star';
		$this->category    = esc_html__( 'Header Modules', 'volley-core' );

		parent::__construct();

	}
	
	public function get_params() {

		$this->params = array(

			array(
				'type'        => 'dropdown',
				'param_name'  => 'menu_slug',
				'heading'     => esc_html__( 'Menu', 'volley-core' ),
				'description' => esc_html__( 'Select the menu you want to use.', 'volley-core' ),
				'admin_label' => true,
				'value' => ld_helper()->get_terms_data_for_vc('nav_menu'),
				'edit_field_class' => 'vc_col-sm-4 vc_column-with-padding'
			),
			array(
				'type' => 'dropdown',
				'param_name' => 'hover_style',
				'heading' => esc_html__( 'Hover style', 'volley-core' ),
				'description' => esc_html__( 'Select a hover style for menu', 'volley-core' ),
				'value' => array(
					esc_html__( 'None', 'volley-core' )                => '',
					esc_html__( 'Default', 'volley-core' )             => 'default',
					esc_html__( 'Underline', 'volley-core' )           => 'underline-1',
					esc_html__( 'Underline 2', 'volley-core' )         => 'underline-2',
					esc_html__( 'Underline 3', 'volley-core' )         => 'underline-3',
					esc_html__( 'Underline 4 (thick)', 'volley-core' ) => 'underline-4',
					esc_html__( 'Linethrough', 'volley-core' )         => 'linethrough',
					esc_html__( 'Fade Inactive', 'volley-core' )       => 'fade-inactive',	
				),
				'edit_field_class' => 'vc_col-sm-4'
			),
			array(
				'type' => 'dropdown',
				'param_name' => 'align_items',
				'heading' => esc_html__( 'Alignment', 'volley-core' ),
				'description' => esc_html__( 'Select alignment for menu items', 'volley-core' ),
				'value' => array(
					esc_html__( 'Left', 'volley-core' )       => 'start',
					esc_html__( 'Center', 'volley-core' )    => 'center',
					esc_html__( 'Right', 'volley-core' )  => 'end',
				),
				'std' => 'center',
				'edit_field_class' => 'vc_col-sm-4'
			),
			array(
				'type'        => 'checkbox',
				'param_name'  => 'use_custom_fonts_menu',
				'heading'     => esc_html__( 'Custom font?', 'volley-core' ),
				'description' => esc_html__( 'Check to use custom font for menu', 'volley-core' ),
				'edit_field_class' => 'vc_col-sm-6'
			),
			array(
				'type'        => 'checkbox',
				'param_name'  => 'local_scroll',
				'heading'     => esc_html__( 'Enable Local scroll?', 'volley-core' ),
				'description' => esc_html__( 'Check to use local scroll, to create one page navigation', 'volley-core' ),
				'edit_field_class' => 'vc_col-sm-6'
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
				'group' => esc_html__( 'Typo', 'volley-core' ),
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
				'group' => esc_html__( 'Typo', 'volley-core' ),
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
				'group' => esc_html__( 'Typo', 'volley-core' ),
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
					'element' => 'use_custom_fonts_menu',
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
				'group' => esc_html__( 'Typo', 'volley-core' ),
				'dependency' => array(
					'element'            => 'use_theme_fonts',
					'value_not_equal_to' => 'yes',
				),
			),
			array(
				'type'        => 'themethreads_colorpicker',
				'param_name'  => 'link_color',
				'only_solid'  => true,
				'heading'     => esc_html__( 'Color', 'volley-core' ),
				'description' => esc_html__( 'Pick a color for the menu item', 'volley-core' ),
				'edit_field_class' => 'vc_col-sm-6',
				'group' => esc_html__( 'Design Options' ),
			),
			array(
				'type'        => 'themethreads_colorpicker',
				'param_name'  => 'link_hcolor',
				'only_solid'  => true,
				'heading'     => esc_html__( 'Hover Color', 'volley-core' ),
				'description' => esc_html__( 'Pick hover color for the menu item', 'volley-core' ),
				'edit_field_class' => 'vc_col-sm-6',
				'group' => esc_html__( 'Design Options' ),
			),
			array(
				'type'        => 'themethreads_colorpicker',
				'param_name'  => 'color',
				'only_solid'  => true,
				'heading'     => esc_html__( 'Background Color', 'volley-core' ),
				'description' => esc_html__( 'Pick a background color for the decoration line', 'volley-core' ),
				'edit_field_class' => 'vc_col-sm-6',
				'group' => esc_html__( 'Design Options' ),
				'dependency' => array(
					'element' => 'hover_style',
					'value' => array( 'underline-1', 'underline-2', 'underline-3', 'underline-4' ),
				),
			),
			array(
				'type'        => 'themethreads_colorpicker',
				'param_name'  => 'sec_color',
				'only_solid'  => true,
				'heading'     => esc_html__( 'Secondary Background Color', 'volley-core' ),
				'description' => esc_html__( 'Pick secondary background color for the decoration line, will create gradient', 'volley-core' ),
				'edit_field_class' => 'vc_col-sm-6',
				'group' => esc_html__( 'Design Options' ),
				'dependency' => array(
					'element' => 'hover_style',
					'value' => 'underline-2',
				),
			)

		);

		$this->add_extras();
	}
	
	protected function add_local_scroll() {
		
		if( !$this->atts['local_scroll'] ) {
			return;
		}
		
		return 'data-localscroll="true"';

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
		$menu_font_inline_style = '';
		
		if( 'yes' !== $use_theme_fonts ) {

			// Build the data array
			$menu_font_data = $this->get_fonts_data( $menu_font );

			// Build the inline style
			$menu_font_inline_style = $this->google_fonts_style( $menu_font_data );

			// Enqueue the right font
			$this->enqueue_google_fonts( $menu_font_data );

		}
		
		$elements[ themethreads_implode( '%1$s.main-nav > li > a' ) ] = array( $menu_font_inline_style );
		$elements[ themethreads_implode( '%1$s.main-nav > li > a' ) ]['font-size'] = !empty( $fs ) ? $fs : '';
		$elements[ themethreads_implode( '%1$s.main-nav > li > a' ) ]['line-height'] = !empty( $lh ) ? $lh : '';
		$elements[ themethreads_implode( '%1$s.main-nav > li > a' ) ]['font-weight'] = !empty( $fw ) ? $fw : '';
		$elements[ themethreads_implode( '%1$s.main-nav > li > a' ) ]['letter-spacing'] = !empty( $ls ) ? $ls : '';

		if( !empty( $color ) && !empty( $sec_color ) )  {
			$elements[themethreads_implode( '%1$s.main-nav > li > a .link-ext' )]['background'] = 'linear-gradient(to right, ' . $color . ' 0%, ' . $sec_color . ' 100%)';
		}
		elseif( !empty( $color ) )  {
			$elements[themethreads_implode( '%1$s.main-nav > li > a .link-ext' )]['background'] = $color;
		}
		if( !empty( $link_color ) ) {
			$elements[ themethreads_implode( '%1$s.main-nav > li > a' ) ]['color'] = $link_color;
		}
		if( !empty( $link_hcolor ) ) {
			$elements[ themethreads_implode( '%1$s.main-nav > li > a:hover' ) ]['color'] = $link_hcolor;
		}
		if( !empty( $transform ) ) {
			$elements[ themethreads_implode( '%1$s.main-nav > li > a' ) ]['text-transform'] = $transform;
		}

		$this->dynamic_css_parser( $id, $elements );

	}

}
new LD_Header_Menu;