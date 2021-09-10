<?php

namespace App\Model\api\Prospection;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\Updater;

class CourseSubcategoryModel extends Model {
	use SoftDeletes;
	use Updater;

	protected $table = 'course_subcategory';

	public $fillable = [
		'description_pt',
		'description_en',
		'description_es',
		'flg',
		'fine_value',
		'invisible',
		'invisible_connected',

		'created_by',
		'updated_by',
		'deleted_by',
	];

	protected $dates = ['deleted_at'];

	// function courseCategoryType() {
	// 	return $this->belongsTo('\App\Model\api\Prospection\CourseCategoryTypeModel');
	// }

	protected function setFineValueAttribute($val) {
		$this->attributes['fine_value'] = toNumberFormat($val);
	}

	protected function getFineValueAttribute($val) {
		return number_format($val, 2, '.', '');
	}

	function course() {
		return $this->hasMany('\App\Model\api\Prospection\CourseModel', 'course_subcategory_id', 'id');
	}

	public function formPayment() {
		return $this->belongsToMany('App\Model\api\FormPaymentModel', 'course_form_payment', 'course_subcategory_id', 'form_payment_id');
	}
}
