<?php
/**
 * Template Name: Custom Admin Menu
 */

function sb_menu_pages() {
	
	// OL Developer Page
	add_menu_page( 'Scholabook Settings Page', 'Scholabook', 'manage_options', 'scholabook-settings', 'scholabook_settings_page', 'dashicons-id', 80 );
	add_submenu_page( 'scholabook-settings', 'Scholabook Settings Page', 'Scholabook Settings', 'manage_options', 'scholabook-settings', 'scholabook_settings_page' );

    // OL Country Data
	// add_submenu_page( 'ol-settings', 'OL Country Data', 'OL Countries', 'ol_country_data', 'ol-country-data', 'ol_country_data_page' ); 
}

add_action( 'init', function() {
	add_action( 'admin_menu', 'sb_menu_pages' );
});

/** -------------------------------------------------
 * Scholabook Settings Page
 * ------------------------------------------------ */
function scholabook_settings_page() {
	
	// Check that the user has the required capability 
	if(!current_user_can('manage_options')) {
		wp_die( __('You do not have sufficient permissions to access this page.') );
	}
	
	// Display page content
	echo '<div class="wrap">';

	include_once( SB_PATH .'admin/includes/admin-menu-page.php');
	
	echo '</div>';
}