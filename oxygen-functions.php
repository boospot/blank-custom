<?php
/**
 * Register Shortcode to fetch any Oxygen Reusable block
 * provide the id of the template as shortcode argument
 *
 * @usage [boo_oxy_template id=7] // where 7 is the id of the template you want to fetch
 */
add_shortcode( 'boo_oxy_template', function ( $atts = [], $content = null, $tag = '' ) {
	// normalize attribute keys, lowercase
	$atts = array_change_key_case( (array) $atts, CASE_LOWER );

	$atts = shortcode_atts( array(
		// Update the default Values
		'id' => 0,
	), $atts );

	// If no id is set, bail out
	if ( ! $atts['id'] ) {
		return null;
	}

	// Call the global variable for loading css files
	global $oxygen_vsb_css_files_to_load;

	// If we do not have Oxygen variables and functions, bail out
	if ( ! $oxygen_vsb_css_files_to_load || ! function_exists( 'ct_do_shortcode' ) ) {
		return null;
	}

	ob_start();

	$view_id = $atts['id'];
	$view    = get_post( $view_id );

	// needed to load cached CSS file
	$oxygen_vsb_css_files_to_load[] = $view_id;

	/* New Way */
	$shortcodes = get_post_meta( $view->ID, "ct_builder_shortcodes", true );

	echo ct_do_shortcode( $shortcodes );

	return ob_get_clean();

} );
