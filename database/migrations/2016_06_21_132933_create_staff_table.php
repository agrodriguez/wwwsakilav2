<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStaffTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('staff', function (Blueprint $table) {
            $table->tinyInteger('staff_id', true, true);
            $table->string('first_name', 45);
            $table->string('last_name', 45);
            $table->smallInteger('address_id', false, true)->index('idx_fk_address_id');
            $table->binary('picture')->nullable()->default(null);
            $table->string('email', 50)->nullable()->default(null);
            $table->tinyInteger('store_id', false, true)->index('idx_fk_store_id');
            $table->boolean('active')->default(true);
            $table->string('username', 16);
            $table->string('password', 255)->nullable()->default(null);// password VARCHAR(40) BINARY DEFAULT NULL,
            $table->timestamp('last_update')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
            $table->foreign('address_id', 'fk_staff_address')->references('address_id')->on('address')->onDelete('restrict')->onUpdate('cascade');
            $table->foreign('store_id', 'fk_staff_store')->references('store_id')->on('store')->onDelete('restrict')->onUpdate('cascade');
        });

        Schema::table('store', function ($table) {
            $table->foreign('manager_staff_id', 'fk_store_staff')->references('staff_id')->on('staff')->onDelete('restrict')->onUpdate('cascade');
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
        Schema::drop('staff');
    }
}
