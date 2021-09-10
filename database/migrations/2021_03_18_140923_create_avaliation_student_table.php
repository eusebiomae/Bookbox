<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAvaliationStudentTable extends Migration
{
    public function up()
    {
        if (!Schema::hasTable('avaliation_student')) {
			Schema::create('avaliation_student', function (Blueprint $table) {
				$table->id();

				$table->integer('student_id')->unsigned()->nullable();
				$table->integer('order_id')->unsigned()->nullable();
				$table->integer('classes_id')->unsigned()->nullable();
				$table->integer('avaliation_id')->unsigned()->nullable();
				$table->integer('question_id')->unsigned()->nullable();
				$table->integer('alternative_id')->unsigned()->nullable();
				$table->text('text_response')->nullable();
				$table->integer('yes_no')->nullable();
				$table->integer('right_wrong')->nullable();
				$table->text('justification')->nullable();
				$table->double('score')->nullable()->default(0);
				$table->string('avaliation_file', 255)->nullable();

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
        Schema::dropIfExists('avaliation_student');
    }
}
