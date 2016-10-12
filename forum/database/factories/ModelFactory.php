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
    static $password;

    return [
        'username' => $faker->userName,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('password'),
        'phone_number' => $faker->phoneNumber,
        'remember_token' => str_random(10),
        'show_phone_number' => $faker->boolean(),
        'city_id' => 2,
        'api_token' => str_random(60),
    ];
});

$factory->define(App\Post::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'title' => $faker->sentence(),
        'content' => $faker->paragraph(),
        'reply_allowed' => $faker->boolean(),
        'is_open' => 1,
        'user_id' => 2,
        'category_id' => 1,
        'type_id' => 1,
        'is_sticky' => $faker->boolean(10),
        'city_id' => 2
    ];
});
