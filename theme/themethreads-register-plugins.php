<?php
/**
 * ThemeThreads Theme Framework
 * Include the TGM_Plugin_Activation class and register the required plugins.
 *
 * @see http://tgmpluginactivation.com/configuration/ for detailed documentation.
 *
 */

themethreads()->load_library( 'class-tgm-plugin-activation' );

/**
 * Register the required plugins for this theme.
 */
add_action( 'tgmpa_register', '_s_register_required_plugins' );

function _s_register_required_plugins() {

	$images = get_template_directory_uri() . '/theme/plugins/images';

	$plugins = array(

		array(
			'name' 		        	=> esc_html__( 'Volley Core', 'volley' ),
			'slug' 		        	=> 'volley-core',
			'required' 	        	=> true,
			'source'            	=> get_template_directory_uri() . '/theme/plugins/volley-core.zip',
			'themethreads_logo'        	=> $images . '/one-core-min.png',
			'version'               => '1.0.0',
			'themethreads_author'      	=> esc_html__( 'ThemeThreads Themes', 'volley' ),
			'themethreads_description' 	=> esc_html__( 'Intelligent and Powerful Elements Plugin, exclusively for Volley WordPress Theme.', 'volley' ),
		),
		array(
			'name' 		        	=> esc_html__( 'Volley Portfolio', 'volley' ),
			'slug' 		        	=> 'volley-portfolio',
			'required' 	        	=> true,
			'source'            	=> get_template_directory_uri() . '/theme/plugins/volley-portfolio.zip',
			'themethreads_logo'        	=> $images . '/one-pf-min.png',
			'version'               => '1.0.0',
			'themethreads_author'      	=> esc_html__( 'ThemeThreads Themes', 'volley' ),
			'themethreads_description' 	=> esc_html__( 'Modern and Diversified Portfolio Plugin, exclusively Volley WordPress Theme.', 'volley' ),
		),
		array(
			'name' 		         	=> esc_html__( 'WPBakery Page Builder', 'volley' ),
			'slug' 		         	=> 'js_composer',			
			'required' 	         	=> true,
            'source'             	=> get_template_directory_uri() . '/theme/plugins/js_composer.zip',
			'themethreads_logo'        	=> $images . '/bakery-1.jpg',
			'version'            	=> '5.7',
			'themethreads_author'      	=> esc_html__( 'Wpbakery', 'volley' ),
			'themethreads_description' 	=> esc_html__( 'A premium plugin bundled with the Volley theme', 'volley' ),
		),
		array(
			'name'               	=> esc_html__( 'Redux Framework', 'volley' ),
			'slug' 		         	=> 'redux-framework',
			'required' 	         	=> true,
			'themethreads_logo'        	=> $images . '/redux.png',
			'themethreads_author'      	=> esc_html__( 'Team Redux', 'volley' ),
			'themethreads_description' 	=> esc_html__( 'Redux is a simple, truly extensible and fully responsive options framework for WordPress themes and plugins.', 'volley' )
		),
		array(
			'name'              	=> esc_html__( 'Revolution Slider', 'volley' ),
			'slug'              	=> 'revslider',
			'source'            	=> get_template_directory_uri() . '/theme/plugins/revslider.zip',
			'themethreads_logo'        	=> $images . '/rev-slider-min.png',
			'themethreads_author'      	=> esc_html__( 'ThemePunch', 'volley' ),
			'themethreads_description' 	=> esc_html__( 'Slider Revolution - Premium responsive slider', 'volley' ),
		),
        array(
			'name'              	=> esc_html__( 'Contact Form 7', 'volley' ),
			'slug'              	=> 'contact-form-7',
			'required'          	=> false,
			'themethreads_logo'        	=> $images . '/cf-7-min.png',
			'themethreads_author'      	=> esc_html__( 'Takayuki Miyoshi', 'volley' ),
			'themethreads_description' 	=> esc_html__( 'Contact Form 7 can manage multiple contact forms, plus you can customize the form and the mail contents flexibly with simple markup.', 'volley' )
		),
	);

	/**
	 * Array of configuration settings. Amend each line as needed.
	 * If you want the default strings to be available under your own theme domain,
	 * leave the strings uncommented.
	 * Some of the strings are added into a sprintf, so see the comments at the
	 * end of each line for what each argument will be.
	 */
	$config = array(
		'id'           => 'tgmpa',                 // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
	);

	tgmpa( $plugins, $config );
}