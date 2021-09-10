<?php

namespace App\Model\api;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\Updater;

class OtherInfModel extends Model
{
	use SoftDeletes;
	use Updater;

	protected $table = 'other_inf';

	public $fillable = [
		'title',
		'description',
		'other_inf_type_id',
		'img',
		'created_by',
		'updated_by',
		'deleted_by',
	];

	protected $dates = ['deleted_at'];

	public function getImgAttribute($value) {
		return empty($value) ? null : \Illuminate\Support\Facades\Storage::url("otherInf/img/{$value}");
	}

	public function otherInfType() {
		return $this->belongsTo('App\Model\api\OtherInfTypeModel');
	}
}
