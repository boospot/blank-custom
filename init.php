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

include_once( 'bloat-remover-functions.php' );


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

// google tag manager excluding admin and shop manager

add_action( 'wp_head', function () {
	if ( current_user_can( 'administrator' ) || current_user_can( 'shop_manager' ) ) {
		return null;
	}
	?>
    <!-- Google Tag Manager -->
    <script>(function (w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start':
                    new Date().getTime(), event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s), dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-XXXXX');</script>
    <!-- End Google Tag Manager -->
	<?php
}
);
add_action( 'ct_before_builder', function () {
	if ( current_user_can( 'administrator' ) || current_user_can( 'shop_manager' ) ) {
		return null;
	}
	?>
    <!-- Google Tag Manager (noscript) -->
    <noscript>
        <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-XXXXX"
                height="0" width="0" style="display:none;visibility:hidden"></iframe>
    </noscript>
    <!-- End Google Tag Manager (noscript) -->
	<?php
}
);
