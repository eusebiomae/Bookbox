<?php

namespace App\Http\Controllers\StudentArea;

use App\Model\api\CourseSupervisionModel;
use App\Model\api\FormPaymentModel;
use App\Model\api\OrderModel;
use App\Model\api\Prospection\ClassModel;
use App\Model\api\Prospection\FileModel;
use App\Model\api\StudentModel;
use App\Utils\StudentClassControlUtils;
use Carbon\Carbon;
use GigaGetData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderController extends _Controller {

	public function listCourse(Request $request) {
		$active = OrderModel::where('student_id', Auth::guard('studentArea')->user()->id)
		->whereNotNull('course_id')
		->whereNull('order_id')
		->with([
			'course',
			'class',
		]);

		$finished = clone $active;

		$active->whereIn('status', ['PE', 'AP', 'TR', 'BL']);
		$finished->whereIn('status', ['CA', 'IN']);

		return view('student_area/order/list')
		->with('title', 'Lista de Cursos')
		->with('listView', 'student_area.components.list_course')
		->with('payload', [
			'active' => $active->get(),
			'finished' => $finished->get(),
		]);
	}

	public function listSupervision(Request $request) {
		/*
		$order = OrderModel::select('order.*')->where('student_id', Auth::guard('studentArea')->user()->id)
		->whereNotNull('supervision_id')
		->whereNull('order_id')
		->with([
			'supervision.teacher',
			'supervision.course',
		])
		->join('course_supervision', 'order.supervision_id', 'course_supervision.id' );

		$orderF = clone($order);

		$order = $order->where('order.status', '!=' ,'FI')->orderBy('course_supervision.date')->get()->toArray();
		$orderF = $orderF->where('order.status','FI')->orderByDesc('course_supervision.date')->get()->toArray();

		foreach ($order as $item) {
			if (isset($item['supervision'])) {
				$item['supervision']['courses'] = CourseSupervisionModel::getCoursesTitle($item['supervision']);
			}
		}
		*/

		// Auth::guard('studentArea')->user()->id;

		$courseCategories = OrderModel::select('course.course_category_id')
		->join('course', 'order.course_id', 'course.id')
		// ->whereNull('order.supervision_id')
		->where([
			['order.student_id', Auth::guard('studentArea')->user()->id],
			['order.status', 'AP'],
		])
		->whereIn('course.course_subcategory_id', [1,2,3])
		->groupBy('course.course_category_id')
		->get()->toArray();

		$courseCategories = array_map(function($item) {
			return $item['course_category_id'];
		}, $courseCategories);

		$supervision = CourseSupervisionModel::with([
			'teacher',
			'courseCategory',
			'order' => function($item) {
				$item->where('student_id', Auth::guard('studentArea')->user()->id);
			},
		])
		->where(function($query) use ($courseCategories) {
			$query->whereIn('course_category_id', $courseCategories);
			$query->orWhere(function($query) {
				$query->whereHas('order', function($query) {
					$query->where('student_id', Auth::guard('studentArea')->user()->id);
					$query->whereNotNull('supervision_id');
				});
			});
		})
		->orderBy('date', 'desc')
		->get()->toArray();

		$payload = array_reduce($supervision, function($carry, $item) {
			$item['order'] = array_shift($item['order']);

			if (Carbon::createFromFormat('d/m/Y', $item['date']) < Carbon::now()) {
				$carry['orderF'][] = $item;
			} else {
				$carry['order'][] = $item;
			}

			return $carry;
		}, [
			'order' => [],
			'orderF' => [],
		]);

		return view('student_area/order/list')
		->with('title', 'Lista de Supervisões')
		->with('listView', 'student_area.components.list_supervision')
		->with('payload', $payload);
	}

	public function newSupervision() {
		$courseSupervision = CourseSupervisionModel::with([
			'courseCategory',
			'teacher',
			'order' => function($query) {
				$query->where('student_id', Auth::guard('studentArea')->user()->id);
			},
		])
		->whereRaw('date >= CURRENT_DATE()')
		->orderBy('date')
		->get();

		$courseCategories = OrderModel::select('course.course_category_id')
		->join('course', 'order.course_id', 'course.id')
		->where([
			['order.student_id', '=', Auth::guard('studentArea')->user()->id],
			['order.supervision_id', '=' , NULL],
			['order.status', '=', 'AP'],
		])
		->whereIn('course.course_subcategory_id', [1,2,3])
		->groupBy('course.course_category_id')
		->get()->toArray();

		$courseCategories = array_map(function($item) {
			return $item['course_category_id'];
		}, $courseCategories);

		return view('student_area.order.newSupervision')
		->with('title', 'Nova de Supervisão')
		->with('courseSupervision', $courseSupervision)
		->with('courseCategories', $courseCategories);
	}

	public function details(Request $request) {
		$order = OrderModel::with([
			'formPayment',
			'supervision.teacher',
			'supervision.course',
			'course.courseCategoryType',
			'orderParcel' => function($query) {
				$query->withTrashed();
			},
		])->find($request->id);

		$files = [];
		$classes = [
			'orientative' => [],
			'module' => [],
		];

		$lastVideoWatched = null;

		if ($order->course) {
			if (in_array($order->status, [ 'AP', 'BL' ]) && $order->days_delay < 90) {
				$order->class = ClassModel::find($order->class_id);

				if ($order->class) {
					$files = DB::select('SELECT f.*, concat(\'/storage/file/\', f.link) AS link
						FROM file f
							INNER JOIN file_content_course fcc ON fcc.file_id = f.id
							INNER JOIN class_content_course ccc ON ccc.content_course_id = fcc.content_course_id
						WHERE ccc.class_id = ?', [ $order->class->id ]);

					// return $files;
					foreach ($files as &$file) {
						$file->icon = FileModel::getIcon($file->extension);
					}

					$classesModel = GigaGetData::getStudentClasses((object) [
						'keyId' => 'class_id',
						'id' => $order->class_id,
						'orderId' => $order->id,
					]);

					foreach ($classesModel as $valClasses) {
						$classes[$valClasses->orientative == 'yes' ? 'orientative' : 'module'][] = $valClasses;
					}

				}
			}

			if (count($classes['module'])) {
				for ($i = count($classes['module']) - 1; $i > -1; $i--) {
					$module = $classes['module'][$i];

					foreach ($module->videoLesson as &$videoLesson) {
						if ($videoLesson->historicVideo) {
							$lastVideoWatched = [
								'classes' => $module,
								'videoLesson' => $videoLesson,
							];
						} else {
							break;
						}
					}

					if ($lastVideoWatched) {
						break;
					}
				}

				$lastVideoWatched = null;

				if (!$lastVideoWatched) {
					$module = $classes['module'][0];

					$lastVideoWatched = [
						'classes' => $module,
						'videoLesson' => $module->videoLesson[0] ?? null,
					];
				}
			}
		}

		return view('student_area/order/' . ($order->supervision ? 'supervisionDetails' : 'courseDetails'))
		->with('title', 'Detalhes')
		->with('order', $order)
		->with('classes', $classes)
		->with('files', $files)
		->with('lastVideoWatched', $lastVideoWatched);
	}

	public function makeSupervision(Request $request, $id) {
		$formPayment = FormPaymentModel::where('flg_type', 'card')->first();

		$order = new OrderModel;

		$order->fill([
			'student_id' => \Illuminate\Support\Facades\Auth::guard('studentArea')->user()->id,
			'status' => 'AP',
			'status_cash' => 'Gratuito',
			'supervision_id' => $id,
			'value' => 0,
			'full_value' => 0,
			'number_parcel' => 1,
			'form_payment_id' => $formPayment->id,
			'form_payment' => $formPayment->flg_type,
			'code' => base_convert(time() . mt_rand(0, 0xfff), 10, 36),
		])->save();

		return redirect('/student_area/order/supervision');
	}

	public function toSave(Request $request) {
		$last_video = $request->all();

		$user = StudentModel::where('id', Auth::guard('studentArea')->user()->id)->first();

		$user->fill($last_video)->save();

		return redirect()->back();
	}

	public function getModuleClasses($orderId, $classesId) {
		return GigaGetData::renderModuleClasses((object) [
			'keyId' => 'id',
			'id' => $classesId,
			'orderId' => $orderId,
		]);
	}

	public function getNextClassesRelease($orderId, $classesId = null) {
		$studentClassControl = StudentClassControlUtils::nextRelease($orderId, $classesId);

		if (is_null($studentClassControl) || !count($studentClassControl)) {
			return null;
		}

		return $this->getModuleClasses($orderId, array_map(function (&$item) {
			return $item->classes_id;
		}, $studentClassControl));
	}
}
