<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderItemTable extends Migration
{
	/**
	* Run the migrations.
	*
	* @return void
	*/
	public function up()
	{
		if (!Schema::hasTable('order_item')) {
			Schema::create('order_item', function (Blueprint $table) {
				$table->id();
				$table->foreignId('order_id')->nullable()->references('id')->on('order')->onDelete('cascade');
				$table->foreignId('item_id')->nullable()->references('id')->on('course')->onDelete('cascade');
				$table->double('amount')->nullable();

				$table->integer('created_by')->nullable();
				$table->integer('updated_by')->nullable();
				$table->integer('deleted_by')->nullable();
				$table->timestamps();
				$table->softDeletes();
			});
		}
	}

	/**
	* Reverse the migrations.
	*
	* @return void
	*/
	public function down()
	{
		Schema::dropIfExists('order_item');
	}
}
