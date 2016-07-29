<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    protected $truncate = ['actor', 'address', 'category', 'city', 'country', 'customer', 'film_text', 'film_actor', 'film_category', 'film', 'inventory', 'language', 'payment', 'rental', 'staff', 'store'];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        //disable the foreign key restrictions so we dont get any error
        Schema::disableForeignKeyConstraints();
        
        foreach ($this->truncate as $table) {
            DB::table($table)->truncate();
        }

        $this->call(ActorTableSeeder::class);
        $this->call(AddressTableSeeder::class);
        $this->call(CustomerTableSeeder::class);
        $this->call(CategoryTableSeeder::class);
        $this->call(FilmTableSeeder::class);
        $this->call(InventoryTableSeeder::class);
        $this->call(CountryTableSeeder::class);
        $this->call(CityTableSeeder::class);
        $this->call(LanguageTableSeeder::class);
        $this->call(StaffTableSeeder::class);
        $this->call(StoreTableSeeder::class);
        //this last because it has to call on the staff, film and inventory tables
        $this->call(RentalPaymentTableSeeder::class);
        //enable again the foreign key restrictions to enforce them
        Schema::enableForeignKeyConstraints();

    }
}
