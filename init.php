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
add_action( 'init', function () {
	wp_register_script( 'custom-script', plugins_url( '/js/script.js', __FILE__ ), array(), '1.0.0', true );
	wp_register_style( 'custom-style', plugins_url( '/css/style.css', __FILE__ ), false, '1.0.0', 'all' );
} );

// use the registered script and style above
add_action( 'wp_enqueue_scripts', function () {
	wp_enqueue_script( 'custom-script' );
	wp_enqueue_style( 'custom-style' );
}, 999 );

// Remove unwanted styles and scripts.
add_action('wp_enqueue_scripts','_remove_style', 999);
function _remove_style(){
   global $post;
   $pageID = array(749, 759);

    if(in_array($post->ID, $pageID)) {

		//common woocommerce styles and scrips

		// wp_dequeue_style('wp-block-library');
		// wp_dequeue_style('wc-block-style');
		// wp_dequeue_style('wc-block-vendors-style');
		// wp_dequeue_style('woocommerce-layout');
    // wp_dequeue_style('woocommerce-smallscreen');
    // wp_dequeue_style('woocommerce-general');
		// wp_dequeue_style('photoswipe');
		// wp_dequeue_style('photoswipe-default-skin');
    // wp_dequeue_style('woocommerce-inline-inline');
       
		// wp_dequeue_script('wc-add-to-cart');
		// wp_dequeue_script('jquery-blockui');
		// wp_dequeue_script('woocommerce');
		// wp_dequeue_script('zoom');			 
		 
		// wp_dequeue_script('wc-cart-fragments');
		// wp_dequeue_script('flexslider');
    // wp_dequeue_script('photoswipe-ui-default');
    // wp_dequeue_script('wc-single-product');
   }
}

// google tag manager excluding admin and shop manager

add_action('wp_head', function() { 
	if(current_user_can('administrator') || current_user_can('shop_manager')){
		return null; 
	}
	?>
		<!-- Google Tag Manager -->
		<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
		new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
		j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
		'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
		})(window,document,'script','dataLayer','GTM-XXXXX');</script>
		<!-- End Google Tag Manager -->
	<?php 
	} 
);
add_action('ct_before_builder', function() {
	if(current_user_can('administrator') || current_user_can('shop_manager')){
		return null; 
	}
	?>
		<!-- Google Tag Manager (noscript) -->
		<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-XXXXX"
		height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
		<!-- End Google Tag Manager (noscript) -->
	<?php
	}
);
