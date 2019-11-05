<?php
/**
 * Load helpers.
 *
 * @package WPEmergeTheme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Load base helpers.
 */
require_once APP_APP_HELPERS_DIR . 'admin.php';
require_once APP_APP_HELPERS_DIR . 'content.php';
require_once APP_APP_HELPERS_DIR . 'carbon-fields.php';

/**
 * Require custom helper files here.
 */

// phpcs:disable
/**
 * Annoyed that you have to constantly add helper file require statements? Uncomment the bellow snippet!
 *
 * Automatically require all helper files in the app/helpers directory (non-recursive).
 */
/*
$helpers = glob( APP_APP_HELPERS_DIR . '*.php' );
foreach ( $helpers as $helper ) {
	if ( ! is_file( $helper ) ) {
		continue;
	}

	require_once $helper;
}
*/
// phpcs:enable

