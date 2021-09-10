<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModuleCategoryTable extends Migration {
	public function up() {
		if (!Schema::hasTable('module_category')) {
			Schema::create('module_category', function(Blueprint $table) {
				$table->increments('id');

				$table->integer('module_id')->unsigned()->nullable();
				$table->integer('category_id')->unsigned()->nullable();

				$table->integer('created_by')->nullable();
				$table->integer('updated_by')->nullable();
				$table->integer('deleted_by')->nullable();

				$table->timestamps();
				$table->softDeletes();

				$table->foreign('module_id')->references('id')->on('content_course');
				$table->foreign('category_id')->references('id')->on('course_category');
			});
		}
	}

	public function down() {
		Schema::dropIfExists('module_category');
	}
}
