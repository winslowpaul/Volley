<?php
/**
* Shortcode Tab
*/

if( !defined( 'ABSPATH' ) )
	exit; // Exit if accessed directly

/**
* LD_Shortcode
*/
class LD_Flipbox extends LD_Shortcode {

	/**
	 * Construct
	 * @method __construct
	 */
	public function __construct() {

		// Properties
		$this->slug          = 'ld_flipbox';
		$this->title         = esc_html__( 'Flip Box', 'volley-core' );
		$this->description   = esc_html__( 'Create a flip box', 'volley-core' );
		$this->styles      = array( 'themethreads-sc-flipbox' );
		$this->icon          = 'fa fa-random';
		$this->is_container  = true;
		$this->show_settings_on_create = false;
		$this->js_view       = 'VcBackendTtaTabsView';
		$this->as_parent     = array( 'only' => 'ld_flipbox_section' );
		$this->custom_markup = '<div class="vc_tta-container" data-vc-action="collapse">
			<div class="vc_general vc_tta vc_tta-tabs vc_tta-color-backend-tabs-white vc_tta-style-flat vc_tta-shape-rounded vc_tta-spacing-1 vc_tta-tabs-position-top vc_tta-controls-align-left">
				<div class="vc_tta-tabs-container">'
				. '<ul class="vc_tta-tabs-list">'
					. '<li class="vc_tta-tab" data-vc-tab data-vc-target-model-id="{{ model_id }}" data-element_type="ld_flipbox_section"><a href="javascript:;" data-vc-tabs data-vc-container=".vc_tta" data-vc-target="[data-model-id=\'{{ model_id }}\']" data-vc-target-model-id="{{ model_id }}"><span class="vc_tta-title-text">{{ section_title }}</span></a></li>'
				. '</ul>
				</div>
				<div class="vc_tta-panels vc_clearfix {{container-class}}">
					{{ content }}
				</div>
			</div>
		</div>';
		$this->default_content = '
			[ld_flipbox_section title="' . sprintf( '%s', 'Front' ) . '"][/ld_flipbox_section]
			[ld_flipbox_section title="' . sprintf( '%s', 'Back' ) . '"][/ld_flipbox_section]';
		$this->admin_enqueue_js = array( vc_asset_url( 'lib/vc_tabs/vc-tabs.min.js' ) );

		parent::__construct();
	}

	/**
	 * Get params
	 * @return array
	 */
	public function get_params() {

		$this->params = array(

			array(
				'type'        => 'dropdown',
				'param_name'  => 'direction',
				'heading'     => esc_html__( 'Flip Direction', 'volley-core' ),
				'description' => esc_html__( 'Select a flip direction for flip box', 'volley-core' ),
				'value' => array(
					esc_html__( 'Left to Right', 'volley-core' ) => '',
					esc_html__( 'Right to Left', 'volley-core' ) => 'ld-flipbox-rl',
					esc_html__( 'Top to Bottom', 'volley-core' ) => 'ld-flipbox-tb',
					esc_html__( 'Bottom to Top', 'volley-core' ) => 'ld-flipbox-bt',
				),
			),
			array(
				'type'        => 'dropdown',
				'param_name'  => 'shadow',
				'heading'     => esc_html__( 'Shadow', 'volley-core' ),
				'description' => esc_html__( 'Add shadow to flip box', 'volley-core' ),
				'value' => array(
					esc_html__( 'None', 'volley-core' )     => '',
					esc_html__( 'Default', 'volley-core' )  => 'ld-flipbox-shadow',
					esc_html__( 'On Hover', 'volley-core' ) => 'ld-flipbox-shadow-onhover',					
				),
			),
			array(
				'type'        => 'dropdown',
				'param_name'  => 'border_radius',
				'heading'     => esc_html__( 'Border Radius', 'volley-core' ),
				'description' => esc_html__( 'Add border radius to flip box', 'volley-core' ),
				'value' => array(
					esc_html__( 'None', 'volley-core' )     => '',
					esc_html__( 'Semi Round', 'volley-core' )  => 'semi-round',
					esc_html__( 'Round', 'volley-core' ) => 'round',
					esc_html__( 'Circle', 'volley-core' ) => 'circle',
				),
			),
			array(
				'type'        => 'subheading',
				'param_name'  => 'front_sbh',
				'heading'     => esc_html__( 'Front Side of the Flip Box', 'volley-core' ),
				'group' => esc_html__( 'Design Options', 'volley-core' ),
			),
			array(
				'type'        => 'themethreads_attach_image',
				'param_name'  => 'bg_image',
				'heading'     => esc_html__( 'Background Image', 'volley-core' ),
				'description' => esc_html__( 'Background image of the front side of the flip box', 'volley-core' ),
				'group'       => esc_html__( 'Design Options', 'volley-core' ),
				'edit_field_class' => 'vc_column-with-padding vc_col-sm-6',
			),
			array(
				'type'        => 'themethreads_colorpicker',
				'param_name'  => 'bg_color',
				'heading'     => esc_html__( 'Background Color', 'volley-core' ),
				'description' => esc_html__( 'Pick a background color for the front side.', 'volley-core' ),
				'group'       => esc_html__( 'Design Options', 'volley-core' ),
				'edit_field_class' => 'vc_col-sm-6',
			),
			array(
				'type'        => 'subheading',
				'param_name'  => 'back_sbh',
				'heading'     => esc_html__( 'Back Side of the Flip box', 'volley-core' ),
				'group' => esc_html__( 'Design Options', 'volley-core' ),
			),
			array(
				'type'        => 'themethreads_attach_image',
				'param_name'  => 'back_bg_image',
				'heading'     => esc_html__( 'Background Image', 'volley-core' ),
				'description' => esc_html__( 'Background image of the back side of the flip box', 'volley-core' ),
				'group'       => esc_html__( 'Design Options', 'volley-core' ),
				'edit_field_class' => 'vc_col-sm-6 vc_column-with-padding',
			),
			array(
				'type'        => 'themethreads_colorpicker',
				'param_name'  => 'back_bg_color',
				'heading'     => esc_html__( 'Background Color', 'volley-core' ),
				'description' => esc_html__( 'Pick a background color for the back side', 'volley-core' ),
				'group'       => esc_html__( 'Design Options', 'volley-core' ),
				'edit_field_class' => 'vc_col-sm-6',
			),
		);

		$this->add_extras();
	}

	public function before_output( $atts, &$content ) {

		global $themethreads_accordion_tabs;

		$themethreads_accordion_tabs = array();

		//parse ld_tab_section shortcode
		do_shortcode( $content );

		$atts['items'] = $themethreads_accordion_tabs;

		return $atts;
	}

	protected function get_content() {

		$out = ''; $first = true;

			foreach( $this->atts['items'] as $tab ) {
				$out .= sprintf(
					'<div id="%1$s" class="ld-flipbox-face %3$s"><span class="ld-flipbox-overlay ld-overlay"></span><div class="ld-flipbox-inner">%2$s</div></div>',
					$this->get_id( $tab ), $tab['content'], ( $first ? 'ld-flipbox-front' : 'ld-flipbox-back' )
				);
				$first = false;
			}

		echo $out;
	}

	protected function generate_css() {

		extract( $this->atts );

		$elements = array();
		$id = '.' .$this->get_id();

		if( !empty( $bg_image ) ) {
			if( preg_match( '/^\d+$/', $bg_image ) ){
				$src = themethreads_get_image_src( $bg_image );
				$elements[ themethreads_implode( '%1$s .ld-flipbox-front' ) ]['background-image'] = 'url(' . esc_url( $src[0] ) . ')';
			} else {
				$src = $bg_image;
				$elements[ themethreads_implode( '%1$s .ld-flipbox-front' ) ]['background-image'] = 'url(' . esc_url( $src ) . ')';
			}
			if( !empty( $bg_color ) ) {
				$elements[ themethreads_implode( '%1$s .ld-flipbox-front .ld-overlay' ) ]['background'] = $bg_color;
			}
		}
		else {
			if( !empty( $bg_color ) ) {
				$elements[ themethreads_implode( '%1$s .ld-flipbox-front' ) ]['background'] = $bg_color;
			}
		}


		if( !empty( $back_bg_image ) ) {
			if( preg_match( '/^\d+$/', $back_bg_image ) ){
				$back_src = themethreads_get_image_src( $back_bg_image );
				$elements[ themethreads_implode( '%1$s .ld-flipbox-back' ) ]['background-image'] = 'url(' . esc_url( $back_src[0] ) . ')';
			} else {
				$back_src = $back_bg_image;
				$elements[ themethreads_implode( '%1$s .ld-flipbox-back' ) ]['background-image'] = 'url(' . esc_url( $back_src ) . ')';
			}
			if( !empty( $back_bg_color ) ) {
				$elements[ themethreads_implode( '%1$s .ld-flipbox-back .ld-overlay' ) ]['background'] = $back_bg_color;
			}
		}
		else {
			if( !empty( $back_bg_color ) ) {
				$elements[ themethreads_implode( '%1$s .ld-flipbox-back' ) ]['background'] = $back_bg_color;
			}			
		}


		$this->dynamic_css_parser( $id, $elements );
	}
}
new LD_Flipbox;

// Accordion Tab
include_once 'themethreads-flipbox-section.php';