<?php

use Illuminate\Database\Seeder;

class FilmTableSeeder extends Seeder
{
    /**
     * reun the seeder for the user
     *
     * @return void
     **/
    public function run()
    {
        //factory('App\Film', 1000)->create();
        //Schema::disableForeignKeyConstraints();
        //DB::table('film_text')->truncate();
        //DB::table('film')->truncate();
        
        DB::table('film')->truncate();
        $faker = Faker\Factory::create();

        $categories = App\Category::lists('category_id')->all();
        $actors = App\Actor::lists('actor_id')->all();

        for ($i=1; $i < 1000; $i++) {
            $film=App\Film::create([
                'title' => $faker->realText(20),
                'description' => $faker->realText(150),
                'release_year' => $faker->numberBetween(1950, 2015),
                'language_id' => $faker->numberBetween(1, 6),
                'original_language_id' => $faker->numberBetween(1, 6),
                'rental_duration' => $faker->randomDigitNotNull,
                'rental_rate' => $faker->randomFloat(2, 4, 20),
                'length' => $faker->randomNumber(3),
                'replacement_cost' => $faker->randomFloat(2, 19, 50),
                'rating' => $faker->randomElement(['G','PG','PG-13','R','NC-17']),
                'special_features' => $faker->randomElements(['Trailers', 'Commentaries', 'Deleted Scenes', 'Behind the Scenes'], $faker->numberBetween(1, 4)),
            ]);
        
            $film->categories()->sync($faker->randomElements($categories, $faker->numberBetween(1, 4)));
            $film->actors()->sync($faker->randomElements($actors, $faker->numberBetween(3, 8)));
        };
        //Schema::enableForeignKeyConstraints();
    }
}
