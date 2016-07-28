<?php

use Illuminate\Database\Seeder;

class RentalPaymentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
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
        // original number 16050
        
        // for individual use "php artisan db:seed --class=RentalPaymentTableSeeder"
        Schema::disableForeignKeyConstraints();
        
        DB::table('payment')->truncate();
        DB::table('rental')->truncate();

        $faker = Faker\Factory::create();
        for ($i=1; $i <= 1650; $i++) {

            /**
             * use the same values for the rental and payment
             * payment must use the rental rate defined in the film table
             * and the inventory and staff must be fron the same store
             */
            $customer_id = $faker->numberBetween(1, 600);
            $date = $faker->dateTimeThisDecade();
            $inventory_id=$faker->numberBetween(1, 2300);
            
            
            $film = DB::table('inventory')->join('film', 'inventory.film_id', '=', 'film.film_id')
            ->select('inventory.inventory_id', 'inventory.store_id', 'film.rental_rate')
            ->where('inventory.inventory_id', $inventory_id)
            ->first();

            /**  to avoid
             *   [ErrorException]
             *   Undefined offset: 0
             *   and
             *   [ErrorException]
             *   Trying to get property of non-object
             */
            
            if (isset($film)) {
                $rental_rate=$film->rental_rate;
                $store_id=$film->store_id;
            }
            

            $staff = DB::table('staff')
            ->where('store_id', $store_id)
            ->first();

            /**  to avoid
             *   [ErrorException]
             *   Undefined offset: 0
             *   and
             *   [ErrorException]
             *   Trying to get property of non-object
             */
            
            if (isset($staff)) {
                $staff_id=$staff->staff_id;
            }
            


            App\Rental::create([
                'rental_id' => $i,
                'rental_date' => $date->format('d/m/Y'),
                'inventory_id' => $inventory_id,
                'customer_id' => $customer_id,
                'return_date' => date('d/m/Y', strtotime($date->format('d/m/Y').' + 3days')),
                'staff_id' => $staff_id,
            ]);

            App\Payment::create([
                'customer_id' => $customer_id,
                'staff_id' => $staff_id,
                'rental_id' => $i,
                'amount' => $rental_rate,
                'payment_date' => $date->format('d/m/Y'),
            ]);
        };

        Schema::enableForeignKeyConstraints();
    }
}
