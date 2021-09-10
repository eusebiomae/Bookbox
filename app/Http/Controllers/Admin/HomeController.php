<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class HomeController extends Controller {
	function __construct() {
		$this->pageKey = 'home';
	}

	public function index() {
		return view('admin/home/index');
	}
}
