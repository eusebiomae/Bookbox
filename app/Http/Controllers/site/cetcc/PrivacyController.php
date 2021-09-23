<?php

namespace App\Http\Controllers\site\cetcc;

use Illuminate\Http\Request;

class PrivacyController extends _Controller
{
    public function index(Request $request)
    {
        return view('site/bookbox/pages/privacy-policy');
    }
}
