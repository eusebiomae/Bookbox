<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFieldPageConfigTable extends Migration
{
	/**
	* Run the migrations.
	*
	* @return void
	*/
	public function up()
	{
		if (!Schema::hasTable('field_page_config')) {
			Schema::create('field_page_config', function (Blueprint $table) {
				$table->id();
				$table->unsignedBigInteger('page_config_id')->nullable();

				$table->string('column', 24)->nullable();
				$table->string('label', 24)->nullable();
				$table->string('type', 24)->nullable();
				$table->integer('maxlength')->unsigned()->nullable();
				$table->text('default_value');
				$table->integer('required')->nullable();
				$table->integer('readonly')->nullable();
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
		Schema::dropIfExists('field_page_config');
	}
}
