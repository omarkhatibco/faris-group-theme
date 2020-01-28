<?php

namespace App\Controllers\Web;

use WPEmerge\Requests\Request;


class TestController
{

	public function index(Request $request, $view)
	{
    $currency = ['eur','sar','aed','kwd','omr','qar','bhd','jor','dzd','yer','gbp','chf','chf','cad','aud','cny','rub'];

    $data;

    foreach ($currency as $curr) {
      $data[$curr] = 1;
    }


    


		


		return \WPEmerge\json($data);
	}

}
