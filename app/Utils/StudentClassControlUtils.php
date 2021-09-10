<?php

namespace App\Utils;

use App\Model\api\ClassesModel;
use App\Model\api\OrderModel;
use App\Model\api\Prospection\ClassModel;
use App\Model\api\StudentClassControlModel;
use GigaGetData;
use Illuminate\Support\Facades\DB;

class StudentClassControlUtils
{

	public function generateByOrder($idOrder)
	{
		$order = OrderModel::with([
			'course.courseCategoryType',
			'class.classes' => function ($query) {
				$query->orderBy('start_date')->orderBy('sequence')->orderBy('id')->get();
			},
		])->find($idOrder);

		if ($order->status != 'AP' || !$order->course) {
			return $order->id;
		}

		if (empty($order->register_date)) {
			$order->register_date = date('Y-m-d');
		}

		if (is_null($order->repetition)) {
			$order->repetition = empty($order->class->repetition) ? 7 : $order->class->repetition;
		}

		if (is_null($order->permanence)) {
			$order->permanence = empty($order->class->permanence) ? 60 : $order->class->permanence;
		}

		if (is_null($order->permanence_all)) {
			$order->permanence_all = $order->class->permanence_all;
		}

		$order->save();

		if ($order->course->courseCategoryType->flg == 'ead') {
			return $this->fnPopulateEad($order);
		} else {
			return $this->fnPopulatePresential($order);
		}
	}

	private function fnPopulateEad($order)
	{
		$repetition = $order->repetition;
		$permanence = $order->permanence;
		$permanenceAll = $order->permanence_all;
		$startDate = $order->getRawOriginal('register_date');

		if (empty($startDate)) {
			$startDate = date('Y-m-d', strtotime('now'));
		}

		$endDate = empty($permanenceAll) ? null : date('Y-m-d', strtotime("+{$permanence} day", strtotime($startDate)));
		$nowDateTime = strtotime('now');

		foreach ($order->class->classes as $classes) {
			$studentClassControl = StudentClassControlModel::where('order_id', $order->id)->where('classes_id', $classes->id)->first();
			if ($classes->orientative == 'yes') {
				$fillData = [
					'start_date' => null,
					'end_date' => null,
					'status' => '1',
				];
			} else {
				$startDateTime = strtotime($startDate);
				$endDateTime = empty($permanenceAll) ? strtotime("+{$permanence} day", $startDateTime) : strtotime($endDate);

				$status = null;
				if ($studentClassControl) {
					$status = $studentClassControl->status;
				}

				$fillData = [
					'start_date' => $startDate,
					'end_date' => date('Y-m-d', $endDateTime),
					'status' => $status == '1' ? '1' : (($nowDateTime >= $startDateTime && $nowDateTime <= $endDateTime) ? '1' : null),
				];

				$startDate = date('Y-m-d', strtotime("+{$repetition} day", $startDateTime));
			}

			if ($studentClassControl) {
				$studentClassControl->fill(array_merge($fillData, [
					'course_id' => $classes->course_id,
					'class_id' => $classes->class_id,
					'content_course_id' => $classes->content_course_id,
				]))->save();
			} else {
				(new StudentClassControlModel)->fill(array_merge($fillData, [
					'order_id' => $order->id,
					'student_id' => $order->student_id,
					'classes_id' => $classes->id,
					'course_id' => $classes->course_id,
					'class_id' => $classes->class_id,
					'content_course_id' => $classes->content_course_id,
				]))->save();
			}
		}

		return $order;
	}

	private function fnPopulatePresential($order)
	{
		$endDate = $order->class->getRawOriginal('end_date');
		$nowDateTime = strtotime('now');
		$endDateTimeClass = strtotime("+60 day", strtotime($endDate));

		foreach ($order->class->classes as $classes) {
			$studentClassControl = StudentClassControlModel::where('order_id', $order->id)->where('classes_id', $classes->id)->first();

			if ($classes->orientative == 'yes') {
				$fillData = [
					'start_date' => null,
					'end_date' => null,
					'status' => '1',
				];
			} else {
				$startDate = $classes->getRawOriginal('start_date');

				if (empty($startDate)) {
					$startDate = date('Y-m-d');
				}

				$startDateTime = strtotime("-7 day", strtotime($startDate));

				// if ($classes->end_date) {
				// 	$endDateTime = strtotime("+60 day", strtotime($classes->getRawOriginal('end_date')));
				// } else {
				$endDateTime = $endDateTimeClass;
				// }

				$status = null;
				if ($studentClassControl) {
					$status = $studentClassControl->status;
				}

				$fillData = [
					'start_date' => date('Y-m-d', $startDateTime),
					'end_date' => date('Y-m-d', $endDateTime),
					'status' => $status == '1' ? '1' : (($nowDateTime >= $startDateTime && $nowDateTime <= $endDateTime) ? '1' : null),
				];
			}

			if ($studentClassControl) {
				$studentClassControl->fill(array_merge($fillData, [
					'course_id' => $classes->course_id,
					'class_id' => $classes->class_id,
					'content_course_id' => $classes->content_course_id,
				]))->save();
			} else {
				(new StudentClassControlModel)->fill(array_merge($fillData, [
					'order_id' => $order->id,
					'student_id' => $order->student_id,
					'classes_id' => $classes->id,
					'course_id' => $classes->course_id,
					'class_id' => $classes->class_id,
					'content_course_id' => $classes->content_course_id,
				]))->save();
			}
		}

		return $order;
	}

	public function generateByClass($idClass) {
		$classModel = ClassModel::find($idClass);

		if ($classModel) {
			$classesModel = ClassesModel::where('class_id', $idClass)->get();

			foreach ($classesModel as $classes) {
				StudentClassControlModel::where('classes_id', $classes->id)->update([
					'content_course_id' => $classes->content_course_id > 0 ? $classes->content_course_id : null,
					'avaliation_id' => $classes->avaliation_id > 0 ? $classes->avaliation_id : null,
				]);
			}

			$orderModel = OrderModel::with([
				'course.courseCategoryType',
				'class.classes' => function ($query) {
					$query->orderBy('start_date')->orderBy('sequence')->orderBy('id')->get();
				},
			])
				->whereHas('course')
				->whereIn('status', [ 'AP', 'BL' ])
				->where('class_id', $idClass)->get();

			foreach ($orderModel as $order) {
				$dataOrder = [
					'permanence' => $classModel->permanence,
					'permanence_all' => $classModel->permanence_all,
				];

				if (!$order->repetition > 0) {
					$dataOrder['repetition'] = $classModel->repetition;
				}

				$order->fill($dataOrder)->save();

				try {
					if ($order->course->courseCategoryType->flg == 'ead') {
						$this->fnPopulateEad($order);
					} else {
						$this->fnPopulatePresential($order);
					}
				} catch (\Exception $exc) {
					print_r([
						$exc->getMessage(),
						$exc->getCode(),
						$exc->getFile(),
						$exc->getLine(),
					]);

					die(json_encode($order));
				}
			}

			return $orderModel;
		}

		return null;
	}

	static public function cronValidDate(array $orderId = null)
	{
		$studentClassControlModel = StudentClassControlModel::query()
			->whereNull('status')
			->whereNotNull('start_date')
			->whereHas('order', function ($query) {
				$query->whereIn('status', ['AP', 'BL']);
				$query->where('days_delay', '<', 30);
			});

		if (is_array($orderId)) {
			$studentClassControlModel->whereIn('order_id', $orderId);
		}

		$studentClassControl = $studentClassControlModel->get();

		$nowDateTime = strtotime('now');

		foreach ($studentClassControl as $item) {
			$startDateTime = strtotime($item->getRawOriginal('start_date'));
			$endDateTime = strtotime($item->getRawOriginal('end_date'));

			$status = ($nowDateTime >= $startDateTime && $nowDateTime <= $endDateTime) ? '1' : null;

			if ($status) {
				$item->fill([
					'status' => $status,
				])->save();
			}
		}

		return $studentClassControl;
	}

	static public function nextRelease($orderId, $classesId)
	{
		$whereClasses = $classesId ? "AND classes_id = {$classesId}" : '';

		$sccLast = current(DB::select("SELECT *
		FROM student_class_control scc_last
		WHERE status = 1
			AND order_id = {$orderId}
			{$whereClasses}
		ORDER BY start_date DESC
		LIMIT 1"));

		if ($sccLast->avaliation_id) {
			$avaliationStudent = DB::select("SELECT * FROM avaliation_student WHERE right_wrong = 1 AND order_id = {$sccLast->order_id} AND classes_id = {$sccLast->classes_id}");

			$average = 0;

			foreach ($avaliationStudent as &$avaliation) {
				$average += $avaliation->score;
			}

			if ($average < GigaGetData::getConfigApp()->average) {
				return null;
			}
		}

		$sql = "SELECT *
			FROM student_class_control scc
			INNER JOIN (
				SELECT scc1.order_id, scc1.start_date
				FROM student_class_control scc1
				WHERE order_id = {$orderId}
					AND scc1.start_date > '{$sccLast->start_date}'
				ORDER BY scc1.start_date
				LIMIT 1
			) scc2 ON scc2.order_id = scc.order_id AND scc2.start_date = scc.start_date";

		$studentClassControl = DB::select($sql);

		foreach ($studentClassControl as &$studentClassControlItem) {
			DB::update('UPDATE student_class_control SET status = 1 WHERE ID = ?', [ $studentClassControlItem->id ]);
		}

		return $studentClassControl;
	}

}
