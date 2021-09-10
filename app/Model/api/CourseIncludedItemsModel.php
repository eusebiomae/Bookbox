<?php

namespace App\Model\api;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\Updater;
use Carbon\Carbon;

class CourseIncludedItemsModel extends Model {
	use SoftDeletes;
	use Updater;

	protected $table = 'course_included_items';

	public $fillable = [
		'course_id',
		'included_items_id',
		'created_by',
		'updated_by',
		'deleted_by',
	];

	protected $dates = ['deleted_at'];
}
