<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCourseCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
	{
		if (!Schema::hasTable('course_category')) {
			Schema::create('course_category', function (Blueprint $table) {
				$table->increments('id');
				$table->string('description_pt', 45)->nullable();
				$table->string('description_en', 45)->nullable();
				$table->string('description_es', 45)->nullable();
				$table->integer('course_category_type_id')->unsigned()->nullable();
				$table->string('image', 512)->nullable();
				$table->integer('created_by')->nullable();
				$table->integer('updated_by')->nullable();
				$table->integer('deleted_by')->nullable();
				$table->timestamps();
				$table->softDeletes();

				// $table->foreign('user_id')
				// 	->references('id')
				// 	->on('user');
			});
		}
	}

	/**
	* Reverse the migrations.
	*
	* @return void
	*/
	public function down()
	{
		Schema::dropIfExists('course_category');
	}
}
