<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderTable extends Migration
{
	public function up() {
		if (!Schema::hasTable('order')) {
			Schema::create('order', function(Blueprint $table) {
				$table->increments('id');
				$table->string('code', 16)->nullable();
				$table->string('status', 3)->default('PE');
				$table->integer('order_id')->unsigned()->nullable();
				$table->integer('student_id')->unsigned()->nullable();
				$table->integer('course_id')->unsigned()->nullable();
				$table->integer('class_id')->unsigned()->nullable();
				$table->integer('course_form_payment_id')->unsigned()->nullable();
				$table->integer('form_payment_id')->unsigned()->nullable();
				$table->integer('bank_id')->unsigned()->nullable();
				$table->integer('supervision_id')->unsigned()->nullable();
				$table->integer('course_discount_id')->unsigned()->nullable();
				$table->integer('company_id')->unsigned()->nullable();
				$table->integer('responsible_id')->unsigned()->nullable();

				$table->string('form_payment', 32)->nullable();
				$table->date('due_date')->nullable();

				$table->integer('number_parcel')->nullable();
				$table->double('value', 11, 2)->default(0)->nullable();
				$table->double('full_value', 11, 2)->nullable();

				$table->double('discount_value', 11, 2)->nullable();
				$table->double('discount_percentage', 11, 2)->nullable();

				$table->double('value_paid', 11, 2)->default(0)->nullable();
				$table->timestamp('payday')->nullable();

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
				$table->longText('contract')->nullable();

				$table->date('register_date')->nullable();
				$table->integer('repetition')->nullable();
				$table->integer('permanence')->nullable();
				$table->string('expiration_day', 2)->nullable();
				$table->string('permanence_all', 1)->nullable();

				$table->string('asaas_payments_code', 32)->nullable();
				$table->string('asaas_customers_code', 32)->nullable();
				$table->mediumText('asaas_json')->nullable();
				$table->text('asaas_fine')->nullable();
				$table->string('imported', 1)->nullable();

				$table->string('status_matriculation', 3)->nullable();
				$table->string('status_cash', 10)->nullable();

				$table->integer('created_by')->nullable();
				$table->integer('updated_by')->nullable();
				$table->integer('deleted_by')->nullable();
				$table->timestamps();
				$table->softDeletes();

				$table->foreign('order_id')
					->references('id')
					->on('order');

				$table->foreign('student_id')
					->references('id')
					->on('student');

				$table->foreign('course_id')
					->references('id')
					->on('course');

				$table->foreign('class_id')
					->references('id')
					->on('class');

				$table->foreign('course_form_payment_id')
					->references('id')
					->on('course_form_payment');

				$table->foreign('form_payment_id')
					->references('id')
					->on('form_payment');

				$table->foreign('bank_id')
					->references('id')
					->on('bank');

				$table->foreign('company_id')
					->references('id')
					->on('school_information');
			});
		}
	}

	public function down()
	{
		Schema::dropIfExists('order');
	}
}
