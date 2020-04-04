<?php

use App\Category;
use App\User;
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
$factory->define(User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
        'varified' => $varified = $faker->randomElement([User::VARIFIED_USER, User::UNVARIFIED_USER]),
        'varification_token' => $varified == User::VARIFIED_USER ? null :  User::generateVarificationCode,
        'admin' => $varified = $faker->randomElement([User::ADMIN_USER, User::REGULAR_USER]),
    ];
});

$factory->define(Category::class, function (Faker\Generator $faker) {

    return [
        'name' => $faker->word,
        'email' => $faker->paragraph(1),
    ];
});