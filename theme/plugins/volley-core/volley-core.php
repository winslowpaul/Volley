<?php
/*
Plugin Name: Volley Core
Plugin URI: http://volley.themethreadswp.com/
Description: Intelligent and Powerful Elements Plugin, exclusively for Volley WordPress Theme.
Version: 1.0.0
Author: ThemeThreads
Author URI: https://themeforest.net/user/themethreads
Text Domain: volley-core
*/

//Exit if accessed directly
if( ! defined( 'ABSPATH' ) ) 
	exit; 

define( 'LD_ADDONS_PATH', plugin_dir_path( __FILE__ ) );
define( 'LD_ADDONS_URL', plugin_dir_url( __FILE__ ) );
define( 'ENVATO_HOSTED_SITE', true );

include_once LD_ADDONS_PATH . 'includes/themethreads-base.php';

class ThemeThreads_Addons extends ThemeThreads_Base {

	/**
	 * Hold an instance of ThemeThreads_Addons class.
	 * @var ThemeThreads_Addons
	 */
	protected static $instance = null;

	/**
	 * [$params description]
	 * @var array
	 */
	public $params = array();

	/**
	 * Main ThemeThreads_Addons instance.
	 *
	 * @return ThemeThreads_Addons - Main instance.
	 */
	public static function instance() {

		if( null == self::$instance ) {
			self::$instance = new ThemeThreads_Addons();
		}

		return self::$instance;
	}

	/**
	 * [__construct description]
	 * @method __construct
	 */
	public function __construct() {

		spl_autoload_register( array( $this, 'auto_load' ) );
		$this->includes();
		$this->add_action( 'plugins_loaded', 'load_plugin_textdomain' );
		$this->add_action( 'admin_init', 'libs_init', 10, 1 );
		$this->add_action( 'admin_init', 'themethreads_update_theme' );
		$this->add_action( 'admin_init', 'multiple_post_thumbnail' );
		$this->add_action( 'redux/extensions/before', 'load_redux_extensions', 0 );
		$this->add_action( 'themethreads_init', 'init_hooks' );
		$this->add_action( 'admin_notices', 'activate_theme_notice' );
		$this->add_filter( 'wp_kses_allowed_html', 'wp_kses_allowed_html', 10, 2 );
		$this->add_filter( 'tuc_request_update_query_args-One','autoupdate_verify');
		
	}

	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain( 'volley-core', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );
	}

	/**
	 * [Auto load libraries]
	 * @method auto_load
	 *
	 * @param $class 
	 * @return type
	 * @since    1.0.0
	 */
	public function auto_load( $class ) {
		if( strpos( $class, 'ThemeThreads' ) !== false ) {
			$class_dir = LD_ADDONS_PATH  . 'libs'.DIRECTORY_SEPARATOR.'core-importer'.DIRECTORY_SEPARATOR;
        	$class_dir_ = LD_ADDONS_PATH . 'libs'.DIRECTORY_SEPARATOR.'themethreads-api'.DIRECTORY_SEPARATOR;
        	$class_name = str_replace( '_', DIRECTORY_SEPARATOR, $class ).'.php';
			if( file_exists( $class_dir . $class_name ) ) {
				require_once $class_dir . $class_name;
			}
			if( file_exists( $class_dir_ . $class_name ) ) {
				require_once $class_dir_ . $class_name;
			}
    	}
	}
	
	public function multiple_post_thumbnail() {
		//Add Multi Featured Image
		include_once $this->plugin_dir() . 'extensions/multiple-post-thumbnails/multiple-post-thumbnails.php';
	}

	/**
	 * [includes description]
	 * @method includes
	 *
	 * @return [type]   [description]
	 */
	public function includes() {

		include_once $this->plugin_dir() . 'includes/themethreads-helpers.php';
		include_once $this->plugin_dir() . 'extensions/extensions.init.php';
		include_once $this->plugin_dir() . 'libs/updater/plugin-update-checker.php';
		include_once $this->plugin_dir() . 'extras/mailchimp/mailchimp.php';

		//Load extensions
		// Redux use any font
		include_once $this->plugin_dir() . 'extensions/redux-custom-fonts/redux-use-any-font.php';
		include_once $this->plugin_dir() . 'extensions/redux-custom-fonts/redux-custom-fonts.php';

		//Custom icons by user
		include_once $this->plugin_dir() . 'extensions/redux-custom-icons/redux-custom-icons.php';

	}
	
	/**
	 * Init redux framework
	 * @method redux_init
	 */
	public function redux_init() {
		
		$this->add_action( 'redux/extensions/before', 'load_redux_extensions', 0 );
		$this->add_action( 'redux/themethreads_one_opt/field/class/typography', 'register_typography' );
		$this->add_action( 'redux/themethreads_one_opt/field/class/themethreads_colorpicker', 'register_themethreads_colorpicker' );
		$this->add_action( 'redux/themethreads_one_opt/field/class/color_rgba', 'register_color_rgba' );
		$this->add_action( 'redux/themethreads_one_opt/field/class/iconpicker', 'register_iconpicker' );

		new ThemeThreads_Meta_Boxes;
		new ThemeThreads_Theme_Options;
		new ThemeThreads_Dynamic_CSS;
		if( class_exists( 'ThemeThreads_Responsive_CSS' ) ) {
			new ThemeThreads_Responsive_CSS;	
		}

	}
	
	/**
	 * [load_redux_extensions description]
	 * @method load_redux_extensions
	 * @return [type]                [description]
	 */
	public function load_redux_extensions( $redux ) {

		$path = $this->plugin_dir() . 'extensions/';
		$exts = array( 'metaboxes', 'repeater' );

		foreach( $exts as $ext ) {

			$extension_class = 'ReduxFramework_extension_' . $ext;
			$class_file = $path . 'redux-' . $ext . '/extension_' . $ext . '.php';
			$class_file = apply_filters( 'redux/extension/' . $redux->args['opt_name'] . '/' . $ext, $class_file );

			if( !class_exists( $extension_class ) && $class_file ) {
				require_once( $class_file );
				$extension = new $extension_class( $redux );
			}
		}
	}
	
	/**
	 * [register_gradient description]
	 * @method register_gradient
	 * @return [type]              [description]
	 */
	public function register_iconpicker() {
		return $this->plugin_dir() . 'extensions/redux-iconpicker/field_iconpicker.php';
	}

	/**
	 * [register_themethreads_colorpicker description]
	 * @method register_themethreads_colorpicker
	 * @return [type]              [description]
	 */
	public function register_themethreads_colorpicker() {
		return $this->plugin_dir() . 'extensions/redux-themethreads-colorpicker/field_themethreads_colorpicker.php';
	}

	/**
	 * [register_typography description]
	 * @method register_typography
	 * @return [type]              [description]
	 */
	public function register_typography() {
		return $this->plugin_dir() . 'extensions/redux-typography/field_typography.php';
	}

	/**
	 * [register_color_rgba description]
	 * @method register_color_rgba
	 * @return [type]              [description]
	 */
	public function register_color_rgba() {
		return $this->plugin_dir() . 'extensions/redux-color-rgba/field_color_rgba.php';
	}
	
	
	public function themethreads_update_theme() {
		
		if( defined( 'ENVATO_HOSTED_SITE' ) ) {
			return;
		}

		Puc_v4_Factory::buildUpdateChecker(
			'http://api.themethreadswp.com/products/One/update.php',
			get_template_directory(),
			get_template()
		);
		
	}

	/**
	 * [init_hooks description]
	 * @method init_hooks
	 *
	 * @return [type]     [description]
	 */
	public function init_hooks() {

		$this->assets_css = plugins_url( '/assets/css', __FILE__ );
		$this->assets_vendors = plugins_url( '/assets/vendors', __FILE__ );
		$this->assets_js  = plugins_url( '/assets/js', __FILE__ );

		include_once $this->plugin_dir() . 'extras/themethreads-extras.php';

		if( class_exists( 'WPBakeryShortCode' ) ) {
			include_once $this->plugin_dir() . 'includes/themethreads-shortcode.php';
			include_once $this->plugin_dir() . 'includes/params/themethreads-extra-params.php';
			include_once $this->plugin_dir() . 'includes/params/themethreads-default-params.php';
		    include_once $this->plugin_dir() . 'includes/params/themethreads-icon-params.php';
		    include_once $this->plugin_dir() . 'includes/params/themethreads-font-params.php';
			include_once $this->plugin_dir() . 'includes/params/themethreads-header-params.php';

		}

		$this->add_action( 'admin_print_scripts-post.php', 'enqueue', 99 );
		$this->add_action( 'admin_print_scripts-post-new.php', 'enqueue', 99 );
		$this->add_action( 'admin_print_scripts-widgets.php', 'enqueue_widgets', 99 );
		
		$this->add_action( 'vc_load_default_params', 'reload_vc_js' );
		$this->add_action( 'vc_load_iframe_jscss', 'vc_frontend_jscss' );
		$this->add_action( 'init', 'load_post_types', 1 );
		$this->add_action( 'init', 'init', 25 );
		$this->add_action( 'init', 'redux_init' );
		$this->add_action( 'widgets_init', 'load_widgets', 25 );

		$this->add_action( 'admin_enqueue_scripts', 'vc_themethreads_css' );
		$this->add_action( 'admin_enqueue_scripts', 'redux_themethreads_css', 999 );
		$this->add_action( 'wp_enqueue_scripts', 'plugin_css', 99 );
		
	}

	public function activate_theme_notice() {

		if( did_action( 'themethreads_init' ) > 0 ) {
			return;
		}
	?>
		<div class="updated not-h2">
			<p><strong><?php esc_html_e( 'Please activate the Volley WordPress Theme to use Volley Core plugin.', 'volley-core' ); ?></strong></p>
			<?php
				$screen = get_current_screen();
				if ($screen -> base != 'themes'):
			?>
				<p><a href="<?php echo esc_url( admin_url( 'themes.php' ) ); ?>"><?php esc_html_e( 'Activate theme', 'volley-core' ); ?></a></p>
			<?php endif; ?>
		</div>
	<?php
	}

	/**
	 * [init description]
	 * @method init
	 *
	 * @return [type] [description]
	 */
	public function init() {

		if ( class_exists( 'Vc_Manager' ) && class_exists( 'WPBakeryShortCode' ) ) {
			$this->init_vc();
			$this->vc_integration();
			$this->load_shortcodes();
			$this->vc_themethreads_templates();
		}
	}

	/**
	 * [Load plugin libraries]
	 * @method libs_init
	 *
	 * @return type
	 * @since    1.0.0
	 */
	public function libs_init() {
		global $ThemeThreadsCore;//to do rename the libs core class
		$ThemeThreadsCore                              = new ThemeThreadsCore();
		$ThemeThreadsCore['path']                      = LD_ADDONS_PATH;
    	$ThemeThreadsCore['url']                       = LD_ADDONS_URL;
    	$ThemeThreadsCore['version']                   = '1.0';
    	$ThemeThreadsCore['ThemeThreadsRedirect']             = new ThemeThreadsRedirect();
    	$ThemeThreadsCore['ThemeThreadsEnvato']               = new ThemeThreadsEnvato();
    	$ThemeThreadsCore['ThemeThreadsCheck']                = new ThemeThreadsCheck();
    	$ThemeThreadsCore['ThemeThreadsNotices']              = new ThemeThreadsNotices();
    	$ThemeThreadsCore['ThemeThreadsLog']                  = new ThemeThreadsLog();
    	$ThemeThreadsCore['ThemeThreadsDownload']             = new ThemeThreadsDownload( $ThemeThreadsCore );
    	$ThemeThreadsCore['ThemeThreadsReset']                = new ThemeThreadsReset( $ThemeThreadsCore );
    	$ThemeThreadsCore['ThemeThreadsThemeDemoImporter']    = new ThemeThreadsThemeDemoImporter( $ThemeThreadsCore );
    	apply_filters( 'themethreads/config', $ThemeThreadsCore );
    	return $ThemeThreadsCore->run();
	}

	/**
	 * [Accsess the libs core class]
	 * @method themethreads_libs_core
	 *
	 * @return object|null
	 * @since    1.0.0
	 */
	public function themethreads_libs_core( $class = '' ) {
		global $ThemeThreadsCore;
		if( isset( $class ) ) {
			return $ThemeThreadsCore;
		} else {
			if( is_object( $ThemeThreadsCore[$class] ) ) {
				return $ThemeThreadsCore[$class];
			}
		}
	}

	/**
	 * [Show login notice for users]
	 * @method themethreads_login_notice
	 *
	 * @return object|null
	 * @since    1.0.0
	 */
	public function themethreads_login_notice() {
		$ThemeThreadsCore = $this->themethreads_libs_core();
		if( $ThemeThreadsCore['ThemeThreadsCheck']->logged_in_mail() === null && !isset($_GET['refresh']) && $ThemeThreadsCore['ThemeThreadsNotices']->get_cookie_timer() != 1 ) {
			$message = sprintf( wp_kses_post( __( '<a href="%s">Log in</a> with your Envato account to take full advantage of <strong>One theme</strong>', 'volley-core' ) ), $ThemeThreadsCore['ThemeThreadsEnvato']->login_url() );
			$ThemeThreadsCore['ThemeThreadsNotices']->admin_notice($message, array(
            	'type' => 'info',
           		'classes' => 'themethreads-login-notice',
            	'dismissTime' => 'themethreads_dissmiss_timer'
        	));
		} elseif( !$ThemeThreadsCore['ThemeThreadsCheck']->is_vaild() && !isset($_GET['refresh']) ) {
    		$message = sprintf( wp_kses_post( __( 'We couldn\'t find <strong>One theme</strong> with the logged in account <a href="%s">Log in with different account</a>', 'volley-core' ) ), $ThemeThreadsCore['ThemeThreadsEnvato']->login_url() );
    		$ThemeThreadsCore['ThemeThreadsNotices']->admin_notice($message, array(
    			'type' => 'error',
            	'classes' => 'themethreads-login-notice themethreads-not-vaild',
            	'dismissTime' => 'themethreads_dissmiss_timer'
        	));
   		}
	}

	public function autoupdate_verify( $query_args ) {
		$ThemeThreadsCore = $this->themethreads_libs_core();
		$themethreads_token = $ThemeThreadsCore['ThemeThreadsCheck']->get_token();
		if( isset($themethreads_token) && $themethreads_token != ''){
			$query_args['token'] = $themethreads_token;
		}else{
			$query_args['token'] = '';
		}
		return $query_args;
	}

	/**
	 * Load vc scripts
	 */
	public function enqueue() {
		
		//Load jquery UI css
		wp_enqueue_style('jquery-ui', $this->assets_css. '/jquery-ui.min.css' );
		wp_enqueue_style('jquery-ui-structure', $this->assets_css. '/jquery-ui.structure.min.css' );
		wp_enqueue_style('jquery-ui-theme', $this->assets_css. '/jquery-ui.theme.min.css' );
		
		//Animated icon font
		wp_enqueue_style( 'themethreads-animated-icons', $this->assets_vendors . '/animated-icons/style.css' );

		wp_enqueue_style( 'ld-colorpicker',    $this->assets_css. '/themethreads-colorpicker.css' );
		wp_enqueue_script( 'themethreads-grapick',   $this->assets_vendors . '/grapick/grapick.min.js' ,  array('jquery'), '1.0.0', true );
		wp_enqueue_script( 'themethreads-colorpicker',   $this->assets_js . '/plugin.themethreadsColorPicker.min.js' ,  array('jquery'), '1.0.0', true );
		wp_enqueue_script( 'ld-vc-script',   $this->assets_js . '/vc-script.js' , array('jquery'), '1.0.0', true );
		
		if( function_exists( 'vc_mode' ) && 'admin_frontend_editor' === vc_mode() ) {
			wp_enqueue_script( 'ld-vc-frontend-script',   $this->assets_js . '/vc-script-frontend.js' , array( 'jquery', 'ld-vc-script' ), '1.0.0', true );
			wp_enqueue_style( 'threads-admin-frontend', $this->assets_css. '/themethreads-vc.min.css' );
		}

	}
	/**
	 * Loand vc scripts
	 */
	public function vc_frontend_jscss() {
		wp_enqueue_style( 'ld-vc-frontend', $this->assets_css. '/vc-frontend-style.min.css' );
	}		

	public function vc_themethreads_css() {
		wp_enqueue_style( 'threads-admin', $this->assets_css. '/themethreads-vc.min.css', array( 'js_composer' ) );
		if( is_rtl() ) {
			wp_enqueue_style( 'threads-admin-rtl', $this->assets_css. '/themethreads-vc-rtl.min.css', array( 'threads-admin' ) );
		}
	}

	public function redux_themethreads_css() {
		wp_enqueue_style( 'threads-redux', $this->assets_css. '/themethreads-redux.min.css', array() );
		if( is_rtl() ) {
			wp_enqueue_style( 'threads-redux-rtl', $this->assets_css. '/themethreads-redux-rtl.min.css', array() );
		}
	}
	
	public function plugin_css() {
		wp_enqueue_style( 'volley-core', $this->assets_css. '/volley-core.min.css', array() );
		
	}


	/**
	 * [load_post_types description]
	 * @method load_post_types
	 *
	 * @return [type]          [description]
	 */
	public function load_post_types() {

		require_if_theme_supports( 'themethreads-header', $this->plugin_dir() . 'post-types/themethreads-header.php' );
		require_if_theme_supports( 'themethreads-footer', $this->plugin_dir() . 'post-types/themethreads-footer.php' );
		require_if_theme_supports( 'themethreads-mega-menu', $this->plugin_dir() . 'post-types/themethreads-mega-menu.php' );

	}

	/**
	 * [vc_themethreads_templates description]
	 * @method vc_themethreads_templates
	 *
	 * @return [type]  [description]
	 */
	public function vc_themethreads_templates() {

		$themethreads_templates = new ThemeThreads_Vc_Templates_Panel_Editor();
		return $themethreads_templates->init();

	}

	/**
	 * [init_vc description]
	 * @method init_vc
	 *
	 * @return [type]  [description]
	 */
	public function init_vc() {

		global $vc_manager;
		$vc_manager->setIsAsTheme();
		$vc_manager->disableUpdater();

		$list = array( 'page', 'post', 'product', 'themethreads-header', 'themethreads-footer', 'themethreads-mega-menu', 'themethreads-portfolio' );
		$vc_manager->setEditorDefaultPostTypes( $list );

		//disable VC update notifications
		if( is_admin() ) {

			if ( ! isset( $_COOKIE['vchideactivationmsg'] ) ) {
				setcookie( 'vchideactivationmsg', '1', strtotime( '+3 years' ), '/' );
			}

			if ( ! isset( $_COOKIE[ 'vchideactivationmsg_vc11' ] ) ) {
				setcookie( 'vchideactivationmsg_vc11', ( defined( 'WPB_VC_VERSION' ) ? WPB_VC_VERSION : '1' ), strtotime( '+3 years' ), '/' );
			}
		}

		include_once $this->plugin_dir() . 'includes/params/themethreads-gradient-param.php';
		include_once $this->plugin_dir() . 'includes/params/themethreads-colorpicker-param.php';
		include_once $this->plugin_dir() . 'includes/params/themethreads-select-image-param.php';
		include_once $this->plugin_dir() . 'includes/params/themethreads-slider-param.php';
		include_once $this->plugin_dir() . 'includes/params/themethreads-subheading-param.php';
		include_once $this->plugin_dir() . 'includes/params/themethreads-responsive-param.php';
		include_once $this->plugin_dir() . 'includes/params/themethreads-responsive-css-editor.php';
		include_once $this->plugin_dir() . 'includes/params/themethreads-responsive-margin-param.php';
		include_once $this->plugin_dir() . 'includes/params/themethreads-responsive-alignment-param.php';
		include_once $this->plugin_dir() . 'includes/params/themethreads-responsive-textfield-param.php';
		include_once $this->plugin_dir() . 'includes/params/shape-divider-param/themethreads-shape-divider-param.php';
		include_once $this->plugin_dir() . 'includes/params/themethreads-attach-image-param.php';
		include_once $this->plugin_dir() . 'includes/params/themethreads-checkbox-param.php';
		include_once $this->plugin_dir() . 'includes/params/themethreads-advanced-checkbox-param.php';
		include_once $this->plugin_dir() . 'includes/params/themethreads-button-set-param.php';
		include_once $this->plugin_dir() . 'includes/params/themethreads-multiple-dropdown-param.php';

		// Set new theme directory
		$dir = get_template_directory() . '/templates/vc';
		vc_set_shortcodes_templates_dir( $dir );
	}

	/**
	 * [vc_integration description]
	 * @method vc_integration
	 *
	 * @return [type]         [description]
	 */
	public function vc_integration() {

	}

	/**
	 * [load_shortcodes description]
	 * @method load_shortcodes
	 *
	 * @return [type]          [description]
	 */
	public function load_shortcodes() {

		//List of shortcodes in APLHABETICAL ORDER!!!!
		$shortcodes = array(
			'accordion',
			'blog',
			'button',
			'carousel',
			'carousel-gallery',			
			'carousel-3d',
			'laptop-carousel',
			'counter',
			'countdown',
			'content-box',
			'contact-form',
			'content-box-table',
			'content-box-cell',
			'custom-menu',
			'icon-box',
			'testimonial',
			'testi-carousel',
			'price-table',
			'process-box',
			'team-members-circular',
			'team-member',
			'tabs',
			'particles',
			'progressbar',
			'promo',
			'misc',
			'modal-window',
			'section-title',
			'social-icons',
			'shop-banner',
			'spacer',
			'images-group-container',
			'images-group-element',
			'images-comparison',
			'fancy-heading',
			'flipbox',
			'freakin-image',
			'google-map',
			'instagram',
			'tweet',
			'milestone',
			'message',
			'masked-image',
			'newsletter',
			'roadmap',
			'roadmap-item',
			
			'icon-box-circle',
			'icon-box-circle-item',
			
			'media',
			'media-element',
			
			'list',

			'pointer-tooltip',
			
			//'timeline',
			//'timeline-item',

			'header-trigger',
			'header-iconbox',
			'header-social-icons',
			'header-spacing',
			'header-search',
			'header-separator',
			'header-dropdown',
			'header-lang-switcher',
			'header-menu',
			'header-image',
			'header-text',
			'header-button',
			'header-collapsed',
			'header-cart',
			'header-custom-menu',
			
			'woo-products',
		);

		//Add portfolio sc if One Portfolio is enabled
		if( class_exists( 'ThemeThreads_Portfolio' ) ) {
			array_push(
				$shortcodes,
				'portfolio-listing'
			);
		};

		// Order Shortcodes
		sort( $shortcodes );

		foreach( $shortcodes as $shortcode ) {

			$file = $this->plugin_dir(). "shortcodes/{$shortcode}/themethreads-{$shortcode}.php";

			if ( file_exists( $file ) ) {
				require_once $file;
			}
		}
	}

	/**
	 * [load_widgets description]
	 * @method load_widgets
	 *
	 * @return [type]       [description]
	 */
	public function load_widgets() {

		//List of widgets in APLHABETICAL ORDER!!!!
		$widgets = array(
			'ThemeThreads_Newsletter_Widget',
			'ThemeThreads_Trending_Posts_Widget',
			'ThemeThreads_Latest_Posts_Widget',
			'ThemeThreads_Social_Followers_Widget',
		);

		foreach( $widgets as $widget ) {
			if ( file_exists( $this->plugin_dir(). "widgets/{$widget}.class.php" ) ) {
				require_once( $this->plugin_dir(). "widgets/{$widget}.class.php" );
				register_widget( $widget );
			}
		}
	}

	/**
	 * Load widget scripts
	 */
	public function enqueue_widgets() {
		//wp_enqueue_script( 'rs-widgets',   $this->assets_js . '/widgets.js' ,  array('jquery','select2'), '1.0.0', true );
		wp_enqueue_media();
	}

	/**
	 * Reload JS
	 */
	public function reload_vc_js() {
		//echo '<script type="text/javascript">(function($){ $(document).ready( function(){ $.reloadPlugins(); }); })(jQuery);</script>';
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
		return LD_ADDONS_PATH;
	}

	public function wp_kses_allowed_html( $tags, $context ) {

		if( 'post' !== $context ) {
			return $tags;
		}

		$tags['style'] = array( 'types' => array() );

		return $tags;
	}
}

/**
 * Main instance of ThemeThreads_Theme.
 *
 * Returns the main instance of ThemeThreads_Theme to prevent the need to use globals.
 *
 * @return ThemeThreads_Theme
 */
function themethreads_addons() {
	return ThemeThreads_Addons::instance();
}
themethreads_addons(); // init i

register_activation_hook( __FILE__, array( 'ThemeThreads_Addons', 'activate' ) );
register_deactivation_hook( __FILE__, array( 'ThemeThreads_Addons', 'deactivate' ) );