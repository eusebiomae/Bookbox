<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class PopulateScholarshipStudentStatusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('scholarship_student_status')->insert([ 'id' => 1, 'name' => 'Aprovado' ]);
        DB::table('scholarship_student_status')->insert([ 'id' => 2, 'name' => 'Cancelado' ]);
        DB::table('scholarship_student_status')->insert([ 'id' => 3, 'name' => 'Pendente' ]);
        DB::table('scholarship_student_status')->insert([ 'id' => 4, 'name' => 'Reprovado' ]);
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
