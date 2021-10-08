<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class PopulateState extends Migration
{
    /**
    * Run the migrations.
    *
    * @return void
    */
    public function up()
    {
        //DB::Brasil

        DB::table('state')->updateOrInsert(['id'=> 1],['country_id'=> 1, 'initials'=>'AC', 'name'=> 'Acre', ]);
        DB::table('state')->updateOrInsert(['id'=> 2],['country_id'=> 1, 'initials'=>'AL', 'name'=> 'Alagoas', ]);
        DB::table('state')->updateOrInsert(['id'=> 3],['country_id'=> 1, 'initials'=>'AM', 'name'=> 'Amazonas', ]);
        DB::table('state')->updateOrInsert(['id'=> 4],['country_id'=> 1, 'initials'=>'AP', 'name'=> 'Amapá', ]);
        DB::table('state')->updateOrInsert(['id'=> 5],['country_id'=> 1, 'initials'=>'BA', 'name'=> 'Bahia', ]);
        DB::table('state')->updateOrInsert(['id'=> 6],['country_id'=> 1, 'initials'=>'CE', 'name'=> 'Ceará', ]);
        DB::table('state')->updateOrInsert(['id'=> 7],['country_id'=> 1, 'initials'=>'DF', 'name'=> 'Distrito Federal', ]);
        DB::table('state')->updateOrInsert(['id'=> 8],['country_id'=> 1, 'initials'=>'ES', 'name'=> 'Esprito Santo', ]);
        DB::table('state')->updateOrInsert(['id'=> 9],['country_id'=> 1, 'initials'=>'GO', 'name'=> 'Goiás', ]);
        DB::table('state')->updateOrInsert(['id'=> 10],['country_id'=> 1, 'initials'=>'MA', 'name'=> 'Maranhão', ]);
        DB::table('state')->updateOrInsert(['id'=> 11],['country_id'=> 1, 'initials'=>'MG', 'name'=> 'Minas Gerais', ]);
        DB::table('state')->updateOrInsert(['id'=> 12],['country_id'=> 1, 'initials'=>'MS', 'name'=> 'Mato Grosso do Sul', ]);
        DB::table('state')->updateOrInsert(['id'=> 13],['country_id'=> 1, 'initials'=>'MT', 'name'=> 'Mato Grosso', ]);
        DB::table('state')->updateOrInsert(['id'=> 14],['country_id'=> 1, 'initials'=>'PA', 'name'=> 'Pará', ]);
        DB::table('state')->updateOrInsert(['id'=> 15],['country_id'=> 1, 'initials'=>'PB', 'name'=> 'Paraíba', ]);
        DB::table('state')->updateOrInsert(['id'=> 16],['country_id'=> 1, 'initials'=>'PE', 'name'=> 'Pernambuco', ]);
        DB::table('state')->updateOrInsert(['id'=> 17],['country_id'=> 1, 'initials'=>'PI', 'name'=> 'Piauí', ]);
        DB::table('state')->updateOrInsert(['id'=> 18],['country_id'=> 1, 'initials'=>'PR', 'name'=> 'Paraná', ]);
        DB::table('state')->updateOrInsert(['id'=> 19],['country_id'=> 1, 'initials'=>'RJ', 'name'=> 'Rio de Janeiro', ]);
        DB::table('state')->updateOrInsert(['id'=> 20],['country_id'=> 1, 'initials'=>'RN', 'name'=> 'Rio Grande do Norte', ]);
        DB::table('state')->updateOrInsert(['id'=> 21],['country_id'=> 1, 'initials'=>'RO', 'name'=> 'Rondônia', ]);
        DB::table('state')->updateOrInsert(['id'=> 22],['country_id'=> 1, 'initials'=>'RR', 'name'=> 'Roraima', ]);
        DB::table('state')->updateOrInsert(['id'=> 23],['country_id'=> 1, 'initials'=>'RS', 'name'=> 'Rio Grande do Sul', ]);
        DB::table('state')->updateOrInsert(['id'=> 24],['country_id'=> 1, 'initials'=>'SC', 'name'=> 'Santa Catarina', ]);
        DB::table('state')->updateOrInsert(['id'=> 25],['country_id'=> 1, 'initials'=>'SE', 'name'=> 'Sergipe', ]);
        DB::table('state')->updateOrInsert(['id'=> 26],['country_id'=> 1, 'initials'=>'SP', 'name'=> 'São Paulo', ]);
        DB::table('state')->updateOrInsert(['id'=> 27],['country_id'=> 1, 'initials'=>'TO', 'name'=> 'Tocantins', ]);

    }


    /**
    * Reverse the migrations.
    *
    * @return void
    */
    public function down()
    {
        Schema::dropIfExists('populate_state');
    }
}
