<?php
/*
 * Header Section
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
	'post_types' => array( 'themethreads-header' ),
	'title'      => esc_html__( 'Header Design Options', 'volley' ),
	'icon'       => 'el-icon-cog',
	'fields'     => array(
		
		array(
			'id'      => 'header-layout',
			'type'	  => 'select',
			'title'   => esc_html__( 'Style', 'volley' ),
			'options' => array(
				'default'    => esc_html__( 'Default', 'volley' ),
				'fullscreen' => esc_html__( 'Fullscreen', 'volley' ),
				'side'       => esc_html__( 'Side 1', 'volley' ),
				'side-3'     => esc_html__( 'Side 2', 'volley' ),
			),
			'default' => 'default'
		),
		array(
			'id'    => 'header-fullscreen-nav-bg',
			'type'  => 'themethreads_colorpicker',
			'title' => esc_html__( 'Navigation Background', 'volley' ),
			'required' => array(
				'header-layout',
				'equals',
				'fullscreen'
			),
		),
		array(
			'id'      => 'header-megamenu-react',
			'type'	  => 'button_set',
			'title'   => esc_html__( 'Enable Megamenu Reaction?', 'volley' ),
			'description' => esc_html__( 'Enable if you want to add backround animation to header when hover the megamenu item', 'volley' ),
			'options' => array(
				'no'  => esc_html__( 'No', 'volley' ),
				'yes' => esc_html__( 'Yes', 'volley' ),
			),
			'default' => 'no',
			'required' => array(
				array( 'header-layout', 'not', 'side' ),
				array( 'header-layout', 'not', 'side-3' ),
			),
		),
		array(
			'id'      => 'header-sticky',
			'type'	  => 'button_set',
			'title'   => esc_html__( 'Enable Sticky Header?', 'volley' ),
			'options' => array(
				'no'  => esc_html__( 'No', 'volley' ),
				'yes' => esc_html__( 'Yes', 'volley' ),
			),
			'default' => 'no',
			'required' => array(
				array( 'header-layout', 'not', 'side' ),
				array( 'header-layout', 'not', 'side-3' ),
			),
		),
		array(
			'id'      => 'header-sticky-pos',
			'type'	  => 'select',
			'title'   => esc_html__( 'Sticky Header Position', 'volley' ),
			'options' => array(
				'default'       => esc_html__( 'Default - Bottom of the header', 'volley' ),
				'after-section' => esc_html__( 'After first section', 'volley' ),
			),
			'default' => 'default',
			'required' => array(
				'header-sticky',
				'equals',
				'yes'
			),
		),
		array(
			'id'    => 'header-sticky-bg',
			'type'  => 'themethreads_colorpicker',
			'title' => esc_html__( 'Sticky Header Background', 'volley' ),
			'required' => array(
				'header-sticky',
				'equals',
				'yes'
			),
		),
		array(
			'id'    => 'header-sticky-color',
			'type'  => 'themethreads_colorpicker',
			'only_solid' => true,
			'title' => esc_html__( 'Sticky Header Color', 'volley' ),
			'required' => array(
				'header-sticky',
				'equals',
				'yes'
			),
		),
		array(
			'id'    => 'header-sticky-hover-color',
			'type'  => 'themethreads_colorpicker',
			'only_solid' => true,
			'title' => esc_html__( 'Sticky Header Hover Color', 'volley' ),
			'required' => array(
				'header-sticky',
				'equals',
				'yes'
			),
		),
		array(
			'id'      => 'header-overlay',
			'type'	  => 'select',
			'title'   => esc_html__( 'Overlay?', 'volley' ),
			'options' => array(
				''    => esc_html__( 'No', 'volley' ),
				'main-header-overlay' => esc_html__( 'Yes', 'volley' ),
			),
			'required' => array(
				array( 'header-layout', 'not', 'side' ),
				array( 'header-layout', 'not', 'side-3' ),
			),
			'default' => ''
		),

	)
);
$sections[] = array(
	'post_types' => array( 'themethreads-header' ),
	'title'      => esc_html__( 'Mobile Navigation', 'volley' ),
	'icon'       => 'el-icon-cog',
	'fields'     => array(
		
		array(
			'id'      => 'm-nav-style',
			'type'	  => 'select',
			'title'   => esc_html__( 'Style', 'volley' ),
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
			'options' => array(
				'right' => esc_html__( 'Right', 'volley' ),
				'left'  => esc_html__( 'Left', 'volley' ),
			),
		),
		array(
			'id'      => 'm-nav-alignment',
			'type'	  => 'select',
			'title'   => esc_html__( 'Navigation Alignment', 'volley' ),
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
			'required'    => array(
				'm-nav-scheme',
				'=',
				array( 'custom' )
			),
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
			'id'      => 'mobile-header-overlay',
			'type'	  => 'select',
			'title'   => esc_html__( 'Enable Overlay on mobile device?', 'volley' ),
			'options' => array(
				''    => esc_html__( 'No', 'volley' ),
				'yes' => esc_html__( 'Yes', 'volley' ),
			),
			'required' => array(
				'header-overlay',
				'equals',
				'main-header-overlay'
			),
			'default' => ''
		),
		array(
			'id'      => 'm-nav-enable-secondary-bar',
			'type'	  => 'button_set',
			'title'   => esc_html__( 'Show secondary bar of the header', 'volley' ),
			'options' => array(
				'no'  => esc_html__( 'No', 'volley' ),
				'0'   => esc_html__( 'Default', 'volley' ),
				'yes' => esc_html__( 'Yes', 'volley' ),
			),
		),

	)
);