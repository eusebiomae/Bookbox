<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCourseOtherInfTable extends Migration {
	public function up() {
		if (!Schema::hasTable('course_other_inf')) {
			Schema::create('course_other_inf', function(Blueprint $table) {
				$table->increments('id');

				$table->integer('course_id')->unsigned()->nullable();
				$table->integer('other_inf_type_id')->unsigned()->nullable();
				$table->integer('other_inf_id')->unsigned()->nullable();

				$table->integer('created_by')->nullable();
				$table->integer('updated_by')->nullable();
				$table->integer('deleted_by')->nullable();

				$table->timestamps();
				$table->softDeletes();

				$table->foreign('course_id')->references('id')->on('course');
				$table->foreign('other_inf_type_id')->references('id')->on('other_inf_type');
				$table->foreign('other_inf_id')->references('id')->on('other_inf');

			});
		}
	}

	public function down() {
		Schema::dropIfExists('course_other_inf');
	}
}
