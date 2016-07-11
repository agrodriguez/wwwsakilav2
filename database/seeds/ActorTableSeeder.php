<?php

use Illuminate\Database\Seeder;

class ActorTableSeeder extends Seeder
{
    /**
     * reun the seeder for the user
     *
     * @return void
     **/
    public function run()
    {

        // for individual use "php artisan db:seed --class=ActorTableSeeder"
        Schema::disableForeignKeyConstraints();
        
        DB::table('actor')->truncate();

        factory('App\Actor', 200)->create();

        Schema::enableForeignKeyConstraints();
    }
}
