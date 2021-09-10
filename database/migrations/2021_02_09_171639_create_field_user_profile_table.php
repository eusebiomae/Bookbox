<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFieldUserProfileTable extends Migration
{
	/**
	* Run the migrations.
	*
	* @return void
	*/
	public function up()
	{
		if (!Schema::hasTable('field_user_profile')) {
			Schema::create('field_user_profile', function (Blueprint $table) {
				$table->id();

				$table->unsignedBigInteger('page_module_id')->nullable();
				$table->unsignedBigInteger('page_config_id')->nullable();
				$table->unsignedBigInteger('field_page_config_id')->nullable();
				$table->unsignedBigInteger('user_profile_id')->nullable();
				$table->unsignedBigInteger('user_id')->nullable();

				$table->integer('create')->nullable();
				$table->integer('read')->nullable();
				$table->integer('update')->nullable();
				$table->integer('delete')->nullable();

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
		Schema::dropIfExists('field_user_profile');
	}
}
