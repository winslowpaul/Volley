<?php
$this->sections[] = array(
	'title'      => esc_html__( 'Mobile Navigation', 'volley' ),
	'subsection' => true,
	'fields'     => array(
		
		array(
			'id'      => 'm-nav-style',
			'type'	  => 'select',
			'title'   => esc_html__( 'Style', 'volley' ),
			'description' => esc_html__( 'for the mobile version of the website', 'volley' ),
			'options' => array(
				'classic' => esc_html__( 'Classic', 'volley' ),
				'minimal' => esc_html__( 'Minimal', 'volley' ),
				'modern'  => esc_html__( 'Modern', 'volley' ),
			),
		),
		array(
			'id'      => 'm-nav-trigger-alignment',
			'type'	  => 'select',
			'title'   => esc_html__( 'Trigger Alignment', 'volley' ),
			'description' => esc_html__( 'for the mobile version of the website', 'volley' ),
			'options' => array(
				'right' => esc_html__( 'Right', 'volley' ),
				'left'  => esc_html__( 'Left', 'volley' ),
			),
		),
		array(
			'id'      => 'm-nav-alignment',
			'type'	  => 'select',
			'title'   => esc_html__( 'Navigation Alignment', 'volley' ),
			'description' => esc_html__( 'for the mobile version of the website', 'volley' ),
			'options' => array(
				'right' => esc_html__( 'Right', 'volley' ),
				'left'  => esc_html__( 'Left', 'volley' ),
			),
			'required' => array(
				'm-nav-style',
				'=',
				array( 'classic', 'minimal' )
			),
		),
		array(
			'id'      => 'm-nav-scheme',
			'type'	  => 'select',
			'title'   => esc_html__( 'Color Scheme', 'volley' ),
			'description' => esc_html__( 'of the mobile version of the website', 'volley' ),
			'options' => array(
				'gray' => esc_html__( 'Gray', 'volley' ),
				'light' => esc_html__( 'Light', 'volley' ),
				'dark'  => esc_html__( 'Dark', 'volley' ),
				'custom' => esc_html__( 'Custom', 'volley' ),
			),
			'required' => array(
				'm-nav-style',
				'=',
				array( 'classic', 'minimal' )
			),
		),
		array(
			'id'          => 'm-nav-custom-bg',
			'type'        => 'themethreads_colorpicker',
			'title'       => esc_html__( 'Navigation Background', 'volley' ),
			'description' => esc_html__( 'of the mobile version of the website', 'volley' ),
			'required'    => array(
				'm-nav-scheme',
				'=',
				array( 'custom' )
			),
		),
		array(
			'id'          => 'm-nav-custom-color',
			'type'        => 'themethreads_colorpicker',
			'only_solid'  => true,
			'title'       => esc_html__( 'Navigation Text/Trigger Color', 'volley' ),
			'description' => esc_html__( 'of the mobile version of the website', 'volley' ),
			'required'    => array( 'm-nav-scheme', '=', array( 'custom' ) ),
		),
		array(
			'id'          => 'm-nav-modern-bg',
			'type'        => 'themethreads_colorpicker',
			'title'       => esc_html__( 'Navigation Background', 'volley' ),
			'description' => esc_html__( 'of the mobile version of the website', 'volley' ),
			'required'    => array( 'm-nav-style', '=', 'modern' ),
		),
		array(
			'id'          => 'm-nav-modern-color',
			'type'        => 'themethreads_colorpicker',
			'only_solid'  => true,
			'title'       => esc_html__( 'Navigation Text/Trigger Color', 'volley' ),
			'description' => esc_html__( 'of the mobile version of the website', 'volley' ),
			'required'    => array( 'm-nav-style', '=', 'modern' ),
		),
		array(
			'id'          => 'm-nav-border-color',
			'type'        => 'themethreads_colorpicker',
			'only_solid'  => true,
			'title'       => esc_html__( 'Navigation Border Color', 'volley' ),
			'description' => esc_html__( 'of the mobile version of the website', 'volley' ),
			'required'    => array( 
				array( 'm-nav-style', '=', 'classic' ), 
				array( 'm-nav-scheme', '=', array( 'custom' ) ), 
			),
		),
		
		array(
			'id'      => 'm-nav-header-scheme',
			'type'	  => 'select',
			'title'   => esc_html__( 'Header Color Scheme', 'volley' ),
			'description' => esc_html__( 'of the mobile version of the website', 'volley' ),
			'options' => array(
				'light' => esc_html__( 'Light', 'volley' ),
				'gray' => esc_html__( 'Gray', 'volley' ),
				'dark'  => esc_html__( 'Dark', 'volley' ),
				'custom' => esc_html__( 'Custom', 'volley' ),
			),
		),
		array(
			'id'          => 'm-nav-header-custom-bg',
			'type'        => 'themethreads_colorpicker',
			'title'       => esc_html__( 'Header Background', 'volley' ),
			'description' => esc_html__( 'of the mobile version of the website', 'volley' ),
			'required'    => array(
				'm-nav-header-scheme',
				'=',
				array( 'custom' )
			),
		),
		array(
			'id'          => 'm-nav-header-custom-color',
			'type'        => 'themethreads_colorpicker',
			'only_solid'  => true,
			'title'       => esc_html__( 'Header Text/Trigger Color', 'volley' ),
			'description' => esc_html__( 'of the mobile version of the website', 'volley' ),
			'required'    => array(
				'm-nav-header-scheme',
				'=',
				array( 'custom' )
			),
		),
		array(
			'id'      => 'm-nav-enable-secondary-bar',
			'type'	  => 'button_set',
			'title'   => esc_html__( 'Show secondary bar of the header', 'volley' ),
			'options' => array(
				'no'  => esc_html__( 'No', 'volley' ),
				'yes' => esc_html__( 'Yes', 'volley' ),
			),
		),

	)
);