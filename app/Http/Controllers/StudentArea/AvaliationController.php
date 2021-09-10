<?php

namespace App\Http\Controllers\StudentArea;

use App\Model\api\AlternativeModel;
use App\Model\api\AvaliationModel;
use App\Model\api\AvaliationQuestionModel;
use App\Model\api\AvaliationStudentModel;
use App\Model\api\ScholarshipModel;
use App\Model\api\ScholarshipStudentModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AvaliationController extends _Controller
{

	public function get($avaliationId) {
		$avaliation = AvaliationModel::with([
			'category',
			'question' => function ($query) {
				$query->with('alternative')->orderBy('id');
			},
		])->find($avaliationId);

		$duration = explode(':', $avaliation->duration);

		$avaliation->duration_time = ($duration[0] * 3600) + ($duration[1] * 60);

		return [
			'avaliation' => $avaliation,
		];
	}

	/*public function avaliation(Request $request) {
		$avaliationData = \GigaGetData::avaliationData();
		$avaliationStudent = null;

		$avaliation = AvaliationModel::with([
			'category',
			'question.alternative',
		])->find($avaliationData->avaliationId);

		if (is_null($avaliation)) {
			return redirect('student_area');
		}

		$duration = explode(':', $avaliation->duration);

		$avaliation->duration_time = ($duration[0] * 3600) + ($duration[1] * 60);

		if (is_null($avaliationData->startAvaliation)) {
			(OrderModel::find($avaliationData->orderId))->fill([ 'start_avaliation' => now() ])->save();
		} else {
			$startAvaliation = new DateTime($avaliationData->startAvaliation);
			$startAvaliationDiff = $startAvaliation->diff(new DateTime(now()));

			$diffInSeconds = 0;
			$diffInSeconds += $startAvaliationDiff->h * 3600;
			$diffInSeconds += $startAvaliationDiff->i * 60;
			$diffInSeconds += $startAvaliationDiff->s;

			$avaliation->duration_time -= $diffInSeconds;

			$avaliationStudent = AvaliationStudentModel::query()
				->where('student_id', $avaliationData->studentId)
				->where('order_id', $avaliationData->orderId)
				->where('avaliation_id', $avaliationData->avaliationId)
				->get();
		}

		return view('student_area/avaliation/index', [
			'avaliation' => $avaliation,
			'avaliationStudent' => $avaliationStudent,
		]);
	}*/

	public function finalize(Request $request) {
		$input = $request->all();

		if ($request->file('avaliation_file')) {
			$avaliationFileAll = [];
			foreach ($request->file('avaliation_file') as &$avaliationFile) {
				$avaliationStudentModel = new AvaliationStudentModel;

				$avaliationFilePath = $avaliationFile->store("avaliation_file/{$input['order_id']}/{$input['avaliation_id']}");

				$avaliationStudentModel->fill([
					'order_id' => $input['order_id'],
					'student_id' => $input['student_id'],
					'avaliation_id' => $input['avaliation_id'],
					'classes_id' => $input['classes_id'],
					'avaliation_file' => "/{$avaliationFilePath}",
				])->save();

				$avaliationFileAll[] = $avaliationStudentModel;
			}

			return $avaliationFileAll;
		}

		$dataToSave = [];

		if (isset($input['alternative'])) {
			foreach ($input['alternative'] as $question => $answer) {
				$data = [
					'question_id' => $question,
				];

				if (is_array($answer)) {
					foreach ($answer as $item) {
						$data['alternative_id'] = $item;
						$dataToSave[] = $data;
					}
				} else {
					$data['alternative_id'] = $answer;
					$dataToSave[] = $data;
				}
			}
		}

		if (isset($input['response'])) {
			foreach ($input['response'] as $question => $answer) {
				$dataToSave[] = [
					'question_id' => $question,
					'text_response' => $answer,
				];
			}
		}

		if (isset($input['yes_no'])) {
			foreach ($input['yes_no'] as $idQuestion => $answer) {
				$dataToSave[] = [
					'question_id' => $idQuestion,
					'yes_no' => $answer,
				];
			}
		}

		AvaliationStudentModel::where([
			'order_id' => $input['order_id'],
			'avaliation_id' => $input['avaliation_id'],
		])->delete();

		foreach ($dataToSave as &$item) {
			$item['avaliation_id'] = $input['avaliation_id'];
			$item['student_id'] = $input['student_id'];
			$item['order_id'] = $input['order_id'];
			$item['classes_id'] = $input['classes_id'];

			(new AvaliationStudentModel)->fill($item)->save();
		}

		$this->processAvaliation($input);

		return $dataToSave;
	}

	public function getAvaliationStudent($orderId, $avaliationId, $studentId) {
		$nameVar = '';
		$valVar = 0;

		$avaliationStudent = AvaliationModel::query();

		if($studentId < 1){
			$avaliationStudent->with([
				'avaliationStudent' => function ($query) use ($orderId) {
					$query->whereNull('question_id')->where('order_id', $orderId);
				}
			]);

			$nameVar = 'order_id';
			$valVar = $orderId;
		}else{
			$nameVar = 'student_id';
			$valVar = $studentId;
		}

		$avaliationStudent->with([
			'avaliationQuestion' => function($query) use ($valVar, $nameVar, $avaliationId) {
				$query->with([
					'question.alternative' => function($query) {
						$query->where('flg_correct', 1);
					},
					'avaliationStudent' => function($query) use ($valVar, $nameVar, $avaliationId) {
						$query->with([
							'alternative',
						])
						->where([
							$nameVar => $valVar,
							'avaliation_id' => $avaliationId,
						]);
					},
				]);
			}
		]);

		return $avaliationStudent->find($avaliationId);
	}

	private function processAvaliation($data) {
		$scoreTotal = 0;

		$toCompare = [
			'alternative' => [],
			'yesNo' => [],
		];

		$avaliationStudent = AvaliationStudentModel::where([
			'order_id' => $data['order_id'],
			'avaliation_id' => $data['avaliation_id'],
		])
		->whereNotNull('alternative_id')
		->orWhereNotNull('yes_no')
		->get();

		foreach ($avaliationStudent as &$item) {
			if ($item->alternative_id) {
				$toCompare['alternative'][$item->question_id][] = $item->alternative_id;
			} else
			if (!empty($item->yes_no) || $item->yes_no == 0) {
				$toCompare['yesNo'][$item->question_id] = $item;
			}
		}

		foreach ($toCompare['alternative'] as $questionId => &$alternativesSelected) {
			$alternativesCorrect = array_map(function($item) {
				return $item['id'];
			}, AlternativeModel::where([
				'flg_correct' => 1,
				'question_id' => $questionId,
			])->get()->toArray());

			$totalAlternativesSelectedCorrect = array_reduce($alternativesSelected, function($carry, $alternativeSelected) use ($alternativesCorrect, $questionId) {
				if (in_array($alternativeSelected, $alternativesCorrect)) {
					$carry++;
				}

				return $carry;
			}, 0);

			$avaliationQuestion = AvaliationQuestionModel::where([
				'question_id' => $questionId,
				'avaliation_id' => $data['avaliation_id'],
			])->first();

			$score = $avaliationQuestion->score;
			$totalAlternativesCorrect = count($alternativesCorrect);

			if ($totalAlternativesSelectedCorrect) {
				if (!($totalAlternativesSelectedCorrect == $totalAlternativesCorrect && count($alternativesSelected) == $totalAlternativesCorrect)) {
					$score /= 2;
				}

				$score /= $totalAlternativesSelectedCorrect;

				$scoreTotal += $score;

				AvaliationStudentModel::where([
					'order_id' => $data['order_id'],
					'avaliation_id' => $data['avaliation_id'],
					'question_id' => $questionId,
				])
				->whereIn('alternative_id', $alternativesCorrect)
				->update([
					'score' => $score,
					'right_wrong' => 1,
				]);
			}

			AvaliationStudentModel::where([
				'order_id' => $data['order_id'],
				'avaliation_id' => $data['avaliation_id'],
				'question_id' => $questionId,
			])
			->whereNotIn('alternative_id', $alternativesCorrect)
			->update([
				'score' => 0,
				'right_wrong' => 0,
			]);
		}

		foreach ($toCompare['yesNo'] as $questionId => &$alternativeSelected) {
			$rightWrong = 0;
			$score = 0;

			if ($alternativeSelected->yes_no == AlternativeModel::where('question_id', $questionId)->first()->flg_correct) {
				$rightWrong = 1;
			}

			if ($rightWrong) {
				$avaliationQuestion = AvaliationQuestionModel::where([
					'question_id' => $questionId,
					'avaliation_id' => $data['avaliation_id'],
				])->first();

				$score = $avaliationQuestion->score;
				$scoreTotal += $score;
			}

			$alternativeSelected->fill([
				'score' => $score,
				'right_wrong' => $rightWrong,
			])->save();
		}

		if (!$data['order_id']) {
			$avaliationId = $data['avaliation_id'];

			$scholarshipStudent = ScholarshipStudentModel::with([
				'scholarship' => function($query) use ($avaliationId){
					$query->where('avaliation_id', $avaliationId);
				},
			])->where('student_id', $data['student_id'])->first();

			if ($scholarshipStudent) {
				$scholarshipStudent->fill([ 'proficiency_note' => $scoreTotal ])->save();
			}
		}
	}

	public function evaluated(Request $request) {
		$avaliationStudentExists = AvaliationStudentModel::where([
			'avaliation_id' => $request->avaliation_id,
			'student_id' => $request->student_id,
		])->first();

		return !!$avaliationStudentExists;
	}
}
