<?php

namespace App\Http\Controllers\site\cetcc;

use App\Model\api\BlogModel;
use Illuminate\Http\Request;
use App\Model\api\Configuration\ContentPageModel;
class BlogController extends _Controller
{

	public function index(Request $request)
	{
		$flgPage = $request->get('flgPage');

		$pageComponents = ContentPageModel::getByComponent($flgPage);
		$blogs = BlogModel::get();

		// return $pageComponents;
		return view('site/bookbox/pages/default')
			->with('flgPage', $flgPage)
			->with('pageComponents', $pageComponents)
			->with('blogs', $blogs);
	}
}
