<?php

namespace App\Model\api;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\Updater;

class TestemonialModel extends Model {
	use SoftDeletes;
	use Updater;

	protected $table = 'testemonial';

	public $fillable = [
		'name',
		'office',
		'text_pt',
		'text_en',
		'text_es',
		'abstract_pt',
		'abstract_en',
		'abstract_es',
		'image',
		'status',
		'content_page_id',
		'created_by',
		'updated_by',
		'deleted_by',
	];

	protected $dates = ['deleted_at'];
}
