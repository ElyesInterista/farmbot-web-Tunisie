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

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'longitude'=> $faker->randomFloat(50,10,50),
        'latitude'=>$faker->randomFloat(50,10,50),
        'name'=>$faker->name,
    ];
});


$factory->define(App\weather::class, function (Faker\Generator $faker) {

    return [
        'user_id' => App\User::all()->random()->id,
        'WindDirection' => $faker->randomFloat(50,10,50),
        'Wind' => $faker->randomFloat(50,10,50),
        'Humidity' => $faker->randomFloat(50,10,50),
        'Rain' => $faker->randomFloat(50,10,50),
        'Temperature' => $faker->randomFloat(50,10,50),
    ];
});


$factory->define(App\Plant::class, function (Faker\Generator $faker) {

    return [
        'Libelle' => $faker->text(7),
        'Age' => $faker->numberBetween(2,6),
        'Description' => $faker->text(60),
        'Image' => $faker->randomFloat(50,10,50),

    ];
});