<?php

use Illuminate\Database\Seeder;

class CustomerTableSeeder extends Seeder
{
    /**
     * reun the seeder for the user
     *
     * @return void
     **/
    public function run()
    {
        // for individual use "php artisan db:seed --class=CustomerTableSeeder"
        Schema::disableForeignKeyConstraints();
        
        DB::table('customer')->truncate();

        /**
         * Could have used
         * factory('App\Customer', 600)->create();
         *
         * but deecided for seeding these values
         * using sequential addres id
         * from the factory
         *
         **/
        $faker = Faker\Factory::create();
        for ($i=5; $i < 606; $i++) {
            App\Customer::create([
                'store_id' => $faker->numberBetween(1, 2),
                'first_name' => $faker->firstName(),
                'last_name' => $faker->lastName,
                'email' => $faker->email,
                'address_id' => $i,
                'active' => 1,
                'create_date' => $faker->date(),
            ]);
        };

        Schema::enableForeignKeyConstraints();
        
    }
}
