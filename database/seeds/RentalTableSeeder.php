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
        /**
         * Could have used
         * factory('App\Rental', 16050)->create();
         *
         * but deecided for seeding these values
         * using the same customer and staff
         * for the same rental and payment
         *
         **/
        //16050
        $faker = Faker\Factory::create();
        for ($i=5; $i < 1650; $i++) {
            $customer_id = $faker->numberBetween(1, 600);
            $staff_id = $faker->numberBetween(1, 2);
            $date = $faker->dateTimeThisDecade();

            App\Rental::create([
                'rental_id' => $i,
                'rental_date' => $date->format('Y-m-d'),
                'inventory_id' => $faker->numberBetween(1, 2300),
                'customer_id' => $customer_id,
                'return_date' => date('Y-m-d', strtotime($date->format('Y-m-d'). ' +3days')),
                'staff_id' => $staff_id,
            ]);

            App\Payment::create([
                'customer_id' => $customer_id,
                'staff_id' => $staff_id,
                'rental_id' => $i,
                'amount' => $faker->randomFloat(2, 4, 20),
                'payment_date' => $date->format('Y-m-d'),
            ]);
        };
    }
}
