<?php

namespace App\Model\api;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\Updater;

class ScholarshipDiscountModel extends Model {
	use SoftDeletes;
	use Updater;

	protected $table = 'scholarship_discount';

	public $fillable = [
		'scholarship_id',
		'discount_percentage',
		'amount_bag',

		'created_by',
		'updated_by',
		'deleted_by',
	];

	protected $dates = ['deleted_at'];

	// Junção de Tabela

	public function scholarship() {
		return $this->belongsTo('\App\Model\api\ScholarshipModel');
	}
}
