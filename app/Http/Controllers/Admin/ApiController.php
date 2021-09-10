<?php

namespace App\Http\Controllers\Admin;

use App\Model\api\OrderModel;
use App\Model\api\StudentModel;
use Illuminate\Http\Request;

class ApiController extends \App\Http\Controllers\Controller {
	function __construct() {
		$this->pageKey = 'api';
	}

	public function student(Request $request, $id = null) {
		if ($id) {
			return StudentModel::find($id);
		}

		$studentModel = StudentModel::select([ 'id', 'cpf', 'email', 'name', ]);

		if ($request->get('q')) {
			$like = "%{$request->get('q')}%";

			$studentModel->orWhere('cpf', 'like', $like);
			$studentModel->orWhere('email', 'like', $like);
			$studentModel->orWhere('name', 'like', $like);
		}

		return $studentModel->orderBy('name')->limit(100)->get();
	}

	public function studentResources($student, $resource) {
		return ([
			'order' => function() use ($student) {
				return OrderModel::where('student_id', $student)
				->whereHas('course')
				->with([
					'course.courseCategory',
					'course.courseCategoryType',
					'course.courseSubcategory',
					'class'
				])->get();
			},
		])[$resource]();
	}

}
