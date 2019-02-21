<?php

$this->sections[] = array(
	'title'  => esc_html__( 'Woocommerce', 'volley' ),
	'icon'   => 'el-icon-shopping-cart',
	'fields' => array(

		array(
			'id'       => 'wc-archive-title-bar-enable',
			'type'	   => 'button_set',
			'title'    => esc_html__( 'Woo Category Title Bar', 'volley' ),
			'subtitle' => esc_html__( 'Turn on to show the woo category title bar', 'volley' ),
			'options'  => array(
				'on'   => esc_html__( 'On', 'volley' ),
				'off'  => esc_html__( 'Off', 'volley' )
			),
			'default'  => 'on'
		),
		array(
			'id'       => 'wc-archive-title-bar-heading',
			'type'	   => 'text',
			'title'    => esc_html__( 'Woo Category Title', 'volley' ),
			'subtitle' => esc_html__( 'Controls the title text that displays in the woo category', 'volley' ),
		),
		array(
			'id'       => 'wc-archive-title-bar-subheading',
			'type'	   => 'text',
			'title'    => esc_html__( 'Woo Category Subtitle', 'volley' ),
			'subtitle' => esc_html__( 'Controls the subtitle text that displays in the woo category', 'volley' )
		),
		array(
			'id'      => 'ld_woo_products_per_page',
			'type'    => 'text',	
			'title'   => esc_html__( 'Number of Products Displayed per Page', 'volley' ),
			'desc'    => esc_html__( 'This option works with predefined WooCommerce catalog page and category pages', 'volley' ),
			'default' => '9'
		),
		array(
			'id'      => 'ld_woo_columns',
			'type'    => 'slider',
			'title'   => esc_html__( 'Number of Products Per Row', 'volley' ),
			'desc'    => esc_html__( 'Define number of products per row to display on your predefined WooCommerce page and category pages', 'volley' ),
			'min'     => 1,
			'max'     => 6,
			'default' => 3
		),
		array(
			'id'       => 'wc-share-enable',
			'type'	   => 'button_set',
			'title'    => esc_html__( 'Woo Single Product Share', 'volley' ),
			'subtitle' => esc_html__( 'Turn on to show the share links', 'volley' ),
			'options'  => array(
				'on'   => esc_html__( 'On', 'volley' ),
				'off'  => esc_html__( 'Off', 'volley' )
			),
			'default'  => 'on'
		),
		array(
			'id'      => 'ld_woo_related_columns',
			'type'    => 'slider',	
			'title'   => esc_html__( 'Number of Related Products', 'volley' ),
			'desc'    => esc_html__( 'Define number of related products.', 'volley' ),
			'min'     => 1,
			'max'     => 6,
			'default' => 4
		),
		array(
			'id'      => 'ld_woo_cross_sell_columns',
			'type'    => 'slider',
			'title'   => esc_html__( 'Number of Displayed Cross-sells', 'volley' ),
			'desc'    => esc_html__( 'Define number of cross-sells display.', 'volley' ),
			'min'     => 1,
			'max'     => 6,
			'default' => 2
		),	
		array(
			'id'      => 'ld_woo_up_sell_columns',
			'type'    => 'slider',
			'title'   => esc_html__( 'Number of Displayed Up-sells', 'volley' ),
			'desc'    => esc_html__( 'Define number of up-sells display.', 'volley' ),
			'min'     => 1,
			'max'     => 6,
			'default' => 4
		),
	) 
);
