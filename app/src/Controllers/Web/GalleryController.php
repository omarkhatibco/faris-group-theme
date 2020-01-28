<?php

namespace App\Controllers\Web;

use WPEmerge\Requests\Request;


class GalleryController
{

	public function index(Request $request, $view,$postId)
	{
		// will return array of gallery images prefixed with i0.wp.com

		

		$galleryIds = carbon_get_post_meta($postId, 'media_gallery' );

		$galleryUrls;

		foreach ($galleryIds as $id) {


			$galleryUrls[] = $domainName = str_replace(['https://','http://'], "https://cdn.statically.io/img/", wp_get_attachment_url( $id ));
		}

		return \WPEmerge\json([
			'results'=> $galleryUrls
		]
		);
	}

}
