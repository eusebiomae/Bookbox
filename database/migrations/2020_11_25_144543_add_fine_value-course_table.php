<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFineValueCourseTable extends Migration
{
	/**
	* Run the migrations.
	*
	* @return void
	*/
	public function up()
	{
		Schema::table('course', function (Blueprint $table) {
			$table->double('fine_value', 11, 2);
		});
	}

	/**
	* Reverse the migrations.
	*
	* @return void
	*/
	public function down()
	{
		Schema::table('course', function (Blueprint $table) {
			$table->dropColumn([ 'fine_value' ]);
		});
	}
}
