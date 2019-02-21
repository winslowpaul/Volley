<?php
/**
* Header Trigger Buttons
*/

if( !defined( 'ABSPATH' ) ) 
	exit; // Exit if accessed directly

/**
* LD_Shortcode
*/

class LD_Header_Trigger extends LD_Shortcode {
	
	/**
	 * [__construct description]
	 * @method __construct
	 */
	public function __construct() {

		// Properties
		$this->slug        = 'ld_header_trigger';
		$this->title       = esc_html__( 'Trigger Button', 'volley-core' );
		$this->icon        = 'fa fa-bars';
		$this->description = esc_html__( 'Create a custom trigger button.', 'volley-core' );
		$this->category    = esc_html__( 'Header Modules', 'volley-core' );

		parent::__construct();
	}
	
	public function get_params() {

		$this->params = array(
			
			array(
				'type'        => 'textfield',
				'param_name'  => 'text',
				'heading'     => esc_html__( 'Text', 'volley-core' ),
				'description' => esc_html__( 'Add text near the trigger', 'volley-core' ),
				'admin_label' => true,
				'edit_field_class' => 'vc_col-sm-6'
			),
			array(
				'type'        => 'themethreads_button_set',
				'param_name'  => 'position',
				'heading'     => esc_html__( 'Text Position' ),
				'description' => esc_html__( 'Select a the text position', 'volley-core' ),
				'value' => array(
					esc_html__( 'Left', 'volley-core' ) => 'txt-left',
					esc_html__( 'Right', 'volley-core' ) => 'txt-right',
				),
				'dependency'  => array(
					'element' => 'text',
					'not_empty' => true,
				),
				'std' => 'txt-right',
				'edit_field_class' => 'vc_col-sm-6'
			),
			array(
				'type'        => 'textfield',
				'param_name'  => 'target_id',
				'heading'     => esc_html__( 'ID of the target', 'volley-core' ),
				'description' => esc_html__( 'Add id of the target for trigger button, for ex. target_id', 'volley-core' ),
			),
			array(
				'type'        => 'dropdown',
				'param_name'  => 'fill',
				'heading'     => esc_html__( 'Fill Style', 'volley-core' ),
				'description' => esc_html__( 'Select a fill style', 'volley-core' ),
				'value'       => array(
					esc_html__( 'Default', 'volley-core' ) => '',
					esc_html__( 'None', 'volley-core' )    => 'fill-none',
					esc_html__( 'Solid', 'volley-core' )   => 'fill-solid',
				),
				'edit_field_class' => 'vc_col-sm-4'
			),
			array(
				'type'        => 'dropdown',
				'param_name'  => 'scheme',
				'heading'     => esc_html__( 'Color Scheme', 'volley-core' ),
				'description' => esc_html__( 'Select a color scheme', 'volley-core' ),
				'value'       => array(
					esc_html__( 'Default', 'volley-core' ) => '',
					esc_html__( 'Light', 'volley-core' )   => 'scheme-light',
				),
				'edit_field_class' => 'vc_col-sm-4'
			),
			array(
				'type'        => 'dropdown',
				'param_name'  => 'orientation',
				'heading'     => esc_html__( 'Orientation', 'volley-core' ),
				'description' => esc_html__( 'Select an orientation', 'volley-core' ),
				'value'       => array(
					esc_html__( 'Default', 'volley-core' )  => '',
					esc_html__( 'Vertical', 'volley-core' ) => 'rotate-90',
				),
				'edit_field_class' => 'vc_col-sm-4'
			),

			array(
				'type'        => 'css_editor',
				'param_name'  => 'css',
				'description' => '',
				'heading'     => esc_html__( 'CSS Box', 'volley-core' ),
				'group'       => esc_html__( 'Design Options', 'volley-core' ),
			),

		);

		$this->add_extras();
	}
	
	protected function get_text() {
		
		$text = $this->atts['text'];
		
		if( empty( $text ) ) {
			return;
		}

		printf( '<span class="txt">%s</span>', esc_html( $text ) );

	}
	
	protected function get_position() {
		
		$position = $this->atts['position'];
		$text     = $this->atts['text'];
		
		if( empty( $text ) || empty( $position ) ) {
			return;
		}

		return $position;

	}

}
new LD_Header_Trigger;