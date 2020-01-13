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

	
Container::make( 'post_meta', __( 'Translation') )
	->where( 'post_type', '=', 'property' )
	->add_tab( __( 'English Translation' ), array(

			Field::make( 'checkbox', 'active_en', __( 'Show project in this Language' ) )
			->set_visible_in_rest_api(true),

			Field::make( 'text', 'title_en', __( 'Title') )
			->set_visible_in_rest_api(true),

			Field::make( 'rich_text', 'content_en', __( 'Description') )
			->set_visible_in_rest_api(true),
	))
	->add_tab( __( 'Turkish Translation' ), array(

			Field::make( 'checkbox', 'active_tr', __( 'Show project in this Language' ) )
			->set_visible_in_rest_api(true),

			Field::make( 'text', 'title_tr', __( 'Title') )
			->set_visible_in_rest_api(true),
			Field::make( 'rich_text', 'content_tr', __( 'Description') )
			->set_visible_in_rest_api(true),
	));

Container::make( 'post_meta', __( 'Property Data') )
	->where( 'post_type', '=', 'property' )
	->add_tab( __( 'Global Informations ' ), array(
		Field::make( 'select', 'type', __( 'Type' ) )
			->set_options(function () {
				$options = [];
				$themeOptionsTypes = carbon_get_theme_option( 'fgw_types' );
				foreach($themeOptionsTypes as $item) {
						$options[$item['slug']] = $item[function_exists('wpm_get_language') && wpm_get_language() !== 'en' ?  'title_' . wpm_get_language() : 'title'];
				}
				return $options;
			})
			->set_visible_in_rest_api(true),

		Field::make( 'select', 'contract_type', __( 'Contract Type' ) )
			->set_options(function () {
				$options = [];
				$themeOptionsTypes = carbon_get_theme_option( 'fgw_contract_types' );
				foreach($themeOptionsTypes as $item) {
						$options[$item['slug']] = $item[function_exists('wpm_get_language') && wpm_get_language() !== 'en' ?  'title_' . wpm_get_language() : 'title'];
				}
				return $options;
			})
			->set_visible_in_rest_api(true),

			Field::make( 'set', 'payment_methods', __( 'Payment Methods' ) )
    	->set_options( array(
        'cash' => __( 'Cash' ),
        'installment' => __( 'Installment' ),
			) )
			->set_visible_in_rest_api(true),

			Field::make( 'text', 'installment_info', __( 'Installment Info') )
			->set_visible_in_rest_api(true),
			Field::make( 'text', 'installment_info_en', __( 'Installment Info EN') )
			->set_visible_in_rest_api(true),
			Field::make( 'text', 'installment_info_tr', __( 'Installment Info TR') )
			->set_visible_in_rest_api(true),
			
			Field::make( 'date', 'building_date', __( 'Building Date' ) )
			->set_visible_in_rest_api(true),

			Field::make( 'date', 'delivery_date', __( 'Delivery Date' ) )
			->set_visible_in_rest_api(true),

			Field::make( 'checkbox', 'is_project_ready', __( 'Is Project Ready ?' ) )
			->set_visible_in_rest_api(true),

			Field::make( 'checkbox', 'is_help_in_citizenship', __( 'Is Help In Citizenship ?' ) )
			->set_visible_in_rest_api(true),

	))
	->add_tab( __( 'Appartment Informations ' ), array(
		Field::make('complex', 'appartments', __('Appartment Informations '))
				->set_collapsed(true)
				->add_fields(array(
					Field::make( 'text', 'rooms_count', __( 'Rooms Count' ) )
					->set_attribute( 'type', 'number' )
					->set_attribute( 'min', '0' ),

					Field::make( 'text', 'salons_count', __( 'Salons Count' ) )
					->set_attribute( 'type', 'number' )
					->set_attribute( 'min', '0' ),

					Field::make( 'text', 'baths_count', __( 'Baths Count' ) )
					->set_attribute( 'type', 'number' )
					->set_attribute( 'min', '0' ),

					Field::make( 'text', 'min_size', __( 'Minimum Size' ) )
					->set_attribute( 'type', 'number' )
					->set_attribute( 'min', '0' ),

					Field::make( 'text', 'max_size', __( 'Maximum Size' ) )
					->set_attribute( 'type', 'number' )
					->set_attribute( 'min', '0' ),

					Field::make( 'text', 'price', __( 'Price' ) )
					->set_attribute( 'type', 'number' )
					->set_attribute( 'min', '0' ),

					Field::make( 'text', 'note', __( 'Note') ),
					Field::make( 'text', 'note_en', __( 'Note EN') ),
					Field::make( 'text', 'note_tr', __( 'Note TR') )
				))
				->set_header_template('<%- rooms_count %>+<%- salons_count %> - <%- min_size %>㎡   - price: <%- price %>$')
				->set_visible_in_rest_api(true),


	))
	->add_tab( __( 'Features' ), array(
		Field::make('complex', 'features', __('Features '))
				->set_collapsed(true)
				->add_fields(array(
					Field::make( 'text', 'title', __( 'Title') ),
					Field::make( 'text', 'title_en', __( 'Title EN') ),
					Field::make( 'text', 'title_tr', __( 'Title TR') ),
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
						$options[$item['slug']] = $item[function_exists('wpm_get_language') && wpm_get_language() !== 'en' ?  'title_' . wpm_get_language() : 'title'];
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
						$options[$item['slug']] = $item[function_exists('wpm_get_language') && wpm_get_language() !== 'en' ?  'title_' . wpm_get_language() : 'title'];
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
				if ($selectedLocationIndex !== false) {
					$selectedLocationSublocations = $themeOptionsLocations[$selectedLocationIndex]['fgw_sublocations'];
					if (is_array($selectedLocationSublocations)) {
						foreach($selectedLocationSublocations as $item) {
							$options[$item['slug']] = $item[function_exists('wpm_get_language') && wpm_get_language() !== 'en' ?  'title_' . wpm_get_language() : 'title'];
						}
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
