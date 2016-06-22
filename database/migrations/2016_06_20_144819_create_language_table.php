<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLanguageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('language', function (Blueprint $table) {
            //$table->smallIncrements('language_id');
            // esto es para mantener con exactitud el mismo tipo de dtos de campo como en la base de datos original
            // ya qye laravel no cuenta con un metodo tinyIncrement
            $table->tinyInteger('language_id', true, true);
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
        Schema::drop('language');
    }
}
