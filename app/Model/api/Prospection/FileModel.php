<?php

namespace App\Model\api\Prospection;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\Updater;

use Illuminate\Support\Facades\DB;

class FileModel extends Model {
	use SoftDeletes;
	use Updater;

	protected $table = 'file';

	public $fillable = [
		'course_id',
		'name',
		'title',
		'subtitle',
		'description',
		'extension',
		'link',

		'created_by',
		'updated_by',
		'deleted_by',
	];

	protected $dates = ['deleted_at'];
	protected $appends = [ 'icon' ];

	public function contentCourse() {
		return $this->belongsToMany('App\Model\api\Prospection\ContentCourseModel', 'file_content_course', 'file_id', 'content_course_id');
	}

	public function fileContentCourse() {
		return $this->belongsTo('App\Model\api\FileContentCourseModel', 'id', 'file_id');
	}

	public function getLinkAttribute($val) {
		// alterado return empty($val) ? null : url("download/{$val}")
		return empty($val) ? null : url("storage/file/{$val}");
	}

	public function getIconAttribute() {
		return FileModel::getIcon($this->attributes['extension']);
	}

	static public function getIcon($extension) {
		switch ($extension) {
			case 'jpg':
			case 'png':
			case 'git':
				return 'fa-file-image';
			case 'mp4':
				return 'fa-file-video';
			case 'mp3':
				return 'fa-file-audio';
			case 'pdf':
				return 'fa-file-pdf';
			case 'docx':
			case 'docm':
			case 'dotx':
			case 'dotm':
				return 'fa-file-word';
			case 'pptx':
			case 'ppt':
				return 'fa-file-powerpoint';
			case 'xls':
			case 'xlt':
				return 'fa-file-excel';
			case 'zip':
			case 'rar':
				return 'fa-file-archive';
			case 'txt':
				return 'fa-file-alt';
			default: return 'fa-file';
		}
	}
}
