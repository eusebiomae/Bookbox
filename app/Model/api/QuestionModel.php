<?php

namespace App\Model\api;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\Updater;

class QuestionModel extends Model {
	use SoftDeletes;
	use Updater;

	protected $table = 'question';

	public $fillable = [
		'title',
		'description',
		'order',
		'flg_type',
		'flg_source',
		'flg_pcx',
		'score',
		'category_id',

		'created_by',
		'updated_by',
		'deleted_by',
	];

	protected $dates = ['deleted_at'];

	protected $appends = [ 'type' ];

	public function alternative()
	{
		return $this->hasMany('App\Model\api\AlternativeModel', 'question_id', 'id');
	}

	public function category() {
		return $this->belongsTo('App\Model\api\Prospection\CourseCategoryModel');
	}

	public function getTypeAttribute() {
		return QuestionModel::getType($this->attributes['flg_type']);
	}

	static public function getType($flgType) {
		$mapType = [
			'1' => 'Textual',
			'2' => 'Multipla Escolha (Apenas uma ops.)',
			'3' => 'Multipla Escolha (Várias ops.)',
			'4' => 'Dicotómica (Sim/Não)',
		];

		return isset($mapType[$flgType]) ? $mapType[$flgType] : '';
	}
}
