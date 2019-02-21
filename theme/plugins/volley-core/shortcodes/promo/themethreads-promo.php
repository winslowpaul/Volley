<?php

/**
* Shortcode Promo
*/

if( !defined( 'ABSPATH' ) )
	exit; // Exit if accessed directly

/**
* LD_Shortcode
*/
class LD_Promo extends LD_Shortcode { 

	/**
	 * [__construct description]
	 * @method __construct
	 */
	public function __construct() {

		// Properties
		$this->slug        = 'ld_promo';
		$this->title       = esc_html__( 'Fancy Promo', 'volley-core' );
		$this->description = esc_html__( 'Add a fancy promo', 'volley-core' );
		$this->icon        = 'fa fa-th-large';

		parent::__construct();
	}
	
	public function get_params() {
		
		$button = vc_map_integrate_shortcode( 'ld_button', 'ib_', esc_html__( 'Button', 'volley-core' ),
			array(
				'exclude' => array(
					'el_id',
					'el_class',
					'sh_shadowbox',
					'enable_row_shadowbox',
					'button_box_shadow',
					'hover_button_box_shadow'
				),
			),
			array(
				'element' => 'show_button',
				'value'   => 'yes',
			)
		);
		
		$params = array(

			array(
				'id'          => 'title',
				'edit_field_class' => 'vc_col-sm-8 vc_column-with-padding',
			),
			array(
				'type'        => 'checkbox',
				'param_name'  => 'use_custom_fonts_title',
				'heading'     => esc_html__( 'Custom font?', 'volley-core' ),
				'description' => esc_html__( 'Check to use custom font for title', 'volley-core' ),
				'edit_field_class' => 'vc_col-sm-4',
			),
			array(
				'type'       => 'textfield',
				'param_name' => 'label',
				'heading'    => esc_html__( 'Label', 'volley-core' ),
				'edit_field_class' => 'vc_col-sm-6',
			),			
			array(
				'type'        => 'themethreads_attach_image',
				'param_name'  => 'image',
				'heading'     => esc_html__( 'Image', 'volley-core' ),
				'edit_field_class' => 'vc_col-sm-6'
			),
			array(
				'type'       => 'textarea',
				'param_name' => 'content',
				'heading'    => esc_html__( 'Text', 'volley-core' ),
			),
			array(
				'type'        => 'themethreads_button_set',
				'param_name'  => 'content_alignment',
				'heading'     => esc_html__( 'Content Alignment', 'volley-core' ),
				'description' => esc_html__( 'Select alignement for the content in the fancy promo', 'volley-core' ),
				'value'       => array(
					esc_html__( 'Left', 'volley-core' )  => 'threads-promo-reverse',
					esc_html__( 'Right', 'volley-core' ) => 'threads-promo-default',
				),
				'std' => 'threads-promo-default'
			),
			array(
				'type'       => 'checkbox',
				'param_name' => 'show_dynamic_shape',
				'heading'    => esc_html__( 'Show Dynamic Shape', 'volley-core' ),
				'value'      => array( esc_html__( 'Yes', 'volley-core' ) => 'yes' ),
			),
			array(
				'type'       => 'dropdown',
				'param_name' => 'show_button',
				'heading'    => esc_html__( 'Show Button', 'volley-core' ),
				'value'      => array(
					esc_html__( 'No', 'volley-core' )  => '',
					esc_html__( 'Yes', 'volley-core' ) => 'yes'
				),
			),
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
				'group'      => esc_html__( 'Typo', 'volley-core' ),
				'dependency' => array(
					'element'            => 'use_theme_fonts',
					'value_not_equal_to' => 'yes',
				),
			),	
		);
		
		$design = array(

			array(
				'type'        => 'themethreads_colorpicker',
				'only_solid'  => true,
				'param_name'  => 'color',
				'heading'     => esc_html__( 'Primary Color', 'volley-core' ),
				'description' => esc_html__( 'Pick a color as primary', 'volley-core' ),
				'edit_field_class' => 'vc_col-sm-6 vc_column-with-padding',
				'group'       => esc_html__( 'Design Options', 'volley-core' ),
			),
			array(
				'type'        => 'themethreads_colorpicker',
				'only_solid'  => true,
				'param_name'  => 'overlay_color',
				'heading'     => esc_html__( 'Overlay Color', 'volley-core' ),
				'description' => esc_html__( 'Pick a color overlay', 'volley-core' ),
				'edit_field_class' => 'vc_col-sm-6',
				'group'       => esc_html__( 'Design Options', 'volley-core' ),
			),
			array(
				'type'        => 'themethreads_colorpicker',
				'only_solid'  => true,
				'param_name'  => 'dynamic_shape_bg',
				'heading'     => esc_html__( 'Dynamic Shape Background', 'volley-core' ),
				'description' => esc_html__( 'Pick a background color for dynamic shape ', 'volley-core' ),
				'edit_field_class' => 'vc_col-sm-6',
				'group'       => esc_html__( 'Design Options', 'volley-core' ),
				'dependency' => array(
					'element' => 'show_dynamic_shape',
					'value'   => 'yes',
				),
			),

		);
	
		$this->params = array_merge( $params, $typo, $button, $design );
		$this->add_extras();

	}
	
	protected function get_title() {

		// check
		if( empty( $this->atts['title'] ) ) {
			return '';
		}
		
		
		if( 'threads-promo-reverse' === $this->atts['content_alignment'] ) {
			printf( '<h2
				data-split-text="true"
				data-split-options=\'{ "type": "chars, words" }\'
				data-custom-animations="true"
				data-ca-options=\'{ "triggerHandler": "inview", "animationTarget": "all-childs", "direction": "backward", "duration": 800, "startDelay": 800, "delay": 70, "initValues": { "translateX": -70, "rotateY": -65, "opacity": 0 }, "animations": { "translateX": 0, "rotateY": 0, "opacity": 1 } }\'
			>%s</h2>', esc_html( $this->atts['title'] ) );
		}
		else {
			printf( '<h2
					data-split-text="true"
					data-split-options=\'{ "type": "chars, words" }\'
					data-custom-animations="true"
					data-ca-options=\'{ "triggerHandler": "inview", "animationTarget": "all-childs", "duration": 800, "startDelay": 800, "delay": 70, "initValues": { "translateX": 70, "rotateY": 65, "opacity": 0 }, "animations": { "translateX": 0, "rotateY": 0, "opacity": 1 } }\'
				>%s</h2>', esc_html( $this->atts['title'] ) );
		}

	}
	
	protected function get_label() {

		if ( empty( $this->atts['label'] ) ) {
			return;
		}
		
		printf( '<div class="threads-promo-cat"><ul class="reset-ul"><li>%s</li></ul></div><!-- /.threads-promo-cat -->', esc_html( $this->atts['label'] ) );
		
	}
	
	protected function get_image() {

		// check value
		if( empty( $this->atts['image'] ) ) {
			return;
		}

		$img_src = $image = '';
		$alt  = $this->atts['title'];
		
		if( preg_match( '/^\d+$/', $this->atts['image'] ) ) {
			$html = wp_get_attachment_image( $this->atts['image'], 'full', false, array( 'alt' => esc_html( $alt ) ) );
		} 
		else {
			$img_src  = $this->atts['image'];
				$html = '<img src="' . esc_url( $img_src ) . '" alt="' . esc_html( $alt ) . '" />';
		}
		
		printf( '<figure>%s</figure>', $html );

	}
	
	protected function get_content() {
		
		// check
		if( empty( $this->atts['content'] ) ) {
			return '';
		}

		$content = ld_helper()->do_the_content( $this->atts['content'] );
		
		printf( '<p
				data-split-text="true"
				data-split-options=\'{ "type": "lines" }\'
				data-custom-animations="true"
				data-ca-options=\'{ "triggerHandler": "inview", "animationTarget": "all-childs", "duration": 800, "startDelay": 1000, "delay": 120, "initValues": { "translateY": 50, "opacity": 0 }, "animations": { "translateY": 0, "opacity": 1 } }\'
			>%s</p>', $this->atts['content'] );
		
	}
	
	protected function get_dynamic_shape() {

		if( !$this->atts['show_dynamic_shape'] ) {
			return;
		}
		$svg_bg = !empty( $this->atts['dynamic_shape_bg'] ) ? esc_attr( $this->atts['dynamic_shape_bg'] ) : 'rgba(0, 0, 0, 0.05)';
		
		echo '<div class="threads-promo-dynamic-shape" data-dynamic-shape="true">
				<svg class="scene" width="100%" height="100%" fill="' . $svg_bg . '" viewbox="0 0 650 650">
					<path
						d="M717.349,515.468 C693.326,625.562 595.298,708.000 478.000,708.000 C351.735,708.000 247.793,612.479 234.460,489.760 C104.042,484.237 -0.000,376.777 -0.000,245.000 C-0.000,109.690 109.690,-0.000 245.000,-0.000 C330.697,-0.000 406.103,44.009 449.889,110.648 C481.742,95.493 517.376,87.000 555.000,87.000 C690.310,87.000 800.000,196.690 800.000,332.000 C800.000,405.029 768.036,470.582 717.349,515.468 Z"
						pathdata:id="
						M717.349,515.468 C693.326,625.562 595.298,708.000 478.000,708.000 C351.735,708.000 247.793,612.479 234.460,489.760 C104.042,484.237 -0.000,376.777 -0.000,245.000 C-0.000,109.690 109.690,-0.000 245.000,-0.000 C330.697,-0.000 406.103,44.009 449.889,110.648 C481.742,95.493 517.376,87.000 555.000,87.000 C690.310,87.000 800.000,196.690 800.000,332.000 C800.000,405.029 768.036,470.582 717.349,515.468 Z;
						M565.540,489.760 C552.207,612.479 448.265,708.000 322.000,708.000 C204.702,708.000 106.675,625.562 82.651,515.468 C31.964,470.582 -0.000,405.029 -0.000,332.000 C-0.000,196.690 109.690,87.000 245.000,87.000 C282.624,87.000 318.258,95.493 350.111,110.649 C393.897,44.009 469.303,0.000 555.000,0.000 C690.310,0.000 800.000,109.690 800.000,245.000 C800.000,376.777 695.958,484.238 565.540,489.760 Z;
						M565.540,489.760 C552.207,612.479 448.265,708.000 322.000,708.000 C204.702,708.000 106.675,625.562 82.651,515.468 C31.964,470.582 -0.000,405.029 -0.000,332.000 C-0.000,196.690 109.690,87.000 245.000,87.000 C282.624,87.000 318.258,95.493 350.111,110.649 C393.897,44.009 469.303,0.000 555.000,0.000 C690.310,0.000 800.000,109.690 800.000,245.000 C800.000,376.777 695.958,484.238 565.540,489.760 Z"
					/>
				</svg>
			</div><!-- /.threads-promo-dynamic-shape -->';
		
	}
	
	protected function get_button() {

		if ( empty( $this->atts['show_button'] ) ) {
			return;
		}

		$data = vc_map_integrate_parse_atts( $this->slug, 'ld_button', $this->atts, 'ib_' );
		if ( $data ) {

			$btn = visual_composer()->getShortCode( 'ld_button' )->shortcodeClass();

			if ( is_object( $btn ) ) {
				echo $btn->render( array_filter( $data ) );
			}
		}
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

		$elements[ themethreads_implode( '%1$s h2' ) ] = array( $text_font_inline_style );
		$elements[ themethreads_implode( '%1$s h2' ) ]['font-size'] = !empty( $fs ) ? $fs : '';
		$elements[ themethreads_implode( '%1$s h2' ) ]['line-height'] = !empty( $lh ) ? $lh : '';
		$elements[ themethreads_implode( '%1$s h2' ) ]['font-weight'] = !empty( $fw ) ? $fw : '';
		$elements[ themethreads_implode( '%1$s h2' ) ]['letter-spacing'] = !empty( $ls ) ? $ls : '';
		$elements[ themethreads_implode( '%1$s, %1$s h2' ) ]['color'] = !empty( $color ) ? $color : '';


		$this->dynamic_css_parser( $id, $elements );

	}
	
}

new LD_Promo;