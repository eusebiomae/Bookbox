<?php

namespace App\Model\api;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\Updater;
use Carbon\Carbon;

class PointsSocioeconomicModel extends Model {
	use SoftDeletes;
	use Updater;

	protected $table = 'points_socioeconomic';

	public $fillable = [
		'column_name',
		'points',
		'selected_value',
		'expression',

		'created_by',
		'updated_by',
		'deleted_by',
	];

	protected $dates = ['deleted_at'];
}
