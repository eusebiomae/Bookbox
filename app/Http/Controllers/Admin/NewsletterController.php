<?php

namespace App\Http\Controllers\Admin;

use App\Model\api\NewsletterModel;
use Illuminate\Http\Request;

class NewsletterController extends \App\Http\Controllers\Controller {

	function __construct() {
		$this->pageKey = 'newsletter';
	}

	public function list(Request $request) {

		return view('admin.newsletter.list')->with('payload', (object) [
			'newsletter' => NewsletterModel::orderBy('name')->get(),
		]);
	}

}
