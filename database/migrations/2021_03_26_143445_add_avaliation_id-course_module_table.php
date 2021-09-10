<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAvaliationIdClassesTable extends Migration
{
	public function up()
	{
		Schema::table('classes', function (Blueprint $table) {
			$table->integer('avaliation_id')->unsigned()->nullable();
		});
		Schema::table('student_class_control', function (Blueprint $table) {
			$table->integer('avaliation_id')->unsigned()->nullable();
		});
	}

	public function down()
	{
		Schema::table('classes', function (Blueprint $table) {
			$table->dropColumn([ 'avaliation_id' ]);
		});
		Schema::table('student_class_control', function (Blueprint $table) {
			$table->dropColumn([ 'avaliation_id' ]);
		});
	}
}
