<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment', function (Blueprint $table) {
            $table->smallIncrements('paiment_id');
            $table->smallInteger('customer_id', false, true)->index('idx_fk_customer_id');
            $table->tinyInteger('staff_id', false, true)->index('idx_fk_staff_id');
            $table->integer('rental_id', false, true)->nullable()->default(null);
            $table->decimal('amount', 5, 2);
            $table->timestamp('payment_date');
            $table->timestamp('last_update')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
            $table->foreign('rental_id', 'fk_payment_rental')->references('rental_id')->on('rental')->onDelete('set null')->onUpdate('cascade');
            $table->foreign('customer_id', 'fk_payment_customer')->references('customer_id')->on('customer')->onDelete('restrict')->onUpdate('cascade');
            $table->foreign('staff_id', 'fk_payment_staff')->references('staff_id')->on('staff')->onDelete('restrict')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('payment');
    }
}
