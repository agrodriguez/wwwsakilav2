<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFilmTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('film', function (Blueprint $table) {
            $table->smallIncrements('film_id');
            $table->string('title', 255)->index('idx_title');
            $table->text('description')->nullable()->default(null);
            //$table->smallInteger('release_year', false, true)->nullable()->default(null);
            $table->tinyInteger('language_id', false, true)->index('idx_fk_language_id');
            $table->tinyInteger('original_language_id', false, true)->nullable()->default(null)->index('idx_fk_original_language_id');
            $table->tinyInteger('rental_duration', false, true)->default(3);
            $table->decimal('rental_rate', 4, 2)->default(4.99);
            $table->smallInteger('length', false, true)->nullable()->default(null);
            $table->decimal('replacement_cost', 5, 2)->default(19.99);
            $table->enum('rating', ['G', 'PG', 'PG-13', 'R', 'NC-17'])->default('G');
            //$table->text('special_features')->nullable()->default(null);
            $table->timestamp('last_update')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
            $table->foreign('language_id', 'fk_film_language')->references('language_id')->on('language')->onDelete('restrict')->onUpdate('cascade');
            $table->foreign('original_language_id', 'fk_film_language_original')->references('language_id')->on('language')->onDelete('restrict')->onUpdate('cascade');
        });
        DB::statement('ALTER TABLE film ADD release_year YEAR DEFAULT NULL AFTER description');
        DB::statement('ALTER TABLE film ADD special_features SET(\'Trailers\', \'Commentaries\', \'Deleted Scenes\', \'Behind the Scenes\') NULL DEFAULT NULL AFTER rating');

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::drop('film');
        Schema::enableForeignKeyConstraints();
    }
}
