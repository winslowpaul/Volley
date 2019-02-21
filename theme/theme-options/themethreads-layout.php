<?php
/*
 * Layout Section
*/

$this->sections[] = array(

	'title'  => esc_html__( 'Layout', 'volley' ),
	'icon'   => 'el-icon-website',
	'fields' => array(

		array(
			'id'        => 'page-layout',
			'type'      => 'button_set',
			'title'     => esc_html__( 'Layout', 'volley' ),
			'subtitle'  => esc_html__( 'Controls the site layout', 'volley' ),
			'options'   => array(
				'boxed'    => esc_html__( 'Boxed', 'volley' ),
				'wide'     => esc_html__( 'Wide', 'volley' ),
			),
			'default'   => 'wide'
		),
		array(
			'type'     => 'slider',
			'id'       => 'site-width',
			'title'    => esc_html__( 'Site Width', 'volley' ),
			'subtitle' => esc_html__( 'Set the site width', 'volley' ),
			'default'  => 1170,
			'max'      => 1400,
			'min'      => 960,
		),
		array(
			'id'        => 'body-shadow',
			'type'      => 'select',
			'title'     => esc_html__( 'Body Shadow', 'volley' ),
			'subtitle'  => esc_html__( 'Select a style for shadow', 'volley' ),
			'options'   => array(
				''                           => esc_html__( 'None', 'volley' ),
				'site-boxed-layout-shadow-1' => esc_html__( '1', 'volley' ),
				'site-boxed-layout-shadow-2' => esc_html__( '2', 'volley' ),
				'site-boxed-layout-shadow-3' => esc_html__( '3', 'volley' ),
			),
			'required' => array(
				'page-layout',
				'equals',
				'boxed'
			),
		),
		//Body Background
		array(
			'id'       => 'body-background',
			'type'     => 'themethreads_colorpicker',
			'title'    => esc_html__( 'Body Background Color', 'volley' ),
			'required' => array(
				'page-layout',
				'equals',
				'boxed'
			),
		),
		array(
			'id'       => 'body-background-image',
			'type'     => 'background',
			'background-color' => false,
			'preview'  => false,
			'title'   => esc_html__( 'Body Background Image', 'volley' ),
			'required' => array(
				'page-layout',
				'equals',
				'boxed'
			),
		),
		array(
			'id'        => 'body-color-scheme',
			'type'      => 'select',
			'title'     => esc_html__( 'Page Color Scheme', 'volley' ),
			'subtitle'  => esc_html__( 'Manages the color scheme across your website.', 'volley' ),
			'options'   => array(
				''      => esc_html__( 'Default', 'volley' ),
				'light'    => esc_html__( 'Light - (dark background and light content)', 'volley' ),
				'dark'     => esc_html__( 'Dark - (light background and dark content)', 'volley' ),
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
			'id'    => 'vc-row-default-margins',
			'type'  => 'spacing',
			'title'     => esc_html__( 'Row Margins', 'volley' ),
			'subtitle'  => esc_html__( 'Manages row margins', 'volley' ),
			'mode'  => 'margin',
			'left' => false,
			'right' => false,
			'units' => 'px',
		),
		array(
			'id'    => 'vc-row-default-padding',
			'type'  => 'spacing',
			'title'     => esc_html__( 'Row Padding', 'volley' ),
			'subtitle'  => esc_html__( 'Manages the rows padding', 'volley' ),
			'mode'  => 'padding',
			'units' => 'px',
		),

	)
);