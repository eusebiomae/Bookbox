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

	public function getPost(Request $request, $id) {

		$flgPage = $request->get('flgPage');

		$pageComponents = ContentPageModel::getByComponent($flgPage);

		$blog = BlogModel::find($id);

		// return $flgPage;

		return view ('site/bookbox/pages/blog_post_details')
		->with('flgPage', $flgPage)
		->with('pageComponents', $pageComponents)
		->with('blog', $blog);
	}
}
