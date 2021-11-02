<?php

namespace App\Http\Controllers\site\cetcc;

use App\Model\api\Configuration\ContentPageModel;
use App\Model\api\CourseOtherInfModel;
use Illuminate\Http\Request;
use App\Model\api\Prospection\CourseCategoryModel;
use App\Model\api\Prospection\CourseCategoryTypeModel;
use App\Model\api\Prospection\CourseModel;
use App\Model\api\Prospection\CourseSubcategoryModel;
use App\Model\api\SlideModel;
use Illuminate\Support\Facades\DB;

class CourseController extends _Controller
{

	public function default(Request $request)
	{
		$flgPage = $request->get('flgPage');
		$flgCourse = $request->get('flgCourse');
		// $typeCourse = $request->get('typeCourse');

		$courses = CourseModel::select('id', 'img', 'title_pt', 'subtitle_pt', 'course_category_id', 'course_subcategory_id', 'course_category_type_id', 'cta', 'show_title', 'certified', 'hours_load', 'school_clinic', 'additional_information', 'inactive')
		->with([
			'courseCategory' => function($query){
				$query->select('id', 'description_pt', 'color');
			},
			'courseCategoryType' => function($query){
				$query->select('id', 'title', 'flg');
			},
			'courseSubcategory' => function($query){
				$query->select('id', 'description_pt', 'flg');
			}])
		->whereNull('inactive')
		->whereHas('courseSubcategory', function($query) {
			$query->whereNull('invisible_connected');
		})
		->whereHas('courseCategory', function($query) {
			$query->whereNull('invisible_connected');
		})
		->whereHas('courseCategoryType', function($query) {
			$query->whereNull('invisible_connected');
		})
		->get();

		// return $courses;

		return view('site/cetcc/pages/courses')
			->with('params', $request->all())
			->with('flgPage', $flgPage)
			->with('banner', SlideModel::select('id', 'title_pt', 'image')->whereHas('contentPage', function($query) use ($flgPage) {
				$query->where('flg_page', $flgPage);
			})->first())
			->with('courseCategoryTypes', CourseCategoryTypeModel::whereNull('invisible')->get())
			->with('courseCategories', CourseCategoryModel::whereNull('invisible')->get())
			->with('courseSubcategories', CourseSubcategoryModel::whereNull('invisible')->get())
			->with('courses', $courses)
			->with('flgCourseCategoryType', $flgCourse)
			->with('footerLinks', $this->generateFooterLinks());
	}

	public function courseDetails(Request $request, $id) {
		$flgPage = $request->get('flgPage');

		$pageComponents = ContentPageModel::getByComponent($flgPage);

		// $content_page_id = ContentPageModel::getByComponent($id);

		// return $id;
		// return $flgPage;
		// return $id = CourseModel::getByComponent($flgPage);
		// $products = CourseModel::where('course_category_id', 1)->get();

			// return $course->class;
		// return $pageComponents;
		return view('site/bookbox/pages/default')
		// ->with('content_page_id', $content_page_id)
		->with('flgPage', $flgPage)
		->with('id', $id)
		->with('pageComponents', $pageComponents);
		// ->with('products', $products);
	}
}
