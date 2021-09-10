<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class PopulateAvaliationTypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('avaliation_type')->insert([ 'id' => 1, 'name' => 'Avaliação Curricular' ]);
        DB::table('avaliation_type')->insert([ 'id' => 2, 'name' => 'Recuperação' ]);
        DB::table('avaliation_type')->insert([ 'id' => 3, 'name' => 'Formulação de Caso' ]);
        DB::table('avaliation_type')->insert([ 'id' => 4, 'name' => 'Seminário' ]);
        DB::table('avaliation_type')->insert([ 'id' => 5, 'name' => 'Relatório Final' ]);
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
