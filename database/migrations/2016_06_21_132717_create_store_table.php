<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStoreTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('store', function (Blueprint $table) {
            $table->tinyInteger('store_id', true, true);
            $table->tinyInteger('manager_staff_id', false, true)->unique('idx_unique_manager');
            $table->smallInteger('address_id', false, true)->index('idx_fk_address_id');
            $table->timestamp('last_update')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
            //
            $table->foreign('manager_staff_id', 'fk_store_staff')->references('staff_id')->on('staff')->onDelete('restrict')->onUpdate('cascade');
            $table->foreign('address_id', 'fk_store_address')->references('address_id')->on('address')->onDelete('restrict')->onUpdate('cascade');
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
        Schema::drop('store');
        Schema::enableForeignKeyConstraints();
    }
}
