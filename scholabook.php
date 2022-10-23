<?php
/*
Plugin Name: Scholabook
Plugin URI: https://www.scholabook.com
Description: Scholabook is an advance school management solutions. This plugin allows the site to connect with the scholabook.com API.
Version: 1.0
Author: Mostafijur Rahaman
Author URI: http://mostafijur.in
*/

if ( ! defined( 'WPINC' ) ) {
	die;
}

if (WP_DEBUG === true) {
	error_reporting(E_ALL);
	ini_set('display_errors', 1);
} else {
	error_reporting(0);
	ini_set('display_errors', 0);
}


if(!function_exists('wp_get_current_user')) {
	include_once(ABSPATH . "wp-includes/pluggable.php");
}

/** --------------------------------------------------------------------------
 * Declare Global variables
 * ------------------------------------------------------------------------- */
define('SB_URL', plugins_url('', __FILE__));
define('SB_PATH', plugin_dir_path(__FILE__));
define('SB_LIBRARIES', SB_PATH . 'libraries/');

define('SB_STYLE_URL', plugins_url('assets/styles', __FILE__));
define('SB_STYLE_PATH', plugin_dir_path(__FILE__) . 'assets/styles');


/** ------------------------------------------------
 * Frontend CSS
 * ----------------------------------------------- */
add_action( 'wp_enqueue_scripts', function() {
    wp_enqueue_style( 'sb-front-style', SB_STYLE_URL . '/sb-styles.css', false, '1.0.0' );

	wp_register_script( 'sb-front-script', plugins_url('assets/js/sb-scripts.js', __FILE__), array( 'jquery' ) );
	wp_enqueue_script ( 'sb-front-script' );
	wp_localize_script( 'sb-front-script', 'sbajax', array( 'ajaxurl' => admin_url( 'admin-ajax.php' )));
});

/** ------------------------------------------------
 * Admin CSS
 * ----------------------------------------------- */
add_action( 'admin_enqueue_scripts', function() {
    wp_enqueue_style( 'sb_admin_style', SB_STYLE_URL . '/admin-styles.css', false, '1.0.0' );
});

/** ------------------------------------------------
 * Roles and Capabilities
 * ----------------------------------------------- */
include_once('roles-and-capabilities.php');

/** ------------------------------------------------
 * Common functions and classes
 * ----------------------------------------------- */
include_once('functions.php');
include_once('classes/sb-login-form.php');

/** ------------------------------------------------
 * Shortcodes
 * ----------------------------------------------- */
include_once('shortcodes.php');

/** ------------------------------------------------
 * Custom Admin menu
 * ----------------------------------------------- */
include_once('admin/admin-menu.php');

/** ------------------------------------------------
 * Ajax
 * ----------------------------------------------- */
include_once('ajax/api-ajax.php');

