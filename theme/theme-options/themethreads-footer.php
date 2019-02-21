<?php
/*
 * Footer Section
*/

$this->sections[] = array(
	'title'  => esc_html__( 'Footer', 'volley' ),
	'icon'   => 'el-icon-photo',
	'fields' => array(
		array(
 			'id'=>'footer-template',
 			'type' => 'select',
 			'title' => esc_html__('Footer', 'volley'),
 			'subtitle'=> esc_html__('Select a footer template for your website.', 'volley'),
 			'data' => 'post',
			'args' => array( 'post_type' => 'themethreads-footer', 'posts_per_page' => -1 )
 		)
	)
);
