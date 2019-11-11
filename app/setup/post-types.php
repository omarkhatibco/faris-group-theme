<?php
/**
 * Register post types.
 *
 * @link https://developer.wordpress.org/reference/functions/register_post_type/
 *
 * @hook    init
 * @package WPEmergeTheme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function post_type_filter($use_block_editor, $post_type)
{
	if ($post_type === 'property') {
		return false;
	}

	return $use_block_editor;
}
add_filter('use_block_editor_for_post_type', 'post_type_filter', 10, 2);

// phpcs:disable

register_post_type( 'property', array(
	'labels' => array(
		'name'               => __( 'Properties', 'fgw' ),
		'singular_name'      => __( 'Property', 'fgw' ),
		'add_new'            => __( 'Add New', 'fgw' ),
		'add_new_item'       => __( 'Add new Property', 'fgw' ),
		'view_item'          => __( 'View Property', 'fgw' ),
		'edit_item'          => __( 'Edit Property', 'fgw' ),
		'new_item'           => __( 'New Property', 'fgw' ),
		'view_item'          => __( 'View Property', 'fgw' ),
		'search_items'       => __( 'Search Properties', 'fgw' ),
		'not_found'          => __( 'No Properties found', 'fgw' ),
		'not_found_in_trash' => __( 'No Properties found in trash', 'fgw' ),
	),
	'public'              => true,
	'exclude_from_search' => true,
	'show_ui'             => true,
	'capability_type'     => 'post',
	'hierarchical'        => true,
	'show_in_admin_bar' 	=> true,
	'show_in_rest' 				=> true,
	'_edit_link'          => 'post.php?post=%d',
	'query_var'           => true,
	'taxonomies'  				=> array( 'types' ,'locations'),
	'menu_icon'           => 'dashicons-admin-post',
	'supports' 						=> array('title', 'thumbnail', 'excerpt', 'editor'),
	'rewrite'             => array(
		'slug'       => 'property',
		'with_front' => false,
	),
));

// phpcs:enable
