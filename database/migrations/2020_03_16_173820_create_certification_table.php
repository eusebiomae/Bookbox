<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCertificationTable extends Migration
{
	public function up() {
		if (!Schema::hasTable('certification')) {
			Schema::create('certification', function(Blueprint $table) {
				$table->increments('id');

				$table->string('title_pt', 128)->nullable();
				$table->text('image', 450)->nullable();
				$table->text('description_pt')->nullable();


				$table->integer('created_by')->nullable();
				$table->integer('updated_by')->nullable();
				$table->integer('deleted_by')->nullable();
				$table->timestamps();
				$table->softDeletes();



			});
		}
	}

	public function down()
	{
		Schema::dropIfExists('certification');
	}
}
