<?php
/*
 * Page 404
*/

$this->sections[] = array (
	'title'  => esc_html__( '404 Page', 'volley' ),
	'subsection' => true,
	'fields' => array(
		array(
			'id'     => 'error-404-enable-particles',
			'type'	 => 'button_set',
			'title' => esc_html__('Particles', 'volley'),
			'subtitle' => esc_html__('Switch on to display the particles.', 'volley'),
			'options' => array(
				'on'  => esc_html__( 'On', 'volley' ),
				'off' => esc_html__( 'Off', 'volley' )
			),
			'default' => 'on'
		),
		array(
			'id'       => 'error-404-title',
			'type'     => 'text',
			'title'    => esc_html__( 'Title', 'volley' ),
			'subtitle' => '',
			'default' => '404'
		),
		array(
			'id'       => 'error-404-subtitle',
			'type'     => 'text',
			'title'    => esc_html__( 'Heading', 'volley' ),
			'subtitle' => '',
			'default' => 'Looks like you are lost.'
		),
		array(
			'id'       => 'error-404-content',
			'type'     => 'editor',
			'title'    => esc_html__( 'Content', 'volley' ),
			'subtitle' => '',
			'default' => '<p>We can’t seem to find the page you’re looking for.</p>'
		),
		array(
			'id' => 'error-404-enable-btn',
			'type'	 => 'button_set',
			'title' => esc_html__('Button', 'volley'),
			'subtitle' => esc_html__('Switch on to display the "back to home" button.', 'volley'),
			'options' => array(
				'on'  => esc_html__( 'On', 'volley' ),
				'off' => esc_html__( 'Off', 'volley' )
			),
			'default' => 'on'
		),

		array(
			'id'       => 'error-404-btn-title',
			'type'     => 'text',
			'title'    => esc_html__( 'Button Title', 'volley' ),
			'subtitle' => '',
			'default' => 'Back to home',
			'required' => array(
				'error-404-enable-btn',
				'equals',
				'on'
			)
		),
	)
);
