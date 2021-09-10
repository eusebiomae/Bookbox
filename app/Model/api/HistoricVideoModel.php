<?php

namespace App\Model\api;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\Updater;

class HistoricVideoModel extends Model
{
	use SoftDeletes;
	use Updater;

	protected $table = 'historic_video';

	public $fillable = [
		'id',
		'order_id',
		'student_id',
		'course_id',
		'class_id',
		'classes_id',
		'content_course_id',
		'video_lesson_id',
		'timer',
		'duration',
		'ended',

		'created_by',
		'updated_by',
		'deleted_by',
	];

  protected $dates = ['deleted_at'];
}
