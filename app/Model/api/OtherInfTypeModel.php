<?php

namespace App\Model\api;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\Updater;

class OtherInfTypeModel extends Model
{
	use SoftDeletes;
	use Updater;

	protected $table = 'other_inf_type';

	public $fillable = [
		'description_pt',
		'description_en',
		'description_es',
		'sequence',
		'flg',
		'created_by',
		'updated_by',
		'deleted_by',
	];

	protected $dates = ['deleted_at'];

	public function otherInf() {
		return $this->hasMany('App\Model\api\OtherInfModel', 'other_inf_type_id');
	}
}
