<?php
/**
* Shortcode Images Group Container
*/

if( !defined( 'ABSPATH' ) )
	exit; // Exit if accessed directly
	
/**
* LD_Shortcode
*/
class LD_Images_Group_Container extends LD_Shortcode {

	/**
	 * Construct
	 * @method __construct
	 */
	public function __construct() {

		// Properties
		$this->slug            = 'ld_images_group_container';
		$this->title           = esc_html__( 'ThemeThreads Fancy Images', 'volley-core' );
		$this->description     = esc_html__( 'ThemeThreads Fancy Images container', 'volley-core' );
		$this->icon            = 'fa fa-image';
		$this->content_element = true;
		$this->is_container    = true;
		$this->as_parent       = array( 'only' => 'ld_images_group_element' );

		parent::__construct();
	}

	public function get_params() {
		
		$this->params = array(
			
			array(
				'type'        => 'checkbox',
				'param_name'  => 'parallax',
				'heading'     => esc_html__( 'Parallax', 'volley-core' ),
				'description' => esc_html__( 'Add parallax effect to the element', 'volley-core' ),
				'value'       => array( esc_html__( 'Yes', 'volley-core' )  => 'yes' ),
			),
			array(
				'type'             => 'checkbox',
				'param_name'       => 'enable_item_animation',
				'value'            => array( esc_html__( 'Yes', 'volley-core' ) => 'yes' ),
				'heading'          => esc_html__( 'Animate Fancy Images?', 'volley-core' ),
				'description'      => esc_html__( 'Will enable animation for items, it will be animated when it "enters" the browsers viewport (Note: works only in modern browsers).', 'volley-core' ),
			),
	
			//Custom Animation Options
			array(
				'type'        => 'textfield',
				'param_name'  => 'pf_duration',
				'heading'     => esc_html__( 'Duration', 'volley-core' ),
				'description' => esc_html__( 'Add duration of the animation in milliseconds', 'volley-core' ),
				'edit_field_class' => 'vc_col-sm-6 vc_column-with-padding',
				'group' => esc_html__( 'Item Animation', 'volley-core' ),
				'dependency' => array(
					'element' => 'enable_item_animation',
					'value'   => 'yes',
				)
			),
			array(
				'type' => 'textfield',
				'param_name' => 'pf_start_delay',
				'heading' => esc_html__( 'Start Delay', 'volley-core' ),
				'description' => esc_html__( 'Add start delay of the animation in milliseconds', 'volley-core' ),
				'edit_field_class' => 'vc_col-sm-6',
				'group' => esc_html__( 'Item Animation', 'volley-core' ),
				'dependency' => array(
					'element' => 'enable_item_animation',
					'value'   => 'yes',
				)
			),
			array(
				'type' => 'textfield',
				'param_name' => 'pf_delay',
				'heading' => esc_html__( 'Delay', 'volley-core' ),
				'description' => esc_html__( 'Add delay of the animation between of the animated elements in milliseconds', 'volley-core' ),
				'edit_field_class' => 'vc_col-sm-6',
				'group' => esc_html__( 'Item Animation', 'volley-core' ),
				'dependency' => array(
					'element' => 'enable_item_animation',
					'value'   => 'yes',
				)
			),
			array(
				'type' => 'dropdown',
				'param_name' => 'pf_easing',
				'heading' => esc_html__( 'Easing', 'volley-core' ),
				'description' => esc_html__( 'Select an easing type', 'volley-core' ),
				'value' => array(
					'linear',
					'easeInQuad',
					'easeInCubic',
					'easeInQuart',
					'easeInQuint',
					'easeInSine',
					'easeInExpo',
					'easeInCirc',
					'easeInBack',
					'easeOutQuad',
					'easeOutCubic',
					'easeOutQuart',
					'easeOutQuint',
					'easeOutSine',
					'easeOutExpo',
					'easeOutCirc',
					'easeOutBack',
					'easeInOutQuad',
					'easeInOutCubic',
					'easeInOutQuart',
					'easeInOutQuint',
					'easeInOutSine',
					'easeInOutExpo',
					'easeInOutCirc',
					'easeInOutBack',
				),
				'std' => 'easeOutQuint',
				'edit_field_class' => 'vc_col-sm-6',
				'group' => esc_html__( 'Item Animation', 'volley-core' ),
				'dependency' => array(
					'element' => 'enable_item_animation',
					'value'   => 'yes',
				)
			),
			array(
				'type'        => 'dropdown',
				'param_name'  => 'pf_direction',
				'heading'     => esc_html__( 'Direction', 'volley-core' ),
				'description' => esc_html__( 'Select animations direction', 'volley-core' ),
				'value' => array(
					esc_html__( 'Forward', 'volley-core' )  => 'forward',
					esc_html__( 'Backward', 'volley-core' )  => 'backward',
				),
				'group' => esc_html__( 'Item Animation', 'volley-core' ),
				'dependency' => array(
					'element' => 'enable_item_animation',
					'value'   => 'yes',
				),
				'edit_field_class' => 'vc_col-sm-6',
			),
			array(
				'type'        => 'subheading',
				'param_name'  => 'pf_init_values',
				'heading'     => esc_html__( 'Animate From', 'volley-core' ),
				'group' => esc_html__( 'Item Animation', 'volley-core' ),
				'dependency' => array(
					'element' => 'enable_item_animation',
					'value'   => 'yes',
				)
			),
			array(
				'type'        => 'themethreads_slider',
				'param_name'  => 'pf_init_translate_x',
				'heading'     => esc_html__( 'Translate X', 'volley-core' ),
				'description' => esc_html__( 'Select translate on X axe', 'volley-core' ),
				'min'         => -500,
				'max'         => 500,
				'step'        => 1,
				'group' => esc_html__( 'Item Animation', 'volley-core' ),
				'dependency' => array(
					'element' => 'enable_item_animation',
					'value'   => 'yes',
				)
			),
			array(
				'type'        => 'themethreads_slider',
				'param_name'  => 'pf_init_translate_y',
				'heading'     => esc_html__( 'Translate Y', 'volley-core' ),
				'description' => esc_html__( 'Select translate on Y axe', 'volley-core' ),
				'min'         => -500,
				'max'         => 500,
				'step'        => 1,
				'group' => esc_html__( 'Item Animation', 'volley-core' ),
				'dependency' => array(
					'element' => 'enable_item_animation',
					'value'   => 'yes',
				)		
			),
			array(
				'type'        => 'themethreads_slider',
				'param_name'  => 'pf_init_translate_z',
				'heading'     => esc_html__( 'Translate Z', 'volley-core' ),
				'description' => esc_html__( 'Select translate on Z axe', 'volley-core' ),
				'min'         => -500,
				'max'         => 500,
				'step'        => 1,
				'group' => esc_html__( 'Item Animation', 'volley-core' ),
				'dependency' => array(
					'element' => 'enable_item_animation',
					'value'   => 'yes',
				)
			),
			array(
				'type'        => 'themethreads_slider',
				'param_name'  => 'pf_init_scale_x',
				'heading'     => esc_html__( 'Scale X', 'volley-core' ),
				'description' => esc_html__( 'Select Scale X', 'volley-core' ),
				'min'         => 0,
				'max'         => 10,
				'step'        => 0.25,
				'std'         => 1,
				'edit_field_class' => 'vc_col-sm-4',
				'group' => esc_html__( 'Item Animation', 'volley-core' ),
				'dependency' => array(
					'element' => 'enable_item_animation',
					'value'   => 'yes',
				)
	
			),
			array(
				'type'        => 'themethreads_slider',
				'param_name'  => 'pf_init_scale_y',
				'heading'     => esc_html__( 'Scale Y', 'volley-core' ),
				'description' => esc_html__( 'Select Scale Y', 'volley-core' ),
				'min'         => 0,
				'max'         => 10,
				'step'        => 0.25,
				'std'         => 1,
				'edit_field_class' => 'vc_col-sm-4',
				'group' => esc_html__( 'Item Animation', 'volley-core' ),
				'dependency' => array(
					'element' => 'enable_item_animation',
					'value'   => 'yes',
				)
			),
			array(
				'type'        => 'themethreads_slider',
				'param_name'  => 'pf_init_scale_z',
				'heading'     => esc_html__( 'Scale Z', 'volley-core' ),
				'description' => esc_html__( 'Select Scale Z', 'volley-core' ),
				'min'         => 0,
				'max'         => 10,
				'step'        => 0.25,
				'std'         => 1,
				'edit_field_class' => 'vc_col-sm-4',
				'group' => esc_html__( 'Item Animation', 'volley-core' ),
				'dependency' => array(
					'element' => 'enable_item_animation',
					'value'   => 'yes',
				)
			),
			array(
				'type'        => 'themethreads_slider',
				'param_name'  => 'pf_init_rotate_x',
				'heading'     => esc_html__( 'Rotate X', 'volley-core' ),
				'description' => esc_html__( 'Select rotate degree on X axe', 'volley-core' ),
				'min'         => -360,
				'max'         => 360,
				'step'        => 1,	
				'group' => esc_html__( 'Item Animation', 'volley-core' ),
				'dependency' => array(
					'element' => 'enable_item_animation',
					'value'   => 'yes',
				)
			),
			array(
				'type'        => 'themethreads_slider',
				'param_name'  => 'pf_init_rotate_y',
				'heading'     => esc_html__( 'Rotate Y', 'volley-core' ),
				'description' => esc_html__( 'Select rotate degree on Y axe', 'volley-core' ),
				'min'         => -360,
				'max'         => 360,
				'step'        => 1,
				'group' => esc_html__( 'Item Animation', 'volley-core' ),
				'dependency' => array(
					'element' => 'enable_item_animation',
					'value'   => 'yes',
				)
			),
			array(
				'type'        => 'themethreads_slider',
				'param_name'  => 'pf_init_rotate_z',
				'heading'     => esc_html__( 'Rotate Z', 'volley-core' ),
				'description' => esc_html__( 'Select rotate degree on Z axe', 'volley-core' ),
				'min'         => -360,
				'max'         => 360,
				'step'        => 1,
				'group' => esc_html__( 'Item Animation', 'volley-core' ),
				'dependency' => array(
					'element' => 'enable_item_animation',
					'value'   => 'yes',
				)
			),
			array(
				'type'        => 'themethreads_slider',
				'param_name'  => 'pf_init_opacity',
				'heading'     => esc_html__( 'Opacity', 'volley-core' ),
				'description' => esc_html__( 'Set opacity', 'volley-core' ),
				'min'         => 0,
				'max'         => 1,
				'step'        => 0.1,
				'std'         => 1,
				'group' => esc_html__( 'Item Animation', 'volley-core' ),
				'dependency' => array(
					'element' => 'enable_item_animation',
					'value'   => 'yes',
				)
			),
			//Animation Values
			array(
				'type'        => 'subheading',
				'param_name'  => 'pf_animations_values',
				'heading'     => esc_html__( 'Animate To', 'volley-core' ),
				'group' => esc_html__( 'Item Animation', 'volley-core' ),
				'dependency' => array(
					'element' => 'enable_item_animation',
					'value'   => 'yes',
				)
			),			
			array(
				'type'        => 'themethreads_slider',
				'param_name'  => 'pf_an_translate_x',
				'heading'     => esc_html__( 'Translate X', 'volley-core' ),
				'description' => esc_html__( 'Select translate on X axe', 'volley-core' ),
				'min'         => -500,
				'max'         => 500,
				'step'        => 1,
				'group' => esc_html__( 'Item Animation', 'volley-core' ),
				'dependency' => array(
					'element' => 'enable_item_animation',
					'value'   => 'yes',
				)
			),
			array(
				'type'        => 'themethreads_slider',
				'param_name'  => 'pf_an_translate_y',
				'heading'     => esc_html__( 'Translate Y', 'volley-core' ),
				'description' => esc_html__( 'Select translate on Y axe', 'volley-core' ),
				'min'         => -500,
				'max'         => 500,
				'step'        => 1,
				'group' => esc_html__( 'Item Animation', 'volley-core' ),
				'dependency' => array(
					'element' => 'enable_item_animation',
					'value'   => 'yes',
				)
			),
			array(
				'type'        => 'themethreads_slider',
				'param_name'  => 'pf_an_translate_z',
				'heading'     => esc_html__( 'Translate Z', 'volley-core' ),
				'description' => esc_html__( 'Select translate on Z axe', 'volley-core' ),
				'min'         => -500,
				'max'         => 500,
				'step'        => 1,
				'group' => esc_html__( 'Item Animation', 'volley-core' ),
				'dependency' => array(
					'element' => 'enable_item_animation',
					'value'   => 'yes',
				)
			),
			array(
				'type'        => 'themethreads_slider',
				'param_name'  => 'pf_an_scale_x',
				'heading'     => esc_html__( 'Scale X', 'volley-core' ),
				'description' => esc_html__( 'Select Scale X', 'volley-core' ),
				'min'         => 0,
				'max'         => 10,
				'step'        => 0.25,
				'std'         => 1,
				'edit_field_class' => 'vc_col-sm-4',
				'group' => esc_html__( 'Item Animation', 'volley-core' ),
				'dependency' => array(
					'element' => 'enable_item_animation',
					'value'   => 'yes',
				)
	
			),
			array(
				'type'        => 'themethreads_slider',
				'param_name'  => 'pf_an_scale_y',
				'heading'     => esc_html__( 'Scale Y', 'volley-core' ),
				'description' => esc_html__( 'Select Scale Y', 'volley-core' ),
				'min'         => 0,
				'max'         => 10,
				'step'        => 0.25,
				'std'         => 1,
				'edit_field_class' => 'vc_col-sm-4',
				'group' => esc_html__( 'Item Animation', 'volley-core' ),
				'dependency' => array(
					'element' => 'enable_item_animation',
					'value'   => 'yes',
				)
			),
			array(
				'type'        => 'themethreads_slider',
				'param_name'  => 'pf_an_scale_z',
				'heading'     => esc_html__( 'Scale Z', 'volley-core' ),
				'description' => esc_html__( 'Select Scale Z', 'volley-core' ),
				'min'         => 0,
				'max'         => 10,
				'step'        => 0.25,
				'std'         => 1,
				'edit_field_class' => 'vc_col-sm-4',
				'group' => esc_html__( 'Item Animation', 'volley-core' ),
				'dependency' => array(
					'element' => 'enable_item_animation',
					'value'   => 'yes',
				)
			),
			array(
				'type'        => 'themethreads_slider',
				'param_name'  => 'pf_an_rotate_x',
				'heading'     => esc_html__( 'Rotate X', 'volley-core' ),
				'description' => esc_html__( 'Select rotate degree on X axe', 'volley-core' ),
				'min'         => -360,
				'max'         => 360,
				'step'        => 1,
				'group' => esc_html__( 'Item Animation', 'volley-core' ),
				'dependency' => array(
					'element' => 'enable_item_animation',
					'value'   => 'yes',
				)
			),
			array(
				'type'        => 'themethreads_slider',
				'param_name'  => 'pf_an_rotate_y',
				'heading'     => esc_html__( 'Rotate Y', 'volley-core' ),
				'description' => esc_html__( 'Select rotate degree on Y axe', 'volley-core' ),
				'min'         => -360,
				'max'         => 360,
				'step'        => 1,
				'group' => esc_html__( 'Item Animation', 'volley-core' ),
				'dependency' => array(
					'element' => 'enable_item_animation',
					'value'   => 'yes',
				)
			),
			array(
				'type'        => 'themethreads_slider',
				'param_name'  => 'pf_an_rotate_z',
				'heading'     => esc_html__( 'Rotate Z', 'volley-core' ),
				'description' => esc_html__( 'Select rotate degree on Z axe', 'volley-core' ),
				'min'         => -360,
				'max'         => 360,
				'step'        => 1,
				'group' => esc_html__( 'Item Animation', 'volley-core' ),
				'dependency' => array(
					'element' => 'enable_item_animation',
					'value'   => 'yes',
				)
			),
			array(
				'type'        => 'themethreads_slider',
				'param_name'  => 'pf_an_opacity',
				'heading'     => esc_html__( 'Opacity', 'volley-core' ),
				'description' => esc_html__( 'Set opacity', 'volley-core' ),
				'min'         => 0,
				'max'         => 1,
				'step'        => 0.1,
				'std'         => 1,
				'group' => esc_html__( 'Item Animation', 'volley-core' ),
				'dependency' => array(
					'element' => 'enable_item_animation',
					'value'   => 'yes',
				)
			),
			//Parallax
			array(
				'type'        => 'subheading',
				'param_name'  => 'prlx_from',
				'heading'     => esc_html__( 'Parallax "From" Options', 'volley-core' ),
				'group'       => esc_html__( 'Parallax Options', 'volley-core' ),
				'dependency'  => array(
					'element' => 'parallax',
					'value'   => 'yes'
				),
			),
			array(
				'type'        => 'themethreads_slider',
				'param_name'  => 'translate_from_x',
				'heading'     => esc_html__( 'Translate X', 'volley-core' ),
				'description' => esc_html__( 'Select translate on X axe', 'volley-core' ),
				'min'         => -500,
				'max'         => 500,
				'step'        => 1,
				'group'       => esc_html__( 'Parallax Options', 'volley-core' ),
				'dependency'  => array(
					'element' => 'parallax',
					'value'   => 'yes'
				),
	
			),
			array(
				'type'        => 'themethreads_slider',
				'param_name'  => 'translate_from_y',
				'heading'     => esc_html__( 'Translate Y', 'volley-core' ),
				'description' => esc_html__( 'Select translate on Y axe', 'volley-core' ),
				'min'         => -500,
				'max'         => 500,
				'step'        => 1,
				'group'       => esc_html__( 'Parallax Options', 'volley-core' ),
				'dependency'  => array(
					'element' => 'parallax',
					'value'   => 'yes'
				),
	
			),
			array(
				'type'        => 'themethreads_slider',
				'param_name'  => 'translate_from_z',
				'heading'     => esc_html__( 'Translate Z', 'volley-core' ),
				'description' => esc_html__( 'Select translate on Z axe', 'volley-core' ),
				'min'         => -500,
				'max'         => 500,
				'step'        => 1,
				'group'       => esc_html__( 'Parallax Options', 'volley-core' ),
				'dependency'  => array(
					'element' => 'parallax',
					'value'   => 'yes'
				),
	
			),
			array(
				'type'        => 'themethreads_slider',
				'param_name'  => 'scale_from_x',
				'heading'     => esc_html__( 'Scale X', 'volley-core' ),
				'description' => esc_html__( 'Select Scale X', 'volley-core' ),
				'min'         => 0,
				'max'         => 5,
				'step'        => 0.1,
				'std'         => 1,
				'group'       => esc_html__( 'Parallax Options', 'volley-core' ),
				'dependency'  => array(
					'element' => 'parallax',
					'value'   => 'yes'
				),
				'edit_field_class' => 'vc_col-sm-4',
	
			),
			array(
				'type'        => 'themethreads_slider',
				'param_name'  => 'scale_from_y',
				'heading'     => esc_html__( 'Scale Y', 'volley-core' ),
				'description' => esc_html__( 'Select Scale Y', 'volley-core' ),
				'min'         => 0,
				'max'         => 5,
				'step'        => 0.1,
				'std'         => 1,
				'group'       => esc_html__( 'Parallax Options', 'volley-core' ),
				'dependency'  => array(
					'element' => 'parallax',
					'value'   => 'yes'
				),
				'edit_field_class' => 'vc_col-sm-4',
			),
			array(
				'type'        => 'themethreads_slider',
				'param_name'  => 'scale_from_z',
				'heading'     => esc_html__( 'Scale Z', 'volley-core' ),
				'description' => esc_html__( 'Select Scale Z', 'volley-core' ),
				'min'         => 0,
				'max'         => 5,
				'step'        => 0.1,
				'std'         => 1,
				'group'       => esc_html__( 'Parallax Options', 'volley-core' ),
				'dependency'  => array(
					'element' => 'parallax',
					'value'   => 'yes'
				),
				'edit_field_class' => 'vc_col-sm-4',
			),
			array(
				'type'        => 'themethreads_slider',
				'param_name'  => 'rotate_from_x',
				'heading'     => esc_html__( 'Rotate X', 'volley-core' ),
				'description' => esc_html__( 'Select rotate degree on X axe', 'volley-core' ),
				'min'         => -360,
				'max'         => 360,
				'step'        => 1,
				'group'       => esc_html__( 'Parallax Options', 'volley-core' ),
				'dependency'  => array(
					'element' => 'parallax',
					'value'   => 'yes'
				),
	
			),
			array(
				'type'        => 'themethreads_slider',
				'param_name'  => 'rotate_from_y',
				'heading'     => esc_html__( 'Rotate Y', 'volley-core' ),
				'description' => esc_html__( 'Select rotate degree on Y axe', 'volley-core' ),
				'min'         => -360,
				'max'         => 360,
				'step'        => 1,
				'group'       => esc_html__( 'Parallax Options', 'volley-core' ),
				'dependency'  => array(
					'element' => 'parallax',
					'value'   => 'yes'
				),
	
			),
			array(
				'type'        => 'themethreads_slider',
				'param_name'  => 'rotate_from_z',
				'heading'     => esc_html__( 'Rotate Z', 'volley-core' ),
				'description' => esc_html__( 'Select rotate degree on Z axe', 'volley-core' ),
				'min'         => -360,
				'max'         => 360,
				'step'        => 1,
				'group'       => esc_html__( 'Parallax Options', 'volley-core' ),
				'dependency'  => array(
					'element' => 'parallax',
					'value'   => 'yes'
				),
	
			),
			array(
				'type'        => 'dropdown',
				'param_name'  => 'from_torigin_x',
				'heading'     => esc_html__( 'Transform Origin X', 'volley-core' ),
				'description' => esc_html__( 'Select or add transform origin X axe', 'volley-core' ),
				'value'       => array(
					esc_html__( 'None', 'volley-core' )   => '',
					esc_html__( 'Left', 'volley-core' )   => 'left',
					esc_html__( 'Center', 'volley-core' ) => 'center',
					esc_html__( 'Right', 'volley-core' )  => 'right',
					esc_html__( 'Custom', 'volley-core' ) => 'custom',
				),
				'group'       => esc_html__( 'Parallax Options', 'volley-core' ),
				'dependency'  => array(
					'element' => 'parallax',
					'value'   => 'yes'
				),
				'edit_field_class' => 'vc_col-sm-6',
			),
			array(
				'type'        => 'textfield',
				'param_name'  => 'from_torigin_x_custom',
				'heading'     => esc_html__( 'Custom value for X-asex', 'volley-core' ),
				'description' => esc_html__( 'Add custom value for transform-origin X axe in px or %', 'volley-core' ),
				'group'       => esc_html__( 'Parallax Options', 'volley-core' ),
				'dependency'  => array(
					'element' => 'from_torigin_x',
					'value'   => 'custom',
				),
				'edit_field_class' => 'vc_col-sm-6',
			),
			array(
				'type'        => 'dropdown',
				'param_name'  => 'from_torigin_y',
				'heading'     => esc_html__( 'Transform Origin Y', 'volley-core' ),
				'description' => esc_html__( 'Select or add transform origin Y axe', 'volley-core' ),
				'value'       => array(
					esc_html__( 'None', 'volley-core' )   => '',
					esc_html__( 'Top', 'volley-core' )    => 'top',
					esc_html__( 'Center', 'volley-core' ) => 'center',
					esc_html__( 'Bottom', 'volley-core' ) => 'bottom',
					esc_html__( 'Custom', 'volley-core' ) => 'custom',
				),
				'group'       => esc_html__( 'Parallax Options', 'volley-core' ),
				'dependency'  => array(
					'element' => 'parallax',
					'value'   => 'yes'
				),
				'edit_field_class' => 'vc_col-sm-6',
			),
			array(
				'type'        => 'textfield',
				'param_name'  => 'from_torigin_y_custom',
				'heading'     => esc_html__( 'Custom value for Y-asex', 'volley-core' ),
				'description' => esc_html__( 'Add custom value for transform-origin Y axe in px or %', 'volley-core' ),
				'group'       => esc_html__( 'Parallax Options', 'volley-core' ),
				'dependency'  => array(
					'element' => 'from_torigin_y',
					'value'   => 'custom',
				),
				'edit_field_class' => 'vc_col-sm-6',
			),
			array(
				'type'        => 'themethreads_slider',
				'param_name'  => 'from_opacity',
				'heading'     => esc_html__( 'Opacity', 'volley-core' ),
				'description' => esc_html__( 'Set opacity', 'volley-core' ),
				'min'         => 0,
				'max'         => 1,
				'step'        => 0.1,
				'std'         => 1,
				'group'       => esc_html__( 'Parallax Options', 'volley-core' ),
				'dependency'  => array(
					'element' => 'parallax',
					'value'   => 'yes'
				),
	
			),
	
			//parallax custom code textarea
			array(
				'type'        => 'textarea',
				'param_name'  => 'parallax_from',
				'heading'     => esc_html__( 'Parallax "From" Custom Options', 'volley-core' ),
				'description' => esc_html__( 'Parallax custom options to add to data-paralax-from attribute, will override all options above', 'volley-core' ),
				'group'       => esc_html__( 'Parallax Options', 'volley-core' ),
				'dependency'  => array(
					'element' => 'parallax',
					'value'   => 'yes'
				),
			),
			array(
				'type'        => 'subheading',
				'param_name'  => 'prlx_to',
				'heading'     => esc_html__( 'Parallax "To" Options', 'volley-core' ),
				'group'       => esc_html__( 'Parallax Options', 'volley-core' ),
				'dependency'  => array(
					'element' => 'parallax',
					'value'   => 'yes'
				),
			),
			array(
				'type'        => 'themethreads_slider',
				'param_name'  => 'translate_to_x',
				'heading'     => esc_html__( 'Translate X', 'volley-core' ),
				'description' => esc_html__( 'Select translate on X axe', 'volley-core' ),
				'min'         => -500,
				'max'         => 500,
				'step'        => 1,
				'group'       => esc_html__( 'Parallax Options', 'volley-core' ),
				'dependency'  => array(
					'element' => 'parallax',
					'value'   => 'yes'
				),
	
			),
			array(
				'type'        => 'themethreads_slider',
				'param_name'  => 'translate_to_y',
				'heading'     => esc_html__( 'Translate Y', 'volley-core' ),
				'description' => esc_html__( 'Select translate on Y axe', 'volley-core' ),
				'min'         => -500,
				'max'         => 500,
				'step'        => 1,
				'group'       => esc_html__( 'Parallax Options', 'volley-core' ),
				'dependency'  => array(
					'element' => 'parallax',
					'value'   => 'yes'
				),
	
			),
			array(
				'type'        => 'themethreads_slider',
				'param_name'  => 'translate_to_z',
				'heading'     => esc_html__( 'Translate Z', 'volley-core' ),
				'description' => esc_html__( 'Select translate on Z axe', 'volley-core' ),
				'min'         => -500,
				'max'         => 500,
				'step'        => 1,
				'group'       => esc_html__( 'Parallax Options', 'volley-core' ),
				'dependency'  => array(
					'element' => 'parallax',
					'value'   => 'yes'
				),
	
			),
			array(
				'type'        => 'themethreads_slider',
				'param_name'  => 'scale_to_x',
				'heading'     => esc_html__( 'Scale X', 'volley-core' ),
				'description' => esc_html__( 'Select Scale X', 'volley-core' ),
				'min'         => 0,
				'max'         => 10,
				'step'        => 0.1,
				'std'         => 1,
				'group'       => esc_html__( 'Parallax Options', 'volley-core' ),
				'dependency'  => array(
					'element' => 'parallax',
					'value'   => 'yes'
				),
				'edit_field_class' => 'vc_col-sm-4',
	
			),
			array(
				'type'        => 'themethreads_slider',
				'param_name'  => 'scale_to_y',
				'heading'     => esc_html__( 'Scale Y', 'volley-core' ),
				'description' => esc_html__( 'Select Scale Y', 'volley-core' ),
				'min'         => 0,
				'max'         => 10,
				'step'        => 0.1,
				'std'         => 1,
				'group'       => esc_html__( 'Parallax Options', 'volley-core' ),
				'dependency'  => array(
					'element' => 'parallax',
					'value'   => 'yes'
				),
				'edit_field_class' => 'vc_col-sm-4',
			),
	
			array(
				'type'        => 'themethreads_slider',
				'param_name'  => 'scale_to_z',
				'heading'     => esc_html__( 'Scale Z', 'volley-core' ),
				'description' => esc_html__( 'Select Scale Z', 'volley-core' ),
				'min'         => 0,
				'max'         => 10,
				'step'        => 0.1,
				'std'         => 1,
				'group'       => esc_html__( 'Parallax Options', 'volley-core' ),
				'dependency'  => array(
					'element' => 'parallax',
					'value'   => 'yes'
				),
				'edit_field_class' => 'vc_col-sm-4',
			),
	
			array(
				'type'        => 'themethreads_slider',
				'param_name'  => 'rotate_to_x',
				'heading'     => esc_html__( 'Rotate X', 'volley-core' ),
				'description' => esc_html__( 'Select rotate degree on X axe', 'volley-core' ),
				'min'         => -360,
				'max'         => 360,
				'step'        => 1,
				'group'       => esc_html__( 'Parallax Options', 'volley-core' ),
				'dependency'  => array(
					'element' => 'parallax',
					'value'   => 'yes'
				),
	
			),
	
			array(
				'type'        => 'themethreads_slider',
				'param_name'  => 'rotate_to_y',
				'heading'     => esc_html__( 'Rotate Y', 'volley-core' ),
				'description' => esc_html__( 'Select rotate degree on Y axe', 'volley-core' ),
				'min'         => -360,
				'max'         => 360,
				'step'        => 1,
				'group'       => esc_html__( 'Parallax Options', 'volley-core' ),
				'dependency'  => array(
					'element' => 'parallax',
					'value'   => 'yes'
				),
	
			),
	
			array(
				'type'        => 'themethreads_slider',
				'param_name'  => 'rotate_to_z',
				'heading'     => esc_html__( 'Rotate Z', 'volley-core' ),
				'description' => esc_html__( 'Select rotate degree on Z axe', 'volley-core' ),
				'min'         => -360,
				'max'         => 360,
				'step'        => 1,
				'group'       => esc_html__( 'Parallax Options', 'volley-core' ),
				'dependency'  => array(
					'element' => 'parallax',
					'value'   => 'yes'
				),
	
			),
	
			array(
				'type'        => 'dropdown',
				'param_name'  => 'to_torigin_x',
				'heading'     => esc_html__( 'Transform Origin X', 'volley-core' ),
				'description' => esc_html__( 'Select or add transform origin X axe', 'volley-core' ),
				'value'       => array(
					esc_html__( 'None', 'volley-core' )   => '',
					esc_html__( 'Left', 'volley-core' )   => '0%',
					esc_html__( 'Center', 'volley-core' ) => '50%',
					esc_html__( 'Right', 'volley-core' )  => '100%',
					esc_html__( 'Custom', 'volley-core' ) => 'custom',
				),
				'group'       => esc_html__( 'Parallax Options', 'volley-core' ),
				'dependency'  => array(
					'element' => 'parallax',
					'value'   => 'yes'
				),
				'edit_field_class' => 'vc_col-sm-6',
			),
	
			array(
				'type'        => 'textfield',
				'param_name'  => 'to_torigin_x_custom',
				'heading'     => esc_html__( 'Custom value for X-asex', 'volley-core' ),
				'description' => esc_html__( 'Add custom value for transform-origin X axe in px or %', 'volley-core' ),
				'group'       => esc_html__( 'Parallax Options', 'volley-core' ),
				'dependency'  => array(
					'element' => 'to_torigin_x',
					'value'   => 'custom',
				),
				'edit_field_class' => 'vc_col-sm-6',
			),
	
			array(
				'type'        => 'dropdown',
				'param_name'  => 'to_torigin_y',
				'heading'     => esc_html__( 'Transform Origin Y', 'volley-core' ),
				'description' => esc_html__( 'Select or add transform origin Y axe', 'volley-core' ),
				'value'       => array(
					esc_html__( 'None', 'volley-core' )   => '',
					esc_html__( 'Top', 'volley-core' )    => '0%',
					esc_html__( 'Center', 'volley-core' ) => '50%',
					esc_html__( 'Bottom', 'volley-core' ) => '100%',
					esc_html__( 'Custom', 'volley-core' ) => 'custom',
				),
				'group'       => esc_html__( 'Parallax Options', 'volley-core' ),
				'dependency'  => array(
					'element' => 'parallax',
					'value'   => 'yes'
				),
				'edit_field_class' => 'vc_col-sm-6',
			),
	
			array(
				'type'        => 'textfield',
				'param_name'  => 'to_torigin_y_custom',
				'heading'     => esc_html__( 'Custom value for Y-asex', 'volley-core' ),
				'description' => esc_html__( 'Add custom value for transform-origin Y axe in px or %', 'volley-core' ),
				'group'       => esc_html__( 'Parallax Options', 'volley-core' ),
				'dependency'  => array(
					'element' => 'to_torigin_y',
					'value'   => 'custom',
				),
				'edit_field_class' => 'vc_col-sm-6',
			),
	
			array(
				'type'        => 'themethreads_slider',
				'param_name'  => 'to_opacity',
				'heading'     => esc_html__( 'Opacity', 'volley-core' ),
				'description' => esc_html__( 'Set opacity', 'volley-core' ),
				'min'         => 0,
				'max'         => 1,
				'step'        => 0.1,
				'std'         => 1,
				'group'       => esc_html__( 'Parallax Options', 'volley-core' ),
				'dependency'  => array(
					'element' => 'parallax',
					'value'   => 'yes'
				),
	
			),
	
			array(
				'type'        => 'textarea',
				'param_name'  => 'parallax_to',
				'heading'     => esc_html__( 'Parallax To', 'volley-core' ),
				'description' => esc_html__( 'Parallax custom options to add to data-paralax-from attribute', 'volley-core' ),
				'group'       => esc_html__( 'Parallax Options', 'volley-core' ),
				'dependency'  => array(
					'element' => 'parallax',
					'value'   => 'yes'
				),
			),
	
			array(
				'type'        => 'subheading',
				'param_name'  => 'prlx_common',
				'heading'     => esc_html__( 'Parallax Settings', 'volley-core' ),
				'group'       => esc_html__( 'Parallax Options', 'volley-core' ),
				'dependency'  => array(
					'element' => 'parallax',
					'value'   => 'yes'
				),
			),
	
			array(
				'type'        => 'textfield',
				'param_name'  => 'to_delay',
				'heading'     => esc_html__( 'Delay', 'volley-core' ),
				'description' => esc_html__( 'Add delay time in seconds', 'volley-core' ),
				'group'       => esc_html__( 'Parallax Options', 'volley-core' ),
				'dependency'  => array(
					'element' => 'parallax',
					'value'   => 'yes'
				),
			),
	
			array(
				'type'        => 'dropdown',
				'param_name'  => 'to_easy',
				'heading'     => esc_html__( 'Animation Easing', 'volley-core' ),
				'description' => '',
				'value'       => array(
					'linear',
					'easeInQuad',
					'easeInCubic',
					'easeInQuart',
					'easeInQuint',
					'easeInSine',
					'easeInExpo',
					'easeInCirc',
					'easeInBack',
					'easeOutQuad',
					'easeOutCubic',
					'easeOutQuart',
					'easeOutQuint',
					'easeOutSine',
					'easeOutExpo',
					'easeOutCirc',
					'easeOutBack',
					'easeInOutQuad',
					'easeInOutCubic',
					'easeInOutQuart',
					'easeInOutQuint',
					'easeInOutSine',
					'easeInOutExpo',
					'easeInOutCirc',
					'easeInOutBack',
				),
				'group'       => esc_html__( 'Parallax Options', 'volley-core' ),
				'dependency'  => array(
					'element' => 'parallax',
					'value'   => 'yes'
				),
			),
			array(
				'type'        => 'textfield',
				'param_name'  => 'parallax_offset',
				'heading'     => esc_html__( 'Parallax Offset', 'volley-core' ),
				'description' => esc_html__( 'Offset number', 'volley-core' ),
				'group'       => esc_html__( 'Parallax Options', 'volley-core' ),
				'dependency'  => array(
					'element' => 'parallax',
					'value'   => 'yes'
				),
				'edit_field_class' => 'vc_col-sm-6',
			),
			array(
				'type'       => 'dropdown',
				'param_name' => 'parallax_trigger',
				'heading'    => esc_html__( 'Parallax Trigger', 'volley-core' ),
				'value' => array(
					esc_html__( 'On Enter', 'volley-core' )  => 'onEnter',
					esc_html__( 'On Leave', 'volley-core' ) => 'onLeave',
					esc_html__( 'On Center', 'volley-core' ) => 'onCenter',
					esc_html__( 'Number Value', 'volley-core' ) => 'number',
				),
				'std'        => 'onEnter',
				'group'      => esc_html__( 'Parallax Options', 'volley-core' ),
				'dependency' => array(
					'element' => 'parallax',
					'value'   => 'yes'
				),
				'edit_field_class' => 'vc_col-sm-6',
			),
	
			array(
				'type'        => 'textfield',
				'param_name'  => 'parallax_trigger_number',
				'heading'     => esc_html__( 'Parallax Trigger Number', 'volley-core' ),
				'description' => esc_html__( 'Input trigger number value from 0 to 1', 'volley-core' ),
				'group'       => esc_html__( 'Parallax Options', 'volley-core' ),
				'dependency'  => array(
					'element' => 'parallax_trigger',
					'value'   => 'number'
				),
				'edit_field_class' => 'vc_col-sm-6',
			),			
			array(
				'type'        => 'textfield',
				'param_name'  => 'parallax_duration',
				'heading'     => esc_html__( 'Parallax Duration', 'volley-core' ),
				'description' => esc_html__( 'define how much time for ex 800', 'volley-core' ),
				'group'       => esc_html__( 'Parallax Options', 'volley-core' ),
				'dependency'  => array(
					'element' => 'parallax',
					'value'   => 'yes'
				),
				'edit_field_class' => 'vc_col-sm-6',
			),
			array(
				'type'        => 'dropdown',
				'param_name'  => 'parallax_overflow',
				'heading'     => esc_html__( 'Parallax overflow hidden', 'volley-core' ),
				'description' => esc_html__( 'Make overflow hidden or visible', 'volley-core' ),
				'group'       => esc_html__( 'Parallax Options', 'volley-core' ),
				'dependency'  => array(
					'element' => 'parallax',
					'value'   => 'yes'
				),
				'value' => array(
					esc_html__( 'Yes', 'volley-core' )  => 'yes',
					esc_html__( 'No', 'volley-core' )  => 'no',
				),
				'std'        => 'no',
				'edit_field_class' => 'vc_col-sm-6',
			),
			array(
				'type'        => 'textfield',
				'param_name'  => 'overflow_height',
				'heading'     => esc_html__( 'Height', 'volley-core' ),
				'description' => esc_html__( 'add height for parallax element with px, for ex 150px', 'volley-core' ),
				'group'       => esc_html__( 'Parallax Options', 'volley-core' ),
				'dependency'  => array(
					'element' => 'parallax_overflow',
					'value'   => 'yes'
				),
				'edit_field_class' => 'vc_col-sm-6',
			),
			
			//Design Options
			array(
				'type'        => 'checkbox',
				'heading'     => esc_html__( 'Absolute Position?', 'volley-core' ),
				'param_name'  => 'absolute_pos',
				'description' => esc_html__( 'If checked the position will be set absolute', 'volley-core' ),
				'value'       => array( esc_html__( 'Yes', 'volley-core' ) => 'yes' ),
				'group'       => esc_html__( 'Design Options', 'volley-core' ),
				'edit_field_class' => 'vc_col-sm-6 vc_col-md-offset-6',
			),
			array(
				'type'       => 'themethreads_responsive',
				'heading'    => esc_html__( 'Margin', 'volley-core' ),
				'description' => esc_html__( 'Add margins for the element, use px or %', 'volley-core' ),
				'css'        => 'margin',
				'param_name' => 'margin',
				'group'      => esc_html__( 'Design Options', 'volley-core' ),
				'edit_field_class' => 'vc_col-sm-6',
			),
			//Position
			array(
				'type'       => 'themethreads_responsive',
				'heading'    => esc_html__( 'Position', 'volley-core' ),
				'description' => esc_html__( 'Add positions for the element, use px or %', 'volley-core' ),
				'css'        => 'position',
				'param_name' => 'position',
				'group'      => esc_html__( 'Design Options', 'volley-core' ),
				'edit_field_class' => 'vc_col-sm-6',
			),
			
		);

		$this->add_extras();
	}

	protected function get_options() {

		extract( $this->atts );
		
		if( !$enable_item_animation ) {
			return;
		}
		
		$animation_opts = $this->get_animation_opts();

		$opts = $split_opts = array();
		$opts[] = 'data-custom-animations="true"';
		$opts[] = 'data-ca-options=\'' . stripslashes( wp_json_encode( $animation_opts ) ) . '\'';
	
		return join( ' ', $opts );

	}
	
	protected function get_animation_opts() {

		extract( $this->atts );
		
		$opts = $init_values = $animations_values = $arr = array();
		$opts['triggerHandler'] = 'inview';
		$opts['animationTarget'] = '.themethreads-img-group-single';
		$opts['duration'] = !empty( $pf_duration ) ? $pf_duration : 700;
		if( !empty( $pf_start_delay ) ) {
			$opts['startDelay'] = $pf_start_delay;
		}
		$opts['delay'] = !empty( $pf_delay ) ? $pf_delay : 100;
		$opts['easing'] = $pf_easing;
		$opts['direction'] = $pf_direction;
		
		//Init values
		if ( !empty( $pf_init_translate_x ) ) { $init_values['translateX'] = ( int ) $pf_init_translate_x; }
		if ( !empty( $pf_init_translate_y ) ) { $init_values['translateY'] = ( int ) $pf_init_translate_y; }
		if ( !empty( $pf_init_translate_z ) ) { $init_values['translateZ'] = ( int ) $pf_init_translate_z; }
	
		if ( '1' !== $pf_init_scale_x ) { $init_values['scaleX'] = ( float ) $pf_init_scale_x; }
		if ( '1' !== $pf_init_scale_y ) { $init_values['scaleY'] = ( float ) $pf_init_scale_y; }
		if ( '1' !== $pf_init_scale_z ) { $init_values['scaleZ'] = ( float ) $pf_init_scale_z; }
	
		if ( !empty( $pf_init_rotate_x ) ) { $init_values['rotateX'] = ( int ) $pf_init_rotate_x; }
		if ( !empty( $pf_init_rotate_y ) ) { $init_values['rotateY'] = ( int ) $pf_init_rotate_y; }
		if ( !empty( $pf_init_rotate_z ) ) { $init_values['rotateZ'] = ( int ) $pf_init_rotate_z; }
		
		if ( isset( $pf_init_opacity ) && '1' !== $pf_init_opacity ) { $init_values['opacity'] = ( float ) $pf_init_opacity; }
	
		//Animation values
		if ( !empty( $pf_init_translate_x ) ) { $animations_values['translateX'] = ( int ) $pf_an_translate_x; }
		if ( !empty( $pf_init_translate_y ) ) { $animations_values['translateY'] = ( int ) $pf_an_translate_y; }
		if ( !empty( $pf_init_translate_z ) ) { $animations_values['translateZ'] = ( int ) $pf_an_translate_z; }
	
		if ( isset( $pf_an_scale_x ) && '1' !== $pf_init_scale_x ) { $animations_values['scaleX'] = ( float ) $pf_an_scale_x; }
		if ( isset( $pf_an_scale_y ) && '1' !== $pf_init_scale_y ) { $animations_values['scaleY'] = ( float ) $pf_an_scale_y; }
		if ( isset( $pf_an_scale_z ) && '1' !== $pf_init_scale_z ) { $animations_values['scaleZ'] = ( float ) $pf_an_scale_z; }
	
		if ( !empty( $pf_init_rotate_x ) ) { $animations_values['rotateX'] = ( int ) $pf_an_rotate_x; }
		if ( !empty( $pf_init_rotate_y ) ) { $animations_values['rotateY'] = ( int ) $pf_an_rotate_y; }
		if ( !empty( $pf_init_rotate_z ) ) { $animations_values['rotateZ'] = ( int ) $pf_an_rotate_z; }
	
		if ( isset( $pf_an_opacity ) && '1' !== $pf_init_opacity ) { $animations_values['opacity'] = ( float ) $pf_an_opacity; }	

		$opts['initValues'] = !empty( $init_values ) ? $init_values : array( 'scale' => 1 );
		$opts['animations'] = !empty( $animations_values ) ? $animations_values : array( 'scale' => 1 );
		
		return $opts;
		
	}
	
	protected function get_parallax_options() {
		
		extract( $this->atts );
		
		if( 'yes' !== $parallax ) {
			return;
		}

		$wrapper_attributes = $parallax_data = $parallax_data_from = $parallax_data_to = $parallax_opts = array();

		$wrapper_attributes[] = 'data-parallax="true"';
	
		//Data-options-from
		if ( !empty( $translate_from_x ) ) { $parallax_data_from['translateX']      = ( int ) $translate_from_x; }
		if ( !empty( $translate_from_y ) ) { $parallax_data_from['translateY']      = ( int ) $translate_from_y; }
		if ( !empty( $translate_from_z ) ) { $parallax_data_from['translateZ']      = ( int ) $translate_from_z; }
	
		if ( '1' !== $scale_from_x ) { $parallax_data_from['scaleX']     = ( float ) $scale_from_x; }
		if ( '1' !== $scale_from_y ) { $parallax_data_from['scaleY']     = ( float ) $scale_from_y; }
		if ( '1' !== $scale_from_z ) { $parallax_data_from['scaleZ']     = ( float ) $scale_from_z; }
	
		if ( !empty( $rotate_from_x ) ) { $parallax_data_from['rotateX'] = ( int ) $rotate_from_x; }
		if ( !empty( $rotate_from_y ) ) { $parallax_data_from['rotateY'] = ( int ) $rotate_from_y; }
		if ( !empty( $rotate_from_z ) ) { $parallax_data_from['rotateZ'] = ( int ) $rotate_from_z; }
	
		if ( isset( $from_opacity ) && '1' !== $from_opacity ) { $parallax_data_from['opacity']    = ( float ) $from_opacity; }
	
		if ( ! empty(
			$from_torigin_x_custom ) ) { $_x_custom = $from_torigin_x_custom;
		} else {
			$_x_custom = ! empty( $from_torigin_x ) ? $from_torigin_x : '';
		}
		if ( ! empty( $from_torigin_y_custom ) ) {
			$_y_custom = $from_torigin_y_custom;
		} else {
			$_y_custom = ! empty( $from_torigin_y ) ? $from_torigin_y : '';
		}
		if ( ! empty( $_x_custom ) && ! empty( $_y_custom ) ) {
			$parallax_data_from['transformOrigin'] = $_x_custom . '&nbsp;' . $_y_custom;
		}
	
		//Data-options-to
		if ( !empty( $translate_from_x ) ) { $parallax_data_to['translateX'] = ( int ) $translate_to_x; }
		if ( !empty( $translate_from_y ) ) { $parallax_data_to['translateY'] = ( int ) $translate_to_y; }
		if ( !empty( $translate_from_z ) ) { $parallax_data_to['translateZ'] = ( int ) $translate_to_z; }
	
		if ( isset( $scale_to_x ) && '1' !== $scale_from_x ) { $parallax_data_to['scaleX'] = ( float ) $scale_to_x; }
		if ( isset( $scale_to_y ) && '1' !== $scale_from_y ) { $parallax_data_to['scaleY'] = ( float ) $scale_to_y; }
		if ( isset( $scale_to_z ) && '1' !== $scale_from_z ) { $parallax_data_to['scaleZ'] = ( float ) $scale_to_z; }
	
		if ( !empty( $rotate_from_x ) ) { $parallax_data_to['rotateX'] = ( int ) $rotate_to_x; }
		if ( !empty( $rotate_from_y ) ) { $parallax_data_to['rotateY'] = ( int ) $rotate_to_y; }
		if ( !empty( $rotate_from_z ) ) { $parallax_data_to['rotateZ'] = ( int ) $rotate_to_z; }
	
		if ( isset( $to_opacity ) && '1' !== $from_opacity ) { $parallax_data_to['opacity'] = ( float ) $to_opacity; }
	
		if( ! empty(
			$to_torigin_x_custom ) ) { $to_x_custom = $to_torigin_x_custom;
		} else {
			$to_x_custom = ! empty( $to_torigin_x ) ? $to_torigin_x : '';
		}
		if( ! empty( $to_torigin_y_custom ) ) {
			$to_y_custom = $to_torigin_y_custom;
		} else {
			$to_y_custom = ! empty( $to_torigin_y ) ? $to_torigin_y : '';
		}
		if( ! empty( $to_x_custom ) && ! empty( $to_y_custom ) ) {
			$parallax_data_to['transformOrigin'] = $to_x_custom . '&nbsp;' . $to_y_custom;
		}
	
		//Parallax general options	
		if ( ! empty( $parallax_from ) ) {
			$parallax_data['from'] = $parallax_from;
		} else {
			$parallax_data['from'] = $parallax_data_from;
		}
		if( ! empty( $parallax_to ) ) {
			$parallax_data['to'] = $parallax_to;
		} else {
			$parallax_data['to'] = $parallax_data_to;
		}
	
		if( is_array( $parallax_data['from'] ) && ! empty( $parallax_data['from'] ) ) {
			$wrapper_attributes[] = 'data-parallax-from=\'' . wp_json_encode( $parallax_data['from'] ) . '\'';
		}
		elseif( ! empty( $parallax_from ) ) {
			$wrapper_attributes[] = 'data-parallax-from=\'{' . $parallax_from . '}\'';
		}
	
		if( is_array( $parallax_data['to'] ) && ! empty( $parallax_data['to'] ) ) {
	
			$wrapper_attributes[] = 'data-parallax-to=\'' . wp_json_encode( $parallax_data['to'] ) . '\'';
		}
		elseif( ! empty( $parallax_to ) ) {
			$wrapper_attributes[] = 'data-parallax-to=\'{' . $parallax_to . '}\'';
		}

		$parallax_opts['overflowHidden'] = ( 'no' === $parallax_overflow ) ? false : true;
		if( ! empty( $parallax_time ) ) { $parallax_opts['time'] = esc_attr( $parallax_time ); }
		if( ! empty( $parallax_duration ) ) { $parallax_opts['duration'] = esc_attr( $parallax_duration ); }
		if ( isset( $to_easy ) ) { $parallax_opts['easing'] = $to_easy; }
		if ( ! empty( $to_delay ) ) { $parallax_opts['delay'] = ( float ) $to_delay; }
		if( ! empty( $parallax_offset ) ) { $parallax_opts['offset'] = esc_attr( $parallax_offset ); }
		if( ! empty( $parallax_opts ) ) {
			$wrapper_attributes[] = 'data-parallax-options=\'' . wp_json_encode( $parallax_opts ) .'\'';
		}

		return implode( ' ', $wrapper_attributes );

	}
	
	protected function generate_css() {

		extract( $this->atts );

		$elements = array();
		$id = '.' . $this->get_id();
		
		if( ! empty( $absolute_pos ) ) {
			$elements[ themethreads_implode( '%1$s' ) ]['position'] = 'absolute';
		}
		if( !empty( $overflow_height ) ) {
			$elements[ themethreads_implode( '%1$s .ld-parallax-wrap' ) ]['height'] = $overflow_height;
		}
		
		$responsive_pos = ThemeThreads_Responsive_Param::generate_css( 'position', $position, $this->get_id() );
		$elements['media']['position'] = $responsive_pos;
		
		$responsive_margin = ThemeThreads_Responsive_Param::generate_css( 'margin', $margin, $this->get_id() );
		$elements['media']['margin'] = $responsive_margin;
		
		$this->dynamic_css_parser( $id, $elements );
	}


}
new LD_Images_Group_Container;
class WPBakeryShortCode_LD_Images_Group_Container extends WPBakeryShortCodesContainer {}