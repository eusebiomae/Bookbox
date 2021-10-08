<?php

namespace App\Model\api;

use App\Traits\Updater;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StudentAddressModel extends Model {
	use SoftDeletes, Updater;

	protected $table = 'student_address';

	public $fillable = [
		'student_id',
		'country_id',
		'state_id',
		'city_id',
		'zip_code',
		'neighborhood',
		'street',
		'number',

		'created_by',
		'updated_by',
		'deleted_by',
	];

	protected $dates = ['deleted_at'];
}
