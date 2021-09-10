<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCourseInformationsAvaliationTable extends Migration
{
    public function up()
    {
        Schema::table('avaliation', function (Blueprint $table) {
            $table->foreignId('course_category_type_id')->references('id')->on('course_category_type')->onDelete('cascade')->nullable();
            $table->foreignId('course_subcategory_id')->references('id')->on('course_subcategory')->onDelete('cascade')->nullable();
            $table->foreignId('course_id')->references('id')->on('course')->onDelete('cascade')->nullable();
            $table->foreignId('class_id')->references('id')->on('class')->onDelete('cascade')->nullable();
		});
    }

    public function down()
    {
        Schema::table('avaliation', function (Blueprint $table) {
			$table->dropColumn([ 'course_category_type_id' ]);
			$table->dropColumn([ 'course_subcategory_id' ]);
			$table->dropColumn([ 'course_id' ]);
			$table->dropColumn([ 'class_id' ]);
		});
    }
}
