<?php

namespace App\Model\api;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\Updater;

class AvaliationQuestionModel extends Model {
	use SoftDeletes, Updater;

	protected $table = 'avaliation_question';

	public $fillable = [
		'avaliation_id',
		'question_id',
		'score',

		'created_by',
		'updated_by',
		'deleted_by',
	];

	protected $dates = ['deleted_at'];

	public function question() {
		return $this->belongsTo('App\Model\api\QuestionModel');
	}

	public function avaliationStudent() {
		return $this->hasMany('App\Model\api\AvaliationStudentModel', 'question_id', 'question_id');
	}

}
