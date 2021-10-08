<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Model\api\Content;
use App\Model\api\StudentAddressModel;
use App\Model\api\StudentModel;
use Illuminate\Support\Facades\Hash;

class ApiSaveController extends Controller {

	public function contentCourse(Request $request) {
		$model = new \App\Model\api\Prospection\ContentCourseModel;

		if (!empty($request->file('fileImage'))) {
			$fileName = formatNameFile($request->file('fileImage')->getClientOriginalName());

			$request->file('fileImage')->move('storage/contentCourse', $fileName);
			$request['img'] = $fileName;
		}

		if ($request->get('id')) {
			$model->find($request->get('id'));
		}

		$model->fill($request->all())->save();

		return $model;
	}

	public function city(Request $request) {
		$model = new \App\Model\api\Configuration\CityModel;

		if ($request->get('id')) {
			$model->find($request->get('id'));
		}

		$model->fill($request->all())->save();

		return $model;
	}

	public function place(Request $request) {
		$model = new \App\Model\api\PlaceModel;

		if ($request->get('id')) {
			$model->find($request->get('id'));
		}

		$model->fill($request->all())->save();

		return $model;
	}

	public function team(Request $request) {
		$model = new \App\Model\api\TeamModel;

		if (!empty($request->file('fileImage'))) {
			$fileName = formatNameFile($request->file('fileImage')->getClientOriginalName());

			$request->file('fileImage')->move('storage/team', $fileName);
			$request['image'] = $fileName;
		}

		if ($request->get('id')) {
			$model->find($request->get('id'));
		}

		$model->fill($request->all())->save();

		return $model;
	}

	public function courseCategory(Request $request) {
		$model = new \App\Model\api\Prospection\CourseCategoryModel;

		if (!empty($request->file('fileImage'))) {
			$fileName = formatNameFile($request->file('fileImage')->getClientOriginalName());

			$request->file('fileImage')->move('storage/course_category', $fileName);
			$request['image'] = $fileName;
		}

		if ($request->get('id')) {
			$model->find($request->get('id'));
		}

		$model->fill($request->all())->save();

		return $model;
	}

	public function bonusCourse(Request $request) {
		$model = new \App\Model\api\Prospection\BonusCourseModel;

		if (!empty($request->file('fileImage'))) {
			$fileName = formatNameFile($request->file('fileImage')->getClientOriginalName());

			$request->file('fileImage')->move('storage/bonusCourse', $fileName);
			$request['img'] = $fileName;
		}

		if ($request->get('id')) {
			$model->find($request->get('id'));
		}

		$model->fill($request->all())->save();

		return $model;
	}

	public function formPayment(Request $request) {
		$model = new \App\Model\api\FormPaymentModel;

		if ($request->get('id')) {
			$model->find($request->get('id'));
		}

		$model->fill($request->all())->save();

		return $model;
	}

	public function student(Request $request) {
		if (!$request->has('email')) {
			return null;
		}

		$input = $request->all();

		$studentModel = StudentModel::where('email', $input['email'])->first();

		if (!$studentModel) {
			$studentModel = new StudentModel;
		}

		if ($request->has('password')) {
			$input['password'] = Hash::make($input['password']);
		}

		$studentModel->fill($input)->save();

		return $studentModel;
	}

	public function delivery(Request $request) {
		if (!$request->has('student_id')) {
			return null;
		}

		$studentAddressModel = StudentAddressModel::where('student_id', $request->get('student_id'))->first();

		if (!$studentAddressModel) {
			$studentAddressModel = new StudentAddressModel;
		}

		$studentAddressModel->fill($request->all())->save();

		return $studentAddressModel;
	}

}
