<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOtherInfTable extends Migration
{
	/**
	* Run the migrations.
	*
	* @return void
	*/
	public function up()
	{
		if (!Schema::hasTable('other_inf')) {
			Schema::create('other_inf', function (Blueprint $table) {
				$table->increments('id');
				$table->string('title', 45)->nullable();
				$table->text('description')->nullable();
				$table->integer('other_inf_type_id')->unsigned()->nullable();
				$table->string('img', 255)->nullable();

				$table->integer('created_by')->nullable();
				$table->integer('updated_by')->nullable();
				$table->integer('deleted_by')->nullable();
				$table->timestamps();
				$table->softDeletes();

				$table->foreign('other_inf_type_id')
				->references('id')
				->on('other_inf_type');

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
		Schema::dropIfExists('other_inf');
	}
}
