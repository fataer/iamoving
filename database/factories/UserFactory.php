<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'role_id'=>2, 
        'email_verified_at' => now(),
        'password' => '$2y$10$sXBq/67.8BrQtMgTIMJO1unvVzNYHNVFv2oO69OAE40jcm9tb6Q5m', // secret
        'avatar'=>\Faker\Provider\Image::image(storage_path().'/app/public/users', 200, 200, 'people', false),
        'remember_token' => str_random(10),
    ];
});
