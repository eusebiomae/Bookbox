<?php

namespace App\Model\api;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\Updater;

class AlternativeModel extends Model {
	use SoftDeletes;
	use Updater;

	protected $table = 'alternative';

	public $fillable = [
		'title',
		'description',
		'order',
		'flg_type',
		'flg_correct',
		'question_id',
		'created_by',
		'updated_by',
		'deleted_by',
	];

	protected $dates = ['deleted_at'];
}
