<?php

namespace App\Model\api;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\Updater;

class FieldUserProfileModel extends Model {
	use SoftDeletes;
	use Updater;

	protected $table = 'field_user_profile';

	public $fillable = [
		'page_module_id',
		'page_config_id',
		'field_page_config_id',
		'user_profile_id',
		'user_id',
		'create',
		'read',
		'update',
		'delete',

		'created_by',
		'updated_by',
		'deleted_by',
	];

	protected $dates = ['deleted_at'];

	public function fieldPageConfig() {
		return $this->belongsTo('App\Model\api\FieldPageConfigModel');
	}
}
