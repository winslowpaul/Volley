<?php
/*
 * Extras Section
*/

$this->sections[] = array(
	'title'  => esc_html__('Extras', 'volley'),
	'icon'   => 'el el-plus-sign'
);

// Miscelanios Fields
$this->sections[] = array(
	'title'  => esc_html__( 'Miscellaneous', 'volley' ),
	'subsection' => true,
	'fields' => array(
		
		array(
			'id'       => 'header-enable-switch',
			'type'	   => 'button_set',
			'title'    => esc_html__( 'Header', 'volley' ),
			'subtitle' => esc_html__( 'Switch off to hide the header on your website.', 'volley' ),
			'options'  => array(
				'on'  => esc_html__( 'On', 'volley' ),
				'off' => esc_html__( 'Off', 'volley' ),
			),
			'default' => 'on'
		),		
		array(
			'id' => 'footer-enable-switch',
			'type'	 => 'button_set',
			'title' => esc_html__('Footer', 'volley'),
			'subtitle' => esc_html__('Switch off to hide the footer on your website.', 'volley'),
			'options' => array(
				'on'  => esc_html__( 'On', 'volley' ),
				'off' => esc_html__( 'Off', 'volley' )
			),
			'default' => 'on'
		),
		array(
			'id' => 'enable-volley-collection',
			'type'     => 'button_set',
			'title'    => esc_html__( 'Volley Collection', 'volley' ),
			'subtitle' => esc_html__( 'Switch off to disabled the volley collection', 'volley' ),
			'options'  => array(
				'on'   => esc_html__( 'On', 'volley' ),
				'off'  => esc_html__( 'Off', 'volley' ),
			),
			'default' => 'on'
		),
		array(
			'id'       => 'footer-back-to-top',
			'type'	   => 'button_set',
			'title'    => esc_html__( 'Back To Top', 'volley' ),
			'subtitle' => esc_html__( 'Switch on to display the back to top link', 'volley' ),
			'options' => array(
				'on'  => esc_html__( 'On', 'volley' ),
				'off' => esc_html__( 'Off', 'volley' )
			),
			'default' => 'off'
		),
		array(
			'id'       => 'enable-lazy-load',
			'type'     => 'button_set',
			'title'    => esc_html__( 'Lazy Load', 'volley' ),
			'subtitle' => esc_html__( 'Lazy load enables images to load only when they are in the viewport. Therefore, lazy load boosts the performance.', 'volley' ),
			'options'  => array(
				'on'   => esc_html__( 'On', 'volley' ),
				'off'  => esc_html__( 'Off', 'volley' ),
			),
			'default' => 'on'
		),
		array(
			'type'  => 'text',
			'id'    => 'portfolio-single-slug',
			'title' => esc_html__( 'Portfolio Slug', 'volley' ),
			'subtitle' => esc_html__( '', 'volley' ),
		),
		
		array(
			'type'  => 'text',
			'id'    => 'portfolio-category-slug',
			'title' => esc_html__( 'Portfolio Category Slug', 'volley' ),
			'subtitle' => esc_html__( '', 'volley' ),
		),
		
	)
);

// Theme Features
$this->sections[] = array(
	'title'      => esc_html__( 'Custom Icons', 'volley' ),
	'subsection' => true,
	'fields'     => array(

		array(
			'id'    => 'sh_theme_features',
			'type'  => 'raw',
			'class' => 'redux-sub-heading',
			'desc'  => '<h2>' . esc_html__( 'Manage Icons', 'volley' ) . '</h2>'
		),
		array(
			'id'       => 'font-icons',
			'type'     => 'select',
			'multi'    => true,
			'title'    => esc_html__( 'Custom Icon Fonts', 'volley' ),
			'subtitle' => esc_html__( 'Choose the icon Fonts', 'volley' ),
			'options'  => array(
				'themethreads-icons' => esc_html__( 'ThemeThreads Icons', 'volley' )
			),
			'default' => array( 'themethreads-icons' ),
		),
		array(
			'id' => 'custom-icons-fonts',
			'type' => 'repeater',
			'title'    => esc_html__( 'Add Custom Icons', 'volley' ),
			'subtitle' => esc_html__( '', 'volley' ),
			'desc' => esc_html__( 'NOTE: All icons files should be uploaded via FTP on your server', 'volley' ),
			'sortable' => false,
			'group_values' => false,
						'fields' => array(
				
				array(
					'id' => 'custom_icon_font_title',
					'type' => 'text',
					'title'    => esc_html__( 'Title', 'volley' ),
					'placeholder' => esc_html__( 'Awesome Font', 'volley' ),
					'subtitle' => esc_html__( '', 'volley' ),
				),
				array(
					'id'    => 'custom_icon_font_css',
					'type'  => 'text',	
					'title' => esc_html__( 'Icon Css file', 'volley' ),
					'placeholder' => esc_html__( '', 'volley' ),
				),
				array(
					'id'    => 'custom_icons_classnames',
					'type'  => 'textarea',	
					'title' => esc_html__( 'Icons classnames', 'volley' ),
					'desc'  => esc_html__( 'Icon classnames should be separated by comma', 'volley' ),
				),
			)
		),		

	)
);
include_once( get_template_directory() . '/theme/theme-options/themethreads-page-404.php' );

