<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScholarshipStudentTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		if (!Schema::hasTable('scholarship_student')) {
			Schema::create('scholarship_student', function (Blueprint $table) {
				$table->id();
				// $table->foreignId('student_id')->nullable()->references('id')->on('student');
				$table->foreignId('scholarship_id')->nullable()->references('id')->on('scholarship');
				$table->foreignId('scholarship_student_status_id')->nullable()->references('id')->on('scholarship_student_status');
				$table->foreignId('student_socioeconomic_id')->nullable()->references('id')->on('student_socioeconomic');

				$table->double('proficiency_note')->nullable();
				$table->double('socio_economic_note')->nullable();
				$table->integer('to_approve')->nullable();

				$table->string('code', 16)->nullable();
				$table->string('status', 16)->nullable();
				$table->foreignId('form_payment_id')->nullable()->references('id')->on('form_payment');
				$table->string('form_payment', 32)->nullable();
				$table->date('due_date')->nullable();

				$table->integer('number_parcel')->nullable();
				$table->double('value')->default(0)->nullable();
				$table->double('full_value')->nullable();

				$table->double('discount_value')->nullable();
				$table->double('discount_percentage')->nullable();

				$table->double('value_paid')->default(0)->nullable();
				$table->date('payment_date')->nullable();

				$table->date('birth_date')->nullable();
				$table->text('cardholder')->nullable();
				$table->text('cpf')->nullable();
				$table->text('number_card')->nullable();
				$table->text('security_code', 5)->nullable();
				$table->text('shelf_life', 5)->nullable();
				$table->string('email', 255)->nullable();
				$table->string('phone', 16)->nullable();
				$table->string('zip_code', 16)->nullable();
				$table->string('address_number', 96)->nullable();

				$table->string('asaas_token', 1024)->nullable();
				$table->string('asaas_payments_code', 32)->nullable();
				$table->string('asaas_customers_code', 32)->nullable();
				$table->mediumText('asaas_json')->nullable();
				$table->text('asaas_fine')->nullable();

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
		Schema::dropIfExists('scholarship_student');
	}
}
