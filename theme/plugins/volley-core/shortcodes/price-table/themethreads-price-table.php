<?php
/**
* Shortcode ThemeThreads Pricing Table
*/

if( ! defined( 'ABSPATH' ) ) 
	exit; // Exit if accessed directly

/**
* LD_Shortcode
*/
class LD_Price_Table extends LD_Shortcode {

	/**
	 * [__construct description]
	 * @method __construct
	 */
	public function __construct() {

		// Properties
		$this->slug        = 'ld_price_table';
		$this->title       = esc_html__( 'Price Table', 'volley-core' );
		$this->description = esc_html__( 'Create pricing table.', 'volley-core' );
		$this->icon        = 'fa fa-usd';

		parent::__construct();
	}
	
	public function get_params() {

		$url = themethreads_addons()->plugin_uri() . '/assets/img/sc-preview/pricing-table/';

		$icon = themethreads_get_icon_params( false, '', 'all', array( 'align', 'size' ), 'i_', array(
			'element' => 'style',
			'value' => array( 's8' )
		) );

		$content = array_merge(
		array(
			array(
				'type'        => 'select_preview',
				'param_name'  => 'style',
				'heading'     => esc_html__( 'Style', 'volley-core' ),
				'admin_label' => true,
				'value'       => array(
					array(
						'value' => 'default',
						'label' => esc_html__( 'Default', 'volley-core' ),
						'image' => $url . 'classic.jpg'
					),
					array(
						'label' => esc_html__( 'Colorfull', 'volley-core' ),
						'value' => 's2',
						'image' => $url . 'colorful.jpg'
					),
					array(
						'label' => esc_html__( 'Modern', 'volley-core' ),
						'value' => 's3',
						'image' => $url . 'modern.jpg'
					),
					array(
						'label' => esc_html__( 'Minimal', 'volley-core' ),
						'value' => 's4',
						'image' => $url . 'minimal.jpg'
					),
				),
				'save_always' => true,
			),

			array(
				'type'        => 'textarea',
				'param_name'  => 'title',
				'heading'     => esc_html__( 'Title', 'volley-core' ),
				'admin_label' => true,
				'edit_field_class' => 'vc_col-sm-6'
			),
			array(
				'type'        => 'textfield',
				'param_name'  => 'subtitle',
				'heading'     => esc_html__( 'Subtitle', 'volley-core' ),
				'dependency'  => array(
					'element' => 'style',
					'value'   => 'default',
				),
				'edit_field_class' => 'vc_col-sm-6'
				
			),
			array(
				'type'       => 'textfield',
				'param_name' => 'price',
				'heading'    => esc_html__( 'Price', 'volley-core' ),
				'edit_field_class' => 'vc_col-sm-6'
			),
			array(
				'type'        => 'checkbox',
				'param_name'  => 'featured',
				'heading'     => esc_html__( 'Featured?', 'volley-core' ),
				'description' => esc_html__( 'Enable to make this price table featured', 'volley-core' ),
				'value'       => array( esc_html__( 'Yes', 'volley-core' ) => 'yes' ),
				'dependency' => array(
					'element' => 'style',
					'value'   => array( 's2', 's3' ),
				),
			),
			array(
				'type'        => 'checkbox',
				'param_name'  => 'featured_tag',
				'heading'     => esc_html__( 'Show featured tag?', 'volley-core' ),
				'description' => esc_html__( 'Enable to featured tag with label', 'volley-core' ),
				'value'       => array( esc_html__( 'Yes', 'volley-core' ) => 'yes' ),
				'dependency' => array(
					'element' => 'style',
					'value'   => array( 'default', 's2' ),
				),
				'edit_field_class' => 'vc_col-sm-6'
			),
			array(
				'type' => 'textfield',	
				'param_name' => 'featured_label',
				'heading' => esc_html__( 'Featured Label', 'volley-core' ),
				'description' => esc_html__( 'Add featured label under the featured icon', 'volley-core' ),
				'dependency'  => array(
					'element' => 'featured_tag',
					'value'   => 'yes',
				),
				'edit_field_class' => 'vc_col-sm-6'
			),


		),

		$icon,

		array(

			array(
				'type'        => 'textarea_html',
				'param_name'  => 'content',
				'heading'     => esc_html__( 'Features', 'volley-core' ),
				'description' => esc_html__( 'Input values here. Divide values by pressing Enter. Example: <strong>10GB</strong> Disk Space,<strong>100GB</strong> Monthly Bandwidth;', 'volley-core'),
				'value'       => '<ul><li>Free One Year Domain</li><li>10+ Pages Design</li><li>Full Organized Layered</li><li>Unlimited Revision</li><li>50% Discount Off</li><li>Free Logo Design</li><li>Free Stationary Design</li></ul>',
			),
			array(
				'type'       => 'dropdown',
				'param_name' => 'show_button',
				'heading'    => esc_html__( 'Show Button', 'volley-core' ),
				'dependency' => array(
					'element' => 'style',
					'value'   => array( 'default', 's3', 's4' ),
				),
				'value'      => array(
					esc_html__( 'No', 'volley-core' )  => '',
					esc_html__( 'Yes', 'volley-core' ) => 'yes',
				),
			)

		) );

		$button = vc_map_integrate_shortcode( 'ld_button', 'pt_', esc_html__( 'Button', 'volley-core' ),
			array(
				'exclude' => array(
					'color',
					'el_id',
					'el_class'
				)
			),
			array(
				'element' => 'show_button',
				'value' => 'yes',
			)
		);

		$design = array(
			array(
				'type'		 => 'themethreads_colorpicker',
				'only_solid' => true,
				'param_name' => 'primary_color',
				'heading'    => esc_html__( 'Primary Color', 'volley-core' )
			),
			array(
				'type'		 => 'themethreads_colorpicker',
				'only_solid' => true,
				'param_name' => 'txt_color',
				'heading'    => esc_html__( 'Text Color', 'volley-core' ),
				'edit_field_class' => 'vc_col-sm-6',
				'dependency'  => array(
					'element' => 'style',
					'value' => array( 's4' ),
				),
			),
			array(
				'type'		 => 'themethreads_colorpicker',
				'param_name' => 'mbg_color',
				'heading'    => esc_html__( 'Background', 'volley-core' ),
				'edit_field_class' => 'vc_col-sm-6',
				'dependency'  => array(
					'element' => 'style',
					'value' => array( 's4' ),
				),
			),
			array(
				'type'		 => 'themethreads_colorpicker',
				'param_name' => 'accent_color',
				'heading'    => esc_html__( 'Accent Color', 'volley-core' ),
				'edit_field_class' => 'vc_col-sm-6',
				'dependency'  => array(
					'element' => 'style',
					'value' => array( 's4' ),
				),
			),
			array(
				'type'        => 'themethreads_attach_image',
				'param_name'  => 'pt_bg_image',
				'heading'     => esc_html__( 'Image', 'volley-core' ),
				'edit_field_class' => 'vc_col-sm-6',
				'dependency'  => array(
					'element' => 'style',
					'value' => array( 's3' ),
				),
			),
			array(
				'type'        => 'themethreads_colorpicker',
				'param_name'  => 'bg_color',
				'heading'     => esc_html__( 'Background Color', 'volley-core' ),
				'description' => esc_html__( 'Pick a color for overlay', 'volley-core' ),
				'dependency'  => array(
					'element' => 'style',
					'value' => array( 's3' ),
				),
				'edit_field_class' => 'vc_col-sm-6',
			),
			
		);
		foreach( $design as &$param ) {
			$param['group'] = esc_html__( 'Design Options', 'volley-core' );
		}

		$this->params = array_merge( $content, $design, $button );

		$this->add_extras();
	}
	
	protected function get_title() {

		// check
		if( empty( $this->atts['title'] ) ) {
			return '';
		}

		$style = $this->atts['style'];
		
		$small = '';
		
		if( 'default' === $style ) {
			if( !empty( $this->atts['subtitle'] ) ) {
				$small = '<small>' . esc_html( $this->atts['subtitle'] ) . '</small>';
			}
		}
		elseif( 's2' === $style ) {
			if( !empty( $this->atts['price'] ) ) {
				$small = '<small>' . esc_html( $this->atts['price'] ) . '</small>';
			}			
		}


		$style = $this->atts['style'];
		$title = wp_kses_post( $this->atts['title'] );

		// Default
		$title = sprintf( '<h5>%s %s</h5>', $title, $small );

		echo $title;

	}
	
	protected function get_featured() {

		if( !$this->atts['featured'] ) {
			return;
		}

		return 'featured';
	}
	
	protected function get_featured_tag() {
		
		if( !$this->atts['featured_tag'] ) {
			return;
		}
		$featured_label = '';
		if( !empty( $this->atts['featured_label'] ) ) {
			$featured_label = '<span>'. esc_html( $this->atts['featured_label'] ) .'</span>';
		}		
		
		printf( '<p class="featured-tag"><i class="fa fa-check-circle-o"></i>%s</p>', $featured_label );
		
	}

	protected function get_price() {

		// check
		if( empty( $this->atts['price'] ) || 's2' === $this->atts['style'] ) {
			return '';
		}

		$out = '';

		$price = wp_kses_post( do_shortcode( $this->atts['price'] ) );

		$out .= sprintf( '<p class="pricing">%s</p>', $price );

		echo $out;
	}
	
	protected function get_features() {

		// check
		if( empty( $this->atts['content'] ) ) {
			return '';
		}

		$content = ld_helper()->do_the_content( $this->atts['content'] );

		echo wp_kses_post( $content );
	}

	protected function get_button() {

		if ( empty( $this->atts['show_button'] ) ) {
			return;
		}

		$data = vc_map_integrate_parse_atts( $this->slug, 'ld_button', $this->atts, 'pt_' );

		if ( $data ) {

			$btn = visual_composer()->getShortCode( 'ld_button' )->shortcodeClass();
			$data['color'] = $this->atts['primary_color'];
			
			if ( is_object( $btn ) ) {
				echo $btn->render( array_filter( $data ) );
			}
		}
	}

	protected function get_class( $style ) {

		$hash = array(
			'default'  => 'pricing-table-default',
			's2'       => 'pricing-table-colorful',
			's3'       => 'pricing-table-modern',
			's4'       => 'pricing-table-minimal',
		);

		return $hash[ $style ];
	}

	protected function generate_css() {

		// check
		if( empty( $this->atts['primary_color'] ) ) {
			return '';
		}

		$elements = array();
		extract( $this->atts );
		$id = '.' . $this->get_id();
		
		if( 'default' === $style ) {
			$elements[ themethreads_implode( '%1$s.pricing-table-default h5 small, %1$s.pricing-table-default .pricing' ) ]['color'] = $primary_color;
		}
		elseif( 's2' === $style ) {
			$elements[ themethreads_implode( '%1$s.pricing-table-colorful .pricing-table-header:before' ) ]['background'] = $primary_color;
			$elements[ themethreads_implode( '%1$s.pricing-table-colorful h5 small, %1$s.pricing-table-colorful .featured-tag' ) ]['color'] = $primary_color;
		}
		elseif( 's3' === $style ) {
			if( !empty( $pt_bg_image ) ) {
				if( preg_match( '/^\d+$/', $pt_bg_image ) ){
					$src = themethreads_get_image_src( $pt_bg_image );
					$elements[ themethreads_implode( '%1$s.pricing-table-modern' ) ]['background-image'] = 'url(' . esc_url( $src[0] ) . ')';
				} else {
					$src = $pt_bg_image;
					$elements[ themethreads_implode( '%1$s' ) ]['background-image'] = 'url(' . esc_url( $src ) . ')';
				}
			}
			if( !empty( $bg_color ) ) {
				$elements[ themethreads_implode( '%1$s.featured:before' ) ]['background'] = $bg_color;	
			}
			if( !empty( $primary_color ) ) { 
				$elements[ themethreads_implode( '%1$s .pricing' ) ]['color'] = $primary_color;
			}
			
		}
		elseif( 's4' === $style ) {
			$elements[ themethreads_implode( '%1$s' ) ]['color'] = $txt_color;
			$elements[ themethreads_implode( '%1$s' ) ]['background'] = $mbg_color;
			$elements[ themethreads_implode( '%1$s .pricing-table-header h5' ) ]['background'] = $mbg_color;
		}

		$this->dynamic_css_parser( $id, $elements );
	}
}
new LD_Price_Table;