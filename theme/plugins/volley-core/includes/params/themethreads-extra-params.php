<?php
// New Params for Row

function themethreads_row_extras() {

	vc_remove_param( 'vc_row', 'css' );
	vc_remove_param( 'vc_row', 'parallax_image' );
	vc_remove_param( 'vc_row', 'parallax_speed_bg' );
	
	vc_update_shortcode_param( 'vc_row', array(
			'type'       => 'dropdown',
			'heading'    => esc_html__( 'Row stretch', 'volley-core' ),
			'param_name' => 'full_width',
			'value'      => array(
				esc_html__( 'Default', 'volley-core' ) => '',
				esc_html__( 'Stretch row and content', 'volley-core' ) => 'stretch_row'
			),
			'description' => esc_html__( 'Select stretching options for row and content (Note: stretched may not work properly if parent container has "overflow: hidden" CSS property).', 'volley-core' ),
			'weight'      => 1,
		)
	);
	vc_update_shortcode_param( 'vc_row', array(
			'type'       => 'dropdown',
			'heading'    => esc_html__( 'Columns gap', 'volley-core' ),
			'param_name' => 'gap',
			'value' => array(
				'0px' => '0',
				'1px' => '1',
				'2px' => '2',
				'3px' => '3',
				'4px' => '4',
				'5px' => '5',
				'10px' => '10',
				'15px' => '15',
				'20px' => '20',
				'25px' => '25',
				'30px' => '30',
				'35px' => '35',
			),
			'std'         => '15',
			'description' => esc_html__( 'Select gap between columns in row.', 'volley-core' ),
			'weight'      => 1,
		)
	);
	vc_update_shortcode_param( 'vc_row_inner', array(
			'type'       => 'dropdown',
			'heading'    => esc_html__( 'Columns gap', 'volley-core' ),
			'param_name' => 'gap',
			'value' => array(
				'0px' => '0',
				'1px' => '1',
				'2px' => '2',
				'3px' => '3',
				'4px' => '4',
				'5px' => '5',
				'10px' => '10',
				'15px' => '15',
				'20px' => '20',
				'25px' => '25',
				'30px' => '30',
				'35px' => '35',
			),
			'std'         => '15',
			'description' => esc_html__( 'Select gap between columns in row.', 'volley-core' ),
		)
	);
	vc_update_shortcode_param( 'vc_row', array(
			'type'        => 'checkbox',
			'heading'     => esc_html__( 'Full height row?', 'volley-core' ),
			'param_name'  => 'full_height',
			'description' => esc_html__( 'If checked row will be set to full height.', 'volley-core' ),
			'value'       => array( esc_html__( 'Yes', 'volley-core' ) => 'yes' ),
			'weight'      => 1,
		)
	);
	vc_update_shortcode_param( 'vc_row', array(
			'type'       => 'dropdown',
			'heading'    => esc_html__( 'Columns position', 'volley-core' ),
			'param_name' => 'columns_placement',
			'value'      => array(
				esc_html__( 'Middle', 'volley-core' )  => 'middle',
				esc_html__( 'Top', 'volley-core' )     => 'top',
				esc_html__( 'Bottom', 'volley-core' )  => 'bottom',
				esc_html__( 'Stretch', 'volley-core' ) => 'stretch',
			),
			'description' => esc_html__( 'Select columns position within row.', 'volley-core' ),
			'dependency'  => array(
				'element' => 'full_height',
				'not_empty' => true,
			),
			'weight' => 1,
		)
	);
	vc_update_shortcode_param( 'vc_row', array(
			'type'        => 'checkbox',
			'heading'     => esc_html__( 'Equal height', 'volley-core' ),
			'param_name'  => 'equal_height',
			'description' => esc_html__( 'If checked columns will be set to equal height.', 'volley-core' ),
			'value'       => array( esc_html__( 'Yes', 'volley-core' ) => 'yes' ),
			'weight'      => 1,
		)
	);	
	vc_update_shortcode_param( 'vc_row', array(
			'type'       => 'dropdown',
			'heading'    => esc_html__( 'Content position', 'volley-core' ),
			'param_name' => 'content_placement',
			'value'      => array(
				esc_html__( 'Default', 'volley-core' ) => '',
				esc_html__( 'Top', 'volley-core' ) => 'top',
				esc_html__( 'Middle', 'volley-core' ) => 'middle',
				esc_html__( 'Bottom', 'volley-core' ) => 'bottom',
			),
			'description' => esc_html__( 'Select content position within columns.', 'volley-core' ),
			'weight'      => 1,
		)
	);
	vc_add_params( 'vc_row', array(
			array(
				'type'         => 'checkbox',
				'param_name'   => 'sticky_row',
				'heading'      => esc_html__( 'Sticky Row', 'volley-core' ),
				'description'  => esc_html__( 'Enable to make this row sticky', 'volley-core' ),
				'value'        => array( esc_html__( 'Yes', 'volley-core' ) => 'yes' ),
				'weight'       => 1,
			)		
		) 
	);
	vc_add_params( 'vc_row', array(
			array(
				'type'         => 'checkbox',
				'param_name'   => 'fade_scroll',
				'heading'      => esc_html__( 'Fade on scroll', 'volley-core' ),
				'description'  => esc_html__( 'Enable to make this row to fade on scroll', 'volley-core' ),
				'value'        => array( esc_html__( 'Yes', 'volley-core' ) => 'yes' ),
				'weight'       => 1,
			)		
		) 
	);
	vc_update_shortcode_param( 'vc_row', array(
			'type'        => 'checkbox',
			'heading'     => esc_html__( 'Use video background?', 'volley-core' ),
			'param_name'  => 'video_bg',
			'description' => esc_html__( 'If checked, video will be used as row background.', 'volley-core' ),
			'value'       => array( esc_html__( 'Yes', 'volley-core' ) => 'yes' ),
			'weight'      => 1,
		)
	);

	vc_add_params( 'vc_row', array(
			array(
				'type'        => 'checkbox',
				'heading'     => esc_html__( 'Disable Video Background for Mobile ', 'volley-core' ),
				'param_name'  => 'mobile_video_bg',
				'description' => esc_html__( 'If checked, video will be disabled for mobile devices', 'volley-core' ),
				'value'       => array( esc_html__( 'Yes', 'volley-core' ) => 'yes' ),
				'dependency'  => array(
					'element'   => 'video_bg',
					'not_empty' => true,
				),
				'weight'      => 1,
			),
			array(
				'type'       => 'dropdown',
				'heading'    => esc_html__( 'Video Background Source', 'volley-core' ),
				'param_name' => 'video_bg_source',
				'value'      => array(
					esc_html__( 'Local', 'volley-core' )   => 'local',
					esc_html__( 'Youtube', 'volley-core' ) => 'youtube',
				),
				'dependency'  => array(
					'element'   => 'video_bg',
					'not_empty' => true,
				),
				'weight'        => 1,
			),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'MP4 Video Path', 'volley-core' ),
				'param_name'  => 'video_local_mp4_url',
				'value'       => '',
				// default video url
				'description' => esc_html__( 'Add local video path in mp4 format', 'volley-core' ),
				'dependency'  => array(
					'element'   => 'video_bg_source',
					'value' => 'local',
				),
				'weight'        => 1,
			),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'WEBM Video Path', 'volley-core' ),
				'param_name'  => 'video_local_webm_url',
				'value'       => '',
				// default video url
				'description' => esc_html__( 'Add local video path in WEBM format', 'volley-core' ),
				'dependency'  => array(
					'element'   => 'video_bg_source',
					'value' => 'local',
				),
				'weight'        => 1,
			),

		) 
	);
	
	vc_update_shortcode_param( 'vc_row', array(
			'type'        => 'textfield',
			'heading'     => esc_html__( 'YouTube link', 'volley-core' ),
			'param_name'  => 'video_bg_url',
			'value'       => 'https://www.youtube.com/watch?v=lMJXxhRFO1k',
			// default video url
			'description' => esc_html__( 'Add YouTube link.', 'volley-core' ),
			'dependency'  => array(
				'element'   => 'video_bg_source',
				'value' => 'youtube',
			),
			'weight'        => 1,
		)
	);
	
	vc_add_params( 'vc_row', array(
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Start time', 'volley-core' ),
				'param_name'  => 'y_start_time',
				'value'       => '',
				// default video url
				'description' => esc_html__( 'Youtube video start time, for ex 0 ( in seconds )', 'volley-core' ),
				'dependency'  => array(
					'element'   => 'video_bg_source',
					'value' => 'youtube',
				),
				'edit_field_class' => 'vc_col-sm-6',
				'weight'        => 1,
			),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'End time', 'volley-core' ),
				'param_name'  => 'y_end_time',
				'value'       => '',
				// default video url
				'description' => esc_html__( 'Youtube video end time, for ex 120 ( in seconds )', 'volley-core' ),
				'dependency'  => array(
					'element'   => 'video_bg_source',
					'value' => 'youtube',
				),
				'edit_field_class' => 'vc_col-sm-6',
				'weight'        => 1,
			),

		) 
	);
	
	vc_add_params( 'vc_row', array(
			array(
				'type'         => 'checkbox',
				'param_name'   => 'sticky_bg',
				'heading'      => esc_html__( 'Sticky Background', 'volley-core' ),
				'description'  => esc_html__( 'Add background image in Design Options', 'volley-core' ),
				'value'        => array( esc_html__( 'Yes', 'volley-core' ) => 'enable_sticky_bg' ),
				'weight'       => 1,
				'dependency'  => array(
					'element'   => 'sticky_row',
					'is_empty'  => true,
				),
			)		
		) 
	);
	vc_update_shortcode_param( 'vc_row', array(
			'type'         => 'checkbox',
			'param_name'   => 'parallax',
			'heading'      => esc_html__( 'Parallax Background', 'volley-core' ),
			'description'  => esc_html__( 'Add parallax background image in Design Options', 'volley-core' ),
			'value'        => array( esc_html__( 'Yes', 'volley-core' ) => 'enable_parallax' ),
			'weight'       => 1,
			'dependency'  => array(
				'element'   => 'sticky_bg',
				'is_empty'  => true,
			),
		)
	);
	vc_add_params( 'vc_row', array(
			array(
				'type'         => 'checkbox',
				'param_name'   => 'shrink_borders',
				'heading'      => esc_html__( 'Borders Effect', 'volley-core' ),
				'description'  => esc_html__( 'Add border growing effects', 'volley-core' ),
				'value'        => array( esc_html__( 'Yes', 'volley-core' ) => 'enable_shrink_borders' ),
				'dependency'  => array(
					'element' => 'sticky_bg',
					'value'   => 'enable_sticky_bg',
				),
				'weight'       => 1,
			)		
		) 
	);
	
	$slideshow_bg_params = array(

		array(
			'type'        => 'checkbox',
			'param_name'  => 'enable_loading_bg',
			'value'       => array( esc_html__( 'Yes', 'volley-core' ) => 'yes' ),
			'heading'     => esc_html__( 'Loading effect for background?', 'volley-core' ),
			'description' => esc_html__( 'Will enable loading effect for row background', 'volley-core' ),
			'weight'      => 1,
		),
		array(
			'type'        => 'checkbox',
			'param_name'  => 'enable_slideshow_bg',
			'value'       => array( esc_html__( 'Yes', 'volley-core' ) => 'yes' ),
			'heading'     => esc_html__( 'Slideshow Background?', 'volley-core' ),
			'description' => esc_html__( 'Will enable slideshow background', 'volley-core' ),
			'weight'      => 1,
		),
		array(
			'type'        => 'textfield',
			'param_name'  => 'slideshow_delay',
			'heading'     => esc_html__( 'Slideshow Delay', 'volley-core' ),
			'description' => esc_html__( 'Add slideshow delay in milliseconds for ex. 200', 'volley-core' ),
			'edit_field_class' => 'vc_col-sm-6',
			'dependency'  => array(
				'element' => 'enable_slideshow_bg',
				'value'   => 'yes',
			),
			'weight'      => 1,	
		),
		array(
			'type'        => 'dropdown',
			'param_name'  => 'slideshow_effect',
			'heading'     => esc_html__( 'Slideshow Effect', 'volley-core' ),
			'description' => esc_html__( 'Select a slideshow effect', 'volley-core' ),
			'value'       => array(
				esc_html__( 'Fade (default)', 'volley-core' ) => '',
				esc_html__( 'Slide', 'volley-core' )   => 'slide',
				esc_html__( 'Scale', 'volley-core' )   => 'scale',
			),
			'edit_field_class' => 'vc_col-sm-6',
			'dependency'  => array(
				'element' => 'enable_slideshow_bg',
				'value'   => 'yes',
			),
			'weight'      => 1,	
		),
		array(
			'type'        => 'attach_images',
			'heading'     => esc_html__( 'Images', 'volley-core' ),
			'param_name'  => 'slideshow_images',
			'value'       => '',
			'description' => esc_html__( 'Select images from media library.', 'volley-core' ),
			'dependency'  => array(
				'element' => 'enable_slideshow_bg',
				'value'   => 'yes',
			),
			'weight'      => 1,
		),
		
	);
	
	$custom_animation_params = array(
		array(
			'type'             => 'checkbox',
			'param_name'       => 'enable_content_animation',
			'value'            => array( esc_html__( 'Yes', 'volley-core' ) => 'yes' ),
			'heading'          => esc_html__( 'Animate Columns?', 'volley-core' ),
			'description'      => esc_html__( 'Will enable animation for columns, it will be animated when it "enters" the browsers viewport (Note: works only in modern browsers).', 'volley-core' ),
			'weight' => 1,
		),

		//Custom Animation Options
		array(
			'type'        => 'textfield',
			'param_name'  => 'ca_duration',
			'heading'     => esc_html__( 'Duration', 'volley-core' ),
			'description' => esc_html__( 'Add duration of the animation in milliseconds', 'volley-core' ),
			'dependency'  => array(
				'element' => 'enable_content_animation',
				'value'   => 'yes',
			),
			'edit_field_class' => 'vc_col-sm-6 vc_column-with-padding',
			'group' => esc_html__( 'Animation', 'volley-core' ),
		),
		array(
			'type' => 'textfield',
			'param_name' => 'ca_start_delay',
			'heading' => esc_html__( 'Start Delay', 'volley-core' ),
			'description' => esc_html__( 'Add start delay of the animation in milliseconds', 'volley-core' ),
			'dependency' => array(
				'element' => 'enable_content_animation',
				'value'   => 'yes',
			),
			'edit_field_class' => 'vc_col-sm-6',
			'group' => esc_html__( 'Animation', 'volley-core' ),
		),
		array(
			'type' => 'textfield',
			'param_name' => 'ca_delay',
			'heading' => esc_html__( 'Delay', 'volley-core' ),
			'description' => esc_html__( 'Add delay of the animation between of the animated elements in milliseconds', 'volley-core' ),
			'dependency' => array(
				'element' => 'enable_content_animation',
				'value'   => 'yes',
			),
			'edit_field_class' => 'vc_col-sm-6',
			'group' => esc_html__( 'Animation', 'volley-core' ),
		),
		array(
			'type' => 'dropdown',
			'param_name' => 'ca_easing',
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
			'dependency' => array(
				'element' => 'enable_content_animation',
				'value'   => 'yes',
			),
			'edit_field_class' => 'vc_col-sm-6',
			'group' => esc_html__( 'Animation', 'volley-core' ),
		),
		array(
			'type'        => 'dropdown',
			'param_name'  => 'ca_direction',
			'heading'     => esc_html__( 'Direction', 'volley-core' ),
			'description' => esc_html__( 'Select animations direction', 'volley-core' ),
			'value' => array(
				esc_html__( 'Forward', 'volley-core' )  => 'forward',
				esc_html__( 'Backward', 'volley-core' )  => 'backward',
			),
			'dependency' => array(
				'element' => 'enable_content_animation',
				'value'   => 'yes',
			),
			'edit_field_class' => 'vc_col-sm-6',
			'group' => esc_html__( 'Animation', 'volley-core' ),
		),
		array(
			'type'        => 'subheading',
			'param_name'  => 'ca_init_values',
			'heading'     => esc_html__( 'Animate From', 'volley-core' ),
			'group' => esc_html__( 'Animation', 'volley-core' ),
			'dependency' => array(
				'element' => 'enable_content_animation',
				'value'   => 'yes',
			),
		),
		array(
			'type'        => 'themethreads_slider',
			'param_name'  => 'ca_init_translate_x',
			'heading'     => esc_html__( 'Translate X', 'volley-core' ),
			'description' => esc_html__( 'Select translate on X axe', 'volley-core' ),
			'min'         => -500,
			'max'         => 500,
			'step'        => 1,
			'group' => esc_html__( 'Animation', 'volley-core' ),
			'dependency' => array(
				'element' => 'enable_content_animation',
				'value'   => 'yes',
			),
		),
		array(
			'type'        => 'themethreads_slider',
			'param_name'  => 'ca_init_translate_y',
			'heading'     => esc_html__( 'Translate Y', 'volley-core' ),
			'description' => esc_html__( 'Select translate on Y axe', 'volley-core' ),
			'min'         => -500,
			'max'         => 500,
			'step'        => 1,
			'group' => esc_html__( 'Animation', 'volley-core' ),
			'dependency' => array(
				'element' => 'enable_content_animation',
				'value'   => 'yes',
			),
		),
		array(
			'type'        => 'themethreads_slider',
			'param_name'  => 'ca_init_translate_z',
			'heading'     => esc_html__( 'Translate Z', 'volley-core' ),
			'description' => esc_html__( 'Select translate on Z axe', 'volley-core' ),
			'min'         => -500,
			'max'         => 500,
			'step'        => 1,
			'group' => esc_html__( 'Animation', 'volley-core' ),
			'dependency' => array(
				'element' => 'enable_content_animation',
				'value'   => 'yes',
			),
		),
		array(
			'type'        => 'themethreads_slider',
			'param_name'  => 'ca_init_scale_x',
			'heading'     => esc_html__( 'Scale X', 'volley-core' ),
			'description' => esc_html__( 'Select Scale X', 'volley-core' ),
			'min'         => 0,
			'max'         => 10,
			'step'        => 0.25,
			'std'         => 1,
			'group' => esc_html__( 'Animation', 'volley-core' ),
			'dependency' => array(
				'element' => 'enable_content_animation',
				'value'   => 'yes',
			),
			'edit_field_class' => 'vc_col-sm-4',
		),
		array(
			'type'        => 'themethreads_slider',
			'param_name'  => 'ca_init_scale_y',
			'heading'     => esc_html__( 'Scale Y', 'volley-core' ),
			'description' => esc_html__( 'Select Scale Y', 'volley-core' ),
			'min'         => 0,
			'max'         => 10,
			'step'        => 0.25,
			'std'         => 1,
			'group' => esc_html__( 'Animation', 'volley-core' ),
			'dependency' => array(
				'element' => 'enable_content_animation',
				'value'   => 'yes',
			),
			'edit_field_class' => 'vc_col-sm-4',
		),
		array(
			'type'        => 'themethreads_slider',
			'param_name'  => 'ca_init_scale_z',
			'heading'     => esc_html__( 'Scale Z', 'volley-core' ),
			'description' => esc_html__( 'Select Scale Z', 'volley-core' ),
			'min'         => 0,
			'max'         => 10,
			'step'        => 0.25,
			'std'         => 1,
			'group' => esc_html__( 'Animation', 'volley-core' ),
			'dependency' => array(
				'element' => 'enable_content_animation',
				'value'   => 'yes',
			),
			'edit_field_class' => 'vc_col-sm-4',
		),
		array(
			'type'        => 'themethreads_slider',
			'param_name'  => 'ca_init_rotate_x',
			'heading'     => esc_html__( 'Rotate X', 'volley-core' ),
			'description' => esc_html__( 'Select rotate degree on X axe', 'volley-core' ),
			'min'         => -360,
			'max'         => 360,
			'step'        => 1,
			'group' => esc_html__( 'Animation', 'volley-core' ),
			'dependency' => array(
				'element' => 'enable_content_animation',
				'value'   => 'yes',
			),
		),
		array(
			'type'        => 'themethreads_slider',
			'param_name'  => 'ca_init_rotate_y',
			'heading'     => esc_html__( 'Rotate Y', 'volley-core' ),
			'description' => esc_html__( 'Select rotate degree on Y axe', 'volley-core' ),
			'min'         => -360,
			'max'         => 360,
			'step'        => 1,
			'group' => esc_html__( 'Animation', 'volley-core' ),
			'dependency' => array(
				'element' => 'enable_content_animation',
				'value'   => 'yes',
			),
		),
		array(
			'type'        => 'themethreads_slider',
			'param_name'  => 'ca_init_rotate_z',
			'heading'     => esc_html__( 'Rotate Z', 'volley-core' ),
			'description' => esc_html__( 'Select rotate degree on Z axe', 'volley-core' ),
			'min'         => -360,
			'max'         => 360,
			'step'        => 1,
			'group' => esc_html__( 'Animation', 'volley-core' ),
			'dependency'  => array(
				'element' => 'enable_content_animation',
				'value'   => 'yes',
			),
		),
		array(
			'type'        => 'themethreads_slider',
			'param_name'  => 'ca_init_opacity',
			'heading'     => esc_html__( 'Opacity', 'volley-core' ),
			'description' => esc_html__( 'Set opacity', 'volley-core' ),
			'min'         => 0,
			'max'         => 1,
			'step'        => 0.1,
			'std'         => 1,
			'group' => esc_html__( 'Animation', 'volley-core' ),
			'dependency'  => array(
				'element' => 'enable_content_animation',
				'value'   => 'yes',
			),
		),
		//Animation Values
		array(
			'type'        => 'subheading',
			'param_name'  => 'ca_animations_values',
			'heading'     => esc_html__( 'Animate To', 'volley-core' ),
			'group' => esc_html__( 'Animation', 'volley-core' ),
			'dependency' => array(
				'element' => 'enable_content_animation',
				'value'   => 'yes',
			),
		),			
		array(
			'type'        => 'themethreads_slider',
			'param_name'  => 'ca_an_translate_x',
			'heading'     => esc_html__( 'Translate X', 'volley-core' ),
			'description' => esc_html__( 'Select translate on X axe', 'volley-core' ),
			'min'         => -500,
			'max'         => 500,
			'step'        => 1,
			'group' => esc_html__( 'Animation', 'volley-core' ),
			'dependency' => array(
				'element' => 'enable_content_animation',
				'value'   => 'yes',
			),
		),
		array(
			'type'        => 'themethreads_slider',
			'param_name'  => 'ca_an_translate_y',
			'heading'     => esc_html__( 'Translate Y', 'volley-core' ),
			'description' => esc_html__( 'Select translate on Y axe', 'volley-core' ),
			'min'         => -500,
			'max'         => 500,
			'step'        => 1,
			'group' => esc_html__( 'Animation', 'volley-core' ),
			'dependency' => array(
				'element' => 'enable_content_animation',
				'value'   => 'yes',
			),
		),
		array(
			'type'        => 'themethreads_slider',
			'param_name'  => 'ca_an_translate_z',
			'heading'     => esc_html__( 'Translate Z', 'volley-core' ),
			'description' => esc_html__( 'Select translate on Z axe', 'volley-core' ),
			'min'         => -500,
			'max'         => 500,
			'step'        => 1,
			'group' => esc_html__( 'Animation', 'volley-core' ),
			'dependency' => array(
				'element' => 'enable_content_animation',
				'value'   => 'yes',
			),
		),
		array(
			'type'        => 'themethreads_slider',
			'param_name'  => 'ca_an_scale_x',
			'heading'     => esc_html__( 'Scale X', 'volley-core' ),
			'description' => esc_html__( 'Select Scale X', 'volley-core' ),
			'min'         => 0,
			'max'         => 10,
			'step'        => 0.25,
			'std'         => 1,
			'group' => esc_html__( 'Animation', 'volley-core' ),
			'dependency' => array(
				'element' => 'enable_content_animation',
				'value'   => 'yes',
			),
			'edit_field_class' => 'vc_col-sm-4',
		),
		array(
			'type'        => 'themethreads_slider',
			'param_name'  => 'ca_an_scale_y',
			'heading'     => esc_html__( 'Scale Y', 'volley-core' ),
			'description' => esc_html__( 'Select Scale Y', 'volley-core' ),
			'min'         => 0,
			'max'         => 10,
			'step'        => 0.25,
			'std'         => 1,
			'group' => esc_html__( 'Animation', 'volley-core' ),
			'dependency' => array(
				'element' => 'enable_content_animation',
				'value'   => 'yes',
			),
			'edit_field_class' => 'vc_col-sm-4',
		),
		array(
			'type'        => 'themethreads_slider',
			'param_name'  => 'ca_an_scale_z',
			'heading'     => esc_html__( 'Scale Z', 'volley-core' ),
			'description' => esc_html__( 'Select Scale Z', 'volley-core' ),
			'min'         => 0,
			'max'         => 10,
			'step'        => 0.25,
			'std'         => 1,
			'group' => esc_html__( 'Animation', 'volley-core' ),
			'dependency' => array(
				'element' => 'enable_content_animation',
				'value'   => 'yes',
			),
			'edit_field_class' => 'vc_col-sm-4',
		),
		array(
			'type'        => 'themethreads_slider',
			'param_name'  => 'ca_an_rotate_x',
			'heading'     => esc_html__( 'Rotate X', 'volley-core' ),
			'description' => esc_html__( 'Select rotate degree on X axe', 'volley-core' ),
			'min'         => -360,
			'max'         => 360,
			'step'        => 1,
			'group' => esc_html__( 'Animation', 'volley-core' ),
			'dependency' => array(
				'element' => 'enable_content_animation',
				'value'   => 'yes',
			),
		),
		array(
			'type'        => 'themethreads_slider',
			'param_name'  => 'ca_an_rotate_y',
			'heading'     => esc_html__( 'Rotate Y', 'volley-core' ),
			'description' => esc_html__( 'Select rotate degree on Y axe', 'volley-core' ),
			'min'         => -360,
			'max'         => 360,
			'step'        => 1,
			'group' => esc_html__( 'Animation', 'volley-core' ),
			'dependency' => array(
				'element' => 'enable_content_animation',
				'value'   => 'yes',
			),
		),
		array(
			'type'        => 'themethreads_slider',
			'param_name'  => 'ca_an_rotate_z',
			'heading'     => esc_html__( 'Rotate Z', 'volley-core' ),
			'description' => esc_html__( 'Select rotate degree on Z axe', 'volley-core' ),
			'min'         => -360,
			'max'         => 360,
			'step'        => 1,
			'group' => esc_html__( 'Animation', 'volley-core' ),
			'dependency' => array(
				'element' => 'enable_content_animation',
				'value'   => 'yes',
			),
		),
		array(
			'type'        => 'themethreads_slider',
			'param_name'  => 'ca_an_opacity',
			'heading'     => esc_html__( 'Opacity', 'volley-core' ),
			'description' => esc_html__( 'Set opacity', 'volley-core' ),
			'min'         => 0,
			'max'         => 1,
			'step'        => 0.1,
			'std'         => 1,
			'group' => esc_html__( 'Animation', 'volley-core' ),
			'dependency'  => array(
				'element' => 'enable_content_animation',
				'value'   => 'yes',
			),
		),
		
	);

	$params = array(
		
		
		array(
			'type'       => 'responsive_css_editor',
			'heading'    => esc_html__( 'Responsive CSS Box', 'volley-core' ),
			'param_name' => 'responsive_css',
			'group'      => esc_html__( 'Design Options', 'volley-core' ),
		),
		array(
			'type'        => 'css_editor',
			'heading'     => esc_html__( 'CSS box', 'volley-core' ),
			'param_name'  => 'css',
			'group'       => esc_html__( 'Design Options', 'volley-core' ),
		),
		array(
			'type' => 'dropdown',
			'param_name' => 'bg_position',
			'heading' => esc_html__( 'Background Position', 'volley-core' ),
			'value' => array(
				esc_html__( 'Default', 'volley-core' )         => '',
				esc_html__( 'Center Bottom', 'volley-core' )   => 'center bottom',
				esc_html__( 'Center Center', 'volley-core' )   => 'center center',
				esc_html__( 'Center Top', 'volley-core' )      => 'center top',
				esc_html__( 'Left Bottom', 'volley-core' )     => 'left bottom',
				esc_html__( 'Left Center', 'volley-core' )     => 'left center',
				esc_html__( 'Left Top', 'volley-core' )        => 'left top',
				esc_html__( 'Right Bottom', 'volley-core' )    => 'right bottom',
				esc_html__( 'Right Center', 'volley-core' )    => 'right center',
				esc_html__( 'Right Top', 'volley-core' )       => 'right top',
				esc_html__( 'Custom Position', 'volley-core' ) => 'custom',
			),
			'edit_field_class' => 'vc_col-sm-6',
			'group' => esc_html__( 'Design Options', 'volley-core' ),
		),
		array(
			'type'             => 'textfield',
			'param_name'       => 'bg_pos_h',
			'heading'          => esc_html__( 'Horizontal Position', 'volley-core' ),
			'description'      => esc_html__( 'Enter custom horizontal position in px or %', 'volley-core' ),
			'group'            => esc_html__( 'Design Options', 'volley-core' ),
			'edit_field_class' => 'vc_col-sm-6',
			'dependency'  => array(
				'element' => 'bg_position',
				'value'   => 'custom'
			)
		),
		array(
			'type'             => 'textfield',
			'param_name'       => 'bg_pos_v',
			'heading'          => esc_html__( 'Vertical Position', 'volley-core' ),
			'description'      => esc_html__( 'Enter custom vertical position in px or %', 'volley-core' ),
			'group'            => esc_html__( 'Design Options', 'volley-core' ),
			'edit_field_class' => 'vc_col-sm-6',
			'dependency'  => array(
				'element' => 'bg_position',
				'value'   => 'custom'
			)
		),
		array(
			'type'       => 'dropdown',
			'param_name' => 'bg_attachment',
			'heading'    => esc_html__( 'Background Attachment', 'volley-core' ),
			'value'      => array(
				esc_html__( 'Default', 'volley-core' ) => 'scroll',
				esc_html__( 'Fixed', 'volley-core' )   => 'fixed',
				esc_html__( 'Inherit', 'volley-core' ) => 'inherit',
			),
			'group' => esc_html__( 'Design Options', 'volley-core' ),
			'edit_field_class' => 'vc_col-sm-6',
		),
		//Gradient Background
		array(
			'type'        => 'checkbox',
			'param_name'  => 'enable_gradient',
			'heading'     => esc_html__( 'Enable Gradient', 'volley-core' ),
			'description' => esc_html__( 'If checked, gradient background will be enabled', 'volley-core' ),
			'value'       => array( esc_html__( 'Yes', 'volley-core' ) => 'yes' ),
			'group'       => esc_html__( 'Design Options', 'volley-core' ),
			'edit_field_class' => 'vc_col-sm-6',
		),		
		array(
			'type'       => 'themethreads_colorpicker',
			'param_name' => 'gradient_bg',
			'heading'    => esc_html__( 'Gradient Background', 'volley-core' ),
			'description'  => esc_html__( 'Add gradient background', 'volley-core' ),
			'dependency'  => array(
				'element' => 'enable_gradient',
				'not_empty' => true,
			),
			'edit_field_class' => 'vc_col-sm-6',
			'group' => esc_html__( 'Design Options', 'volley-core' ),	
		),
		//Overlay
		array(
			'type'        => 'checkbox',
			'param_name'  => 'enable_overlay',
			'heading'     => esc_html__( 'Enable Overlay', 'volley-core' ),
			'description' => esc_html__( 'If checked, overlay will be enabled', 'volley-core' ),
			'value'       => array( esc_html__( 'Yes', 'volley-core' ) => 'yes' ),
			'group'       => esc_html__( 'Design Options', 'volley-core' ),
		),		
		array(
			'type'       => 'themethreads_colorpicker',
			'param_name' => 'overlay_bg',
			'heading'    => esc_html__( 'Overlay Background', 'volley-core' ),
			'description'  => esc_html__( 'Set overlay background', 'volley-core' ),
			'dependency'  => array(
				'element' => 'enable_overlay',
				'not_empty' => true,
			),
			'edit_field_class' => 'vc_col-sm-6',
			'group' => esc_html__( 'Design Options', 'volley-core' ),	
		),
		array(
			'type'       => 'themethreads_colorpicker',
			'param_name' => 'hover_overlay_bg',
			'heading'    => esc_html__( 'Hover Overlay Background', 'volley-core' ),
			'description'  => esc_html__( 'Set hover overlay background', 'volley-core' ),
			'dependency'  => array(
				'element' => 'enable_overlay',
				'not_empty' => true,
			),
			'edit_field_class' => 'vc_col-sm-6',
			'group' => esc_html__( 'Design Options', 'volley-core' ),	
		),
		//Box Shadow Options
		array(
			'type'        => 'checkbox',
			'heading'     => esc_html__( 'Enable box-shadow?', 'volley-core' ),
			'param_name'  => 'enable_row_shadowbox',
			'description' => esc_html__( 'If checked, the box-shadow options will be visible', 'volley-core' ),
			'value'       => array( esc_html__( 'Yes', 'volley-core' ) => 'yes' ),
			'edit_field_class' => 'vc_col-sm-6',
			'group' => esc_html__( 'Design Options', 'volley-core' ),
		),
		array(
			'type' => 'param_group',
			'heading' => esc_html__( 'Shadow Box Options', 'volley-core' ),
			'param_name' => 'row_box_shadow',
			'group' => esc_html__( 'Design Options', 'volley-core' ),
			'dependency' => array(
				'element' => 'enable_row_shadowbox',
				'not_empty' => true,
			),
			'params' => array(				
				array(
					'type'        => 'dropdown',
					'param_name'  => 'inset',
					'heading'     => esc_html__( 'Inset', 'volley-core' ),
					'description' => esc_html__(  'Select if it is inset', 'volley-core' ),
					'value'      => array(
						esc_html__( 'No', 'volley-core' )  => '',
						esc_html__( 'Yes', 'volley-core' ) => 'inset',
					),
					'edit_field_class' => 'vc_col-sm-6 vc_column-with-padding'
				),
				array(
					'type'        => 'textfield',
					'param_name'  => 'x_offset',
					'heading'     => esc_html__( 'Position X', 'volley-core' ),
					'description' => esc_html__(  'Set position X in px', 'volley-core' ),
					'edit_field_class' => 'vc_col-sm-6'
				),
				array(
					'type'        => 'textfield',
					'param_name'  => 'y_offset',
					'heading'     => esc_html__( 'Position Y', 'volley-core' ),
					'description' => esc_html__(  'Set position Y in px', 'volley-core' ),
					'edit_field_class' => 'vc_col-sm-6'
				),
				array(
					'type'        => 'textfield',
					'param_name'  => 'blur_radius',
					'heading'     => esc_html__( 'Blur Radius', 'volley-core' ),
					'description' => esc_html__(  'Add blur radius in px', 'volley-core' ),
					'edit_field_class' => 'vc_col-sm-6'
				),
				array(
					'type'        => 'textfield',
					'param_name'  => 'spread_radius',
					'heading'     => esc_html__( 'Spread Radius', 'volley-core' ),
					'description' => esc_html__(  'Add spread radius in px', 'volley-core' ),
					'edit_field_class' => 'vc_col-sm-6'
				),
				array(
					'type'        => 'colorpicker',
					'param_name'  => 'shadow_color',
					'heading'     => esc_html__( 'Color', 'volley-core' ),
					'description' => esc_html__(  'Pick a color for shadow', 'volley-core' ),
					'edit_field_class' => 'vc_col-sm-6'
				),
				
			)
		),
		array(
			'type'        => 'checkbox',
			'heading'     => esc_html__( 'Enable svg dividers?', 'volley-core' ),
			'param_name'  => 'enable_row_dividers',
			'description' => esc_html__( 'If checked, the svg dividers will be visible', 'volley-core' ),
			'value'       => array( esc_html__( 'Yes', 'volley-core' ) => 'yes' ),
			'edit_field_class' => 'vc_col-sm-6',
			'group' => esc_html__( 'Design Options', 'volley-core' ),
		),
		array(
			'type'       => 'themethreads_shape_divider',
			'heading'    => esc_html__( 'Shape Divider Options', 'volley-core' ),
			'param_name' => 'row_svg_divider',
			'group'      => esc_html__( 'Shape Divider', 'volley-core' ),
			'dependency' => array(
				'element' => 'enable_row_dividers',
				'not_empty' => true,
			),
		),
	);
	
	$parallax_inner_row_param = array(
		array(
			'type'         => 'checkbox',
			'param_name'   => 'parallax',
			'heading'      => esc_html__( 'Parallax Background', 'volley-core' ),
			'description'  => esc_html__( 'Add parallax background image in Design Options', 'volley-core' ),
			'value'        => array( esc_html__( 'Yes', 'volley-core' ) => 'enable_parallax' ),
			'weight'       => 1,
		)
	);

	vc_add_params( 'vc_row', $slideshow_bg_params );
	vc_add_params( 'vc_row_inner', $slideshow_bg_params );

	vc_add_params( 'vc_row', $custom_animation_params );

	vc_add_params( 'vc_row_inner', $parallax_inner_row_param );
	vc_add_params( 'vc_row_inner', $custom_animation_params );	
	vc_add_params( 'vc_row', $params );
	vc_add_param( 'vc_row', array(
			'type'        => 'textfield',
			'heading'     => esc_html__( 'Section tooltip', 'volley-core' ),
			'param_name'  => 'data_tooltip',
			'description' => esc_html__( 'Add title as tooltip on stack page', 'volley-core' ),
			'weight'      => 1,
		)
	);

}
add_action( 'vc_after_init', 'themethreads_row_extras' );

function themethreads_columns_extras() {
	
	vc_remove_param( 'vc_column', 'css_animation' );
	vc_remove_param( 'vc_column_inner', 'css_animation' );
	
	vc_remove_param( 'vc_column', 'parallax_image' );
	vc_remove_param( 'vc_column_inner', 'parallax_image' );
	
	vc_remove_param( 'vc_column', 'el_id' );
	vc_remove_param( 'vc_column_inner', 'el_id' );
	
	vc_remove_param( 'vc_column', 'el_class' );
	vc_remove_param( 'vc_column_inner', 'el_class' );
	
	vc_remove_param( 'vc_column', 'parallax_speed_bg' );
	vc_remove_param( 'vc_column_inner', 'parallax_speed_bg' );

	vc_remove_param( 'vc_column', 'video_bg_parallax' );
	vc_remove_param( 'vc_column_inner', 'video_bg_parallax' );
	
	vc_remove_param( 'vc_column', 'parallax_speed_video' );
	vc_remove_param( 'vc_column_inner', 'parallax_speed_video' );
	
	vc_update_shortcode_param( 'vc_column',
			array(
			'type'        => 'checkbox',
			'heading'     => esc_html__( 'Use video background?', 'volley-core' ),
			'param_name'  => 'video_bg',
			'description' => esc_html__( 'If checked, video will be used as row background.', 'volley-core' ),
			'value'       => array( esc_html__( 'Yes', 'volley-core' ) => 'yes' ),
			'weight'      => 1
		)
	);
	vc_update_shortcode_param( 'vc_column_inner',
			array(
			'type'        => 'checkbox',
			'heading'     => esc_html__( 'Use video background?', 'volley-core' ),
			'param_name'  => 'video_bg',
			'description' => esc_html__( 'If checked, video will be used as row background.', 'volley-core' ),
			'value'       => array( esc_html__( 'Yes', 'volley-core' ) => 'yes' ),
			'weight'      => 1
		)
	);
	vc_update_shortcode_param( 'vc_column',
		array(
			'type'        => 'textfield',
			'heading'     => esc_html__( 'YouTube link', 'volley-core' ),
			'param_name'  => 'video_bg_url',
			'value'       => 'https://www.youtube.com/watch?v=lMJXxhRFO1k',
			// default video url
			'description' => esc_html__( 'Add YouTube link.', 'volley-core' ),
			'dependency'  => array(
				'element'   => 'video_bg',
				'not_empty' => true,
			),
			'weight' => 1
		)
	);
	vc_update_shortcode_param( 'vc_column_inner',
		array(
			'type'        => 'textfield',
			'heading'     => esc_html__( 'YouTube link', 'volley-core' ),
			'param_name'  => 'video_bg_url',
			'value'       => 'https://www.youtube.com/watch?v=lMJXxhRFO1k',
			// default video url
			'description' => esc_html__( 'Add YouTube link.', 'volley-core' ),
			'dependency'  => array(
				'element' => 'video_bg',
				'not_empty' => true,
			),
			'weight' => 1
		)
	);
	vc_update_shortcode_param( 'vc_column',
		array(
			'type'        => 'checkbox',
			'param_name'  => 'parallax',
			'heading'     => esc_html__( 'Parallax', 'volley-core' ),
			'description' => esc_html__( 'Add parallax for column.', 'volley-core' ),
			'value'       => array( esc_html__( 'Yes', 'volley-core' )  => 'yes' ),
			'weight' => 1
		)
	);
	vc_update_shortcode_param( 'vc_column_inner', 
		array(
			'type'        => 'checkbox',
			'param_name'  => 'parallax',
			'heading'     => esc_html__( 'Parallax', 'volley-core' ),
			'description' => esc_html__( 'Add parallax for column.', 'volley-core' ),
			'value'       => array( esc_html__( 'Yes', 'volley-core' )  => 'yes' ),
			'weight' => 1
		)
	);
	vc_add_params( 'vc_column', array(
			array(
				'type'         => 'checkbox',
				'param_name'   => 'enable_pin',
				'heading'      => esc_html__( 'Enable Pin', 'volley-core' ),
				'value'        => array( esc_html__( 'Yes', 'volley-core' ) => 'enable_pin_bg' ),
				'weight'       => 1,
			)		
		) 
	);
	vc_update_shortcode_param( 'vc_column',
		array(
			'type'        => 'textfield',
			'heading'     => esc_html__( 'Pin Duration', 'volley-core' ),
			'param_name'  => 'pin_duration',
			'value'       => '100%',
			'description' => esc_html__( 'Enter pinning duration..', 'volley-core' ),
			'dependency'  => array(
				'element'   => 'enable_pin',
				'not_empty' => true,
			),
			'edit_field_class' => 'vc_col-sm-4',
			'weight' => 1
		)
	);
	vc_update_shortcode_param( 'vc_column',
		array(
			'type'        => 'textfield',
			'heading'     => esc_html__( 'Pin Offset', 'volley-core' ),
			'param_name'  => 'pin_offset',
			'value'       => '0',
			'description' => esc_html__( 'Enter pinning offset.', 'volley-core' ),
			'dependency'  => array(
				'element'   => 'enable_pin',
				'not_empty' => true,
			),
			'edit_field_class' => 'vc_col-sm-4',
			'weight' => 1
		)
	);
	vc_update_shortcode_param( 'vc_column',
		array(
			'type'        => 'checkbox',
			'heading'     => esc_html__( 'Push Followers', 'volley-core' ),
			'param_name'  => 'pin_push_followers',
			'value'       => array( esc_html__( 'Yes', 'volley-core' )  => 'yes' ),
			'description' => esc_html__( 'Push the content beneath.', 'volley-core' ),
			'dependency'  => array(
				'element'   => 'enable_pin',
				'not_empty' => true,
			),
			'edit_field_class' => 'vc_col-sm-4',
			'weight' => 1
		)
	);
	
	$custom_animation_params = array(
		array(
			'type'             => 'checkbox',
			'param_name'       => 'enable_content_animation',
			'value'            => array( esc_html__( 'Yes', 'volley-core' ) => 'yes' ),
			'heading'          => esc_html__( 'Content animation', 'volley-core' ),
			'description'      => esc_html__( 'Will enable animation for content of columns, it will be animated when it "enters" the browsers viewport (Note: works only in modern browsers).', 'volley-core' ),
		),

		//Custom Animation Options
		array(
			'type'        => 'textfield',
			'param_name'  => 'ca_duration',
			'heading'     => esc_html__( 'Duration', 'volley-core' ),
			'description' => esc_html__( 'Add duration of the animation in milliseconds', 'volley-core' ),
			'dependency'  => array(
				'element' => 'enable_content_animation',
				'value'   => 'yes',
			),
			'edit_field_class' => 'vc_col-sm-6 vc_column-with-padding',
			'group' => esc_html__( 'Content Animation', 'volley-core' ),
		),
		array(
			'type' => 'textfield',
			'param_name' => 'ca_start_delay',
			'heading' => esc_html__( 'Start Delay', 'volley-core' ),
			'description' => esc_html__( 'Add start delay of the animation in milliseconds', 'volley-core' ),
			'dependency' => array(
				'element' => 'enable_content_animation',
				'value'   => 'yes',
			),
			'edit_field_class' => 'vc_col-sm-6',
			'group' => esc_html__( 'Content Animation', 'volley-core' ),
		),
		array(
			'type' => 'textfield',
			'param_name' => 'ca_delay',
			'heading' => esc_html__( 'Delay', 'volley-core' ),
			'description' => esc_html__( 'Add delay of the animation between of the animated elements in milliseconds', 'volley-core' ),
			'dependency' => array(
				'element' => 'enable_content_animation',
				'value'   => 'yes',
			),
			'edit_field_class' => 'vc_col-sm-6',
			'group' => esc_html__( 'Content Animation', 'volley-core' ),
		),
		array(
			'type' => 'dropdown',
			'param_name' => 'ca_easing',
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
			'dependency' => array(
				'element' => 'enable_content_animation',
				'value'   => 'yes',
			),
			'edit_field_class' => 'vc_col-sm-6',
			'group' => esc_html__( 'Content Animation', 'volley-core' ),
		),
		array(
			'type'        => 'dropdown',
			'param_name'  => 'ca_direction',
			'heading'     => esc_html__( 'Direction', 'volley-core' ),
			'description' => esc_html__( 'Select animations direction', 'volley-core' ),
			'value' => array(
				esc_html__( 'Forward', 'volley-core' )  => 'forward',
				esc_html__( 'Backward', 'volley-core' )  => 'backward',
			),
			'dependency' => array(
				'element' => 'enable_content_animation',
				'value'   => 'yes',
			),
			'edit_field_class' => 'vc_col-sm-6',
			'group' => esc_html__( 'Content Animation', 'volley-core' ),
		),
		array(
			'type'        => 'subheading',
			'param_name'  => 'ca_init_values',
			'heading'     => esc_html__( 'Animate From', 'volley-core' ),
			'group' => esc_html__( 'Content Animation', 'volley-core' ),
			'dependency' => array(
				'element' => 'enable_content_animation',
				'value'   => 'yes',
			),
		),
		array(
			'type'        => 'themethreads_slider',
			'param_name'  => 'ca_init_translate_x',
			'heading'     => esc_html__( 'Translate X', 'volley-core' ),
			'description' => esc_html__( 'Select translate on X axe', 'volley-core' ),
			'min'         => -500,
			'max'         => 500,
			'step'        => 1,
			'group' => esc_html__( 'Content Animation', 'volley-core' ),
			'dependency' => array(
				'element' => 'enable_content_animation',
				'value'   => 'yes',
			),
		),
		array(
			'type'        => 'themethreads_slider',
			'param_name'  => 'ca_init_translate_y',
			'heading'     => esc_html__( 'Translate Y', 'volley-core' ),
			'description' => esc_html__( 'Select translate on Y axe', 'volley-core' ),
			'min'         => -500,
			'max'         => 500,
			'step'        => 1,
			'group' => esc_html__( 'Content Animation', 'volley-core' ),
			'dependency' => array(
				'element' => 'enable_content_animation',
				'value'   => 'yes',
			),
		),
		array(
			'type'        => 'themethreads_slider',
			'param_name'  => 'ca_init_translate_z',
			'heading'     => esc_html__( 'Translate Z', 'volley-core' ),
			'description' => esc_html__( 'Select translate on Z axe', 'volley-core' ),
			'min'         => -500,
			'max'         => 500,
			'step'        => 1,
			'group' => esc_html__( 'Content Animation', 'volley-core' ),
			'dependency' => array(
				'element' => 'enable_content_animation',
				'value'   => 'yes',
			),
		),
		array(
			'type'        => 'themethreads_slider',
			'param_name'  => 'ca_init_scale_x',
			'heading'     => esc_html__( 'Scale X', 'volley-core' ),
			'description' => esc_html__( 'Select Scale X', 'volley-core' ),
			'min'         => 0,
			'max'         => 10,
			'step'        => 0.25,
			'std'         => 1,
			'group' => esc_html__( 'Content Animation', 'volley-core' ),
			'dependency' => array(
				'element' => 'enable_content_animation',
				'value'   => 'yes',
			),
			'edit_field_class' => 'vc_col-sm-4',
		),
		array(
			'type'        => 'themethreads_slider',
			'param_name'  => 'ca_init_scale_y',
			'heading'     => esc_html__( 'Scale Y', 'volley-core' ),
			'description' => esc_html__( 'Select Scale Y', 'volley-core' ),
			'min'         => 0,
			'max'         => 10,
			'step'        => 0.25,
			'std'         => 1,
			'group' => esc_html__( 'Content Animation', 'volley-core' ),
			'dependency' => array(
				'element' => 'enable_content_animation',
				'value'   => 'yes',
			),
			'edit_field_class' => 'vc_col-sm-4',
		),
		array(
			'type'        => 'themethreads_slider',
			'param_name'  => 'ca_init_scale_z',
			'heading'     => esc_html__( 'Scale Z', 'volley-core' ),
			'description' => esc_html__( 'Select Scale Z', 'volley-core' ),
			'min'         => 0,
			'max'         => 10,
			'step'        => 0.25,
			'std'         => 1,
			'group' => esc_html__( 'Content Animation', 'volley-core' ),
			'dependency' => array(
				'element' => 'enable_content_animation',
				'value'   => 'yes',
			),
			'edit_field_class' => 'vc_col-sm-4',
		),
		array(
			'type'        => 'themethreads_slider',
			'param_name'  => 'ca_init_rotate_x',
			'heading'     => esc_html__( 'Rotate X', 'volley-core' ),
			'description' => esc_html__( 'Select rotate degree on X axe', 'volley-core' ),
			'min'         => -360,
			'max'         => 360,
			'step'        => 1,
			'group' => esc_html__( 'Content Animation', 'volley-core' ),
			'dependency' => array(
				'element' => 'enable_content_animation',
				'value'   => 'yes',
			),
		),
		array(
			'type'        => 'themethreads_slider',
			'param_name'  => 'ca_init_rotate_y',
			'heading'     => esc_html__( 'Rotate Y', 'volley-core' ),
			'description' => esc_html__( 'Select rotate degree on Y axe', 'volley-core' ),
			'min'         => -360,
			'max'         => 360,
			'step'        => 1,
			'group' => esc_html__( 'Content Animation', 'volley-core' ),
			'dependency' => array(
				'element' => 'enable_content_animation',
				'value'   => 'yes',
			),
		),
		array(
			'type'        => 'themethreads_slider',
			'param_name'  => 'ca_init_rotate_z',
			'heading'     => esc_html__( 'Rotate Z', 'volley-core' ),
			'description' => esc_html__( 'Select rotate degree on Z axe', 'volley-core' ),
			'min'         => -360,
			'max'         => 360,
			'step'        => 1,
			'group'       => esc_html__( 'Content Animation', 'volley-core' ),
			'dependency'  => array(
				'element' => 'enable_content_animation',
				'value'   => 'yes',
			),
		),
		array(
			'type'        => 'themethreads_slider',
			'param_name'  => 'ca_init_opacity',
			'heading'     => esc_html__( 'Opacity', 'volley-core' ),
			'description' => esc_html__( 'Set opacity', 'volley-core' ),
			'min'         => 0,
			'max'         => 1,
			'step'        => 0.1,
			'std'         => 1,
			'group'       => esc_html__( 'Content Animation', 'volley-core' ),
			'dependency'  => array(
				'element' => 'enable_content_animation',
				'value'   => 'yes',
			),
		),
		//Animation Values
		array(
			'type'        => 'subheading',
			'param_name'  => 'ca_animations_values',
			'heading'     => esc_html__( 'Animate To', 'volley-core' ),
			'group' => esc_html__( 'Content Animation', 'volley-core' ),
			'dependency' => array(
				'element' => 'enable_content_animation',
				'value'   => 'yes',
			),
		),			
		array(
			'type'        => 'themethreads_slider',
			'param_name'  => 'ca_an_translate_x',
			'heading'     => esc_html__( 'Translate X', 'volley-core' ),
			'description' => esc_html__( 'Select translate on X axe', 'volley-core' ),
			'min'         => -500,
			'max'         => 500,
			'step'        => 1,
			'group' => esc_html__( 'Content Animation', 'volley-core' ),
			'dependency' => array(
				'element' => 'enable_content_animation',
				'value'   => 'yes',
			),
		),
		array(
			'type'        => 'themethreads_slider',
			'param_name'  => 'ca_an_translate_y',
			'heading'     => esc_html__( 'Translate Y', 'volley-core' ),
			'description' => esc_html__( 'Select translate on Y axe', 'volley-core' ),
			'min'         => -500,
			'max'         => 500,
			'step'        => 1,
			'group' => esc_html__( 'Content Animation', 'volley-core' ),
			'dependency' => array(
				'element' => 'enable_content_animation',
				'value'   => 'yes',
			),
		),
		array(
			'type'        => 'themethreads_slider',
			'param_name'  => 'ca_an_translate_z',
			'heading'     => esc_html__( 'Translate Z', 'volley-core' ),
			'description' => esc_html__( 'Select translate on Z axe', 'volley-core' ),
			'min'         => -500,
			'max'         => 500,
			'step'        => 1,
			'group' => esc_html__( 'Content Animation', 'volley-core' ),
			'dependency' => array(
				'element' => 'enable_content_animation',
				'value'   => 'yes',
			),
		),
		array(
			'type'        => 'themethreads_slider',
			'param_name'  => 'ca_an_scale_x',
			'heading'     => esc_html__( 'Scale X', 'volley-core' ),
			'description' => esc_html__( 'Select Scale X', 'volley-core' ),
			'min'         => 0,
			'max'         => 10,
			'step'        => 0.25,
			'std'         => 1,
			'group' => esc_html__( 'Content Animation', 'volley-core' ),
			'dependency' => array(
				'element' => 'enable_content_animation',
				'value'   => 'yes',
			),
			'edit_field_class' => 'vc_col-sm-4',

		),
		array(
			'type'        => 'themethreads_slider',
			'param_name'  => 'ca_an_scale_y',
			'heading'     => esc_html__( 'Scale Y', 'volley-core' ),
			'description' => esc_html__( 'Select Scale Y', 'volley-core' ),
			'min'         => 0,
			'max'         => 10,
			'step'        => 0.25,
			'std'         => 1,
			'group' => esc_html__( 'Content Animation', 'volley-core' ),
			'dependency' => array(
				'element' => 'enable_content_animation',
				'value'   => 'yes',
			),
			'edit_field_class' => 'vc_col-sm-4',
		),
		array(
			'type'        => 'themethreads_slider',
			'param_name'  => 'ca_an_scale_z',
			'heading'     => esc_html__( 'Scale Z', 'volley-core' ),
			'description' => esc_html__( 'Select Scale Z', 'volley-core' ),
			'min'         => 0,
			'max'         => 10,
			'step'        => 0.25,
			'std'         => 1,
			'group' => esc_html__( 'Content Animation', 'volley-core' ),
			'dependency' => array(
				'element' => 'enable_content_animation',
				'value'   => 'yes',
			),
			'edit_field_class' => 'vc_col-sm-4',
		),
		array(
			'type'        => 'themethreads_slider',
			'param_name'  => 'ca_an_rotate_x',
			'heading'     => esc_html__( 'Rotate X', 'volley-core' ),
			'description' => esc_html__( 'Select rotate degree on X axe', 'volley-core' ),
			'min'         => -360,
			'max'         => 360,
			'step'        => 1,
			'group' => esc_html__( 'Content Animation', 'volley-core' ),
			'dependency' => array(
				'element' => 'enable_content_animation',
				'value'   => 'yes',
			),
		),
		array(
			'type'        => 'themethreads_slider',
			'param_name'  => 'ca_an_rotate_y',
			'heading'     => esc_html__( 'Rotate Y', 'volley-core' ),
			'description' => esc_html__( 'Select rotate degree on Y axe', 'volley-core' ),
			'min'         => -360,
			'max'         => 360,
			'step'        => 1,
			'group' => esc_html__( 'Content Animation', 'volley-core' ),
			'dependency' => array(
				'element' => 'enable_content_animation',
				'value'   => 'yes',
			),
		),
		array(
			'type'        => 'themethreads_slider',
			'param_name'  => 'ca_an_rotate_z',
			'heading'     => esc_html__( 'Rotate Z', 'volley-core' ),
			'description' => esc_html__( 'Select rotate degree on Z axe', 'volley-core' ),
			'min'         => -360,
			'max'         => 360,
			'step'        => 1,
			'group' => esc_html__( 'Content Animation', 'volley-core' ),
			'dependency' => array(
				'element' => 'enable_content_animation',
				'value'   => 'yes',
			),
		),
		array(
			'type'        => 'themethreads_slider',
			'param_name'  => 'ca_an_opacity',
			'heading'     => esc_html__( 'Opacity', 'volley-core' ),
			'description' => esc_html__( 'Set opacity', 'volley-core' ),
			'min'         => 0,
			'max'         => 1,
			'step'        => 0.1,
			'std'         => 1,
			'group'       => esc_html__( 'Content Animation', 'volley-core' ),
			'dependency'  => array(
				'element' => 'enable_content_animation',
				'value'   => 'yes',
			),
		),
	);
	
	$extra_params = array(
		array(
			'type'        => 'el_id',
			'heading'     => esc_html__( 'Element ID', 'volley-core' ),
			'param_name'  => 'el_id',
			'description' => sprintf( __( 'Enter element ID (Note: make sure it is unique and valid according to <a href="%s" target="_blank">w3c specification</a>).', 'volley-core' ), 'http://www.w3schools.com/tags/att_global_id.asp' ),
		),
		array(
			'type'        => 'textfield',
			'heading'     => esc_html__( 'Extra class name', 'volley-core' ),
			'param_name'  => 'el_class',
			'description' => esc_html__( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'volley-core' ),
		),
	);
	
	$paralax_params = array(
		//Paralax settings for vc_column and vc_column_inner
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
			'max'         => 10,
			'step'        => 0.25,
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
			'max'         => 10,
			'step'        => 0.25,
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
			'max'         => 10,
			'step'        => 0.25,
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
			'step'        => 0.25,
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
			'step'        => 0.25,
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
			'step'        => 0.25,
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
			'param_name'  => 'parallax_time',
			'heading'     => esc_html__( 'Parallax Time', 'volley-core' ),
			'description' => esc_html__( 'Duration of the animation in sec', 'volley-core' ),
			'group'       => esc_html__( 'Parallax Options', 'volley-core' ),
			'dependency'  => array(
				'element' => 'parallax',
				'value'   => 'yes'
			),
			'edit_field_class' => 'vc_col-sm-6',
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
			'description' => esc_html__( 'define how much the animation last during the scroll. could be defined in px (150) or percent(100%)', 'volley-core' ),
			'group'       => esc_html__( 'Parallax Options', 'volley-core' ),
			'dependency'  => array(
				'element' => 'parallax',
				'value'   => 'yes'
			),
			'edit_field_class' => 'vc_col-sm-6',
		),
		array(
			'type'        => 'dropdown',
			'param_name'  => 'enable_reverse',
			'heading'     => esc_html__( 'Enable Reverse', 'volley-core' ),
			'description' => esc_html__( 'Will enable animation each time the element will come in viewport', 'volley-core' ),
			'group'       => esc_html__( 'Parallax Options', 'volley-core' ),
			'value'       => array(
				esc_html__( 'No', 'volley-core' ) => 'no',
				esc_html__( 'Yes', 'volley-core' ) => 'yes',
			),
			'std' => 'yes',
			'dependency' => array(
				'element' => 'parallax',
				'value'   => 'yes'
			),
			'edit_field_class' => 'vc_col-sm-6',
		),
	);	
	
	$shadow_box_params = array(
		//Overlay
		array(
			'type'        => 'checkbox',
			'param_name'  => 'enable_overlay',
			'heading'     => esc_html__( 'Enable Overlay', 'volley-core' ),
			'description' => esc_html__( 'If checked, overlay will be enabled', 'volley-core' ),
			'value'       => array( esc_html__( 'Yes', 'volley-core' ) => 'yes' ),
			'group'       => esc_html__( 'Design Options', 'volley-core' ),
		),		
		array(
			'type'       => 'themethreads_colorpicker',
			'param_name' => 'overlay_bg',
			'heading'    => esc_html__( 'Overlay Background', 'volley-core' ),
			'description'  => esc_html__( 'Set overlay background', 'volley-core' ),
			'dependency'  => array(
				'element' => 'enable_overlay',
				'not_empty' => true,
			),
			'edit_field_class' => 'vc_col-sm-6',
			'group' => esc_html__( 'Design Options', 'volley-core' ),	
		),
		array(
			'type'       => 'themethreads_colorpicker',
			'param_name' => 'hover_overlay_bg',
			'heading'    => esc_html__( 'Hover Overlay Background', 'volley-core' ),
			'description'  => esc_html__( 'Set hover overlay background', 'volley-core' ),
			'dependency'  => array(
				'element' => 'enable_overlay',
				'not_empty' => true,
			),
			'edit_field_class' => 'vc_col-sm-6',
			'group' => esc_html__( 'Design Options', 'volley-core' ),	
		),
		array(
			'type'        => 'checkbox',
			'heading'     => esc_html__( 'Enable column box-shadow?', 'volley-core' ),
			'param_name'  => 'enable_column_shadowbox',
			'description' => esc_html__( 'If checked, the column box-shadow options will be visible', 'volley-core' ),
			'value'       => array( esc_html__( 'Yes', 'volley-core' ) => 'yes' ),
			'group'       => esc_html__( 'Design Options', 'volley-core' ),
			'edit_field_class' => 'vc_col-sm-6',
		),
		array(
			'type'        => 'themethreads_colorpicker',
			'param_name'  => 'gradient_bg_color',
			'only_gradient' => true,
			'heading'     => esc_html__( 'Gradient Background Color', 'volley-core' ),
			'description' => esc_html__( 'Pick gradient backround color for the column', 'volley-core' ),
			'group'       => esc_html__( 'Design Options', 'volley-core' ),
			'edit_field_class' => 'vc_col-sm-6',
		),
		array(
			'type' => 'param_group',
			'heading' => esc_html__( 'Column Shadow Box Options', 'volley-core' ),
			'param_name' => 'column_box_shadow',
			'dependency' => array(
				'element' => 'enable_column_shadowbox',
				'not_empty' => true,
			),
			'group'  => esc_html__( 'Design Options', 'volley-core' ),
			'params' => array(
				array(
					'type'        => 'dropdown',
					'param_name'  => 'inset',
					'heading'     => esc_html__( 'Inset', 'volley-core' ),
					'description' => esc_html__(  'Select if it is inset', 'volley-core' ),
					'value'      => array(
						esc_html__( 'No', 'volley-core' )  => '',
						esc_html__( 'Yes', 'volley-core' ) => 'inset',
					),
				),
				array(
					'type'        => 'textfield',
					'param_name'  => 'x_offset',
					'heading'     => esc_html__( 'Position X', 'volley-core' ),
					'description' => esc_html__(  'Set position X in px', 'volley-core' ),
					'edit_field_class' => 'vc_col-sm-6'
				),
				array(
					'type'        => 'textfield',
					'param_name'  => 'y_offset',
					'heading'     => esc_html__( 'Position Y', 'volley-core' ),
					'description' => esc_html__(  'Set position Y in px', 'volley-core' ),
					'edit_field_class' => 'vc_col-sm-6'
				),
				array(
					'type'        => 'textfield',
					'param_name'  => 'blur_radius',
					'heading'     => esc_html__( 'Blur Radius', 'volley-core' ),
					'description' => esc_html__(  'Add blur radius in px', 'volley-core' ),
					'edit_field_class' => 'vc_col-sm-6'
				),
				array(
					'type'        => 'textfield',
					'param_name'  => 'spread_radius',
					'heading'     => esc_html__( 'Spread Radius', 'volley-core' ),
					'description' => esc_html__(  'Add spread radius in px', 'volley-core' ),
					'edit_field_class' => 'vc_col-sm-6'
				),
				array(
					'type'        => 'themethreads_colorpicker',
					'only_solid'  => true,
					'param_name'  => 'shadow_color',
					'heading'     => esc_html__( 'Color', 'volley-core' ),
					'description' => esc_html__(  'Pick a color for shadow', 'volley-core' ),
					'edit_field_class' => 'vc_col-sm-6'
				),

			)
		),	
	);
	
	$responsive_alignment_params = array(
		array(
			'type'        => 'dropdown',
			'param_name'  => 'align',
			'heading'     => esc_html__( 'Text Alignment', 'volley-core' ),
			'description' => esc_html__( 'Text alignment inside the column', 'volley-core' ),
			'value' => array(
				esc_html__( 'Default', 'volley-core' ) => '',
				esc_html__( 'Left', 'volley-core' ) => 'text-left',
				esc_html__( 'Center', 'volley-core' ) => 'text-center',
				esc_html__( 'Right', 'volley-core' ) => 'text-right',
			),
		),
		array(
			'type'        => 'responsive_alignment',
			'param_name'  => 'responsive_align',
			'heading'     => esc_html__( 'Responsive text alignment', 'volley-core' ),
			'description' => esc_html__( 'Text alignment inside the column with responsiveness', 'volley-core' ),
			'group' => esc_html__( 'Responsive Options', 'volley-core' ),
		),
	);

	//vc_add_params( 'vc_column', $delay_param );
	//vc_add_params( 'vc_column_inner', $delay_param );
	
	vc_add_params( 'vc_column', $paralax_params );
	vc_add_params( 'vc_column_inner', $paralax_params );
	
	vc_add_params( 'vc_column', $shadow_box_params );
	vc_add_params( 'vc_column_inner', $shadow_box_params );

	vc_add_params( 'vc_column', $custom_animation_params );
	vc_add_params( 'vc_column_inner', $custom_animation_params );
	
	vc_add_params( 'vc_column', $responsive_alignment_params );
	vc_add_params( 'vc_column_inner', $responsive_alignment_params );
	
	vc_add_params( 'vc_column', $extra_params );
	vc_add_params( 'vc_column_inner', $extra_params );
	
	
	
}
//themethreads_columns_extras();
add_action( 'vc_after_init', 'themethreads_columns_extras' );

function themethreads_background_position_params() {
	
	vc_remove_param( 'vc_column', 'css' );

	$params = array(

		array(
			'type'       => 'responsive_css_editor',
			'heading'    => esc_html__( 'Responsive CSS Box', 'volley-core' ),
			'param_name' => 'responsive_css',
			'group'      => esc_html__( 'Design Options', 'volley-core' ),
			'weight'     => 1
		),
		array(
			'type'        => 'css_editor',
			'heading'     => esc_html__( 'CSS box', 'volley-core' ),
			'param_name'  => 'css',
			'weight'      => 1,
			'group'       => esc_html__( 'Design Options', 'volley-core' ),
		),
		array(
			'type' => 'dropdown',
			'param_name' => 'bg_position',
			'heading' => esc_html__( 'Background Position', 'volley-core' ),
			'value' => array(
				esc_html__( 'Default', 'volley-core' )         => '',
				esc_html__( 'Center Bottom', 'volley-core' )   => 'center bottom',
				esc_html__( 'Center Center', 'volley-core' )   => 'center center',
				esc_html__( 'Center Top', 'volley-core' )      => 'center top',
				esc_html__( 'Left Bottom', 'volley-core' )     => 'left bottom',
				esc_html__( 'Left Center', 'volley-core' )     => 'left center',
				esc_html__( 'Left Top', 'volley-core' )        => 'left top',
				esc_html__( 'Right Bottom', 'volley-core' )    => 'right bottom',
				esc_html__( 'Right Center', 'volley-core' )    => 'right center',
				esc_html__( 'Right Top', 'volley-core' )       => 'right top',
				esc_html__( 'Custom Position', 'volley-core' ) => 'custom',
			),
			'group' => esc_html__( 'Design Options', 'volley-core' ),
		),

		array(
			'type'             => 'textfield',
			'param_name'       => 'bg_pos_h',
			'heading'          => esc_html__( 'Horizontal Position', 'volley-core' ),
			'description'      => esc_html__( 'Enter custom horizontal position in px or %', 'volley-core' ),
			'group'            => esc_html__( 'Design Options', 'volley-core' ),
			'edit_field_class' => 'vc_col-sm-6',
			'dependency'  => array(
				'element' => 'bg_position',
				'value'   => 'custom'
			)
		),

		array(
			'type'             => 'textfield',
			'param_name'       => 'bg_pos_v',
			'heading'          => esc_html__( 'Vertical Position', 'volley-core' ),
			'description'      => esc_html__( 'Enter custom vertical position in px or %', 'volley-core' ),
			'group'            => esc_html__( 'Design Options', 'volley-core' ),
			'edit_field_class' => 'vc_col-sm-6',
			'dependency'  => array(
				'element' => 'bg_position',
				'value'   => 'custom'
			)
		),

	);

	vc_add_params( 'vc_row_inner', $params );
	vc_add_params( 'vc_column', $params );
	vc_add_params( 'vc_column_inner', $params );

}
add_action( 'vc_after_init', 'themethreads_background_position_params' );

//Add vc_custom_heading extra options
function themethreads_extends_vc_custom_heading() {
	
		vc_update_shortcode_param( 'vc_custom_heading', array(
				'type'       => 'dropdown',
				'heading'    => esc_html__( 'Text source', 'volley-core' ),
				'param_name' => 'source',
				'value'      => array(
					esc_html__( 'Custom text', 'volley-core' ) => '',
					esc_html__( 'Post or Page Title', 'volley-core' ) => 'post_title',
				),
				'std'         => '',
				'description' => esc_html__( 'Select text source.', 'volley-core' ),
				'weight'      => 1
			)
		);
		vc_update_shortcode_param( 'vc_custom_heading', array(
				'type'        => 'textarea',
				'heading'     => esc_html__( 'Text', 'volley-core' ),
				'param_name'  => 'text',
				'admin_label' => true,
				'value'       => esc_html__( 'This is custom heading element', 'volley-core' ),
				'description' => esc_html__( 'Note: If you are using non-latin characters be sure to activate them under Settings/WPBakery Page Builder/General Settings.', 'volley-core' ),
				'dependency'  => array(
					'element' => 'source',
					'is_empty' => true,
				),
				'weight' => 1
			)
		);
		vc_update_shortcode_param( 'vc_custom_heading', array(
				'type'        => 'vc_link',
				'heading'     => esc_html__( 'URL (Link)', 'volley-core' ),
				'param_name'  => 'link',
				'description' => esc_html__( 'Add link to custom heading.', 'volley-core' ),
				'weight'      => 1
			)
		);
		vc_update_shortcode_param( 'vc_custom_heading', array(
				'type'        => 'font_container',
				'param_name'  => 'font_container',
				'value'       => 'tag:h2|text_align:left',
				'settings'    => array(
					'fields'  => array(
						'tag' => 'h2',
						// default value h2
						'text_align',
						'font_size',
						'line_height',
						'color',
						'tag_description'         => esc_html__( 'Select element tag.', 'volley-core' ),
						'text_align_description'  => esc_html__( 'Select text alignment.', 'volley-core' ),
						'font_size_description'   => esc_html__( 'Enter font size.', 'volley-core' ),
						'line_height_description' => esc_html__( 'Enter line height.', 'volley-core' ),
						'color_description'       => esc_html__( 'Select heading color.', 'volley-core' ),
					),
				),
				'weight' => 1
			)
		);

	$params = array(

		array(
			'type'        => 'textfield',
			'param_name'  => 'letter_spacing',
			'heading'     => esc_html__( 'Letter Spacing', 'volley-core' ),
			'description' => esc_html__( 'Add letter spacing', 'volley-core' ),
			'weight'      => 1
		),
		array(
			'type'       => 'checkbox',
			'param_name' => 'enable_gradient',
			'heading'    => esc_html__( 'Enable Gradient color', 'volley-core' ),
			'value'      => array( esc_html__( 'Yes', 'volley-core' ) => 'yes' ),
			'weight'     => 1
		),
		array(
			'type'          => 'themethreads_colorpicker',
			'only_gradient' => true,
			'param_name'    => 'gradient_color',
			'heading'       => esc_html__( 'Gradient Color', 'volley-core' ),
			'description'   => esc_html__( 'Add gradient color to text' ),
			'dependency'    => array(
				'element'   => 'enable_gradient',
				'not_empty' => true
			),
			'weight'        => 1
		),
		array(
			'type'       => 'checkbox',
			'param_name' => 'enable_fittext',
			'heading'    => esc_html__( 'Enable fitText', 'volley-core' ),
			'value'      => array( esc_html__( 'Yes', 'volley-core' ) => 'yes' ),
			'weight' => 1
		),
		array(
			'type'        => 'textfield',
			'param_name'  => 'fittex_size',
			'heading'     => esc_html__( 'fitText Max size', 'volley-core' ),
			'description' => esc_html__( 'Add Max text size in px ex. 75px', 'volley-core' ),
			'dependency'  => array(
				'element'   => 'enable_fittext',
				'not_empty' => true
			),
			'weight' => 1
		),

	);

	vc_add_params( 'vc_custom_heading', $params );
	
	vc_update_shortcode_param( 'vc_custom_heading', array(
			'type'       => 'checkbox',
			'heading'    => esc_html__( 'Use theme default font family?', 'volley-core' ),
			'param_name' => 'use_theme_fonts',
			'value'       => array( esc_html__( 'Yes', 'volley-core' ) => 'yes' ),
			'description' => esc_html__( 'Use font family from the theme.', 'volley-core' ),
			'weight' => 1,
			'std' => 'yes',
		)
	);
	
}
add_action( 'vc_after_init', 'themethreads_extends_vc_custom_heading' );

function themethreads_extends_vc_single_image() {

		vc_update_shortcode_param( 'vc_single_image', 
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Widget title', 'volley-core' ),
				'param_name'  => 'title',
				'description' => esc_html__( 'Enter text used as widget title (Note: located above content element).', 'volley-core' ),
				'weight'      => 1
			)
		);
		vc_update_shortcode_param( 'vc_single_image', 
			array(
				'type'       => 'dropdown',
				'heading'    => esc_html__( 'Image source', 'volley-core' ),
				'param_name' => 'source',
				'value'      => array(
					esc_html__( 'Media library', 'volley-core' ) => 'media_library',
					esc_html__( 'External link', 'volley-core' ) => 'external_link',
					esc_html__( 'Featured Image', 'volley-core' ) => 'featured_image',
				),
				'std'         => 'media_library',
				'description' => esc_html__( 'Select image source.', 'volley-core' ),
				'weight'      => 1
			)
		);
		vc_update_shortcode_param( 'vc_single_image',
			array(
				'type'        => 'attach_image',
				'heading'     => esc_html__( 'Image', 'volley-core' ),
				'param_name'  => 'image',
				'value'       => '',
				'description' => esc_html__( 'Select image from media library.', 'volley-core' ),
				'dependency'  => array(
					'element' => 'source',
					'value'   => 'media_library',
				),
				'admin_label' => true,
				'weight'      => 1
			)
		);
		vc_update_shortcode_param( 'vc_single_image',
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'External link', 'volley-core' ),
				'param_name'  => 'custom_src',
				'description' => esc_html__( 'Select external link.', 'volley-core' ),
				'dependency'  => array(
					'element' => 'source',
					'value'   => 'external_link',
				),
				'admin_label' => true,
				'weight'      => 1
			)
		);
		vc_update_shortcode_param( 'vc_single_image',
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Image size', 'volley-core' ),
				'param_name'  => 'img_size',
				'value'       => 'thumbnail',
				'description' => esc_html__( 'Enter image size (Example: "thumbnail", "medium", "large", "full" or other sizes defined by theme). Alternatively enter size in pixels (Example: 200x100 (Width x Height)).', 'volley-core' ),
				'dependency'  => array(
					'element' => 'source',
					'value'   => array(
						'media_library',
						'featured_image',
					),
				),
				'weight' => 1			
			)
		);
		vc_update_shortcode_param( 'vc_single_image',
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Image size', 'volley-core' ),
				'param_name'  => 'external_img_size',
				'value'       => '',
				'description' => esc_html__( 'Enter image size in pixels. Example: 200x100 (Width x Height).', 'volley-core' ),
				'dependency'  => array(
					'element' => 'source',
					'value'  => 'external_link',
				),
				'weight'      => 1
			)
		);		
		vc_update_shortcode_param( 'vc_single_image',
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Caption', 'volley-core' ),
				'param_name'  => 'caption',
				'description' => esc_html__( 'Enter text for image caption.', 'volley-core' ),
				'dependency'  => array(
					'element' => 'source',
					'value'   => 'external_link',
				),
				'weight'      => 1
			)
		);
		vc_update_shortcode_param( 'vc_single_image',
			array(
				'type'        => 'checkbox',
				'heading'     => esc_html__( 'Add caption?', 'volley-core' ),
				'param_name'  => 'add_caption',
				'description' => esc_html__( 'Add image caption.', 'volley-core' ),
				'value'       => array( esc_html__( 'Yes', 'volley-core' ) => 'yes' ),
				'dependency'  => array(
					'element' => 'source',
					'value'   => array(
						'media_library',
						'featured_image',
					),
				),
				'weight' => 1
			)
		);
		vc_update_shortcode_param( 'vc_single_image',
			array(
				'type'       => 'dropdown',
				'heading'    => esc_html__( 'Image alignment', 'volley-core' ),
				'param_name' => 'alignment',
				'value' => array(
					esc_html__( 'Left', 'volley-core' ) => 'left',
					esc_html__( 'Right', 'volley-core' ) => 'right',
					esc_html__( 'Center', 'volley-core' ) => 'center',
				),
				'description' => esc_html__( 'Select image alignment.', 'volley-core' ),
				'weight' => 1
			)
		);
		vc_update_shortcode_param( 'vc_single_image',
			array(
				'type'        => 'dropdown',
				'heading'     => esc_html__( 'Image style', 'volley-core' ),
				'param_name'  => 'style',
				'value'       => getVcShared( 'single image styles' ),
				'description' => esc_html__( 'Select image display style.', 'volley-core' ),
				'dependency'  => array(
					'element' => 'source',
					'value'   => array(
						'media_library',
						'featured_image',
					),
				),
				'weight' => 1
			)
		);
		vc_update_shortcode_param( 'vc_single_image',
			array(
				'type'        => 'dropdown',
				'heading'     => esc_html__( 'Image style', 'volley-core' ),
				'param_name'  => 'external_style',
				'value'       => getVcShared( 'single image external styles' ),
				'description' => esc_html__( 'Select image display style.', 'volley-core' ),
				'dependency'  => array(
					'element' => 'source',
					'value'   => 'external_link',
				),
				'weight' => 1
			)
		);
		vc_update_shortcode_param( 'vc_single_image',
			array(
				'type'       => 'dropdown',
				'heading'    => esc_html__( 'Border color', 'volley-core' ),
				'param_name' => 'border_color',
				'value'      => getVcShared( 'colors' ),
				'std'        => 'grey',
				'dependency' => array(
					'element' => 'style',
					'value' => array(
						'vc_box_border',
						'vc_box_border_circle',
						'vc_box_outline',
						'vc_box_outline_circle',
						'vc_box_border_circle_2',
						'vc_box_outline_circle_2',
					),
				),
				'description' => esc_html__( 'Border color.', 'volley-core' ),
				'param_holder_class' => 'vc_colored-dropdown',
				'weight' => 1
			)
		);
		vc_update_shortcode_param( 'vc_single_image',
			array(
				'type'       => 'dropdown',
				'heading'    => esc_html__( 'Border color', 'volley-core' ),
				'param_name' => 'external_border_color',
				'value'      => getVcShared( 'colors' ),
				'std'        => 'grey',
				'dependency' => array(
					'element' => 'external_style',
					'value' => array(
						'vc_box_border',
						'vc_box_border_circle',
						'vc_box_outline',
						'vc_box_outline_circle',
					),
				),
				'description' => esc_html__( 'Border color.', 'volley-core' ),
				'param_holder_class' => 'vc_colored-dropdown',
				'weight' => 1
			)
		);
		vc_update_shortcode_param( 'vc_single_image',
			array(
				'type'       => 'dropdown',
				'heading'    => esc_html__( 'On click action', 'volley-core' ),
				'param_name' => 'onclick',
				'value'      => array(
					esc_html__( 'None', 'volley-core' ) => '',
					esc_html__( 'Link to large image', 'volley-core' ) => 'img_link_large',
					esc_html__( 'Open prettyPhoto', 'volley-core' ) => 'link_image',
					esc_html__( 'Open custom link', 'volley-core' ) => 'custom_link',
					esc_html__( 'Zoom', 'volley-core' ) => 'zoom',
				),
				'description' => esc_html__( 'Select action for click action.', 'volley-core' ),
				'std' => '',
				'weight' => 1
			)
		);
		vc_update_shortcode_param( 'vc_single_image',
			array(
				'type'        => 'href',
				'heading'     => esc_html__( 'Image link', 'volley-core' ),
				'param_name'  => 'link',
				'description' => esc_html__( 'Enter URL if you want this image to have a link (Note: parameters like "mailto:" are also accepted).', 'volley-core' ),
				'dependency'  => array(
					'element' => 'onclick',
					'value'   => 'custom_link',
				),
				'weight' => 1
			)
		);
		vc_update_shortcode_param( 'vc_single_image',
			array(
				'type'        => 'dropdown',
				'heading'     => esc_html__( 'Link Target', 'volley-core' ),
				'param_name'  => 'img_link_target',
				'value'       => vc_target_param_list(),
				'dependency'  => array(
					'element' => 'onclick',
					'value'   => array(
						'custom_link',
						'img_link_large',
					),
				),
				'weight' => 1
			)
		);

		$params = array (
			
			array(
				'type'        => 'textfield',
				'param_name'  => 'image_max_width',
				'heading'     => esc_html__( 'Image Max Width', 'volley-core' ),
				'description' => esc_html__( 'Set Image max width for ex. 250px', 'volley-core' ),
				'weight'      => 1,
			),
			array(
				'type'        => 'checkbox',
				'param_name'  => 'invisible',
				'heading'     => esc_html__( 'Invisible?', 'volley-core' ),
				'description' => esc_html__( 'Check to make image invisible and use as placeholder', 'volley-core' ),
				'value'       => array( esc_html__( 'Yes', 'volley-core' ) => 'yes' ),
				'weight'      => 1,
			),
			array(
				'type'        => 'checkbox',
				'param_name'  => 'enable_opacity',
				'heading'     => esc_html__( 'Enable Hover Opacity?', 'volley-core' ),
				'description' => esc_html__( 'Check to enable hover opacity', 'volley-core' ),
				'value'       => array( esc_html__( 'Yes', 'volley-core' ) => 'yes' ),
				'weight'      => 1,
			),
			array(
				'type'        => 'themethreads_slider',
				'param_name'  => 'opacity',
				'heading'     => esc_html__( 'Opacity', 'volley-core' ),
				'description' => esc_html__( 'Set opacity', 'volley-core' ),
				'min'         => 0,
				'max'         => 1,
				'step'        => 0.1,
				'std'         => 1,
				'dependency'  => array(
					'element' => 'enable_opacity',
					'value'   => 'yes',
				),
				'weight'      => 1,
			),
			
		);

		vc_add_params( 'vc_single_image', $params );

}
add_action( 'vc_after_init', 'themethreads_extends_vc_single_image' );