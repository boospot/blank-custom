<?php
/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 *
 * @wordpress-plugin
 * Plugin Name:       <site> Custom
 * Plugin URI:        https://boospot.com/
 * Description:       Custom Plugin to add custom code and functionality by the developer.
 * Requires PHP:      7.0
 * Requires at least: 5.0
 * Version:           1.0.1
 * Author:            booSpot
 * Author URI:        https://booskills.com/rao
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

// include_once( 'bloat-remover.php' );
// include_once( 'GTM.php' );
// include_once( 'oxygen-functions.php' );


// register Custom style and Scripts on initialization
add_action( 'init', function () {
	wp_register_script( 'custom-script', plugins_url( '/js/script.js', __FILE__ ), array(), filemtime( plugin_dir_path( __FILE__ ) . '/js/script.js' ), true );
	wp_register_style( 'custom-style', plugins_url( '/css/style.css', __FILE__ ), false, filemtime( plugin_dir_path( __FILE__ ) . '/css/style.css' ), 'all' );
} );

// use the registered script and style above
add_action( 'wp_enqueue_scripts', function () {
	wp_enqueue_script( 'custom-script' );
	wp_enqueue_style( 'custom-style' );
}, 999 );


// override universal css by oxygen, 1000000 priority to include after oxygen css files
function wpdd_enqueue_css_after_oxygens() {
	if ( ! class_exists( 'CT_Component' ) ) {
		return;
	}
	$styles = new WP_Styles;
$styles->add( 'custom-after-oxygen', plugin_dir_url( __FILE__ ) . 'css/style.css', false, filemtime( plugin_dir_path( __FILE__ ) . '/css/style.css' ), 'all' );
	$styles->enqueue( array ( 'custom-after-oxygen' ) );
	$styles->do_items();
}
// add_action( 'wp_head', 'wpdd_enqueue_css_after_oxygens', 1000000 );
