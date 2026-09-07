<?php
/**
 * ACF Field Group Initialization for Fictional University Theme
 * Automatically registers ACF field groups from JSON files
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

/**
 * Register ACF field groups from JSON files
 */
function fictional_university_acf_json_point( $paths ) {
	// Add custom folder to ACF JSON paths
	$paths[] = get_theme_file_path( '/inc/acf-setup-free' );
	return $paths;
}
add_filter( 'acf/settings/save_json', 'fictional_university_acf_json_point' );
add_filter( 'acf/settings/load_json', 'fictional_university_acf_json_point' );
