<?php
/*
 * General Section
 *
 * Available options on $section array:
 * separate_box (boolean) - separate metabox is created if true
 * box_title - title for separate metabox
 * title - section title
 * desc - section description
 * icon - section icon
 * fields - fields, @see https://docs.reduxframework.com/ for details
*/

$sections[] = array(
	'post_types' => array( 'post', 'page', 'themethreads-portfolio' ),
	'title'      => esc_html__('Page', 'volley'),
	'icon'       => 'el-icon-adjust-alt',
	'fields'     => array(
		
		array(
			'id'        => 'body-color-scheme',
			'type'      => 'select',
			'title'     => esc_html__( 'Page Color Scheme', 'volley' ),
			'subtitle'  => esc_html__( 'Select a color scheme for the page', 'volley' ),
			'options'   => array(
				''      => esc_html__( 'Dark - (light background and dark content)', 'volley' ),
				'light' => esc_html__( 'Light - (dark background and light content)', 'volley' ),
			),
		),

		//Content Background
		array(
			'id'       => 'page-content-bg',
			'type'     => 'background',
			'preview'  => false,
			'title'   => esc_html__( 'Content Background', 'volley' ),
		),
		array(
			'id'            => 'page-content-gradient',
			'type'          => 'themethreads_colorpicker',
			'only_gradient' => true,
			'title' => esc_html__( 'Content Background Gradient', 'volley' ),
			'subtitle' => esc_html__( 'Overwrites the background image, unless has transparency.', 'volley' ),
		),
		array(
			'id'       => 'page-enable-stack',
			'type'	   => 'button_set',
			'title'    => esc_html__( 'Enable Page Blocks?', 'volley' ),
			'subtitle' => esc_html__( 'Will enable page stack', 'volley' ),
			'options'  => array(
				'on'   => esc_html__( 'On', 'volley' ),
				'off'  => esc_html__( 'Off', 'volley' ),
			),
			'default'  => 'off'
		),
		array(
			'id'       => 'page-stack-effect',
			'type'	   => 'select',
			'title'    => esc_html__( 'Page Blocks Effect', 'volley' ),
			'subtitle' => esc_html__( 'Select an effect for the section transition', 'volley' ),
			'options'  => array(
				''     => esc_html__( 'None', 'volley' ),
				'fadeScale'  => esc_html__( 'fadeScale', 'volley' ),
				'slideOver'  => esc_html__( 'slideOver', 'volley' ),
			),
			'required' => array(
				'page-enable-stack',
				'equals',
				'on'
			),
		),
		array(
			'id'       => 'page-stack-nav',
			'type'	   => 'button_set',
			'title'    => esc_html__( 'Page Blocks Navigation?', 'volley' ),
			'subtitle' => esc_html__( 'Will enable page blocks navigation', 'volley' ),
			'options'  => array(
				'on'   => esc_html__( 'On', 'volley' ),
				'off'  => esc_html__( 'Off', 'volley' ),
			),
			'required' => array(
				'page-enable-stack',
				'equals',
				'on'
			),
		),
		array(
			'id'       => 'page-stack-nav-prevnextbuttons',
			'type'	   => 'button_set',
			'title'    => esc_html__( 'Page Blocks Previous/Next buttons?', 'volley' ),
			'options'  => array(
				'on'   => esc_html__( 'On', 'volley' ),
				'off'  => esc_html__( 'Off', 'volley' ),
			),
			'required' => array(
				'page-enable-stack',
				'equals',
				'on'
			),
		),
		array(
			'id'       => 'page-stack-buttons-style',
			'type'	   => 'select',
			'title'    => esc_html__( 'Buttons Style', 'volley' ),
			'subtitle' => esc_html__( 'Select style for the buttons', 'volley' ),
			'options'  => array(
				'threads-stack-buttons-style-1' => esc_html__( 'Style 1', 'volley' ),
				'threads-stack-buttons-style-2' => esc_html__( 'Style 2', 'volley' ),
			),
			'required' => array(
				'page-stack-nav-prevnextbuttons',
				'equals',
				'on'
			),
		),
		
		array(
			'id'       => 'page-stack-numbers',
			'type'	   => 'button_set',
			'title'    => esc_html__( 'Page Blocks Numbers?', 'volley' ),
			'options'  => array(
				'on'   => esc_html__( 'On', 'volley' ),
				'off'  => esc_html__( 'Off', 'volley' ),
			),
			'required' => array(
				'page-enable-stack',
				'equals',
				'on'
			),
		),
	)
);
