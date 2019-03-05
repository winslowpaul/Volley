<?php
/*
 * Portfolio Meta Section
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
	'post_types' => array( 'volley-portfolio' ),
	'title'      => esc_html__( 'Portfolio Meta', 'volley' ),
	'icon'       => 'el-icon-cog',
	'fields'     => array(

		array(
			'id'       => 'portfolio-social-box-enable',
			'type'	   => 'button_set',
			'title'    => esc_html__( 'Social Sharing Box', 'volley' ),
			'subtitle' => esc_html__( 'Turn on to display the social sharing box on single portfolio posts.', 'volley' ),
			'options'  => array(
				'on'   => esc_html__( 'On', 'volley' ),
				''     => esc_html__( 'Default', 'volley' ),
				'off'  => esc_html__( 'Off', 'volley' )
			),
			'default'  => ''
		),
		array(
			'id'       => 'portfolio-related-enable',
			'type'	   => 'button_set',
			'title'    => esc_html__( 'Related Projects', 'volley' ),
			'subtitle' => esc_html__( 'Turn on to display related projects on single portfolio posts.', 'volley' ),
			'options'  => array(
				'on'   => esc_html__( 'On', 'volley' ),
				''     => esc_html__( 'Default', 'volley' ),	
				'off'  => esc_html__( 'Off', 'volley' )
			),
			'default' => ''
		),
		array(
			'id'       => 'portfolio-related-style',
			'type'	   => 'select',
			'title'    => esc_html__( 'Related Works', 'volley' ),
			'subtitle' => esc_html__( 'Switch on to display related works on single portfolio pages.', 'volley' ),
			'options'  => array(
				'style1'   => esc_html__( 'Style 1', 'volley' ),
				'style2'   => esc_html__( 'Style 2', 'volley' ),
			),
			'required' => array(
				'portfolio-related-enable',
				'equals',
				'on'
			),
			'default' => 'style1'
		),
		array(
			'type'    => 'text',
			'id'      => 'portfolio-related-title',
			'title'   => esc_html__( 'Related Works Title', 'volley' ),
			'default' => '',
			'required' => array(
				'portfolio-related-enable',
				'!=',
				'off'
			)
		),
		array(
			'type'     => 'slider',
			'id'       => 'portfolio-related-number',
			'title'    => esc_html__( 'Number of Related Works', 'volley' ),
			'subtitle' => esc_html__( 'Manages the number of works that display on related works section.', 'volley' ),
			'default'  => 3,
			'max'      => 100,
			'required' => array(
				'portfolio-related-enable',
				'!=',
				'off'
			)
		),
		array(
			'id'       => 'portfolio-enable-date',
			'type'	   => 'button_set',
			'title'    => esc_html__( 'Date', 'volley' ),
			'subtitle' => esc_html__( 'Swtich on to show the date on your portfolio item.', 'volley' ),
			'options'  => array(
				'on'   => esc_html__( 'On', 'volley' ),
				'0'    => esc_html__( 'Default', 'volley' ),	
				'off'  => esc_html__( 'Off', 'volley' )
			),
			'default' => ''
		),
		array(
			'id'    => 'portfolio-date-label',
			'type'  => 'text',
			'title' => esc_html__( 'Label of Date', 'volley' ),
			'subtitle' => esc_html__( 'Translate or change the "date" text. Leave empty for no change.', 'volley' ),
			'required' => array(
				'portfolio-enable-date',
				'!=',
				'off'
			)			
		),

		array(
			'id'    => 'portfolio-date',
			'type'  => 'date',
			'title' => esc_html__( 'Date of Work', 'volley' ),
			'desc'  => esc_html__( 'Overwrites the portfolio post publish date.', 'volley' ),
			'required' => array(
				'portfolio-enable-date',
				'!=',
				'off'
			)			
		),
		array(
			'id'       => 'portfolio-website',
			'type'     => 'text',
			'validate' => 'url',
			'title'    => esc_html__( 'External URL', 'volley' )
		),
		array(
			'id'       => 'portfolio-website-label',
			'type'     => 'text',
			'title'    => esc_html__( 'Label of Button', 'volley' ),
			'default'  => esc_html__( 'Launch', 'volley' ),
		),
		array(
			'id'      => 'portfolio-attributes',
			'type'    => 'multi_text',
			'title'   => esc_html__( 'Attributes', 'volley' ),
			'desc'    => esc_html__( 'Add custom portfolio attributes. Divide by | label with value ( Label | Value )', 'volley' ),
			'show_empty' => false,
			'default' => array(
				'Client | ThemeThreads Themes',
			),
		),

	), // #fields
);