<?php
/*
 * Preheader Section
*/

$this->sections[] = array(
	'title' => esc_html__('Preheader', 'volley'),
	'desc' => esc_html__('Change the preheader section configuration.', 'volley'),
	'icon' => 'el-icon-cog',
	'fields' => array(

		array(
			'id' => 'preheader-enable-switch',
			'type' => 'switch', 
			'title' => esc_html__('Enable preheader', 'volley'),
			'subtitle' => esc_html__('If on, this layout part will be displayed.', 'volley'),
			'default' => 1,
		),
		
	), // #fields
);
