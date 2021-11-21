<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCityTable extends Migration
{
    /**
    * Run the migrations.
    *
    * @return void
    */
    public function up()
    {
        if (!Schema::hasTable('city')) {
            Schema::create('city', function (Blueprint $table) {
                $table->id();
                $table->foreignId('country_id')->references('id')->on('country')->onDelete('cascade')->nullable();
                $table->foreignId('state_id')->references('id')->on('state')->onDelete('cascade')->nullable();
                $table->string('name', 150)->nullable();
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
        Schema::dropIfExists('city');
    }
}
