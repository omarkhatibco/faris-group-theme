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

Container::make( 'theme_options', __( 'Theme Options', 'fgw' ) )
	->set_page_parent('options-general.php')
	->add_fields( array(
		Field::make( 'text', 'crb_google_maps_api_key', __( 'Google Maps API Key', 'fgw' ) ),
		Field::make('complex', 'fgw_socials', __('Social Media'))
			->set_collapsed(true)
			->add_fields(array(
				Field::make('select', 'fgw_social_type', __('Social Media Type', 'mtw'))
					->set_options(array(
						'facebook' => 'Facebook',
						'instagram' => 'Instagram',
						'twitter' => 'Twitter',
						'youtube' => 'Youtube',
						'linkedin' => 'LinkedIn',
					)),
				Field::make('urlpicker', 'fgw_social_link', __('URL', 'mtw'))
					->set_help_text('Enter your Link url'),
			))
			->set_header_template('Social Network: <%- fgw_social_type %>')

	) );

Container::make( 'theme_options', __( 'Property Options', 'fgw' ) )
	->set_page_parent('options-general.php')
	->add_fields( array(
				Field::make( 'text', 's', __( 'Google Maps API Key', 'fgw' ) ),

	) );
