<?php

namespace App\Controllers\Web;

use WPEmerge\Requests\Request;


class ContactController
{

	public function index(Request $request, $view)
	{

		$subject = sprintf(__('You got a new Contact Message in %s', 'mtw'), get_bloginfo('name'));

		$name = $request->post('name');
		$email = $request->post('email');
		$mobile = $request->post('mobile');
		$messageBody = $request->post('message');
		$whenToCall = $request->post('whenToCall');
		$url = $request->post('url');
		$id = $request->post('id');

		if (!$name  || !$email || !$messageBody) {
			return \WPEmerge\json(['message' => 'not ok'])->withStatus(500);
		}


		$to = carbon_get_theme_option('fg_contact_email');


		$message =	'<p>' . __('Hello,') . '</p><br/>';

		$message .= '<p>' .  __('Name') . ' : ' . $name . '</p>';
		$message .= '<p>' . __('Email') . ' : ' . $email . '</p>';
		$message .= '<p>' . __('Mobile') . ' : ' . $mobile . '</p>';

		if ($whenToCall) {
			$message .= '<p>' . __('When To Call') . ' : ' . $whenToCall . '</p>';
		}

		if ($url) {
			$message .= '<p>' . __('Property Url') . ' : <a href='. $url .'>'. $url .'</a></p>';
		}
		if ($id) {
			$message .= '<p>' . __('BackEnd Url') . ' : <a href='. get_admin_url() . 'post.php?post='. $id .'&action=edit' .'>'. get_admin_url() . 'post.php?post='. $id .'&action=edit' .'</a></p>';
		}


		$message .= '<p>' . $messageBody . '</p>';
		$message .=	'<br/><p>' . __('Website Team,') . '</p>';

		$sent = wp_mail($to, $subject, $message, ['Content-Type: text/html; charset=UTF-8']);
		if ($sent) {
			return \WPEmerge\json(['message' => 'ok']);
		} //message sent!
		else {
			return \WPEmerge\json(['message' => 'not ok'])->withStatus(500);
		} //message wasn't sent

		$json = [
			'message'=> 'ok'
		];

		$origin = $_SERVER['HTTP_ORIGIN'];
		$allowed_domains = [
    'https://faris-group.com',
    'https://www.faris-group.com',
		];

		if (in_array($origin, $allowed_domains)) {
				header('Access-control-allow-methods: POST');
			
		}
		header('Access-Control-Allow-Origin: *');
		return \WPEmerge\json($json);
	}

}