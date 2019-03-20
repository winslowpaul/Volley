<?php
/*
 * Api keys Section
*/
//APP Api Keys
$this->sections[] = array(
	'title'      => esc_html__( 'API Keys', 'volley' ),
	'icon'   => 'el el-key',
	'fields'     => array(
		array(
			'id'       => 'mailchimp-api-key',
			'type'     => 'text',
			'title'    => esc_html__( 'Mailchimp API Key', 'volley' ),
			'subtitle' => '',
			'desc'     => wp_kses_post( __( 'Follow the steps <a href="https://mailchimp.com/help/about-api-keys/">MailChimp</a> to get the API key. This key applies to the newsletter element.', 'volley' ) ), 
		),
		array(
			'id'       => 'instagram-token',
			'type'     => 'text',
			'title'    => esc_html__( 'Instagram Access Token', 'volley' ),
			'subtitle' => '',
			'desc'     => wp_kses_post( __( 'Follow the link <a target="_blank" href="https://instagram.com/oauth/authorize/?client_id=2340bf75213b4c729e6d234077c1d09f&scope=basic&response_type=code&redirect_uri=http://api.themethreadswp.com/instagram/instagram-auth.php">to generate the access token and user ID.</a>', 'volley' ) ),
		),
	)
);
