<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentSocioeconomicTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		if (!Schema::hasTable('student_socioeconomic')) {
			Schema::create('student_socioeconomic', function (Blueprint $table) {
				$table->id();
				// $table->foreignId('student_id')->nullable()->references('id')->on('student')->onDelete('cascade');
				$table->integer('marital_status')->nullable();
				$table->string('profession', 125)->nullable();
				$table->double('salary')->nullable();
				$table->double('rent_income')->nullable();
				$table->double('alimony')->nullable();
				$table->double('financial_investments')->nullable();
				$table->double('total_family_income')->nullable();
				$table->double('others_income')->nullable();
				$table->double('feeding')->nullable();
				$table->double('water')->nullable();
				$table->double('energy')->nullable();
				$table->double('phone_or_cell_phone')->nullable();
				$table->double('internet')->nullable();
				$table->double('gas')->nullable();
				$table->double('transport_or_fuel')->nullable();
				$table->double('financing_or_consortium')->nullable();
				$table->double('health_or_dental_plan')->nullable();
				$table->double('domestic_workers')->nullable();
				$table->double('leisure')->nullable();
				$table->double('clothing')->nullable();
				$table->double('medication')->nullable();
				$table->double('others_expenses')->nullable();
				$table->integer('home')->nullable();
				$table->double('house_financing')->nullable();
				$table->double('house_rent')->nullable();
				$table->double('iptu')->nullable();
				$table->double('condominium')->nullable();
				$table->integer('amount_car')->nullable();
				$table->double('price_total_cars')->nullable();
				$table->integer('amount_motorcycles')->nullable();
				$table->double('price_total_motorcycles')->nullable();
				$table->integer('amount_others')->nullable();
				$table->double('price_total_others')->nullable();
				$table->integer('amount_adults')->nullable();
				$table->integer('amount_children')->nullable();
				$table->integer('amount_pregnant')->nullable();
				$table->integer('amount_seniors')->nullable();
				$table->integer('people_with_special_needs')->nullable();
				$table->timestamps();
				$table->softDeletes();
				$table->integer('created_by')->nullable();
				$table->integer('updated_by')->nullable();
				$table->integer('deleted_by')->nullable();
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
		Schema::dropIfExists('student_socioeconomic');
	}
}
