<?php

namespace App\Http\Controllers\site\cetcc;

use Illuminate\Http\Request;
use App\Model\api\Configuration\ContentPageModel;
use App\Model\api\Prospection\CourseModel;

class ShopBoxController extends _Controller {

	public function index(Request $request) {
		$flgPage = $request->get('flgPage');

		$pageComponents = ContentPageModel::getByComponent($flgPage);
		$products = CourseModel::get();
		$courseCategories = CourseModel::get();

		return view('site/bookbox/pages/default')
		->with('flgPage', $flgPage)
		->with('pageComponents', $pageComponents)
		->with('courseCategories', $courseCategories)
		->with('products', $products);
	}

}
