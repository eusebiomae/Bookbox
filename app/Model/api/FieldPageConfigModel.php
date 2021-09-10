<?php

namespace App\Model\api;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\Updater;

class FieldPageConfigModel extends Model {
	use SoftDeletes;
	use Updater;

	protected $table = 'field_page_config';

	public $fillable = [
		'page_config_id',
		'column',
		'label',
		'type',
		'maxlength',
		'required',
		'readonly',
		'default_value',
		'sequence',

		'created_by',
		'updated_by',
		'deleted_by',
	];

	protected $dates = ['deleted_at'];

	public function fieldUserProfile() {
		return $this->belongsTo('App\Model\api\FieldUserProfileModel', 'id', 'field_page_config_id');
	}
}
