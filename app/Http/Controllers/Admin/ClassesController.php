<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\api\ClassesModel;
use App\Utils\StudentClassControlUtils;
use Illuminate\Http\Request;

class ClassesController extends Controller {

	function __construct() {
		$this->pageKey = 'classes';

		$this->apiModel = ClassesModel::class;
		$this->config = (object) [];
	}

	private function getListSelectBox() {
		$list = (object) [];

		return $list;
	}

	public function save(Request $request) {
		$input = $request->get('classes');

		if (empty($input['content_course_id']) && empty($input['avaliation_id'])) {
			return null;
		}

		if ($input['id']) {
			$apiModel = $this->apiModel::find($input['id']);

			if (!$apiModel) {
				$apiModel = new $this->apiModel;
			}
		} else {
			$apiModel = new $this->apiModel;
		}

		$apiModel->fill($input)->save();

		$videoLessons = [];

		if (isset($input['videoLessons'])) {
			for ($i = 0, $ii = count($input['videoLessons']); $i < $ii; $i++) {
				$videoLessons[] = [
					'video_lesson_id' => $input['videoLessons'][$i],
				];
			}
		}

		$apiModel->videoLesson()->sync($videoLessons);

		(new StudentClassControlUtils)->generateByClass($apiModel->class_id);

		if ($request->header('X-CSRF-TOKEN')) {
			return $this->apiModel::query()->with([ 'videoLesson', 'contentCourse', 'avaliation' ])->find($apiModel->id);
		}

		return redirect()->back();
	}

	function delete(Request $request, $id) {
		$withInput = [ 'swal' => null ];

		$data = $this->apiModel::withTrashed()->find($id);

		if (!$data) {
			return response()->json([
				'message' => 'Record not found',
			], 404);
		}

		$classId = $data->class_id;

		$data->delete();

		(new StudentClassControlUtils)->generateByClass($classId);

		if ($request->header('X-CSRF-TOKEN')) {
			return $withInput;
		}

		return redirect()->back()->withInput($withInput);
	}

}
