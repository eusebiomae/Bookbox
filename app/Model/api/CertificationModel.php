<?php

namespace App\Model\api;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\Updater;

class CertificationModel extends Model {
	use SoftDeletes;
	use Updater;

	protected $table = 'certification';

	public $fillable = [
		'title_pt',
		'description_pt',
		'image',
		'created_by',
		'updated_by',
		'deleted_by',
	];

	protected $dates = ['deleted_at'];


	public function function()
	{
		return $this->belongsTo('\App\Model\api\CertificationModel');
	}

	public function getImageAttribute($value) {
		return empty($value) ? null : \Illuminate\Support\Facades\Storage::url("certification/{$value}");
	}


}
