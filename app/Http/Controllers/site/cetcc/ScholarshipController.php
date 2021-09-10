<?php

namespace App\Http\Controllers\site\cetcc;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\api\Prospection\CourseCategoryTypeModel;
use App\Model\api\ScholarshipModel;
use Illuminate\Support\Facades\Storage;

class ScholarshipController extends Controller{
	public function index(Request $request){
		$flgPage  = $request->get('flgPage');

		$scholarships = ScholarshipModel::with(['scholarshipDiscount' => function($query){
																								$query->orderBy('discount_percentage', 'desc');
																							},
																							'courseCategory',
																							'courseCategoryType',
																							'courseSubcategory',
																						])->whereHas('courseCategory', function($query){
																							$query->whereNull('invisible_connected');
																						})->whereHas('courseCategoryType', function($query){
																							$query->whereNull('invisible_connected');
																						})->whereHas('courseSubcategory', function($query){
																							$query->whereNull('invisible_connected');
																						})->where('registration_end_date', '>=', now())->orderBy('registration_end_date');

		$categories = $request->get('categories');
		if (!isset($categories['all']) && isset($categories['c'])) {
			$scholarships->whereIn('course_category_id', $categories['c']);
		}

		if (!empty($request->get('search'))) {
			$search = $request->get('search');

			$scholarships->where(function($query) use ($search) {
				$query
				->orWhere('title', 'like', "%{$search}%")
				->orWhere('description', 'like', "%{$search}%");
			});
		}

		if ($request->get('view')) {
			switch ($request->get('view')) {
				case 'ead':
					$scholarships->where('course_category_type_id', 3);
				break;
				case 'semipresential':
					$scholarships->where('course_category_type_id', 2);
					break;
				case 'presential':
					$scholarships->where('course_category_type_id', 1);
				break;
			}
		}

		$categories = ScholarshipModel::getCategoryCountCourse();
		$courseCategoryType = CourseCategoryTypeModel::whereNull('invisible')->get();

		return view('site/cetcc/pages/blog')->with([
			'title' => 'Bolsas de Estudo',
			'flgPage' => $flgPage,
			'categories' => $categories,
			'params' => $request->all(),
			'courseCategoryType' => $courseCategoryType,
			'posts' => $scholarships->paginate(15)->setPath("/{$flgPage}"),
		]);
	}
}
