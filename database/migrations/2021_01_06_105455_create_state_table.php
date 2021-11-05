<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStateTable extends Migration
{
    /**
    * Run the migrations.
    *
    * @return void
    */
    public function up()
    {
        if (!Schema::hasTable('state')) {
            Schema::create('state', function (Blueprint $table) {
                $table->id();
                $table->foreignId('country_id')->references('id')->on('country')->onDelete('cascade')->nullable();
                $table->string('initials', 5)->nullable(); //sigla
                $table->string('name', 50)->nullable();
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
        Schema::dropIfExists('state');
    }
}
