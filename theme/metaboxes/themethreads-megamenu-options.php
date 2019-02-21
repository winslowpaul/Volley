<?php
/*
 * Megamenu Fields
 *
*/

$sections[] = array(
	'post_types' => array( 'themethreads-mega-menu' ),
	'title'      => esc_html__( 'MegaMenu Design Options', 'volley' ),
	'icon'       => 'el-icon-cog',
	'fields'     => array(
		array(
			'id'      => 'megamenu-fullwidth',
			'type'	  => 'button_set',
			'title'   => esc_html__( 'MegaMenu Fullwidth?', 'volley' ),
			'description' => esc_html__( 'Stretch the background of megamenu. To make the content fullwidth please update row options from the contents.', 'volley' ),
			'options' => array(
				'no'  => esc_html__( 'No', 'volley' ),
				'yes' => esc_html__( 'Yes', 'volley' ),
			),
			'default' => 'no',
		),
	)
);