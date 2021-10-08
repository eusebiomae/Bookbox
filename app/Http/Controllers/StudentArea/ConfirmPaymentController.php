<?php

namespace App\Http\Controllers\StudentArea;

use App\Model\api\CourseDiscountModel;
use App\Model\api\StudentModel;
use Illuminate\Http\Request;
use App\Utils\ConfirmPaymentUtils;
use stdClass;

class ConfirmPaymentController extends _Controller {

	public function confirmPayment(Request $request) {
		$payload = $request->all();
		$opts = new stdClass;

		$confirmPaymentUtils = new ConfirmPaymentUtils($opts);

		try {
			return $confirmPaymentUtils->makeStudentOrder($payload);
		} catch (\Throwable $th) {
			return $th->getMessage();
		}
	}

	public function confirmEmail(Request $request) {
		$client = StudentModel::where('email', $request->get('email'))->first();

		return [
			'valid' => $client ? 1 : 0,
		];
	}

	public function applyDiscount(Request $request) {
		$input = $request->all();

		if (!empty($input['code']) && !empty($input['courseId'])) {
			return CourseDiscountModel::query()
			->select([
				'course_discount.id as course_discount_id',
				'discount.id',
				'discount.code',
				'discount.percentage',
				'discount.value',
			])
			->join('discount', 'discount.id', 'course_discount.discount_id')
			->where('course_discount.course_id', $input['courseId'])
			->where('discount.code', $input['code'])
			->first();
		}

		return null;
	}
}
