<?php

namespace App\Model\api;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\Updater;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ScholarshipModel extends Model {
	use SoftDeletes;
	use Updater;

	protected $table = 'scholarship';

	public $fillable = [
		'title',
		'description',
		'course_category_type_id',
		'course_category_id',
		'course_subcategory_id',
		'course_id',
		'class_id',
		'avaliation_id',
		'registration_fee',
		'registration_start_date',
		'registration_end_date',
		'results_release_date',
		'course_registration_deadline',
		'exam_deadline',
		'results_date_second_call',
		'registration_deadline_second_call',

		'created_by',
		'updated_by',
		'deleted_by',
	];

	protected $dates = ['deleted_at'];
	protected $appends = ['endDate'];

	// Junções de Tabela

	public function courseCategory() {
		return $this->belongsTo('\App\Model\api\Prospection\CourseCategoryModel');
	}

	public function courseCategoryType() {
		return $this->belongsTo('\App\Model\api\Prospection\CourseCategoryTypeModel');
	}

	public function courseSubcategory() {
		return $this->belongsTo('\App\Model\api\Prospection\CourseSubcategoryModel');
	}

	public function class() {
		return $this->belongsTo('\App\Model\api\Prospection\ClassModel');
	}

	public function course() {
		return $this->belongsTo('\App\Model\api\Prospection\CourseModel');
	}

	public function scholarshipDiscount() {
		return $this->hasMany('\App\Model\api\ScholarshipDiscountModel', 'scholarship_id');
	}

	public function scholarshipStudent() {
		return $this->hasMany('\App\Model\api\ScholarshipStudentModel', 'scholarship_id');
	}

	public function avaliation() {
		return $this->belongsTo('\App\Model\api\AvaliationModel', 'avaliation_id', 'id');
	}

	// Formatação de valores antes de salvar no banco

	// public function setRegistrationFeeAttribute($val) {
	// 	$this->attributes['registration_fee'] = str_replace(',', '.', str_replace('.', '', $val));
	// }

	public function setRegistrationStartDateAttribute($val) {
		$this->attributes['registration_start_date'] = formatDateEng($val);
	}

	public function setRegistrationEndDateAttribute($val) {
		$this->attributes['registration_end_date'] = formatDateEng($val);
	}

	public function setResultsReleaseDateAttribute($val) {
		$this->attributes['results_release_date'] = formatDateEng($val);
	}

	public function setCourseRegistrationDeadlineAttribute($val) {
		$this->attributes['course_registration_deadline'] = formatDateEng($val);
	}

	public function setExamDeadlineAttribute($val) {
		$this->attributes['exam_deadline'] = formatDateEng($val);
	}

	public function setResultsDateSecondCallAttribute($val) {
		$this->attributes['results_date_second_call'] = formatDateEng($val);
	}

	public function setRegistrationDeadlineSecondCallAttribute($val) {
		$this->attributes['registration_deadline_second_call'] = formatDateEng($val);
	}

	// Formatação de valores vindos do banco

	public function getRegistrationStartDateAttribute($val) {
		return empty($val) ? '' : Carbon::parse($val)->format('d/m/Y');
	}

	public function getRegistrationEndDateAttribute($val) {
		return empty($val) ? '' : Carbon::parse($val)->format('d/m/Y');
	}

	public function getResultsReleaseDateAttribute($val) {
		return empty($val) ? '' : Carbon::parse($val)->format('d/m/Y');
	}

	public function getCourseRegistrationDeadlineAttribute($val) {
		return empty($val) ? '' : Carbon::parse($val)->format('d/m/Y');
	}

	public function getExamDeadlineAttribute($val) {
		return empty($val) ? '' : Carbon::parse($val)->format('d/m/Y');
	}

	public function getResultsDateSecondCallAttribute($val) {
		return empty($val) ? '' : Carbon::parse($val)->format('d/m/Y');
	}

	public function getRegistrationDeadlineSecondCallAttribute($val) {
		return empty($val) ? '' : Carbon::parse($val)->format('d/m/Y');
	}

	public function getEndDateAttribute() {
		return $this->attributes['registration_end_date'] ?? '';
	}

	// SELECTS
	static public function getCategoryCountCourse(){
		return DB::select("SELECT
												cc.id,
												cc.description_pt AS `description`,
												(
													SELECT COUNT(1) FROM scholarship s
													INNER JOIN course_subcategory cs
													ON cs.id = s.course_subcategory_id AND cs.deleted_at IS NULL AND cs.invisible_connected IS NULL
													INNER JOIN course_category_type cct
													ON cct.id = s.course_category_type_id AND cct.deleted_at IS NULL AND cct.invisible_connected IS NULL
													WHERE s.deleted_at IS NULL
													AND s.registration_end_date >= now()
													AND s.course_category_id = cc.id
												) AS count_scholarship
											FROM course_category cc
											WHERE cc.deleted_at IS NULL
											AND cc.invisible IS NULL
											ORDER BY cc.description_pt");
	}
}
