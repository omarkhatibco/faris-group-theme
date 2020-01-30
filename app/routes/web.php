<?php
/**
 * Web Routes.
 *
 * @link https://docs.wpemerge.com/#/framework/routing/methods
 *
 * @package WPEmergeTheme
 */

use WPEmerge\Facades\Route;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Using our ExampleController to handle the homepage, for example.
// phpcs:ignore
// Route::get()->url( '/' )->handle( 'ExampleController@home' );
Route::get()->url( '/test' )->handle( 'TestController@index' );
Route::url( '/wp-json/' )->group( function () {
		// Group routes go here, for example:
		// Route::url( '/auth/' )->group( function () {

		// 	Route::post()->url( 'login' )->handle( 'AuthController@login' );
		// 	Route::post()->url( 'register' )->handle( 'AuthController@register');
		// 	Route::post()->url( 'activate' )->handle( 'AuthController@activate');

		// 	Route::get()->url( 'currentuser' )->handle( 'AuthController@getCurrentUser' );
		// 	Route::post()->url( 'currentuser' )->handle( 'AuthController@updateCurrentUser' );

		// });

		Route::get()->url( '/gallery/{postId}' )->handle( 'GalleryController@index' );

} );


// If we do not want to hardcode a url, we can use one of the available route conditions instead.
// phpcs:ignore
// Route::get()->where( 'post_id', get_option( 'page_on_front' ) )->handle( 'ExampleController@home' );

/**
 * Pass all front-end requests through WPEmerge.
 * WARNING: Do not add routes after this - they will be ignored.
 *
 * @link https://docs.wpemerge.com/#/framework/routing/methods?id=handling-all-requests
 */
Route::all();
