<?php

namespace App\Model\api;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\Updater;
use Carbon\Carbon;

class StudentSocioeconomicModel extends Model {
	use SoftDeletes;
	use Updater;

	protected $table = 'student_socioeconomic';

	public $fillable = [
		'student_id',
		'marital_status',
		'profession',
		'salary',
		'rent_income',
		'alimony',
		'financial_investments',
		'total_family_income',
		'others_income',
		'feeding',
		'water',
		'energy',
		'phone_or_cell_phone',
		'internet',
		'gas',
		'transport_or_fuel',
		'financing_or_consortium',
		'health_or_dental_plan',
		'domestic_workers',
		'leisure',
		'clothing',
		'medication',
		'others_expenses',
		'home',
		'house_financing',
		'house_rent',
		'iptu',
		'condominium',
		'amount_car',
		'price_total_cars',
		'amount_motorcycles',
		'price_total_motorcycles',
		'amount_others',
		'price_total_others',
		'amount_adults',
		'amount_children',
		'amount_pregnant',
		'amount_seniors',
		'people_with_special_needs',

		'created_by',
		'updated_by',
		'deleted_by',
	];

	protected $dates = ['deleted_at'];

	// Junção de Tabela

	public function student() {
		return $this->belongsTo('\App\Model\api\StudentModel');
	}
}
