<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterErrorAsaasTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('error_asaas', function (Blueprint $table) {
			$table->integer('scholarship_student_id')->unsigned()->nullable()->after('order_id');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down(Blueprint $table)
	{
		Schema::table('error_asaas', function (Blueprint $table) {
			$table->dropColumn('scholarship_student_id');
		});
	}
}
