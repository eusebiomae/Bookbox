<?php

namespace App\Model\api;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\Updater;

class ContactCourseModel extends Model
{
	use SoftDeletes;
	use Updater;

	protected $table = 'contact_course';

	public $fillable = [
		'course_id',
		'user_id',
		'created_by',
		'updated_by',
		'deleted_by',
	];

	protected $dates = ['deleted_at'];

}
