<?php

/*
 * Header Layout Section
*/
$this->sections[] = array(
	'title'      => esc_html__( 'Select the header', 'volley' ),
	'subsection' => true,
	'fields'     => array(
		array(
			'id'=>'header-template',
			'type' => 'select',
			'title' => esc_html__('Header', 'volley'),
			'subtitle'=> esc_html__('Select a header template for your website', 'volley'),
			'data' => 'post',
			'args' => array( 'post_type' => 'themethreads-header', 'posts_per_page' => -1 )
		),
	)
);
