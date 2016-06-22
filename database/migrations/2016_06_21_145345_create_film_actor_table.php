<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFilmActorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('film_actor', function (Blueprint $table) {
            $table->smallInteger('actor_id', false, true);
            $table->smallInteger('film_id', false, true);//->index('idx_fk_film_id');
            $table->timestamp('last_update')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
            $table->primary(['actor_id', 'film_id']);
            $table->foreign('actor_id', 'fk_film_actor_actor')->references('actor_id')->on('actor')->onDelete('restrict')->onUpdate('cascade');
            $table->foreign('film_id', 'fk_film_actor_film')->references('film_id')->on('film')->onDelete('restrict')->onUpdate('cascade');
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
        Schema::drop('film_actor');
    }
}
