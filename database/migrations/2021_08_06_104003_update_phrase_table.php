<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class UpdatePhraseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('phrase')->updateOrInsert([ 'id' => 1 ], [ 'image' => 'movement.jpg']);
        DB::table('phrase')->updateOrInsert([ 'id' => 2 ], [ 'image' => 'woman.jpg']);
        DB::table('phrase')->updateOrInsert([ 'id' => 3 ], [ 'image' => '02.png']);
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
