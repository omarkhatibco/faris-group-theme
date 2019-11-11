<?php
/**
 * Declare theme functionality support.
 *
 * @link https://developer.wordpress.org/reference/functions/add_theme_support/
 *
 * @hook    after_setup_theme
 * @package WPEmergeTheme
 */

use WPEmergeTheme\Facades\Config;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Support automatic feed links.
 *
 * @link https://codex.wordpress.org/Automatic_Feed_Links
 */
// add_theme_support( 'automatic-feed-links' );

/**
 * Support post thumbnails.
 *
 * @link https://codex.wordpress.org/Post_Thumbnails
 */
add_theme_support( 'post-thumbnails' );

/**
 * Support document title tag.
 *
 * @link https://codex.wordpress.org/Title_Tag
 */
add_theme_support( 'title-tag' );

/**
 * Support menus.
 *
 * @link https://developer.wordpress.org/reference/functions/add_theme_support/
 */
// add_theme_support( 'menus' );

/**
 * Support HTML5 markup.
 *
 * @link https://codex.wordpress.org/Theme_Markup
 */
add_theme_support( 'html5', [ 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ] );

/**
 * Manually select Post Formats to be supported.
 *
 * @link http://codex.wordpress.org/Post_Formats
 */
// phpcs:ignore
// add_theme_support( 'post-formats', [ 'aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat' ] );

/**
 * Support default editor block styles.
 *
 * @link https://wordpress.org/gutenberg/handbook/extensibility/theme-support/
 */
add_theme_support( 'wp-block-styles' );

/**
 * Support wide alignment for editor blocks.
 *
 * @link https://wordpress.org/gutenberg/handbook/extensibility/theme-support/
 */
add_theme_support( 'align-wide' );

/**
 * Support custom editor block color palette.
 * Don't forget to edit resources/styles/shared/variables.scss when you update these.
 * Uses Material Design colors.
 *
 * @link https://wordpress.org/gutenberg/handbook/extensibility/theme-support/
 */
add_theme_support(
	'editor-color-palette',
	[
		[
			'name'  => __( 'Red', 'fgw' ),
			'slug'  => 'material-red',
			'color' => Config::get( 'variables.color.material-red', '#000000' ),
		],
		[
			'name'  => __( 'Pink', 'fgw' ),
			'slug'  => 'material-pink',
			'color' => Config::get( 'variables.color.material-pink', '#000000' ),
		],
		[
			'name'  => __( 'Purple', 'fgw' ),
			'slug'  => 'material-purple',
			'color' => Config::get( 'variables.color.material-purple', '#000000' ),
		],
		[
			'name'  => __( 'Deep Purple', 'fgw' ),
			'slug'  => 'material-deep-purple',
			'color' => Config::get( 'variables.color.material-deep-purple', '#000000' ),
		],
		[
			'name'  => __( 'Indigo', 'fgw' ),
			'slug'  => 'material-indigo',
			'color' => Config::get( 'variables.color.material-indigo', '#000000' ),
		],
		[
			'name'  => __( 'Blue', 'fgw' ),
			'slug'  => 'material-blue',
			'color' => Config::get( 'variables.color.material-blue', '#000000' ),
		],
		[
			'name'  => __( 'Light Blue', 'fgw' ),
			'slug'  => 'material-light-blue',
			'color' => Config::get( 'variables.color.material-light-blue', '#000000' ),
		],
		[
			'name'  => __( 'Cyan', 'fgw' ),
			'slug'  => 'material-cyan	',
			'color' => Config::get( 'variables.color.material-cyan	', '#000000' ),
		],
		[
			'name'  => __( 'Teal', 'fgw' ),
			'slug'  => 'material-teal',
			'color' => Config::get( 'variables.color.material-teal', '#000000' ),
		],
		[
			'name'  => __( 'Green', 'fgw' ),
			'slug'  => 'material-green',
			'color' => Config::get( 'variables.color.material-green', '#000000' ),
		],
		[
			'name'  => __( 'Light Green', 'fgw' ),
			'slug'  => 'material-light-green',
			'color' => Config::get( 'variables.color.material-light-green', '#000000' ),
		],
		[
			'name'  => __( 'Lime', 'fgw' ),
			'slug'  => 'material-lime',
			'color' => Config::get( 'variables.color.material-lime', '#000000' ),
		],
		[
			'name'  => __( 'Yellow', 'fgw' ),
			'slug'  => 'material-yellow',
			'color' => Config::get( 'variables.color.material-yellow', '#000000' ),
		],
		[
			'name'  => __( 'Amber', 'fgw' ),
			'slug'  => 'material-amber',
			'color' => Config::get( 'variables.color.material-amber', '#000000' ),
		],
		[
			'name'  => __( 'Orange', 'fgw' ),
			'slug'  => 'material-orange',
			'color' => Config::get( 'variables.color.material-orange', '#000000' ),
		],
		[
			'name'  => __( 'Deep Orange', 'fgw' ),
			'slug'  => 'material-deep-orange',
			'color' => Config::get( 'variables.color.material-deep-orange', '#000000' ),
		],
		[
			'name'  => __( 'Brown', 'fgw' ),
			'slug'  => 'material-brown',
			'color' => Config::get( 'variables.color.material-brown', '#000000' ),
		],
		[
			'name'  => __( 'Grey', 'fgw' ),
			'slug'  => 'material-grey',
			'color' => Config::get( 'variables.color.material-grey', '#000000' ),
		],
		[
			'name'  => __( 'Blue Grey', 'fgw' ),
			'slug'  => 'material-blue-grey',
			'color' => Config::get( 'variables.color.material-blue-grey', '#000000' ),
		],
	]
);

/**
 * Support color palette enforcement.
 *
 * @link https://wordpress.org/gutenberg/handbook/extensibility/theme-support/
 */
// phpcs:ignore
// add_theme_support( 'disable-custom-colors' );

/**
 * Support custom editor block font sizes.
 * Don't forget to edit resources/styles/shared/variables.scss when you update these.
 *
 * @link https://wordpress.org/gutenberg/handbook/extensibility/theme-support/
 */
add_theme_support(
	'editor-font-sizes',
	[
		[
			'name'      => __( 'extra small', 'fgw' ),
			'shortName' => __( 'XS', 'fgw' ),
			'size'      => (int) Config::get( 'variables.font-size.xs', 12 ),
			'slug'      => 'xs',
		],
		[
			'name'      => __( 'small', 'fgw' ),
			'shortName' => __( 'S', 'fgw' ),
			'size'      => (int) Config::get( 'variables.font-size.s', 16 ),
			'slug'      => 's',
		],
		[
			'name'      => __( 'regular', 'fgw' ),
			'shortName' => __( 'M', 'fgw' ),
			'size'      => (int) Config::get( 'variables.font-size.m', 20 ),
			'slug'      => 'm',
		],
		[
			'name'      => __( 'large', 'fgw' ),
			'shortName' => __( 'L', 'fgw' ),
			'size'      => (int) Config::get( 'variables.font-size.l', 28 ),
			'slug'      => 'l',
		],
		[
			'name'      => __( 'extra large', 'fgw' ),
			'shortName' => __( 'XL', 'fgw' ),
			'size'      => (int) Config::get( 'variables.font-size.xl', 36 ),
			'slug'      => 'xl',
		],
	]
);

/**
 * Support WooCommerce.
 */
// add_theme_support( 'woocommerce' );
