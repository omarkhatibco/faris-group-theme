<?php

namespace App\Controllers\Web;

use WPEmerge\Requests\Request;


class AggregationController
{

	public function index(Request $request, $view)
	{

		$getData = function ($post) {
			
			$id = $post->ID;
			$apartments = carbon_get_post_meta( $id, 'appartments' );
    	$prices = array_map(function ($obj) { return $obj['price']; }, $apartments);
			$sizes = array_map(function ($obj) {return $obj['min_size'];}, $apartments);
			
      return [
		 		'min_price' => intval(min($prices)),
      	'min_size'  => intval(min($sizes)),
    		'max_price' => intval(max($prices)),
      	'max_size'  => intval(max($sizes)),
			];
		};



		$posts = query_posts([ 
			'post_type' => 'property',
			'posts_per_page' => -1
		]);
		

		$data = array_map($getData, $posts);

		$data = [
			'min_price' => intval(min(array_map(function ($obj) { return $obj['min_price']; }, $data))),
    	'max_price' => intval(max(array_map(function ($obj) { return $obj['max_price']; }, $data))),
      'min_size'  => intval(min(array_map(function ($obj) { return $obj['min_size']; }, $data))),
      'max_size'  => intval(max(array_map(function ($obj) { return $obj['max_size']; }, $data))),
		];

		return \WPEmerge\json($data);
	}

}



