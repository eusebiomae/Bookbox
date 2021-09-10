<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAvaliationTable extends Migration
{

	public function up()
	{
		if (!Schema::hasTable('avaliation')) {
			Schema::create('avaliation', function (Blueprint $table) {
				$table->increments('id');
				$table->integer('avaliation_id')->unsigned()->nullable();
				$table->integer('category_id')->unsigned()->nullable();
				$table->integer('slide_id')->unsigned()->nullable();
				$table->integer('avaliation_type_id')->unsigned()->nullable();

				$table->string('title', 255)->nullable();
				$table->time('duration')->nullable();
				$table->date('date')->nullable();
				$table->time('start_time')->nullable();
				$table->time('time_limit')->nullable();
				$table->text('description')->nullable();
				$table->string('form_payment', 45)->nullable();
				$table->timestamps();
				$table->softDeletes();

				$table->integer('created_by')->nullable();
				$table->integer('updated_by')->nullable();
				$table->integer('deleted_by')->nullable();

				$table->foreign('avaliation_type_id')->references('id')->on('avaliation_type');
				$table->foreign('slide_id')->references('id')->on('slide');
				$table->foreign('category_id')->references('id')->on('course_category');
				$table->foreign('avaliation_id')->references('id')->on('avaliation');
			});
		}
	}

	public function down()
	{
		Schema::dropIfExists('avaliation');
	}
}
