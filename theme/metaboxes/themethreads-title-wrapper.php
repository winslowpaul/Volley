<?php
/*
 * Title Wrapper Section
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
	'post_types' => array( 'post', 'page', 'volley-portfolio' ),
	'title'      => esc_html__( 'Title Wrapper', 'volley' ),
	'icon'       => 'el-icon-cog',
	'fields'     => array(
		array(
			'id'       => 'title-bar-enable',
			'type'	   => 'button_set',
			'title'    => esc_html__( 'Title Wrapper', 'volley' ),
			'options'  => array(
				'on'  => esc_html__( 'On', 'volley' ),
				'0'   => esc_html__( 'Default', 'volley' ),
				'off' => esc_html__( 'Off', 'volley' )
			),
			'default'  => '0'
		),
		array(
			'id'       => 'title-bar-heading',
			'type'     => 'text',
			'title'    => esc_html__( 'Custom Heading', 'volley' ),
			'subtitle' => esc_html__( 'Custom heading will override the default page/post title', 'volley' ),
			'required' => array(
				'title-bar-enable',
				'!=',
				'off'
			),
		),
		array(
			'id'       => 'title-bar-typography-enable',
			'type'	   => 'button_set',
			'title'    => esc_html__( 'Enable Title bar Typography', 'volley' ),
			'options'  => array(
				'on'  => esc_html__( 'On', 'volley' ),
				'0'   => esc_html__( 'Default', 'volley' ),
				'off' => esc_html__( 'Off', 'volley' )
			),
			'default'  => 'off',
			'required' => array(
				'title-bar-enable',
				'!=',
				'off'
			),
		),
		'title-bar-typography' => array(
			'id'             => 'title-bar-typography',
			'title'          => esc_html__( 'Title Bar Heading Typography', 'volley' ),
			'subtitle'       => esc_html__( 'These settings control the typography for the titlebar heading', 'volley' ),
			'type'           => 'typography',
			'text-transform' => true,
			'letter-spacing' => true,
			'text-align'     => false,
			'compiler'       => true,
			'units'          => '%',
			'required' => array(
				'title-bar-typography-enable',
				'!=',
				'off'
			),
		),
		array(
			'id'    => 'title-bar-subheading',
			'type'  => 'text',
			'title' => esc_html__( 'Sub-Heading', 'volley' ),
			'required' => array(
				'title-bar-enable',
				'!=',
				'off'
			),
		),
		array(
			'id'       => 'title-bar-subheading-typography-enable',
			'type'	   => 'button_set',
			'title'    => esc_html__( 'Enable Title bar Typography', 'volley' ),
			'options'  => array(
				'on'  => esc_html__( 'On', 'volley' ),
				'0'   => esc_html__( 'Default', 'volley' ),
				'off' => esc_html__( 'Off', 'volley' )
			),
			'default'  => 'off',
			'required' => array(
				'title-bar-enable',
				'!=',
				'off'
			),
		),
		'title-bar-subheading-typography' => array(
			'id'             => 'title-bar-subheading-typography',
			'title'          => esc_html__( 'Title Bar Subheading Typography', 'volley' ),
			'subtitle'       => esc_html__( 'These settings control the typography for the titlebar subheading', 'volley' ),
			'type'           => 'typography',
			'text-transform' => true,
			'letter-spacing' => true,
			'text-align'     => false,
			'compiler'       => true,
			'units'          => '%',
			'required' => array(
				'title-bar-subheading-typography-enable',
				'!=',
				'off'
			),
		),
		array(
			'type'     => 'slider',
			'id'       => 'title-bar-padding-top',
			'title'    => esc_html__( 'Padding Top', 'volley' ),
			'subtitle' => esc_html__( 'Controls the top padding of the titlebar', 'volley' ),
			'default'  => 200,
			'max'      => 300,
			'required' => array(
				'title-bar-enable',
				'!=',
				'off'
			),
		),
		array(
			'type'     => 'slider',
			'id'       => 'title-bar-padding-bottom',
			'title'    => esc_html__( 'Padding Bottom', 'volley' ),
			'subtitle' => esc_html__( 'Controls the bottom padding of the titlebar', 'volley' ),
			'default'  => 200,
			'max'      => 300,
			'required' => array(
				'title-bar-enable',
				'!=',
				'off'
			),
		),
		array(
			'id'       => 'title-bar-scheme',
			'type'     => 'select',
			'title'    => esc_html__( 'Color scheme', 'volley' ),
			'options'  => array(
				''              => esc_html__( 'Light', 'volley' ),
				'scheme-light'  => esc_html__( 'Dark', 'volley' ),
			),
			'required' => array(
				'title-bar-enable',
				'!=',
				'off'
			),
		),
		array(
			'id'       => 'title-bar-align',
			'type'     => 'select',
			'title'    => esc_html__( 'Alignment', 'volley' ),
			'options' => array(
				'text-left'   => esc_html__( 'Left', 'volley' ),
				'text-center' => esc_html__( 'Center', 'volley' ),
				'text-right'  => esc_html__( 'Right', 'volley' ),
			),
			'required' => array(
				'title-bar-enable',
				'!=',
				'off'
			),
		),
		array(
			'id'       => 'title-bar-bg',
			'type'     => 'background',
			'title'    => esc_html__( 'Background Image', 'volley' ),
			'required' => array(
				'title-bar-enable',
				'!=',
				'off'
			),
		),
		
		array(
			'id'            => 'title-bar-bg-gradient',
			'type'          => 'themethreads_colorpicker',
			'only_gradient' => true,
			'title'    => esc_html__( 'Background Gradient', 'volley' ),
			'subtitle' => esc_html__( 'Overwrites the background image, unless has transparency.', 'volley' ),
			'required' => array(
				'title-bar-enable',
				'!=',
				'off'
			),
		),
		array(
			'id'       => 'title-bar-parallax',
			'type'	   => 'button_set',
			'title'    => esc_html__( 'Enable Parallax?', 'volley' ),
			'options' => array(
				'on'   => esc_html__( 'On', 'volley' ),
				'0'   => esc_html__( 'Default', 'volley' ),
				'off'  => esc_html__( 'Off', 'volley' ),
			),
			'subtitle' => esc_html__( 'The background should have an image', 'volley' ),
			'required' => array(
				'title-bar-enable',
				'!=',
				'off'
			),
		),
		array(
			'id'      => 'title-bar-overlay',
			'type'	  => 'button_set',
			'title'   => esc_html__( 'Enable Overlay', 'volley' ),
			'options' => array(
				'on'   => esc_html__( 'On', 'volley' ),
				'0'   => esc_html__( 'Default', 'volley' ),
				'off'  => esc_html__( 'Off', 'volley' ),
			),
			'default' => 'off',
			'required' => array(
				'title-bar-enable',
				'!=',
				'off'
			),
		),
		array(
			'id'       => 'title-bar-overlay-background',
			'type'     => 'themethreads_colorpicker',
			'title'    => esc_html__( 'Overlay Background', 'volley' ),
			'required' => array(
				'title-bar-overlay',
				'!=',
				'off'
			),
		),
		array(
			'id'      => 'title-bar-breadcrumb',
			'type'    => 'button_set',
			'title'   => esc_html__( 'Enable Breadcrumbs', 'volley' ),
			'options' => array(
				'on'  => esc_html__( 'On', 'volley' ),
				'0'   => esc_html__( 'Default', 'volley' ),
				'off' => esc_html__( 'Off', 'volley' )
			),
			'required' => array(
				'title-bar-enable',
				'!=',
				'off'
			),
		),
		array(
			'id'      => 'title-bar-scroll',
			'type'	  => 'button_set',
			'title'   => esc_html__( 'Enable Scroll Button', 'volley' ),
			'options' => array(
				'on'   => esc_html__( 'On', 'volley' ),
				'0'    => esc_html__( 'Default', 'volley' ),
				'off'  => esc_html__( 'Off', 'volley' ),
			),
			'default' => '',
			'required' => array(
				'title-bar-enable',
				'!=',
				'off'
			),
		),		
		array(
			'id'         => 'title-bar-scroll-color',
			'type'       => 'themethreads_colorpicker',
			'only_solid' => true,
			'title'      => esc_html__( 'Scroll Button Color', 'volley' ),
			'subtitle'   => esc_html__( 'Pick a color for scroll button', 'volley' ),
			'required'   => array(
				'title-bar-scroll',
				'!=',
				'off'
			),
		),
		array(
			'id'       => 'title-bar-scroll-id',
			'type'     => 'text',
			'title'    => esc_html__( 'Anchor ID', 'volley' ),
			'subtitle' => esc_html__( 'Input anchor ID of the section for scroll button', 'volley' ),
			'required' => array(
				'title-bar-scroll',
				'!=',
				'off'
			),
		),
		array(
			'id'=>'title-bar-classes',
			'type' => 'text',
			'title' => esc_html__('Extra classes', 'volley'),
			'required' => array(
				'title-bar-enable',
				'!=',
				'off'
			),
			
		),

	), // #fields
);