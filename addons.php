<?php
/**
 * Plugin Name: Auto Slider Addon
 * Description: Custom Elementor addon.
 * Plugin URI:  https://elementor.com/
 * Version:     1.0.0
 * Author:      MD NESAR MRIDHA
 * Author URI:  https://devnesar.com/
 * Text Domain: customaddons
 *
 * Elementor tested up to:     3.5.0
 * Elementor Pro tested up to: 3.5.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

function custom_addon() {

	// Load plugin file
	require_once( __DIR__ . '/includes/plugin.php' );

	// Run the plugin
	\Custom_Addon\Plugin::instance();


	// Load category manager file
	require_once( __DIR__ . '/includes/category-manager.php' );

	// Load widgets manager file
	require_once( __DIR__ . '/includes/widgets-manager.php' );

	// Load script file
	require_once( __DIR__ . '/includes/script-manager.php' );



}
add_action( 'plugins_loaded', 'custom_addon' );
