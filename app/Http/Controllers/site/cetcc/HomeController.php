<?php

namespace App\Http\Controllers\site\cetcc;

use Illuminate\Http\Request;
use App\Model\api\SchoolInformationModel;
use App\Model\api\SlideModel;
use App\Model\api\FeatureModel;
use App\Model\api\Prospection\CourseCategoryTypeModel;
use App\Model\api\Prospection\CourseModel;
use App\Model\api\BlogModel;
use App\Model\api\Configuration\ContentPageModel;
use App\Model\api\TestemonialModel;
use App\Model\api\Configuration\ContentSectionModel;
use App\Model\api\ContentModel;
use App\Model\api\LinkFooterModel;
use App\Model\api\Prospection\CourseCategoryModel;

class HomeController extends _Controller
{

	public function index(Request $request)
	{
		$flgPage = $request->get('flgPage');

		$carrossel = SlideModel::whereHas('contentPage', function ($query) use ($flgPage) {
			$query->where('flg_page', $flgPage);
		})->get();

		$features = FeatureModel::select('id', 'title', 'icon', 'description', 'content_page_id')->whereHas('contentPage', function ($query) use ($flgPage) {
			$query->where('flg_page', $flgPage);
		})->get();

		$categoriesCourseType = CourseCategoryTypeModel::select('id', 'title', 'description', 'image', 'flg')->get();

		$courseCategories = CourseCategoryModel::select('id', 'description_pt', 'image')->orderBy('description_pt')->get();

		$courses = CourseModel::select(
			'id',
			'title_pt',
			'img',
			'show_title',
			'cta',
			'course_category_id',
			'course_subcategory_id',
			'course_category_type_id'
		)->where('show_home', '1')->with([
			'courseCategory' => function($query) {
				$query->select('id', 'description_pt', 'color');
			},
			'courseSubcategory' => function($query) {
				$query->select('id', 'description_pt');
			},
			'courseCategoryType' => function($query) {
				$query->select('id', 'title');
			},
		])->whereNull('inactive')->get();


		$blogPosts = BlogModel::select('id', 'image', 'title_pt', 'blog_category_id', 'author_post', 'text_pt')->whereHas('category', function($query) {
			$query->where('flg_type', 'blog');
		})->with([
			'category' => function($query) {
				$query->select('id', 'description_pt');
			},
			'author' => function ($query) {
				$query->select('id', 'name');
			},
		])->orderBy('created_at', 'desc')->limit(4)->get();

		$testemonial = TestemonialModel::select('id', 'name', 'office', 'text_pt', 'image', 'text_pt', 'content_page_id')->get();

		$contentsSectionModel = ContentSectionModel::select('id', 'content_page_id', 'flg')->whereHas('contentPage', function ($query) use ($flgPage) {
			$query->where('flg_page', $flgPage);
		})->with(['content' => function($query) {
			$query->select('id', 'title_pt', 'text_pt', 'image', 'link', 'image_bg', 'link_label', 'content_page_id', 'content_section_id');
		}])->get();

		$contentsSection = [];
		for ($i = 1; $i <= 3; $i++) {
			$contentsSection[$i] = (clone $contentsSectionModel)->where('flg', $i)->first();
		}

		$event = ContentModel::select('id', 'title_pt', 'text_pt', 'image', 'link', 'image_bg', 'link_label')->where('visible_event', 1)->first();

		return view('site/cetcc/pages/home')
			->with('flgPage', $flgPage)
			->with('features', $features)
			->with('categoriesCourseType', $categoriesCourseType)
			->with('carrossel', $carrossel)
			->with('courses', $courses)
			->with('blogPosts', $blogPosts)
			->with('testemonial', $testemonial)
			->with('contentsSection', $contentsSection)
			->with('courseCategories', $courseCategories)
			->with('event', $event)
			->with('footerLinks', $this->generateFooterLinks());
	}
}
