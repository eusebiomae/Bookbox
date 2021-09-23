<?php

namespace App\Http\Controllers\site\cetcc;

use App\Model\api\CourseOtherInfModel;
use Illuminate\Http\Request;
use App\Model\api\Prospection\CourseCategoryModel;
use App\Model\api\Prospection\CourseCategoryTypeModel;
use App\Model\api\Prospection\CourseModel;
use App\Model\api\Prospection\CourseSubcategoryModel;
use App\Model\api\SchoolInformationModel;
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

		$course = CourseModel::with([
			'place',
			'courseOtherInf',
			'class' => function ($query) {
				$query
				->where('show_site', '1')
				->with([
					'team',
					'classTeacher.team.graduation',
					'classTeacher.team.function',
					'classTeacher.team.office',
					'courseModule' => function($query) {
						$query->with([ 'contentCourse' ])
						->orderBy('start_date')
						->orderBy('sequence');
					},
					'city',
				])->orderBy('start_date');
			},
			'bonusCourse' => function($query) {
				$query->orderBy('title_pt');
			},
			'IncludedItems' => function($query) {
				$query->orderBy('title_pt');
			},
			'courseFormPayment' => function($query) {
				$query
				->select([
					'id', 'flg_main', 'course_id', 'form_payment_id',
					'date', 'full_value', 'value', 'parcel', 'desc',
					DB::raw('CASE WHEN date < now() THEN 1 ELSE 0 END AS sneezed'),
				])
				->with([
					'formPayment',
				])
				->where('date', '>=', now())
				->orderBy('date', 'asc')
				->orderBy('value', 'desc');
			},
			'courseModule' => function($query) {
				$query->with([ 'contentCourse' ])
				->orderBy('start_date')
				->orderBy('sequence');
			},
			'otherInfType' => function($query) {
				$query->groupBy('id')->orderBy('sequence');
			},
			'user',
			'courseCategoryType',
			'courseAdditional' => function($query) {
				$query->select([ 'course_additional.*', 'additional.title' ]);
				$query->with([ 'formPayment' ]);
				$query->join('additional', 'additional.id', '=', 'course_additional.additional_id');
				$query->orderBy('additional.title', 'asc');
			},

		])->find($id);

		// foreach ($course->otherInfType as $otherInfType) {
		// 	$courseOtherInf_otherInf = CourseOtherInfModel::query()
		// 	->with(['otherInf'])
		// 	->where('course_id', $otherInfType->pivot->course_id)
		// 	->where('other_inf_type_id', $otherInfType->pivot->other_inf_type_id)
		// 	->get();

		// 	$otherInfType_otherInf = [];
		// 	foreach ($courseOtherInf_otherInf as $courseOtherInf_otherInf_item) {
		// 		$otherInfType_otherInf[] = $courseOtherInf_otherInf_item->otherInf;
		// 	}

		// 	$otherInfType->otherInf = $otherInfType_otherInf;
		// }

		// return $course->courseFormPayment->toSql();

		// foreach ($course->courseFormPayment as $courseFormPayment) {
		// 	if (!empty($courseFormPayment->flg_main)) {
		// 		$course->courseFormPaymentMain = $courseFormPayment;
		// 		break;
		// 	}
		// }

		$mapDataTableValues = [
			'header' => [],
			'data' => [],
		];

		$hasFree = false;

		// foreach ($course->courseFormPayment as $courseFormPayment) {
		// 	$mapDataTableValues['header'][$courseFormPayment->form_payment_id] = [
		// 		'label' => $courseFormPayment->formPayment->description,
		// 		'column' => $courseFormPayment->form_payment_id,
		// 	];

		// 	if (!$hasFree && $courseFormPayment->formPayment->flg_free) {
		// 		$hasFree = true;
		// 	}

		// 	$mapDataTableValues['data'][$courseFormPayment->date][$courseFormPayment->form_payment_id][] = $courseFormPayment->toArray();
		// }

		$cities = [];
		$course['doesRegistre'] = false;

		// foreach ($course->class as $class) {
		// 	if ($class->city_id) {
		// 		$cities[$class->city_id] = $class->city;
		// 	}

		// 	if (!$course['doesRegistre'] && $class->does_registre == '1') {
		// 		$course['doesRegistre'] = true;
		// 	}
		// }

		$course['cities'] = $cities;

			// return $course->class;

		return view('site/bookbox/pages/single-product')
		->with('flgPage', $flgPage)
		->with('mapDataTableValues', $mapDataTableValues)
		->with('course', $course)
		->with('hasFree', $hasFree)
		->with('banner', SlideModel::whereHas('contentPage', function($query) use ($flgPage) {
			$query->where('flg_page', $flgPage);
		})->first())
		->with('footerLinks', $this->generateFooterLinks());
	}
}
