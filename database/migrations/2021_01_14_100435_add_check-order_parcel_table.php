<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCheckOrderParcelTable extends Migration
{
	/**
	* Run the migrations.
	*
	* @return void
	*/
	public function up() {
		Schema::table('order_parcel', function (Blueprint $table) {
			$table->double('value_check', 11, 2)->nullable();
			$table->integer('number_check')->nullable();
			$table->date('pre_dated_to')->nullable();

			$table->text('receipt_file')->nullable();
		});
	}

	/**
	* Reverse the migrations.
	*
	* @return void
	*/
	public function down() {
		Schema::table('order_parcel', function (Blueprint $table) {
			$table->dropColumn([
				'value_check',
				'number_check',
				'pre_dated_to',
				'receipt_file',
			]);
		});
	}
}
