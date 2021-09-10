<?php

namespace App\Model\api;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\Updater;

class AvaliationTypeModel extends Model {
	use SoftDeletes;
	use Updater;

	protected $table = 'avaliation_type';

	public $fillable = [
		'name',

		'created_by',
		'updated_by',
		'deleted_by',
	];

	protected $dates = ['deleted_at'];
}
