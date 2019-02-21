<?php
/**
* Shortcode Tab
*/

if( !defined( 'ABSPATH' ) )
	exit; // Exit if accessed directly

/**
* LD_Shortcode
*/
class LD_Tabs extends LD_Shortcode {

	/**
	 * Construct
	 * @method __construct
	 */
	public function __construct() {

		// Properties
		$this->slug          = 'ld_tabs';
		$this->title         = esc_html__( 'Tabs', 'volley-core' );
		$this->description   = esc_html__( 'Tabbed content.', 'volley-core' );
		$this->icon          = 'fa fa-table';
		$this->is_container  = true;
		$this->show_settings_on_create = false;
		$this->js_view       = 'VcBackendTtaTabsView';
		$this->as_parent     = array( 'only' => 'ld_tab_section' );
		$this->styles        = array( 'themethreads-sc-tabs' );

		$this->custom_markup = '<div class="vc_tta-container" data-vc-action="collapse">
			<div class="vc_general vc_tta vc_tta-tabs vc_tta-color-backend-tabs-white vc_tta-style-flat vc_tta-shape-rounded vc_tta-spacing-1 vc_tta-tabs-position-top vc_tta-controls-align-left">
				<div class="vc_tta-tabs-container">'
				. '<ul class="vc_tta-tabs-list">'
					. '<li class="vc_tta-tab" data-vc-tab data-vc-target-model-id="{{ model_id }}" data-element_type="ld_tab_section"><a href="javascript:;" data-vc-tabs data-vc-container=".vc_tta" data-vc-target="[data-model-id=\'{{ model_id }}\']" data-vc-target-model-id="{{ model_id }}"><span class="vc_tta-title-text">{{ section_title }}</span></a></li>'
				. '</ul>
				</div>
				<div class="vc_tta-panels vc_clearfix {{container-class}}">
					{{ content }}
				</div>
			</div>
		</div>';
		$this->default_content = '
			[ld_tab_section title="' . sprintf( '%s %d', 'Tab', 1 ) . '"][/ld_tab_section]
			[ld_tab_section title="' . sprintf( '%s %d', 'Tab', 2 ) . '"][/ld_tab_section]';
		$this->admin_enqueue_js = array( vc_asset_url( 'lib/vc_tabs/vc-tabs.min.js' ) );

		parent::__construct();
	}

	/**
	 * Get params
	 * @return array
	 */
	public function get_params() {

		$url = themethreads_addons()->plugin_uri() . '/assets/img/sc-preview/tabs/';

		$this->params = array(

			array(
				'type'        => 'select_preview',
				'param_name'  => 'style',
				'heading'     => esc_html__( 'Style', 'volley-core' ),
				'value'       => array(
					array(
						'value' => 's1',
						'label' => esc_html__( 'Default', 'volley-core' ),
						'image' => $url . 'default.jpg'
					),
					array(
						'label' => esc_html__( 'Underline', 'volley-core' ),
						'value' => 's2',
						'image' => $url . 'underline.jpg'
					),
					array(
						'label' => esc_html__( 'Bordered', 'volley-core' ),
						'value' => 's3',
						'image' => $url . 'bordered.jpg'
					),
					array(
						'label' => esc_html__( 'Solid', 'volley-core' ),
						'value' => 's4',
						'image' => $url . 'solid.jpg'
					),
					array(
						'label' => esc_html__( 'Solid & Borders', 'volley-core' ),
						'value' => 's5',
						'image' => $url . 'solid-borders.jpg'
					),
					array(
						'label' => esc_html__( 'Side Nav', 'volley-core' ),
						'value' => 's6',
						'image' => $url . 'side-nav.jpg'
					),					
					array(
						'label' => esc_html__( 'Side Nav Alt', 'volley-core' ),
						'value' => 's11',
						'image' => $url . 'side-nav-alt.jpg'
					),
					array(
						'label' => esc_html__( 'Side Nav Block', 'volley-core' ),
						'value' => 's12',
						'image' => $url . 'side-nav-block.jpg'
					),
					array(
						'label' => esc_html__( 'Active Underlined', 'volley-core' ),
						'value' => 's7',
						'image' => $url . 'active-underlined.jpg'
					),
					array(
						'label' => esc_html__( 'Active Underlined 2', 'volley-core' ),
						'value' => 's8',
						'image' => $url . 'active-underlined-2.jpg'
					),
					array(
						'label' => esc_html__( 'Solid 2', 'volley-core' ),
						'value' => 's9',
						'image' => $url . 'solid-2.jpg'
					),
				),
				'save_always' => true,

			),
			array(
				'type'        => 'dropdown',
				'heading'     => esc_html__( 'Tabs Direction', 'volley-core' ),
				'param_name'  => 'tabs_direction',
				'value'       => array(
					esc_html__( 'Default', 'volley-core' ) => '',
					esc_html__( 'Reverse', 'volley-core' ) => 'flex-lg-row-reverse'
				),
				'dependency'  => array(
					'element' => 'style',
					'value'   => 's12'
				),
			),
			array(
				'type'        => 'checkbox',
				'param_name'  => 'use_custom_fonts_nav',
				'heading'     => esc_html__( 'Custom font?', 'volley-core' ),
				'description' => esc_html__( 'Check to use custom font for navigation', 'volley-core' ),
			),
			array(
				'type'        => 'checkbox',
				'param_name'  => 'enable_deeplinks',
				'heading'     => esc_html__( 'Enable Deeplinks?', 'volley-core' ),
				'description' => esc_html__( 'Check to enable deeplinks for navigation', 'volley-core' ),
			),
			array(
				'id'          => 'title',
				'dependency'  => array(
					'element' => 'style',
					'value'  => array( 's6' ),
				),
			),
			array(
				'type'        => 'themethreads_colorpicker',
				'only_solid'  => true,
				'param_name'  => 'primary_color',
				'heading'     => esc_html__( 'Primary Color', 'volley-core' ),
				'description' => esc_html__( 'Pick a primary color for tabs', 'volley-core' ),

				'edit_field_class' => 'vc_column-with-padding vc_col-sm-6',
				'group' => esc_html__( 'Design Options', 'volley-core' ),
			),
			array(
				'type'        => 'themethreads_colorpicker',
				'only_solid'  => true,
				'param_name'  => 'active_color',
				'heading'     => esc_html__( 'Active Color', 'volley-core' ),
				'description' => esc_html__( 'Pick a color for actvive tab', 'volley-core' ),
				'edit_field_class' => 'vc_col-sm-6',
				'group' => esc_html__( 'Design Options', 'volley-core' ),
			),
			array(
				'type'        => 'themethreads_colorpicker',
				'param_name'  => 'bg_color',
				'heading'     => esc_html__( 'Background Color', 'volley-core' ),
				'description' => esc_html__( 'Pick a color for background', 'volley-core' ),
				'edit_field_class' => 'vc_col-sm-6',
				'dependency' => array(
					'element' => 'style',
					'value' => array( 's4', 's5', 's9' ),
				),
 				'group' => esc_html__( 'Design Options', 'volley-core' ),
			),
			array(
				'type'        => 'themethreads_colorpicker',
				'param_name'  => 'hover_bg_color',
				'heading'     => esc_html__( 'Hover Background Color', 'volley-core' ),
				'description' => esc_html__( 'Pick a color for hover background', 'volley-core' ),
				'edit_field_class' => 'vc_col-sm-6',
				'dependency' => array(
					'element' => 'style',
					'value' => array( 's4', 's5', 's9' ),
				),
 				'group' => esc_html__( 'Design Options', 'volley-core' ),
			),
			array(
				'type'        => 'themethreads_colorpicker',
				'param_name'  => 'secondary_color',
				'heading'     => esc_html__( 'Secondary Color', 'volley-core' ),
				'description' => esc_html__( 'Pick a color for secondary elements', 'volley-core' ),
				'edit_field_class' => 'vc_col-sm-6',
				'dependency' => array(
					'element' => 'style',
					'value_not_equal_to' => array( 's1', 's4', 's5' ),
				),
 				'group' => esc_html__( 'Design Options', 'volley-core' ),
			),
			array(
				'type'        => 'themethreads_colorpicker',
				'param_name'  => 'border_color',
				'only_solid'  => true,
				'heading'     => esc_html__( 'Border Color', 'volley-core' ),
				'description' => esc_html__( 'Pick a color for border', 'volley-core' ),
				'edit_field_class' => 'vc_col-sm-6',
				'dependency' => array(
					'element' => 'style',
					'value_not_equal_to' => array( 's1', 's4' ),
				),
 				'group' => esc_html__( 'Design Options', 'volley-core' ),
			),

			//Typo Options
			array(
				'type'        => 'textfield',
				'param_name'  => 'fs',
				'heading'     => esc_html__( 'Font Size', 'volley-core' ),
				'description' => esc_html__( 'Example: 20px', 'volley-core' ),
				'edit_field_class' => 'vc_col-sm-3 vc_column-with-padding',
				'dependency' => array(
					'element' => 'use_custom_fonts_nav',
					'value'   => 'true',
				),
				'group' => esc_html__( 'Typography', 'volley-core' ),
			),
			array(
				'type'        => 'textfield',
				'param_name'  => 'lh',
				'heading'     => esc_html__( 'Line-Height', 'volley-core' ),
				'edit_field_class' => 'vc_col-sm-3',
				'dependency' => array(
					'element' => 'use_custom_fonts_nav',
					'value'   => 'true',
				),
				'group' => esc_html__( 'Typography', 'volley-core' ),
			),
			array(
				'type'        => 'textfield',
				'param_name'  => 'fw',
				'heading'     => esc_html__( 'Font Weight', 'volley-core' ),
				'edit_field_class' => 'vc_col-sm-3',
				'dependency' => array(
					'element' => 'use_custom_fonts_nav',
					'value'   => 'true',
				),
				'group' => esc_html__( 'Typography', 'volley-core' ),
			),
			array(
				'type'        => 'textfield',
				'param_name'  => 'ls',
				'heading'     => esc_html__( 'Letter Spacing', 'volley-core' ),
				'edit_field_class' => 'vc_col-sm-3',
				'dependency' => array(
					'element' => 'use_custom_fonts_nav',
					'value'   => 'true',
				),
				'group' => esc_html__( 'Typography', 'volley-core' ),
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
					'element' => 'use_custom_fonts_nav',
					'value'   => 'true',
				),
				'group' => esc_html__( 'Typography', 'volley-core' ),
			),
			array(
				'type'        => 'checkbox',
				'heading'     => esc_html__( 'Use for counter theme default font family?', 'volley-core' ),
				'param_name'  => 'use_theme_fonts',
				'value'       => array(
					esc_html__( 'Yes', 'volley-core' ) => 'yes'
				),
				'description' => esc_html__( 'Use font family from the theme.', 'volley-core' ),
				'group' => esc_html__( 'Typography', 'volley-core' ),
				'dependency' => array(
					'element' => 'use_custom_fonts_nav',
					'value'   => 'true',
				),
				'std'         => 'yes',
			),
			array(
				'type'       => 'google_fonts',
				'param_name' => 'nav_font',
				'value'      => 'font_family:Abril%20Fatface%3Aregular|font_style:400%20regular%3A400%3Anormal',
				'settings'   => array(
					'fields' => array(
						'font_family_description' => esc_html__( 'Select font family.', 'volley-core' ),
						'font_style_description'  => esc_html__( 'Select font styling.', 'volley-core' ),
					),
				),
				'group' => esc_html__( 'Typography', 'volley-core' ),
				'dependency' => array(
					'element'            => 'use_theme_fonts',
					'value_not_equal_to' => 'yes',
				),
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

	protected function get_class( $style ) {

		$hash = array(
			's1'  => 'tabs ',
			's2'  => 'tabs-nav-justified tabs-nav-underlined tabs-nav-active-underlined',
			's3'  => 'tabs tabs-nav-centered tabs-nav-bordered tabs-nav-active-filled',
			's4'  => 'tabs tabs-nav-filled tabs-nav-active-filled tabs-nav-spaced tabs-contents-shadowed',
			's5'  => 'tabs tabs-nav-centered tabs-nav-items-bordered tabs-nav-active-filled',
			//New
			's6'  => 'tabs tabs-nav-side tabs-nav-shadowed',
			's7'  => 'tabs tabs-nav-centered tabs-nav-active-underlined tabs-nav-sm',
			's8'  => 'tabs tabs-nav-centered tabs-nav-underlined tabs-nav-active-underlined tabs-nav-lg',
			's9'  => 'tabs tabs-nav-filled tabs-nav-justified tabs-nav-items-bordered tabs-nav-active-filled tabs-content-filled',
			's10' => 'tabs tabs-nav-justified tabs-nav-lg tabs-big-icon',
			's11' => 'tabs tabs-nav-side tabs-nav-side-alt',
			's12' => 'tabs tabs-nav-side tabs-nav-side-alt tabs-nav-side-block',
		);

		return $hash[ $style ];
	}

	protected function get_deeplink_opts() {
		
		if( !$this->atts['enable_deeplinks'] ) {
			return;
		}

		return 'data-plugin-options=\'{ "deepLink": true  }\'';

	}


	protected function get_nav() {

		$out = ''; $first = true;
		$style = $this->atts['style'];

		
		if( 's5' === $style ) {
			$out .= '<ul class="nav tabs-nav text-uppercase ltr-sp-175 font-weight-bold" role="tablist">';	
		}
		else {
			$out .= '<ul class="nav tabs-nav" role="tablist">';
		}
		
		if( !empty( $this->atts['title'] ) ) {
			$out .= '<li class="tabs-nav-title">
						<h6 class="font-weight-bold">' . esc_html( $this->atts['title'] ) . '</h6>
					</li>';
		}

			foreach( $this->atts['items'] as $i => $tab ) {

				// Classes
				$classes = array( 'h5' );
				if( 's4' === $style ) {
					$classes = array(
						'h6', 
						'text-uppercase', 
						'ltr-sp-075',
					);
				}
				if( 's8' === $style ) {
					$classes = array(
						'font-weight-semibold',
					);
				}
				
				if( $first ) {
					$classes[] = 'active';
				}

				if( in_array( $style, array( 's3', 's4', 's5' ) ) ) {
					$classes[] = 'text-uppercase';
				}
				$classes = !empty( $classes ) ? ' class="' . join( ' ', $classes ) . '"' : '';
				

				// Tab title
				$title = wp_kses_data( do_shortcode( $tab['title'] ) );
				
				if( !empty( $tab['desc'] ) ) {
					$desc = sprintf( '<span>%s</span>', $tab['desc'] );
					$title = $title . $desc;
				}
				
				
				if( 's4' === $style ) {
					$ex = explode( "|", $title );
					if ( ! empty( $ex ) && isset( $ex[1] ) ) {
						$title = sprintf( '<span class="date clearfix">%1$s</span>%2$s</a>',$ex[0], $ex[1] );
					}
				}
				if( $tab['icon']['type'] ) {
					if( !empty( $tab['icon']['size'] ) ) {
						$title = sprintf( '<span class="tabs-nav-icon" style="font-size:%s;"><i class="%s"></i></span>', $tab['icon']['size'], $tab['icon']['icon'] ) . $title;	
					}
					else {
						$title = sprintf( '<span class="tabs-nav-icon"><i class="%s"></i></span>', $tab['icon']['icon'] ) . $title;
					}
					
				}
				
				// Nav
				$out .= sprintf(
					'<li role="presentation"%3$s><a href="#%1$s" aria-expanded="false" aria-controls="%1$s" role="tab" data-toggle="tab">%2$s</a></li>',
					$this->get_id( $tab ), $title, $classes
				);
				$first = false;
			}

		$out .= '</ul>';

		echo $out;
	}

	protected function get_content() {

		$out = ''; $first = true;

		$out .= '<div class="tabs-content">';


			foreach( $this->atts['items'] as $tab ) {
				$out .= sprintf(
					'<div id="%1$s" role="tabpanel" class="tabs-pane fade%3$s">%2$s</div>',
					$this->get_id( $tab ), $tab['content'], ( $first ? ' active in' : '')
				);
				$first = false;
			}

		$out .= '</div>';

		echo $out;
	}

	protected function generate_css() {

		extract( $this->atts );

		$elements = array();
		$id = '.' .$this->get_id();
		
		$nav_font_inline_style = '';
		if( 'yes' !== $use_theme_fonts ) {

			// Build the data array
			$nav_font_data = $this->get_fonts_data( $nav_font );

			// Build the inline style
			$nav_font_inline_style = $this->google_fonts_style( $nav_font_data );

			// Enqueue the right font
			$this->enqueue_google_fonts( $nav_font_data );

		}
		
		$elements[ themethreads_implode( '%1$s .tabs-nav > li > a' ) ] = array( $nav_font_inline_style );
		$elements[ themethreads_implode( '%1$s .tabs-nav > li > a' ) ]['font-size'] = !empty( $fs ) ? $fs : '';
		$elements[ themethreads_implode( '%1$s .tabs-nav > li > a' ) ]['line-height'] = !empty( $lh ) ? $lh : '';
		$elements[ themethreads_implode( '%1$s .tabs-nav > li > a' ) ]['font-weight'] = !empty( $fw ) ? $fw : '';
		$elements[ themethreads_implode( '%1$s .tabs-nav > li > a' ) ]['letter-spacing'] = !empty( $ls ) ? $ls : '';
		$elements[ themethreads_implode( '%1$s .tabs-nav > li > a' ) ]['text-transform'] = !empty( $transform ) ? $transform : '';

		if( !empty( $primary_color ) ) {
			$elements[ themethreads_implode( '%1$s .tabs-nav > li > a' ) ]['color'] = $primary_color;
		}
		if( !empty( $active_color ) ) {
			$elements[ themethreads_implode( '%1$s .tabs-nav > li.active > a, %1$s .tabs-nav > li:hover > a' ) ]['color'] = $active_color;
		}
		if( 's2' === $style ) {
			if( !empty( $secondary_color ) ) {
				$elements[ themethreads_implode( array( '%1$s.tabs-nav-active-underlined .tabs-nav > li:after' ) ) ]['background'] = $secondary_color;
			}
			if( !empty( $border_color ) ) {
				$elements[ themethreads_implode( array( '%1$s .tabs-nav' ) ) ]['border-color'] = $border_color;
			}
		} 
		elseif( 's3' === $style ) {
			if( !empty( $secondary_color ) ) {
				$elements[ themethreads_implode( array( '%1$s.tabs-nav-active-filled .tabs-nav > li.active > a, %1$s.tabs-nav-active-filled .tabs-nav > li > a:hover' ) ) ]['background'] = $secondary_color;
			}
			if( !empty( $border_color ) ) {
				$elements[ themethreads_implode( array( '%1$s .tabs-nav' ) ) ]['border-color'] = $border_color;
			}
		}
		elseif( 's4' === $style ) {
			if( !empty( $bg_color ) ) {
				$elements[ themethreads_implode( '%1$s .tabs-nav > li > a' ) ]['background'] = $bg_color;
			}
			if( !empty( $hover_bg_color ) ) {
				$elements[ themethreads_implode( '%1$s .tabs-nav > li.active > a, %1$s .tabs-nav > li > a:hover' ) ]['background'] = $hover_bg_color;
			}
		}
		elseif( 's5' === $style ) {
			if( !empty( $bg_color ) ) {
				$elements[ themethreads_implode( '%1$s .tabs-nav > li > a' ) ]['background'] = $bg_color;
			}
			if( !empty( $hover_bg_color ) ) {
				$elements[ themethreads_implode( '%1$s .tabs-nav > li.active > a, %1$s .tabs-nav > li > a:hover' ) ]['background'] = $hover_bg_color;
			}
			if( !empty( $border_color ) ) {
				$elements[ themethreads_implode( array( '%1$s .tabs-nav li' ) ) ]['border-color'] = $border_color;
			}
		}
		elseif( 's6' === $style ) {
			if( !empty( $border_color ) ) {
				$elements[ themethreads_implode( array( '%1$s .tabs-nav a:after' ) ) ]['background-color'] = $border_color;
			}
			if( !empty( $secondary_color ) ) {
				$elements[ themethreads_implode( array( '%1$s .tabs-nav .tabs-nav-title h6' ) ) ]['color'] = $secondary_color;
			}
		}
		elseif( 's7' === $style ) {
			if( !empty( $border_color ) ) {
				$elements[ themethreads_implode( array( '%1$s .tabs-nav li:after' ) ) ]['background-color'] = $border_color;
			}
			if( !empty( $secondary_color ) ) {
				$elements[ themethreads_implode( array( '%1$s .tabs-nav li .active .tabs-nav-icon' ) ) ]['color'] = $secondary_color;
			}
		}
		elseif( 's8' === $style ) {
			if( !empty( $border_color ) ) {
				$elements[ themethreads_implode( array( '%1$s .tabs-nav li:after' ) ) ]['background-color'] = $border_color;
			}
			if( !empty( $secondary_color ) ) {
				$elements[ themethreads_implode( array( '%1$s .tabs-nav li.active .tabs-nav-icon' ) ) ]['color'] = $secondary_color;
				$elements[ themethreads_implode( array( '%1$s .tabs-nav li:after' ) ) ]['background'] = $secondary_color;
			}
		}
		elseif( 's9' === $style ) {
			if( !empty( $border_color ) ) {
				$elements[ themethreads_implode( array( '%1$s .tabs-nav li' ) ) ]['border-color'] = $border_color;
			}
			if( !empty( $bg_color ) ) {
				$elements[ themethreads_implode( '%1$s .tabs-nav > li > a' ) ]['background'] = $bg_color;
			}
			if( !empty( $hover_bg_color ) ) {
				$elements[ themethreads_implode( '%1$s .tabs-nav > li.active > a, %1$s .tabs-nav > li > a:hover' ) ]['background'] = $hover_bg_color;
			}
			if( !empty( $secondary_color ) ) {
				$elements[ themethreads_implode( array( '%1$s .tabs-content' ) ) ]['background-color'] = $secondary_color;
			}
		}
		elseif( 's10' === $style ) {
			if( !empty( $active_color ) ) {
				$elements[ themethreads_implode( array( '%1$s .tabs-nav li.active .tabs-nav-icon' ) ) ]['color'] = $active_color;
			}
			if( !empty( $secondary_color ) ) {
				$elements[ themethreads_implode( array( '%1$s .tabs-nav-icon' ) ) ]['background-color'] = $secondary_color;
			}
			if( !empty( $border_color ) ) {
				$elements[ themethreads_implode( array( '%1$s .tabs-nav:before' ) ) ]['background-color'] = $border_color;
			}
		}

		$this->dynamic_css_parser( $id, $elements );
	}
}
new LD_Tabs;

// Accordion Tab
include_once 'themethreads-tab-section.php';