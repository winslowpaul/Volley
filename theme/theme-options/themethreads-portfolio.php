<?php
/*
 * Portfolio
 */

$this->sections[] = array(
	'title'  => esc_html__( 'Portfolio', 'volley' ),
	'icon'   => 'el el-th-large'
);

$this->sections[] = array(
	'title'      => esc_html__( 'General', 'volley' ),
	'subsection' => true,
	'fields'     => array(
		
		array(
			'id'       => 'portfolio-title-bar-enable',
			'type'	   => 'button_set',
			'title'    => esc_html__( 'Enable Portfolio Archive Page Title', 'volley' ),
			'subtitle' => esc_html__( 'Display the portfolio archive page title.', 'volley' ),
			'options'  => array(
				'on'   => esc_html__( 'On', 'volley' ),
				'off'  => esc_html__( 'Off', 'volley' )
			),
			'default'  => 'on'
		),
		array(
			'id'       => 'portfolio-title-bar-heading',
			'type'	   => 'text',
			'title'    => esc_html__( 'Portfolio Archive Page Title', 'volley' ),
			'desc'     => esc_html__( '[ld_category_title] shortcode displays the corresponding category title, any text can be added before or after the shortcode.', 'volley' ),
			'subtitle' => esc_html__( 'Manage the title of portfolio archive pages.', 'volley' ),
			'default'  => esc_html__( '[ld_category_title]', 'volley' ),
		),

		array(
			'id'      => 'portfolio-style',
			'type'    => 'select',
			'title'   => esc_html__( 'Portfolio Style', 'volley' ),
			'options' => array(
				'metro'              => esc_html__( 'Metro', 'volley' ),
				'masonry-classic'    => esc_html__( 'Masonry Classic', 'volley' ),
				'masonry-creative'   => esc_html__( 'Masonry Creative', 'volley' ),
				'grid'               => esc_html__( 'Grid', 'volley' ),
				'grid-alt'           => esc_html__( 'Grid Alt', 'volley' ),
				'grid-caption'       => esc_html__( 'Grid Caption', 'volley' ),
				'grid-hover-3d'      => esc_html__( 'Grid Hover 3D', 'volley' ),
				'packery'            => esc_html__( 'Packery', 'volley' ),

			),
			'default'  => 'metro'
		),
		array(
			'id'       => 'portfolio-horizontal-alignment',
			'type'     => 'select',
			'title'    => esc_html__( 'Horizontal Alignment', 'volley' ),
			'subtitle' => esc_html__( 'Content horizontal alignment', 'volley' ),
			'options' => array(
				''                 => esc_html__( 'Default', 'volley' ),
				'pf-details-h-str' => esc_html__( 'Left', 'volley' ),
				'pf-details-h-mid' => esc_html__( 'Center', 'volley' ),
				'pf-details-h-end' => esc_html__( 'Right', 'volley' ),
			),
			'required' => array(
				'portfolio-style',
				'!=',
				array( 
					'grid-alt',
				),
			),
		),
		array(
			'id'       => 'portfolio-vertical-alignment',
			'type'     => 'select',
			'title'    => esc_html__( 'Vertical Alignment', 'volley' ),
			'subtitle' => esc_html__( 'Content vertical alignment', 'volley' ),
			'options' => array(
				'' => esc_html__( 'Default', 'volley' ),
				'pf-details-v-str' => esc_html__( 'Top', 'volley' ),
				'pf-details-v-mid' => esc_html__( 'Middle', 'volley' ),
				'pf-details-v-end' => esc_html__( 'Bottom', 'volley' ),
			),
			'required' => array(
				'portfolio-style',
				'!=',
				array( 
					'grid-alt',
				),
			),
		),
		array(
			'id' => 'portfolio-grid-columns',
			'type' => 'select',
			'title' => esc_html__( 'Columns', 'volley' ),
			'options' => array(
				'1' => '1 Column',
				'2' => '2 Columns',
				'3' => '3 Columns',
				'4' => '4 Columns',
				'6' => '6 Columns',
			),
			'required' => array(
				'portfolio-style',
				'equals',
				array( 
					'grid', 
					'grid-alt',
					'grid-caption', 
					'grid-hover-3d',
					'masonry-creative', 
					'masonry-classic' 
				),
			),
		),
		array(
			'id'    => 'portfolio-columns-gap',
			'type'  => 'slider',
			'title' => esc_html__( 'Columns gap', 'volley' ),
			'min'     => 0,
			'max'     => 35,
			'default' => 15,
		),
		array(
			'id'       => 'portfolio-enable-parallax',
			'type'	   => 'switch',
			'title'    => esc_html__( 'Enable parallax?', 'volley' ),
			'subtitle' => esc_html__( 'Parallax for images', 'volley' ),
			'default'  => false
		),
	)
);

$this->sections[] = array(
	'title'      => esc_html__( 'Portfolio Single', 'volley' ),
	'subsection' => true,
	'fields'     => array(

		array(
			'id'       => 'portfolio-likes-enable',
			'type'	   => 'button_set',
			'title'    => esc_html__( 'Like Button', 'volley' ),
			'subtitle' => esc_html__( 'Switch on to display the like button on single portfolio pages.', 'volley' ),
			'options'  => array(
				'on'   => esc_html__( 'On', 'volley' ),
				'off'  => esc_html__( 'Off', 'volley' )
			),
			'default' => 'on'
		),

		array(
			'id'       => 'portfolio-social-box-enable',
			'type'	   => 'button_set',
			'title'    => esc_html__( 'Social Sharing Module', 'volley' ),
			'subtitle' => esc_html__( 'Switch on to display the social sharing module on single portfolio pages.', 'volley' ),
			'options'  => array(
				'on'   => esc_html__( 'On', 'volley' ),
				'off'  => esc_html__( 'Off', 'volley' )
			),
			'default'  => 'on'
		),
		array(
			'id'       => 'portfolio-related-enable',
			'type'	   => 'button_set',
			'title'    => esc_html__( 'Related Works', 'volley' ),
			'subtitle' => esc_html__( 'Switch on to display related works on single portfolio pages.', 'volley' ),
			'options'  => array(
				'on'   => esc_html__( 'On', 'volley' ),
				'off'  => esc_html__( 'Off', 'volley' )
			),
			'default' => 'on'
		),

		array(
			'type'    => 'text',
			'id'      => 'portfolio-related-title',
			'title'   => esc_html__( 'Related Works Title', 'volley' ),
			'default' => 'Related Works',
			'required' => array(
				'portfolio-related-enable',
				'equals',
				'on'
			)
		),
		array(
			'id'       => 'portfolio-related-style',
			'type'	   => 'select',
			'title'    => esc_html__( 'Related Works Style', 'volley' ),
			'subtitle' => esc_html__( 'Choose a style for related works on single portfolio posts.', 'volley' ),
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
			'type'     => 'slider',
			'id'       => 'portfolio-related-number',
			'title'    => esc_html__( 'Number of Related Works', 'volley' ),
			'subtitle' => esc_html__( 'Manages the number of works that display on related works section.', 'volley' ),
			'default'  => 3,
			'max'      => 6,
			'required' => array(
				'portfolio-related-enable',
				'equals',
				'on'
			)
		)
	)
);
