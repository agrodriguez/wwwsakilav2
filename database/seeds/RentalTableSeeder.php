<?php

use Illuminate\Database\Seeder;

class RentalTableSeeder extends Seeder
{
    /**
     * reun the seeder for the user
     *
     * @return void
     **/
    public function run()
    {
        factory('App\Rental', 16050)->create();
    }
}
