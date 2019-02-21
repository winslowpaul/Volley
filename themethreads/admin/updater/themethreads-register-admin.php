<?php
/**
 * ThemeThreads Themes Theme Framework
 * The ThemeThreads_Register initiate the theme engine
 */

if( !defined( 'ABSPATH' ) ) 
	exit; // Exit if accessed directly

class ThemeThreads_Register {

	/**
	 * Variables required for the theme updater
	 *
	 * @since 1.0.0
	 * @type string
	 */
	 protected $remote_api_url = null;
	 protected $theme_slug = null;
	 protected $version = null;
	 protected $renew_url = null;
	 protected $strings = null;

	/**
	 * Initialize the class.
	 *
	 * @since 1.0.0
	 */
	function __construct( $config = array(), $strings = array() ) {

		$config = wp_parse_args( $config, array(
			'remote_api_url' => 'http://api.themethreadswp.com',
			'theme_slug'     => 'volley',
			'version'        => '',
			'author'         => 'ThemeThreads Themes',
			'renew_url'      => ''
		) );

		// Set config arguments
		$this->remote_api_url = $config['remote_api_url'];
		$this->theme_slug     = sanitize_key( $config['theme_slug'] );
		$this->version        = $config['version'];
		$this->author         = $config['author'];
		$this->renew_url      = $config['renew_url'];

		// Populate version fallback
		if ( '' == $config['version'] ) {
			$theme = wp_get_theme( $this->theme_slug );
			$this->version = $theme->get( 'Version' );
		}

		// Strings passed in from the updater config
		$this->strings = $strings;

		add_action( 'after_setup_theme', array( $this, 'init_hooks' ) );
		add_action( 'admin_init', array( $this, 'updater' ) );
		add_action( 'admin_init', array( $this, 'register_option' ) );
		add_filter( 'http_request_args', array( $this, 'disable_wporg_request' ), 5, 2 );

	}

	/**
	 * Creates the updater class.
	 *
	 * since 1.0.0
	 */
	function updater() {

		/* If there is no valid license key status, don't allow updates. */
		if ( get_option( $this->theme_slug . '_purchase_code_status', false ) != 'valid' ) {
			return;
		}

		if ( !class_exists( 'ThemeThreads_Updater' ) ) {
			// Load our custom theme updater
			include( get_template_directory() . '/themethreads/admin/updater/themethreads-updater-class.php' );
		}

		new ThemeThreads_Updater(
			array(
				'remote_api_url' => $this->remote_api_url,
				'version' 		 => $this->version,
				'purchase_code'  => trim( get_option( $this->theme_slug . '_purchase_code' ) ),
			),
			$this->strings
		);
	}
	
	/**
	 * [init_hooks description]
	 * @method init_hooks
	 * @return [type]     [description]
	 */
	public function init_hooks() {

        if ( 'valid' != get_option( $this->theme_slug . '_purchase_code_status', false ) ) {

            if ( ( ! isset( $_GET['page'] ) || 'themethreads' != $_GET['page'] ) ) {
                add_action( 'admin_notices', array( $this, 'admin_error' ) );
            } else {
                add_action( 'admin_notices', array( $this, 'admin_notice' ) );

            }
        }
	}
	
	function admin_error() {
		$out = '<div class="error"><p>' . sprintf( wp_kses_post( __( 'The %s theme needs to be registered. %sRegister Now%s', 'volley' ) ), 'volley', '<a href="' . admin_url( 'admin.php?page=themethreads') . '">' , '</a>' ) . '</p></div>';
		echo $out;
	}
	
	function admin_notice() {
		$out = '<div class="notice"><p>' .
                         sprintf( wp_kses_post( __( 'Purchase code is invalid. Need a license? %sPurchase Now%s', 'volley' ) ), '<a target="_blank" href="http://volley.themethreadswp.com">', '</a>' ) .
            '</p></div>';
		echo $out;	
	}
	
	function messages() {

		$license = trim( get_option( $this->theme_slug . '_purchase_code' ) );
		$status = get_option( $this->theme_slug . '_purchase_code_status', false );

		// Checks license status to display under license key
		if ( ! $license ) {
			$message    = '<div class="threads-dsd-box-head-inner">
								<h4>' . esc_html__( 'Register Volley', 'volley' ) . '</h4>
							</div><!-- /.threads-dsd-box-head-inner -->';
		} 
		else {
			
			// delete_transient( $this->theme_slug . '_license_message' );
			if ( ! get_transient( $this->theme_slug . '_license_message', false ) ) {
				set_transient( $this->theme_slug . '_license_message', $this->check_license(), ( 60 * 60 * 24 ) );
			}
			$message = get_transient( $this->theme_slug . '_license_message' );
		}
		
		echo wp_kses_post( $message );
		
	}
	
	/**
	 * Outputs the markup used on the theme license page.
	 *
	 * since 1.0.0
	 */
	function form() {

		$strings = $this->strings;

		$license = trim( get_option( $this->theme_slug . '_purchase_code' ) );
		$status = get_option( $this->theme_slug . '_purchase_code_status', false );

		?>
		<form action="options.php" method="post" class="threads-dsd-register-form">
			<?php settings_fields( $this->theme_slug . '-license' ); ?>
			<input id="volley_purchase_code" name="volley_purchase_code" type="text" value="<?php echo esc_attr( $license ); ?>" placeholder="<?php esc_attr_e( 'Enter your purchase code', 'volley' ); ?>">
			<input type="submit" value="<?php esc_attr_e( 'Register your copy', 'volley' ) ?>">
		</form>
		<?php
	}
	
	/**
	 * Registers the option used to store the license key in the options table.
	 *
	 * since 1.0.0
	 */
	function register_option() {
		register_setting(
			$this->theme_slug . '-license',
			$this->theme_slug . '_purchase_code',
			array( $this, 'sanitize_license' )
		);
	}

	/**
	 * Sanitizes the license key.
	 *
	 * since 1.0.0
	 *
	 * @param string $new License key that was submitted.
	 * @return string $new Sanitized license key.
	 */
	function sanitize_license( $new ) {

		$old = get_option( 'volley_purchase_code' );

		if ( $old && $old != $new ) {
			// New license has been entered, so must reactivate
			delete_option( $this->theme_slug . '_purchase_code_status' );
			delete_transient( $this->theme_slug . '_license_message' );
		}

		return $new;
	}
	
	/**
	 * Makes a call to the API.
	 *
	 * @since 1.0.0
	 *
	 * @param array $api_params to be used for wp_remote_get.
	 * @return array $response decoded JSON response.
	 */
	 function get_api_response( $api_params ) {

		 // Call the custom API.
		$response = wp_remote_get(
			add_query_arg( $api_params, $this->remote_api_url ),
			array( 'timeout' => 15, 'sslverify' => false )
		);

		// Make sure the response came back okay.
		if ( is_wp_error( $response ) ) {
			return false;
		}

		$response = json_decode( wp_remote_retrieve_body( $response ) );

		return $response;
	 }
	 
	/**
	 * Checks if license is valid and gets expire date.
	 *
	 * @since 1.0.0
	 *
	 * @return string $message License status message.
	 */
	function check_license() {

		$license = trim( get_option( $this->theme_slug . '_purchase_code' ) );
		$strings = $this->strings;

		$api_params = array(
			'themethreads_action' => 'check_license',
			'license'       => $license,
			'from'          => get_site_url(),
		);

		$license_data = $this->get_api_response( $api_params );

		if ( is_object( $license_data ) && $license_data->license == 'valid' ) {

			update_option( $this->theme_slug . '_purchase_code_status', $license_data->license );
			$message = '<div class="threads-dsd-confirmation success">
							<h4>Thanks for the verification!</h4>
							<p>Enjoy the Volley experience. Looking for help? Visit <a href="https://docs.themethreadswp.com/" target="_blank">our help center</a> or <a href="https://volley.themethreadswp.com/" target="_blank">submit a ticket</a>.</p>
						</div><!-- /.threads-dsd-confirmation success -->';
		}
		else {
			$message = '<div class="threads-dsd-confirmation success">
							<h4>Thanks for the verification!</h4>
						</div><!-- /.threads-dsd-confirmation success -->';
		}

		return $message;
	}

	/**
	 * Disable requests to wp.org repository for this theme.
	 *
	 * @since 1.0.0
	 */
	function disable_wporg_request( $r, $url ) {

		// If it's not a theme update request, bail.
		if ( 0 !== strpos( $url, 'https://api.wordpress.org/themes/update-check/1.1/' ) ) {
 			return $r;
 		}

 		// Decode the JSON response
 		$themes = json_decode( $r['body']['themes'] );

 		// Remove the active parent and child themes from the check
 		$parent = get_option( 'template' );
 		$child = get_option( 'stylesheet' );
 		unset( $themes->themes->$parent );
 		unset( $themes->themes->$child );

 		// Encode the updated JSON response
 		$r['body']['themes'] = json_encode( $themes );

 		return $r;
	}
	
}

new ThemeThreads_Register;