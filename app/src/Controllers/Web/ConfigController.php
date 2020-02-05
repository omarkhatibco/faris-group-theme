<?php

namespace App\Controllers\Web;

use WPEmerge\Requests\Request;


class ConfigController
{

	public function index(Request $request, $view)
	{

		$currency = [
			'lastUpdate' => carbon_get_theme_option('currency_lastupdate'),
			'usd' => carbon_get_theme_option('currency_usd'),
			'eur' => carbon_get_theme_option('currency_eur'),
			'sar' => carbon_get_theme_option('currency_sar'),
			'aed' => carbon_get_theme_option('currency_aed'),
			'kwd' => carbon_get_theme_option('currency_kwd'),
			'omr' => carbon_get_theme_option('currency_omr'),
			'qar' => carbon_get_theme_option('currency_qar'),
			'bhd' => carbon_get_theme_option('currency_bhd'),
			'jod' => carbon_get_theme_option('currency_jod'),
			'dzd' => carbon_get_theme_option('currency_dzd'),
			'yer' => carbon_get_theme_option('currency_yer'),
			'gbp' => carbon_get_theme_option('currency_gbp'),
			'chf' => carbon_get_theme_option('currency_chf'),
			'cad' => carbon_get_theme_option('currency_cad'),
			'aud' => carbon_get_theme_option('currency_aud'),
			'cny' => carbon_get_theme_option('currency_cny'),
			'rub' => carbon_get_theme_option('currency_rub'),
		];

		$apiKeys = [
			'googleMap' => carbon_get_theme_option('crb_google_maps_api_key'),
		];



		$config = [
			'apiKeys'=> $apiKeys,
			'social' => carbon_get_theme_option('fgw_socials'),
			'types' => carbon_get_theme_option('fgw_types'),
			'contractType' => carbon_get_theme_option('fgw_contract_types'),
			'locations' => carbon_get_theme_option('fgw_locations'),
			'amenities' => carbon_get_theme_option('fgw_amenities'),
			'currency' => $currency
		];

		return \WPEmerge\json($config);
	}

}
