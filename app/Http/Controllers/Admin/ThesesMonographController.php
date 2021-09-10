<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ThesesMonographController extends Controller {
	function __construct() {
		$this->pageKey = 'thesesMonograph';

	}

	public function list(Request $request) {

		return view('');
	}
}
