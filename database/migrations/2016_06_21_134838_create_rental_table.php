<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRentalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rental', function (Blueprint $table) {
            $table->increments('rental_id');
            $table->timestamp('rental_date');
            $table->mediumInteger('inventory_id', false, true)->index('idx_fk_inventory_id');
            $table->smallInteger('customer_id', false, true)->index('idx_fk_customer_id');
            $table->timestamp('return_date')->nullable()->default(null);
            $table->tinyInteger('staff_id', false, true)->index('idx_fk_staff_id');
            $table->timestamp('last_update')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
            $table->unique(['rental_date', 'inventory_id', 'customer_id']);
            $table->foreign('staff_id', 'fk_rental_staff')->references('staff_id')->on('staff')->onDelete('restrict')->onUpdate('cascade');
            //
            $table->foreign('inventory_id', 'fk_rental_inventory')->references('inventory_id')->on('inventory')->onDelete('restrict')->onUpdate('cascade');
            $table->foreign('customer_id', 'fk_rental_customer')->references('customer_id')->on('customer')->onDelete('restrict')->onUpdate('cascade');
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
        Schema::drop('rental');
        Schema::enableForeignKeyConstraints();
    }
}
