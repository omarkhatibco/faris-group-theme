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


Container::make( 'post_meta', __( 'Property Data') )
	->where( 'post_type', '=', 'property' )
	->add_tab( __( 'Global Informations ' ), array(

			Field::make( 'text', 'property_hash_id', __( 'ID') )
			->set_attribute( 'readOnly', '' )
			->set_attribute( 'placeholder', 'it will be showed after you save' )
			->set_visible_in_rest_api(true),

			Field::make( 'checkbox', 'is_installment_available', __( 'Is Installment Available ?' ) )
			->set_visible_in_rest_api(true),

			Field::make( 'text', 'installment_info', __( 'Installment Info') )
			->set_visible_in_rest_api(true),
			
			Field::make( 'text', 'building_date', __( 'Building Date' ) )
			->set_attribute( 'type', 'number' )
			->set_attribute( 'min', '1500' )
			->set_attribute( 'max', '2050' )
			->set_visible_in_rest_api(true),

			Field::make( 'text', 'delivery_date', __( 'Delivery Date' ) )
			->set_attribute( 'type', 'number' )
			->set_attribute( 'min', '1500' )
			->set_attribute( 'max', '2050' )
			->set_visible_in_rest_api(true),

			Field::make( 'text', 'lot_size', __( 'Lot Size' ) )
			->set_attribute( 'type', 'number' )
			->set_attribute( 'min', '0' )
			->set_visible_in_rest_api(true),

			Field::make( 'text', 'appartment_count', __( 'Appartment Count' ) )
			->set_attribute( 'type', 'number' )
			->set_attribute( 'min', '0' )
			->set_visible_in_rest_api(true),

			Field::make( 'checkbox', 'is_project_ready', __( 'Is Project Ready ?' ) )
			->set_visible_in_rest_api(true),

			Field::make( 'checkbox', 'is_help_in_citizenship', __( 'Is Help In Citizenship ?' ) )
			->set_visible_in_rest_api(true),

			Field::make( 'checkbox', 'is_featured', __( 'Show this in Slider ?' ) )
			->set_visible_in_rest_api(true),

	))
	->add_tab( __( 'Appartment Informations ' ), array(
		Field::make('complex', 'appartments', __('Appartment Informations '))
				->set_collapsed(true)
				->add_fields(array(
					Field::make( 'checkbox', 'is_duplex', __( 'Duplex ?' ) ),
					Field::make( 'checkbox', 'is_villa', __( 'Villa ?' ) ),
					Field::make( 'checkbox', 'is_penthouse', __( 'Penthouse ?' ) ),
					Field::make( 'text', 'rooms_count', __( 'Rooms Count' ) )
					->set_attribute( 'type', 'number' )
					->set_attribute( 'min', '0' )
					->set_attribute( 'step', '0.5' ),

					Field::make( 'text', 'salons_count', __( 'Salons Count' ) )
					->set_attribute( 'type', 'number' )
					->set_attribute( 'min', '0' ),

					Field::make( 'text', 'baths_count', __( 'Baths Count' ) )
					->set_attribute( 'type', 'number' )
					->set_attribute( 'min', '0' ),

					Field::make( 'text', 'min_size', __( 'Minimum Size' ) )
					->set_attribute( 'type', 'number' )
					->set_attribute( 'min', '0' ),

					Field::make( 'text', 'price', __( 'Minimum Price' ) )
					->set_attribute( 'type', 'number' )
					->set_attribute( 'min', '0' ),

					// Field::make( 'text', 'note', __( 'Note') ),
					// Field::make( 'text', 'note_en', __( 'Note EN') ),
					// Field::make( 'text', 'note_tr', __( 'Note TR') ),

					Field::make( 'image', 'image', __( 'Image' ))->set_value_type( 'url' )


				))
				->set_header_template('<%- rooms_count %>+<%- salons_count %> - <%- min_size %>㎡   - price: <%- price %>₺')
				->set_visible_in_rest_api(true),


	))
	->add_tab( __( 'Distances' ), array(
		Field::make('complex', 'distances', __('Distances'))
				->set_collapsed(true)
				->add_fields(array(
					Field::make( 'select', 'type', __( 'Type') )
					->set_options([
							'highway' => 'Highway',
							'airport' => 'Airport',
							'supermaket' => 'Supermarket',
							'hospital' => 'Hospital',
							'park' => 'Park',
							'bank' => 'Bank',
							'railwayStation' => 'Railway Station',
							'university' => 'University',
							'busStation' => 'Bus Station',
							'shoppingMall' => 'Shopping Mall',
					]),
					Field::make( 'text', 'title', __( 'Title') ),
					Field::make( 'text', 'value_number', __( 'Value') )
					->set_attribute( 'type', 'number' )
					->set_attribute( 'min', '0' ),
					Field::make( 'select', 'value_type', __( 'Value Type') )
					->set_options([
							'hour' => 'Hour',
							'minute' => 'Minute',
							'kilometer' => 'Kilometer',
							'meter' => 'Meter',
					]),

					// Field::make( 'text', 'title_en', __( 'Title EN') ),
					// Field::make( 'text', 'title_tr', __( 'Title TR') ),
				))
				->set_header_template('Feature: <%- title %>')
				->set_visible_in_rest_api(true),
    
	))
	->add_tab( __( 'Galleries & Attachments' ), array(
		Field::make( 'media_gallery', 'media_gallery', __( 'Media Gallery' ) )
		->set_type( array('image') )
		->set_duplicates_allowed(false)
		->set_visible_in_rest_api(true),

		Field::make( 'media_gallery', 'attachments', __( 'Attachments' ) )
		->set_type( array('doc','pdf') )
		->set_duplicates_allowed(false)
		->set_visible_in_rest_api(true),


		Field::make( 'oembed', 'oembed', __( 'Video' ) )
		->set_visible_in_rest_api(true),
    
  ))
	->add_tab( __( 'Location' ), array(
    	Field::make( 'map', 'map' )
			->set_position( 41.015137, 28.979530, 10 )
			->set_visible_in_rest_api(true),
  ))
	->add_tab( __( 'Internal Notes' ), array(
		Field::make( 'textarea', 'notes', __( 'Notes') ),
  ));

// phpcs:enable
