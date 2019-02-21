<?php
/**
* Shortcode Particles
*/

if( !defined( 'ABSPATH' ) )
	exit; // Exit if accessed directly

/**
* LD_Shortcode
*/
class LD_Particles extends LD_Shortcode {

	/**
	 * [__construct description]
	 * @method __construct
	 */
	public function __construct() {

		// Properties
		$this->slug        = 'ld_particles';
		$this->title       = esc_html__( 'Particles', 'volley-core' );
		$this->description = esc_html__( 'Add animated particles', 'volley-core' );
		$this->icon        = 'fa fa-star';

		parent::__construct();
	}

	public function get_params() {

		$this->params = array(
			
			array(
				'type'       => 'el_id',
				'param_name' => 'particle_id',
				'settings'   => array(
					'auto_generate' => true,
				),
				'admin_label' => true,
				'heading'     => esc_html__( 'Particle ID', 'volley-core' ),
				'description' =>  wp_kses_post( __( 'Enter particle ID (Note: make sure it is unique and valid according to <a href="%s" target="_blank">w3c specification</a>).', 'volley-core' ) ),
			),
			array(
				'type'        => 'checkbox',
				'heading'     => esc_html__( 'Use as background?', 'volley-core' ),
				'param_name'  => 'as_bg',
				'description' => esc_html__( 'If checked the particles will be used as background for the section', 'volley-core' ),
				'value'       => array( esc_html__( 'Yes', 'volley-core' ) => 'yes' ),
			),
			array(
				'type'        => 'textfield',
				'param_name'  => 'height',
				'heading'     => esc_html__( 'Height', 'volley-core' ),
				'description' => esc_html__( 'Add height in px, for ex. 120px', 'volley-core' ),
				'group'       => esc_html__( 'Design Options', 'volley-core' ),
			),
			array(
				'type'        => 'checkbox',
				'heading'     => esc_html__( 'Absolute Position?', 'volley-core' ),
				'param_name'  => 'absolute_pos',
				'description' => esc_html__( 'If checked the position will be set absolute', 'volley-core' ),
				'value'       => array( esc_html__( 'Yes', 'volley-core' ) => 'yes' ),
				'group'       => esc_html__( 'Design Options', 'volley-core' ),
			),
			//Position
			array(
				'type'       => 'themethreads_responsive',
				'heading'    => esc_html__( 'Position', 'volley-core' ),
				'description' => esc_html__( 'Add positions for the element, use px or %', 'volley-core' ),
				'css'        => 'position',
				'param_name' => 'position',
				'group'      => esc_html__( 'Design Options', 'volley-core' ),
			),
			
			//Particles Options
			//particles:
			array(
				'type'       => 'subheading',
				'param_name' => 'sh_styling',
				'heading'    => esc_html__( 'Particles', 'volley-core' ),
				'group'      => esc_html__( 'Particles Options', 'volley-core'),
			),
			array(
				'type'        => 'textfield',
				'param_name'  => 'number',
				'heading'     => esc_html__( 'Number', 'volley-core' ),
				'description' => esc_html__( 'Number of the particles', 'volley-core' ),
				'edit_field_class' => 'vc_col-sm-6 vc_column-with-padding',
				'group'      => esc_html__( 'Particles Options', 'volley-core'),				
			),
			array(
				'type'        => 'checkbox',
				'param_name'  => 'enable_density',
				'heading'     => esc_html__( 'Enable Density?', 'volley-core' ),
				'edit_field_class' => 'vc_col-sm-6',
				'description' => esc_html__( 'Will enable density factor', 'volley-core' ),
				'value'       => array( esc_html__( 'Yes', 'volley-core' ) => 'yes' ),
				'group'       => esc_html__( 'Particles Options', 'volley-core'),
			),
			array(
				'type'        => 'textfield',
				'param_name'  => 'density',
				'heading'     => esc_html__( 'Density', 'volley-core' ),
				'description' => esc_html__( 'Density of the particles', 'volley-core' ),
				'edit_field_class' => 'vc_col-sm-6',
				'dependency' => array(
					'element' => 'enable_density',
					'value' => 'yes',
				),
				'group'      => esc_html__( 'Particles Options', 'volley-core'),
			),
			array(
				'type' => 'dropdown',
				'param_name' => 'color_type',
				'heading' => esc_html__( 'Color Variations', 'volley-core' ),
				'value' => array(
					esc_html__( 'Single Color', 'volley-core' ) => 'single_color',
					esc_html__( 'Multi Color', 'volley-core' )  => 'multi_color',
					esc_html__( 'Random Color', 'volley-core' ) => 'random_color',
				),
				'group'       => esc_html__( 'Particles Options', 'volley-core'),
				'edit_field_class' => 'vc_col-sm-6',
			),
			array(
				'type'       => 'param_group',
				'param_name' => 'multi_color_values',
				'heading'    => esc_html__( 'Multi Colors', 'volley-core' ),
				'params'     => array(
					array(
						'type'        => 'colorpicker',
						'param_name'  => 'scolor',
						'heading'     => esc_html__( 'Color', 'volley-core' ),
						'description' => esc_html__( 'Pick a color', 'volley-core' ),
					),
				),
				'dependency'  => array(
					'element' => 'color_type',
					'value' => 'multi_color',
				),
				'group' => esc_html__( 'Particles Options', 'volley-core'),
				'edit_field_class' => 'vc_col-sm-6',
			),
			array(
				'type'        => 'colorpicker',
				'param_name'  => 'color',
				'heading'     => esc_html__( 'Color', 'volley-core' ),
				'description' => esc_html__( 'Pick a color', 'volley-core' ),
				'dependency'  => array(
					'element' => 'color_type',
					'value' => 'single_color',	
				),
				'group' => esc_html__( 'Particles Options', 'volley-core'),
				'edit_field_class' => 'vc_col-sm-6',			
			),
			
			array(
				'type' => 'dropdown_multi',
				'param_name' => 'shape_type',
				'heading' => esc_html__( 'Shape type', 'volley-core' ),
				'description' => esc_html__( 'Select a shape type', 'volley-core' ),
				'value' => array(
					esc_html__( 'Circle', 'volley-core' )   => 'circle',
					esc_html__( 'Edge', 'volley-core' )     => 'edge',
					esc_html__( 'Triangle', 'volley-core' ) => 'triangle',
					esc_html__( 'Polygon', 'volley-core' )  => 'polygon',
					esc_html__( 'Star', 'volley-core' )     => 'star',
					esc_html__( 'Image', 'volley-core' )    => 'image',
				),	
				'group'       => esc_html__( 'Particles Options', 'volley-core'),
				'edit_field_class' => 'vc_col-sm-6',
			),
			array(
				'type'        => 'textfield',
				'param_name'  => 'stroke_width',
				'heading'     => esc_html__( 'Stroke Width', 'volley-core' ),
				'description' => esc_html__( 'Add stroke width, for ex 2.', 'volley-core' ),
				'group'       => esc_html__( 'Particles Options', 'volley-core'),
				'edit_field_class' => 'vc_col-sm-6',				
			),
			array(
				'type'        => 'colorpicker',
				'param_name'  => 'stroke_color',
				'heading'     => esc_html__( 'Stroke color', 'volley-core' ),
				'description' => esc_html__( 'Pick stroke color', 'volley-core' ),
				'group'       => esc_html__( 'Particles Options', 'volley-core'),
				'edit_field_class' => 'vc_col-sm-6',				
			),
			array(
				'type'        => 'textfield',
				'param_name'  => 'nb_sides',
				'heading'     => esc_html__( 'Polygon Number Sides', 'volley-core' ),
				'description' => esc_html__( 'Add polygons number sides', 'volley-core' ),
				'dependency' => array(
					'element' => 'shape_type',
					'value' => 'polygon'	
				),
				'group'       => esc_html__( 'Particles Options', 'volley-core'),
				'edit_field_class' => 'vc_col-sm-6',				
			),
			array(
				'type'       => 'themethreads_attach_image',
				'param_name' => 'image',
				'heading'    => esc_html__( 'Image', 'volley-core' ),
				'descripton' => esc_html__( 'Add image from gallery or upload new', 'volley-core' ),
				'dependency' => array(
					'element' => 'shape_type',
					'value' => 'image'
				),
				'group'       => esc_html__( 'Particles Options', 'volley-core'),
			),
			array(
				'type'        => 'textfield',
				'param_name'  => 'image_width',
				'heading'     => esc_html__( 'Image Width', 'volley-core' ),
				'description' => esc_html__( 'Add image width', 'volley-core' ),
				'dependency' => array(
					'element' => 'shape_type',
					'value' => 'image'	
				),
				'group'       => esc_html__( 'Particles Options', 'volley-core'),
				'edit_field_class' => 'vc_col-sm-6',				
			),
			array(
				'type'        => 'textfield',
				'param_name'  => 'image_height',
				'heading'     => esc_html__( 'Image Height', 'volley-core' ),
				'description' => esc_html__( 'Add image height', 'volley-core' ),
				'dependency' => array(
					'element' => 'shape_type',
					'value' => 'image'	
				),
				'group'       => esc_html__( 'Particles Options', 'volley-core'),
				'edit_field_class' => 'vc_col-sm-6',
			),
			
			//Opacity
			array(
				'type'        => 'themethreads_slider',
				'param_name'  => 'opacity',
				'heading'     => esc_html__( 'Opacity', 'volley-core' ),
				'description' => esc_html__( 'Set Opacity for particles', 'volley-core' ),
				'min'         => 0,
				'max'         => 1,
				'step'        => 0.05,
				'std'         => 1,
				'group'       => esc_html__( 'Particles Options', 'volley-core'),
			),
			array(
				'type' => 'checkbox',
				'param_name' => 'enable_random_opacity',
				'heading' => esc_html__( 'Enable Random Opacity', 'volley-core' ),
				'value' => array( esc_html__( 'Yes', 'volley-core' ) => 'yes' ),
				'group'       => esc_html__( 'Particles Options', 'volley-core'),
				'edit_field_class' => 'vc_col-sm-6',
			),
			array(
				'type'       => 'checkbox',
				'param_name' => 'enable_anim_opacity',
				'heading'    => esc_html__( 'Enable Animation Opacity', 'volley-core' ),
				'value'      => array( esc_html__( 'Yes', 'volley-core' ) => 'yes' ),
				'group'      => esc_html__( 'Particles Options', 'volley-core'),
				'edit_field_class' => 'vc_col-sm-6',
			),
			array(
				'type' => 'textfield',
				'param_name' => 'anim_opacity_speed',
				'heading' => esc_html__( 'Speed', 'volley-core' ),
				'description' => esc_html__( 'Speed of the opacity animation. for ex 3', 'volley-core' ),
				'dependency' => array(
					'element' => 'enable_anim_opacity',
					'value' => 'yes'	
				),
				'group'      => esc_html__( 'Particles Options', 'volley-core'),
				'edit_field_class' => 'vc_col-sm-6',
			),
			array(
				'type'        => 'themethreads_slider',
				'param_name'  => 'anim_opacity_min',
				'heading'     => esc_html__( 'Min opacity', 'volley-core' ),
				'description' => esc_html__( 'Set min opacity for animation', 'volley-core' ),
				'min'         => 0,
				'max'         => 1,
				'step'        => 0.05,
				'dependency' => array(
					'element' => 'enable_anim_opacity',
					'value' => 'yes'	
				),
				'group'      => esc_html__( 'Particles Options', 'volley-core'),
				'edit_field_class' => 'vc_col-sm-6',
			),
			array(
				'type'       => 'checkbox',
				'param_name' => 'enable_anim_sync',
				'heading'    => esc_html__( 'Enable Animation Sync', 'volley-core' ),
				'value'      => array( esc_html__( 'Yes', 'volley-core' ) => 'yes' ),
				'dependency' => array(
					'element' => 'enable_anim_opacity',
					'value' => 'yes'	
				),
				'group'      => esc_html__( 'Particles Options', 'volley-core'),
				'edit_field_class' => 'vc_col-sm-6',
			),
			
			//Size options
			array(
				'type'        => 'textfield',
				'param_name'  => 'size',
				'heading'     => esc_html__( 'Size', 'volley-core' ),
				'description' => esc_html__( 'Set size for particles, for ex 20', 'volley-core' ),
				'group'       => esc_html__( 'Particles Options', 'volley-core'),
				'edit_field_class' => 'vc_col-sm-6',
			),
			array(
				'type' => 'checkbox',
				'param_name' => 'enable_random_size',
				'heading' => esc_html__( 'Enable Random size', 'volley-core' ),
				'value' => array( esc_html__( 'Yes', 'volley-core' ) => 'yes' ),
				'group'       => esc_html__( 'Particles Options', 'volley-core'),
				'edit_field_class' => 'vc_col-sm-6',
			),
			array(
				'type'       => 'checkbox',
				'param_name' => 'enable_anim_size',
				'heading'    => esc_html__( 'Enable Animation size', 'volley-core' ),
				'value'      => array( esc_html__( 'Yes', 'volley-core' ) => 'yes' ),
				'group'      => esc_html__( 'Particles Options', 'volley-core'),
				'edit_field_class' => 'vc_col-sm-6',
			),
			array(
				'type' => 'textfield',
				'param_name' => 'anim_size_speed',
				'heading' => esc_html__( 'Speed', 'volley-core' ),
				'description' => esc_html__( 'Speed of the size animation. for ex 80', 'volley-core' ),
				'dependency' => array(
					'element' => 'enable_anim_size',
					'value' => 'yes'	
				),
				'group'      => esc_html__( 'Particles Options', 'volley-core'),
				'edit_field_class' => 'vc_col-sm-6',
			),
			array(
				'type'        => 'themethreads_slider',
				'param_name'  => 'anim_size_min',
				'heading'     => esc_html__( 'Min size', 'volley-core' ),
				'description' => esc_html__( 'Set min size for animation', 'volley-core' ),
				'min'         => 1,
				'max'         => 100,
				'step'        => 1,
				'dependency' => array(
					'element' => 'enable_anim_size',
					'value' => 'yes'	
				),
				'group'      => esc_html__( 'Particles Options', 'volley-core'),
			),
			array(
				'type'       => 'checkbox',
				'param_name' => 'enable_anim_size_sync',
				'heading'    => esc_html__( 'Enable Animation Sync', 'volley-core' ),
				'value'      => array( esc_html__( 'Yes', 'volley-core' ) => 'yes' ),
				'dependency' => array(
					'element' => 'enable_anim_size',
					'value' => 'yes'	
				),
				'group'      => esc_html__( 'Particles Options', 'volley-core'),
				'edit_field_class' => 'vc_col-sm-6',
			),
			
			//Line Linked
			array(
				'type'       => 'checkbox',
				'param_name' => 'enable_line_linked',
				'heading'    => esc_html__( 'Enable Linked Line', 'volley-core' ),
				'value'      => array( esc_html__( 'Yes', 'volley-core' ) => 'yes' ),
				'group'      => esc_html__( 'Particles Options', 'volley-core'),
			),
			array(
				'type'        => 'textfield',
				'param_name'  => 'line_distance',
				'heading'     => esc_html__( 'Distance', 'volley-core' ),
				'description' => esc_html__( 'Add distance for linked line, for ex. 300', 'volley-core' ),
				'dependency'  => array(
					'element' => 'enable_line_linked',
					'value' => 'yes',	
				),
				'group'       => esc_html__( 'Particles Options', 'volley-core'),
				'edit_field_class' => 'vc_col-sm-6',				
			),
			array(
				'type'        => 'colorpicker',
				'param_name'  => 'line_color',
				'heading'     => esc_html__( 'Line color', 'volley-core' ),
				'description' => esc_html__( 'Pick line color', 'volley-core' ),
				'group'       => esc_html__( 'Particles Options', 'volley-core'),
				'dependency'  => array(
					'element' => 'enable_line_linked',
					'value' => 'yes',	
				),
				'edit_field_class' => 'vc_col-sm-6',				
			),
			array(
				'type'        => 'themethreads_slider',
				'param_name'  => 'line_opacity',
				'heading'     => esc_html__( 'Line Opacity', 'volley-core' ),
				'description' => esc_html__( 'Set Line opacity', 'volley-core' ),
				'min'         => 0,
				'max'         => 1,
				'step'        => 0.05,
				'std'         => 1,
				'dependency'  => array(
					'element' => 'enable_line_linked',
					'value' => 'yes',	
				),
				'group'       => esc_html__( 'Particles Options', 'volley-core'),
				'edit_field_class' => 'vc_col-sm-6',
			),
			array(
				'type'        => 'textfield',
				'param_name'  => 'line_width',
				'heading'     => esc_html__( 'Line Width', 'volley-core' ),
				'description' => esc_html__( 'Add line width, for ex 2', 'volley-core' ),
				'dependency'  => array(
					'element' => 'enable_line_linked',
					'value' => 'yes',	
				),
				'group'       => esc_html__( 'Particles Options', 'volley-core'),
				'edit_field_class' => 'vc_col-sm-6',				
			),
			
			//Move
			array(
				'type'       => 'checkbox',
				'param_name' => 'enable_move',
				'heading'    => esc_html__( 'Enable Move', 'volley-core' ),
				'value'      => array( esc_html__( 'Yes', 'volley-core' ) => 'yes' ),
				'group'      => esc_html__( 'Particles Options', 'volley-core'),
			),
			array(
				'type'        => 'textfield',
				'param_name'  => 'move_speed',
				'heading'     => esc_html__( 'Speed', 'volley-core' ),
				'description' => esc_html__( 'Add speed number, for ex. 12', 'volley-core' ),
				'dependency'  => array(
					'element' => 'enable_move',
					'value' => 'yes',
				),
				'group'       => esc_html__( 'Particles Options', 'volley-core'),
				'edit_field_class' => 'vc_col-sm-6',
			),
			array(
				'type' => 'dropdown',
				'param_name' => 'move_direction',
				'heading' => esc_html__( 'Direction', 'volley-core' ),
				'description' => esc_html__( 'Select a direction to move', 'volley-core' ),
				'value' => array(
					esc_html__( 'None', 'volley-core' )         => 'none',
					esc_html__( 'Top', 'volley-core' )          => 'top',
					esc_html__( 'Top Right', 'volley-core' )    => 'top-right',
					esc_html__( 'Right', 'volley-core' )        => 'right',
					esc_html__( 'Bottom Right', 'volley-core' ) => 'bottom-right',
					esc_html__( 'Bottom', 'volley-core' )       => 'bottom',
					esc_html__( 'Bottom Left', 'volley-core' )  => 'bottom-left',
					esc_html__( 'Left', 'volley-core' )         => 'left',
					esc_html__( 'Top Left', 'volley-core' )     => 'top-left',
				),
				'dependency'  => array(
					'element' => 'enable_move',
					'value' => 'yes',
				),
				'group'       => esc_html__( 'Particles Options', 'volley-core'),
				'edit_field_class' => 'vc_col-sm-6',
			),
			array(
				'type'       => 'checkbox',
				'param_name' => 'enable_random_move',
				'heading'    => esc_html__( 'Enable Random Move', 'volley-core' ),
				'value'      => array( esc_html__( 'Yes', 'volley-core' ) => 'yes' ),
				'dependency'  => array(
					'element' => 'enable_move',
					'value' => 'yes',
				),
				'group'       => esc_html__( 'Particles Options', 'volley-core'),
				'edit_field_class' => 'vc_col-sm-6',
			),
			array(
				'type'       => 'checkbox',
				'param_name' => 'enable_straight_move',
				'heading'    => esc_html__( 'Enable Straight Move', 'volley-core' ),
				'value'      => array( esc_html__( 'Yes', 'volley-core' ) => 'yes' ),
				'dependency'  => array(
					'element' => 'enable_move',
					'value' => 'yes',
				),
				'group' => esc_html__( 'Particles Options', 'volley-core'),
				'edit_field_class' => 'vc_col-sm-6',
			),
			array(
				'type' => 'dropdown',
				'param_name' => 'move_out_mode',
				'heading' => esc_html__( 'Out Mode', 'volley-core' ),
				'description' => esc_html__( 'Select an out of canvas mode', 'volley-core' ),
				'value' => array(
					esc_html__( 'Out', 'volley-core' )    => 'out',
					esc_html__( 'Bounce', 'volley-core' ) => 'bounce',
				),
				'dependency'  => array(
					'element' => 'enable_move',
					'value' => 'yes',
				),
				'group'       => esc_html__( 'Particles Options', 'volley-core'),
				'edit_field_class' => 'vc_col-sm-6',
			),
			array(
				'type'       => 'checkbox',
				'param_name' => 'enable_bounce_move',
				'heading'    => esc_html__( 'Enable Bounce', 'volley-core' ),
				'description' => esc_html__( 'Enable bounce between particles', 'volley-core' ),
				'value'      => array( esc_html__( 'Yes', 'volley-core' ) => 'yes' ),
				'dependency'  => array(
					'element' => 'enable_move',
					'value' => 'yes',
				),
				'group'       => esc_html__( 'Particles Options', 'volley-core'),
				'edit_field_class' => 'vc_col-sm-6',
			),
			array(
				'type'       => 'checkbox',
				'param_name' => 'enable_attract_move',
				'heading'    => esc_html__( 'Enable Attract', 'volley-core' ),
				'description' => esc_html__( 'Enable attract between particles', 'volley-core' ),
				'value'      => array( esc_html__( 'Yes', 'volley-core' ) => 'yes' ),
				'dependency'  => array(
					'element' => 'enable_move',
					'value' => 'yes',
				),
				'group'       => esc_html__( 'Particles Options', 'volley-core'),
			),
			array(
				'type'        => 'textfield',
				'param_name'  => 'move_attract_rotatex',
				'heading'     => esc_html__( 'Attract Rotate X', 'volley-core' ),
				'description' => esc_html__( 'Add rotate X number, for ex. 3000', 'volley-core' ),
				'dependency'  => array(
					'element' => 'enable_attract_move',
					'value' => 'yes',
				),
				'group'       => esc_html__( 'Particles Options', 'volley-core'),
				'edit_field_class' => 'vc_col-sm-6',
			),
			array(
				'type'        => 'textfield',
				'param_name'  => 'move_attract_rotatey',
				'heading'     => esc_html__( 'Attract Rotate Y', 'volley-core' ),
				'description' => esc_html__( 'Add rotate Y number, for ex. 1500', 'volley-core' ),
				'dependency'  => array(
					'element' => 'enable_attract_move',
					'value' => 'yes',
				),
				'group'       => esc_html__( 'Particles Options', 'volley-core'),
				'edit_field_class' => 'vc_col-sm-6',
			),
			

			//interactivity:
			array(
				'type'       => 'subheading',
				'param_name' => 'sh_styling',
				'heading'    => esc_html__( 'Interactivity', 'volley-core' ),
				'group'      => esc_html__( 'Particles Options', 'volley-core'),
			),

			array(
				'type'       => 'dropdown',
				'param_name' => 'detect_on',
				'heading'    => esc_html__( 'Detect on', 'volley-core' ),
				'value'      => array(
					esc_html__( 'None', 'volley-core' ) => '',
					esc_html__( 'Canvas', 'volley-core' ) => 'canvas',
					esc_html__( 'Window', 'volley-core' ) => 'window',
				),
				'group'       => esc_html__( 'Particles Options', 'volley-core'),
			),
			array(
				'type'        => 'checkbox',
				'param_name'  => 'enable_onhover',
				'heading'     => esc_html__( 'Enable onhover events', 'volley-core' ),
				'description' => esc_html__( 'Enable interactivity onhover events', 'volley-core' ),
				'value'       => array( esc_html__( 'Yes', 'volley-core' ) => 'yes' ),
				'group'       => esc_html__( 'Particles Options', 'volley-core'),
				'edit_field_class' => 'vc_col-sm-6',
			),
			array(
				'type'       => 'dropdown_multi',
				'param_name' => 'onhover_mode',
				'heading'    => esc_html__( 'Onhover mode', 'volley-core' ),
				'value'      => array(
					esc_html__( 'Grab', 'volley-core' ) => 'grab',
					esc_html__( 'Bubble', 'volley-core' ) => 'bubble',
					esc_html__( 'Repulse', 'volley-core' ) => 'repulse',
				),
				'dependency'  => array(
					'element' => 'enable_onhover',
					'value' => 'yes',
				),
				'group'       => esc_html__( 'Particles Options', 'volley-core'),
				'edit_field_class' => 'vc_col-sm-6',
			),
			array(
				'type'        => 'checkbox',
				'param_name'  => 'enable_onclick',
				'heading'     => esc_html__( 'Enable onclick events', 'volley-core' ),
				'description' => esc_html__( 'Enable interactivity onclick events', 'volley-core' ),
				'value'       => array( esc_html__( 'Yes', 'volley-core' ) => 'yes' ),
				'group'       => esc_html__( 'Particles Options', 'volley-core'),
				'edit_field_class' => 'vc_col-sm-6',
			),
			array(
				'type'       => 'dropdown_multi',
				'param_name' => 'onclick_mode',
				'heading'    => esc_html__( 'Onclick mode', 'volley-core' ),
				'value'      => array(
					esc_html__( 'Push', 'volley-core' ) => 'push',
					esc_html__( 'Remove', 'volley-core' ) => 'remove',
					esc_html__( 'Bubble', 'volley-core' ) => 'bubble',
					esc_html__( 'Repulse', 'volley-core' ) => 'repulse',					
				),
				'dependency'  => array(
					'element' => 'enable_onclick',
					'value' => 'yes',
				),
				'group'       => esc_html__( 'Particles Options', 'volley-core'),
				'edit_field_class' => 'vc_col-sm-6',
			),
			array(
				'type'        => 'checkbox',
				'param_name'  => 'enable_inter_resize',
				'heading'     => esc_html__( 'Enable resize', 'volley-core' ),
				'description' => esc_html__( 'Enable interactivity resize', 'volley-core' ),
				'value'       => array( esc_html__( 'Yes', 'volley-core' ) => 'yes' ),
				'group'       => esc_html__( 'Particles Options', 'volley-core'),
			),
			array(
				'type' => 'textfield',
				'param_name' => 'modes_grab_distance',
				'heading' => esc_html__( 'Grab Distance', 'volley-core' ),
				'description' => esc_html__( 'Add a number for grab distance, for ex. 100', 'volley-core' ),
				'group'       => esc_html__( 'Particles Options', 'volley-core'),
				'edit_field_class' => 'vc_col-sm-6',
			),
			array(
				'type'        => 'themethreads_slider',
				'param_name'  => 'modes_grab_opacity',
				'heading'     => esc_html__( 'Grab Line Opacity', 'volley-core' ),
				'description' => esc_html__( 'Set Line opacity', 'volley-core' ),
				'min'         => 0,
				'max'         => 1,
				'step'        => 0.05,
				'std'         => 1,
				'group'       => esc_html__( 'Particles Options', 'volley-core'),
				'edit_field_class' => 'vc_col-sm-6',
			),
			array(
				'type' => 'textfield',
				'param_name' => 'modes_bubble_distance',
				'heading' => esc_html__( 'Bubble Distance', 'volley-core' ),
				'description' => esc_html__( 'Add a number for bubble distance, for ex. 100', 'volley-core' ),
				'group'       => esc_html__( 'Particles Options', 'volley-core'),
				'edit_field_class' => 'vc_col-sm-4',
			),
			array(
				'type' => 'textfield',
				'param_name' => 'modes_bubble_size',
				'heading' => esc_html__( 'Bubble Size', 'volley-core' ),
				'description' => esc_html__( 'Add a number for bubble size, for ex. 40', 'volley-core' ),
				'group'       => esc_html__( 'Particles Options', 'volley-core'),
				'edit_field_class' => 'vc_col-sm-4',
			),
			array(
				'type' => 'textfield',
				'param_name' => 'modes_bubble_duration',
				'heading' => esc_html__( 'Bubble Duration', 'volley-core' ),
				'description' => esc_html__( 'Add a number(second) for bubble duration, for ex. 0.4', 'volley-core' ),
				'group'       => esc_html__( 'Particles Options', 'volley-core'),
				'edit_field_class' => 'vc_col-sm-4',
			),
			array(
				'type' => 'textfield',
				'param_name' => 'modes_repulse_distance',
				'heading' => esc_html__( 'Repulse Distance', 'volley-core' ),
				'description' => esc_html__( 'Add a number for repulse distance, for ex. 200', 'volley-core' ),
				'group'       => esc_html__( 'Particles Options', 'volley-core'),
				'edit_field_class' => 'vc_col-sm-6',
			),
			array(
				'type' => 'textfield',
				'param_name' => 'modes_repulse_duration',
				'heading' => esc_html__( 'Repulse Duration', 'volley-core' ),
				'description' => esc_html__( 'Add a number(second) for bubble duration, for ex. 1.2', 'volley-core' ),
				'group'       => esc_html__( 'Particles Options', 'volley-core'),
				'edit_field_class' => 'vc_col-sm-6',
			),
			array(
				'type' => 'textfield',
				'param_name' => 'modes_push_particles_nb',
				'heading' => esc_html__( 'Push particles number', 'volley-core' ),
				'description' => esc_html__( 'Add a number to puch particles, for ex. 4', 'volley-core' ),
				'group'       => esc_html__( 'Particles Options', 'volley-core'),
				'edit_field_class' => 'vc_col-sm-6',
			),
			array(
				'type' => 'textfield',
				'param_name' => 'modes_remove_particles_nb',
				'heading' => esc_html__( 'Remove particles number', 'volley-core' ),
				'description' => esc_html__( 'Add a number to remove particles, for ex. 4', 'volley-core' ),
				'group'       => esc_html__( 'Particles Options', 'volley-core'),
				'edit_field_class' => 'vc_col-sm-6',
			),

			//retina:
			array(
				'type'       => 'subheading',
				'param_name' => 'sh_styling',
				'heading'    => esc_html__( 'Retina', 'volley-core' ),
				'group'      => esc_html__( 'Particles Options', 'volley-core'),
			),
			array(
				'type'       => 'checkbox',
				'param_name' => 'retina_detect',
				'heading'    => esc_html__( 'Retina Detect', 'volley-core' ),
				'value'      => array( esc_html__( 'Yes', 'volley-core' ) => 'yes' ),
				'group'      => esc_html__( 'Particles Options', 'volley-core'),
			),

		);

		$this->add_extras();
	}

	protected function get_image( $img ) {

		if ( empty( $img ) ) {
			return;
		}
		
		if( preg_match( '/^\d+$/', $img ) ){
			$image  = wp_get_attachment_image_src( $img, 'full' );
			$image = sprintf( '<img src="%s" alt="Particles" />', $image[0] );
		} else {
			$image = sprintf( '<img src="%s" alt="Particles" />', esc_url( $img ) );
		}

		return $image;
	}
	
	protected function get_items() {
		
		extract( $this->atts );
		
		$out = '';
		$opts = $this->get_options();
		
		$the_ID = isset( $particle_id ) ? $particle_id : '';

		printf( '<div class="ld-particles-inner" id="%s" data-particles="true" %s></div>', $the_ID, $opts  );

	}
	
	protected function get_options() {
		
		extract( $this->atts );
		
		$data = '';
		$options = $particle_opts = $interactivity_opts = $number_opts = $shape_opts = $stroke_opts = $image_opts = $opacity_opts = $opacity_anim_opts = $size_opts = $size_anim_opts = $line_linked_opts = $move_opts = $move_attract_opts = $onohver_opts = $events_opts = $onclick_opts = $modes_opts = $bubble_opts = $repulse_opts = $density_opts = array();
		
		if( !empty( $number ) ) {
			$number_opts['value'] = (int)$number;
		}
		if( $enable_density ) {
			$density_opts['enable'] = true;
		}
		if( !empty( $density ) ) {
			$density_opts['value_area'] = $density;
		}
		if( !empty( $density_opts ) ) {
			$number_opts['density'] = (int)$density_opts;
		}
		//Number of elements
		if( !empty( $number_opts ) ) {
			$particle_opts['number'] = $number_opts;
		}
		//Background Color
		if( 'single_color' === $color_type ) {
			if( !empty( $color ) ) {
				$particle_opts['color'] = array( 'value' => $color );
			}
		}
		elseif( 'multi_color' === $color_type ) {
			$colors = array();
			$color_arr = vc_param_group_parse_atts( $multi_color_values );
			foreach ( $color_arr as $color ) {
				$colors[] = $color['scolor'];
			}
			$particle_opts['color'] = array( 'value' => $colors );
		}
		else {
			$particle_opts['color'] = array( 'value' => 'random' );	
		}
		
		//Shape options
		if( !empty( $shape_type ) ) {
			$shape_arr = explode( ',', $shape_type );
			$shape_opts['type'] = $shape_arr;
		}
		if( !empty( $stroke_width ) ) {
			$stroke_opts['width'] = (int)$stroke_width;	
		}
		if( !empty( $stroke_color ) ) {
			$stroke_opts['color'] = $stroke_color;	
		}
		if( !empty( $stroke_opts ) ) {
			$shape_opts['stroke'] = $stroke_opts;
		}
		if( !empty( $nb_sides ) ) {
			$shape_opts['polygon'] = array( 'nb_sides' => (int)$nb_sides );
		}
		if( !empty( $image ) ) {
			$url = wp_get_attachment_image_url( $image, 'full', false );
			$image_opts['src'] = esc_url( $url );
		}
		if( !empty( $image_width ) ) {
			$image_opts['width'] = (int)$image_width;
		}
		if( !empty( $image_height ) ) {
			$image_opts['height'] = (int)$image_height;
		}
		if( !empty( $image_opts ) ) {
			$shape_opts['image'] = $image_opts;
		}
		if( !empty( $shape_opts ) ) {
			$particle_opts['shape'] = $shape_opts;
		}
		
		//Opacity values
		if( '1' !== $opacity ) {
			$opacity_opts['value'] = (float)$opacity;
		}
		if( $enable_random_opacity ) {
			$opacity_opts['random'] = true;
		}
		if( $enable_anim_opacity ) {
			$opacity_anim_opts['enable'] = true;
			$opacity_anim_opts['opacity_min'] = (float)$anim_opacity_min;
		}
		if( !empty( $anim_opacity_speed ) ) {
			$opacity_anim_opts['speed'] = (int)$anim_opacity_speed;
		}
		if( $enable_anim_opacity ) {
			$opacity_anim_opts['sync'] = true;
		}
		if( !empty( $opacity_anim_opts ) ) {
			$opacity_opts['anim'] = $opacity_anim_opts;
		}
		if( !empty( $opacity_opts ) ) {
			$particle_opts['opacity'] = $opacity_opts;
		}
		
		//Size values
		if( !empty( $size ) ) {
			$size_opts['value'] = (int)$size;
		}
		if( $enable_random_size ) {
			$size_opts['random'] = true;
		}
		if( $enable_anim_size ) {
			$size_anim_opts['enable'] = true;
			$size_anim_opts['size_min'] = (float)$anim_size_min;
		}
		if( !empty( $anim_size_speed ) ) {
			$size_anim_opts['speed'] = (int)$anim_size_speed;
		}
		if( $enable_anim_size_sync ) {
			$size_anim_opts['sync'] = true;
		}
		if( !empty( $size_anim_opts ) ) {
			$size_opts['anim'] = $size_anim_opts;
		}
		if( !empty( $size_opts ) ) {
			$particle_opts['size'] = $size_opts;
		}
		
		//Linked line
		if( $enable_line_linked ) {
			$line_linked_opts['enable'] = true;
			$line_linked_opts['opacity'] = (float)$line_opacity;
		}
		if( !empty( $line_distance ) ) {
			$line_linked_opts['distance'] = (int)$line_distance;
		}
		if( !empty( $line_color ) ) {
			$line_linked_opts['color'] = $line_color;
		}
		if( !empty( $line_width ) ) {
			$line_linked_opts['width'] = (int)$line_width;
		}
		
		if( !empty( $line_linked_opts ) ) {
			$particle_opts['line_linked'] = $line_linked_opts;
		}
		
		//Move values
		if( $enable_move ) {
			$move_opts['enable'] = true;
			$move_opts['direction'] = $move_direction;
		}
		if( !empty( $move_speed ) ) {
			$move_opts['speed'] = (int)$move_speed;
		}
		if( $enable_random_move ) {
			$move_opts['random'] = true;
		}
		if( $enable_straight_move ) {
			$move_opts['straight'] = true;
		}
		if( isset( $move_out_mode ) ) {
			$move_opts['out_mode'] = $move_out_mode;	
		}
		if( $enable_bounce_move ) {
			$move_opts['bounce'] = true;
		}
		if( $enable_attract_move ) {
			$move_attract_opts['enable'] = true;
		}
		if( !empty( $move_attract_rotatex ) ) {
			$move_attract_opts['rotateX'] = (int)$move_attract_rotatex;
		}
		if( !empty( $move_attract_rotatey ) ) {
			$move_attract_opts['rotateY'] = (int)$move_attract_rotatey;
		}
		if( !empty( $move_attract_opts ) ) {
			$move_opts['attract'] = $move_attract_opts;
		}
		
		
		if( !empty( $move_opts ) ) {
			$particle_opts['move'] = $move_opts;
		}

		$options['particles']     = $particle_opts;
		
		if( !empty( $detect_on ) ) {
			$interactivity_opts['detect_on'] = $detect_on;
		}
		
		if( $enable_onhover ) {
			$onhover_arr = explode( ',', $onhover_mode );
			$events_opts['onhover'] = array( 'enable' => true, 'mode' => $onhover_arr );
		}
		if( $enable_onclick ) {
			$onclick_arr = explode( ',', $onclick_mode );
			$events_opts['onclick'] = array( 'enable' => true, 'mode' => $onclick_arr );
		}
		if( $enable_inter_resize ) {
			$events_opts['resize'] = true;
		}
		if( !empty( $events_opts ) ) {
			$interactivity_opts['events'] = $events_opts;
		}
		
		
		if( !empty( $modes_grab_distance ) ) {
			$modes_opts['grab'] = array( 'distance' => (int)$modes_grab_distance, 'line_linked' => array( 'opacity' => $modes_grab_opacity ) );
		}
		
		if( !empty( $modes_bubble_distance ) ) {
			$bubble_opts['distance'] = (int)$modes_bubble_distance;
		}
		if( !empty( $modes_bubble_size ) ) {
			$bubble_opts['size'] = (int)$modes_bubble_size;
		}
		if( !empty( $modes_bubble_duration ) ) {
			$bubble_opts['duration'] = (float)$modes_bubble_duration;
		}
		if( !empty( $bubble_opts ) ) {
			$modes_opts['bubble'] = $bubble_opts;
		}


		if( !empty( $modes_repulse_distance ) ) {
			$repulse_opts['distance'] = (int)$modes_repulse_distance;	
		}
		if( !empty( $modes_repulse_duration ) ) {
			$repulse_opts['duration'] = (float)$modes_repulse_duration;
		}
		if( !empty( $repulse_opts ) ) {
			$modes_opts['repulse'] = $repulse_opts;
		}


		
		if( !empty( $modes_push_particles_nb ) ) {
			$modes_opts['push'] = array( 'particles_nb' => (int)$modes_push_particles_nb );
		}
		if( !empty( $modes_remove_particles_nb ) ) {
			$modes_opts['remove'] = array( 'particles_nb' => (int)$modes_remove_particles_nb );
		}
		if( !empty( $modes_opts ) ) {
			$interactivity_opts['modes'] = $modes_opts;
		}
		
		$options['interactivity'] = $interactivity_opts;
		
		if( $retina_detect ) {
			$options['retina_detect'] = true;
		}

		if( $as_bg ) {
			$options['asBG'] = true;
		}
		
		if( !empty( $options ) ) {
			$data = 'data-particles-options=\'' . wp_json_encode( $options ) .'\'';	
		}
		
		
		return $data;
		
	}
	
	protected function generate_css() {

		extract( $this->atts );

		$elements = array();
		$id = '.' . $this->get_id();
		
		if( !empty( $height ) ) {
			$elements[ themethreads_implode( '%1$s' ) ]['height'] = $height . '!important';
		}
		
		if( !empty( $absolute_pos ) ) {
			$elements[ themethreads_implode( '%1$s' ) ]['position'] = 'absolute';
		}	
		
		$responsive_pos = ThemeThreads_Responsive_Param::generate_css( 'position', $position, $this->get_id() );
		$elements['media']['position'] = $responsive_pos;
		
		$this->dynamic_css_parser( $id, $elements );
	}

}
new LD_Particles;