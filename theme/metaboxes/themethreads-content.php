<?php
/*
 * Content Section
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
	'post_types' => array( 'page' ),
	'title'      => esc_html__( 'Content', 'volley' ),
	'desc'       => esc_html__( 'Change the content section configuration.', 'volley' ),
	'icon'       => 'el-icon-lines',
	'fields'     => array(
		array(
			'id'        => 'page-margin-local',
			'type'      => 'select',
			'title'     => esc_html__( 'Content Padding', 'volley' ),
			'subtitle'  => esc_html__( 'Select desired padding for the content', 'volley' ),
			'options'   => array(
				''      => esc_html__( 'Default', 'volley' ),
				'section-no-padding'     => esc_html__( 'No padding', 'volley' ),
				'section-padding-top'    => esc_html__( 'Only padding top', 'volley' ),
				'section-padding-bottom' => esc_html__( 'Only padding bottom', 'volley' ),
			),
			'default' => '',
		),
	),
);