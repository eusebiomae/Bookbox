<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCourseSubcategoryCourseFormPaymentTable extends Migration
{
	/**
	* Run the migrations.
	*
	* @return void
	*/
	public function up()
	{
		Schema::table('course_form_payment', function (Blueprint $table) {
			$table->integer('course_subcategory_id')->unsigned()->nullable();
			$table->date('date')->nullable();
		});
	}

	/**
	* Reverse the migrations.
	*
	* @return void
	*/
	public function down()
	{
		Schema::table('course_form_payment', function (Blueprint $table) {
			$table->dropColumn([ 'course_subcategory_id', 'date' ]);
		});
	}
}
