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

// register_taxonomy(
// 	'locations',
// 	array( 'property' ),
// 	array(
// 		'labels'            => array(
// 			'name'              => __( 'Locations', 'fgw' ),
// 			'singular_name'     => __( 'Location', 'fgw' ),
// 			'search_items'      => __( 'Search Location', 'fgw' ),
// 			'all_items'         => __( 'All Locations', 'fgw' ),
// 			'parent_item'       => __( 'Parent Location', 'fgw' ),
// 			'parent_item_colon' => __( 'Parent Location:', 'fgw' ),
// 			'view_item'         => __( 'View Location', 'fgw' ),
// 			'edit_item'         => __( 'Edit Location', 'fgw' ),
// 			'update_item'       => __( 'Update Location', 'fgw' ),
// 			'add_new_item'      => __( 'Add Location', 'fgw' ),
// 			'new_item_name'     => __( 'New Location Name', 'fgw' ),
// 			'menu_name'         => __( 'Locations', 'fgw' ),
// 		),
// 		'hierarchical' 				=> true,
// 		'show_ui' 						=> true,
// 		'show_in_menu' 				=> true,
// 		'show_in_nav_menus' 	=> false,
// 		'show_admin_column' 	=> true,
// 		'show_in_rest' 				=> true,
// 		'show_tagcloud' 			=> false,
// 		'query_var' 					=> true,
// 		'rewrite'           => array( 'slug' => 'locations' ),
// 	)
// );


// phpcs:enable
