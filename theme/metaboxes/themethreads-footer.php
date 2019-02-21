<?php
/*
 * Footer Section
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
	'title' => esc_html__('Footer', 'volley'),
	'icon' => 'el-icon-cog',
	'fields' => array(

		array(
			'id'       => 'footer-enable-switch',
			'type'	   => 'button_set',
			'title'    => esc_html__( 'Footer', 'volley' ),
			'subtitle' => esc_html__( 'If on, this layout part will be displayed.', 'volley' ),
			'options'  => array(
				'on'  => esc_html__( 'On', 'volley' ),
				'0'   => esc_html__( 'Default', 'volley' ),
				'off' => esc_html__( 'Off', 'volley' ),
			)
		),

		array(
			'id'       => 'footer-template',
			'type'     => 'select',
			'title'    => esc_html__( 'Footer Style', 'volley' ),
			'subtitle' => esc_html__( 'Choose the footer style amongst you created, selecting a footer will overwrite the theme options.', 'volley' ),
			'data' => 'post',
			'args' => array(
				'post_type'      => 'themethreads-footer',
				'posts_per_page' => -1
			),
			'required'  => array( 
				'footer-enable-switch', 
				'!=', 
				'off' 
			),
		)

	), // #fields
);
