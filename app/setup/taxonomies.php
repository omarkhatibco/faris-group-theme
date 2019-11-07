<?php
/**
 * Register custom taxonomies.
 *
 * @link https://developer.wordpress.org/reference/functions/register_taxonomy/
 *
 * @hook    init
 * @package WPEmergeTheme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Custom hierarchical taxonomy (like categories).
// phpcs:disable

register_taxonomy(
	'locations',
	array( 'property' ),
	array(
		'labels'            => array(
			'name'              => __( 'Locations', 'app' ),
			'singular_name'     => __( 'Location', 'app' ),
			'search_items'      => __( 'Search Location', 'app' ),
			'all_items'         => __( 'All Locations', 'app' ),
			'parent_item'       => __( 'Parent Location', 'app' ),
			'parent_item_colon' => __( 'Parent Location:', 'app' ),
			'view_item'         => __( 'View Location', 'app' ),
			'edit_item'         => __( 'Edit Location', 'app' ),
			'update_item'       => __( 'Update Location', 'app' ),
			'add_new_item'      => __( 'Add Location', 'app' ),
			'new_item_name'     => __( 'New Location Name', 'app' ),
			'menu_name'         => __( 'Locations', 'app' ),
		),
		'hierarchical' 				=> true,
		'show_ui' 						=> true,
		'show_in_menu' 				=> true,
		'show_in_nav_menus' 	=> false,
		'show_admin_column' 	=> true,
		'show_in_rest' 				=> true,
		'show_tagcloud' 			=> false,
		'query_var' 					=> true,
		'rewrite'           => array( 'slug' => 'locations' ),
	)
);

// phpcs:enable
