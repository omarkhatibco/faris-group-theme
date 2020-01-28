<?php

namespace App\Controllers\Web;

use WPEmerge\Requests\Request;


class TestController
{

	public function index(Request $request, $view)
	{
    
		return \WPEmerge\json(['message'=> 'ok']);
	}

}
