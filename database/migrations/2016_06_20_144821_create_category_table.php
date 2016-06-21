<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category', function (Blueprint $table) {
            //$table->smallIncrements('category_id');
            // esto es para mantener con exactitud el mismo tipo de dtos de campo como en la base de datos original
            // ya qye laravel no cuenta con un metodo tinyIncrement
            $table->tinyInteger('category_id', true, true);
            $table->string('name', 25);
            $table->timestamp('last_update')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('category');
    }
}
