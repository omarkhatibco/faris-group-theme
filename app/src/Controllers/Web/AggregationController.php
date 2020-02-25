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
			$rooms = array_map(function ($obj) {return $obj['rooms_count'] + $obj['salons_count'];}, $apartments);
			
      return [
		 		'min_price' => intval(min($prices)),
				'max_price' => intval(max($prices)),
				'min_size'  => intval(min($sizes)),
				'max_size'  => intval(max($sizes)),
				'min_rooms'  => intval(min($rooms)),
				'max_rooms'  => intval(max($rooms)),
				
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
      'min_rooms'  => intval(min(array_map(function ($obj) { return $obj['min_rooms']; }, $data))),
      'max_rooms'  => intval(max(array_map(function ($obj) { return $obj['max_rooms']; }, $data))),
		];

		return \WPEmerge\json($data);
	}

}



