<?php

namespace App\Http\Controllers\site\cetcc;

use Illuminate\Http\Request;
use App\Model\api\Configuration\ContentPageModel;
use App\Model\api\Prospection\CourseModel;

class HomeController extends _Controller
{

	public function index(Request $request)
	{
		$flgPage = $request->get('flgPage');

		$pageComponents = ContentPageModel::getByComponent($flgPage);

		$products = CourseModel::where('course_category_id', 2)->get();

		$editions = CourseModel::where('course_category_id', 1)->get();

		// return $pageComponents;
		return view('site/bookbox/pages/default')
			->with('flgPage', $flgPage)
			->with('pageComponents', $pageComponents)
			->with('products', $products)
			->with('editions', $editions);
	}
}
