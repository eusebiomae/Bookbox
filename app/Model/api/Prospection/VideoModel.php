<?php

namespace App\Model\api\Prospection;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\Updater;

class VideoModel extends Model {
	use SoftDeletes;
	use Updater;

	protected $table = 'video';

	public $fillable = [
		'title',
		'description',
		'link',

		'created_by',
		'updated_by',
		'deleted_by',
	];

	protected $dates = ['deleted_at'];
	protected $appends = ['linkVimeo'];

	public function getLinkVimeoAttribute() {
		$val = $this->attributes['link'] ?? null;
		return empty($val) ? '' : "https://player.vimeo.com/video/{$val}";
	}

	public function historicVideo() {
		return $this->hasOne('App\Model\api\HistoricVideoModel', 'video_lesson_id');
	}
}
