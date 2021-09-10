<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCheckOrderTable extends Migration
{
	/**
	* Run the migrations.
	*
	* @return void
	*/
	public function up()
	{
		Schema::table('order', function (Blueprint $table) {
			$table->double('value_check', 11, 2)->nullable();
			$table->integer('number_check')->nullable();
			$table->date('pre_dated_to')->nullable();

			$table->text('receipt_file')->nullable();
			$table->integer('days_delay')->nullable();

			$table->integer('financial_credit')->nullable();
			$table->integer('hours_credit')->nullable();
			$table->integer('transfer_order_id')->unsigned()->nullable();
			$table->double('fine_value', 11, 2)->nullable();
			$table->string('link_payment_of_fine', 512)->nullable();
			$table->string('formpayment_of_fine', 16)->nullable();
		});
	}

	/**
	* Reverse the migrations.
	*
	* @return void
	*/
	public function down()
	{
		Schema::table('order', function (Blueprint $table) {
			$table->dropColumn([
				'value_check',
				'number_check',
				'pre_dated_to',
				'receipt_file',
				'days_delay',
				'financial_credit',
				'hours_credit',
				'transfer_order_id',
				'fine_value',
				'link_payment_of_fine',
				'formpayment_of_fine',
			]);
		});
	}
}
