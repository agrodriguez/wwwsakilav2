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
            $table->smallInteger('film_id', false, true);
            $table->string('title', 255);
            $table->text('description')->index('idx_title_description');
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
        Schema::drop('film_text');
    }
}
