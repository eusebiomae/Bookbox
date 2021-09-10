<?php

namespace App\Http\Controllers\StudentArea;

use App\Model\api\CourseSupervisionModel;
use App\Model\api\OrderModel;
use App\Model\api\ScholarshipModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class HomeController extends _Controller {

	public function index(Request $request) {
		$active = OrderModel::where('student_id', Auth::guard('studentArea')->user()->id)
		->whereNotNull('course_id')
		->whereNull('order_id')
		->with([
			'course',
			'class',
		])->orderByDesc('id');

		$finished = clone $active;

		$active->whereIn('status', ['PE', 'AP', 'TR', 'BL']);
		$finished->whereIn('status', ['CA', 'IN']);

		$supervision = OrderModel::where('student_id', Auth::guard('studentArea')->user()->id)
		->whereNull('course_id')
		->whereNull('order_id')
		->with([
			'supervision.teacher',
			'supervision.course',
		])->get();

		foreach ($supervision as $item) {
			if (isset($item->supervision)) {
				$item->supervision->courses = CourseSupervisionModel::getCoursesTitle($item->supervision);
			}
		}

		$openScholarships = ScholarshipModel::with([
			'scholarshipDiscount' => function($query){
				$query->orderBy('discount_percentage', 'desc');
			},
			'courseCategory',
			'courseCategoryType',
			'courseSubcategory',
			'scholarshipStudent',
			'avaliation',
			'avaliation.avaliationStudent',
		])
		->whereHas('scholarshipStudent', function($query){
			$query->where('student_id', Auth::guard('studentArea')->user()->id);
		})
		->orderBy('registration_deadline_second_call', 'desc');

		$closedScholarships = clone $openScholarships;

		$openScholarships->where('registration_deadline_second_call', '>=', date('Y-m-d'));
		$closedScholarships->where('registration_deadline_second_call', '<', date('Y-m-d'));

		return view('student_area/home/index')->with('payload', [
			'active' => $active->get(),
			'finished' => $finished->get(),
			'openScholarships' => $openScholarships->get(),
			'closedScholarships' => $closedScholarships->get(),
			'supervision' => $supervision,
		]);
	}

}
