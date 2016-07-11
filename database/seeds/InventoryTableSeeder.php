<?php

use Illuminate\Database\Seeder;

class InventoryTableSeeder extends Seeder
{
    /**
     * reun the seeder for the user
     *
     * @return void
     **/
    public function run()
    {
        // for individual use "php artisan db:seed --class=InventoryTableSeeder"
        Schema::disableForeignKeyConstraints();
        
        DB::table('inventory')->truncate();
        //4600
        factory('App\Inventory', 2300)->create();

        Schema::enableForeignKeyConstraints();
    }
}
