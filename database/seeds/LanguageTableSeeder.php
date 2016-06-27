<?php

use Illuminate\Database\Seeder;

class LanguageTableSeeder extends Seeder
{
    /**
     * reun the seeder for the language
     *
     * @return void
     **/
    public function run()
    {
        /**
         * Could have used
         * factory('App\Language', 6)->create();
         *
         * OR
         *
         * DB::table('some_table')->insert([
         *     'id' => '',
         *     'text' => '',
         * ]);
         *
         * but deecided for seeding these values
         * instead of random ones
         * from the factory
         *
         **/
        App\Language::create(['language_id'=>'1', 'name'=>'English',]);
        App\Language::create(['language_id'=>'2', 'name'=>'Italian',]);
        App\Language::create(['language_id'=>'3', 'name'=>'Japanese',]);
        App\Language::create(['language_id'=>'4', 'name'=>'Mandarin',]);
        App\Language::create(['language_id'=>'5', 'name'=>'French',]);
        App\Language::create(['language_id'=>'6', 'name'=>'German',]);

        /*
        (1,'English','2006-02-15 05:02:19'),
		(2,'','2006-02-15 05:02:19'),
		(3,'Japanese','2006-02-15 05:02:19'),
		(4,'Mandarin','2006-02-15 05:02:19'),
		(5,'French','2006-02-15 05:02:19'),
		(6,'German','2006-02-15 05:02:19');
         */
    }
}
