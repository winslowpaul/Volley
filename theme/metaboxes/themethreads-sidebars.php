<?php
/*
 * Sidebar Section
*/

$sections[] = array(
	'post_types' => array( 'post', 'page' ),
	'title'      => esc_html__('Sidebars', 'volley'),
	'icon'       => 'el-icon-adjust-alt',
	'fields'     => array(

		array(
			'id'       => 'themethreads-sidebar-one',
			'type'     => 'select',
			'title'    => esc_html__( 'Select Sidebar', 'volley' ),
			'subtitle' => esc_html__( 'Select sidebar that will display on this page. Choose "No Sidebar" for full width.', 'volley' ),
			'options'  => themethreads_helper()->get_sidebars( array( 'none' => esc_html__( 'No Sidebar', 'volley' ), 'main' => esc_html__( 'Main Sidebar', 'volley' ) ) ),
		),

		array(
			'id'       => 'themethreads-sidebar-position',
			'type'     => 'button_set',
			'title'    => esc_html__( 'Sidebar Position', 'volley' ),
			'subtitle' => esc_html__( 'Select the sidebar position. If sidebar 2 is selected, it will display on the opposite side. ', 'volley' ),
			'options'  => array(
				'left'    => esc_html__( 'Left', 'volley' ),
				'0'       => esc_html__( 'Default', 'volley' ),
				'right'   => esc_html__( 'Right', 'volley' )
			),
			'required' => array(
				array( 'themethreads-sidebar-one', 'not', '' ),
				array( 'themethreads-sidebar-one', 'not', 'none' )
			),
			'default' => '0'
		),
	)
);