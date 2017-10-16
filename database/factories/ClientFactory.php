<?php

use App\Core\Models\Profile;
use App\Core\Models\User;
use Faker\Generator as Faker;

$client = $factory->defineAs(User::class, 'clients', function (Faker $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'roleId' => 3,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('123456'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(Profile::class, function ($faker) use ($factory, $client) {
    return [
        'name' => $faker->name,
        'age' => $faker->numberBetween(20, 60),
        'height' => $faker->numberBetween(160, 185),
        'weight' => $faker->numberBetween(160, 185),
        'gender' => $faker->randomElement(['man','woman']),
        'goal' => $faker->sentence,
        'place' => $faker->randomElement(['home','gym']),
        'experience' => $faker->numberBetween(0, 1),
        'days' => $faker->randomElement([1, 2, 3, 4, 5, 6, 7]),
        'trauma' => $faker->sentence,
        'medicalConstraints' => $faker->sentence,
        'food' => $faker->sentence,
        'allergy' => $faker->sentence,
    ];
});

