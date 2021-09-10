<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddInformedReceiptOrderTable extends Migration
{
	/**
	* Run the migrations.
	*
	* @return void
	*/
	public function up() {
		Schema::table('order', function (Blueprint $table) {
			$table->string('informed_receipt', 32)->nullable();
		});
	}

	/**
	* Reverse the migrations.
	*
	* @return void
	*/
	public function down() {
		Schema::table('order', function (Blueprint $table) {
			$table->dropColumn([ 'informed_receipt' ]);
		});
	}
}
