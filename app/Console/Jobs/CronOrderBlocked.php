<?php

namespace App\Console\Jobs;

use App\Model\api\OrderModel;
use DateTime;

class CronOrderBlocked {
	public static function run(array $orderId = null) {
		OrderModel::query()
		->where('full_value', '>', 0)
		->whereNotNull('course_id')
		->whereNull('order_id')
		->whereIn('status', ['BL', 'AP'])
		// ->where('days_delay', '>', 0)
		->whereDoesntHave('orderParcel', function($query) {
			$query->whereNull('payday')->whereRaw('due_date < NOW()');
		})->update([
			'status' => 'AP',
			'days_delay' => 0,
		]);

		$order = OrderModel::query()
			->with(['orderParcel' => function($query) {
				$query->whereNull('payday')->orderBy('due_date');
			}])
			->where('full_value', '>', 0)
			->whereNull('order_id')
			->whereNotNull('course_id')
			->whereIn('status', ['BL', 'AP'])
			->where(function($query) {
				$query->whereHas('formPayment', function($query) {
					$query->whereNull('flg_free');
				})->orWhereHas('course.courseSubcategory', function($query) {
					$query->where('flg', '!=', 'cgr');
				});
			});

		if (is_array($orderId)) {
			$order->whereIn('id', $orderId);
		} else {
			$order->whereHas('orderParcel', function($query) {
				$query->whereNull('payday')->whereRaw('due_date < NOW()');
			});
		}

		$order = $order->get();

		$orderCount =	count($order);
		for ($i = $orderCount - 1; $i > -1 ; $i--) {
			$item = $order[$i];
			$daysDelay = 0;

			if (count($item->orderParcel)) {
				$dueDate = new DateTime($item->orderParcel[0]->getRawOriginal('due_date'));
				$now = new DateTime('now');
				$daysDelay = $dueDate < $now ? $dueDate->diff($now)->days : 0;
			}

			OrderModel::where('id', $item->id)->update([
				'status' => $daysDelay > 30 ? 'BL' : 'AP',
				'days_delay' => $daysDelay,
			]);
		}

		return $orderCount;
	}
}
