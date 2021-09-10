<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUserProfileIdUserTable extends Migration
{
	/**
	* Run the migrations.
	*
	* @return void
	*/
	public function up()
	{
		Schema::table('user', function (Blueprint $table) {
			$table->unsignedBigInteger('user_profile_id')->nullable();
			$table->foreign('user_profile_id')->references('id')->on('user_profile');
		});
	}

	/**
	* Reverse the migrations.
	*
	* @return void
	*/
	public function down()
	{
		Schema::table('user', function (Blueprint $table) {
			$table->dropForeign([ 'user_profile_id' ]);
			$table->dropColumn([ 'user_profile_id' ]);
		});
	}
}
