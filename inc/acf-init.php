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
	$paths[] = get_theme_file_path( '/inc/acf-setup' );
	return $paths;
}
add_filter( 'acf/settings/save_json', 'fictional_university_acf_json_point' );
add_filter( 'acf/settings/load_json', 'fictional_university_acf_json_point' );

/**
 * Optional: Automatically import field groups on theme activation
 * Uncomment if you want to auto-import on activation
 */
// function fictional_university_import_acf_fields() {
//     if ( class_exists( 'ACF' ) ) {
//         $dir = get_theme_file_path( '/inc/acf-setup' );
//         if ( is_dir( $dir ) ) {
//             foreach ( glob( $dir . '/*.json' ) as $filename ) {
//                 acf_import_field_group( json_decode( file_get_contents( $filename ), true ) );
//             }
//         }
//     }
// }
// add_action( 'after_switch_theme', 'fictional_university_import_acf_fields' );