<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistoricVideoTable extends Migration
{

	public function up()
	{
		if (!Schema::hasTable('historic_video')) {
			Schema::create('historic_video', function (Blueprint $table) {
				$table->id();
				// $table->foreignId('order_id')->references('id')->on('order')->onDelete('cascade')->nullable();
				$table->foreignId('student_id')->references('id')->on('student')->onDelete('cascade')->nullable();
				$table->foreignId('course_id')->references('id')->on('course')->onDelete('cascade')->nullable();
				$table->foreignId('class_id')->references('id')->on('class')->onDelete('cascade')->nullable();
				$table->foreignId('classes_id')->references('id')->on('classes')->onDelete('cascade')->nullable();
				$table->foreignId('content_course_id')->references('id')->on('content_course')->onDelete('cascade')->nullable();
				$table->foreignId('video_lesson_id')->references('id')->on('video')->onDelete('cascade')->nullable();

				$table->double('timer')->nullable();
				$table->double('duration')->nullable();
				$table->tinyInteger('ended')->nullable();

				$table->integer('created_by')->nullable();
				$table->integer('updated_by')->nullable();
				$table->integer('deleted_by')->nullable();
				$table->softDeletes();

				$table->timestamps();
			});
		}
	}

	public function down()
	{
		Schema::dropIfExists('historic_video');
	}
}
