<?php
/*
 * Portfoli General
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
	'post_types'   => array('volley-portfolio'),
	'separate_box' => true,
	'box_title'    => esc_html__('Portfolio Description', 'volley'),
	'icon'         => 'el-icon-cog',
	'fields'       => array(

		array(
			'id'   => 'portfolio-description',
			'type' => 'editor'
		)
	)
);

$sections[] = array(
	'post_types' => array( 'volley-portfolio' ),
	'title'      => esc_html__('Portfolio General', 'volley'),
	'icon'       => 'el-icon-cog',
	'fields'     => array(
		
		array(
			'id'       => 'portfolio-enable-header',
			'type'	   => 'button_set',
			'title'    => esc_html__( 'Header', 'volley' ),
			'subtitle' => esc_html__( 'Display the header', 'volley' ),
			'options'  => array(
				'on'   => esc_html__( 'On', 'volley' ),
				'0'    => esc_html__( 'Default', 'volley' ),	
				'off'  => esc_html__( 'Off', 'volley' )
			),
			'default' => 'on'
		),
		array(
			'id'       => 'portfolio-subtitle',
			'type'     => 'text',
			'title'    => esc_html__( 'Subtitle', 'volley' ),
			'subtitle' => esc_html__( 'Manage the subtitle of portfolio listing', 'volley' ),
		),
		array(
			'id'       => 'portfolio-style',
			'type'     => 'select',
			'title'    => esc_html__( 'Portfolio Style', 'volley' ),
			'subtitle' => esc_html__( '', 'volley' ),
			'options' => array(
				'default'        => esc_html__( 'Default', 'volley' ),
				'gallery-slider' => esc_html__( 'Carousel', 'volley' ),
			)
		),
		array(
			'id'       => 'portfolio-width',
			'type'     => 'select',
			'title'    => esc_html( 'Width', 'volley' ),
			'subtitle' => esc_html__( 'Defines the width of the featured image on the portfolio listing page', 'volley' ),
			'options'  => array(
				''     => esc_html__( 'Default', 'volley' ),
				'auto' => esc_html__( 'Auto - width determined by thumbnail width', 'volley' ),
				'2'    => esc_html__( '2 columns - 1/6', 'volley' ),
				'3'    => esc_html__( '3 columns - 1/4', 'volley' ),
				'4'    => esc_html__( '4 columns - 1/3', 'volley' ),
				'5'    => esc_html__( '5 columns - 5/12', 'volley' ),
				'6'    => esc_html__( '6 columns - 1/2', 'volley' ),
				'7'    => esc_html__( '7 columns - 7/12', 'volley' ),
				'8'    => esc_html__( '8 columns - 2/3', 'volley' ),
				'9'    => esc_html__( '9 columns - 3/4', 'volley' ),
				'10'   => esc_html__( '10 columns - 5/6', 'volley' ),
				'11'   => esc_html__( '11 columns - 11/12', 'volley' ),
				'12'   => esc_html__( '12 columns - 12/12', 'volley' ),
			)
		),
		array(
			'id'       => '_portfolio_image_size',
			'type'     => 'select',
			'title'    => esc_html__( 'Thumb Dimension', 'volley' ),
			'subtitle' => esc_html__( 'Choose a dimension for your portfolio thumb', 'volley' ),
			'options'  => array(

				'volley-portfolio'          => esc_html__( 'Default - (370 x 300)', 'volley' ),
				'volley-portfolio-sq'       => esc_html__( 'Square - (295 x 295)',     'volley' ),
				'volley-portfolio-big-sq'   => esc_html__( 'Big Square - (600 x 600)', 'volley' ),
				'volley-portfolio-portrait' => esc_html__( 'Portrait - (350 x 500)',   'volley' ),
				'volley-portfolio-wide'     => esc_html__( 'Wide - (600 x 295)',       'volley' ),
				//Packery image sizes
				'themethreads-packery-wide'     => esc_html__( 'Packery Wide - (570 x 370)', 'volley' ),
				'themethreads-packery-portrait' => esc_html__( 'Packery Portrait - (270 x 370)', 'volley' ),
				
			)
		),

	), // #fields
);
