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
	'property_locations',
	[ 'property' ],
	[
		'labels'            => [
			'name'              => __( 'Locations' ),
			'singular_name'     => __( 'Location' ),
			'search_items'      => __( 'Search Locations' ),
			'all_items'         => __( 'All Locations' ),
			'parent_item'       => __( 'Parent Location' ),
			'parent_item_colon' => __( 'Parent Location:' ),
			'view_item'         => __( 'View Location' ),
			'edit_item'         => __( 'Edit Location' ),
			'update_item'       => __( 'Update Location' ),
			'add_new_item'      => __( 'Add New Location' ),
			'new_item_name'     => __( 'New Location Name' ),
			'menu_name'         => __( 'Locations' ),
			'not_found'					=> __('No Locations found.'),
		],
		'hierarchical'      => true,
		'show_ui'           => true,
		'show_admin_column' => true,
		'show_in_nav_menus' => false,
		'query_var'         => true,
		'show_in_rest' 			=> true,
		'rewrite'           => false,
	]
);


register_taxonomy(
	'property_types',
	[ 'property' ],
	[
		'labels'            => [
			'name'              => __( 'Types' ),
			'singular_name'     => __( 'Type' ),
			'search_items'      => __( 'Search Types' ),
			'all_items'         => __( 'All Types' ),
			'parent_item'       => __( 'Parent Type' ),
			'parent_item_colon' => __( 'Parent Type:' ),
			'view_item'         => __( 'View Type' ),
			'edit_item'         => __( 'Edit Type' ),
			'update_item'       => __( 'Update Type' ),
			'add_new_item'      => __( 'Add New Type' ),
			'new_item_name'     => __( 'New Type Name' ),
			'menu_name'         => __( 'Types' ),
			'not_found'					=> __('No Types found.'),
		],
		'hierarchical'      => true,
		'show_ui'           => true,
		'show_admin_column' => true,
		'show_in_nav_menus' => false,
		'query_var'         => true,
		'show_in_rest' 			=> true,
		'rewrite'           => false,
	]
);

register_taxonomy(
	'property_statuses',
	[ 'property' ],
	[
		'labels'            => [
			'name'              => __( 'Statuses' ),
			'singular_name'     => __( 'Status' ),
			'search_items'      => __( 'Search Statuses' ),
			'all_items'         => __( 'All Statuses' ),
			'parent_item'       => __( 'Parent Status' ),
			'parent_item_colon' => __( 'Parent Status:' ),
			'view_item'         => __( 'View Status' ),
			'edit_item'         => __( 'Edit Status' ),
			'update_item'       => __( 'Update Status' ),
			'add_new_item'      => __( 'Add New Status' ),
			'new_item_name'     => __( 'New Status Name' ),
			'menu_name'         => __( 'Statuses' ),
			'not_found'					=> __('No Statuses found.'),
		],
		'hierarchical'      => true,
		'show_ui'           => true,
		'show_admin_column' => true,
		'show_in_nav_menus' => false,
		'query_var'         => true,
		'show_in_rest' 			=> true,
		'rewrite'           => false,
	]
);

register_taxonomy(
	'property_features',
	[ 'property' ],
	[
		'labels'            => [
			'name'              => __( 'Features' ),
			'singular_name'     => __( 'Feature' ),
			'search_items'      => __( 'Search Features' ),
			'all_items'         => __( 'All Features' ),
			'parent_item'       => __( 'Parent Feature' ),
			'parent_item_colon' => __( 'Parent Feature:' ),
			'view_item'         => __( 'View Feature' ),
			'edit_item'         => __( 'Edit Feature' ),
			'update_item'       => __( 'Update Feature' ),
			'add_new_item'      => __( 'Add New Feature' ),
			'new_item_name'     => __( 'New Feature Name' ),
			'menu_name'         => __( 'Features' ),
			'not_found'					=> __('No Features found.'),
		],
		'hierarchical'      => true,
		'show_ui'           => true,
		'show_admin_column' => false,
		'show_in_nav_menus' => false,
		'query_var'         => true,
		'show_in_rest' 			=> true,
		'rewrite'           => false,
	]
);

// phpcs:enable
