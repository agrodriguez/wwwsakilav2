<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFilmTextTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('film_text', function (Blueprint $table) {
            $table->smallInteger('film_id', false, true)->primary();
            $table->string('title', 255);
            $table->text('description');
        });
        DB::statement('ALTER TABLE film_text ADD FULLTEXT idx_title_description(title, description)');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::drop('film_text');
        Schema::enableForeignKeyConstraints();
    }
}
