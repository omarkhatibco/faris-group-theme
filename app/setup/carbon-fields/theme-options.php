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
		Field::make( 'text', 'fg_contact_email', __( 'Contact Email') ),
		
		Field::make( 'separator', 'fg_separator1', __( 'About Us Options' ) ),

		Field::make( 'image', 'fgw_aboutus_intro_image', __( 'Intro Image' ) )
		->set_value_type( 'url' ),
		Field::make( 'image', 'fgw_aboutus_service_image', __( 'Service Image' ) )
		->set_value_type( 'url' ),
		Field::make( 'image', 'fgw_aboutus_whyus_image', __( 'Why Us Image' ) )
		->set_value_type( 'url' ),
		Field::make( 'oembed', 'fgw_aboutus_intro_video', __( 'About Us Video' ) ),

		Field::make( 'separator', 'fg_separator2', __( 'Properties Options' ) ),

		Field::make( 'image', 'fgw_properties_intro_image', __( 'Properties Image' ) )
		->set_value_type( 'url' ),

	) );

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
		Field::make( 'text', 'currency_try', __( 'TRY') ),
	) );
