<?php
/**
 * Remove unwanted script for specific post ids
 */
add_action( 'wp_enqueue_scripts', function () {
	global $post;
	$pageID = array( 749, 759 );

	if ( in_array( $post->ID, $pageID ) ) :

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
	endif;
}, 999 );


/**
 * Remove Bloat everywhere except
 */
add_action( 'wp_enqueue_scripts', function () {
	global $post;
	$pageID = array( 749, 759 );

	if ( ! in_array( $post->ID, $pageID ) ) :

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
	endif;
}, 999 );
