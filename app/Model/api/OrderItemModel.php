<?php

namespace App\Model\api;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\Updater;

class OrderItemModel extends Model {
	use SoftDeletes;
	use Updater;

	protected $table = 'order_item';

	public $fillable = [
		'order_id',
		'item_id',
		'amount',

		'created_by',
		'updated_by',
		'deleted_by',
	];

	protected $dates = ['deleted_at'];
}
