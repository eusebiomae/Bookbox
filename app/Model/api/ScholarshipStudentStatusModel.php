<?php

namespace App\Model\api;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\Updater;

class ScholarshipStudentStatusModel extends Model {
	use SoftDeletes;
	use Updater;

	protected $table = 'scholarship_student_status';

	public $fillable = [
		'name',

		'created_by',
		'updated_by',
		'deleted_by',
	];

	protected $dates = ['deleted_at'];

	// Junção de Tabela

	public function scholarshipStudent() {
		return $this->hasMany('\App\Model\api\ScholarshipStudentModel', 'scholarship_student_status_id');
	}
}
