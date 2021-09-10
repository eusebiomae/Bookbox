<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStatusCourseSupervisionTable extends Migration
{
	/**
	* Run the migrations.
	*
	* @return void
	*/
	public function up() {
		Schema::table('course_supervision', function (Blueprint $table) {
			$table->string('status', 3)->default('A');
		});
	}

	/**
	* Reverse the migrations.
	*
	* @return void
	*/
	public function down()
	{
		Schema::table('course_supervision', function (Blueprint $table) {
			$table->dropColumn([ 'status' ]);
		});
	}
}
