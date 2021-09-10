<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFlgCorrectAlternativeTable extends Migration
{
    public function up()
    {
        Schema::table('alternative', function (Blueprint $table) {
            $table->string('flg_correct', 1)->nullable();
		});
    }

    public function down()
    {
        Schema::table('alternative', function (Blueprint $table) {
            $table->dropColumn([ 'flg_correct' ]);
        });
    }
}
