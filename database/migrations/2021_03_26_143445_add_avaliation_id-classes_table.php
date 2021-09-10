<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAvaliationIdCourseModuleTable extends Migration
{
    public function up()
    {
        Schema::table('course_module', function (Blueprint $table) {
            $table->integer('avaliation_id')->unsigned()->nullable();
		});
    }

    public function down()
    {
        Schema::table('course_module', function (Blueprint $table) {
            $table->dropColumn([ 'avaliation_id' ]);
        });
    }
}
