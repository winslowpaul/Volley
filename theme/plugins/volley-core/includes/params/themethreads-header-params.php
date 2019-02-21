<?php
// New Params for Row header functionality

function themethreads_row_header_params() {
	
	$headers_params = array(
		array(
			'type'       => 'dropdown',
			'param_name' => 'header_type',
			'heading'    => esc_html__( 'Bar type', 'volley-core' ),
			'description' => esc_html__( 'Select the role of the bar', 'volley-core' ),
			'value'       => array(
				esc_html__( 'Main', 'volley-core' ) => 'mainbar',
				esc_html__( 'Secondary', 'volley-core' ) => 'secondarybar',
			),
			'weight' => 1,
		),
		array(
			'type' => 'checkbox',
			'heading' => __( 'Fullwidth?', 'volley-core' ),
			'description' => esc_html__( 'Enable to make header fullwidth', 'volley-core' ),
			'param_name' => 'header_full_width',
			'value' => array( esc_html__( 'Yes', 'volley-core' ) => 'yes' ),
			'weight' => 1,
		),
	);
	
	vc_add_params( 'vc_row', $headers_params );
	
}
add_action( 'vc_after_init', 'themethreads_row_header_params' );

function themethreads_column_header_params() {
	
	$headers_params = array(
		array(
			'type'       => 'dropdown',
			'param_name' => 'header_col_width',
			'heading'    => esc_html__( 'Column Width', 'volley-core' ),
			'description' => esc_html__( 'Select column width', 'volley-core' ),
			'value'       => array(
				esc_html__( 'Expand', 'volley-core' ) => 'col',
				__( 'Equal to content\'s widths.', 'volley-core' ) => 'col-auto',
			),
			'weight' => 1,
		),
	);	

	vc_add_params( 'vc_column', $headers_params );	
	
}
add_action( 'vc_after_init', 'themethreads_column_header_params' );