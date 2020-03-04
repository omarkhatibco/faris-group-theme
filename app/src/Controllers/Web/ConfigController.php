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
			'try' => carbon_get_theme_option('currency_try'),
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


		$aboutUs = [
			'IntroImage' => carbon_get_theme_option('fgw_aboutus_intro_image'),
			'ServiceImage' => carbon_get_theme_option('fgw_aboutus_service_image'),
			'whyUsImage' => carbon_get_theme_option('fgw_aboutus_whyus_image'),
			'introVideo' => carbon_get_theme_option('fgw_aboutus_intro_video'),
		];

		$properties = [
			'IntroImage' => carbon_get_theme_option('fgw_properties_intro_image'),
		];



		$config = [
			'aboutUs' => $aboutUs,
			'properties' => $properties,
			'currency' => $currency
		];

		$origin = $_SERVER['HTTP_ORIGIN'];
		$allowed_domains = [
    'https://faris-group.com',
    'https://www.faris-group.com',
		];

		if (in_array($origin, $allowed_domains)) {
				header('Access-Control-Allow-Origin: ' . $origin);
		}

		return \WPEmerge\json($config);
	}

}