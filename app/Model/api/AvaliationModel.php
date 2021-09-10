<?php

namespace App\Model\api;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\Updater;
use Carbon\Carbon;

class AvaliationModel extends Model {
	use SoftDeletes;
	use Updater;

	protected $table = 'avaliation';

	public $fillable = [
		'title',
		'course_category_type_id',
		'category_id',
		'course_subcategory_id',
		'course_id',
		'class_id',
		'date',
		'start_time',
		'duration',
		'time_limit',
		'description',
		'slide_id',
		'avaliation_id',
		'avaliation_type_id',

		'created_by',
		'updated_by',
		'deleted_by',
	];

	protected $dates = ['deleted_at'];

	public function setDateAttribute($val) {
		$this->attributes['date'] = formatDateEng($val);
	}

	public function getDateAttribute($val) {
		return empty($val) ? '' : Carbon::parse($val)->format('d/m/Y');
	}

	public function getStartTimeAttribute($val) {
		return empty($val) ? null : substr($val, 0, 5);
	}

	public function getDurationAttribute($val) {
		return empty($val) ? null : substr($val, 0, 5);
	}

	public function getTimeLimitAttribute($val) {
		return empty($val) ? null : substr($val, 0, 5);
	}

	public function category() {
		return $this->belongsTo('App\Model\api\Prospection\CourseCategoryModel');
	}

	public function avaliationType() {
		return $this->belongsTo('App\Model\api\AvaliationTypeModel');
	}

	public function classList() {
		return $this->belongsTo('App\Model\api\Prospection\ClassModel');
	}

	public function classes() {
		return $this->belongsTo('\App\Model\api\ClassesModel');
	}

	public function scholarship() {
		return $this->hasMany('\App\Model\api\ScholarshipModel', 'avaliation_id');
	}

	public function question() {
		return $this->belongsToMany('App\Model\api\QuestionModel', 'avaliation_question', 'avaliation_id', 'question_id')->withPivot(['score']);
	}

	public function avaliationQuestion() {
		return $this->hasMany('App\Model\api\AvaliationQuestionModel', 'avaliation_id');
	}

	public function avaliationStudent() {
		return $this->hasMany('App\Model\api\AvaliationStudentModel', 'avaliation_id')->orderBy('question_id')->orderby('alternative_id');
	}

	public function recuperation() {
		return $this->belongsTo('App\Model\api\AvaliationModel', 'id', 'avaliation_id');
	}
}
