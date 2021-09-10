<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePageModuleTable extends Migration
{
	/**
	* Run the migrations.
	*
	* @return void
	*/
	public function up()
	{
		if (!Schema::hasTable('page_module')) {
			Schema::create('page_module', function (Blueprint $table) {
				$table->id();
				$table->unsignedBigInteger('page_module_id')->nullable();

				$table->string('name_key', 64)->nullable();
				$table->string('icon', 255)->nullable();
				$table->string('desc', 64)->nullable();
				$table->integer('sequence')->nullable();

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
		Schema::dropIfExists('page_module');
	}
}
