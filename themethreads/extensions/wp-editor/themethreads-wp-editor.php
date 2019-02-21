<?php
/**
* ThemeThreads Themes Theme Framework
*/

if( !defined( 'ABSPATH' ) )
	exit; // Exit if accessed directly

// Wp editor Class -----------------------------------------------------

/**
 * ThemeThreads Theme
 */
class ThemeThreads_Wp_Editor extends ThemeThreads_Base {

	/**
	 * [__construct description]
	 * @method __construct
	 */
	public function __construct() {

		$this->add_action( 'admin_enqueue_scripts', 'enqueue_scripts' );
		$this->add_filter( 'mce_buttons_2',         'themethreads_style_select' );
		$this->add_filter( 'mce_buttons_2',         'themethreads_mce_buttons' );
		$this->add_filter( 'tiny_mce_before_init',  'themethreads_mce_text_sizes' );
		$this->add_filter( 'tiny_mce_before_init',  'themethreads_styles_dropdown' );
	}

	public function enqueue_scripts( $hook ) {

		if( $hook == 'post.php' || $hook == 'post-new.php' ) {

			wp_enqueue_style( 'themethreads-wp-editor', get_template_directory_uri() . '/themethreads/extensions/wp-editor/themethreads-wp-editor.css' );
			wp_enqueue_script( 'themethreads-wp-editor', get_template_directory_uri() . '/themethreads/extensions/wp-editor/themethreads-wp-editor.js', array( 'jquery' ), '0.1', true );

		}
	}
	
	// Enable font size & font family selects in the editor
	public function themethreads_mce_buttons( $buttons ) {
			array_unshift( $buttons, 'fontselect' ); // Add Font Select
			array_unshift( $buttons, 'fontsizeselect' ); // Add Font Size Select
			return $buttons;
		}
	
	// Customize mce editor font sizes
	public function themethreads_mce_text_sizes( $initArray ){
		$initArray['fontsize_formats'] = "9px 10px 12px 13px 14px 16px 18px 21px 24px 28px 32px 36px";
		return $initArray;
	}

	// Add Formats Dropdown Menu To MCE
	public function themethreads_style_select( $buttons ) {
		array_push( $buttons, 'styleselect' );
		return $buttons;
	}

	// Add new styles to the TinyMCE "formats" menu dropdown
	public function themethreads_styles_dropdown( $settings ) {

		// Create array of new styles
		$new_styles = array(
			array(
				'title'    => esc_html__( 'Add Dropcap', 'volley' ),
				'selector' => 'p',
				'classes' => 'add-dropcap',
				'wrapper' => true,
			),
			array(
				'title'	=> esc_html__( 'Text Transform', 'volley' ),
				'items'	=> array(
					array(
						'title'		=> esc_html__( 'Uppercase', 'volley' ),
						'inline'	=> 'span',
						'styles'    => array( 'text-transform' => 'uppercase' ),
					),
					array(
						'title'		=> esc_html__( 'Lowercase', 'volley' ),
						'inline'	=> 'span',
						'styles'    => array( 'text-transform' => 'lowercase' ),
					),
					array(
						'title'		=> esc_html__( 'Capitalize', 'volley' ),
						'inline'	=> 'span',
						'styles'    => array( 'text-transform' => 'capitalize' ),
					),
				),
			),
			array(
	            'title'    => esc_html__( 'Reset List', 'volley' ),
	            'selector' => 'ul',
	            'classes'  => 'reset-ul',
				'wrapper' => true,
	        ),
			array(
	            'title'    => esc_html__( 'Inline List', 'volley' ),
	            'selector' => 'ul',
				'classes'  => 'reset-ul inline-nav'
	        ),
		);

		// Merge old & new styles
		//$settings['style_formats_merge'] = true;

		// Add new styles
		$settings['style_formats'] = json_encode( $new_styles );

		// Return New Settings
		return $settings;
	}

}

new ThemeThreads_Wp_Editor();