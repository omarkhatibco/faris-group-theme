<?php
/**
 * Declare all your actions and filters here.
 *
 * @package WPEmergeTheme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * ------------------------------------------------------------------------
 * WordPress
 * ------------------------------------------------------------------------
 */

add_filter( 'upload_dir', 'app_filter_fix_upload_dir_url_schema' );

/**
 * Content
 */
add_filter( 'excerpt_length', 'app_filter_excerpt_length', 999 );

// Attach all suitable hooks from `the_content` on `app_content`.
add_filter( 'app_content', 'do_shortcode', 9 );
add_filter( 'app_content', 'wptexturize', 10 );
add_filter( 'app_content', 'wpautop', 10 );
add_filter( 'app_content', 'shortcode_unautop', 10 );
add_filter( 'app_content', 'prepend_attachment', 10 );
add_filter( 'app_content', 'wp_make_content_images_responsive', 10 );
add_filter( 'app_content', 'convert_smilies', 20 );


/**
 * ------------------------------------------------------------------------
 * External Libraries and Plugins.
 * ------------------------------------------------------------------------
 */

/**
 * Carbon Fields
 */
add_action( 'after_setup_theme', 'app_bootstrap_carbon_fields', 100 );
add_action( 'carbon_fields_register_fields', 'app_bootstrap_carbon_fields_register_fields' );
add_filter( 'carbon_fields_map_field_api_key', 'app_filter_carbon_fields_google_maps_api_key' );



/**
 * ------------------------------------------------------------------------
 * Cron Job for currency converter
 * ------------------------------------------------------------------------
 */

add_action('update_currency_exchange_rate', function () {
	$apikey = carbon_get_theme_option( 'fg_openexchangerates_api_key' );
     
  $response  = wp_remote_get( 'https://openexchangerates.org/api/latest.json?app_id=' . $apikey);
  $apiData =json_decode($response['body'], true);
	if ($apiData && !isset($apiData['error'])) {
		$currency = ['eur','sar','aed','kwd','omr','qar','bhd','jod','dzd','yer','gbp','chf','chf','cad','aud','cny','rub'];

    $try = $apiData['rates']['TRY'];

    carbon_set_theme_option( 'currency_lastupdate', $apiData['timestamp'] );
    carbon_set_theme_option( 'currency_usd', 1 / $try );

    foreach ($currency as $curr) {
      carbon_set_theme_option( 'currency_' . $curr, $apiData['rates'][strtoupper($curr)]  / $try );
    }
    carbon_set_theme_option( 'currency_try', 1 );
	}
});

if (!wp_next_scheduled( 'update_currency_exchange_rate' )) {
	wp_schedule_event(time(), 'hourly', 'update_currency_exchange_rate');
}

/**
 * ------------------------------------------------------------------------
 * cache custom endpoint
 * ------------------------------------------------------------------------
 */

 function wprc_add_custom_endpoint( $allowed_endpoints ) {
    if ( ! isset( $allowed_endpoints[ 'api' ] ) || 
    ! in_array( 'gallery', $allowed_endpoints[ 'api' ] ) 
    ) {
        $allowed_endpoints[ 'api' ][] = 'gallery';
    }
    return $allowed_endpoints;
}
add_filter( 'wp_rest_cache/allowed_endpoints', 'wprc_add_custom_endpoint', 10, 1);


/**
 * ------------------------------------------------------------------------
 * Rest Options from https://www.danielauener.com/wordpress-rest-api-extensions-for-going-headless-wp/#slug
 * ------------------------------------------------------------------------
 */


add_filter('rest_property_collection_params', function ($params) {
	if (isset($params['per_page'])) {
		$params['per_page']['maximum'] = 500;
	}
	return $params;
}, 10, 1);


add_filter( 'rest_prepare_property', function( $response, $property, $request ) {
  $id = $property->ID;

  $attachmentsIds =  carbon_get_post_meta( $id, 'attachments' );
  $media_galleryIds =  carbon_get_post_meta( $id, 'media_gallery' );


  $media_gallery = array_map(function($id) {
    $img = wp_get_attachment_image_src( $id ,'full' );
    return [
      'id' => $id,
      'src' => $img[0],
      'width'=> $img[1],
      'height'=>$img[2],
      'alt' => get_post_meta( $id, '_wp_attachment_image_alt', true)
    ];
  }, $media_galleryIds);

  $attachments = array_map(function($id) {
    return [
      'id' => $id,
      'src' => wp_get_attachment_url($id),
      'title' => get_the_title( $id),
      'mime_type' => get_post_mime_type( $id)
    ];
  }, $attachmentsIds);
 
     $response->data[ 'attachments_data' ]  = $attachments;
     $response->data[ 'media_gallery_data' ]  = $media_gallery;

    return $response;
}, 10, 3 );


add_filter( 'rest_property_collection_params', function ( $query_params ) {
	$query_params['orderby']['enum'][] = 'rand';
	return $query_params;
} );



add_action( 'carbon_fields_post_meta_container_saved', function ( $post_id ) {
    if ( get_post_type( $post_id ) !== 'property' ) {
        return false;
    }
    // update Posth Id
    $getFirstChar = function ($string) {
      return $string[0];
    };
    $slug = get_post_field( 'post_name', $post_id );
    $slugStr = 'fg-' .get_the_date( 'Y', $post_id ) . '-' . $post_id . '-' . implode('',array_map($getFirstChar, explode("-", $slug)));

    carbon_set_post_meta( $post_id, 'property_hash_id', $slugStr );

    // get min max for (price - size - rooms - salon & baths ) + if has appartment with villa or duplex or penthouse for Aggregation 
    $apartments = carbon_get_post_meta( $id, 'appartments' );

    $prices = array_map(function ($obj) { return $obj['price']; }, $apartments);
		$sizes = array_map(function ($obj) {return $obj['min_size'];}, $apartments);
		$rooms = array_map(function ($obj) {return  $obj['rooms_count']. '+' . $obj['salons_count'];}, $apartments);

    $villa = array_map(function ($obj) {return $obj['is_villa'];}, $apartments);
    $duplex = array_map(function ($obj) {return $obj['is_duplex'];}, $apartments);
    $penthouse = array_map(function ($obj) {return $obj['is_penthouse'];}, $apartments);
    

    carbon_set_post_meta( $post_id, 'min_price', intval(min($prices)) );
    carbon_set_post_meta( $post_id, 'max_price', intval(max($prices)) );

    carbon_set_post_meta( $post_id, 'min_size',   intval(min($sizes)) );
    carbon_set_post_meta( $post_id, 'max_size',   intval(max($sizes)) );

    carbon_set_post_meta( $post_id, 'rooms_type',  implode(",", $rooms) );

    carbon_set_post_meta( $post_id, 'has_villa', in_array(true, $villa) ? 1 : '' );
    carbon_set_post_meta( $post_id, 'has_duplex', in_array(true, $duplex) ? 1 : '' );
    carbon_set_post_meta( $post_id, 'has_penthouse', in_array(true, $penthouse) ? 1 : '' );
  
});
