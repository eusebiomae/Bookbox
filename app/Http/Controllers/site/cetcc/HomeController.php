<?php

namespace App\Http\Controllers\site\cetcc;

use Illuminate\Http\Request;
use App\Model\api\Configuration\ContentPageModel;
class HomeController extends _Controller
{

	public function index(Request $request)
	{
		$flgPage = $request->get('flgPage');

		$pageComponents = ContentPageModel::getByComponent($flgPage);

		// return $pageComponents;
		return view('site/bookbox/pages/default')
			->with('flgPage', $flgPage)
			->with('pageComponents', $pageComponents);
	}
}
