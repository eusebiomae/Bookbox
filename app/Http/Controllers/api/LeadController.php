<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LeadController extends Controller {
	public function save(Request $request) {
		if ($request->header('host') == 'cetcc.com.br') {
			header('Access-Control-Allow-Origin: ' . $request->header('origin'));
		}

		// if ($request->get('newsletter')) {
		// 	(new \App\Model\api\NewsletterModel)->fill([
		// 		'name' => $request->get('name'),
		// 		'email' => $request->get('email'),
		// 	])->save();
		// }

		(new \App\Model\api\Prospection\LeadsModel)->fill([
			'origin' => $request->get('origin'),
			'course_category_id' => $request->get('course_category_id'),
			'student_name' => $request->get('name'),
			'email' => $request->get('email'),
			'phone' => $request->get('phone'),
			'office' => $request->get('office'),
			'complement' => $request->get('complement'),
			'newsletter' => $request->get('newsletter'),
		])->save();

		return 'MF000';
	}
}
