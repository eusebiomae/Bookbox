<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('course', function (Blueprint $table) {
			$table->boolean('show_title')->nullable()->after('show_home');
			$table->string('cta', 15)->nullable()->after('description_es');
			$table->string('additional_information', 50)->nullable();
      $table->boolean('school_clinic')->nullable();
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('course', function (Blueprint $table) {
			$table->dropColumn('show_title');
			$table->dropColumn('cta');
			$table->dropColumn('school_clinic');
			$table->dropColumn('additional_information');
		});
    }
}
