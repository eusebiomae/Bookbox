<?php

namespace App\Http\Controllers\StudentArea;

use App\Model\api\AvaliationModel;
use App\Model\api\AvaliationStudentModel;
use App\Model\api\ScholarshipModel;
use App\Model\api\ScholarshipStudentModel;
use Illuminate\Support\Facades\Auth;

class ScholarshipController extends _Controller
{
	public function index()
	{
		$studentId = Auth::guard('studentArea')->user()->id;

		$openScholarships = ScholarshipModel::with([
			'scholarshipDiscount' => function ($query) {
				$query->orderBy('discount_percentage', 'desc');
			},
			'courseCategory',
			'courseCategoryType',
			'courseSubcategory',
			'scholarshipStudent' => function($query) use ($studentId) {
				$query->where('student_id', $studentId);
			},
			'avaliation.avaliationStudent' => function($query) use ($studentId) {
				$query->where('student_id', $studentId);
			},
		])
			->whereHas('scholarshipStudent', function ($query) use ($studentId){
				$query->where('student_id', $studentId);
			})
			->orderBy('registration_deadline_second_call', 'desc');

		$closedScholarships = clone $openScholarships;

		$now = date('Y-m-d');
		$openScholarships->whereRaw("IFNULL(registration_deadline_second_call, now()) >= '{$now}'");
		$closedScholarships->whereRaw("IFNULL(registration_deadline_second_call, now()) < '{$now}'");

		// return $openScholarships->toSql();
		return view('student_area/scholarship/content')
			->with('title', 'Lista de Bolsas de Estudos')
			->with('view', 'student_area.components.list_scholarship')
			->with('payload', [
				'openScholarships' => $openScholarships->get(),
				'closedScholarships' => $closedScholarships->get(),
			]);
	}

	public function proofProficiency($id)
	{
		$scholarship = ScholarshipModel::with('avaliation', 'avaliation.question')->first();
		$avaliationStudent = AvaliationStudentModel::where('avaliation_id', $id)->where('student_id', Auth::guard('studentArea')->user()->id)->get();

		return view('student_area/scholarship/content')
			->with('title', 'Prova de Proficiência')
			->with('view', 'student_area.avaliation.index')
			->with('payload', [
				'avaliation_id' => $id,
				'student_id' => Auth::guard('studentArea')->user()->id,
				'scholarship' => $scholarship,
				'avaliation_student' => count($avaliationStudent),
			]);
	}

	public function viewProofProficiency($avaliation_id)
	{
		$student_id = Auth::guard('studentArea')->user()->id;

		return view('student_area/scholarship/content')
			->with('title', 'Ver Prova de Proficiência')
			->with('view', '')
			->with('payload', [
				'avaliation_id' => $avaliation_id,
				'student_id' => $student_id,
			]);
	}

	public function classification($scholarship_id)
	{
		$student_id = Auth::guard('studentArea')->user()->id;
		$scholarshipStudent = ScholarshipStudentModel::with('scholarshipStudentStatus', 'scholarship')->where('scholarship_id', $scholarship_id)->where('student_id', $student_id)->first();

		return view('student_area/scholarship/content')
			->with('title', 'Classificação')
			->with('view', 'student_area.components.classification')
			->with('payload', [
				'scholarshipStudent' => $scholarshipStudent,
			]);
	}
}
