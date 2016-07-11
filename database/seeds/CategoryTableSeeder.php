<?php

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * reun the seeder for the user
     *
     * @return void
     **/
    public function run()
    {
        // for individual use "php artisan db:seed --class=CategoryTableSeeder"
        Schema::disableForeignKeyConstraints();
        
        DB::table('category')->truncate();

        /**
         * Could have used
         * factory('App\Category', 16)->create();
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
        App\Category::create(['category_id'=>'1','name'=>'Action',]);
        App\Category::create(['category_id'=>'2','name'=>'Animation',]);
        App\Category::create(['category_id'=>'3','name'=>'Children',]);
        App\Category::create(['category_id'=>'4','name'=>'Classics',]);
        App\Category::create(['category_id'=>'5','name'=>'Comedy',]);
        App\Category::create(['category_id'=>'6','name'=>'Documentary',]);
        App\Category::create(['category_id'=>'7','name'=>'Drama',]);
        App\Category::create(['category_id'=>'8','name'=>'Family',]);
        App\Category::create(['category_id'=>'9','name'=>'Foreign',]);
        App\Category::create(['category_id'=>'10','name'=>'Games',]);
        App\Category::create(['category_id'=>'11','name'=>'Horror',]);
        App\Category::create(['category_id'=>'12','name'=>'Music',]);
        App\Category::create(['category_id'=>'13','name'=>'New',]);
        App\Category::create(['category_id'=>'14','name'=>'Sci-Fi',]);
        App\Category::create(['category_id'=>'15','name'=>'Sports',]);
        App\Category::create(['category_id'=>'16','name'=>'Travel',]);

        Schema::enableForeignKeyConstraints();

        /*
        (1,'Action','2006-02-15 04:46:27'),
        (2,'Animation','2006-02-15 04:46:27'),
        (3,'Children','2006-02-15 04:46:27'),
        (4,'Classics','2006-02-15 04:46:27'),
        (5,'Comedy','2006-02-15 04:46:27'),
        (6,'Documentary','2006-02-15 04:46:27'),
        (7,'Drama','2006-02-15 04:46:27'),
        (8,'Family','2006-02-15 04:46:27'),
        (9,'Foreign','2006-02-15 04:46:27'),
        (10,'Games','2006-02-15 04:46:27'),
        (11,'Horror','2006-02-15 04:46:27'),
        (12,'Music','2006-02-15 04:46:27'),
        (13,'New','2006-02-15 04:46:27'),
        (14,'Sci-Fi','2006-02-15 04:46:27'),
        (15,'Sports','2006-02-15 04:46:27'),
        (16,'Travel','2006-02-15 04:46:27');
        */
    }
}
