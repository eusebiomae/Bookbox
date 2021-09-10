<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddScoreCategoryIdQuestionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('question', function (Blueprint $table) {
			$table->double('score', 11, 2)->default(1);
            $table->foreignId('category_id')->nullable()->references('id')->on('course_category')->onDelete('cascade');
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('question', function (Blueprint $table) {
			$table->dropColumn([ 'score' ]);
			$table->dropColumn([ 'category_id' ]);
		});
    }
}
