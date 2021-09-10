<?php

namespace App\Console\Jobs;

use App\Model\api\CourseSupervisionModel;
use App\Model\api\OrderModel;

class CronSupervision {
	public static function run() {
		$supervisions = CourseSupervisionModel::where('status', 'A')->get();

		$dataResult = [];

		foreach ($supervisions as $supervision) {
			try {

				if (strtotime(formatDateEng($supervision['date'])) < strtotime('now')) {
					$supervision->fill([ 'status' => 'I' ])->save();

					$dataResult[$supervision->id] = OrderModel::where('supervision_id', $supervision->id)->where('status', 'AP')->update([
						'status' => 'FI',
					]);
				}

			} catch (\Throwable $th) {
				$dataResult[$supervision->id] = [
					'message' => $th->getMessage(),
					'file' => $th->getFile(),
					'line' => $th->getLine(),
				];
			}
		}

		return $dataResult;
	}
}
