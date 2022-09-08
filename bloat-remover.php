<?php
/**
 * Remove unwanted script for specific post ids
 */
add_action( 'wp_enqueue_scripts', function () {
	global $post;
	$pageID = array( 749, 759 );

	if ( in_array( $post->ID, $pageID ) ) :

		// wp_dequeue_style('styleID');
		// wp_deregister_style('styleID');
		// wp_dequeue_script('scriptID');
		// wp_deregister_script('scriptID');

	endif;
}, 999 );

/**
 * Remove Bloat everywhere EXCEPT
 */
add_action( 'wp_enqueue_scripts', function () {
	global $post;
	$pageID = array( 749, 759 );

	if ( ! in_array( $post->ID, $pageID ) ) :

		// wp_dequeue_style('styleID');
		// wp_deregister_style('styleID');
		// wp_dequeue_script('scriptID');
		// wp_deregister_script('scriptID');

	endif;
}, 999 );

/**
 * Remove Bloat Specific Post Type
 */
add_action( 'wp_enqueue_scripts', function () {

	$post_types = array( 'post', 'product', 'page' );

	if ( in_array( get_post_type( get_the_ID() ), $post_types, true ) ) :

		// wp_dequeue_style('styleID');
		// wp_deregister_style('styleID');
		// wp_dequeue_script('scriptID');
		// wp_deregister_script('scriptID');

	endif;
}, 999 );

/**
 * Remove Bloat All archive
 */
add_action( 'wp_enqueue_scripts', function () {

	if ( is_archive() ) :

		// wp_dequeue_style('styleID');
		// wp_deregister_style('styleID');
		// wp_dequeue_script('scriptID');
		// wp_deregister_script('scriptID');

	endif;
}, 999 );