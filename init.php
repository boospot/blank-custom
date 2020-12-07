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
 * Plugin Name:       Custom Code
 * Plugin URI:        https://boospot.com/
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Requires PHP:      7.0
 * Requires at least: 5.0
  * Version:           1.0.0
 * Author:            Rao
 * Author URI:        https://booskills.com/rao
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 */
 
 // If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}


// register Custom style and Scripts on initialization
add_action('init', function() {
    wp_register_script( 'blank-custom', plugins_url('/js/custom-script.js', __FILE__), array(), '1.0.0', true );
    wp_register_style( 'blank-custom', plugins_url('/css/custom-style.css', __FILE__), false, '1.0.0', 'all');
});


// use the registered jquery and style above
add_action('wp_enqueue_scripts', function(){
   wp_enqueue_script('blank-custom');
   wp_enqueue_style( 'blank-custom' );
});
