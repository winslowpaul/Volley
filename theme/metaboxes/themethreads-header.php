<?php

/*
 * Header Section
 *
 * Available options on $section array:
 * separate_box (avelean) - separate metabox is created if true
 * box_title - title for separate metabox
 * title - section title
 * desc - section description
 * icon - section icon
 * fields - fields, @see https://docs.reduxframework.com/ for details
*/

$sections[] = array(
	'post_types' => array( 'post', 'page', 'volley-portfolio' ),
	'title'      => esc_html__( 'Header', 'volley' ),
	'icon'       => 'el-icon-cog',
	'fields'     => array(

		array(
			'id'       => 'header-enable-switch',
			'type'	   => 'button_set',
			'title'    => esc_html__( 'Header', 'volley' ),
			'options'  => array(
				'on'   => esc_html__( 'On', 'volley' ),
				''     => esc_html__( 'Default', 'volley' ),
				'off'  => esc_html__( 'Off', 'volley' ),
			),
			'default'  => ''
		),
		array(
 			'id'       => 'header-template',
 			'type'     => 'select',
 			'title'    => esc_html__( 'Header Style', 'volley'),
 			'subtitle' => esc_html__( 'Choose the header style amongst your headers, this option will overwrite the default header.', 'volley' ),
 			'data'     => 'post',
			'args'     => array( 
				'post_type'      => 'themethreads-header', 
				'posts_per_page' => -1 
			)
 		),

	), // #fields
);