<?php
/*
 * Slider Section
*/

$sections[] = array(
	'post_types' => array( 'post', 'page' ),
	'title' => esc_html__('Sliders', 'volley'),
	'icon' => 'el-icon-adjust-alt',
	'fields' => array(

		array(
 			'id'=>'slider-type',
 			'type' => 'select',
 			'title' => esc_html__('Slider Type', 'volley'),
 			'subtitle'=> esc_html__('Select the type of slider that displays.', 'volley'),
			'options' => array(
				'no' => esc_html__( 'No Slider', 'volley' ),
				'themethreads' => esc_html__( 'themethreads Slider', 'volley' ),
				'rev' => esc_html__( 'Revolution Slider', 'volley' )
			),
			'default' => 'no'
		),

		array(
 			'id'=>'slider-themethreads',
 			'type' => 'select',
 			'title' => esc_html__('Select themethreads Slider', 'volley'),
 			'subtitle'=> esc_html__('Select the unique name of the slider.', 'volley'),
			'options' => array(
				'no' => esc_html__( 'Select a slider', 'volley' )
			),
			'required' => array(
				'slider-type',
				'equals',
				'themethreads'
			),
			'default' => 'no'
		),

		array(
 			'id'=>'slider-rev',
 			'type' => 'select',
 			'title' => esc_html__('Select Revolution Slider', 'volley'),
 			'subtitle'=> esc_html__('Select the unique name of the slider.', 'volley'),
			'options' => array(
				'no' => esc_html__( 'Select a slider', 'volley' )
			),
			'required' => array(
				'slider-type',
				'equals',
				'rev'
			),
			'default' => 'no'
		),

		array(
 			'id'=>'slider-position',
 			'type' => 'button_set',
 			'title' => esc_html__('Slider Position', 'volley'),
 			'subtitle'=> esc_html__('Select if the slider shows below or above the header.', 'volley'),
			'options' => array(
				'default' => esc_html__( 'Default', 'volley' ),
				'below' => esc_html__( 'Below', 'volley' ),
				'above' => esc_html__( 'Above', 'volley' )
			),
			'required' => array(
				'slider-type',
				'not',
				'no'
			),
			'default' => 'default'
		)
	)
);
