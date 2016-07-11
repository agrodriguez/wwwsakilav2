<?php

use Illuminate\Database\Seeder;

class AddressTableSeeder extends Seeder
{
    /**
     * reun the seeder for the user
     *
     * @return void
     **/
    public function run()
    {
        // for individual use "php artisan db:seed --class=AddressTableSeeder"
        Schema::disableForeignKeyConstraints();
        
        DB::table('address')->truncate();

        factory('App\Address', 605)->create();

        Schema::enableForeignKeyConstraints();
    }
}
