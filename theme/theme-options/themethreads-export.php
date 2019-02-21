<?php
/*
 * Export options
*/

$this->sections[] = array(
	'title' => esc_html__( 'Import/Export', 'volley' ),
	'desc' => esc_html__( 'Import/Export options', 'volley' ),
	'icon' => 'el-icon-arrow-down',
	'fields' => array(		

		array(
			'id'            => 'opt-import-export',
			'type'          => 'import_export',
			'title'         => esc_html__( 'Import / Export', 'volley' ),
			'subtitle'      => esc_html__( '', 'volley' ),
			'full_width'    => false,
		),
	),
);
