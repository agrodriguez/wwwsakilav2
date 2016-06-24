<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer', function (Blueprint $table) {
            $table->smallIncrements('customer_id');
            $table->tinyInteger('store_id', false, true)->index('idx_fk_store_id');
            $table->string('first_name', 45);
            $table->string('last_name', 45)->index('idx_last_name');
            $table->string('email', 50)->nullable()->default(null);
            $table->smallInteger('address_id', false, true)->index('idx_fk_address_id');
            $table->boolean('active')->default(true);
            $table->timestamp('create_date');
            $table->timestamp('last_update')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
            $table->foreign('address_id', 'fk_customer_address')->references('address_id')->on('address')->onDelete('restrict')->onUpdate('cascade');
            $table->foreign('store_id', 'fk_customer_store')->references('store_id')->on('store')->onDelete('restrict')->onUpdate('cascade');
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
        Schema::drop('customer');
    }
}
