<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAvaliationQuestionTable extends Migration
{
	public function up()
	{
		if (!Schema::hasTable('avaliation_question')) {
			Schema::create('avaliation_question', function (Blueprint $table) {
				$table->id();
				$table->integer('avaliation_id')->unsigned()->nullable();
				$table->integer('question_id')->unsigned()->nullable();
				$table->double('score')->nullable()->default(0);

				$table->integer('created_by')->nullable();
				$table->integer('updated_by')->nullable();
				$table->integer('deleted_by')->nullable();
				$table->timestamps();
				$table->softDeletes();
			});
		}
	}

	public function down()
	{
		Schema::dropIfExists('avaliation_question');
	}
}
