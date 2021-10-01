<?php

namespace App\Http\Controllers\StudentArea;

use App\Model\api\CourseDiscountModel;
use Illuminate\Http\Request;
use App\Utils\ConfirmPaymentUtils;
use stdClass;

class ConfirmPaymentController extends _Controller {

	public function confirmPayment(Request $request) {
		$payload = $request->all();
		$opts = new stdClass;

		$confirmPaymentUtils = new ConfirmPaymentUtils($opts);

		$confirmPayment = $confirmPaymentUtils->makeStudentOrder($payload);

		return $confirmPayment;
	}

	public function confirmPayment_(Request $request) {
		try {
			$payload = $request->all();

			if (isset($payload['student_id'])) {
				$studentId = $payload['student_id'];
			} else {
				$studentId = \Illuminate\Support\Facades\Auth::guard('studentArea')->user()->id;
			}

			$opts = new stdClass;

			if (isset($payload['course_id'])) {
				$opts->course_id = $payload['course_id'];
			}

			$confirmPaymentUtils = new ConfirmPaymentUtils($opts);

			if (isset($payload['formPayment']) && is_array($payload['formPayment'])) {
				$return = [];
				$orderId = null;

				for ($i = 0, $ii = count($payload['formPayment']); $i < $ii; $i++) {
					$data = array_merge($payload, $payload['formPayment'][$i]);
					$data['order_id'] = $orderId;

					$confirmPayment = $confirmPaymentUtils->makeStudentOrder($data, $studentId);

					$return[] = $confirmPayment;

					if (is_null($orderId) && isset($confirmPayment['order']) && is_object($confirmPayment['order'])) {
						$orderId = $confirmPayment['order']->id;
					}
				}

			} else {
				$return = $confirmPaymentUtils->makeStudentOrder($payload, $studentId);
			}

			return json_encode($return);
		} catch (\Throwable $th) {
			return $th->getCode() == 999 ? $th->getMessage() : json_encode([
				'showError' => "Code: {$th->getCode()} \n {$th->getMessage()} \n File: {$th->getFile()} \n Line: {$th->getLine()}",
			]);
		}

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
