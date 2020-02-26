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
			$rooms_type = carbon_get_post_meta( $id, 'rooms_type' );
			
      return [
		 		'min_price' => intval(min($prices)),
				'max_price' => intval(max($prices)),
				'min_size'  => intval(min($sizes)),
				'max_size'  => intval(max($sizes)),
				'rooms_type'  => $rooms_type,
			];
		};

		$posts = query_posts([ 
			'post_type' => 'property',
			'posts_per_page' => -1
		]);
		
		$data = array_map($getData, $posts);
		
		$rooms_string = implode(",", array_map(function ($obj) { return $obj['rooms_type']; }, $data));
		$rooms_type = explode(",", $rooms_string);

		

		$json = [
			'min_price' => intval(min(array_map(function ($obj) { return $obj['min_price']; }, $data))),
    	'max_price' => intval(max(array_map(function ($obj) { return $obj['max_price']; }, $data))),
      'min_size'  => intval(min(array_map(function ($obj) { return $obj['min_size']; }, $data))),
      'max_size'  => intval(max(array_map(function ($obj) { return $obj['max_size']; }, $data))),
      'rooms_type'  => array_values(array_unique($rooms_type))
		];

		return \WPEmerge\json($json);
	}

}



