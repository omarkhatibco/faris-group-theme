<?php
/**
 * Post Meta.
 *
 * Here, you can register custom post meta fields using the Carbon Fields library.
 *
 * @link https://carbonfields.net/docs/containers-post-meta/
 *
 * @package WPEmergeCli
 */

use Carbon_Fields\Container\Container;
use Carbon_Fields\Field\Field;

// phpcs:disable

Container::make( 'post_meta', __( 'Property Data', 'fgw' ) )
	->where( 'post_type', '=', 'property' )
	->add_tab( __( 'Global Informations ' ), array(
		Field::make( 'select', 'type', __( 'Type' ) )
			->set_options(function () {
				$options = [];
				$themeOptionsTypes = carbon_get_theme_option( 'fgw_types' );
				foreach($themeOptionsTypes as $item) {
						$options[$item['slug']] = $item['title'];
				}
				return $options;
			})
			->set_visible_in_rest_api(true),

		Field::make( 'select', 'contract_type', __( 'Contract Type' ) )
			->set_options(function () {
				$options = [];
				$themeOptionsTypes = carbon_get_theme_option( 'fgw_contract_types' );
				foreach($themeOptionsTypes as $item) {
						$options[$item['slug']] = $item['title'];
				}
				return $options;
			})
			->set_visible_in_rest_api(true),
			

	))
	->add_tab( __( 'Features' ), array(
		Field::make('complex', 'features', __('Features '))
				->set_collapsed(true)
				->add_fields(array(
					Field::make( 'text', 'title', __( 'Title', 'fgw' ) ),
				))
				->set_header_template('Feature: <%- title %>')
				->set_visible_in_rest_api(true),
    
	))
	->add_tab( __( 'Amunities' ), array(
		Field::make( 'set', 'amenities', __( 'Amunities' ) )
			->set_options(function () {
				$options = [];
				$themeOptionsTypes = carbon_get_theme_option( 'fgw_amenities' );
				foreach($themeOptionsTypes as $item) {
						$options[$item['slug']] = $item['title'];
				}
				return $options;
			})
			->set_visible_in_rest_api(true),

    
	))

	->add_tab( __( 'Galleries & Attachments' ), array(
		Field::make( 'media_gallery', 'media_gallery', __( 'Media Gallery' ) )
		->set_type( array('image') )
		->set_duplicates_allowed(false)
		->set_visible_in_rest_api(true),

		Field::make( 'media_gallery', 'attachments', __( 'Attachment' ) )
		->set_type( array('doc','pdf') )
		->set_duplicates_allowed(false)
		->set_visible_in_rest_api(true),

		Field::make( 'oembed', 'oembed', __( 'Video' ) )
		->set_visible_in_rest_api(true),
    
  ))
	->add_tab( __( 'Location' ), array(
		Field::make( 'select', 'location', __( 'Location' ) )
			->set_options(function () {
				$options = [];
				$themeOptionsLocations = carbon_get_theme_option( 'fgw_locations' );
				foreach($themeOptionsLocations as $item) {
						$options[$item['slug']] = $item['title'];
				}
				return $options;
			})
			->set_visible_in_rest_api(true),
		Field::make( 'select', 'sublocation', __( 'Sublocation' ) )
			->set_options(function () {
				$options = [];
				$themeOptionsLocations = carbon_get_theme_option( 'fgw_locations' );
				$selectedLocationSlug= carbon_get_the_post_meta( 'location' );
				$selectedLocationIndex = array_search($selectedLocationSlug, array_column($themeOptionsLocations, 'slug'));
				$selectedLocationSublocations = $themeOptionsLocations[$selectedLocationIndex]['fgw_sublocations'];
				if (is_array($selectedLocationSublocations)) {
					foreach($selectedLocationSublocations as $item) {
						$options[$item['slug']] = $item['title'];
					}
				}
				
				return $options;
			})
			->set_visible_in_rest_api(true),
    	Field::make( 'map', 'map' )
			->set_position( 41.015137, 28.979530, 10 )
			->set_visible_in_rest_api(true),
  ));

// phpcs:enable
