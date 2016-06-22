<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFilmCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('film_category', function (Blueprint $table) {
            $table->smallInteger('film_id', false, true);
            $table->tinyInteger('category_id', false, true);
            $table->timestamp('last_update')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
            $table->primary(['film_id', 'category_id']);
            $table->foreign('film_id', 'fk_film_category_film')->references('film_id')->on('film')->onDelete('restrict')->onUpdate('cascade');
            $table->foreign('category_id', 'fk_film_category_category')->references('category_id')->on('category')->onDelete('restrict')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::drop('film_category');
    }
}
