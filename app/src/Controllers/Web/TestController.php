<?php

namespace App\Controllers\Web;

use WPEmerge\Requests\Request;


class TestController
{

	public function index(Request $request, $view)
	{

    $response  = wp_remote_get( 'https://openexchangerates.org/api/latest.json?app_id=ed7245e0b2e2444a8b7a6494c9d7fea3');
    $apiData =json_decode($response['body'], true);

    if ($apiData && $apiData['error']) {
      return;
    }
    
    

    $currency = ['eur','sar','aed','kwd','omr','qar','bhd','jor','dzd','yer','gbp','chf','chf','cad','aud','cny','rub'];

    $try = $apiData['rates']['TRY'];
    $data;

    $data['usd'] = 1 / $try;

    foreach ($currency as $curr) {
      $data[$curr] = $apiData['rates'][strtoupper($curr)]  / $try;
    }



		return \WPEmerge\json($data);
	}

}
