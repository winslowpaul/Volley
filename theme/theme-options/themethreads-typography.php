<?php
/*
 * General Section
*/

$this->sections[] = array(
	'title'  => esc_html__( 'Typography', 'volley' ),
	'icon'   => 'el el-text-height'
);

// Body
$this->sections[] = array(
	'title'      => esc_html__( 'Body Typography', 'volley' ),
	'subsection' => true,
	'fields'     => array(

		array(
			'id'             => 'body_typography',
			'type'           => 'typography',
			'title'          => esc_html__( 'Body Typography Settings', 'volley' ),
			'subtitle'       => esc_html__( 'Manage the typography for all body text.', 'volley' ),
			'letter-spacing' => true,
			'text-align'     => false,
			'compiler'       => true,
			'units'          => '%',
			'default'        => array(
				'font-family'    => 'Roboto',
				'font-size'      => '1em',
				'font-weight'    => '400',
				'line-height'    => '1.7em',
				'letter-spacing' => '0',
				'color'          => '#808291',
			)
		),		
	)
);

// Single Post
$this->sections[] = array(
	'title'      => esc_html__( 'Single Post Typography', 'volley' ),
	'subsection' => true,
	'fields'     => array(

		array(
			'id'             => 'single_typography',
			'type'           => 'typography',
			'title'          => esc_html__( 'Typography of Single Posts', 'volley' ),
			'subtitle'       => esc_html__( 'Manage the typography of single post text.', 'volley' ),
			'letter-spacing' => true,
			'text-align'     => false,
			'compiler'       => true,
			'units'          => '%',
			'default'        => array(
				'font-family'    => 'Poppins',
				'font-size'      => '14px',
				'font-weight'    => '400',
				'line-height'    => '2',
				'letter-spacing' => '0',
				'color'          => '#737373',
			)
		),		
	)
);


// Headers
$this->sections[] = array(
	'title'      => esc_html__( 'Headers Typography', 'volley' ),
	'subsection' => true,
	'fields'     => array(

		'h1_typography' => array(
			'id'             => 'h1_typography',
			'type'           => 'typography',
			'title'          => esc_html__( 'H1 Headers Typography', 'volley' ),
			'subtitle'       => esc_html__( 'Manage the typography for all H1 Headers.', 'volley' ),
			'letter-spacing' => true,
			'text-align'     => false,
			'compiler'       => true,
			'units'          => '%',
			'default'        => array(
				'font-family'    => 'Roboto',
				'font-size'      => '52px',
				'font-weight'    => '500',
				'line-height'    => '1.2em',
				'letter-spacing' => '0',
				'color'          => '#181b31'
			)
		),

		'h2_typography' => array(
			'id'              => 'h2_typography',
			'title'           => esc_html__( 'H2 Headers Typography', 'volley' ),
			'subtitle'        => esc_html__( 'Manage the typography for all H2 Headers.', 'volley' ),
			'type'            => 'typography',
			'letter-spacing'  => true,
			'text-align'      => false,
			'compiler'        => true,
			'units'           => '%',
			'default'         => array(
				'font-family'    => 'Roboto',
				'font-size'      => '40px',
				'font-weight'    => '500',
				'line-height'    => '1.2em',
				'letter-spacing' => '0',
				'color'          => '#181b31'
			)
		),

		'h3_typography' => array(
			'id'             => 'h3_typography',
			'type'           => 'typography',
			'title'          => esc_html__( 'H3 Headers Typography', 'volley' ),
			'subtitle'       => esc_html__( 'Manage the typography for all H3 Headers.', 'volley' ),
			'letter-spacing' => true,
			'text-align'     => false,
			'compiler'       => true,
			'units'          => '%',
			'default'        => array(
				'font-family'    => 'Roboto',
				'font-size'      => '32px',
				'font-weight'    => '500',
				'line-height'    => '1.2em',
				'letter-spacing' => '0',
				'color'          => '#181b31'
			)
		),

		'h4_typography' => array(
			'id'             => 'h4_typography',
			'type'           => 'typography',
			'title'          => esc_html__( 'H4 Headers Typography', 'volley' ),
			'subtitle'       => esc_html__( 'Manage the typography for all H4 Headers.', 'volley' ),
			'letter-spacing' => true,
			'text-align'     => false,
			'compiler'       => true,
			'units'          => '%',
			'default'        => array(
				'font-family'    => 'Roboto',
				'font-size'      => '25px',
				'font-weight'    => '500',
				'line-height'    => '1.2em',
				'letter-spacing' => '0',
				'color'          => '#181b31'
			)
		),

		'h5_typography' => array(
			'id'             => 'h5_typography',
			'type'           => 'typography',
			'title'          => esc_html__( 'H5 Headers Typography', 'volley' ),
			'subtitle'       => esc_html__( 'Manage the typography for all H5 Headers.', 'volley' ),
			'letter-spacing' => true,
			'text-align'     => false,
			'compiler'       => true,
			'units'          => '%',
			'default'        => array(
				'font-family'    => 'Roboto',
				'font-size'      => '21px',
				'font-weight'    => '500',
				'line-height'    => '1.2em',
				'letter-spacing' => '0',
				'color'          => '#181b31'
			)
		),

		'h6_typography' => array(
			'id'             => 'h6_typography',
			'type'           => 'typography',
			'title'          => esc_html__( 'H6 Headers Typography', 'volley' ),
			'subtitle'       => esc_html__( 'Manage the typography for all H6 Headers.', 'volley' ),
			'letter-spacing' => true,
			'text-align'     => false,
			'compiler'       => true,
			'units'          => '%',
			'default'        => array(
				'font-family'    => 'Roboto',
				'font-size'      => '18px',
				'font-weight'    => '500',
				'line-height'    => '1.2em',
				'letter-spacing' => '0',
				'color'          => '#181b31'
			)
		),
	)
);

// Custom Fonts
$this->sections[] = array(
	'title'      => esc_html__( 'Custom fonts', 'volley' ),
	'subsection' => true,
	'fields'     => array(
		
		array(
			'id' => 'themethreads_custom_fonts',
			'type' => 'repeater',
			'title'    => esc_html__( 'Add Custom Fonts', 'volley' ),
			'subtitle' => esc_html__( 'Upload custom font. All files are not necessary but are recommended for full browser support. You can upload as many custom fonts as you need. Click the "Add" button for additional upload boxes.', 'volley' ),
			'desc' => esc_html__( '', 'volley' ),
			'sortable' => false,
			'group_values' => false,
			'fields' => array(
				
				array(
					'id' => 'custom_font_title',
					'type' => 'text',
					'title'    => esc_html__( 'Font title', 'volley' ),
					'placeholder' => esc_html__( '', 'volley' ),
					'subtitle' => esc_html__( '', 'volley' ),
				),
				
				array(
					'id'    => 'custom_font_woff2',
					'type'  => 'text',	
					'title' => esc_html__( 'WOFF2', 'volley' ),
					'placeholder' => esc_html__( '', 'volley' ),
				),
				
				array(
					'id'    => 'custom_font_woff',
					'type'  => 'text',	
					'title' => esc_html__( 'WOFF', 'volley' ),
					'placeholder' => esc_html__( '', 'volley' ),
				),
				
				array(
					'id'    => 'custom_font_ttf',
					'type'  => 'text',	
					'title' => esc_html__( 'TTF', 'volley' ),
					'placeholder' => esc_html__( '', 'volley' ),
				),
				
				array(
					'id'    => 'custom_font_svg',
					'type'  => 'text',	
					'title' => esc_html__( 'SVG', 'volley' ),
					'placeholder' => esc_html__( '', 'volley' ),
				),
				
			)
		)
	)
);
