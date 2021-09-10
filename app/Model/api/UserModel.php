<?php

namespace App\Model\api;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\Updater;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class UserModel extends Model {
	use SoftDeletes;
	use Updater;

	protected $table = 'user';

	public $fillable = [
		'name',
		'user_name',
		'email',
		'password',
		'phone',
		'cellphone',
		'contact_site',
		'author',
		'consultant',
		'admin',
		'user_type_id',
		'user_profile_id',
		'image',
		'created_by',
		'updated_by',
		'deleted_by',
	];

	protected $dates = ['deleted_at'];

	protected $hidden = [
		'password',
		'remember_token',
	];

	public function getImageAttribute($value) {
		return empty($value) ? null : Storage::url("user/{$value}");
	}

	public function userProfile() {
		return $this->belongsTo('App\Model\api\UserProfileModel');
	}

}
