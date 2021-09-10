<?php

namespace App\Model\api;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\Updater;

class AvaliationStudentModel extends Model {
	// use SoftDeletes;
	use Updater;

	protected $table = 'avaliation_student';

	public $fillable = [
		'student_id',
		'order_id',
		'classes_id',
		'avaliation_id',
		'question_id',
		'alternative_id',
		'text_response',
		'yes_no',
		'right_wrong',
		'score',
		'justification',
		'avaliation_file',
		'created_by',
		'updated_by',
		'deleted_by',
	];

	protected $dates = ['deleted_at'];

	public function avaliation() {
		return $this->belongsTo('App\Model\api\AvaliationModel', 'avaliation_id');
	}

	public function question() {
		return $this->belongsTo('App\Model\api\QuestionModel', 'question_id');
	}

	public function alternative() {
		return $this->belongsTo('App\Model\api\AlternativeModel', 'alternative_id');
	}

	public function avaliationQuestion() {
		return $this->belongsTo('App\Model\api\AvaliationQuestionModel', 'question_id', 'question_id');
	}

	public function setRightWrongAttribute($val) {
		if ($val == 0) {
			$this->attributes['score'] = 0;
		}

		$this->attributes['right_wrong'] = $val;
	}
}
