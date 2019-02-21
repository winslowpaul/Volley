<?php
/*
 * Page 404
*/

$this->sections[] = array (
	'title'  => esc_html__( 'Search Page', 'volley' ),
	'icon'   => 'el el-search',
	'fields' => array(

		array(
			'id'       => 'search-header-template',
			'type'     => 'select',
			'title'    => esc_html__( 'Search Page Header', 'volley' ),
			'subtitle' => esc_html__( 'Choose a header for search result pages.', 'volley'),
			'data'     => 'post',
			'args'     => array( 
				'post_type'      => 'themethreads-header', 
				'posts_per_page' => -1 
			)
		),
		array(
			'id'       => 'search-title-bar-enable',
			'type'	   => 'button_set',
			'title'    => esc_html__( 'Search Page Title', 'volley' ),
			'subtitle' => esc_html__( 'Switch on to display the titlebar for the search result pages.', 'volley' ),
			'options'  => array(
				'on'   => esc_html__( 'On', 'volley' ),
				'off'  => esc_html__( 'Off', 'volley' )
			),
			'default'  => 'on'
		),
		array(
			'id'       => 'search-title-bar-subheading',
			'type'	   => 'text',
			'title'    => esc_html__( 'Search Page Subtitle', 'volley' ),
			'subtitle' => esc_html__( 'Define a default subtitle for the search result pages.', 'volley' )
		),
		

	)
);
