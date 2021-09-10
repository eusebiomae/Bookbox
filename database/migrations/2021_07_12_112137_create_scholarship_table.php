<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScholarshipTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		if (!Schema::hasTable('scholarship')) {
			Schema::create('scholarship', function (Blueprint $table) {
				$table->id();
				$table->string('title', 64)->nullable();
				$table->string('description', 400)->nullable();
				$table->foreignId('course_category_type_id')->nullable()->references('id')->on('course_category_type')->onDelete('cascade');
				$table->foreignId('course_category_id')->nullable()->references('id')->on('course_category')->onDelete('cascade');
				$table->foreignId('course_subcategory_id')->nullable()->references('id')->on('course_subcategory')->onDelete('cascade');
				$table->foreignId('course_id')->nullable()->references('id')->on('course')->onDelete('cascade');
				$table->foreignId('class_id')->nullable()->references('id')->on('class')->onDelete('cascade');
				$table->date('registration_start_date')->nullable();
				$table->date('registration_end_date')->nullable();
				$table->date('results_release_date')->nullable();
				$table->date('course_registration_deadline')->nullable();
				$table->date('exam_deadline')->nullable();
				$table->date('results_release_date_2nd_call')->nullable();
				$table->date('course_registration_deadline_2nd_call')->nullable();
				$table->timestamps();
				$table->softDeletes();
				$table->integer('created_by')->nullable();
				$table->integer('updated_by')->nullable();
				$table->integer('deleted_by')->nullable();
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
		Schema::dropIfExists('scholarship');
	}
}
