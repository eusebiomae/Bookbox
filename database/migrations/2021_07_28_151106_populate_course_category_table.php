<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class PopulateCourseCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('course_category')->updateOrInsert([ 'id' => 1 ], [ 'color' => '#27f0ff']);
        DB::table('course_category')->updateOrInsert([ 'id' => 2 ], [ 'color' => '#00fece']);
        DB::table('course_category')->updateOrInsert([ 'id' => 3 ], [ 'color' => '#00ff05']);
        DB::table('course_category')->updateOrInsert([ 'id' => 4 ], [ 'color' => '#cc8aff']);
        DB::table('course_category')->updateOrInsert([ 'id' => 5 ], [ 'color' => '#f1e600']);
        DB::table('course_category')->updateOrInsert([ 'id' => 6 ], [ 'color' => '#f39200']);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
