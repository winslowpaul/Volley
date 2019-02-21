<?php
/*
Plugin Name: Volley Portfolio
Plugin URI: http://volley.themethreadswp.com/
Description: Modern and Diversified Portfolio Plugin, exclusively Volley WordPress Theme.
Version: 1.0.0
Author: ThemeThreads Themes
Author URI: https://themeforest.net/user/themethreads
Text Domain: volley-portfolio
*/

if( !defined( 'ABSPATH' ) ) 
	exit; // Exit if accessed directly

class ThemeThreads_Portfolio {

	/**
	 * Hold an instance of ThemeThreads_Portfolio class.
	 * @var ThemeThreads_Portfolio
	 */
	protected static $instance = null;
	
	/**
	 * Main ThemeThreads_Portfolio instance.
	 *
	 * @return ThemeThreads_Portfolio - Main instance.
	 */
	public static function instance() {

		if(null == self::$instance) {
			self::$instance = new ThemeThreads_Portfolio();
		}

		return self::$instance;
	}

	/**
	 * [__construct description]
	 * @method __construct
	 */
	public function __construct() {

		add_action( 'plugins_loaded', array( $this, 'load_plugin_textdomain' ) );
		add_action( 'themethreads_init', array( $this, 'init_hooks' ) );
		add_action( 'admin_notices', array( $this, 'activate_addons_notice' ) );

	}

	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain( 'volley-portfolio', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );
	}

	/**
	 * [init_hooks description]
	 * @method init_hooks
	 * @return [type]     [description]
	 */
	public function init_hooks() {

		add_action( 'init', array( $this, 'load_post_types' ), 1 );

	}	

	public function activate_addons_notice() {

		if( class_exists( 'ThemeThreads_Addons' ) ) {
			return;
		}
	?>
		<div class="updated not-h2">
			<p><strong><?php esc_html_e( 'Please activate the Volley Core to use the Volley Portfolio plugin.', 'volley-portfolio' ); ?></strong></p>
			<?php
				$screen = get_current_screen();
				if ($screen -> base != 'plugins'):
			?>
				<p><a href="<?php echo esc_url( admin_url( 'plugins.php' ) ); ?>"><?php esc_html_e( 'Activate Volley Core', 'volley-portfolio' ); ?></a></p>
			<?php endif; ?>
		</div>
	<?php
	}

	/**
	 * [load_post_types description]
	 * @method load_post_types
	 * @return [type]          [description]
	 */
	public function load_post_types() {
		
		if( ! class_exists( 'ThemeThreads_Addons' ) ) {
			return;
		}

		if( function_exists( 'require_if_theme_supports' ) ) {
			require_if_theme_supports( 'themethreads-portfolio', $this->plugin_dir() . 'post-types/themethreads-portfolio.php' );
		}

	}

	/**
	 * Plugin activation
	 */
	public static function activate() {
		flush_rewrite_rules();
	}

	/**
	 * Plugin deactivation
	 */
	public static function deactivate() {
		flush_rewrite_rules();
	}

	public function plugin_uri() {
		return plugin_dir_url( __FILE__ );
	}

	public function plugin_dir() {
		return plugin_dir_path( __FILE__ );
	}
	
}

/**
 * Main instance of ThemeThreads_Portfolio.
 *
 * Returns the main instance of ThemeThreads_Portfolio to prevent the need to use globals.
 *
 * @return ThemeThreads_Portfolio
 */
function themethreads_portfolio() {
	return ThemeThreads_Portfolio::instance();
}
themethreads_portfolio(); // init i

register_activation_hook( __FILE__, array( 'ThemeThreads_Portfolio', 'activate' ) );
register_deactivation_hook( __FILE__, array( 'ThemeThreads_Portfolio', 'deactivate' ) );