<?php
/*
 * Responsive rules
*/

// Responsivness
$this->sections[] = array(
	'title'      => esc_html__( 'Responsive', 'volley' ),
	'icon'       => 'el el-resize-horizontal',
	'fields'     => array(
		array(
			'type'     => 'slider',
			'id'       => 'media-mobile-nav',
			'title'    => esc_html__( 'Mobile Navigation Breakpoint', 'volley' ),
			'subtitle' => esc_html__( 'Set the breakpoint for the mobile navigation', 'volley' ),
			'default'  => 1199,
			'max'      => 1199,
			'min'      => 767,
		),
	)
);
