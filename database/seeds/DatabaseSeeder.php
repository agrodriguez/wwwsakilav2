<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    protected $truncate = ['Actor', 'Address', 'Category', 'City', 'Country', 'Customer', 'Film', 'Inventory', 'Language', 'Payment', 'Rental', 'Staff', 'Store'];
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
        $this->call(RentalTableSeeder::class);
        $this->call(StaffTableSeeder::class);
        $this->call(StoreTableSeeder::class);

        //enable again the foreign key restrictions to enforce them
        Schema::enableForeignKeyConstraints();

    }
}
