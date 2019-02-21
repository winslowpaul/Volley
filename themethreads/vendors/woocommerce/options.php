<?php

add_action( 'themethreads_option_sidebars', 'themethreads_woocommerce_option_sidebars' );

function themethreads_woocommerce_option_sidebars( $obj ) {

	// Product Sidebar
	$obj->sections[] = array(
		'title'  => esc_html__('Products', 'volley'),
		'subsection' => true,
		'fields' => array(

			array(
				'id'       => 'wc-enable-global',
				'type'	   => 'button_set',
				'title'    => esc_html__( 'Activate Global Sidebar For Products', 'volley' ),
				'subtitle' => esc_html__( 'Turn on if you want to use the same sidebars on all product posts. This option overrides the product options.', 'volley' ),
				'options'  => array(
					'on'   => esc_html__( 'On', 'volley' ),
					'off'  => esc_html__( 'Off', 'volley' ),
				),
				'default' => 'off'
			),
			array(
				'id'       => 'wc-sidebar',
				'type'     => 'select',
				'title'    => esc_html__( 'Global Products Sidebar', 'volley' ),
				'subtitle' => esc_html__( 'Select sidebar that will display on all product posts.', 'volley' ),
				'data'     => 'sidebars'
			),
			array(
				'id'       => 'wc-sidebar-position',
				'type'     => 'button_set',
				'title'    => esc_html__( 'Global Products Sidebar Position', 'volley' ),
				'subtitle' => esc_html__( 'Controls the position of the sidebar for all product posts.', 'volley' ),
				'options'  => array(
					'left'  => esc_html__( 'Left', 'volley' ),
					'right' => esc_html__( 'Right', 'volley' )
				),
				'default' => 'right'
			),
		)
	);

	// Product Archive Sidebar
	$obj->sections[] = array(
		'title'  => esc_html__( 'Product Archive', 'volley' ),
		'subsection' => true,
		'fields' => array(
			array(
				'id'       =>'wc-archive-sidebar-one',
				'type'     => 'select',
				'title'    => esc_html__( 'Product Archive Sidebar', 'volley' ),
				'subtitle' => esc_html__( 'Select sidebar 1 that will display on the product archive pages.', 'volley' ),
				'data'     => 'sidebars'
			),
			array(
				'id'       => 'wc-archive-sidebar-position',
				'type'     => 'button_set',
				'title'    => esc_html__( 'Global Products Archive Sidebar Position', 'volley' ),
				'subtitle' => esc_html__( 'Controls the position of the sidebar for all product archives.', 'volley' ),
				'options'  => array(
					'left'  => esc_html__( 'Left', 'volley' ),
					'right' => esc_html__( 'Right', 'volley' )
				),
				'default' => 'right'
			),

		)
	);

}