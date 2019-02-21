<?php
/**
* Shortcode Pointer
*/

if( !defined( 'ABSPATH' ) )
	exit; // Exit if accessed directly

/**
* LD_Shortcode
*/
class LD_Pointer_Tooltip extends LD_Shortcode {

	/**
	 * [__construct description]
	 * @method __construct
	 */
	public function __construct() {

		// Properties
		$this->slug        = 'ld_pointer_tooltip';
		$this->title       = esc_html__( 'Pointer - Tooltip', 'volley-core' );
		$this->description = esc_html__( 'Add pointer with Tooltip', 'volley-core' );
		$this->icon        = 'fa fa-mouse-pointer';
		$this->content_element = true;
		$this->as_child    = array( 'only' => 'ld_tooltiped_image' );
		$this->styles      = array( 'themethreads-sc-img-map' );

		parent::__construct();
	}

	public function get_params() {

		$this->params = array(

			array(
				'id' => 'title',
				'admin_label' => true,
				'edit_field_class' => 'vc_col-sm-6'
			),
			
			array(
				'type'       => 'vc_link',
				'heading'    => esc_html__( 'URL', 'volley-core' ),
				'param_name' => 'link',
				'edit_field_class' => 'vc_col-sm-6'
			),
			
			array(
				'type'        => 'textarea_html',
				'param_name'  => 'content',
				'heading' => esc_html__( 'Tooltip Content', 'volley-core' ),
				'description' => esc_html__( 'Add tooltip content to display', 'volley-core' ),
				'holder'      => 'div',
			),

			array(
				'type'        => 'dropdown',
				'param_name'  => 'position',
				'heading'     => esc_html__( 'Tooltip Alignment', 'volley-core' ),
				'description' => esc_html__( 'Tooltip alignment relative to the image', 'volley-core' ),
				'value'       => array(
					esc_html__( 'Top', 'volley-core' )   => '',
					esc_html__( 'Right', 'volley-core' ) => 'align-right',
					esc_html__( 'Left', 'volley-core' )   => 'align-left',
					esc_html__( 'Bottom', 'volley-core' ) => 'align-bottom',
				)
			),

			array(
				'type'         => 'textfield',
				'param_name'  => 'top',
				'heading'     => esc_html__( 'Top', 'volley-core' ),
				'description' => esc_html__( 'Add top position for pointer, use px or %', 'volley-core' ),
				'edit_field_class' => 'vc_col-sm-3'
			),

			array(
				'type'        => 'textfield',
				'param_name'  => 'bottom',
				'heading'     => esc_html__( 'Bottom', 'volley-core' ),
				'description' => esc_html__( 'Add bottom position for pointer, use px or %', 'volley-core' ),
				'edit_field_class' => 'vc_col-sm-3'
			),

			array(
				'type'        => 'textfield',
				'param_name'  => 'left',
				'heading'     => esc_html__( 'Left', 'volley-core' ),
				'description' => esc_html__( 'Add left position for pointer, use px or %', 'volley-core' ),
				'edit_field_class' => 'vc_col-sm-3'
			),

			array(
				'type'        => 'textfield',
				'param_name'  => 'right',
				'heading'     => esc_html__( 'Right', 'volley-core' ),
				'description' => esc_html__( 'Add right position for pointer, use px or %', 'volley-core' ),
				'edit_field_class' => 'vc_col-sm-3'
			),

			array(
				'type'       => 'css_editor',
				'heading'    => esc_html__( 'CSS box', 'volley-core' ),
				'param_name' => 'css',
				'group'      => esc_html__( 'Design Options', 'volley-core' ),
			),

		);

		$this->add_extras();
	}

	protected function get_title() {

		extract( $this->atts );

		// check
		if( empty( $title ) ) {
			return '';
		}

		$link = themethreads_get_link_attributes( $link, false );

		if( ! empty ( $link['href'] ) ) {
			$title = sprintf( '<h3><a%2$s>%1$s</a></h3>', $title, ld_helper()->html_attributes( $link ) );
		} else {
			$title = sprintf( '<h3>%s</h3>', $title );
		}

		echo $title;
	}


	protected function get_content() {

		// check
		if( empty( $this->atts['content'] ) ) {
			return;
		}

		echo wp_kses_post( ld_helper()->do_the_content( $this->atts['content'] ) );
	}


	protected function generate_css() {

		extract( $this->atts );

		$elements = array();
		$id = '.' .$this->get_id();
		
		if( empty( $top ) ){
			$top = 'auto';
		}
		if( empty( $right ) ){
			$right = 'auto';
		}
		if( empty( $bottom ) ){
			$bottom = 'auto';
		}
		if( empty( $left ) ){
			$left = 'auto';
		}

		$elements[ themethreads_implode( '%1$s' ) ] = array(
			'top'    => $top .' !important',
			'right'  => $right .' !important',
			'bottom' => $bottom .' !important',
			'left'   => $left .' !important'
		);

		$this->dynamic_css_parser( $id, $elements );

	}

}
new LD_Pointer_Tooltip;