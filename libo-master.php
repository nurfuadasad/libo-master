<?php
/*
Plugin Name: Libo Master
Plugin URI: https://themeforest.net/user/ir-tech/portfolio
Description: Plugin to contain short codes and custom post types of the Libo theme.
Author: Ir-Tech
Author URI: http://irtech.biz/
Version: 1.0.0
Text Domain: libo-master
*/

// If this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

//plugin dir path
define( 'LIBO_MASTER_ROOT_PATH', plugin_dir_path( __FILE__ ) );
define( 'LIBO_MASTER_ROOT_URL', plugin_dir_url( __FILE__ ) );
define( 'LIBO_MASTER_SELF_PATH', 'libo-master/libo-master.php' );
define( 'LIBO_MASTER_VERSION', '1.0.0' );
define( 'LIBO_MASTER_INC', LIBO_MASTER_ROOT_PATH .'/inc');
define( 'LIBO_MASTER_LIB', LIBO_MASTER_ROOT_PATH .'/lib');
define( 'LIBO_MASTER_ELEMENTOR', LIBO_MASTER_ROOT_PATH .'/elementor');
define( 'LIBO_MASTER_DEMO_IMPORT', LIBO_MASTER_ROOT_PATH .'/demo-data-import');
define( 'LIBO_MASTER_ADMIN', LIBO_MASTER_ROOT_PATH .'/admin');
define( 'LIBO_MASTER_ADMIN_ASSETS', LIBO_MASTER_ROOT_URL .'admin/assets');
define( 'LIBO_MASTER_WP_WIDGETS', LIBO_MASTER_ROOT_PATH .'/wp-widgets');
define( 'LIBO_MASTER_ASSETS', LIBO_MASTER_ROOT_URL .'assets/');
define( 'LIBO_MASTER_CSS', LIBO_MASTER_ASSETS .'css');
define( 'LIBO_MASTER_JS', LIBO_MASTER_ASSETS .'js');
define( 'LIBO_MASTER_IMG', LIBO_MASTER_ASSETS .'img');

//load additrans helpers functions
if (!function_exists('libo_master')){
	require_once LIBO_MASTER_INC .'/class-libo-master-helper-functions.php';
	if (!function_exists('libo_master')){
		function libo_master(){
			return class_exists('Libo_Master_Helper_Functions') ? new Libo_Master_Helper_Functions() : false;
		}
	}
}
//ob flash
remove_action( 'shutdown', 'wp_ob_end_flush_all', 1 );
//load codester framework functions
if ( !libo_master()->is_libo_active()) {
	if ( file_exists( LIBO_MASTER_ROOT_PATH . '/inc/csf-functions.php' ) ) {
		require_once LIBO_MASTER_ROOT_PATH . '/inc/csf-functions.php';
	}
}

//plugin init
if ( file_exists( LIBO_MASTER_ROOT_PATH . '/inc/class-libo-master-init.php' ) ) {
	require_once LIBO_MASTER_ROOT_PATH . '/inc/class-libo-master-init.php';
}
