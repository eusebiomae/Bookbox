<?php

namespace App\Http\Controllers\StudentArea;

use Illuminate\Support\Facades\Auth;
use App\Model\api\Configuration\StateModel;
use App\Model\api\PointsSocioeconomicModel;
use App\Model\api\ScholarshipModel;
use App\Model\api\ScholarshipStudentModel;
use App\Model\api\StudentModel;
use App\Model\api\StudentSocioeconomicModel;
use App\Model\ParametersAppModel;
use Illuminate\Http\Request;
use stdClass;

class AccountDataController extends _Controller
{
	public function index()
	{
		return view('student_area/account_data/index')
			->with('payload', [
				'student' => StudentModel::find(Auth::guard('studentArea')->user()->id),
				'states' => StateModel::orderBy('abbreviation')->get(),
			]);
	}

	public function toSave(Request $request)
	{
		$this->saveData($request);

		return redirect()->back();
	}

	public function saveData(Request $request)
	{
		$input = $request->all();

		if (isset($input['password']) && !empty($input['password'])) {
			$input['password'] = \Illuminate\Support\Facades\Hash::make($input['password']);
		} else {
			unset($input['password']);
		}

		if (!empty($request->file('fileImage'))) {
			$fileName = formatNameFile($request->file('fileImage')->getClientOriginalName());

			$request->file('fileImage')->move('storage/student', $fileName);
			$input['image'] = $fileName;
		}

		$input['cpf'] = preg_replace('/\D/', '', $input['cpf']);
		$hasCPF = StudentModel::where('cpf', $input['cpf'])->orWhere('email', $input['email'])->first();

		$data = new StudentModel;

		if ($hasCPF) {
			if (isset($input['id']) && !empty($input['id'])) {
				$data = StudentModel::find($input['id']);

				if ($hasCPF->id != $input['id']) {
					unset($input['cpf']);
					unset($input['email']);
				}
			} else {
				$data = $hasCPF;
			}
		} else
		if (isset($input['id']) && !empty($input['id'])) {
			$data = StudentModel::find($input['id']);
		}

		if (!isset($input['tcc_experience'])) {
			$input['tcc_experience'] = null;
		}

		$scholarship_id = isset($input['scholarship_id']) ? $input['scholarship_id'] : null;

		$data->fill($input)->save();

		if ($scholarship_id) {
			$scholarshipStudent = ScholarshipStudentModel::where('scholarship_id', $scholarship_id)->where('student_id', $data->id)->first();

			if (!$scholarshipStudent) {
				$scholarshipStudent = new ScholarshipStudentModel;
			}

			$scholarshipStudent->fill([
				'scholarship_id' => $scholarship_id,
				'scholarship_student_status_id' => 3,
				'student_id' => $data->id,
			])->save();
		}

		$data = StudentModel::query()->find($data->id)->makeVisible(['password']);

		if (!$data->password) {
			$data->password = \Illuminate\Support\Facades\Hash::make($data->cpf);
			$data->save();
		}

		return $data;
	}

	public function loginRegister(Request $request)
	{
		$credentials = [];
		if ($request->get('identification')) {
			$key = preg_match('/@/', $request['identification']) ? 'email' : 'cpf';

			$student = StudentModel::where($key, $request['identification'])->first();

			if ($student) {
				$credentials[$key] = $request['identification'];
				$credentials['password'] = $request['password'];

				return Auth::guard('studentArea')->attempt($credentials, true) ? Auth::guard('studentArea')->user() : ['codeRequest' => '_345'];
			} else {
				return ['codeRequest' => '_345'];
			}
		} else {
			$cpf = preg_replace('/\D/', '', $request['cpf']);

			$student = StudentModel::where('email', $request['email'])->orWhere('cpf', $cpf)->first();

			if ($student) {
				$credentials['email'] = $request['email'];
				$credentials['password'] = $request['password'];

				if (Auth::guard('studentArea')->attempt($credentials, true)) {
					return Auth::guard('studentArea')->user();
				} else
				if (Auth::guard('studentArea')->attempt(['email' => $request['email'], 'password' => $cpf], true)) {
					$student->update(['password' => \Illuminate\Support\Facades\Hash::make($request->password)]);
					return Auth::guard('studentArea')->user();
				} else {
					return ['codeRequest' => '_335'];
				}
			} else {
				$credentials['email'] = $request['email'];
				$credentials['password'] = $request['password'];

				$request['password'] = \Illuminate\Support\Facades\Hash::make($request->password);
				parent::save($request->all(), StudentModel::class);

				return Auth::guard('studentArea')->attempt($credentials, true) ? Auth::guard('studentArea')->user() : ['codeRequest' => '_300'];
			}
		}
	}

	public function saveStudentSocioeconomic(Request $request)
	{
		$input = $request->all();

		if (!isset($input['student_id']) || empty($input['student_id'])) {
			$input['student_id'] = Auth::guard('studentArea')->user()->id;
		}

		$studentSocioeconomic = StudentSocioeconomicModel::where('student_id', $input['student_id'])->first();

		if (empty($studentSocioeconomic)) {
			$studentSocioeconomic = new StudentSocioeconomicModel();
		}

		$studentSocioeconomic->fill($input)->save();

		$scholarshipStudent = ScholarshipStudentModel::where([
			'student_id' => $input['student_id'],
			'scholarship_id' => $input['scholarship_id']
		])->first();

		if ($scholarshipStudent) {
			$scholarshipStudent->fill(['student_socioeconomic_id' => $studentSocioeconomic->id])->save();

			$this->calcPointSocioeconomic($scholarshipStudent->id);
		}

		if ($request->header('X-CSRF-TOKEN')) {
			return $studentSocioeconomic;
		}

		return redirect()->back();
	}

	public function getStudentSocioeconomic($studentId) {
		return StudentSocioeconomicModel::where('student_id', $studentId)->first() ?? '{}';
	}

	public function calcPointSocioeconomic(int $scholarshipStudentId) {
		$point = 0;

		$scholarshipStudent = ScholarshipStudentModel::find($scholarshipStudentId);
		$studentSocioeconomic = StudentSocioeconomicModel::find($scholarshipStudent->student_socioeconomic_id)->toArray();
		$pointsSocioeconomic = PointsSocioeconomicModel::get();
		$pointsSocioeconomicMapping = [];
		$minimumWage = ParametersAppModel::first()->minimum_wage;

		foreach ($pointsSocioeconomic as $item) {
			if ($item->selected_value) {
				$pointsSocioeconomicMapping[$item->column_name][$item->selected_value] = $item->points;
			} else {
				$pointsSocioeconomicMapping[$item->column_name] = $item->expression ?? $item->points;
			}
		}

		foreach ($pointsSocioeconomicMapping as $key => $pointsSocioeconomicValue) {
			$columns = explode(';', $key);
			$val = 0;

			foreach ($columns as $column) {
				$val += $studentSocioeconomic[$column] ?? 0;
			}

			if (is_array($pointsSocioeconomicValue)) {
				$point += $pointsSocioeconomicValue[$val];
			} else
			if (is_numeric($pointsSocioeconomicValue)) {
				$point += $pointsSocioeconomicValue;
			} else
			if (is_string($pointsSocioeconomicValue)) {
				$expressions = explode(';', $pointsSocioeconomicValue);

				foreach ($expressions as &$expression) {
					preg_match('/(==|<>|!=|<=|>=|<|>)(\d+)=(\d+)/', $expression, $matches);

					if (count($matches)) {
						if ($key == 'salary') {
							$matches[2] = $matches[2] * $minimumWage;
						}

						if (eval("return {$val} {$matches[1]} {$matches[2]};")) {
							$point += $matches[3];
							break;
						}

					}
				}

			}
		}

		$scholarshipStudent->fill(['socio_economic_note' => $point ])->save();
	}
}
