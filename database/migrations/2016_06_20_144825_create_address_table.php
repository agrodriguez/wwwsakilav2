<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddressTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('address', function (Blueprint $table) {
            $table->smallIncrements('address_id');
            $table->string('address', 50);
            $table->string('address2', 50)->nullable()->default(null);
            $table->string('district', 20);
            $table->smallInteger('city_id', false, true)->index('idx_fk_city_id');
            $table->string('postal_code', 10)->nullable()->default(null);
            $table->string('phone', 20);
            $table->timestamp('last_update')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
            $table->foreign('city_id', 'fk_address_city')->references('city_id')->on('city')->onDelete('restrict')->onUpdate('cascade');
        });
        DB::statement('ALTER TABLE address ADD location POINT NOT NULL AFTER phone');
        DB::statement('ALTER TABLE address ADD SPATIAL INDEX `idx_location` (`location` ASC);');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::drop('address');
        Schema::enableForeignKeyConstraints();
    }
}
