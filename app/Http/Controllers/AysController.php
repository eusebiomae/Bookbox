<?php

namespace App\Http\Controllers;

use App\Model\api\OrderModel;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class AysController extends Controller {

	public function firstStudentClassControlEAD(Request $request) {
		$orderList = OrderModel::query()
		->whereHas('course', function($query) {
			$query->where('course_category_type_id', 3);
		})
		->whereIn('status', [ 'AP', 'BL' ])
		->with([
			'studentClassControl' => function($query) {
				$query
				->whereNull('orientative')
				->whereNotNull('start_date')
				->orderBy('start_date');
			},
		])
		->get();

		foreach ($orderList as $order) {
			if (count($order->studentClassControl)) {
				try {
					$order->studentClassControl[0]->fill([
						'status' => 1
					])->save();
				} catch (\Throwable $th) {
					print_r($order->toArray());
				}
			}
		}

		return count($orderList);
	}

}
