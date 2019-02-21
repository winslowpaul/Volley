<?php
/**
* Shortcode Team Member
*/

if( !defined( 'ABSPATH' ) ) 
	exit; // Exit if accessed directly

/**
* LD_Shortcode
*/
class LD_Team_Member extends LD_Shortcode {

	/**
	 * [__construct description]
	 * @method __construct
	 */
	public function __construct() {

		// Properties
		$this->slug        = 'ld_team_member';
		$this->title       = esc_html__( 'Team Member', 'volley-core' );
		$this->description = esc_html__( 'Add Team member', 'volley-core' );
		$this->icon        = 'fa fa-user-circle';

		parent::__construct();
	}
	
	public function get_params() {
		
		$url = themethreads_addons()->plugin_uri() . '/assets/img/sc-preview/team-member/';

		$general = array(
			
			array(
				'type'        => 'select_preview',
				'param_name'  => 'template',
				'heading'     => esc_html__( 'Style', 'volley-core' ),
				'value'       => array(
					
					array(
						'label' => esc_html__( 'Classic', 'volley-core' ),
						'value' => 'classic',
						'image' => $url . 'classic.jpg'
					),
					array(
						'value' => '',	
						'label' => esc_html__( 'Overlay', 'volley-core' ),
						'value' => 'overlay',
						'image' => $url . 'overlay.jpg'
					),

				),
				'save_always' => true,
			),
			array(
				'type'        => 'themethreads_attach_image',
				'param_name'  => 'image',
				'heading'     => esc_html__( 'Team Member Image', 'volley-core' ),
				'edit_field_class' => 'vc_col-sm-6'
			),
			array(
				'type'        => 'textfield',
				'param_name'  => 'name',
				'heading'     => esc_html__( 'Team Member Name', 'volley-core' ),
				'admin_label' => true
			),
			array(
				'type'        => 'textfield',
				'param_name'  => 'position',
				'heading'     => esc_html__( 'Team Member Position', 'volley-core' ),
				'admin_label' => true,
			),
			array(
				'type'       => 'textarea_html',
				'param_name' => 'content',
				'heading'    => esc_html__( 'Text', 'volley-core' ),
				'holder'     => 'div',
				'dependency' => array(
					'element' => 'template',
					'value' => array( 'classic' )
				)
			),
			
		);

		$socials = array(

			array(
				'type'       => 'param_group',
				'param_name' => 'socials',
				'heading'    => esc_html__( 'Social link', 'volley-core' ),
				'params'     => array(

					array(
						'id' => 'network',
						'edit_field_class' => 'vc_column-with-padding vc_col-sm-6'
					),

					array(
						'type'        => 'textfield',
						'param_name'  => 'url',
						'heading'     => esc_html__( 'URL (Link)', 'volley-core' ),
						'description' => esc_html__(  'Add social link', 'volley-core' ),
						'edit_field_class' => 'vc_col-sm-6'
					)
				)
			)
		);

		foreach( $socials as &$param ) {
			$param['group'] = esc_html__( 'Social Identites', 'volley-core' );
		}

		$design = array(

			array(
				'type'        => 'themethreads_colorpicker',
				'param_name'  => 'primary_color',
				'heading'     => esc_html__( 'Primary Color', 'volley-core' ),
				'edit_field_class' => 'vc_col-sm-6'
			),
			array(
				'type'       => 'dropdown',
				'param_name' => 'color_type',
				'heading'    => esc_html__( 'Text Color', 'volley-core' ),
				'value'      => array(
					esc_html__( 'Default', 'volley-core' )   => '',
					esc_html__( 'Light', 'volley-core' )     => 'text-light',
					esc_html__( 'Dark', 'volley-core' )      => 'text-dark',
				),
				'edit_field_class' => 'vc_col-sm-6',
				'dependency' => array(
					'element' => 'template',
					'value' => array( 'overlay' )
				)
			),
			
		);

		foreach( $design as &$param ) {
			$param['group'] = esc_html__( 'Design Options', 'volley-core' );
		}

		$this->params = array_merge( $general, $socials, $design );

		$this->add_extras();
	}
	
	protected function get_name() {

		// check
		if( empty( $this->atts['name'] ) ) {
			return;
		}
		$classnames = '';
		
		$style = $this->atts['template'];
		if( 'classic' === $style ) {
			$classnames = ' size-sm font-weight-semibold mb-3';			
		}

		$name = esc_html( $this->atts['name'] );

		printf( '<h3 class="ld-tm-name%s">%s</h3>', $classnames, $name );

	}

	protected function get_position() {

		// check
		if( empty( $this->atts['position'] ) ) {
			return;
		}
		
		$classnames = '';

		$style = $this->atts['template'];
		if ( 'classic' === $style ) {
			$classnames = ' ltr-sp-175 font-weight-bold mb-3 color-primary';
		}

		$position = esc_html( $this->atts['position'] );
		printf( '<h6 class="ld-tm-pos text-uppercase%s">%s</h6>', $classnames, $position );
		
	}

	protected function get_image() {

		// check
		if( empty( $this->atts['image'] ) ) {
			return;
		}
		
		$classnames = '';
		
		$style = $this->atts['template'];
		$alt = esc_attr( $this->atts['name'] );
		
		if( 'classic' === $style ) { 
			$classnames = 'circle';
		}

		if( preg_match( '/^\d+$/', $this->atts['image'] ) ){
			$image = themethreads_get_image_src( $this->atts['image'] );
			$html  = wp_get_attachment_image( $this->atts['image'], 'full', false, array( 'alt' => esc_attr( $alt ), 'class' => $classnames ) );
			$src  = $image[0];
		} else {
			$src  = esc_url( $this->atts['image'] );
			$html = '<img src="' . $src . '" alt="' . esc_attr( $alt ) . '" />';
		}
		
		if( 'classic' === $style ) {
			printf( '<div class="ld-tm-img mb-3 text-center"><figure>%1$s</figure></div>', $html );	
		}
		else {
			printf( '<div class="ld-tm-img"><figure>%1$s</figure></div>', $html );	
		}
		
	}
	
	protected function get_content() {

		// check
		if( empty( $this->atts['content'] ) ) {
			return '';
		}

		$content = ld_helper()->do_the_content( $this->atts['content'] );

		echo $content;
	}

	protected function get_social() {

		$socials  = (array) vc_param_group_parse_atts( $this->atts['socials'] );

		// check
		if( empty( $socials ) ) {
			return;
		}

		$style = $this->atts['template'];
		$out = '';

		foreach ( $socials as $social ) {
			if ( empty( $social['url'] ) ) {
				continue;
			}

			$net = themethreads_get_network_class( $social['network'] );
			$attr = array( 'href' => esc_url( $social['url'] ) );
		
			$out .= sprintf( '<li><a%s><i class="%s"></i></a></li>',
				ld_helper()->html_attributes( $attr ), $net['icon']
			);

		}
		
		if( 'classic' === $style ) {
			printf( '<ul class="ld-tm-social social-icon branded-text mt-3">%s</ul>', $out );
		}
		else {
			printf( '<ul class="ld-tm-social social-icon mt-5">%s</ul>', $out );
		}

	}
	
	protected function get_details( $param = null ) {
		
		if( empty( $param ) ) {
			return;
		}

		if( 'email' === $param ) {
			$icon = 'fa-envelope-o';
		}
		else {
			$icon = 'fa-phone';
		}
		
		$value = $this->atts[ $param ];

		if( empty( $value ) ) {
			return;
		}

		echo '<div class="iconbox iconbox-inline iconbox-xs iconbox-heading-xs">
				<span class="iconbox-icon-container">
					<i class="fa ' . $icon . '"></i>
				</span>
				<h3>' . esc_html( $value ) . '</h3>
			</div><!-- /.iconbox -->';

	}
	
	
	protected function generate_css() {

		extract( $this->atts );

		$elements = array();
		$id = '.' .$this->get_id();
		
		if( !empty( $primary_color ) ) {

			$elements[ themethreads_implode( '%1$s .ld-tm-info.ld-overlay' ) ]['background'] = $primary_color;
			$elements[ themethreads_implode( '%1$s .ld-tm-pos.color-primary' ) ]['color'] = $primary_color;

		}

		$this->dynamic_css_parser( $id, $elements );
	}

}
new LD_Team_Member;