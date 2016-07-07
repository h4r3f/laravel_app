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

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Offer::class, function (Faker\Generator $faker) {
    return [
        'name'      => $faker->word,
        'details'   => $faker->sentence,
        'image'     => $faker->imageURL(640,480),
        'cuponcode' => $faker->currencyCode,
        'price'     => $faker->numberBetween(10, 200),
        'status'    => $faker->boolean,
    ];
});