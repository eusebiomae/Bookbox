<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class PopulateStateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('state')->delete();

        DB::table('state')->updateOrInsert([ 'initials' => 'AC' ], [ 'country_id' => 1, 'name' => 'Acre' ]);
        DB::table('state')->updateOrInsert([ 'initials' => 'AL' ], [ 'country_id' => 1, 'name' => 'Alagoas' ]);
        DB::table('state')->updateOrInsert([ 'initials' => 'AP' ], [ 'country_id' => 1, 'name' => 'Amapá' ]);
        DB::table('state')->updateOrInsert([ 'initials' => 'AM' ], [ 'country_id' => 1, 'name' => 'Amazonas' ]);
        DB::table('state')->updateOrInsert([ 'initials' => 'BA' ], [ 'country_id' => 1, 'name' => 'Bahia' ]);
        DB::table('state')->updateOrInsert([ 'initials' => 'CE' ], [ 'country_id' => 1, 'name' => 'Ceará' ]);
        DB::table('state')->updateOrInsert([ 'initials' => 'DF' ], [ 'country_id' => 1, 'name' => 'Distrito Federal' ]);
        DB::table('state')->updateOrInsert([ 'initials' => 'ES' ], [ 'country_id' => 1, 'name' => 'Espírito Santo' ]);
        DB::table('state')->updateOrInsert([ 'initials' => 'GO' ], [ 'country_id' => 1, 'name' => 'Goiás' ]);
        DB::table('state')->updateOrInsert([ 'initials' => 'MA' ], [ 'country_id' => 1, 'name' => 'Maranhão' ]);
        DB::table('state')->updateOrInsert([ 'initials' => 'MT' ], [ 'country_id' => 1, 'name' => 'Mato Grosso' ]);
        DB::table('state')->updateOrInsert([ 'initials' => 'MS' ], [ 'country_id' => 1, 'name' => 'Mato Grosso do Sul' ]);
        DB::table('state')->updateOrInsert([ 'initials' => 'MG' ], [ 'country_id' => 1, 'name' => 'Minas Gerais' ]);
        DB::table('state')->updateOrInsert([ 'initials' => 'PA' ], [ 'country_id' => 1, 'name' => 'Pará' ]);
        DB::table('state')->updateOrInsert([ 'initials' => 'PB' ], [ 'country_id' => 1, 'name' => 'Paraíba' ]);
        DB::table('state')->updateOrInsert([ 'initials' => 'PR' ], [ 'country_id' => 1, 'name' => 'Paraná' ]);
        DB::table('state')->updateOrInsert([ 'initials' => 'PE' ], [ 'country_id' => 1, 'name' => 'Pernambuco' ]);
        DB::table('state')->updateOrInsert([ 'initials' => 'PI' ], [ 'country_id' => 1, 'name' => 'Piauí' ]);
        DB::table('state')->updateOrInsert([ 'initials' => 'RJ' ], [ 'country_id' => 1, 'name' => 'Rio de Janeiro' ]);
        DB::table('state')->updateOrInsert([ 'initials' => 'RN' ], [ 'country_id' => 1, 'name' => 'Rio Grande do Norte' ]);
        DB::table('state')->updateOrInsert([ 'initials' => 'RS' ], [ 'country_id' => 1, 'name' => 'Rio Grande do Sul' ]);
        DB::table('state')->updateOrInsert([ 'initials' => 'RO' ], [ 'country_id' => 1, 'name' => 'Rôndonia' ]);
        DB::table('state')->updateOrInsert([ 'initials' => 'RR' ], [ 'country_id' => 1, 'name' => 'Roraima' ]);
        DB::table('state')->updateOrInsert([ 'initials' => 'SC' ], [ 'country_id' => 1, 'name' => 'Santa Catarina' ]);
        DB::table('state')->updateOrInsert([ 'initials' => 'SP' ], [ 'country_id' => 1, 'name' => 'São Paulo' ]);
        DB::table('state')->updateOrInsert([ 'initials' => 'SE' ], [ 'country_id' => 1, 'name' => 'Sergipe' ]);
        DB::table('state')->updateOrInsert([ 'initials' => 'TO' ], [ 'country_id' => 1, 'name' => 'Tocantins' ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::table('state')->delete();
    }
}
