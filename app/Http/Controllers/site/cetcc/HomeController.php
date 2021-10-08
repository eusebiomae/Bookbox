<?php

namespace App\Http\Controllers\site\cetcc;

use Illuminate\Http\Request;
use App\Model\api\Configuration\ContentPageModel;
use App\Model\api\Prospection\CourseModel;
use Illuminate\Support\Facades\DB;

class HomeController extends _Controller
{

	public function index(Request $request)
	{
		$flgPage = $request->get('flgPage');

		$pageComponents = ContentPageModel::getByComponent($flgPage);

		$product = CourseModel::where('course_category_id')->get();

		$products = CourseModel::where('course_category_id', 2)->get();

		$editions = CourseModel::where('course_category_id', 1)->orderBy('created_at', 'desc')->limit(3)->get();

		// return $pageComponents;
		return view('site/bookbox/pages/default')
			->with('flgPage', $flgPage)
			->with('pageComponents', $pageComponents)
			->with('product', $product)
			->with('products', $products)
			->with('editions', $editions);
	}
}

