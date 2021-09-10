<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactCourseTable extends Migration {
	public function up() {
		if (!Schema::hasTable('contact_course')) {
			Schema::create('contact_course', function(Blueprint $table) {
				$table->increments('id');

				$table->integer('course_id')->unsigned()->nullable();
				$table->integer('user_id')->unsigned()->nullable();

				$table->integer('created_by')->nullable();
				$table->integer('updated_by')->nullable();
				$table->integer('deleted_by')->nullable();

				$table->timestamps();
				$table->softDeletes();

				$table->foreign('course_id')->references('id')->on('course');
				$table->foreign('user_id')->references('id')->on('user');

			});
		}
	}

	public function down() {
		Schema::dropIfExists('contact_course');
	}
}
