<?php

namespace App\Model\api\Prospection;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\Updater;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class CourseModel extends Model
{
	use SoftDeletes;
	use Updater;

	protected $table = 'course';

	public $fillable = [
		'course_category_id',
		'course_category_type_id',
		'course_subcategory_id',
		'name_pt',
		'name_en',
		'name_es',
		'img',
		'title_pt',
		'title_en',
		'title_es',
		'subtitle_pt',
		'subtitle_en',
		'subtitle_es',
		'value',
		'full_value',
		'description_pt',
		'description_en',
		'description_es',
		'cta',
		'certified',
		'place_id',
		'team_id',
		'hours_load',
		'show_home',
		'show_title',
		'school_clinic',
		'additional_information',
		'start_date',
		'end_date',
		'video_link',
		'duration',
		'number_modules',
		'service_hours',
		'hours_monitored_supervision',
		// 'contact_course',
		// 'course_other_inf',
		'min_percentage_workload',
		'inactive',
		'fine_value',

		'created_by',
		'updated_by',
		'deleted_by',
	];

	protected $dates = ['deleted_at'];

	public function getStartDateAttribute($value) {
		return empty($value) ? null : Carbon::parse($value)->format('d/m/Y');
	}

	protected function setFineValueAttribute($val) {
		$this->attributes['fine_value'] = toNumberFormat($val);
	}

	protected function getFineValueAttribute($val) {
		return number_format($val, 2, '.', '');
	}

	public function setStartDateAttribute($value) {
		$this->attributes['start_date'] = formatDateEng($value);
	}

	public function setEndDateAttribute($value) {
		$this->attributes['end_date'] = formatDateEng($value);
	}

	public function getEndDateAttribute($value) {
		return empty($value) ? null : Carbon::parse($value)->format('d/m/Y');
	}

	public function getImgAttribute($value) {
		return empty($value) ? null : Storage::url("course/{$value}");
	}

	public function courseCategory() {
		return $this->belongsTo('App\Model\api\Prospection\CourseCategoryModel');
	}

	public function courseCategoryType() {
		return $this->belongsTo('App\Model\api\Prospection\CourseCategoryTypeModel');
	}

	public function courseSubcategory() {
		return $this->belongsTo('App\Model\api\Prospection\CourseSubcategoryModel');
	}

	public function place() {
		return $this->belongsTo('App\Model\api\PlaceModel');
	}

	public function team() {
		return $this->belongsTo('App\Model\api\TeamModel');
	}

	public function class() {
		return $this->hasMany('App\Model\api\Prospection\ClassModel', 'course_id', 'id');
	}

	public function contentCourse() {
		return $this->hasMany('App\Model\api\Prospection\ContentCourseModel', 'course_category_id', 'course_category_id');
	}

	public function bonusCourse() {
		return $this->belongsToMany('App\Model\api\Prospection\BonusCourseModel', 'course_bonus_course', 'course_id', 'bonus_course_id');
	}

	public function includedItems() {
		return $this->belongsToMany('App\Model\api\Prospection\IncludedItemsModel', 'course_included_items', 'course_id', 'included_items_id');
	}

	public function formPayment() {
		return $this->belongsToMany('App\Model\api\FormPaymentModel', 'course_form_payment', 'course_id', 'form_payment_id');
	}

	public function courseFormPayment() {
		return $this->hasMany('App\Model\api\CourseFormPaymentModel', 'course_id', 'id');
	}

	public function correspondingCourseCategory() {
		return $this->belongsTo('App\Model\api\CorrespondingCourseCategoryModel', 'course_category_id', 'course_category_id');
	}

	public function teacher() {
		return $this->belongsToMany('App\Model\api\TeamModel', 'course_teacher', 'course_id', 'team_id');
	}

	public function courseModule() {
		return $this->hasMany('App\Model\api\CourseModuleModel', 'course_id', 'id');
	}

	public function courseAdditional() {
		return $this->hasMany('App\Model\api\CourseAdditionalModel', 'course_id', 'id');
	}

	public function courseDiscount() {
		return $this->hasMany('App\Model\api\CourseDiscountModel', 'course_id', 'id');
	}

	public function otherInf() {
		return $this->belongsToMany('App\Model\api\OtherInfModel', 'course_other_inf', 'course_id', 'other_inf_id');
	}

	public function otherInfType() {
		return $this->belongsToMany('App\Model\api\OtherInfTypeModel', 'course_other_inf', 'course_id', 'other_inf_type_id');
	}

	public function courseOtherInf() {
		return $this->hasMany('App\Model\api\CourseOtherInfModel', 'course_id', 'id');
	}

	public function user() {
		return $this->belongsToMany('App\Model\api\UserModel', 'contact_course', 'course_id', 'user_id');
	}

}
