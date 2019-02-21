<?php
/*
 * Prono Boxes
 */

$this->sections[] = array(
	'title'  => esc_html__( 'Promo Boxes', 'volley' ),
	'icon'   => 'el-icon-th'
);

$this->sections[] = array(
	'post_types' => array( 'post', 'page', 'themethreads-portfolio' ),
	'subsection' => true,
	'title'      => esc_html__('Promotions', 'volley'),
	'icon'       => 'el-icon-adjust-alt',
	'fields'     => array(
		
		array(
			'id'    => 'enable-promo',
			'type'  => 'button_set',
			'title' => esc_html__( 'Enable Promo boxes', 'volley' ),
			'desc'  => esc_html__( 'Enable to show promo boxes', 'volley' ),
			'options' => array(
				'on'   => esc_html__( 'On', 'volley' ),
				'off'  => esc_html__( 'Off', 'volley' ),
			),
			'default'  => 'off',
		),
		
		array(
			'id'       => 'promo-top-template',
			'type'     => 'select',
			'title'    => esc_html__( 'Top Promo box content', 'volley' ),
			'subtitle' => esc_html__( 'Select which promobox content post to display', 'volley' ),
			'data'     => 'post',
			'args'     => array( 
				'post_type'      => 'themethreads-promotions', 
				'posts_per_page' => -1 
			),
			'required'  => array(
				'promo-positions', 
				'!=', 
				'inpost'
			),
		),
		
		array(
			'id'       => 'promo-incontent-template',
			'type'     => 'select',
			'title'    => esc_html__( 'In post Promo box content', 'volley' ),
			'subtitle' => esc_html__( 'Select which promobox content post to display (works for single post only, and display after the Author Bio section)', 'volley' ),
			'data'     => 'post',
			'args'     => array( 
				'post_type'      => 'themethreads-promotions', 
				'posts_per_page' => -1 
			),
			'required'  => array(
				'promo-positions', 
				'!=', 
				'top'
			),
		),

	)
);
