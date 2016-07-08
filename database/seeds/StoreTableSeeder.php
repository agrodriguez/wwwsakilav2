<?php

use Illuminate\Database\Seeder;

class StoreTableSeeder extends Seeder
{
    /**
     * reun the seeder for the user
     *
     * @return void
     **/
    public function run()
    {
        //factory('App\Store', 2)->create();        
        
        App\Store::create([
            'manager_staff_id' => 1,
            'address_id' => 1,
        ]);

        App\Store::create([
            'manager_staff_id' => 2,
            'address_id' => 2,
        ]);
                
    }
}
