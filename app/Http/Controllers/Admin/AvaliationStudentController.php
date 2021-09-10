<?php

namespace App\Http\Controllers\Admin;

use App\Model\api\AvaliationQuestionModel;
use App\Model\api\OrderModel;
use App\Model\api\AvaliationStudentControlModel;
use App\Model\api\AvaliationStudentModel;
use App\Model\api\ClassesModel;
use App\Model\api\ScholarshipStudentModel;
use App\Utils\StudentClassControlUtils;
use GigaGetData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AvaliationStudentController extends \App\Http\Controllers\Controller
{

	function __construct()
	{
		$this->pageKey = 'avaliationStudent';
	}

	public function list()
	{
		return view('admin.avaliationStudent.list');
	}

	public function getList(Request $request)
	{
		if ($request->get('class')) {
			$class = $request->get('class');

			return OrderModel::query()
				// ->whereHas('avaliationStudent')
				->with([
					'student',
					'class',
				])->whereNull('order_id')->where('class_id', $class)
				->whereIn('status', ['AP', 'BL'])
				->get();
		}

		return [];
	}

	public function form($idOrder)
	{
		$fnQueryAvaliationQuestion = function ($query) {
			$query->with([
				'question.alternative' => function ($query) {
					$query->where('flg_correct', 1);
				},
			]);
		};

		$order = OrderModel::with([
			'student',
			'course.courseCategoryType',
			'course.courseCategory',
			'course.courseSubcategory',
			'class.classes' => function ($query) use ($fnQueryAvaliationQuestion, $idOrder) {
				$query
					->whereHas('avaliation.avaliationStudent', function ($query) use ($idOrder) {
						$query->where('order_id', $idOrder);
					})
					->with([
						'avaliation' => function ($query) use ($idOrder, $fnQueryAvaliationQuestion) {
							$query->with([
								'avaliationStudent' => function($query) use ($idOrder) {
									$query->whereNull('question_id')->where('order_id', $idOrder);
								},
								'avaliationQuestion' => $fnQueryAvaliationQuestion,
								'recuperation' => function($query) use ($fnQueryAvaliationQuestion) {
									$query->with([
										'avaliationQuestion' => $fnQueryAvaliationQuestion,
									]);
								}
							]);
						},
					])
					->orderBy('start_date')
					->orderBy('sequence')
					->orderBy('id');
			},
		])->find($idOrder)->toArray();

		$fnAvaliationQuestion = function(&$classesAvaliationQuestion) use ($idOrder) {
			foreach ($classesAvaliationQuestion as &$avaliationQuestion) {
				$avaliationQuestion['avaliation_student'] = AvaliationStudentModel::with([
					'alternative',
				])->where([
					'order_id' => $idOrder,
					'avaliation_id' => $avaliationQuestion['avaliation_id'],
					'question_id' => $avaliationQuestion['question_id'],
				])->get();
			}
		};

		foreach ($order['class']['classes'] as &$classes) {
			if (count($classes['avaliation']['avaliation_question'] ?? [])) {
				$fnAvaliationQuestion($classes['avaliation']['avaliation_question']);
			}

			if (count($classes['avaliation']['recuperation']['avaliation_question'] ?? [])) {
				$fnAvaliationQuestion($classes['avaliation']['recuperation']['avaliation_question']);
			}
		}

		return view('admin.avaliationStudent.form')
			->with('payload', [
				'order' => $order,
			])
			->with('fieldPageConfig', GigaGetData::fieldPageConfig($this->pageKey));
	}

	public function save(Request $request)
	{
		if ($request->get('id')) {
			$avaliationStudentModel = AvaliationStudentModel::find($request->get('id'));
		} else {
			$avaliationStudentModel = new AvaliationStudentModel;
		}

		$avaliationStudentModel->fill($request->all())->save();

		if($request->get('scholarship_student_id')){
			$student_id = $request->get('student_id');
			$newScore = 0;

			$scholarshipStudent = ScholarshipStudentModel::with([
				'scholarship.avaliation.avaliationStudent' => function($query) use ($student_id){
					$query->where('student_id', $student_id);
				},
			])->find($request->get('scholarship_student_id'));

			$avaliationStudent = $scholarshipStudent->scholarship->avaliation->avaliationStudent;

			for($i = 0; $i < count($avaliationStudent); $i++){
				$newScore += $avaliationStudent[$i]->score;
			}

			$scholarshipStudent->fill(['proficiency_note' => $newScore])->save();

			return redirect()->back();
		}else{
			StudentClassControlUtils::nextRelease($avaliationStudentModel->order_id, $avaliationStudentModel->classes_id);
			return $avaliationStudentModel;
		}
	}

	public function getEvaluationNotDone(Request $request)
	{
		$idOrder = $request->get('idOrder');
		$idClass = $request->get('idClass');

		return ClassesModel::where('class_id', $idClass)
			->with([
				'avaliation'
			])
			->whereHas('avaliation')
			->whereDoesntHave('avaliation.avaliationStudent', function ($query) use ($idOrder) {
				$query->where('order_id', $idOrder);
			})
			->orderBy('start_date')
			->orderBy('sequence')
			->orderBy('id')
			->get();
	}
}
