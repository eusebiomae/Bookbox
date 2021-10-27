<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Model\api\Configuration\CityModel;
use App\Model\api\Configuration\StateModel;
use App\Model\api\Prospection\CourseModel;
use App\Model\api\StudentAddressModel;
use Illuminate\Http\Request;

class GetApiController extends Controller {
	public function state() {
		return StateModel::orderBy('name')->get([ 'id', 'initials', 'name' ]);
	}

	public function city(Request $request) {
		$cityModel = CityModel::query();

		if ($request->has('stateId')) {
			$cityModel->where('state_id', $request->get('stateId'));
		}

		return $cityModel->orderBy('name')->get([ 'id', 'name' ]);
	}

	public function address(Request $request) {
		return StudentAddressModel::where('student_id', $request->get('studentId'))->first();
	}

	public function product($id) {
		return CourseModel::query()->select([
			'id', 'course_category_id', 'img', 'title_pt', 'subtitle_pt', 'description_pt',
		])->with([
			'formPayment' => function($query) use ($id) {
				$query
				->select(['form_payment.id', 'form_payment.description', 'form_payment.flg_type', 'form_payment.flg_web'])
				->with([
					'courseFormPayment' => function($query) use ($id) {
						$query
						->select(['id', 'class_id', 'course_id', 'form_payment_id', 'parcel', 'value', 'full_value', 'course_subcategory_id', 'flg_main'])
						->where('course_id', $id);
					},
				]);
			},
		])->find($id);
	}
}
