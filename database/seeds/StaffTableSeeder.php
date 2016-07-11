<?php

use Illuminate\Database\Seeder;

class StaffTableSeeder extends Seeder
{
    /**
     * reun the seeder for the user
     *
     * @return void
     **/
    public function run()
    {
        //factory('App\Staff', 2)->create();

        
        /**
         * default staff
         */
        // for individual use "php artisan db:seed --class=StaffTableSeeder"
        Schema::disableForeignKeyConstraints();
        
        DB::table('staff')->truncate();
        
        App\Staff::create([
            'first_name' => 'Mike',
            'last_name' => 'Hillyer',
            'address_id' => 3,
            'email' => 'Mike.Hillyer@sakilastaff.com',
            'picture' => null,
            'store_id' => 1,
            'active' => 1,
            'username' => 'Mike',
            'password' => bcrypt('111111'),
        ]);

        App\Staff::create([
            'first_name' => 'Jon',
            'last_name' => 'Stephens',
            'address_id' => 4,
            'email' => 'Jon.Stephens@sakilastaff.com',
            'picture' => null,
            'store_id' => 2,
            'active' => 1,
            'username' => 'Jon',
            'password' => bcrypt('111111'),
        ]);
        
        Schema::enableForeignKeyConstraints();

    }
}
