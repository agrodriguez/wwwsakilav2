<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/*$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});*/


$factory->define(App\Actor::class, function (Faker\Generator $faker) {
    return [
        'first_name' => $faker->firstName(),
        'last_name' => $faker->lastName,
    ];
});

$factory->define(App\Address::class, function (Faker\Generator $faker) {
    
    return [
        'address' => $faker->address,
        'address2' => $faker->secondaryAddress,
        'district' => $faker->state,
        'city_id' => $faker->numberBetween(1, 600),
        'postal_code' => $faker->postcode,
        'phone' => $faker->phoneNumber,
        'location' => $faker->latitude().','.$faker->longitude(),
    ];
});

$factory->define(App\Customer::class, function (Faker\Generator $faker) {
    
    return [
        'store_id' => $faker->numberBetween(1, 2),
        'first_name' => $faker->firstName(),
        'last_name' => $faker->lastName,
        'email' => $faker->email,
        'address_id' => $faker->numberBetween(1, 600),
        'active' => 1,
        'create_date' => $faker->date(),
    ];
});

$factory->define(App\Film::class, function (Faker\Generator $faker) {

    return [
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
    ];
});

$factory->define(App\Inventory::class, function (Faker\Generator $faker) {

    return [
        'film_id' => $faker->numberBetween(1, 1000),
        'store_id' => $faker->numberBetween(1, 2),
    ];
});

$factory->define(App\Payment::class, function (Faker\Generator $faker) {

    return [
        'customer_id' => $faker->numberBetween(1, 600),
        'staff_id' => $faker->numberBetween(1, 2),
        'rental_id' => $faker->numberBetween(1, 16050),
        'amount' => $faker->randomFloat(2, 4, 20),
        'payment_date' => $faker->date(),
    ];
});

$factory->define(App\Rental::class, function (Faker\Generator $faker) {

    return [
        'rental_date' => $faker->date(),
        'inventory_id' => $faker->numberBetween(1, 4600),
        'customer_id' => $faker->numberBetween(1, 600),
        'return_date' => $faker->date(),
        'staff_id' => $faker->numberBetween(1, 2),
    ];
});

$factory->define(App\Staff::class, function (Faker\Generator $faker) {
    
    return [
        'first_name' => $faker->firstName(),
        'last_name' => $faker->lastName,
        'address_id' => $faker->numberBetween(3, 4),
        'email' => $faker->email,
        'store_id' => $faker->numberBetween(1, 2),
        'active' => 1,
        'username' => $faker->firstName(),
        'password' => bcrypt('111111'),
    ];
});

$factory->define(App\Store::class, function (Faker\Generator $faker) {

    return [
        'manager_staff_id' => $faker->unique()->numberBetween(1, 2),
        'address_id' => $faker->unique()->numberBetween(1, 2),
    ];
});
