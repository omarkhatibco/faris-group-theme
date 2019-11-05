<div>omar</div>
<?php
/**
 * App Layout: layouts/app.php
 *
 * The main template file.
 *
 * This is the template that is used for displaying:
 * - posts
 * - single posts
 * - archive pages
 * - search results pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WPEmergeTheme
 */

// Theme::partial( 'loop' );
if ( is_singular() ) {
    header(
        sprintf(
            'Location: /wp-json/wp/v2/%s/%s',
            get_post_type_object( get_post_type() )->rest_base,
            get_post()->ID
        )
    );
} else {
    header( 'Location: /wp-json/' );
}