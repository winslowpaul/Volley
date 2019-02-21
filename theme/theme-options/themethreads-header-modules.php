<?php
/*
 * Header Modules Section
*/

$this->sections[] = array(
	'title'      => esc_html__( 'Modules', 'volley' ),
	'subsection' => true,
	'fields'     => array(
		
		array(
			'id'       => 'header-enable-social',
			'type'	   => 'button_set',
			'title'    => esc_html__( 'Enable Header Social', 'volley' ),
			'subtitle' => esc_html__( 'If on, will display social links in header.', 'volley' ),
			'options'  => array(
				'on'  => esc_html__( 'On', 'volley' ),
				'off' => esc_html__( 'Off', 'volley' ),
			),
		),
		
		array(
			'id' => 'header-social-links',
			'type' => 'repeater',
			'title'    => esc_html__( 'Social Links', 'volley' ),
			'subtitle' => esc_html__( 'Add social links to display in header', 'volley' ),
			'sortable' => true,
			'group_values' => false,
			'required'  => array(
				'header-enable-social', 
				'equals', 
				'on'
			),
			'fields' => array(

				array(
					'id'    => 'social_label',
					'type'  => 'text',	
					'title' => esc_html__( 'Label', 'volley' ),
					'placeholder' => esc_html__( 'Link text', 'volley' ),
				),
				
				array(
					'id' => 'social_icon',
					'type' => 'iconpicker',
					'title'    => esc_html__( 'Icon', 'volley' ),
					'placeholder' => esc_html__( 'Select an icon', 'volley' ),
					'data'  => 'social-icons',
				),
				
				array(
					'id'    => 'social_url',
					'type'  => 'text',	
					'title' => esc_html__( 'URL', 'volley' ),
				),
				
			)
		),		
		
		array(
			'id'       => 'header-enable-button',
			'type'	   => 'button_set',
			'title'    => esc_html__( 'Enable Header Button', 'volley' ),
			'subtitle' => esc_html__( 'If on, will display buttons in header.', 'volley' ),
			'options'  => array(
				'on'  => esc_html__( 'On', 'volley' ),
				'off' => esc_html__( 'Off', 'volley' ),
			),
		),
		
		array(
			'id' => 'header-button',
			'type' => 'repeater',
			'title'    => esc_html__( 'Buttons', 'volley' ),
			'subtitle' => esc_html__( 'Add buttons to display in header', 'volley' ),
			'sortable' => true,
			'group_values' => false,
			'required'  => array(
				'header-enable-button', 
				'equals', 
				'on'
			),
			'fields' => array(

				array(
					'id'    => 'button_label',
					'type'  => 'text',	
					'title' => esc_html__( 'Label', 'volley' ),
					'placeholder' => esc_html__( 'Button text', 'volley' ),
				),
				
				array(
					'id' => 'button_icon',
					'type' => 'iconpicker',
					'title'    => esc_html__( 'Icon', 'volley' ),
					'placeholder' => esc_html__( 'Select an icon', 'volley' ),
				),
				
				array(
					'id'    => 'button_url',
					'type'  => 'text',	
					'title' => esc_html__( 'URL', 'volley' ),
				),
				
			)
		),
		
		array(
			'id'       => 'header-enable-text',
			'type'	   => 'button_set',
			'title'    => esc_html__( 'Enable Header Text', 'volley' ),
			'subtitle' => esc_html__( 'If on, will display text in header.', 'volley' ),
			'options'  => array(
				'on'  => esc_html__( 'On', 'volley' ),
				'off' => esc_html__( 'Off', 'volley' ),
			),
		),
		
		array(
			'id'       => 'header-text',
			'type'	   => 'textarea',
			'title'    => esc_html__( 'Header Text', 'volley' ),
			'required'  => array(
				'header-enable-text', 
				'equals', 
				'on'
			),
		),
		
	)
);	
