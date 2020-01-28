<?php

namespace App\Controllers\Web;

use WPEmerge\Requests\Request;


class TestController
{

	public function index(Request $request, $view)
	{

    $apiData  = wp_remote_get( 'https://openexchangerates.org/api/latest.json?app_id=ed7245e0b2e2444a8b7a6494c9d7fea3');
    $currency = ['eur','sar','aed','kwd','omr','qar','bhd','jor','dzd','yer','gbp','chf','chf','cad','aud','cny','rub'];

    $data;

    foreach ($currency as $curr) {
      $data[$curr] = 1;
    }




    


		


		return \WPEmerge\json($apiData);
	}

}
