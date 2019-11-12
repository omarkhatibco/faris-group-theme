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
		'name'               => __( 'Properties'),
		'singular_name'      => __( 'Property'),
		'add_new'            => __( 'Add New'),
		'add_new_item'       => __( 'Add new Property'),
		'view_item'          => __( 'View Property'),
		'edit_item'          => __( 'Edit Property'),
		'new_item'           => __( 'New Property'),
		'view_item'          => __( 'View Property'),
		'search_items'       => __( 'Search Properties'),
		'not_found'          => __( 'No Properties found'),
		'not_found_in_trash' => __( 'No Properties found in trash'),
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
	'menu_icon'           => 'dashicons-admin-post',
	'supports' 						=> array('title', 'thumbnail', 'excerpt', 'editor'),
	'rewrite'             => array(
		'slug'       => 'property',
		'with_front' => false,
	),
));

// phpcs:enable
