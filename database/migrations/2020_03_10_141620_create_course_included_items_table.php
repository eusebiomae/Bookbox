<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCourseIncludedItemsTable extends Migration
{
	public function up() {
		if (!Schema::hasTable('course_included_items')) {
			Schema::create('course_included_items', function(Blueprint $table) {
				$table->increments('id');

				$table->integer('course_id')->unsigned()->nullable();
				$table->integer('included_items_id')->unsigned()->nullable();

				$table->integer('created_by')->nullable();
				$table->integer('updated_by')->nullable();
				$table->integer('deleted_by')->nullable();
				$table->timestamps();
				$table->softDeletes();

				$table->foreign('course_id')
					->references('id')
					->on('course');

				$table->foreign('included_items_id')
					->references('id')
					->on('included_items');
			});
		}
	}

	public function down()
	{
		Schema::dropIfExists('course_included_items');
	}
}
