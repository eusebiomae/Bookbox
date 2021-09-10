<?php

namespace App\Model\api;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\Updater;
use Carbon\Carbon;

class CourseFormPaymentModel extends Model {
	use SoftDeletes;
	use Updater;

	protected $table = 'course_form_payment';

	public $fillable = [
		'class_id',
		'course_id',
		'course_subcategory_id',
		'form_payment_id',
		'date',
		'desc',
		'parcel',
		'value',
		'full_value',
		'flg_main',
		'link',

		'created_by',
		'updated_by',
		'deleted_by',
	];

	protected $dates = ['deleted_at'];

	protected function setValueAttribute($val) {
		$this->attributes['value'] = toNumberFormat($val);
	}

	protected function setFullValueAttribute($val) {
		$this->attributes['full_value'] = toNumberFormat($val);
	}

	public function setDateAttribute($value) {
		$this->attributes['date'] = formatDateEng($value);
	}

	protected function getValueAttribute($val) {
		return number_format($val, 2, '.', '');
	}

	protected function getFullValueAttribute($val) {
		return number_format($val, 2, '.', '');
	}

	public function getDateAttribute($value) {
		return empty($value) ? '' : Carbon::parse($value)->format('d/m/Y');
	}

	public function formPayment() {
		return $this->belongsTo('App\Model\api\FormPaymentModel');
	}

	public function course() {
		return $this->belongsTo('App\Model\api\Prospection\CourseModel');
	}
}
