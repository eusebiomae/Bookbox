<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentAddressTable extends Migration
{
	/**
	* Run the migrations.
	*
	* @return void
	*/
	public function up()
	{
		Schema::create('student_address', function (Blueprint $table) {
			$table->id();
			$table->foreignId('student_id')->nullable();
			$table->foreignId('country_id')->nullable();
			$table->foreignId('state_id')->nullable();
			$table->foreignId('city_id')->nullable();

			$table->string('zip_code', 9)->nullable();
			$table->string('neighborhood', 128)->nullable();
			$table->string('street', 128)->nullable();
			$table->string('number', 128)->nullable();
			$table->string('phone', 32)->nullable();
			$table->string('cellphone', 32)->nullable();

			$table->integer('created_by')->nullable();
			$table->integer('updated_by')->nullable();
			$table->integer('deleted_by')->nullable();
			$table->timestamps();
			$table->softDeletes();

		});
	}

	/**
	* Reverse the migrations.
	*
	* @return void
	*/
	public function down()
	{
		Schema::dropIfExists('student_address');
	}
}
