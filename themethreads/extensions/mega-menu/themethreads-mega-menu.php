<?php
/**
* ThemeThreads Themes Theme Framework
* The ThemeThreads_Mega_Menu_Manager class
*/

if( !defined( 'ABSPATH' ) )
	exit; // Exit if accessed directly

// Load front-end menu walker
require_once( get_template_directory() . '/themethreads/extensions/mega-menu/themethreads-mega-menu-walker.php' );
require_once( get_template_directory() . '/themethreads/extensions/mega-menu/themethreads-mega-menu-icons.php' );
require_once( get_template_directory() . '/themethreads/extensions/mega-menu/themethreads-mega-menu-custom-icon.php' );

class ThemeThreads_Mega_Menu_Manager extends ThemeThreads_Base {

	function __construct() {

		// Custom Fields - Add
		$this->add_filter( 'wp_setup_nav_menu_item',  'setup_nav_menu_item' );

		// Custom Fields - Save
		$this->add_action( 'wp_update_nav_menu_item', 'update_nav_menu_item', 100, 3 );

		// Custom Walker - Edit
		$this->add_filter( 'wp_edit_nav_menu_walker', 'edit_nav_menu_walker', 100, 2 );
	}

	// Custom Fields - Add
    function setup_nav_menu_item( $menu_item ) {

		$menu_item->themethreads_megaprofile = get_post_meta( $menu_item->ID, '_menu_item_themethreads_megaprofile', true );
		$menu_item->themethreads_submenu_color = get_post_meta( $menu_item->ID, '_menu_item_themethreads_submenu_color', true );
		$menu_item->themethreads_icon = get_post_meta( $menu_item->ID, '_menu_item_themethreads_icon', true );
		$menu_item->themethreads_icon_position = get_post_meta( $menu_item->ID, '_menu_item_themethreads_icon_position', true );
		$menu_item->themethreads_badge = get_post_meta( $menu_item->ID, '_menu_item_themethreads_badge', true );
		$menu_item->themethreads_badge_style = get_post_meta( $menu_item->ID, '_menu_item_themethreads_badge_style', true );
		$menu_item->themethreads_heading_item = get_post_meta( $menu_item->ID, '_menu_item_themethreads_heading_item', true );

        return $menu_item;
    }

	// Custom Fields - Save
	function update_nav_menu_item( $menu_id, $menu_item_db_id, $menu_item_data ) {

		if ( isset( $_REQUEST['menu-item-themethreads-megaprofile'][$menu_item_db_id]) ) {
			update_post_meta($menu_item_db_id, '_menu_item_themethreads_megaprofile', $_REQUEST['menu-item-themethreads-megaprofile'][$menu_item_db_id]);
		}

		if ( isset( $_REQUEST['menu-item-themethreads-submenu-color'][$menu_item_db_id]) ) {
			update_post_meta($menu_item_db_id, '_menu_item_themethreads_submenu_color', $_REQUEST['menu-item-themethreads-submenu-color'][$menu_item_db_id]);
		}

		if ( isset( $_REQUEST['menu-item-themethreads-icon'][$menu_item_db_id]) ) {
			update_post_meta($menu_item_db_id, '_menu_item_themethreads_icon', $_REQUEST['menu-item-themethreads-icon'][$menu_item_db_id]);
		}
		
		if ( isset( $_REQUEST['menu-item-themethreads-icon-position'][$menu_item_db_id]) ) {
			update_post_meta($menu_item_db_id, '_menu_item_themethreads_icon_position', $_REQUEST['menu-item-themethreads-icon-position'][$menu_item_db_id]);
		}

		if ( isset( $_REQUEST['menu-item-themethreads-badge'][$menu_item_db_id] ) ) {
			update_post_meta($menu_item_db_id, '_menu_item_themethreads_badge', $_REQUEST['menu-item-themethreads-badge'][$menu_item_db_id]);
			update_post_meta($menu_item_db_id, '_menu_item_themethreads_badge_style', $_REQUEST['menu-item-themethreads-badge-style'][$menu_item_db_id]);
		}
		
		if ( isset( $_REQUEST['menu-item-themethreads-heading-item'][$menu_item_db_id]) ) {
			update_post_meta($menu_item_db_id, '_menu_item_themethreads_heading_item', $_REQUEST['menu-item-themethreads-heading-item'][$menu_item_db_id]);
		}
		
	}

	// Custom Backend Walker - Edit
	function edit_nav_menu_walker( $walker, $menu_id ) {

		if ( ! class_exists( 'ThemeThreads_Mega_Menu_Edit_Walker' ) ) {
			require_once( get_template_directory() . '/themethreads/extensions/mega-menu/themethreads-mega-menu-edit.php' );
		}

		return 'ThemeThreads_Mega_Menu_Edit_Walker';
	}
}
new ThemeThreads_Mega_Menu_Manager;
