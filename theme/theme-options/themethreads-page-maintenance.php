<?php
/*
 * Page Maintenance
*/

// Hours
$hours = array();
for ($i = 0; $i <= 24; $i++){

	$hour = $i;
	if ($i < 10) {
		$hour = '0'.$i;
	}
	$hours[(string)$hour] = (string)$hour;
}

// Minutes
$minutes = array();
for ($i = 0; $i < 60; $i++){

	$min = $i;
	if ($i < 10) {
		$min = '0'.$i;
	}
	$minutes[(string)$min] = (string)$min;
}

$this->sections[] = array (
	'title'  => esc_html__( 'Maintenance Page', 'volley' ),
	'subsection' => true,
	'fields' => array(

		array(
			'id' => 'page-maintenance-enable',
			'type'	 => 'button_set',
			'title' => esc_html__('Enable Maintenance Mode', 'volley'),
			'subtitle' => esc_html__('If on, the frontend shows maintenance mode page only.', 'volley'),
			'desc' => esc_html__('Only administrator will be able to visit site. If you want to check if maintenance mode is enabled you have to logout.', 'volley'),
			'options' => array(
				'on'  => esc_html__( 'On', 'volley' ),
				'off' => esc_html__( 'Off', 'volley' )
			),
			'default' => 'on'
		),

		array(
			'id' => 'page-maintenance-mode-till',
			'type'	 => 'button_set',
			'title' => esc_html__('Enable Till', 'volley'),
			'subtitle' => esc_html__('If on, the frontend shows maintenance mode page only.', 'volley'),
			'desc' => esc_html__('Only administrator will be able to visit site. If you want to check if maintenance mode is enabled you have to logout.', 'volley'),
			'options' => array(
				'on'  => esc_html__( 'On', 'volley' ),
				'off' => esc_html__( 'Off', 'volley' )
			),
			'default' => 'on'
		),

		array(
			'id'        => 'page-maintenance-mode-till-date',
			'type'      => 'date',
			'title'     => esc_html__('Date (mm/dd/yyyy)', 'volley'),
			'default'   => date('m/d/Y'),
			'required' => array(
				'page-maintenance-mode-till',
				'equals',
				'on'
			)
		),

		array(
			'id'        => 'page-maintenance-mode-till-hour',
			'type'      => 'select',
			'title'     => esc_html__('Hour', 'volley'),
			'options' => $hours,
			'default'   => '00',
			'required' => array(
				'page-maintenance-mode-till',
				'equals',
				'on'
			)
		),

		array(
			'id'        => 'page-maintenance-mode-till-minutes',
			'type'      => 'select',
			'title'     => esc_html__('Minutes', 'volley'),
			'options' => $minutes,
			'default'   => '00',
			'required' => array(
				'page-maintenance-mode-till',
				'equals',
				'on'
			)
		),

		array(
			'id'       => 'page-maintenance-title',
			'type'     => 'text',
			'title'    => esc_html__( 'Page Title', 'volley' ),
			'subtitle' => '',
			'default' => wp_kses_post( __( 'We&#39;ll Be Right Back.', 'volley') ),
		),

		array(
			'id'       => 'page-maintenance-content',
			'type'     => 'editor',
			'title'    => esc_html__( 'Page Content', 'volley' ),
			'subtitle' => '',
			'default' => wp_kses_post( __( '<p>Our team is working hard to be able to back in a couple hours. <br> Thanks for your patience.</p>', 'volley' ) ),
		),

		array(
			'id'       => 'page-maintenance-background-type',
			'type'     => 'select',
			'title'    => esc_html__( 'Background Type', 'volley' ),
			'options' => array(
				'solid'    => esc_html__( 'Solid', 'volley' ),
				'gradient' => esc_html__( 'Gradient', 'volley' ),
				'image'    => esc_html__( 'Image', 'volley' ),
			),
			'default' => 'image'
		),

		array(
			'id'=>'page-maintenance-bar-bg',
			'type' => 'media',
			'url' => true,
			'title' => esc_html__('Background', 'volley'),
			'required' => array(
				'page-maintenance-background-type',
				'equals',
				'image'
			),
		),

		array(
			'id'=>'page-maintenance-bar-solid',
			'type' => 'color',
			'url' => true,
			'title' => esc_html__('Background', 'volley'),
			'required' => array(
				'page-maintenance-background-type',
				'equals',
				'solid'
			),
		),

		array(
			'id'=>'page-maintenance-bar-gradient',
			'type' => 'gradient',
			'url' => true,
			'title' => esc_html__('Background', 'volley'),
			'required' => array(
				'page-maintenance-background-type',
				'equals',
				'gradient'
			),
		),

		array(
			'id' => 'page-maintenance-identities',
			'type' => 'repeater',
			'group_values' => true,
			'title' => esc_html__('Social identities', 'volley'),
			'fields' => array(

				array(
					'id'       => 'title',
					'type'     => 'text',
					'title'    => esc_html__( 'Title', 'volley' )
				),

				array(
					'id'       => 'url',
					'type'     => 'text',
					'title'    => esc_html__( 'Url', 'volley' )
				),
			)
		)
	)
);
