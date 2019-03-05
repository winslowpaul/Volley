<?php

/**
 * The ThemeThreads Themes Ave Theme
 *
 * Note: Do not add any custom code here. Please use a child theme so that your customizations aren't lost during updates.
 * http://codex.wordpress.org/Child_Themes
 *
 * @link https://codex.wordpress.org/Theme_Development
 * @link https://codex.wordpress.org/Child_Themes
 *
 * Text Domain: 'volley'
 * Domain Path: /languages/
 */

update_option( 'volley_purchase_code', 'NULLED' );
update_option( 'volley_purchase_code_status', 'valid' );


// Starting The Engine / Load the ThemeThreads Framework ----------------
include_once( get_template_directory() . '/themethreads/themethreads-init.php' );