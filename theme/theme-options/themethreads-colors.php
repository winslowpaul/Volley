<?php
// General Setting
$this->sections[] = array(
	'title'      => esc_html__( 'Colors', 'volley' ),
	'icon'       => 'el el-brush',
	'fields'     => array(
		array(
			'id'      => 'primary_ac_color',
			'type'    => 'color',
			'title'   => esc_html__( 'Primary color' , 'volley' ),
			'subtile' => '',
			'desc'    => esc_html__( 'Choose a primary color for your website by using the colorpicker', 'volley' ),
			'default' => '#662a9c',

		),
		array(
			'id'      => 'secondary_ac_color',
			'type'    => 'color',
			'title'   => esc_html__( 'Secondary color' , 'volley' ),
			'subtile' => '',
			'desc'    => esc_html__( 'Choose a primary color for your website by using the colorpicker', 'volley' ),
		),
		array(
			'id'      => 'primary_gradient_color',
			'type'    => 'color_gradient',
			'title'   => esc_html__( 'Primary Gradient color' , 'volley' ),
			'subtile' => '',
			'desc'    => esc_html__( 'Choose colors to generate a primary gradient color for your website by using the colorpicker', 'volley' ),
			'validate' => 'color',
			'default' => array(
				'from' => '#662a9c',
				'to'   => '#ab46a3',
				
			)
		),
		array(
			'id'    => 'links_color',
			'type'  => 'link_color',
			'title' => esc_html__( 'Links Color', 'volley' ),
			'active' => false,
			'visited' => false,
		),
		
	)
);
