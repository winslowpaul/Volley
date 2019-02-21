<?php
/**
* ThemeThreads Framework
*/

if( ! defined( 'ABSPATH' ) ) 
	exit; // Exit if accessed directly
	
// Template Tags -------------------------------------------------------
function themethreads_views_button( $post_id = 0 ) {

	// if post support post likes
	if( ! post_type_supports( get_post_type( $post_id ), 'themethreads-post-views' ) ) {
		esc_html_e( 'Post type not support views.', 'volley-core' );
		return;
	}

	echo ThemeThreads_Post_View::instance()->themethreads_get_post_views( $post_id );
}	

// Post View Class -----------------------------------------------------

/**
 * ThemeThreads_Post_View
 */
class ThemeThreads_Post_View extends ThemeThreads_Base {
	
	/**
     * Hold an instance of ThemeThreads_Post_View class.
     * @var ThemeThreads_Post_View
     */
    protected static $instance = null;

	/**
	 * [$meta description]
	 * @var string
	 */
	protected $metakey = '_themethreads_views_count';

	/**
	 * Main ThemeThreads_Post_View instance.
	 *
	 * @return ThemeThreads_Post_View - Main instance.
	 */
    public static function instance() {

		if( null == self::$instance ) {
			self::$instance = new ThemeThreads_Post_View();
        }

        return self::$instance;
    }
    
	/**
	 * [__construct description]
	 * @method __construct
	 */
	private function __construct() {

		$this->add_action( 'wp_head', 'themethreads_track_post_views');
		remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);

	}

	public function themethreads_set_post_views( $postID ) {

		$count_key = $this->metakey;
	    $count = get_post_meta( $postID, $count_key, true );

		if( $count == '' ){
	        $count = 0;
	        delete_post_meta( $postID, $count_key );
	        add_post_meta( $postID, $count_key, '0' );
		}
		else {
	        $count++;
			update_post_meta( $postID, $count_key, $count );
	    }
	}
	
	public function themethreads_track_post_views( $post_id ) {

		if ( ! is_single() ) 
			return;
		    
	    if ( empty ( $post_id) ) {
	        global $post;
	        $post_id = $post->ID;
	    }
		$this->themethreads_set_post_views( $post_id );

	}
	
	public function themethreads_get_post_views( $postID ){

	    $count_key = $this->metakey;
		$count     = get_post_meta( $postID, $count_key, true );

		if( $count == '' ){

	        delete_post_meta( $postID, $count_key );
	        add_post_meta( $postID, $count_key, '0' );
	        return esc_html__( 'O Views', 'volley-core' );

	    }

	    return $count . esc_html__( ' Views', 'volley-core' );

	}

}
ThemeThreads_Post_View::instance();