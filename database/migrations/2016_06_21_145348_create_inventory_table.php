<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInventoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventory', function (Blueprint $table) {
            $table->mediumIncrements('inventory_id');
            $table->smallInteger('film_id', false, true)->index('idx_fk_film_id');
            $table->tinyInteger('store_id', false, true)->index('idx_store_id_film_id');
            $table->timestamp('last_update')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
            $table->foreign('store_id', 'fk_inventory_store')->references('store_id')->on('store')->onDelete('restrict')->onUpdate('cascade');
            $table->foreign('film_id', 'fk_inventory_film')->references('film_id')->on('film')->onDelete('restrict')->onUpdate('cascade');
        });

        Schema::table('rental', function ($table) {
            $table->foreign('inventory_id', 'fk_rental_inventory')->references('inventory_id')->on('inventory')->onDelete('restrict')->onUpdate('cascade');
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
        Schema::drop('inventory');
    }
}
