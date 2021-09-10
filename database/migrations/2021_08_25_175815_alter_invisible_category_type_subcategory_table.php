<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterInvisibleCategoryTypeSubcategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::table('course_category', function (Blueprint $table) {
        //     $table->boolean('invisible')->nullable();
        //     $table->boolean('invisible_connected')->nullable()->comment('Valor = 1 ? Bolsas e cursos com tal categoria ficarão invisíveis');
        // });

        // Schema::table('course_category_type', function (Blueprint $table) {
        //     $table->boolean('invisible')->nullable();
        //     $table->boolean('invisible_connected')->nullable()->comment('Valor = 1 ? Bolsas e cursos com tal tipo de categoria ficarão invisíveis');
        // });

        // Schema::table('course_subcategory', function (Blueprint $table) {
        //     $table->boolean('invisible')->nullable();
        //     $table->boolean('invisible_connected')->nullable()->comment('Valor = 1 ? Bolsas e cursos com tal subcategoria ficarão invisíveis');
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('course_category', function (Blueprint $table) {
            $table->dropColumn('invisible');
            $table->dropColumn('invisible_connected');
        });

        Schema::table('course_category_type', function (Blueprint $table) {
            $table->dropColumn('invisible');
            $table->dropColumn('invisible_connected');
        });

        Schema::table('course_subcategory', function (Blueprint $table) {
            $table->dropColumn('invisible');
            $table->dropColumn('invisible_connected');
        });
    }
}
