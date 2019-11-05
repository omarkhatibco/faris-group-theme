<?php
/**
 * Content helpers.
 *
 * @package WPEmergeTheme
 */



/**
 * Filter excerpt length.
 *
 * @link https://developer.wordpress.org/reference/hooks/excerpt_length/
 * @return integer
 */
function app_filter_excerpt_length() {
	return 55;
}

/**
 * Fix upload_dir urls having incorrect url schema.
 *
 * The wp_upload_dir() function urls' schema depends on the site_url option which
 * can cause issues when HTTPS is forced using a plugin, for example.
 *
 * @link https://core.trac.wordpress.org/ticket/25449
 * @param  array $upload_dir Array containing the current upload directory’s path and url.
 * @return array Filtered array.
 */
function app_filter_fix_upload_dir_url_schema( $upload_dir ) {
	if ( is_ssl() ) {
		$upload_dir['url']     = set_url_scheme( $upload_dir['url'], 'https' );
		$upload_dir['baseurl'] = set_url_scheme( $upload_dir['baseurl'], 'https' );
	} else {
		$upload_dir['url']     = set_url_scheme( $upload_dir['url'], 'http' );
		$upload_dir['baseurl'] = set_url_scheme( $upload_dir['baseurl'], 'http' );
	}

	return $upload_dir;
}
