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

        $this->call(CountryTableSeeder::class);
        $this->call(CityTableSeeder::class);
        $this->call(LanguageTableSeeder::class);

        //enable again the foreign key restrictions to enforce them
        Schema::enableForeignKeyConstraints();

    }
}
