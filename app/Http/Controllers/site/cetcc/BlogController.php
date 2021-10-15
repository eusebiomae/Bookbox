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

		// return $blog;

		return view ('site/bookbox/pages/blog_post_details')
		->with('flgPage', $flgPage)
		->with('pageComponents', $pageComponents)
		->with('blog', $blog);
	}

	public function blog(Request $request, $id)
	{
			$courseModel = CourseModel::with(['courseCategory', 'courseCategoryType', 'courseSubcategory'])->find($id);
			//$courseModel = CourseModel::where('id', $id)->first();

			$flgPage = $request->get('flgPage');
			$pageComponents = ContentPageModel::getByComponent($flgPage);

			$features = FeatureModel::select('id', 'title', 'icon', 'description', 'content_page_id')->whereHas('contentPage', function ($query) use ($flgPage) {
		$query->where('flg_page', $flgPage);
			})->get();

			$banner = SlideModel::whereHas('contentPage', function ($query) use ($flgPage) {
					$query->where('flg_page', $flgPage);
			})->get();

			foreach ($pageComponents->contentSection as $section) {
					if ($section->component == 'blog') {
							$section->content[] = $courseModel;
							break;
					}
			}

		 $banner[0]->title_pt = $courseModel->title_pt;

			return view('site/pages/default')
			->with('banner', $banner)
			->with('course', $courseModel)
			->with('features', $features)
			->with('pageComponents', $pageComponents);

	}

}
