<?php
/*
 * Title Wrapper Section
*/

// Title Bar
$this->sections[] = array(
	'title'      => esc_html__( 'Page Title Bar', 'volley' ),
	'icon'       => 'el el-indent-right',
	//'subsection' => true,
	'fields'     => array(
		array(
			'id'       => 'title-bar-enable',
			'type'	   => 'button_set',
			'title'    => esc_html__( 'Title Bar', 'volley' ),
			'subtitle' => esc_html__( 'Switch off to hide the title bar on your website.', 'volley' ),
			'options'  => array(
				'on'  => esc_html__( 'On', 'volley' ),
				'off' => esc_html__( 'Off', 'volley' )
			),
			'default'  => 'off'
		),
		array(
			'id'       => 'title-bar-heading',
			'type'     => 'text',
			'title'    => esc_html__( 'Custom Page Title', 'volley' ),
			'subtitle' => esc_html__( 'Custom page title will override the default page and post titles', 'volley' ),
		),
		array(
			'id'       => 'title-bar-typography-enable',
			'type'	   => 'button_set',
			'title'    => esc_html__( 'Page Title Custom Typography', 'volley' ),
			'options'  => array(
				'on'  => esc_html__( 'On', 'volley' ),
				'off' => esc_html__( 'Off', 'volley' )
			),
			'default'  => 'off',

		),
		'title-bar-typography' => array(
			'id'             => 'title-bar-typography',
			'title'          => esc_html__( 'Page Title Typography', 'volley' ),
			'subtitle'       => esc_html__( 'Manages the typography for the page title', 'volley' ),
			'type'           => 'typography',
			'text-transform' => true,
			'letter-spacing' => true,
			'text-align'     => false,
			'compiler'       => true,
			'units'          => '%',
			'required' => array(
				'title-bar-typography-enable',
				'equals',
				'on'
			),
		),
		array(
			'id'    => 'title-bar-subheading',
			'type'  => 'text',
			'title' => esc_html__( 'Page Subtitle', 'volley' ),

		),
		array(
			'id'       => 'title-bar-subheading-typography-enable',
			'type'	   => 'button_set',
			'title'    => esc_html__( 'Page Subtitle Custom Typography', 'volley' ),
			'options'  => array(
				'on'  => esc_html__( 'On', 'volley' ),
				'off' => esc_html__( 'Off', 'volley' )
			),
			'default'  => 'off',

		),
		'title-bar-subheading-typography' => array(
			'id'             => 'title-bar-subheading-typography',
			'title'          => esc_html__( 'Page Subtitle Typography', 'volley' ),
			'subtitle'       => esc_html__( 'Manages the typography for the page subtitle', 'volley' ),
			'type'           => 'typography',
			'text-transform' => true,
			'letter-spacing' => true,
			'text-align'     => false,
			'compiler'       => true,
			'units'          => '%',
			'required' => array(
				'title-bar-subheading-typography-enable',
				'equals',
				'on'
			),
		),
		array(
			'type'     => 'slider',
			'id'       => 'title-bar-padding-top',
			'title'    => esc_html__( 'Padding Top', 'volley' ),
			'subtitle' => esc_html__( 'Manages the top padding of the titlebar', 'volley' ),
			'default'  => 200,
			'max'      => 300,
		),
		array(
			'type'     => 'slider',
			'id'       => 'title-bar-padding-bottom',
			'title'    => esc_html__( 'Padding Bottom', 'volley' ),
			'subtitle' => esc_html__( 'Manages the bottom padding of the titlebar', 'volley' ),
			'default'  => 200,
			'max'      => 300,
		),
		array(
			'id'       => 'title-bar-scheme',
			'type'     => 'select',
			'title'    => esc_html__( 'Color scheme', 'volley' ),
			'options'  => array(
				''              => esc_html__( 'Light', 'volley' ),
				'scheme-light'  => esc_html__( 'Dark', 'volley' ),
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
		),
		array(
			'id'       => 'title-bar-bg',
			'type'     => 'background',
			'title'    => esc_html__( 'Background Image', 'volley' ),
		),
		
		array(
			'id'            => 'title-bar-bg-gradient',
			'type'          => 'themethreads_colorpicker',
			'only_gradient' => true,
			'title'    => esc_html__( 'Background Gradient', 'volley' ),
			'subtitle' => esc_html__( 'Overwrites the background image, unless has transparency.', 'volley' ),
		),
		array(
			'id'       => 'title-bar-parallax',
			'type'	   => 'button_set',
			'title'    => esc_html__( 'Parallax', 'volley' ),
			'options' => array(
				'on'   => esc_html__( 'On', 'volley' ),
				'off'  => esc_html__( 'Off', 'volley' ),
			),
			'subtitle' => esc_html__( 'The background should have an image', 'volley' ),
			'default' => 'off',
		),
		array(
			'id'      => 'title-bar-overlay',
			'type'	  => 'button_set',
			'title'   => esc_html__( 'Overlay', 'volley' ),
			'options' => array(
				'on'   => esc_html__( 'On', 'volley' ),
				'off'  => esc_html__( 'Off', 'volley' ),
			),
			'default' => 'off',
		),
		array(
			'id'       => 'title-bar-overlay-background',
			'type'     => 'themethreads_colorpicker',
			'title'    => esc_html__( 'Overlay Background', 'volley' ),
			'required' => array(
				'title-bar-overlay',
				'equals',
				'on'
			),
		),
		array(
			'id'      => 'title-bar-breadcrumb',
			'type'    => 'button_set',
			'title'   => esc_html__( 'Breadcrumbs', 'volley' ),
			'options' => array(
				'on'  => esc_html__( 'On', 'volley' ),
				'off' => esc_html__( 'Off', 'volley' )
			),
		),
		array(
			'id'      => 'title-bar-scroll',
			'type'	  => 'button_set',
			'title'   => esc_html__( 'Scroll Button', 'volley' ),
			'options' => array(
				'on'   => esc_html__( 'On', 'volley' ),
				'off'  => esc_html__( 'Off', 'volley' ),
			),
			'default' => '',
		),		
		array(
			'id'         => 'title-bar-scroll-color',
			'type'       => 'themethreads_colorpicker',
			'only_solid' => true,
			'title'      => esc_html__( 'Scroll Button Color', 'volley' ),
			'subtitle'   => esc_html__( 'Choose a color for scroll button', 'volley' ),
			'required'   => array(
				'title-bar-scroll',
				'equals',
				'on'
			),
		),
		array(
			'id'       => 'title-bar-scroll-id',
			'type'     => 'text',
			'title'    => esc_html__( 'Anchor ID', 'volley' ),
			'subtitle' => esc_html__( 'Anchor ID of the section where the page will be scrolled on click to the scroll button', 'volley' ),
			'required' => array(
				'title-bar-scroll',
				'equals',
				'on'
			),
		),
		array(
			'id'=>'title-bar-classes',
			'type' => 'text',
			'title' => esc_html__( 'Extra classes', 'volley' ),
			
		),
	)
);
