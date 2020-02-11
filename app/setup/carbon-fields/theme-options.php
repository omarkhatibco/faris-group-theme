<?php
/**
 * Theme Options.
 *
 * Here, you can register Theme Options using the Carbon Fields library.
 *
 * @link https://carbonfields.net/docs/containers-theme-options/
 *
 * @package WPEmergeCli
 */

use Carbon_Fields\Container\Container;
use Carbon_Fields\Field\Field;

Container::make( 'theme_options', __( 'Theme Options') )
	->set_page_parent('options-general.php')
	->add_fields( array(
		Field::make( 'text', 'crb_google_maps_api_key', __( 'Google Maps API Key') ),
		Field::make( 'text', 'fg_openexchangerates_api_key', __( 'Open Exchange Rates.org API Key') ),
		Field::make('complex', 'fgw_socials', __('Social Media'))
			->set_collapsed(true)
			->add_fields(array(
				Field::make('select', 'type', __('Social Media Type', 'mtw'))
					->set_options(array(
						'facebook' => 'Facebook',
						'instagram' => 'Instagram',
						'twitter' => 'Twitter',
						'youtube' => 'Youtube',
						'linkedin' => 'LinkedIn',
					)),
				Field::make('urlpicker', 'link', __('URL', 'mtw'))
					->set_help_text('Enter your Link url'),
			))
			->set_header_template('Social Network: <%- type %>'),

			Field::make( 'image', 'fgw_map_placeholder', __( 'Map Placeholder' ) )
			->set_value_type( 'url' ),

			Field::make( 'separator', 'fg_separator1', __( 'About Us Options' ) ),

			Field::make( 'image', 'fgw_aboutus_intro_image', __( 'Intro Image' ) )
			->set_value_type( 'url' ),
			Field::make( 'image', 'fgw_aboutus_service_image', __( 'Service Image' ) )
			->set_value_type( 'url' ),
			Field::make( 'image', 'fgw_aboutus_whyus_image', __( 'Why Us Image' ) )
			->set_value_type( 'url' ),
			Field::make( 'oembed', 'fgw_aboutus_intro_video', __( 'About Us Video' ) ),

		




	) );

	
Container::make( 'theme_options', __( 'Property Options') )
	->set_page_parent('options-general.php')
	->add_tab( __( 'Types' ), array(
				//* Types
        Field::make('complex', 'fgw_types', __('Types'))
				->set_collapsed(true)
				->add_fields(array(
					Field::make( 'text', 'title', __( 'Title') ),
					Field::make( 'text', 'title_en', __( 'Title EN') ),
					Field::make( 'text', 'title_tr', __( 'Title TR') ),
					Field::make('text', 'slug'),
				))
				->set_header_template('Type: <%- title %>'),

        Field::make('complex', 'fgw_contract_types', __('Contract Types'))
				->set_collapsed(true)
				->add_fields(array(
					Field::make( 'text', 'title', __( 'Title') ),
					Field::make( 'text', 'title_en', __( 'Title EN') ),
					Field::make( 'text', 'title_tr', __( 'Title TR') ),
					Field::make('text', 'slug'),
				))
				->set_header_template('Contract Type: <%- title %>'),
    ) )
    ->add_tab( __( 'Locations' ), array(
        	//* Locations
				Field::make('complex', 'fgw_locations', __('Locations'))
				->set_collapsed(true)
				->add_fields(array(
					Field::make( 'text', 'title', __( 'Title') ),
					Field::make( 'text', 'title_en', __( 'Title EN') ),
					Field::make( 'text', 'title_tr', __( 'Title TR') ),
					Field::make('text', 'slug'),
					Field::make('complex', 'fgw_sublocations', __('Sublocations'))
						->set_collapsed(true)
						->add_fields(array(
							Field::make( 'text', 'title', __( 'Title') ),
							Field::make( 'text', 'title_en', __( 'Title EN') ),
							Field::make( 'text', 'title_tr', __( 'Title TR') ),
							Field::make('text', 'slug'),
						))
						->set_header_template('Sublocations: <%- title %>'),
				))
				->set_header_template('Location: <%- title %>'),
    ))
    ->add_tab( __( 'Amenities' ), array(
        	//* Locations
				Field::make('complex', 'fgw_amenities', __('Amenities'))
				->set_collapsed(true)
				->add_fields(array(
					Field::make( 'text', 'title', __( 'Title') ),
					Field::make( 'text', 'title_en', __( 'Title EN') ),
					Field::make( 'text', 'title_tr', __( 'Title TR') ),
					Field::make('text', 'slug'),
				))
				->set_header_template('Amenities: <%- title %>'),
		));
		

	Container::make( 'theme_options', __( 'Currency Converter') )
	->set_page_parent('options-general.php')
	->add_fields( array(
		Field::make( 'text', 'currency_lastupdate', __( 'Last Update') ),
		Field::make( 'text', 'currency_usd', __( 'USD') ),
		Field::make( 'text', 'currency_eur', __( 'EUR') ),
		Field::make( 'text', 'currency_sar', __( 'SAR') ),
		Field::make( 'text', 'currency_aed', __( 'AED') ),
		Field::make( 'text', 'currency_kwd', __( 'KWD') ),
		Field::make( 'text', 'currency_omr', __( 'OMR') ),
		Field::make( 'text', 'currency_qar', __( 'QAR') ),
		Field::make( 'text', 'currency_bhd', __( 'BHD') ),
		Field::make( 'text', 'currency_jod', __( 'JOD') ),
		Field::make( 'text', 'currency_dzd', __( 'DZD') ),
		Field::make( 'text', 'currency_yer', __( 'YER') ),
		Field::make( 'text', 'currency_gbp', __( 'GBP') ),
		Field::make( 'text', 'currency_chf', __( 'CHF') ),
		Field::make( 'text', 'currency_cad', __( 'CAD') ),
		Field::make( 'text', 'currency_aud', __( 'AUD') ),
		Field::make( 'text', 'currency_cny', __( 'CNY') ),
		Field::make( 'text', 'currency_rub', __( 'RUB') ),
		Field::make( 'text', 'currency_rub', __( 'RUB') ),
		Field::make( 'text', 'currency_try', __( 'TRY') ),
	) );
		
			
				

			/* 
			
			sar according to try = 3.751738 / 5.94165   sar / try
			
			
			*/


