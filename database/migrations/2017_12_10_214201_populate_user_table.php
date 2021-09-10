<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class PopulateUserTable extends Migration
{
	/**
	* Run the migrations.
	*
	* @return void
	*/
	public function up(){
		DB::table('user')->insert(array('name'=>'Administrador', 'user_name'=>'admin', 'email'=>'joel.zanata@gigapixel.com.br', 'password'=>'$2y$10$zJ2OXPXl62q1gz6orRU14.mlysv.tUP.nLqxbpkTSiC57siH0atWe', 'user_type_id'=>'1'));
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
