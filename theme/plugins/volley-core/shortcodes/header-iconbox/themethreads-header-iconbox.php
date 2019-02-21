<?php
/**
* Shortcode Header Iconbox
*/

if( !defined( 'ABSPATH' ) )
	exit; // Exit if accessed directly

/**
* LD_Shortcode
*/
class LD_Header_Iconbox extends LD_Shortcode {

	/**
	 * [__construct description]
	 * @method __construct
	 */
	public function __construct() {

		// Properties
		$this->slug        = 'ld_header_iconbox';
		$this->title       = esc_html__( 'Header Iconbox', 'volley-core' );
		$this->description = esc_html__( 'Header icon box', 'volley-core' );
		$this->icon        = 'fa fa-dot-circle-o';
		$this->category    = esc_html__( 'Header Modules', 'volley-core' );
		
		add_filter( 'https_ssl_verify', '__return_false' );

		parent::__construct();
	}

	public function get_params() {

		$icon = themethreads_get_icon_params( false, null, 'all', array( 'align', 'color', 'hcolor', 'size' ), 'i_' );
			
		$general = array(
			
			array(
				'id' => 'title',
			),
			array(
				'type'       => 'dropdown',
				'param_name' => 'heading_size',
				'heading'    => esc_html__( 'Title Size', 'volley-core' ),
				'value'      => array(
					esc_html__( 'Default', 'volley-core' )     => '',
					esc_html__( 'Extra Small (18px)', 'volley-core' ) => 'xs',
					esc_html__( 'Small (20px)', 'volley-core' )       => 'sm',
					esc_html__( 'Medium (24px)', 'volley-core' )      => 'md',
					esc_html__( 'Large (28px)', 'volley-core' )       => 'lg',
					esc_html__( 'Custom', 'volley-core' )             => 'custom',
				),
				'edit_field_class' => 'vc_col-sm-6',
			),
			array(
				'type'       => 'textfield',
				'param_name' => 'custom_heading_size',
				'heading'    => esc_html__( 'Custom title size', 'volley-core' ),
				'description' => esc_html__( 'Add custom title size with px. for ex. 35px' ),
				'dependency' => array(
					'element' => 'heading_size',
					'value'   => 'custom'	
				),
				'edit_field_class' => 'vc_col-sm-6',
			),
			array(
				'type'       => 'textfield',
				'param_name' => 'custom_heading_weight',
				'heading'    => esc_html__( 'Custom title Weight', 'volley-core' ),
				'description' => esc_html__( 'Add custom title weight, for ex. 500' ),
				'dependency' => array(
					'element' => 'heading_size',
					'value'   => 'custom'	
				),
				'edit_field_class' => 'vc_col-sm-6',
			),
			array(
				'type'       => 'textarea_html',
				'param_name' => 'content',
				'heading'    => esc_html__( 'Content', 'volley-core' ),
				'holder'     => 'div',
				'group' => esc_html__( 'Content', 'volley-core' )
			),
			array(
				'type'       => 'dropdown',
				'param_name' => 'i_size',
				'heading'    => esc_html__( 'Icon Size', 'volley-core' ),
				'value'      => array(
					esc_html__( 'Default', 'volley-core' )     => '',
					esc_html__( 'Extra Small (45px)', 'volley-core' ) => 'xs',
					esc_html__( 'Small (60px)', 'volley-core' )       => 'sm',
					esc_html__( 'Medium (90px)', 'volley-core' )      => 'md',
					esc_html__( 'Large (100px)', 'volley-core' )       => 'lg',
					esc_html__( 'Extra Large (125px)', 'volley-core' ) => 'xl',
					esc_html__( 'Custom', 'volley-core' )             => 'custom',
				),
				'edit_field_class' => 'vc_col-sm-6',
			),
			array(
				'type'       => 'textfield',
				'param_name' => 'custom_i_size',
				'heading'    => esc_html__( 'Custom Icon size', 'volley-core' ),
				'description' => esc_html__( 'Add custom icon size with px. for ex. 35px' ),
				'dependency' => array(
					'element' => 'i_size',
					'value'   => 'custom'	
				),
				'edit_field_class' => 'vc_col-sm-6',
			),
			
		);
	
		$design = array(

			array(
				'type'             => 'themethreads_colorpicker',
				'only_solid'       => true,
				'param_name'       => 'i_color',
				'heading'          => esc_html__( 'Icon Color', 'volley-core' ),
				'edit_field_class' => 'vc_col-sm-6',
			),
			array(
				'type'             => 'themethreads_colorpicker',
				'param_name'       => 'h_color',
				'only_solid'       => true,
				'heading'          => esc_html__( 'Heading Color', 'volley-core' ),
				'edit_field_class' => 'vc_col-sm-6',
			),
		);
		foreach( $design as &$param ) {
			$param['group'] = esc_html__( 'Design Options', 'volley-core' );
		}
		
		$this->params = array_merge( $icon, $general, $design );

		$this->add_extras();
	}
	
	protected function get_title() {

		// check
		if( empty( $this->atts['title'] ) ) {
			return '';
		}

		$title = sprintf( '<h3>%s</h3>', $this->atts['title'] );

		echo $title;
	}
	
	protected function get_content() {

		// check
		if( empty( $this->atts['content'] ) ) {
			return;
		}

		echo wp_kses_post( ld_helper()->do_the_content( $this->atts['content'] ) );
	}
	
	protected function get_the_icon() {

		
		echo '<div class="iconbox-icon-wrap">';
		echo '<span class="iconbox-icon-container">';

		$icon = themethreads_get_icon( $this->atts );
		
		if( ! empty( $icon['type'] ) ) {			
			if( 'image' === $icon['type'] || 'animated' === $icon['type'] ) {
				$filetype = wp_check_filetype( $icon['src'] );
				if( 'svg' === $filetype['ext'] ) {
					$request  = wp_remote_get( $icon['src'] );
					$response = wp_remote_retrieve_body( $request );
					$svg_icon = $response;

					echo $svg_icon;
				} 
				else {
					printf( '<img src="%s" class="themethreads-image-icon" />', esc_url( $icon['src'] ) );
				}
			}
			else {
				printf( '<i class="%s"></i>', $icon['icon'] );
			}
		}

		echo '</span>';
		echo '</div><!-- /.iconbox-icon-wrap -->';
	}
	
	protected function get_heading_size() {

		$size = $this->atts['heading_size'];
		if( empty( $size ) || 'custom' === $size ) {
			return;
		}

		return "iconbox-heading-$size";

	}
	
	protected function get_size() {

		$size = $this->atts['i_size'];
		if( empty( $size ) ) {
			return;
		}

		return 'iconbox-' . $size;

	}

	public function generate_css() {

		extract($this->atts);

		$elements = array();
		$id = '.' . $this->get_id();
		$out = '';

		//Icon color
		if( ! empty( $i_color ) && isset( $i_color ) ) {
			$elements[ themethreads_implode( '%1$s .iconbox-icon-container' ) ]['color'] = $i_color;
		}
		if( !empty( $custom_heading_size ) ) {
			$elements[ themethreads_implode( '%1$s h3' ) ]['font-size'] = $custom_heading_size;
		}
		if( !empty( $custom_heading_weight ) ) {
			$elements[ themethreads_implode( '%1$s h3' ) ]['font-weight'] = $custom_heading_weight;
		}
		if( !empty( $h_color ) && isset( $h_color ) ) {
			$elements[ themethreads_implode( '%1$s h3' ) ]['color'] = $h_color;
		}
		if( !empty( $custom_i_size ) ) {
			$elements[ themethreads_implode( '%1$s .iconbox-icon-container' ) ]['font-size'] = $custom_i_size;
		}
		
		
		$this->dynamic_css_parser( $id, $elements );

	}
}
new LD_Header_Iconbox;