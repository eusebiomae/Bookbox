<?php

namespace App\Model\api;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\Updater;

class ModuleCategoryModel extends Model{
	use SoftDeletes, Updater;

	protected $table = 'module_category';

	public $fillable = [
		'module_id',
		'category_id',
		'created_by',
		'updated_by',
		'deleted_by',
	];

	protected $dates = ['deleted_at'];

	public function category() {
		return $this->belongsTo('App\Model\api\Prospection\CourseCategoryModel');
	}

	public function module() {
		return $this->belongsTo('App\Model\api\Prospection\ContentCourseModel');
	}
}
