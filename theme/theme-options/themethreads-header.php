<?php
/*
 * Header Section
*/

$this->sections[] = array(
	'title'  => esc_html__('Header', 'volley'),
	'icon'   => 'el el-home'
);

include_once( get_template_directory() . '/theme/theme-options/themethreads-header-layout.php' );
include_once( get_template_directory() . '/theme/theme-options/themethreads-header-mobile-nav.php' );
include_once( get_template_directory() . '/theme/theme-options/themethreads-header-title-wrapper.php' );
