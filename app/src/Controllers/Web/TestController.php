<?php

namespace App\Controllers\Web;

use WPEmerge\Requests\Request;


class TestController
{

	public function index(Request $request, $view)
	{
    $apikey = carbon_get_theme_option( 'fg_openexchangerates_api_key' );
     
    $response  = wp_remote_get( 'https://openexchangerates.org/api/latest.json?app_id=' . $apikey);
    $apiData =json_decode($response['body'], true);

    if ($apiData && isset($apiData['error'])) {
      return;
    }
    
    

    $currency = ['eur','sar','aed','kwd','omr','qar','bhd','jod','dzd','yer','gbp','chf','chf','cad','aud','cny','rub'];

    $try = $apiData['rates']['TRY'];
    $data;

    $data['usd'] = 1 / $try;
    carbon_set_theme_option( 'currency_lastupdate', $apiData['timestamp'] );
    carbon_set_theme_option( 'currency_usd', 1 / $try );

    foreach ($currency as $curr) {
      carbon_set_theme_option( 'currency_' . $curr, $apiData['rates'][strtoupper($curr)]  / $try );
      $data[$curr] = $apiData['rates'][strtoupper($curr)]  / $try;
    }



		return \WPEmerge\json($data);
	}

}
